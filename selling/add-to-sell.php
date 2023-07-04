<?php
$conn = mysqli_connect("localhost", "root", "", "mydb");
if(isset($_POST["submit"])) {
  $name = $_POST["name"];
  $price = $_POST["price"];
  $engin = $_POST["engin"];
  $model = $_POST["model"];
  $madein = $_POST["madein"];
  $colors = $_POST["colors"];
  $detailed = $_POST["detailed"];
  if($_FILES["image"]["error"] == 4){
    echo
    "<script> alert('Image Does Not Exist'); </script>"
    ;
  }
  else{
    $fileName = $_FILES["image"]["name"];
    $fileSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];
    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if ( !in_array($imageExtension, $validImageExtension) ){
      echo
      "
      <script>
        alert('Invalid Image Extension');
      </script>
      ";
    }
    else if($fileSize > 1000000){
      echo
      "
      <script>
        alert('Image Size Is Too Large');
      </script>
      ";
    }
    else{
      $newImageName = uniqid();
      $newImageName .= '.' . $imageExtension;
      move_uploaded_file($tmpName, 'uploads/' . $newImageName);
      $query = "INSERT INTO table_uploads VALUES('', '$name', '$price', '$engin', '$model', '$madein', '$colors', '$detailed', '$newImageName')";
      mysqli_query($conn, $query);
      echo
      "
      <script>
        alert('car Successfully Added');
        document.location.href = 'add-to-sell.php';
      </script>
      ";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add-to-sell page </title>
    <style>
        .fir-header{
            background-color: rgba(5,34,24,5);
            height: 11vh;
            width: 1605px;
            margin: -27px 0 0 -13px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: fixed; 
            z-index: 2;
               
        }
        .navs{
            margin-top: -60px;
            text-align: right;
            margin-right: 50px;
        }
        li{
            display: inline-block;
            list-style-type: none;
            padding: 20px 20px;
            margin-top: 13%;
        }
        .navs a{
            color:  rgb(255, 255, 255);
            font-size: 21px; 
            text-decoration: none;
        }
        .navs a:hover{
            color: rgb(214, 207, 181);
        }
        @font-face {
            font-family: main-logo;
            src: url(fonts/Speed_Normal.ttf);
          }
        .logo h1{
            color: aliceblue;
            font-size: 60px;
            margin-top: 45px;
            margin-left: 50px;
        }


      <!-- copied -->

        @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');

        *{
            list-style: none;
            text-decoration: none;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Open Sans', sans-serif;
        }
        .wrapper .sidebar{
            background: rgba(5,49,24,5);
            position: fixed;
            top: 0;
            left: 0;
            width: 225px;
            height: 100%;
            padding: 20px 0;
            transition: all 0.5s ease;     
        }
        .wrapper .sidebar .profile{
           
            margin-left: -30px;
            margin-top: 100px;
            text-align: center;
        }
        .wrapper .sidebar .profile h1{
            color: white;
            margin: 20px 0 5px;
        }
        .wrapper .sidebar ul li{
            width: 115%;
            padding: 0px;
            margin-left: -35px;
        }
        .wrapper .sidebar ul li a{
            display: flex;
            gap: 10px;
            padding: 10px 20px;
            text-decoration: none;
            border-bottom: 3px solid #616d77;
            color: rgb(255, 255, 255);
            font-size: 18px;
            position: relative;
        }
        .wrapper .sidebar ul li a .icon{
            color: #ffffff;
            width: 30px;
            display: inline-block;
        }
        .wrapper .sidebar ul li a:hover,
        .wrapper .sidebar ul li a.active{
            color: rgba(5,34,24,5);
            background:white;
            border-right: 2px solid rgb(5, 68, 104);
        }
        .wrapper .sidebar ul li a:hover .icon,
        .wrapper .sidebar ul li a.active .icon{
            color: #0c7db1;
        }
        .wrapper .sidebar ul li a:hover:before,
        .wrapper .sidebar ul li a.active:before{
            display: block;
        }
        .wrapper .section{
            width: calc(100% - 225px);
            margin-left: 225px;
            transition: all 0.5s ease;
        }
        .wrapper .section .top_navbar{
            background: rgb(7, 105, 185);
            height: 50px;
            display: flex;
            align-items: center;
            padding: 0 30px;
        }
        .add-sell{
            background:white;
            
        }
        #add-sell{
            color: rgba(5,49,24,5);

        }


        /* COPIED TABLE FROM GOOGLE */
            .styled-table {
            border-collapse: collapse;
            margin: 25px 0 0 270px;
            
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 450px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }
        .styled-table th,
        .styled-table td {
            padding: 8px 20px;
        }
        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }
        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }
        .h22{
            position: relative;
            margin: 60px 0 0 300px;
            
        }

            .button {
          display: inline-block;
          border-radius: 4px;
          background-color:  #009879;
          border: none;
          color: #FFFFFF;
          text-align: center;
          font-size: 22px;
          padding: 4px;
          width: 150px;
          transition: all 0.5s;
          cursor: pointer;
          margin: 5px;
        }

        .button span {
          cursor: pointer;
          display: inline-block;
          position: relative;
          transition: 0.5s;
        }

        .button span:after {
          content: '\00bb';
          position: absolute;
          opacity: 0;
          top: 0;
          right: -20px;
          transition: 0.5s;
        }

        .button:hover span {
          padding-right: 25px;
        }

        .button:hover span:after {
          opacity: 1;
          right: 0;
        }
        .more{
            margin-top: 15px;
            margin-left: 65%;
        }
        .detail-btn{
            color: blue;
        }
        .delete-btnn{
            color: red;
        }
        .edit-btn{
            color: #009879;
        }

        /* INPUT FORM FROM USER */
        .container {
          width: 900px;
          height: 1100px;
          background-color: #009879;
          position: relative;
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
        margin: 50px 0 0 450px;
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
<body>
    <div class="fir-header">
        <div class="logo">
            <h1>Ethio-<span>Vehicles</h1></span>
        </div>
        <div class="navs">
            <ul>
                <li><a href="/project/index.php">Home</a></li>
                <li><a href="/project/selling-page.php">Selling-cars</a></li>
                <li><a href="/project/Renting-page.php">Renting-cars</a></li>
                <li><a href="/project/admin/logout.php">LOG-OUT</a></li>
            </ul>
        </div>
    </div>
    <center><h1 class="mhh">wel come to Admin page</h1></center>
    <div class="wrapper">
        <!--Top menu -->
        <div class="sidebar">
            <!--profile image & text-->
             <div class="profile">

                <h1 class="mhh">Admin</h1>
                
            </div>
            <!--menu item-->
            <ul>
                <!-- <li>
                    <a href="#" class="active">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="item">Home</span>
                    </a>
                </li> -->
                <li>
                    <a href="add-to-sell.php">
                        <span class="icon"><i class="fas fa-car"></i></span>
                        <span class="item">Selling cars</span>
                    </a>
                </li>
                <li>
                    <a href="/project/renting/add-to-rent.php">
                        <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="item">Renting cars</span>
                    </a>
                </li>
                <li>
                    <a href="/project/renting/rentorderd.php">
                        <span class="icon"><i class="fas fa-database"></i></span>
                        <span class="item">Rent ordered</span>
                    </a>
                </li>
                <li>
                    <a href="buy_orderd.php">
                        <span class="icon"><i class="fas fa-database"></i></span>
                        <span class="item">Sell ordered</span>
                    </a>
                </li>
                <li>
                    <a href="sold.php">
                        <span class="icon"><i class="fas fa-database"></i></span>
                        <span class="item">Sold cars</span>
                    </a>
                </li>
                <li>
                    <a href="/project/renting/rented.php">
                        <span class="icon"><i class="fas fa-database"></i></span>
                        <span class="item">Rented cars</span>
                    </a>
                </li>
                
                <li>
                    <a href="/project/admin/welcome.php">
                        <span class="icon"><i class="fas fa-user"></i></span>
                        <span class="item">who am i</span>
                    </a>
                </li>
                <li>
                    <a href="/project/admin/add-admin.php">
                        <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="item">Add admin</span>
                    </a>
                </li>
            </ul>
        </div>
        </div>
        <div class="section">
            <div class="top_navbar">
                <div class="hamburger">
                    <a href="#">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
    
    <h2 class="h22 mhh">Some of available cars for sell...</h2>
        
    
    <table class="styled-table">
    <thead>
      <tr>
        <td>Id</td>
        <td>Name</td>
        <td>price</td>
        <td>model</td>
        <td>engin</td>
        <td>colors</td>
        <td>made</td>
        <td>image</td>
        <th>detail</th>
        <th>Edit</th>
        <th>Sell</th>
        <th>Remove</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>NULL</td>
        <td>NULL</td>
        <td>NULL</td>
        <td>NULL</td>
        <td>NULL</td>
        <td>NULL</td>
        <td>NULL</td>
        <td>NULL</td>
        <td><button class="detail-btn">details</button></td>
        <td><button class="edit-btn">Edit</button></td>
        <td><button class="edit-btn">Sell</button></td>
        <td><button class="delete-btnn">Delete</button></td>
      </tr>
           <?php 
      $i = 1;
      $rows = mysqli_query($conn, "SELECT * FROM table_uploads ORDER BY id DESC")
      ?>
      <?php foreach ($rows as $row) : ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["price"]; ?></td>
        <td><?php echo $row["model"]; ?></td>
        <td><?php echo $row["engin"]; ?></td>
        <td><?php echo $row["colors"]; ?></td>
        <td><?php echo $row["madein"]; ?></td>
        <td> <img src="uploads/<?php echo $row["profile"]; ?>" width = 50; border-radius: 100%; title="<?php echo $row['profile']; ?>"> </td>
        <td><a href="details.php?id=<?php echo $row['id']?>"><button class="detail-btn">details</button></a></td>
        <td><a href="update.php?id=<?= $row['id']; ?>"><button class="edit-btn">Edit</button></a></td>
        <td><a href=".php?id=<?= $row['id']; ?>"><button class="edit-btn">Sell</button></a></td>
        <td><a href="orderdelete.php?id=<?= $row['id']; ?>" class="delete-btn"><button class="delete-btnn">Delete</button></a></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
</table>
<!-- deleted sweetlert -->
<!-- deleted sweetlert -->
<!-- deleted sweetlert -->
  <?php if (isset($_GET['m'])) : ?>
      <div class="flash-data" data-flashdata="<?= $_GET['m']; ?>"></div>
  <?php endif; ?>
<script src="/project/jquery.js"></script>
<script src="/project/sweetalert2.all.js"></script>
<script>
      $(".delete-btn").on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href')
        Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.value) {
                  document.location.href = href;
                }
           })
        })
      const flashdata = $('.flash-data').data('flashdata')
      if (flashdata) {
        Swal.fire(
            'Deleted!',
            'The data is successfully deleted!',
            'success'
        
            )
        }
