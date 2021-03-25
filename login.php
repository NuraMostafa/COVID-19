<?php
require_once("connect.php");

if(isset($_SESSION['userID'])){
    header("Location:index.php");
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $userID = $row[0];
            $userEmail = $row[1];
            $userType = $row[4];
            $_SESSION['userID'] = $userID;
            $_SESSION['userEmail'] = $userEmail;
            $_SESSION['userType'] = $userType;
            header("Location: doctorview.php");
        } else {
            echo "<script>alert('Invalid username or password please try again.')</script>";
        }
    } else {
        echo "<script>alert('Error performing query, please try agian.')</script>";
    }
}
?>

<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no,
    initial-scale=1, shrink-to-fit=no,  maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
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
     <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
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
<?php include("nav.php"); ?>
<section class="our_depertment section_padding">
		<div class="container">

			<div class="row align-items-center regervation_content">
				<div class="col-lg-7">
					<div class="regervation_part_iner">
    <br><br>

    
    
	<form>
    <h1 style="color:white;">Login</h1><br>
    <div class="form-row">
	<div class="form-group col-md-6">
        <h4 style="color:white;">Email</h4>
        <input type="email" class="form-control" placeholder="Enter your email" required name="email" required onkeyup="filter(this)" id="loginemail"><br><br>
        <h4 style="color:white;">Password</h4>
        <input type="password" class="form-control" placeholder="Enter your password" required name="password" required onkeyup="filter(this)" id="loginpassword">
        </div>
        </div>
        <br><br>
        </div>
        <div class="regerv_btn">
        <button type="submit" name="submit" class="btn_2">Login</button>
        </div>
       
    </form>
    </div>
    </div>
	</div>
</div>
</section>
</body>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/owl.carousel.js"></script>
<script src="js/main.js"></script>
<script>
    new WOW().init();
</script>


<!-- <!doctype html>
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
	<style>
	body {
		padding: 100px;
	}
	h1 {
		
		font-weight: 700;
		color: #ffffff;
		font-size: 44px;
		
	}
	
</style>
</head>
<body>
	<section class="our_depertment section_padding">
		<div class="container">

			<div class="row align-items-center regervation_content">
				<div class="col-lg-7">
					<div class="regervation_part_iner">
						<form>
							<h1>SignIn</h1>
							<br/><br/>
							<div class="form-row">
								<div class="form-group col-md-6">

									
									
									<input  class="form-control" id="inputEmail4" placeholder="Username">
									<input  type="password" class="form-control" id="inputEmail4" placeholder="Password">
									
									



								</div>
								<br/><br/>



							</div>
							<div class="regerv_btn">
								<a href="#" class="btn_2">SignIn</a>
							</div>
						</form>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</section>
</body> -->
