<?php
$conn = mysqli_connect("localhost", "root", "", "mydb");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <title>Wel come page</title>
    <style>
         *{
            margin: 0px;
            padding: 0;
        } 
        .img{
            height: 100vh;
            position: relative;
            background-image: url('resources/images/cars.webp');
            background-repeat: no-repeat;
            background-color: #cccccc;
            background-size: cover;
        }
        @font-face {
            font-family: main-logo;
            src: url(resources/fonts/Speed_Normal.ttf);
          }
          @font-face {
            font-family: txt-font;
            src: url(resources/fonts/mybest.ttf);
          }
          .img h1 {
            font-size: 60px;
            position: absolute;
            margin: 80px 0 0 100px;
            color: aliceblue;
            font-family: main-logo;
          }
          .img-h2{
            color: aqua;
            font-size: 20px;
            position: relative;
            margin: 0px 0 0 300px;
            font-family: main-logo;
          }
          .img h4{
            color: rgb(204, 128, 14);
            font-size: 30px;
            position: absolute;
            margin: 36px 0 0 770px;
            font-family: txt-font;
          }
          span{
            color: rgb(204, 128, 14);
          }
          .h2s{
            width: 890px;
            height: 200px;
            position: absolute; 
            text-align: left;
            margin: 145px 0 0 100px;
          }
          .h2s h2{
            color: rgb(255, 254, 253);
            font-family: txt-font;
          }
          .btns{
            position: absolute;
            margin: 82vh 0 0 20vh;
            justify-content: space-between;
            align-items: center;
            display: flex;
          }
          button{
            width: 210px;
            height: 50px;
            border-radius: 0 50% 0 50%;
            background-color: rgb(204, 128, 14);
            margin-left: 80px;
            cursor: pointer;
            z-index: 2;
          }
          button:hover{
            background-color: rgb(51, 45, 45);
            text-color: white;
            transition-duration: 0.7s;
            transform-origin: left;
            border-radius: 0 60% 10% 40%;
          }
          .btns p:hover{
            color: aliceblue;
            transition-duration: 0.3s;
          }
          .btns p{
            font-size: 30px;
          }
          .h111{
          
          }





          /*  */
          /*  */
          .direction{
    text-align: center;
}
.direction button{
    font-family: cursive;
    font-weight: bold;
    background-color: #ffffff44;
    border:none;
    width:50px;
    height:50px;
    border-radius: 50%;
    transition: 0.5s;
    margin:0 10px;
}
.direction button:hover{
    background-color: #ffffff;
}
.item{
    border-radius: 15px;
    width:300px;
    height:500px;
    overflow: hidden;
    transition: 0.05s;
    margin:10px;
    scroll-snap-align: start;
    background: #ffff;
  text-align: center;
}
#list{
    display: flex;
    width:max-content;
}
.text{
  z-index: 2;
  color: rgba(5,1,24,5);
}
#formList{
    width:1280px;
    max-width: 100%;
    overflow: auto;
    margin:100px auto 50px;
    scroll-behavior: smooth;
    scroll-snap-type: both;
}
#formList::-webkit-scrollbar{
    display: none;
}
@media screen and (max-width: 1024px){
    .item{
        width: calc(33.3vw - 20px);
    }
    .direction{
        display: none;
    }
}
@media screen and (max-width: 768px){
    .item{
        width: calc(50vw - 20px);
    }
    .direction{
        display: none;
    }
}
img {
  width: 105.4%;
  margin-left: -8px;
  margin-top: -8px;
  height: 200px;

}
.backgr{
  width: 89%;
  height: 670px;
  position: absolute;
  z-index: -2;
  margin: 68px 0 0 80px;
  
  background: radial-gradient(circle, rgba(35,76,101,1) 0%, rgba(5,6,24,1) 61%, rgba(41,138,158,1) 100%);
  border-radius: 25px;
}
/* #prev, #next{
  font-size: 50px;
  margin-top: -11px;
  position: absolute;

} */
.direction img{
  width: 65px;
  height: 50px;
  
}
.direction button{
  background-color: transparent;
}
.direction button:hover{
  background-color: transparent;
  cursor: pointer;
}
.nxt{
  margin-left: 40px;
}
.pre{
  margin-left: -40px;
}



