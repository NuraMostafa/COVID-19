<?php
require_once("../app/db/dbh.php");
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
<link rel="icon" href="assets/img/favicon.png">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/css/animate.css">

<link rel="stylesheet" href="assets/css/owl.carousel.min.css">

<link rel="stylesheet" href="assets/css/themify-icons.css">

<link rel="stylesheet" href="assets/css/flaticon.css">

<link rel="stylesheet" href="assets/css/magnific-popup.css">

<link rel="stylesheet" href="assets/css/nice-select.css">

<link rel="stylesheet" href="assets/css/slick.css">

<link rel="stylesheet" href="assets/css/style.css">
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
<a href="Home.php"> <img src="assets/img/Coronavirus-Raw-Materials.png" alt="logo"> </a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse main-menu-item justify-content-center" id="navbarSupportedContent">

<ul class="navbar-nav mr-auto">

<?php if (isset($_SESSION['userType'])) {

  if ($_SESSION['userType'] == "Doctor") { ?>
		<li class="nav-item active">
			<a   href="home.php">Home</a>
		</li>
		<li class="nav-item active">
		<a  href="user.php?type=logout">Logout</a>
	</li>
	<?php } 

	 if ($_SESSION['userType'] == "Patient") { ?>

		<li class="nav-item active">
		<a  href="tests.php"> Tests</a>
	</li>

		<li class="nav-item active">
		<a href="results.php"> Results</a>
	</li>
		<li class="nav-item active">
		<a  href="user.php?type=logout"> Logout</a>
	</li>
	<?php } 

	 if ($_SESSION['userType'] == "Admin") { ?>

		<li class="nav-item active">
			<a   href="admin.php" >View Users</a>
		</li>
<li class="nav-item active">
<a   href="user.php?type=logout"> Logout</a>
</li>
<?php } ?>
	
<?php 



} 

else { ?>

	<li class="nav-item active">
	<a href="index.php">Home</a>
	</li>

	<li class="nav-item">
<a href="user.php?type=register">Sign Up</a>
</li>
<li class="nav-item">
<a  href="user.php">Login</a>
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
