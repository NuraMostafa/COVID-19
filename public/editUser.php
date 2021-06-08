<?php
session_start();
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Users.php");
require_once(__ROOT__ . "controller/UsersController.php");
require_once(__ROOT__ . "view/ViewUser.php");

$model = new Users();
$controller = new UsersController($model);
$view = new ViewUser($controller, $model);
$userData = array();
$editPageData = '';

if(isset($_POST['save'])){
    $userData = new User($_GET['userID']);
    $userData->editUser();
    header("Location: admin.php");
}else if(isset($_GET['userID']) && !empty($_GET['userID'])){
    $userData = new User($_GET['userID']);
    $editPageData = $view->viewEditUserData($userData);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User</title>
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
    <br><h1 style="margin: 0 auto; width:250px;">Edit users</h1><br>
      <div class="regervation_part_iner" style="display: inline-block;">
        <div class="form-row">
          
            <?php echo  $editPageData; ?>
            
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