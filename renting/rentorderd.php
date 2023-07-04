<?php
$conn = mysqli_connect("localhost", "root", "", "mydb");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>orderd page </title>
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
        .buy{
            background:white;
            
        }
        #buy{
            color: rgba(5,49,24,5);

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
    margin-left: 75%;
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
.btnn{
    cursor: pointer;
}
.scroll{
    margin: 4px 4px 4px 300px;
    padding: 2px;
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
                <li><a href="index.php">Home</a></li>
                <li><a href="selling-page.php">Selling-cars</a></li>
                <li><a href="Renting-page.php">Renting-cars</a></li>
                <li><a href="admin/logout.php">LOG-OUT</a></li>
                
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
                    <a href="selling/add-to-sell.php">
                        <span class="icon"><i class="fas fa-car"></i></span>
                        <span class="item">Selling cars</span>
                    </a>
                </li>
                <li>
                    <a href="renting/add-to-rent.php">
                        <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="item">Renting cars</span>
                    </a>
                </li>
                <li>
                    <a href="selling/sold.php">
                        <span class="icon"><i class="fas fa-database"></i></span>
                        <span class="item">Sold cars</span>
                    </a>
                </li>
                <li>
                    <a href="renting/rented.php">
                        <span class="icon"><i class="fas fa-database"></i></span>
                        <span class="item">Rented cars</span>
                    </a>
                </li>
                <li class="">
                    <a href="#">
                        <span class="icon"><i class="fas fa-chart-line"></i></span>
                        <span class="item">Buy Orders</span>
                    </a>
                </li>
                <li>
                    <a href="admin/welcome.php">
                        <span class="icon"><i class="fas fa-user"></i></span>
                        <span class="item">who am i</span>
                    </a>
                </li>
                <li>
                    <a href="admin/add-admin.php">
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
    <!-- SELLING TABLE -->
    <h2 class="h22">Some of available cars for sell...</h2>
    <div class="scroll">
    <table class="styled-table">
    <thead>
      <tr>
        <td>#</td>
        <td>Name Of car</td>
        <td>model</td>
        <td>color</td>
        <td>made in</td>
        <td>Buyer name</td>
        <td>Buyer Email</td>
        <td>Buyer Ph. num</td>
        <td>Buyer Address</td>
        <td>Remove</td>
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
            <td><button class="detail-btn btnn ">delete</button></td>
        </tr>
        <?php
      $i = 1;
      $rows = mysqli_query($conn, "SELECT * FROM table_upload_rentnow ORDER BY id DESC")
      ?>
      <?php foreach ($rows as $row) : ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row["cname"]; ?></td>
        <td><?php echo $row["cmodel"]; ?></td>
        <td><?php echo $row["ccolor"]; ?></td>
        <td><?php echo $row["cmadein"]; ?></td>
        <td><?php echo $row["urname"]; ?></td>
        <td><?php echo $row["uremail"]; ?></td>
        <td><?php echo $row["urphnum"]; ?></td>
        <td><?php echo $row["uradd"]; ?></td>
        <td><a href="orderdelete.php?id=<?php  $row['id']; ?>" class="delete-btn btnn"><button>delete</button></a></td>
      </tr>
      <?php endforeach; ?>
    </tbody>   
</table>
</div>
<!--  -->

<!-- deleted sweetlert -->
<!-- deleted sweetlert -->
  <?php if (isset($_GET['w'])) : ?>
      <div class="flash-data" data-flashdata="<?= $_GET['w']; ?>"></div>
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
<br><br><br>
<br><br><br>
