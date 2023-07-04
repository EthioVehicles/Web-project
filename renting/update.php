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
if (isset($_POST["update"])) {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $price = mysqli_real_escape_string($conn, $_POST["price"]);
    $model = mysqli_real_escape_string($conn, $_POST["model"]);
    $engin = mysqli_real_escape_string($conn, $_POST["engin"]);
    $colors = mysqli_real_escape_string($conn, $_POST["colors"]);
    $madein = mysqli_real_escape_string($conn, $_POST["madein"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    mysqli_query($conn,"UPDATE `table_upload_rent` SET `name` = '$name', `price` = '$price', `model` = '$model', `engin` = '$engin', `colors` = '$colors', `madein` = '$madein' WHERE id='$id'");
    // mysqli_query($con,"UPDATE `tblcard` SET `Name`='$NAME',`Price`='$PRICE',`Image`='$img_des' WHERE Id = '$ID' ");
    header('location: add-to-rent.php?k=1');    
   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .body {
        width: 103%;
        min-height: 100vh;
        position: fixed;
        margin: -10px -10px -10px -10px;
        background-image: url("/project/images/dark-side-car-digital-art-4k-2z.jpg");
        backdrop-filter: blur(8px);
        background-repeat: no-repeat;
        background-size: cover;
      }
                /* INPUT FORM FROM USER */
        .container {
          width: 900px;
          height: 1200px;
          background-color: #009879;
          opacity: 0.9;
          position: absolute;
          margin-left: 27%;
          margin-top: 100px;
          border-radius: 26px;
        }
        .box{
          padding: 10px;
        }
        .container button {
          width: 280px;
          height: 50px;
          margin-left: 33%;
          border-radius:15px;
          margin-top: 66px;
          position: relative;
        }
        .container button:hover {
          background-color #ddbbdb;
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
        position: absolute;
        margin: 40px 0 0 400px;
        color: white;
        font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
        font-style: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS",sans-serif;
                
        }
        .upimg{   
            margin:-70px 0 0 500px;
        }
    </style>
</head>
<body>
    <div class="body"></div>
    <center>
  <br>
    <br><br>
      <h1 class="myh2">Edit/Update selling cars in the sell board...</h1>
    </center> 
    <div class="container">
    <form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
        <br><br><br>
      <div class="box">
        <label for="">Name of car:</label><br />
        <input type="text" name="name" value="<?php echo $row["name"]; ?>"/>
      </div>
      <div class="box">
        <label for="">Model of car:</label>
        <br>
        <input type="text" name="model" value="<?php echo $row["model"]; ?>"/>
      </div>
      <div class="box">
        <label for="">Engin type:</label>
        <br>
        <input
          type="text"
          name="engin"
          value="<?php echo $row["engin"]; ?>"
        />
      </div>
      <div class="box">
        <label for="">Price:</label>
        <br>
        <input type="text" name="price" value="<?php echo $row["price"]; ?>"/>
      </div>
      <div class="box">
        <label for="">Made in:</label>
        <br>
        <input type="text" name="madein" value="<?php echo $row["madein"]; ?>"/>
      </div>
      <div class="box">
        <label for="">Available colors:</label>
        <br>
        <input type="text" name="colors" value="<?php echo $row["colors"]; ?>" />
      </div>
      <br><br><br>
      <div class="box">
        <label for="">Pleas select front image</label><br>
        <input id="file-inp"type="file" name="image" value="<?php echo $row["profile"]; ?>">
        <img class="upimg" src="uploads/<?php echo $row['profile'] ?>"  width = '200px'  height = '70px' alt=""> 
        <br><br>
      </div> 
      <div class="box">
        <label for="">write Detailed information of car:</label>
        <br />
        <textarea name="detailed"  cols="50" rows="7"><?php echo $row["detailed"]; ?></textarea>
        <input type="hidden" name="id"  value="<?php echo $row['id'] ?>">

      </div>
      <button name="update">U P D A T E</button>
    </form>
    </div>
</body>
</html>