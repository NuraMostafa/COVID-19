<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/User.php");

class Users extends Model {
	private $users;
	private $patients;
	private $patient;

	function __construct() {
		$this->fillArray();
		$this->fillpatientsArray();
	}

	function fillArray() {
		$this->users = array();
		$this->db = $this->connect();
		$result = $this->readUsers();
		while ($row = $result->fetch_assoc()) {
			array_push($this->users, new User($row["id"],$row["email"],$row["Password"],$row["Username"],$row["User_type"],$row["Gender"],$row["dateofbirth"]));
		}
	}

	function getUsers() {
		return $this->users;
	}

		function getPatient() {
		return $this->users;
	}

	function readUsers(){
		$sql = "SELECT * FROM users";

		$result = $this->db->query($sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else {
			return false;
		}
	}

	function insertUser($email, $password, $userName, $userType, $gender, $dateofbirth){
		
		$sql = "INSERT INTO users (email, Password, Username, User_type, Gender, dateofbirth) VALUES ('$email','$password', '$userName', '$userType', '$gender', '$dateofbirth')";
		if($this->db->query($sql) === true){
			
			$this->fillArray();
		} 
		else{
			echo "ERROR: Could not able to execute $sql. " . $conn->error;
		}
	}
	function insertPatient( $userName, $email, $gender, $dateofbirth){
		$did = $_SESSION["id"];
		$sql = "INSERT INTO patients ( Username, email, Gender, dateofbirth, doctorID) VALUES ('$userName', '$email', '$gender', '$dateofbirth', '$did')";
		if($this->db->query($sql) === true){
			
			$this->fillArray();
		} 
		else{
			echo "ERROR: Could not able to execute $sql. " . $conn->error;
		}
	}

	
		function insertTestData( $CPR, $Ferritin, $LDH, $ALT, $CBC, $DDimer, $AST, $email){
		
		$uid = $_SESSION['id'];
		$sql = "INSERT INTO tests ( CPR, Ferritin, LDH, ALT, CBC, DDimer, AST, email, uid) VALUES ('$CPR', '$Ferritin', '$LDH', '$ALT', '$CBC', '$DDimer', '$AST', '$email', '$uid')";
	

		
		if($this->db->query($sql) === true){
			
			$this->fillArray();
		} 
		else{
			echo "ERROR: Could not able to execute $sql. " . $conn->error;
		}
	}

	function getSearchUsers($searchKey){
		$searchResult = array();
		$this->db = $this->connect();
		$sql = "SELECT * FROM users WHERE email LIKE '%$searchKey%' OR Username LIKE '%$searchKey%' OR User_type LIKE '%$searchKey%'";
		$result = $this->db->query($sql);
		if ($result->num_rows > 0){
			while ($row = $result->fetch_assoc()) {
				array_push($searchResult, new User($row["id"],$row["email"],$row["Password"],$row["Username"],$row["User_type"],$row["Gender"],$row["dateofbirth"]));
			}
		}
		return $searchResult;
	}

	function deleteUser($userID){
		$sql = "DELETE FROM users WHERE id = '$userID'";
		$result = $this->db->query($sql);
		if($result){
			return 'Successfully Deleted!';
		}else{
			return 'Failed to delete user!';
		}
	}



	function fillpatientsArray() {
		$this->patients = array();
		$this->db = $this->connect();
		if(isset($_SESSION['userType']) && $_SESSION['userType'] == 'Doctor'){
			$result = $this->readPatients();
		}else{
			$result = $this->readAllPatients();
		}
		while ($row = mysqli_fetch_assoc($result)) {
			array_push($this->patients, new User($row["id"],$row["email"],'$row["Password"]',$row["Username"],'$row["User_type"]',$row["Gender"],$row["dateofbirth"]));
		}
	}
	function getpatients() {
		return $this->patients;
	}

	function readPatients(){
		if(isset($_SESSION["id"])){
			$did = $_SESSION["id"];
			$sql = "SELECT * FROM patients WHERE doctorID = '$did'";

			$result = $this->db->query($sql);
			if ($result->num_rows > 0){
				return $result;
			}
			else {
				return false;
			}
		}
		else {
			$sql = "SELECT * FROM patients";

			$result = $this->db->query($sql);
			if ($result->num_rows > 0){
				return $result;
			}
			else {
				return false;
			}
		}
		
	}
		function readAllPatients(){

		$sql = "SELECT * FROM patients ";

		$result = $this->db->query($sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else {
			return false;
		}
	}



		function getSearchpatients($searchKey){
		$searchResult = array();
		//$this->db = $this->connect();
		$sql = "SELECT * FROM patients WHERE id LIKE '%$searchKey%' OR Username LIKE '%$searchKey%' OR Gender LIKE '%$searchKey%'";
		$result = $this->db->query($sql);
		if ($result->num_rows > 0){
			while ($row = $result->fetch_assoc()) {
				array_push($searchResult, new User($row["id"],$row["email"],'',$row["Username"],'',$row["Gender"],$row["dateofbirth"]));
				//array_push($searchResult, new User($row["id"],$row["Username"],$row["email"],$row["Gender"],$row["dateofbirth"]));
			}
		}
		return $searchResult;
	}

		function deletePatient($patientID){
		$sql = "DELETE FROM patients WHERE id = '$patientID'";
		$result = $this->db->query($sql);
		if($result){
			return 'Successfully Deleted!';
		}else{
			return 'Failed to delete user!';
		}
	}



}
