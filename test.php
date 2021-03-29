<?php
require_once("connect.php");



if(isset($_POST['submit'])){
    $CPR = $_POST['CPR'];
    $Ferritin = $_POST['Ferritin'];
    $LDH = $_POST['LDH'];
    $ALT = $_POST['ALT'];
    $CBC = $_POST['CBC'];
    $DDimer = $_POST['DDimer'];
    $AST = $_POST['AST'];
    $email = $_POST['email'];
  $image = $_FILES['image']['name'];
  $target = "img/" . basename($image);
  $query = "INSERT INTO tests (`CPR`, `Ferritin`, `LDH`, `ALT`, `CBC`, `DDimer`, `AST`, `email`, `image`) VALUES ('$CPR', '$Ferritin', '$LDH', '$ALT', '$CBC', '$DDimer', '$AST', '$email','$target')";
  $result = mysqli_query($connection, $query);
  if($result){
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      echo "<script>alert('Image uploaded successfully, thank you.')</script>";
    }
    echo "<script>alert('Data Uploaded successfully.')</script>";
  }
  else {
    echo "<script>alert('Error performing query, please try again.')</script>";
  }
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tests</title>
    <link rel="stylesheet" href="css/animate.css">
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
</head>

<body>
<?php include("header.php"); ?>
<section class="about_us padding_top">
<div class="container">
<div class="row justify-content-between align-items-center">

<div class="col-md-6 col-lg-6">
<div >
<img src="img/top_service.png" alt="">
</div>
</div>
    
    <div class="col-md-6 col-lg-5">
	
    <div class="row align-items-center regervation_content">
    
        <div class="col-lg-7">
        <h1>Tests</h1> 
        <br><br>
            <div class="regervation_part_iner">
    <form method="POST" action="" enctype="multipart/form-data" >
       
       
        <input style="color: black;" type="file" accept="img/*" name="image"><br><br>
        <h4 >Email:</h4>
        <input type="email" class="x" placeholder="Enter your email..." required name="email" onkeyup="filter(this)" id="email"><br><br>
        <h4 >CRP:</h4>
        <input type="number" class="x" placeholder="CPR" name="CPR" onkeyup="filter(this)" id="CPR"><br><br>
        <h4 >Ferritin:</h4>
        <input type="number" class="x" placeholder="Ferritin" name="Ferritin" onkeyup="filter(this)" id="Ferritin"><br><br>
        <h4 >LDH:</h4>
        <input type="number" class="x" placeholder="LDH" name="LDH" onkeyup="filter(this)" id="LDH"><br><br>
        <h4 >ALT:</h4>
        <input type="number" class="x" placeholder="ALT" name="ALT" onkeyup="filter(this)" id="ALT"><br><br>
        <h4 >CBC:</h4>
        <input type="number" class="x" placeholder="CBC" name="CBC" onkeyup="filter(this)" id="CBC"><br><br>
        <h4 >D-Dimer:</h4>
        <input type="number" class="x" placeholder="DDimer" name="DDimer" onkeyup="filter(this)" id="DDimer"><br><br>
        <h4 >AST:</h4>
        <input type="number" class="x" placeholder="AST" name="AST" onkeyup="filter(this)" id="AST"><br><br>

        <div class="regerv_btn"><button type="submit" name="submit"class="btn_2">Submit</button></div><br><br>

    </form>
    </div>
    </div>
</div>
</div>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/owl.carousel.js"></script>
<script src="js/main.js"></script>
<script>
    new WOW().init();
</script>

</script>
</section>
<?php include("footer.php"); ?>
</body>
</html>
