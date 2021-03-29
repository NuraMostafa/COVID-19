<?php
require_once("connect.php");

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $Username = $_POST['Username'];
    $Gender = $_POST['Gender'];
    $dateofbirth = $_POST['dateofbirth'];

    $query = "INSERT INTO patients(Username,email,Gender,dateofbirth) VALUES ('$Username','$email','$Gender','$dateofbirth')";

    $result = mysqli_query($connection, $query);

    if($result){
        $query2 = "SELECT * FROM patients WHERE email = '$email'";
        $result2 = mysqli_query($connection, $query2);
        if($result2){
            if(mysqli_num_rows($result2) > 0 ){
                $row = mysqli_fetch_array($result2);
                $userID = $row[0];
                $Username = $row[1];
                $userEmail = $row[2];
              

                $_SESSION['userID'] = $userID;
                $_SESSION['Username'] = $Username;
                $_SESSION['userEmail'] = $userEmail;


                echo "<script>location.replace('doctorview.php');</script>";
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