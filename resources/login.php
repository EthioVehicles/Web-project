<?php
$email = $_POST['email'];
$password = $_POST['password'];

// Check if the provided email and password match the admin credentials
if ($email === 'remedanhyeredin@gmail.com' && $password === 'Oseaba483c') {
  // Authentication successful
  header("Location: admin/index.html");
  exit;
} else {
  // Authentication failed
  echo "Invalid email or password. Please try again.";
}
?>
