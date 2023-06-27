<?php
$hostname = 'localhost'; // or the hostname of your database server
$username = 'root';
$password = '';
$database = 'car'; // the name of your database

// Create a new database connection
$connection = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process the login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query the database to check if the email and password match
    $query = "SELECT * FROM usersignup WHERE email='$email' AND password='$password'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1) {
        // Login successful, redirect to another page
        header("Location: welcome.php");
        exit();
    } else {
        // Login incorrect, display an error message
        echo "Login incorrect. Please try again.";
    }
}

// Close the database connection
mysqli_close($connection);
?>
