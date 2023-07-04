<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>          
        body {
        width: 100%;
        min-height: 70vh;
        background-image: url("/project/images/dark-side-car-digital-art-4k-2z.jpg");
        backdrop-filter: blur(4px);
        background-repeat: no-repeat;
        background-size: cover;
       
      }
      h1{
        color: white;
      }
    .btn {
        width: 200px;
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
    
    </style>
</head>
<body>
    <center>

        <h1 class="my-5">Your username is, <?php echo htmlspecialchars($_SESSION["username"]); ?></h1>
        <h1 class="my-5">Your Email is, <?php echo htmlspecialchars($_SESSION["id"]); ?></h1>
        <h1 class="my-5">Your Password is, <?php echo htmlspecialchars($_SESSION["loggedin"]); ?></h1>
        <p>
      <a href="/project/admin-index.php"><button class="btn" onclick="forgot.php">B A C K</button></a>

        </center>
    </p>
</body>
</html>