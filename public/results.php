<?php
session_start();
define('__ROOT__', "../app/");


if(!isset($_SESSION['userType']) || $_SESSION['userType'] == 'Admin'){
  header('Location: index.php');
}


?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result</title>
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
          
            <br><br>
        <h1 >Results</h1>
        <br>
        <div class="form-group col-lg-12">
            <div class="row" id="old">
                <table>
                  <tr style="background-color: #4169E1;">
                    <th>ID</th>
                    <th>Email</th> 
                    <th>User Type</th> 
                    <th>Statuts</th> 
                   
                  </tr>
                  
           
                    <tr>
                            <td>1</td>
                            <td style=" color: white;">Nura</td>
                            <td style=" color: white;">Female</td>
                            <td style=" color: #00FF01;">Psostive</td>
                        </tr>';                    
                }
            } 
            </table>
                    <br> <br>
                
                        </div>
            
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
</body>
</html>
