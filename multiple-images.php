<?php
      //connect to database
    $conn = mysqli_connect('localhost','sallah','test1234', 'train');
    if(!$conn){
        echo 'Connection error: '.mysqli_connect_error();
    }
    if(isset($_POST['submit'])){
        $imageCount = count($_FILES['image']['name']);
        for($i = 0; $i < $imageCount; $i++){
            $imageName = $_FILES['image']['name'][$i];
            $imageTempName = $_FILES['image']['tmp_name'][$i];
            $TargetPath = "./uploads/".$imageName;
            if(move_uploaded_file($imageTempName, $TargetPath)){
                $sql = "INSERT INTO imagestable(image) VALUES ('$imageName')";
                $result = mysqli_query($conn , $sql);
            }
        } 
        if($result){
            header('location: multiple-images.php?msg=ins');
        }
    }





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style = "align: center;">
    <h1>uploading multiple images</h1>
    <?php
        if(isset($_GET['msg']) AND $_GET['msg']=='ins'){
            echo '<h4>Images uploaded successfully....!</h4>';
        } 
    ?>
    <form action="multiple-images.php" method="POST" enctype="multipart/form-data">
        <label for="">Upload images to display them:</label><br>
        <input type="file" name="image[]" multiple><br><br>
        <input type="submit" name="submit" value="upload">
    </form>
    <br>
    <?php
        $sql = "SELECT * FROM imagestable";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while($fetch = mysqli_fetch_assoc($result)){
            ?>
            <img src="uploads/<?php $fetch[$imageName];?> ">
            <?php
            }
        }
        ?>
</body>
</html>