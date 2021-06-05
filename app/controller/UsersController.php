
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
		public function addUser() {
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		$userName = $_REQUEST['username'];
		$userType = 'Doctor';
		$gender = $_REQUEST['gender'];
		$dateofbirth = $_REQUEST['dateofbirth'];

		$this->model->insertUser($email,$password,$userName,$userType, $gender, $dateofbirth);
	}
	public function addPatient() {
		$userName = $_REQUEST['username'];
		$email = $_REQUEST['email'];
		$gender = $_REQUEST['gender'];
		$dateofbirth = $_REQUEST['dateofbirth'];

		$this->model->insertPatient( $userName, $email, $gender, $dateofbirth);
	}
	public function addTest() {
		 $CPR = $_POST['CPR'];
         $Ferritin = $_POST['Ferritin'];
         $LDH = $_POST['LDH'];
         $ALT = $_POST['ALT'];
         $CBC = $_POST['CBC'];
         $DDimer = $_POST['DDimer'];
         $AST = $_POST['AST'];
         $email = $_POST['email'];

		$this->model->insertTestData( $CPR, $Ferritin, $LDH, $ALT, $CBC, $DDimer, $AST, $email);
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

		public function viewPatients(){
		return $this->model->getpatients();
	}

	public function searchPatients($searchKey){
		return $this->model->getSearchpatients($searchKey);
	}
		public function deletep(){
		$this->model->deletePatient();
	}

	public function deletePatient($userID){
		return $this->model->deletePatient($userID);
	}

		public function editp() {
		$email = $_REQUEST['email'];
		$userName = $_REQUEST['username'];
		$gender = $_REQUEST['gender'];
		$dateofbirth = $_REQUEST['dateofbirth'];

		$this->model->editPatient($email,$userName,$gender, $dateofbirth);
	}




	
}
?>