/*  */
/*  */
/*  */
      .direction2{
    text-align: center;
}
.direction2 button{
    font-family: cursive;
    font-weight: bold;
    background-color: #ffffff44;
    border:none;
    width:50px;
    height:50px;
    border-radius: 50%;
    transition: 0.5s;
    margin:0 10px;
}
.direction2 button:hover{
    background-color: #ffffff;
}
.item2{
    border-radius: 15px;
    width:300px;
    height:500px;
    overflow: hidden;
    transition: 0.05s;
    margin:10px;
    scroll-snap-align: start;
    background: #ffff;
  text-align: center;
}
#list2{
    display: flex;
    width:max-content;
}
#formList2{
    width:1280px;
    max-width: 100%;
    overflow: auto;
    margin:100px auto 50px;
    scroll-behavior: smooth;
    scroll-snap-type: both;
}
#formList2::-webkit-scrollbar{
    display: none;
}
@media screen and (max-width: 1024px){
    .item2{
        width: calc(33.3vw - 20px);
    }
    .direction2{
        display: none;
    }
}
@media screen and (max-width: 768px){
    .item2{
        width: calc(50vw - 20px);
    }
    .direction2{
        display: none;
    }
}
img {
  width: 105.4%;
  margin-left: -8px;
  margin-top: -8px;
  height: 200px;

}
.backgr2{
  width: 89%;
  height: 670px;
  position: absolute;
  z-index: -2;
  margin: 65px 0 0 80px;
  background: radial-gradient(circle, rgba(35,76,201,1) 0%, rgba(5,6,24,1) 61%, rgba(11,138,158,1) 100%);

  border-radius: 25px;
}

.direction2 img{
  width: 65px;
  height: 50px;
  
}
.direction2 button{
  background-color: transparent;
}
.direction2 button:hover{
  background-color: transparent;
  cursor: pointer;
}
.nxt2{
  margin-left: 40px;
}
.pre2{
  margin-left: -40px;
}
.my{
  font-size: 30px;
  position: absolute;
  margin: 20px 0 0 90px;
}



   @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
/* body{
  line-height: 1.5;
  font-family: 'Poppins', sans-serif;
} */
/* *{
  margin:0;
  padding:0;
  box-sizing: border-box;
} */
.footer .container{
  line-height: 1.5;
  font-family: 'Poppins', sans-serif;
  max-width: 1170px;
  margin:auto;
  
}
.row{
  display: flex;
  flex-wrap: wrap;
}
ul{
  list-style: none;
}
.footer{
  background-color: #24262b;
  
    padding: 70px 0;
    margin:0;
  
  box-sizing: border-box;
}
.footer-col{
   width: 24%;
   padding: 0 15px;
}
.footer-col h4{
  font-size: 18px;
  color: #ffffff;
  text-transform: capitalize;
  margin-bottom: 35px;
  font-weight: 500;
  position: relative;
}
.footer-col h4::before{
  content: '';
  position: absolute;
  left:0;
  bottom: -10px;
  background-color: #e91e63;
  height: 2px;
  box-sizing: border-box;
  width: 50px;
}
.footer-col ul li:not(:last-child){
  margin-bottom: 10px;
}
.footer-col ul li a{
  font-size: 16px;
  text-transform: capitalize;
  color: #ffffff;
  text-decoration: none;
  font-weight: 300;
  color: #bbbbbb;
  display: block;
  transition: all 0.3s ease;
}
.footer-col ul li a:hover{
  color: #ffffff;
  padding-left: 8px;
}
.footer-col .social-links a{
  display: inline-block;
  height: 40px;
  width: 40px;
  background-color: rgba(255,255,255,0.2);
  margin:0 10px 10px 0;
  text-align: center;
  line-height: 40px;
  border-radius: 50%;
  color: #ffffff;
  transition: all 0.5s ease;
}
.footer-col .social-links a:hover{
  color: #24262b;
  background-color: #ffffff;
}

/*responsive*/
@media(max-width: 767px){
  .footer-col{
    width: 50%;
    margin-bottom: 30px;
}
}
@media(max-width: 574px){
  .footer-col{
    width: 100%;
}
}
#social-links{
  position: absolute;
  right: 0;
  margin: 0px 100px 0 0;
}
.fin{
  width: 400px;
}
.fin p{
  position: absolute;
  color: #bbbbbb;
  margin-top: 39px;
  font-family: 'Poppins', sans-serif;
  font-size: 15px;
}

    </style>
