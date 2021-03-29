
<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>COVID</title>
    <link rel="icon" href="img/favicon.png">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="css/themify-icons.css">

    <link rel="stylesheet" href="css/flaticon.css">

    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/nice-select.css">

    <link rel="stylesheet" href="css/slick.css">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <br/><br/>
    <?php include("header.php"); ?>
       <section class="about_us padding_top">
<div class="container">
    <br><br>
    <h1 >Add Patient</h1><br>
    
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-7">
          <div class="regervation_part_iner">

                    <div class="form-row">
                <div class="form-group col-md-6">

    <form method="POST" action="addpatientphp.php" enctype="multipart/form-data" >
    <h4 >Username</h4>
        <input  class="x" name = "Username" id="inputEmail4" placeholder="Username"><br>
        <h4 >Email</h4>
        <input type="email" class="x" placeholder="Enter your email" required name="email" onkeyup="filter(this)" id="registeremail"><br>
        <h4 >Select Gender</h4>
       <select name="Gender" class="x" id="Select">
      <option selected>Select Gender</option>
      <option >Male</option>
      <option >Female</option>
    
      </select required>
            <br>
            <h4 >Date of Birth</h4>
            <input type="date" name= "dateofbirth" class="x" id="birthday" placeholder="Your Birthday">

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

<?php include("footer.php"); ?>
</body>
</html>
