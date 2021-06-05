<?php
session_start();
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Users.php");
require_once(__ROOT__ . "controller/UsersController.php");
require_once(__ROOT__ . "view/ViewUser.php");

$model = new Users();
$controller = new UsersController($model);
$view = new ViewUser($controller, $model);
$testsArray = array();
$testsPageData = '';

if(!isset($_SESSION['userType']) || $_SESSION['userType'] != 'Patient'){
  header('Location: index.php');
}
if(isset($_POST['login'])){
  $testsArray = new User($_GET['userID']);
  $testsArray->readUser();
 header("Location: profile.php");
if (isset($_GET['action']) && !empty($_GET['action'])) {
  if($_GET['action'] == 'deleteUser' && isset($_GET['userID']) && !empty($_GET['userID'])){
    echo '<script>alert("'.$controller->deleteUser($_GET['userID']).'");</script>';
    header("Location: profile.php");
  }
}else{
  $testsPageData = $controller->viewUsers();
  $testsPageData = $view->viewPatient($testsPageData);
}}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Profile</title>
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

  <style >
    td{
      color: black;
    }
  </style>

</head>

<body>
<?php include("../public/header.php"); ?>
<section class="about_us padding_top">
<div class="container">
  <div class="row justify-content-between">
    <div class="col-lg">
      <div class="regervation_part_iner" style="display: inline-block;">
        <div class="form-row">   
            <?php echo  $testsPageData; ?>     
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
