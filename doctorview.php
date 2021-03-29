<?php
require_once("connect.php");
$query = "SELECT * FROM users";
$result = mysqli_query($connection, $query);
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Doctor page</title>
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
</head>
<style >
    td{
      color: black;
    }
  </style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body>
<?php include("header.php"); ?>
<section class="about_us padding_top">
<div class="container-fluid">
 
    <input type="text" placeholder="Search for patients" style="margin: 0 auto; width: 300px;" class="form-control"
           id="searchtext" onkeyup="search(); filter(this)">
    <br><br>
    <div class="row" id="old">
    <table>
                        <tr>
                    <thead>
                       <td>ID</td>
                       <td>Email</td> 
                       <td>Gender</td>
                       <td>Edit</td> 
                        <td>delete</td> 
                    </thead>
     <?php
        $sql = "SELECT * FROM `patients`";
        $result = mysqli_query($connection, $sql);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            while ($rows = mysqli_fetch_array($result)) {
                ?>
              

                    <td><?php echo $rows[0]; ?></td>
                    <td><?php echo $rows[1]; ?></td>
                     <td><?php echo $rows[3]; ?></td>
                     <td><a href="edit.php?edit=<?php echo $rows[0]; ?>"> Edit </a></td>

                    <td><a href="doctorview.php?delete=<?php echo $rows[0]; ?>"> Delete </a></td>

                     
                    
                </tr>
                <?php
            }
            ?>

            <?php

        } else {

            echo "No data to view";

        }

        ?>
        </tbody>
    </table>
    
    <br><br>
    <div>
    <div class="regerv_btn">
        <a href="addpatient.php" class="btn_2">Add Patient</a>
        </div>
        </div>
</div>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/owl.carousel.js"></script>
<script src="js/main.js"></script>
<script>
    new WOW().init();
</script>

<script>
    $("#new").hide();

    function search() {
        var x = $("#searchtext").val();
        if (x != "") {
            $("#old").hide();
            jQuery.ajax({
                url: 'ajax.php',
                type: 'post',
                data: 'searchtext=' + x,
                success: function (data) {
                    $("#new").html(data);
                    $("#new").show();
                }
            });
        } else {
            $("#new").hide();
            $("#old").show();
        }
    }
</script>
</section>
<?php include("footer.php"); ?>
</body>
</html>
<?php
if (isset($_GET["delete"])) {
    $patientid = $_GET["delete"];
    $sql = " DELETE FROM `patients` where `id`='$patientid'";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        echo "<script> alert('Deleted successfully')</script>";
        echo "<script>location.replace('doctorview.php');</script>";

    }

}


?>
