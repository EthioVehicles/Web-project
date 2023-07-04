<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
// if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//     header("location: welcome.php");
//     exit;
// }

// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: /project/admin-index.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 







<!DOCTYPE html>
<html lang="en">
  <head>
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "poppins", sans-serif;
      }
      body {
        width: 100%;
        min-height: 70vh;
        background-image: url("/project/images/dark-side-car-digital-art-4k-2z.jpg");
        backdrop-filter: blur(8px);
        background-repeat: no-repeat;
        background-size: cover;
      }
      .container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 400px;
        margin-top: 150px;
      }
      .form {
        position: absolute;
        width: 400px;
        height: 500px;
        border: 2px solid #b6b6b6;
        border-radius: 22px;
        justify-content: center;
        align-items: center;
      }
      .input-box {
        border-bottom: 1px solid rgb(240, 240, 240);
        width: 95%;
        margin-left: 10px;
        margin-top: -5px;
      }
      input {
        width: 97%;
        height: 50px;
        margin: 20px 5px 1px 5px;
        border: none;
        outline: none;
        background-color: transparent;
        color: #fff;
        position: ;
      }
      h1 {
        text-align: center;
        margin: 30px;
        color: white;
      }
      label {
        position: absolute;
        font-size: 16px;
        font-weight: bold;
        margin: 4px 10px;
        color: #fff;
      }
      button {
        width: 99%;
        height: 50px;
        margin: 50px 2px;
        font-size: 20px;
        border-radius: 11px;
        background-color: #b6b6b6;
      }
      button:hover {
        background-color: #fffefe;
        cursor: pointer;
      }
      input::placeholder {
        color: #a5a4a4;
      }
      .fas, .fab{
        color: #b6b6b6;
        position: absolute;
        margin-left: 90%;
        margin-top: -30px;
      }
      .fa-lock{
        margin-left: -20px;
        margin-top: 35px;

      }
      .btn{
        width: 200px;
        margin-left: 44%;
        margin-top: 55px;
        
      }
      .error{
        color: red;
        position: absolute;
        margin-left: 70px;
        
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="form">
        <h1>Log in</h1>
        <?php 
        if(!empty($login_err)){
            echo '<p class="error">' . $login_err . '</p>';
        }        
        ?>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" autocomplete="off">
            <div class="input-box">
                <input type="text" placeholder="username" name="username" /><br />
                <i class="fas fa-user"></i>
                <span class="invalid-feedback"><?php echo $username_err; ?></span>

            </div>
              <label for="">Enter your Username:</label><br />
            <div class="input-box">
                <input type="email" placeholder="Email" name="email" id="" /><br />
                <i class='fab fa-facebook-messenger'></i>
            </div>
              <label for="">Enter your Email:</label><br />
            <div class="input-box">
                <input type="password" placeholder="password" name="password"  />
                <i class="fas fa-lock"></i>
                <span class="invalid-feedback"><?php echo $username_err; ?></span>

            </div>
              <label for="">Enter your Password:</label><br />
            <button name="login">Log in</button>
          </div> 
        </div>
      </form>
      <a href="forgot.php"><button class="btn" onclick="forgot.php">Forgot Password</button></a>
      </div>
    </div>
  </body>
</html>
