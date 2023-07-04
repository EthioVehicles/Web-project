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
    // mysqli_close($conn);    
}
if(isset($_POST["submit"])) {
  $urname = $_POST["urname"];
  $uremail = $_POST["uremail"];
  $urphnum = $_POST["urphnum"];
  $uradd = $_POST["uradd"];
  //
  $cname= $row["name"];
  $cmodel = $row["model"];
  $cmadein = $row["madein"];
  $ccolor = $row["color"];
  // 
  $query = "INSERT INTO table_upload_buynow VALUES('', '$urname', '$uremail', '$urphnum', '$uradd', '$cname', '$cmodel', '$cmadein', '$ccolor')";
  mysqli_query($conn, $query);
  
  ?>
  <script src="/project/jquery.js"></script>
  <script src="/project/sweetalert2.all.js"></script>
  
  <script>
  Swal.fire(
              'Oredr Success!',
              'Admin will contact you in email or phone!',
              'success'
                ).then((result) => {
              if (result.value) {
                  document.location.href = '/project/renting-page.php';
                }
            })
  </script>
  <?php
  // header('location: add-to-rent.php?q=1');
};
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
            height: 530px;
            /* background-color: #DDDDDD; */
            background: radial-gradient(circle, rgba(35,76,201,1) 0%, rgba(5,6,24,1) 61%, rgba(11,138,158,1) 100%);
            border-radius: 55px;
            margin-left: 100px;
            margin-top: 10px;
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
            margin: -30px 0 0 530px;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
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

        /* INPUT FORM FROM USER */
        .container2 {
          width: 900px;
          height: 600px;
          background-color: #009879;
          position: relative;
          margin-left: 22%;
          margin-top: 100px;
          border-radius: 36px;
          justify-content: center;

        }
        .head2{
            width: 600px;
            height: 100px;
            background: radial-gradient(circle, rgba(35,76,201,1) 0%, rgba(5,6,24,1) 61%, rgba(11,138,158,1) 100%);
            background-color: #DDDDDF;
            border-radius: 35px;
            /* margin: -30px 0 0 530px; */
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .box{
          padding: 10px;
        }
        .container2 button {
          width: 280px;
          height: 50px;
          margin-left: 33%;
          border-radius:15px;
          margin-top: 66px;
          position: relative;
        }
        .container2 button:hover {
          color #ddbbcc;
          cursor: pointer;
        }
        label{
          color: white;
          margin-left: 21%;
        }
        input {
          width: 500px;
          height: 45px;
          background-color: light;
          border-radius:15px;
          margin-left: 20%;
        }
        textarea{
          border-radius: 10px;
          margin-left: 20%;
        }   
        #file-inp{
            
            height: 40px;
        } 
        .myh2{
        /* position: absolute; */
        /* margin: 50px 0 0 450px; */
        font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
        font-style: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS",
                sans-serif;
        }   
        .mhh{
            font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
            font-style: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS",
                    sans-serif;
        } 
    </style>
</head>
<body><br><br>
<div class="head">
    <center><h2 class="myh2">Please fill the given form</h2></center><br><br><br>
</div>
  <a href="/project/selling-page.php"><img src="myimages/back-arrow.png" alt="" class="back"></a>
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

        <?php else:  ?>
                <center><h2>Ooops!...No such car in this stock market...</h2></center>
        <?php endif; ?>
    </div>
    <!--  -->
<!-- TABLE TO ACCEPT FROM USERS -->
<center>
  <br><br><br><br>
    <br><br>
    <div class="head2">
        <h2 class="myh2">Fill below form, we'll contact you...</h2>
    </div>
    </center> 
    <div class="container2">
      
    <form action="" method="POST" autocomplete="on" enctype="multipart/form-data">
        <br><br><br>
      <div class="box">
        <label for="">Enter Your Name:</label><br />
        <input type="text" name="urname"  placeholder="Name"/>
      </div>
      <div class="box">
        <label for="">Enter Your Email:</label>
        <br>
        <input type="email" name="uremail" placeholder="Email" />
      </div>
      <div class="box">
        <label for="">Phone Number:</label>
        <br>
        <input
          type="text"
          name="urphnum"
          placeholder="Ph. number"
        />
      </div>
      <div class="box">
        <label for="">Address:</label>
        <br>
        <input type="text" name="uradd" placeholder="Address"/>
      </div>
      <button name="submit">R E N T    N O W</button>
    </form>
    </div>
</body>
</html>