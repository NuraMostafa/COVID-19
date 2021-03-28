<?php
require_once("connect.php");

if(isset($_SESSION['userID'])){
    header("Location:index.php");
}

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $Gender = $_POST['Gender'];
    $Username = $_POST['Username'];
    $dateofbirth = $_POST['dateofbirth'];


   // $image = $_FILES['image']['name'];
    //$target = "images/" . basename($image);


    $query = "INSERT INTO users(email,password,User_type,Gender,Username,dateofbirth) VALUES ('$email','$password',2,'$Gender','$Username','$dateofbirth')";

    $result = mysqli_query($connection, $query);

    if($result){
       // if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
         //   echo "<script>alert('Registration success.')</script>";
        //} else {
          //  echo "<script>alert('Registration fail.')</script>";
       // }
        $query2 = "SELECT * FROM users WHERE email = '$email'";
        $result2 = mysqli_query($connection, $query2);
        if($result2){
            if(mysqli_num_rows($result2) > 0 ){
                $row = mysqli_fetch_array($result2);
                $userID = $row[0];
                $userEmail = $row[1];
                $userType = $row[3];
                $Username = $row[6];


                $_SESSION['userID'] = $userID;
                $_SESSION['userEmail'] = $userEmail;
                $_SESSION['userType'] = $userType;
                $_SESSION['Username'] = $Username;

                echo "<script>location.replace('index.php');</script>";
            }
        }
        else {
            echo "<script>alert('Error performing query, please try agian.')</script>";
        }
        
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
    <title>Register</title>
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="icon" href="img/favicon.png">

  <link rel="stylesheet" href="css/themify-icons.css">

  <link rel="stylesheet" href="css/flaticon.css">

  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/nice-select.css">

  <link rel="stylesheet" href="css/slick.css">

  <link rel="stylesheet" href="css/style.css">
</head>
<!-- <style>
h1 {
    
    font-weight: 700;
    color: #ffffff;
    font-size: 44px;
    
  }
    </style> -->
<!-- <style>
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
</style> -->
<body>
<?php include("header.php"); ?>





<!-- <div class="row justify-content-between align-items-center">

<div class="col-md-6 col-lg-6">
  <h1> </h1>
<div class="about_us_img">
<img src="img/top_service.png" alt="">
</div>
</div>

<div class="col-md-6 col-lg-5">
  
      <div class="row align-items-center regervation_content">
        <div class="col-lg-7">
          <div class="regervation_part_iner">
            <form>
              
              <br/><br/>
              <div class="form-row">
                   <form class="form-group col-md-6">
                    <label>CT scan</label>
     <input  class="form-control" id="inputEmail4" >
     <input type="file" id="myFile" name="filename">
      <label>CRP test</label>
     <input  class="form-control" id="inputEmail4" >
           <label>D-Dimer test</label>
     <input  class="form-control" id="inputEmail4" >
           <label>Ferritin</label>
     <input  class="form-control" id="inputEmail4" >
           <label>LDH</label>
     <input  class="form-control" id="inputEmail4" >
           <label>ALT</label>
     <input  class="form-control" id="inputEmail4" >
           <label>AST</label>
     <input  class="form-control" id="inputEmail4" >
          <label>CBC</label>
     <input  class="form-control" id="inputEmail4" >
     <b></b>
  
    
                <a href="#" class="btn_2">Submit</a>
              

        </form>
                

                  
                



</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</section> -->


<section class="about_us padding_top">
<div class="container">
    <br><br>
    <h1 >Register</h1><br>
    
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-7">
          <div class="regervation_part_iner">

                    <div class="form-row">
                <div class="form-group col-md-6">

    <form method="POST" action="" enctype="multipart/form-data" >
    <h4 >Username</h4>
        <input  class="form-control" name = "username" id="inputEmail4" placeholder="Username"><br>
        <h4 >Email</h4>
        <input type="email" class="form-control" placeholder="Enter your email" required name="email" onkeyup="filter(this)" id="registeremail"><br>
        <h4 >Password</h4>
        <input type="password" class="form-control" placeholder="Enter your password" required name="password" onkeyup="filter(this)" id="registerpassword"><br>
        <h4 >Confirm Password</h4>
        <input type="password" class="form-control" id="inputEmail4" placeholder="Confirm Password" required name="Confirmpassword" onkeyup="filter(this)" id="registerconfirmpassword"><br>
        <h4 >Select Gender</h4>
       <select name="Gender" class="form-control" id="Select">
      <option selected>Select Gender</option>
      <option >Male</option>
      <option >Female</option>
      

      </select required>
            <br>
            <h4 >Date of Birth</h4>
            <input type="date" name= "dateofbirth" class="form-control" id="birthday" placeholder="Your Birthday">

      <br>
        <!-- <input type="file" accept="image/*" name="image" ><br><br> -->
        <div class="regerv_btn">
        <button type="submit" name="submit"class="btn_2">Submit</button>
        </div>
        </div>
    </form>
    </div>
    </div>
    </div>
    <div class="col-lg-5 col-md-6">
          <div class="reservation_img">
            <img src="img/reservation.png" alt="" class="reservation_img_iner">
          </div>
        </div>
</div>
</div>
</section>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/owl.carousel.js"></script>
<script src="js/main.js"></script>
<script>
    new WOW().init();
</script>
<?php include("footer.php"); ?>
</body>
</html>
