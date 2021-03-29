<?php

require_once("connect.php");
?>
<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1 , shrink-to-fit=no">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
	a {
		color: #2554C7;
		margin-right: 60px;
		font-size: 100;
		width: 200px;

	}
</style>
</head>
<body>

<header class="main_menu home_menu">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-12">
<nav class="navbar navbar-expand-lg navbar-light">
<a href="Home.php"> <img src="img/Coronavirus-Raw-Materials.png" alt="logo"> </a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse main-menu-item justify-content-center" id="navbarSupportedContent">

<ul class="navbar-nav mr-auto">

<?php if (isset($_SESSION['User_type'])) {

  if ($_SESSION['User_type'] == "Doctor") { ?>
		<li class="nav-item active">
			<a   href="home.php">Home</a>
		</li>
		<li class="nav-item active">
		<a  href="logout.php">Logout</a>
	</li>
	<?php } 

	 if ($_SESSION['User_type'] == "Patient") { ?>

		<li class="nav-item active">
		<a  href="test.php"> Tests</a>
	</li>

		<li class="nav-item active">
		<a href="results.php"> Results</a>
	</li>
		<li class="nav-item active">
		<a  href="logout.php"> Logout</a>
	</li>
	<?php } 

	 if ($_SESSION['User_type'] == "Admin") { ?>

		<li class="nav-item active">
			<a   href="adminview.php" >View Users</a>
		</li>
<li class="nav-item active">
<a   href="logout.php"> Logout</a>
</li>
<?php } ?>
	
<?php 



} 

else { ?>

	<li class="nav-item active">
	<a href="home.php">Home</a>
	</li>

	<li class="nav-item">
<a href="register.php">Signup</a>
</li>
<li class="nav-item">
<a  href="login.php">Login</a>
</li>
	
<?php } ?>
</ul>
<!-- <ul class="navbar-nav align-items-center">
<li class="nav-item active">
<a href="index.html">Home</a>
</li>



<li class="nav-item">
<a  href="login.php">Login</a>
</li>
<li class="nav-item">
<a href="register.php">Signup</a>
</li>
<li class="nav-item">
<a href="Contact.php">Contact</a>
</li>
</ul> -->
</div>
</nav>
</div>
</div>
</div>
</header>
</html>
