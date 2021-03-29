<?php
require_once("connect.php");

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
            $userType = $row[3];
            $_SESSION['userID'] = $userID;
            $_SESSION['userEmail'] = $userEmail;
            $_SESSION['User_type'] = $userType;
            if(  $_SESSION['User_type'] == 'Admin'){
                header("Location: adminview.php");
            }

            else if($_SESSION['User_type'] == 'Doctor' ){
                header("Location: doctorview.php");
            }

            else if($_SESSION['User_type'] == 'Patient' ){
                header("Location: test.php");
            }

           
        } else {
            echo "<script>alert('Invalid username or password please try again.')</script>";
             echo "<script>location.replace('login.php');</script>";
        }
    } else {
        echo "<script>alert('Error performing query, please try agian.')</script>";
    }
}

else{
        echo "<script>alert('Error, failed to login.')</script>";


}
?>