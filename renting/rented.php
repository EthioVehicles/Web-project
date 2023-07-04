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
    }
    //older ones from database
    if(isset($_POST["rent"])) {
    $name= $row["name"];
    $model = $row["model"];
    $engin = $row["engin"];
    $madein = $row["madein"];
    $image = $row["profile"];
    // new ones from input
    $renter = $_POST["renter"];
    $email = $_POST["email"];
    $ssid = $_POST["ssid"];
    $numberplate = $_POST["numberplate"];
    $priceper = $_POST["priceper"];
    $color = $_POST["color"];
    $date = $_POST["date"];
    $period = $_POST["period"];
    $query = "INSERT INTO table_upload_rented VALUES('', '$name', '$model', '$engin', '$madein', '$image', '$renter', '$email', '$ssid', '$numberplate', '$priceper', '$color', '$date', '$period')";
    mysqli_query($conn, $query);
    header('location: add-to-rent.php?q=1'); 
}
?>
<!--  -->
<script src="/project/jquery.js"></script>
<script src="/project/sweetalert2.all.js"></script>

<!--  updated sweet alert  -->
<!--  updated sweet alert  -->
<?php if (isset($_GET['q'])) : ?>
      <div class="flash-data2" data-flashdata="<?= $_GET['q']; ?>"></div>
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
                  document.location.href = 'add-to-rent.php';
                }
           })
            }
            
    </script>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rented-page </title>
    <style>
        .fir-header{
            background-color: rgb(139, 97, 34);
            height: 11vh;
            width: 1605px;
            margin: -27px 0 0 -13px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: fixed; 
            z-index: 5;
               
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
            background: rgb(151, 136, 113);
            position: fixed;
            top: 0;
            left: 0;
            width: 225px;
            height: 100%;
            padding: 20px 0;
            transition: all 0.5s ease;
            z-index: 1;
        }
        .wrapper .sidebar .profile{
           
            margin-left: -30px;
            margin-top: 100px;
            text-align: center;
        }

        

        .wrapper .sidebar .profile h1{
            color: rgb(255, 255, 255);
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
            padding: 10px 35px;
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
            color: #0c7db1;
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
        .rented{
            background:white;
            
        }
        #rented{
            color: #0c7db1;

        }


                    /* COPIED TABLE FROM GOOGLE */
                .styled-table {
                border-collapse: collapse;
                margin: 25px 0 0 0px;
                
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
                margin-left: 300px;
                
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
            .delete-btn{
                color: red;
            }
            .edit-btn{
                color: #009879;
            }
            /* INPUT FORM FROM USER */
            .container {
            width: 900px;
            height: 1000px;
            background-color: #009879;
            position: relative;
            margin-left: 27%;
            margin-top: 10px;
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
            #h11{
            position: relative;
            margin: 150px 0 0 -299px; 
            }
            .scrol{
                margin: 4px 4px 4px 300px;
                padding: 10px;
                background-color:  #dddddd;
                width: 1200px;
                overflow-x: auto;
                overflow-y: hidden;
                white-space: nowrap;

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
                <li><a href="Home.html">Home</a></li>
                <li><a href="buying-page.html">Buying-cars</a></li>
                <li><a href="Renting-page.html">Renting-cars</a></li>
                
            </ul>
        </div>
    </div>
    <center><h1>wel come to Admin page</h1></center>
    <div class="wrapper">
        <!--Top menu -->
        <div class="sidebar">
            <!--profile image & text-->
             <div class="profile">

                <h1>Admin</h1>
                
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
                    <a href="/project/selling/add-to-sell.php">
                        <span class="icon"><i class="fas fa-car"></i></span>
                        <span class="item">Selling cars</span>
                    </a>
                </li>
                <li>
                    <a href="add-to-rent.php">
                        <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="item">Renting cars</span>
                    </a>
                </li>
                <li>
                    <a href="rentorderd.php">
                        <span class="icon"><i class="fas fa-database"></i></span>
                        <span class="item">Rent ordered</span>
                    </a>
                </li>
                <li>
                    <a href="/project/selling/buy_orderd.php">
                        <span class="icon"><i class="fas fa-database"></i></span>
                        <span class="item">Sell ordered</span>
                    </a>
                </li>
                <li>
                    <a href="/project/selling/sold.php">
                        <span class="icon"><i class="fas fa-database"></i></span>
                        <span class="item">Sold cars</span>
                    </a>
                </li>
                <li>
                    <a href="rented.php">
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
    
    <h2 class="h22">Here are All of rented cars...</h2>
<div class="scrol">
    <table class="styled-table">
    <thead>
      <tr>
        <td>Id</td>
        <td>Picture</td>
        <td>Car Name</td>
        
        <td>Model</td>
        <td>Engin</td>
        <td>Made in</td>
        
        
        <th>Renter</th>
        <th>Email</th>
        <th>SSID</th>
        <th>Numberplate</th>

        <th>Price</th>
        <th>Color</th>
        <th>Date</th>
        <th>Period</th>

        <th>detail</th>
        <th>Edit</th>
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

        <td>NULL</td>
        <td>NULL</td>
        <td>NULL</td>
        <td>NULL</td>

        <td>NULL</td>
        <td>NULL</td>
        

        <td><button class="detail-btn">details</button></td>
        <td><button class="edit-btn">Edit</button></td>
        <td><button class="delete-btn">Delete</button></td>
      </tr>
           <?php
      $i = 1;
      $rows = mysqli_query($conn, "SELECT * FROM table_upload_rent ORDER BY id DESC");
      $rowss = mysqli_query($conn, "SELECT * FROM table_upload_rented ORDER BY id DESC");
       
      ?>
      <?php foreach ($rows as $row) : ?>
      <?php foreach ($rowss as $roww) : ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><img src="uploads/<?php echo $row["profile"]; ?>" width = 50; title="<?php echo $row['profile']; ?>"></td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["model"]; ?></td>
        <td><?php echo $row["engin"]; ?></td>
        <td><?php echo $row["madein"]; ?></td>
        <!--  -->
        <td><?php echo $roww["renter"]?></td>
        <td><?php echo $roww["email"]?></td>
        <td><?php echo $roww["ssid"]?></td>
        <td><?php echo $roww["numberplate"]?></td>
        <td><?php echo $roww["priceper"]?></td>
        <td><?php echo $roww["color"]?></td>
        <td><?php echo $roww["date"]?></td>
        <td><?php echo $roww["period"]?></td>
        <td><button class="detail-btn">details</button></td>
        <td><button class="edit-btn">Edit</button></td>
        <td><button class="delete-btn">Delete</button></td>
      </tr>
      <?php endforeach; ?>
      <?php endforeach; ?>
    </tbody>
      
  </table>
<!-- scroll end -->
</div>

<!--  -->
<!--  -->
<!-- TABLE TO ACCEPT FROM USERS -->
<center>
      <h1 id="h11">Rent car</h1>
    </center> 
    <div class="container">
    <form action="" method="POST" autocomplete="on" enctype="multipart/form-data">
        <br><br><br>
        <!--  -->
      <div class="box">
        <label for="">Name of renter:</label><br />
        <input type="text" name="renter"  placeholder="Name"/>
      </div>
      <!--  -->
      <div class="box">
        <label for="">Email address of renter:</label><br />
        <input type="text" name="email"  placeholder="Email"/>
      </div>
      <!--  -->
      <div class="box">
        <label for="">SSID of renter:</label><br />
        <input type="text" name="ssid"  placeholder="SSID"/>
      </div>
      <!--  -->
      <div class="box">
        <label for="">Car numberplate:</label>
        <br>
        <input type="text" name="numberplate" placeholder="Numberplate" />
      </div>
      <!--  -->
      <div class="box">
        <label for="">Price per day/week/month:</label>
        <br>
        <input
          type="text"
          name="priceper"
          placeholder="ETB, $$"
        />
      </div>
      <!--  -->
      <div class="box">
        <label for="">Date of Renting:</label>
        <br>
        <input type="text" name="date" placeholder="dd/mm/yy"/>
      </div>
      <!--  -->
      <div class="box">
        <label for="">Rental period:</label>
        <br>
        <input type="text" name="period" placeholder="Period"/>
      </div>
      <!--  -->
      <div class="box">
        <label for="">Rented car color:</label>
        <br>
        <input type="text" name="color"  placeholder="color" />
      </div>
      <!--  -->
      <button name="rent">Rent</button>
    </form>
    </div>
</body>
</html>