</head>
<body>
    <div class="img">
            <h1 class="h111">Ethio <span>Vehicles</span></h1>
        <h5 class="img-h2">
        </h5>
        <div class="h2s">
            <h2>
                  
                Buy & Rent  your  own  cars  <span> Down  the  street  or  across the country, </span> <br>
                find the perfect vehicle <span> for your next adventure!</span>
            </h2>
        </div>
        <h4>Home of Veheicles!</h4>
        <div class="btns">
          <a href="selling-page.php"><button><p>Buy car</p></button></a>
          <a href="Renting-page.php"><button><p>Rent car</p></button></a>
          <a href="Home.php"><button><p>Go to Home</p></button></a>
          <a href="admin/admin-login.php"><button><p>I'm Admin</p></button></a>
        </div>
        
    </div>
    <!--  -->
    <!--  -->
    <!--  -->
    <br>
    <br>
    <br>
    <div class="backgr"></div>
    <p class="my">find & Buy the perfect vehicle for your next adventure!</p>
    <div id="formList">
      <marquee behavior="" direction="right">
      <div id="list">
        <?php 
            $rows = mysqli_query($conn, "SELECT * FROM table_uploads ORDER BY id DESC");            
            ?>
            <?php foreach ($rows as $row){ ?>
                    <!-- <div id="carList" class=" car-list" style="flex-wrap: wrap;">
                      -->
                      <div class="item">
                            <img src="selling/uploads/<?php echo $row["profile"];?>" title="<?php echo $row['profile']; ?>" >
                            <div class="text">
                              <br>
                                <h3><?php echo ($row['name']); ?></h3>
                              <br>
                                <h3><?php echo ($row['price']); ?></h3>
                              <br>
                                <p>
                                Model: <b><?php echo ($row['model']); ?></b><br>
                                Engin type: <b><?php echo ($row['engin']); ?></b><br>
                                Made in: <b><?php echo ($row['madein']); ?></b><br>
                                Available-color: <b><?php echo ($row['colors']); ?></b><br>

                                </p>
                                
                            </div>
                        </div>
                        <?php } ?>
      
                      </div>
                      </marquee>
      
                    </div>
    </div>

    
    <div class="direction">
      <button id="prev"><img src="resources/images/left-arrow.png" class="pre" alt=""></button>
      <button id="next"><img src="resources/images/right-arrow.png" class="nxt" alt=""></button>
    </div>
    <script>
        document.getElementById('next').onclick = function(){
        const widthItem = document.querySelector('.item').offsetWidth;
        document.getElementById('formList').scrollLeft += widthItem;
          }
        document.getElementById('prev').onclick = function(){
        const widthItem = document.querySelector('.item').offsetWidth;
        document.getElementById('formList').scrollLeft -= widthItem;
        }
    </script>
    
    <!--  -->
    <!--  -->
    <!--  -->
    <!--  -->
<br><br>
<br>
<p class="my">find & Rent the perfect vehicle for your next adventure!</p>
    <div class="backgr2"></div>
    <div id="formList2">
      <marquee behavior="" direction="left">
        <div id="list2">
          <?php 
            $rows = mysqli_query($conn, "SELECT * FROM table_upload_rent ORDER BY id DESC");            
            ?>
            <?php foreach ($rows as $row){ ?>
                    <!-- <div id="carList" class=" car-list" style="flex-wrap: wrap;">
                      -->
                      <div class="item2">
                            <img src="renting/uploads/<?php echo $row["profile"];?>" title="<?php echo $row['profile']; ?>" style="height: 200px;">
                    <div class="text">
                        <h2><?php echo ($row['name']); ?></h2><br>
                        <h3>$<?php echo ($row['price']); ?></h3><br>
                        <p>
                        Model: <b><?php echo ($row['model']); ?></b><br>
                        Engin type: <b><?php echo ($row['engin']); ?></b><br>
                        Made in: <b><?php echo ($row['madein']); ?></b><br>
                        Available-color: <b><?php echo ($row['colors']); ?></b><br>
                        </p>
                    </div>
                        
                </div>
            <?php } ?>
            </div>
            </marquee>

       </div>
    </div>

    
    <div class="direction2">
      <button id="prev2"><img src="resources/images/left-arrow.png" class="pre2" alt=""></button>
      <button id="next2"><img src="resources/images/right-arrow.png" class="nxt2" alt=""></button>
    </div>
    <script >
        document.getElementById('next2').onclick = function(){
        const widthItem = document.querySelector('.item2').offsetWidth;
        document.getElementById('formList2').scrollLeft += widthItem;
          }
        document.getElementById('prev2').onclick = function(){
        const widthItem = document.querySelector('.item2').offsetWidth;
        document.getElementById('formList2').scrollLeft -= widthItem;
        }
    </script>
  




<br><br>
<br>
<br>

<br><br>
<br>
<br>
<br><br>
<br>
<br>
 <footer class="footer">
     <div class="container">
      <div class="row">
        <div class="footer-col">
          <h4>company</h4>
          <ul>
            <li><a href="#">about us</a></li>
            <li><a href="#">our services</a></li>
            <li><a href="#">privacy policy</a></li>
            <li><a href="#">affiliate program</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>get help</h4>
          <ul>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">shipping</a></li>
            <li><a href="#">returns</a></li>
            <li><a href="#">order status</a></li>
            <li><a href="#">payment options</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>car shop</h4>
          <ul>
            <li><a href="#">Toyota</a></li>
            <li><a href="#">hayunda</a></li>
            <li><a href="#">Revo</a></li>
            <li><a href="#">Pick-up</a></li>
          </ul>
        </div>
        <div class="footer-col" id="social-links">
          <h4>follow us</h4>
          <div class="social-links">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-whatsapp"></i></a>
            <a href="#"><i class="fab fa-telegram"></i></a><br>
            <a href="#"><i class="fab fa-google"></i></a>
            <a href="#"><i class="fab fa-telegram"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
          </div>
        </div>
      </div>
     </div>
     <center>
      <div class="fin">

        <p>©2023 Ethio-Vehicles | ASTU, Adama, Ethiopia | Version 1.0</p></center>
      </div>
  </footer>

</body>
</html>