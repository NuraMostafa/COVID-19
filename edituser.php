<?php
require_once("connect.php");
if(isset($_GET['edit'])){
  $userID = $_GET['edit'];
  $query = "SELECT * FROM users WHERE id = '$userID'";
  $result = mysqli_query($connection, $query);
  if($result){
    $row = mysqli_fetch_array($result);
  }
}

if (isset($_POST['submit'])) {
    $email = $_POST['editemail'];
    $password=$_POST['editpassword'];
    $Gender = $_POST['editGender'];
    $Username = $_POST['editUsername'];
    $dateofbirth = $_POST['editdateofbirth'];
        $sql = "UPDATE `users` SET  `email` = '$email',`password` = '$password', `Gender` = '$Gender',`Username`= '$Username', `dateofbirth` = '$dateofbirth' WHERE `id` = '$userID'";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            echo "<script>alert('user updated successfully.');</script>";
            echo "<script>location.replace('adminview.php');</script>";
        } else {
            echo "<script>alert('Error updating user.');</script>";
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
    <title>Edit Users</title>
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

<body>
<?php include("header.php"); ?>

<section class="about_us padding_top">
<div class="container">
    <br><br>
    <h1 >Edit users</h1><br>
    
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-7">
          <div class="regervation_part_iner">

                    <div class="form-row">
                <div class="form-group col-md-6">

    <form method="POST" action="" enctype="multipart/form-data" >
    <h4 >Username</h4>
        <input  class="form-control" name = "editUsername" id="inputEmail4" placeholder="Username" value="<?php echo $row[5];?>"><br>
        <h4 >Email</h4>
        <input type="email" class="form-control" placeholder="Enter your email" required name="editemail" onkeyup="filter(this)" id="registeremail" value="<?php echo $row[1];?>"><br>
           <h4 >password</h4>
        <input type="password" class="form-control" placeholder="Enter your password" required name="editpassword" onkeyup="filter(this)" id="rwgisterpassword" value="<?php echo $row[2];?>"><br>

		<h4 >Select Gender</h4>
       <select name="editGender" class="form-control" id="Select">
      <option disabled="">Select Gender</option>

      <?php 
        if($row[4] == "Female"){ ?>
            <option selected>Female</option>
            <option>Male</option>
      <?php  }
      elseif($row[4] == "Male"){ ?>
            <option selected>Male</option>
            <option>Female</option>
      <?php }
      ?>


      </select required>
            <br>
            <h4 >Date of Birth</h4>
            <input type="date" name= "editdateofbirth" class="form-control" id="birthday" placeholder="Your Birthday" value="<?php echo $row[6];?>">

      <br>
        <div class="regerv_btn">
        <button type="submit" name="submit"class="btn_2">Update</button>
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