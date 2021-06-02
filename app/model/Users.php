<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/User.php");

class Users extends Model {
	private $users;
	function __construct() {
		$this->fillArray();
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
			echo "Records inserted successfully.";
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
}