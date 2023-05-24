<?php
    if(isset($_POST['submit'])){
        echo $_POST['name'];
        echo $_POST['model'];
        echo $_POST['engin'];
        echo $_POST['price'];
        echo $_POST['madein'];
        echo $_POST['colors'];
        echo $_POST['detailed'];
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="templates/big-form.css">
    <title>Add cars to selling page</title>
  </head>
  <body>
    <center>
      <h1>Add selling cars to the sell board..</h1>
    </center>
    <div class="container">
    <form action="add-selling.php" method="POST">
      <div class="fir">
        <label for="">Name of car:</label><br />
        <input type="text" id="larg" placeholder="Name" />
      </div>
      <div class="sec">
        <label for="">Model:</label><br />
        <input type="number" id="small" placeholder="Model" />
      </div>
      <div class="thr">
        <label for="">Engin type:</label><br />
        <input
          type="text"
          id="small"
          placeholder="Engin"
          style="width: 300px"
        />
      </div>
      <div class="four">
        <label for="">Price:</label>
        <br />
        <input type="number" id="small" placeholder="Price" />
      </div>
      <div class="fif">
        <label for="">Made in:</label>
        <br />
        <input type="text" id="small" placeholder="made in" />
      </div>
      <div class="six">
        <label for="">Available colors:</label>
        <br />
        <input type="text" id="larg" placeholder="colors" />
      </div>
      <div class="seven">
        <label for="">Detailed information:</label>
        <br />
        <input type="text" id="larger" />
      </div>
      <button>ADD</button>
    </form>
    </div>
  </body>
</html>
