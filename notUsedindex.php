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
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body>
<?php include("nav.php"); ?>
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
                        <td>delete</td> 
                       <td>Edit</td> 
                    </thead>
     <?php
        $sql = "SELECT * FROM `users`";
        $result = mysqli_query($connection, $sql);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            while ($rows = mysqli_fetch_array($result)) {
                   if ($rows[4] == "patient") {
                ?>
              

                    <td><?php echo $rows[0]; ?></td>
                    <td><?php echo $rows[1]; ?></td>
                    <td><a href="index.php?delete=<?php echo $rows[0]; ?>"> Delete </a></td>

                        <td><a href="index.php?edit=<?php echo $rows[0]; ?>"> Edit </a></td>
                    
                </tr>
                <?php
           } }
            ?>

            <?php

        } else {

            echo "No data to view";

        }

        ?>
        </tbody>
    </table>
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
</body>
</html>
<?php
if (isset($_GET["delete"])) {
    $userid = $_GET["delete"];
    $sql = " DELETE FROM `users` where `id`='$userid'";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        echo "<script> alert('Deleted successfully')</script>";
        echo "<script>location.replace('index.php');</script>";

    }

}


?>
