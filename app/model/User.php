<?php
  require_once(__ROOT__ . "model/Model.php");
?>

<?php
class User extends Model {
    private $id;
    private $email;
    private $password;
    private $userName;
    private $userType;
    private $gender;
    private $dateofbirth;

  function __construct($id, $email = "", $password="", $userName="", $userType="",$gender="",$dateofbirth="") {
    $this->id = $id;
	    $this->db = $this->connect();

    if(""===$email){
      $this->readUser($id);
    }else{
      $this->email = $email;
	    $this->password=$password;
      $this->userName = $userName;
      $this->userType = $userType;
      $this->gender = $gender;
      $this->dateofbirth = $dateofbirth;
    }
  



    if(""===$email){
      $this->readPatient($id);
    }else{
      $this->email = $email;
      $this->userName = $userName;
      $this->gender = $gender;
      $this->dateofbirth = $dateofbirth;
    }
  }

  function getEmail() {
    return $this->email;
  }

  function setEmail($email) {
    return $this->email = $email;
  }

  function getPassword() {
    return $this->password;
  }

  function setPassword($password) {
    return $this->password = $password;
  }

  function getUserName() {
    return $this->userName;
  }

  function setUserName($userName) {
    return $this->userName = $userName;
  }

  function getUserType() {
    return $this->userType;
  }

  function setUserType($userType) {
    return $this->userType = $userType;
  }
  
  
  function getGender() {
    return $this->gender;
  }
  function setGender($gender) {
    return $this->gender = $gender;
  }
  
  function getDateOfBirth() {
    return $this->dateofbirth;
  }
  function setDateOfBirth($dateofbirth) {
    return $this->dateofbirth = $dateofbirth;
  }

  function getID() {
    return $this->id;
  }

  function readUser($id){
    $sql = "SELECT * FROM users where id=".$id;
    $db = $this->connect();
    $result = $db->query($sql);
    if ($result->num_rows == 1){
        $row = $db->fetchRow();
        $this->email = $row["email"];
        $this->password=$row["Password"];
        $this->userName = $row["Username"];
        $this->userType = $row["User_type"];
        $this->gender = $row["Gender"];
		    $this->dateofbirth = $row["dateofbirth"];
    }
    else {
        $this->email = "";
        $this->userName = "";
        $this->gender = "";
        $this->dateofbirth = "";
    }
  }
  
  function editUser($email="", $userName="", $gender="", $dateofbirth=""){
    $email = $_REQUEST['email'];
		$userName = $_REQUEST['username'];
		$gender = $_REQUEST['gender'];
		$dateofbirth = $_REQUEST['dateofbirth'];
    $sql = "update patients set email = '$email', Username='$userName', gender='$gender', dateofbirth='$dateofbirth' where id=$this->id;";
    if($this->db->query($sql) === true){
      echo "updated successfully.";
      $this->readUser($this->id);
    }
  }
  
  function deleteUser(){
	  $sql="delete from users where id=$this->id;";
	  if($this->db->query($sql) === true){
      echo "deleted successfully.";
    }
	}
 function readPatient($id){
    $sql = "SELECT * FROM patients where id=".$id;
    $db = $this->connect();
    $result = $db->query($sql);
    if ($result->num_rows == 1){
        $row = $db->fetchRow();
        $this->email = $row["email"];
        $this->userName = $row["Username"];
        $this->gender = $row["Gender"];
        $this->dateofbirth = $row["dateofbirth"];
    }
    else {
        $this->email = "";
        $this->userName = "";
        $this->gender = "";
        $this->dateofbirth = "";
    }
  }
  

  function editPatient($email="", $userName="", $gender="", $dateofbirth=""){
    $email = $_REQUEST['email'];
    $userName = $_REQUEST['username'];
    $gender = $_REQUEST['gender'];
    $dateofbirth = $_REQUEST['dateofbirth'];
    $sql = "update patients set email = '$email',Username='$userName', gender='$gender', dateofbirth='$dateofbirth' where id=$this->id;";
    if($this->db->query($sql) === true){
      echo "updated successfully.";
      $this->readPatient($this->id);
    }
  }

  function deletePatient(){
    $sql="delete from patients where id=$this->id;";
    if($this->db->query($sql) === true){
      echo "deleted successfully.";
    }
  }

	 
}
