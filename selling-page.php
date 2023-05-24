<?php
     //connect to database
    $conn = mysqli_connect('localhost','sallah','test1234', 'ethio_vehicles');
    if(!$conn){
        echo 'Connection error: '.mysqli_connect_error();
    }
   
    //write query for all car attributes
    $sql = 'SELECT * FROM sell_cars';

    //make query and get result
    $result = mysqli_query($conn, $sql);

    //fetch the resulting rows as an array
    $cars = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //free result from memory
    mysqli_free_result($result);
    
    //close connection
    mysqli_close($conn);
    
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="templates/navbar.css">
    <link rel="stylesheet" href="templates/cards.css">

    <title>Document</title>
</head>
<body>
    <div class="fir-header">
        <div class="logo">
            <h1>Ethio-<span>Vehicles</h1></span>
        </div>
        <div class="navs">
            <ul>
                <li><a href="buying-page.html">Buy-cars</a></li>
                <li><a href="Renting-page.html">Rent-cars</a></li>
                <li><a href="Home.html">Home</a></li>
                <li><a href="admin-page.html">I'm Admin</a></li>
                <li><a href="">Home</a></li>
            </ul>                                                       
        </div>
    </div>

    <!-- cards list -->
    <h1 class="h11">Buy cars that matches with your need</h1>
    <div class="continer">
        <?php echo "Only ". count($cars). " cars are left..."; ?><br>
        <div id="carList" class=" car-list">
            
            <?php foreach($cars as $car){ ?>

            
            <div class="card">
                <img src="resources/images/red-car.jpg" alt="">
                <div class="text">
                    <h2><?php echo htmlspecialchars($car['name']); ?></h2>
                    <h3>$<?php echo htmlspecialchars($car['price']); ?></h3>
                    <p>
                       <?php echo htmlspecialchars($car['model']); ?>
                    </p>
                    <div class="ul">
                        <a href="bat-car?id=${car.id}"><?php echo htmlspecialchars($car['madein']); ?></a>
                        <a href="car-details.html?id=${car.id}"><?php echo htmlspecialchars($car['id']); ?></a>
                    </div>
                </div>
            </div>

            <?php } ?>
        </div>
    </div>
</body>
</html>