<?php
$id = $_GET['id'];
$conn = mysqli_connect("localhost", "root", "", "mydb");
$sql = "DELETE FROM table_upload_buynow WHERE id='$id'";
$query = mysqli_query($conn,$sql);
header('location: buy_orderd.php?v=1');
?>