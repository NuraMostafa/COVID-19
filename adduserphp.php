<?php
require_once("connect.php");

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $User_type = $_POST['User_type'];
    $Gender = $_POST['Gender'];
    $Username = $_POST['Username'];
    $dateofbirth = $_POST['dateofbirth'];
    $query = "INSERT INTO users(email,password,User_type,Gender,Username,dateofbirth) VALUES ('$email','$password', '$User_type','$Gender','$Username','$dateofbirth')";

    $result = mysqli_query($connection, $query);

    if($result){

        $query2 = "SELECT * FROM users WHERE email = '$email'";
        $result2 = mysqli_query($connection, $query2);
        if($result2){
            if(mysqli_num_rows($result2) > 0 ){
                $row = mysqli_fetch_array($result2);
                $userID = $row[0];
                $userEmail = $row[1];
                $userType = $row[3];
                $Username = $row[6];


                $_SESSION['userID'] = $userID;
                $_SESSION['userEmail'] = $userEmail;
                $_SESSION['userType'] = $userType;
                $_SESSION['Username'] = $Username;

                echo "<script>location.replace('adminview.php');</script>";
            }
        }
        else {
            echo "<script>alert('Error performing query, please try agian.')</script>";
        }
        
    }
    else {
        echo "<script>alert('Error performing query, please try agian.')</script>";
    }
}
?>
