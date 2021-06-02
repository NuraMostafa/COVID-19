<?php

require_once(__ROOT__ . "controller/Controller.php");

class UsersController extends Controller{
	public function insert() {
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		$userName = $_REQUEST['username'];
		$userType = 'Patient';
		$gender = $_REQUEST['gender'];
		$dateofbirth = $_REQUEST['dateofbirth'];

		$this->model->insertUser($email,$password,$userName,$userType, $gender, $dateofbirth);
	}

	public function edit() {
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		$userName = $_REQUEST['username'];
		$userType = $_REQUEST['user_type'];
		$gender = $_REQUEST['gender'];
		$dateofbirth = $_REQUEST['dateofbirth'];

		$this->model->editUser($email,$password,$userName,$userType, $gender, $dateofbirth);
	}
	
	public function delete(){
		$this->model->deleteUser();
	}

	public function viewUsers(){
		return $this->model->getUsers();
	}

	public function searchUsers($searchKey){
		return $this->model->getSearchUsers($searchKey);
	}

	public function deleteUser($userID){
		return $this->model->deleteUser($userID);
	}
}
?>
