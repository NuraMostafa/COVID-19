

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
        if($this->validatepassword($password)){
		$this->model->insertUser($email,$password,$userName,$userType, $gender, $dateofbirth);
		}
      else
     {
return false;
}
    
	}
		 function validatepassword($password )
    {      $passlength=strlen("$password");
          if($passlength < 8){

            echo"
            <script>alert('Password must be more than 8 characters');</script>
            <script>window.location.replace('http://localhost/Covid-4/public/user.php?type=register');</script>";
           
            return false;
        }
      return true;
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
         if($this->validatetests($CPR, $Ferritin, $LDH, $ALT, $CBC, $DDimer, $AST)){
              $this->model->insertTestData( $CPR, $Ferritin, $LDH, $ALT, $CBC, $DDimer, $AST, $email);
           $list = array (
            array('CBC','CPR','D Dimer','S Ferritin','LDH','ALT','AST'),
              array(''.$CBC.'', ''.$CPR.'', ''.$DDimer.'', ''.$Ferritin.'', ''.$LDH.'', ''.$ALT.'', ''.$AST.'')
                  );

              $fp = fopen(''. $email .'.csv', 'w');

             foreach ($list as $fields) {
                 fputcsv($fp, $fields);
}

            fclose($fp);

                   }
               else
                   {
  	return false;
  }
	
	}
function validatetests($CPR, $Ferritin, $LDH, $ALT, $CBC, $DDimer, $AST){
if( $CPR < 0 || $CPR > 1000){
	      echo"
            <script>alert('Please enter a correct value');</script>
           <script>window.location.replace('http://localhost/Covid-4/public/tests.php');</script>
            ";
	      // header("location:tests.php");
     	//  alert( 'Please enter a correct value');
     	 return false;
     }
      if ($Ferritin < 0 || $Ferritin > 3000){
      	echo"
            <script>alert('Please enter SFerritin in a correct value');</script>
            <script>window.location.replace('http://localhost/Covid-4/public/tests.php');</script>";
     
     	return false;
     }
       if ($LDH < 0 || $LDH > 1000){
      echo"
            <script>alert('Please enter a correct value');</script>
           <script>window.location.replace('http://localhost/Covid-4/public/tests.php');</script>
            ";
     	return false;
     }
      if ($ALT< 0 || $ALT > 1000){
     	echo"
            <script>alert('Please enter a correct value');</script>
           <script>window.location.replace('http://localhost/Covid-4/public/tests.php');</script>
            ";
     	return false;
     }
       if ($CBC < 0 || $CBC > 4000){
      	header("location:tests.php");
     	alert( 'Please enter a correct value');
     	return false;
     }
       if ($DDimer < 0 || $DDimer > 1000){
      	header("location:tests.php");
     	alert( 'Please enter a correct value');
     	return false;
     }
      if ($AST < 0 || $AST > 1000){
     	header("location:tests.php");
     	alert( 'Please enter a correct value');
     	return false;
     }

     else {
     	return true;
     }
 }


// 	  function validatetests($CPR )
//     {      $passlength=strlen($CPR);
//           if($passlength >2){
//           	//echo "<script>href= 'tests.php?action=addTest';</script>";
            
//              //  header("location:tests.php");
//              //   // echo "<script>('incorrect');</script>";


//              // alert('test'); 

//              echo "<script>";
// echo "alert('You are logged out');";
//  header("location:tests.php"); 
// echo "</script>";
            
//            
//         }
//   // throw new Exception ("Invalid password !!");
//       return true;
// }

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





