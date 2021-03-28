<?php
require_once("connect.php");

if(isset($_SESSION['userID'])){
    header("Location:index.php");
}

if(isset($_POST['submit1'])){
  $image = $_FILES['image']['name'];
  $target = "images/" . basename($image);
  $query = "INSERT INTO tests (`CPR`, `Ferritin`, `LDH`, `ALT`, `CBC`, `DDimer`, `AST`, `email`, `image`) VALUES ('Empty', 'Empty', 'Empty', 'Empty', 'Empty', 'Empty', 'Empty', 'Empty', '$target')";
  $result = mysqli_query($connection, $query);
  if($result){
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      echo "<script>alert('Image uploaded successfully, thank you.')</script>";
    }
    else {
      echo "<script>alert('Error uploading image, please try again.')</script>";
    }
  }
  else {
    echo "<script>alert('Error performing query, please try again.')</script>";
  }
}


if(isset($_POST['submit2'])){
    $CPR = $_POST['CPR'];
    $Ferritin = $_POST['Ferritin'];
    $LDH = $_POST['LDH'];
    $ALT = $_POST['ALT'];
    $CBC = $_POST['CBC'];
    $DDimer = $_POST['DDimer'];
    $AST = $_POST['AST'];
    $email = $_POST['email'];
    
    $query = "INSERT INTO tests (`CPR`, `Ferritin`, `LDH`, `ALT`, `CBC`, `DDimer`, `AST`, `email`, `image`) VALUES ('$CPR', '$Ferritin', '$LDH', '$ALT', '$CBC', '$DDimer', '$AST', '$email', 'Empty')";
    $result = mysqli_query($connection, $query);

    if($result){
      echo "<script>alert('Data submitted successfully, thank you.')</script>";
    }
    else {
        echo "<script>alert('Error performing query, please try agian.')</script>";
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
</head>
<style>
  body {
            text-align: center;
            align: center;

        }

.x {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.sub {
  width: 300px;
  background-color: blue;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.sub:hover {
  background-color: #45a049;
}

.form{
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<body>
<?php include("nav.php"); ?>
<div class="container">
    <br><br>
    <h1 style="text-align: center;" id="title">Do you wish to submit an image or the full data?</h1><br>
    <div id="buttonsdiv">
    <button onclick="form1();" class="btn btn-dark">Image Only</button>
    <button onclick="form2()" class="btn btn-info">Full Data</button>
  </div>
    <div class="form" id="form1">
    <form method="POST" action="" enctype="multipart/form-data" style="text-align: center;">
        <input type="file" accept="image/*" name="image"><br><br>
        <button type="submit" name="submit1" class="sub" class="btn btn-primary">Submit</button>
    </form>
</div>
  <div class="form" id="form2">
    <form method="POST" action="" enctype="multipart/form-data" style="text-align: center;">
        <input type="email" class="x" placeholder="Enter your email..." name="email" onkeyup="filter(this)" id="email"><br><br>
        <input type="number" class="x" placeholder="CPR" name="CPR" onkeyup="filter(this)" id="CPR"><br><br>
        <input type="number" class="x" placeholder="Ferritin" name="Ferritin" onkeyup="filter(this)" id="Ferritin"><br><br>
        <input type="number" class="x" placeholder="LDH" name="LDH" onkeyup="filter(this)" id="LDH"><br><br>
        <input type="number" class="x" placeholder="ALT" name="ALT" onkeyup="filter(this)" id="ALT"><br><br>
        <input type="number" class="x" placeholder="CBC" name="CBC" onkeyup="filter(this)" id="CBC"><br><br>
        <input type="number" class="x" placeholder="DDimer" name="DDimer" onkeyup="filter(this)" id="DDimer"><br><br>
        <input type="number" class="x" placeholder="AST" name="AST" onkeyup="filter(this)" id="AST"><br><br>
        <button type="submit" name="submit2" class="sub" class="btn btn-primary">Submit</button>
    </form>
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
<script type="text/javascript">
  $("#form1").hide();
  $("#form2").hide();
  function form1(){
    $("#form1").show();
    $("#title").html("Please submit the required data.");
    $("#buttonsdiv").hide();
  }

  function form2(){
    $("#form2").show();
    $("#title").html("Please submit the required data.");
    $("#buttonsdiv").hide();
  }
</script>
</body>
</html>
