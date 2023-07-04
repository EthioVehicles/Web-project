<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
echo "thw first one is workng";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    echo "thw second one is workng";

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: admin-login.php");
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
<html>
<head>
    <title>Login Form</title>
    <style>
        body
        {
            margin: 0;
            padding: 0;
            background-image: url('/project/images/Screenshot (118).png');
            backdrop-filter: blur(2px);
            background-repeat: ;
            background-size: cover;
            
            font-family: 'Arial';
        }
        .login{
                width: 482px;
                overflow: hidden;
                margin: auto;
                margin: 100px 0 0 550px;
                padding: 20px;
                border-radius: 15px;
                border: 2px solid #b6b6b6;
                background-color: transparent;
        }
        h2{
            text-align: center;
            color: #277582;
            padding: 20px;
        }
        label{
            color: #08ffd1;
            font-size: 17px;
        }
        #Uname{
            width: 400px;
            height: 40px;
            border: none;
            border-radius: 2px;
            padding-left: 8px;
                background-color: transparent;
                border-bottom: 2px solid gray;


        }
        #Pass{
            width: 400px;
            height: 40px;
            border: none;
            border-radius: 2px;
            padding-left: 8px;
                background-color: transparent;
                border-bottom: 2px solid gray;

        
        }
        #log{
            width: 300px;
            height: 40px;
            border: none;
            border-radius: 7px;
            margin-left: 67px;
            color: blue;
            cursor: pointer;
        
        
        }
        span{
            color: white;
            font-size: 17px;
        }
        a{
            float: right;
            background-color: grey;
        }
        h3{
            color: white;
        }
        input{
            color: white;
        }


    </style>
</head>
<body>
    
    <div class="login">
        <center><h3>Please fill this form to create an account.<h3/></center>        
    <br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label><b>User Name
        </b>
        </label>
        <input type="text" name="username" id="Uname" placeholder="Username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
        
        <br><br>
        <label><b>Password
        </b>
        </label>
        <input type="Password" name="password" id="Pass" placeholder="Password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
        
        <br><br>
        <label><b>Confirm Password</b></label>
        <input type="Password" name="confirm_password" id="Pass" placeholder="Password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
        
        <br><br>
        <input type="submit" name="submit" id="log" value="Submit">
        <br><br>
    </form>
</div>
</body>
</html>