</script>
<!--  -->
<!--  -->
<!--  updated sweet alert  -->
<!--  updated sweet alert  -->
<?php if (isset($_GET['p'])) : ?>
      <div class="flash-data2" data-flashdata="<?= $_GET['p']; ?>"></div>
  <?php endif; ?>
    <script>
          const flashdata2 = $('.flash-data2').data('flashdata')
          const hrefs = $(this).attr('href')
          if (flashdata2) {
            Swal.fire(
              'Updated!',
              'The data is successfully updated!',
              'success'
                ).then((result) => {
              if (result.value) {
                  document.location.href = 'add-to-sell.php';
                }
            })
        }
    </script>
<!--  -->
<!--  -->
<!-- TABLE TO ACCEPT FROM USERS -->
<center>
  <br><br><br><br>
    <br><br>
      <h2 class="myh2">Add selling cars to the sell board..</h2>
    </center> 
    <div class="container">
    <form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
        <br><br><br>
      <div class="box">
        <label for="">Name of car:</label><br />
        <input type="text" name="name"  placeholder="Name"/>
      </div>
      <div class="box">
        <label for="">Model of car:</label>
        <br>
        <input type="text" name="model" placeholder="Model" />
      </div>
      <div class="box">
        <label for="">Engin type:</label>
        <br>
        <input
          type="text"
          name="engin"
          placeholder="Engin"
        />
      </div>
      <div class="box">
        <label for="">Price:</label>
        <br>
        <input type="text" name="price" placeholder="Price"/>
      </div>
      <div class="box">
        <label for="">Made in:</label>
        <br>
        <input type="text" name="madein" placeholder="made in"/>
      </div>
      <div class="box">
        <label for="">Available colors:</label>
        <br>
        <input type="text" name="colors"  placeholder="colors" />
      </div>
      <div class="box">
        <label for="">Pleas select front image</label><br>
        <input id="file-inp"type="file" name="image" ><br><br>
      </div> 
      <div class="box">
        <label for="">write Detailed information of car:</label>
        <br />
        <textarea name="detailed" cols="50" rows="7"></textarea>
      </div>
      <button name="submit">ADD</button>
    </form>
    </div>
</body>
</html>


<script src="/project/jquery.js"></script>
<script src="/project/sweetalert2.all.js"></script>
<script src="myjs.js"></script>
