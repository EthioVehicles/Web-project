<?php
$id = $_GET['id'];
$conn = mysqli_connect("localhost", "root", "", "mydb");
$sql = "DELETE FROM table_upload_rentnow WHERE id='$id'";
$query = mysqli_query($conn,$sql);
header('location: rentorderd.php?v=1');
?>