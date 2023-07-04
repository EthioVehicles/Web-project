<?php
$id = $_GET['id'];
$conn = mysqli_connect("localhost", "root", "", "mydb");
$sql = "DELETE FROM table_uploads WHERE id='$id'";
$query = mysqli_query($conn,$sql);
header('location: add-to-sell.php?m=1');
?>


