<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $name = $_POST['name'];
  $fatherName = $_POST['father-name'];
  $grandFatherName = $_POST['grandfather-name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirm-password'];

  // Database credentials
  $hostname = 'localhost'; // or the IP address of your MySQL server
  $username = 'root';
  $password_db = '';
  $database = 'car';
  $table = 'usersignup';

  // Create a new database connection
  $conn = new mysqli($hostname, $username, $password_db, $database);

  // Check the connection
  if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
  }

  // Validate password and confirm password
  if ($password !== $confirmPassword) {
    echo 'Error: Passwords do not match.';
    exit;
  }

  // Prepare the SQL INSERT statement
  $sql = "INSERT INTO $table (name, father_name, grandfather_name, email, password) 
          VALUES ('$name', '$fatherName', '$grandFatherName', '$email', '$password')";

  // Execute the SQL statement
  if ($conn->query($sql) === true) {
    echo 'Registration successful. You can now login.';
  } else {
    echo 'Error: ' . $sql . '<br>' . $conn->error;
  }

  // Close the database connection
  $conn->close();
}
?>
