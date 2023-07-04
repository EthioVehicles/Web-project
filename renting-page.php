<?php
$conn = mysqli_connect("localhost", "root", "", "mydb");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="templates/navbar.css">
    <link rel="stylesheet" href="templates/cards.css">
    <title>Renting-page</title>
    <style>
        .fir-header {
  /* background-color: rgb(139, 97, 34); */
  background: radial-gradient(circle, rgba(35,76,201,1) 0%, rgba(5,6,24,1) 61%, rgba(11,138,158,1) 100%);
  height: 11vh;
  width: 1600px;
  margin: -100px 0 0 -8px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  position: fixed;
  z-index: 2;
}
.navs {
  margin-top: -60px;
  text-align: right;
  margin-right: 50px;
}
li {
  display: inline-block;
  list-style-type: none;
  padding: 20px 20px;
  margin-top: 13%;
}
.navs a {
  color: rgb(255, 255, 255);
  font-size: 21px;
  text-decoration: none;
}
.navs a:hover {
  color: rgb(214, 207, 181);
}
@font-face {
  font-family: main-logo;
  src: url(fonts/Speed_Normal.ttf);
}
.logo h1 {
  color: aliceblue;
  font-size: 60px;
  margin-top: 45px;
  margin-left: 50px;
}
.continer {
    display: flex;
    flex-wrap: wrap;
  width: 100%;
  max-width: 1380px;
  
  padding: 10px;
  display: flexbox;
  gap: 25px;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  grid-auto-rows: 500px;
}
.card img {
  width: 105.4%;
  height: 170px;
  margin-left: -8px;
  margin-top: -8px;

}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);
  transition: 0.4s;
  width: 300px;
  background: #fff;
  text-align: center;
  font-size: 20px;
  padding: 8px;
}
.card:hover {
  background-color: #f0ebeb;
  transform: scale(100.1%);
}
.h11 {
  color: #000000;
  font-size: 37px;
  text-align: center;
  margin-top: 100px;
  margin-left: 150px;
  font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
  font-style: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS",
                sans-serif;
}
.car-list {
  display: flexbox;
  gap: 25px;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  grid-auto-rows: 500px;
}
.ul {
  bottom: 0;
}
.ul a {
  color: red;
  padding: 10px;
}
#hre {
  color: green;
  font-size: 20px;
}
.h11{
        font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
        font-style: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS",
                sans-serif;
      }
    </style>
</head>
<body>
    <div class="fir-header">
        <div class="logo">
            <h1>Ethio-<span>Vehicles</h1></span>
        </div>
        <div class="navs">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="seling-page.php">Buy-cars</a></li>
                <li><a href="contact.php">Contact us</a></li>
            </ul>                                                       
        </div>
    </div>
    <!-- cards list -->
    <h2 class="h11">Buy cars that matches with your need</h2>
    <div class="continer" style="">
            <?php 
            $rows = mysqli_query($conn, "SELECT * FROM table_upload_rent ORDER BY id DESC");            
            ?>
            <?php foreach ($rows as $row){ ?>
            <!-- <div id="carList" class=" car-list" style="flex-wrap: wrap;">
                 -->
                <div class="card">
                    <img src="renting/uploads/<?php echo $row["profile"];?>" title="<?php echo $row['profile']; ?>" >
                    <div class="text">
                        <h3><?php echo ($row['name']); ?></h3>
                        <h3><?php echo ($row['price']); ?></h3>
                        <p>
                        Model: <b><?php echo ($row['model']); ?></b><br>
                        Engin type: <b><?php echo ($row['engin']); ?></b><br>
                        Made in: <b><?php echo ($row['madein']); ?></b><br>
                        Available-color: <b><?php echo ($row['colors']); ?></b><br>
                        </p>
                        <div class="ul">
                            <a href="renting/rentnow.php?id=<?php echo $row['id']?>" style="padding: 10px; text-decoration: none; font-size: 20px; color: green;">Rent now!</a>
                            <a href="renting/details.php?id=<?php echo $row['id']?>" style="padding: 10px; text-decoration: none; font-size: 20px; color: green;">See more...</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
    </div>
</body>
</html>