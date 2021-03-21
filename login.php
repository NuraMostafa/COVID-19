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
            header("Location: index.php");
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
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
</head>

<style>
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
</style>
<body>
<?php include("nav.php"); ?>
<div class="container">
    <br><br>
    <h1 style="text-align: center;">Login</h1><br>
	<div class="form">
    <form method="POST" action="" style="text-align: center;">
        <h4>Email</h4>
        <input type="email" class="x" name="email" required onkeyup="filter(this)" id="loginemail"><br><br>
        <h4>Password</h4>
        <input type="password" class="x" name="password" required onkeyup="filter(this)" id="loginpassword">
        <br><br>
        <button type="submit" class="sub" name="submit" class="btn btn-primary">Login</button>
    </form>
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
</body>
</html>
