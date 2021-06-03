<?php
session_start();
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Users.php");
require_once(__ROOT__ . "controller/UsersController.php");
require_once(__ROOT__ . "view/ViewUser.php");

$model = new Users();
$controller = new UsersController($model);
$view = new ViewUser($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
	$controller->{$_GET['action']}();
}

if(isset($_POST['login']))	{
	$email=$_REQUEST["email"];
	$password=$_REQUEST["password"];
	$sql = "SELECT * FROM users where email='$email' and password='$password'";
	$dbh = new Dbh();
	$result = $dbh->query($sql);
	if ($result->num_rows == 1){
		$row = $dbh->fetchRow();
		$_SESSION["id"]=$row["id"];
    $_SESSION["email"]=$row["email"];
    $_SESSION["userType"]=$row["User_type"];
    if($_SESSION["userType"] == "Admin"){
		  header("Location: admin.php");
    }else if($_SESSION["userType"] == "Doctor"){
      header("Location: doctor.php");
    }
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
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="icon" href="assets/img/favicon.png">

  <link rel="stylesheet" href="assets/css/themify-icons.css">

  <link rel="stylesheet" href="assets/css/flaticon.css">

  <link rel="stylesheet" href="assets/css/magnific-popup.css">

  <link rel="stylesheet" href="assets/css/nice-select.css">

  <link rel="stylesheet" href="assets/css/slick.css">

  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
<?php include("../public/header.php"); ?>
<section class="about_us padding_top">
<div class="container">
	<br><br>
    <h1 >
    <?php
      if(isset($_GET['type']) && $_GET['type'] == 'register'){
        echo 'Sign Up';
      }else{
        echo 'Login';
      }
    ?>
    </h1>
    <br>
    <div class="row justify-content-between">
        <div class="col-lg">
          	<div class="regervation_part_iner" style="display: inline-block;">
				<div class="form-row">
                	<div class="form-group col-md-6">
                		<?php
                			if(isset($_GET['type']) && $_GET['type'] == 'register'){
                				echo $view->signupForm();
                      }else if(isset($_GET['type']) && $_GET['type'] == 'logout'){
                        session_unset();
                        session_destroy();
                        header("Location: index.php");
                			}else{
                				echo $view->loginForm();
                			}
						        ?>
					         </div>
    			</div>
    		</div>
		    <div class="col-lg-5 col-md-6" style="display: inline-block; float:right">
		        <div class="reservation_img">
		          <img src="assets/img/reservation.png" alt="" class="reservation_img_iner">
		        </div>
	        </div>
		</div>
	</div>
</div>
</section>
<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/owl.carousel.js"></script>
<script src="assets/js/main.js"></script>
<script>
    new WOW().init();
</script>
<?php include("../public/footer.php"); ?>
</body>
</html>