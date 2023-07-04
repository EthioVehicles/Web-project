<?php
$conn = mysqli_connect("localhost", "root", "", "mydb");


//check id get methode
if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    ///make sql
    $sql = "SELECT * FROM table_upload_rent WHERE id = $id";
    //get query result
    $result = mysqli_query($conn, $sql);
    //fetch result
    $row = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($conn);   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detailed information of this car</title>
    <style>
        body{
            background-color: #ADDB;
        }
        .container{
            width: 700px;
            height: 830px;
            /* background-color: #DDDDDD; */
            background: radial-gradient(circle, rgba(35,76,201,1) 0%, rgba(5,6,24,1) 61%, rgba(11,138,158,1) 100%);
            border-radius: 55px;
            margin-left: 100px;
            margin-top: 70px;
            padding-top: 50px;
        }
        .img1{
            
            position: absolute;
            border-radius: 55px;
            margin: -445px 0 0 730px;
            width: 700px;
            height: 400px;
        }
        .container h3,h4{
            position: ;
            margin-left: 50px;
            margin-top: 0px;
        }
        .head{
            width: 550px;
            height: 100px;
            background: radial-gradient(circle, rgba(35,76,201,1) 0%, rgba(5,6,24,1) 61%, rgba(11,138,158,1) 100%);
            background-color: #DDDDDF;
            border-radius: 35px;
            margin: 30px 0 0 530px;
            padding: 10px;
            align-item: center;
        }
        .img2{
            border-radius: 55px;
            margin: -15px 0 0 730px;
            width: 700px;
            height: 400px;
            -webkit-transform: scaleX(-1);
            transform: scaleX(-1);
        }
        .back{
            width: 50px;
            height: 50px;
            position: absolute;
            margin: -95px 0 0 130px;
        }
        h2, h3, h4{
            color: white;
        }
    </style>
</head>
<body><br><br>
<div class="head">
    <center><h2>Detailed information of this car</h2></center><br><br><br>
</div>
  <a href="/project/selling-page.php"><img src="/crud-mainproject/selling/myimages/back-arrow.png" alt="" class="back"></a>
    <div class="container">
        <?php if($row): ?>
            <h3><b>Name of car</b>: <?php echo $row['name'] ?></h3>
            <h4><b>price of car </b>: $<?php echo $row['price'] ?> </h4>
            <h4><b>ID of car</b>:<?php echo $row['id'] ?> </h4>
            <h4><b>Model of car</b>:<?php echo $row['model'] ?> </h4>
            <h4><b>Engin type of car</b>: <?php echo $row['engin'] ?> </h4>
            <h4><b>Available Colors of car</b>: <?php echo $row['colors'] ?> </h4>
            <h4><b>Made in</b>: <?php echo $row['madein'] ?></h4>
            <h4><b>Detailed information of car</b>: <?php echo $row['detailed'] ?></h4><br>
            <img src="uploads/<?php echo $row["profile"];?>" title="<?php echo $row['profile']; ?>" class="img1">
            <img src="uploads/<?php echo $row["profile"];?>" title="<?php echo $row['profile']; ?>" class="img2">

        <?php else:  ?>
                <center><h2>Ooops!...No such car in this stock market...</h2></center>
        <?php endif; ?>


    </div>
</body>
</html>