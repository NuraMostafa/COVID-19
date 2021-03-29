

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
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
    <h1 >Login</h1><br>
    
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-7">
          <div class="regervation_part_iner">

                    <div class="form-row">
                <div class="form-group col-md-6">

    <form method="POST" action="loginphp.php" enctype="multipart/form-data" >
 
        <h4 >Email</h4>
        <input type="email" class="x" placeholder="Enter your email" required name="email" onkeyup="filter(this)" id="registeremail"><br>
        <h4 >Password</h4>
        <input type="password" class="x" placeholder="Enter your password" required name="password" onkeyup="filter(this)" id="registerpassword"><br>
    
        <div class="regerv_btn">
        <button type="submit" name="submit"class="btn_2">Login</button>
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