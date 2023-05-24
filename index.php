<?php
      //connect to database
    $conn = mysqli_connect('localhost','sallah','test1234', 'ethio_vehicles');
    if(!$conn){
        echo 'Connection error: '.mysqli_connect_error();
    }
   
    //write query for all car attributes
    $sql = 'SELECT model,price,madein,engin FROM sell_cars';

    //make query and get result
    $result = mysqli_query($conn, $sql);

    //fetch the resulting rows as an array
    $cars = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //free result from memory
    mysqli_free_result($result);
    
    //close connection
    mysqli_close($conn);
    
    print_r($cars)
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>hello world</h1>
</body>
</html>