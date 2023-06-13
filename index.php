<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wel come page</title>
    <style>
         *{
            margin: 0px;
            padding: 0;
        } 
        .img{
            width: 100%;
            height: 775px;
            position: relative;
            background-image: url('resources/images/cars.webp');
            background-size: cover;
            background-repeat: no-repeat;
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
            width: 650px;
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
    </style>
</head>
<body>
    <div class="img">
            <h1 class="h111">Ethio <span>Vehicles</span></h1>
        <h5 class="img-h2">
        </h5>
        <div class="h2s">
            <h2>
                Lorem ipsum dolor sit, amet consec<span>tetur adipisicing elit. <br></span> 
                Rem ationem, nobisdita velit cons <span>ectetur?</span>
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
</body>
</html>
