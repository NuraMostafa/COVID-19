

<?php
require_once(__ROOT__ . "view/View.php");

class ViewUser extends View{	

	public function output(){
		$str="";
		$str.="<h1>Welcome ".$this->model->getUserName()."</h1>";
		$str.="<h5>Gender: ".$this->model->getGender()."</h5>";
		$str.="<h5>Phone: ".$this->model->getDateOfBirth()."</h5>";
		$str.="<br><br>";
		$str.="<a href='profile.php?action=edit'>Edit Profile </a><br><br>";
		$str.="<a href='profile.php?action=movie'>My Movies </a><br><br>";
		$str.="<a href='profile.php?action=signOut'>SignOut </a><br><br>";
		$str.="<a href='profile.php?action=delete'>Delete Account </a>";
		return $str;
	}
		
       function loginForm(){
         $str='<form method="POST" action="user.php" enctype="multipart/form-data" >
          <div class="input-container">
          <i class="fa fa-envelope icon"></i>
          <input type="email" class="input" placeholder="Enter your email" required name="email" onkeyup="filter(this)" id="registeremail"><br>
          </div>
<div class= "input-container">
<i class="fa fa-key icon"></i>
<input type="password" class="input" placeholder="Enter your password" required name="password" onkeyup="filter(this)" id="registerpassword"><br>
</div>
<div class="regerv_btn">
<button type="submit" name="login"class="btn_2">Login</button>
</div>
</div>
</form>';
return $str;
}

function signupForm(){
$str='<form method="POST" action="user.php?action=insert" enctype="multipart/form-data" >
<div class= "input-container">
<i class="fa fa-user icon"></i>
<input  class="input" name="username" id="inputEmail4" placeholder="Username"><br>
</div>
<div class= "input-container">
<i class="fa fa-envelope icon"></i>
<input type="email" class="input" placeholder="Enter your email" required name="email" onkeyup="filter(this)" id="registeremail"><br>

</div>
<div class= "input-container">
<i class="fa fa-key icon"></i>
<input type="password" class="input" placeholder="Enter your password" required name="password" onkeyup="filter(this)" registerpassword"><br>
</div>
<div class= "input-container">
<i class="fa fa-key icon"></i>
<input type="password" class="input" id="inputEmail4" placeholder="Confirm Password" required name="Confirmpassword" onkeyup="filter(this)" id="registerconfirmpassword"><br>
</div>
<div class= "input-container">
<i class="fa fa-transgender icon"></i>
<select name="gender" class="input" id="Select">
<option selected>Select Gender</option>
<option >Male</option>
<option >Female</option>
</select required>
</div>
<div class= "input-container">
<i class="fa fa-calendar icon"></i>
<input type="date" name= "dateofbirth" class="input" id="birthday" placeholder="Your Birthday">
</div>
<div class="regerv_btn">
<button type="submit" name="submit"class="btn_2">SignUp</button>
</div>
</form>';
return $str;
}

	public function editForm(){
		$str='<form action="profile.php?action=editaction" method="post">
		<div>Email:</div><div> <input type="text" name="email" value="'.$this->model->getEmail().'"/></div><br>
		<div>Password:</div><div> <input type="password" name="password" value="'.$this->model->getPassword().'"/></div><br>
		<div>User Name:</div><div> <input type="text" name="username" value="'.$this->model->getUserName().'"/></div><br>
		<div>Gender:</div><div> <input type="text" name="gender" value="'.$this->model->getGender().'"/></div><br>
		<div>Date Of Birth: </div><div><input type="text" name="dateofbirth" value="'.$this->model->getDateOfBirth().'"/></div><br>
		<div><input type="submit" /></div>';
		return $str;
	}
	

	public function viewUsers($usersArray){
		$str='
		<br><br>
		<h1 >View Users</h1>
		<br>
		<div class="form-group col-lg-12">
			<form method="GET" action="">
            <input type="text" placeholder="Search" style="margin: 0 auto; width: 300px; display:inline-block;" class="form-control" id="searchtext" name="searchKey" value="'.((isset($_GET['searchKey']) && !empty($_GET['searchKey'])) ? $_GET['searchKey'] : '') .'">  <button class = "btn_2" style="border: none;color: white;padding: 1px 17px;text-align: center;text-decoration: none;display: inline-block;font-size: 14px;" type="submit">Search</button>
            </form>
			<br><br>
			<div class="row" id="old">
                <table>
                  <tr style="background-color: #4169E1;">
                    <th>ID</th>
                    <th>Email</th> 
                    <th>User Type</th> 
                    <th>Edit</th> 
                    <th>Delete</th> 
                  </tr>';
                  
        	if (count($usersArray) > 0) {
		        for($i = 0 ; $i < count($usersArray) ; $i ++) {
			    	$str.='<tr>
				            <td>'.$usersArray[$i]->getID().'</td>
				            <td>'.$usersArray[$i]->getEmail().'</td>
				            <td>'.$usersArray[$i]->getUserType().'</td>
				            <td><a href="editUser.php?userID='.$usersArray[$i]->getID().'"> Edit </a></td>
				            <td><a href="admin.php?action=deleteUser&userID='.$usersArray[$i]->getID().'"> Delete </a></td>
			            </tr>';                    
	            }
            } else {
              $str.= "<p style='color:black;'>No data to view</p>";
            }
            $str.= '</table>
					<br> <br>
					<div class="regerv_btn">
					<a href="adduser.php" class="btn_2">Add User</a>
					</div>
						</div>';
        return $str;
	}

	public function viewEditUserData($userData){
		$str = '<div style="margin: 0 auto; width:1500px;" class="form-group col-md-6">
		<div class="form-group col-md-6">
			<form method="POST" action="" enctype="multipart/form-data" >
			<h4 style="font-size: 23px; ">Username</h4>
<div class= "input-container">
<i class="fa fa-user icon"></i>
				<input  class="input" name = "username" id="inputEmail4" placeholder="Username" value="'.$userData->getUserName().'"><br>
				</div>
				<h4 style="font-size: 23px; ">Email</h4>
<div class= "input-container">
<i class="fa fa-envelope icon"></i>
				<input type="email" class="input" placeholder="Enter your email" required name="email" onkeyup="filter(this)" id="registeremail" value="'.$userData->getEmail().'"><br>
				</div>
				<h4 style="font-size: 23px;">password</h4>
<div class= "input-container">
<i class="fa fa-key icon"></i>
				<input type="password" class="input" placeholder="Enter your password" required name="password" onkeyup="filter(this)" id="rwgisterpassword" value="'.$userData->getPassword().'"><br>
				</div>
				<input type="password" class="input" required name="user_type" value="'.$userData->getUserType().'" hidden>

			<h4 style="font-size: 23px;">Select Gender</h4>
<div class= "input-container">
<i class="fa fa-transgender icon"></i>
			<select name="gender" class="input" id="Select">
			<option disabled="">Select Gender</option>
			';
		if($userData->getGender() == "Female"){
			$str .= '<option selected>Female</option>
					<option>Male</option>';
		}
		elseif($userData->getGender() == "Male"){
			$str .=	'<option selected>Male</option>
					<option>Female</option>';
		}
		$str.= '</select required>
				<br>
				</div>
				<h4 style="font-size: 23px;">Date of Birth</h4>
<div class= "input-container">
<i class="fa fa-calendar icon"></i>
				<input type="date" name= "dateofbirth" class="input" id="birthday" placeholder="Your Birthday" value="'.$userData->getDateOfBirth().'">
				<br>
				</div>
				<div class="regerv_btn">
				<button type="submit" name="save"class="btn_2">Update</button>
				</div>
				</div>
			</form>
		</div></div>
		';
		return $str;;
	
	}
		public function addUserData(){
$str ='<div style="margin: 0 auto; width:1500px;" class="form-group col-md-6">
<form method="POST" action="adduser.php?action=addUser" enctype="multipart/form-data" >
<div class= "input-container">
<i class="fa fa-user icon"></i>
<input  class="input" name="username" id="inputEmail4" placeholder="Username"><br>
</div>
<div class= "input-container">
<i class="fa fa-envelope icon"></i>
<input type="email" class="input" placeholder="Enter your email" required name="email" onkeyup="filter(this)" id="registeremail"><br>

</div>
<div class= "input-container">
<i class="fa fa-key icon"></i>
<input type="password" class="input" placeholder="Enter your password" required name="password" onkeyup="filter(this)" registerpassword"><br>
</div>

<div class= "input-container">
<i class="fa fa-transgender icon"></i>
<select name="gender" class="input" id="Select">
<option selected>Select Gender</option>
<option >Male</option>
<option >Female</option>
</select required>
</div>
<div class= "input-container">
<i class="fa fa-calendar icon"></i>
<input type="date" name= "dateofbirth" class="input" id="birthday" placeholder="Your Birthday">
<br></br>
</div>
<div class="regerv_btn">
<button type="submit" name="submit"class="btn_2">Submit</button>
</div>
</form>
</div>';
return $str;


}

	public function viewPatients($PatientsArray){
		$str='
		<br><br>
		<h1 >View Patients</h1>
		<br>
		<div class="form-group col-lg-12">
			<form method="GET" action="">
            <input type="text" placeholder="Search" style="margin: 0 auto; width: 300px; display:inline-block;" class="form-control" id="searchtext" name="searchKey" value="'.((isset($_GET['searchKey']) && !empty($_GET['searchKey'])) ? $_GET['searchKey'] : '') .'">  <button style="background-color: #008CBA;border: none;color: white;padding: 1px 17px;text-align: center;text-decoration: none;display: inline-block;font-size: 14px;" type="submit">Search</button>
            </form>
			<br><br>
			<div class="row" id="old">
                <table>
                  <tr style="background-color: #4169E1;">
                    <th>ID</th>
                    <th>Username</th> 
                    <th>Gender</th> 
                    <th>Edit</th> 
                    <th>Delete</th> 
                  </tr>';
                  
        	if (count($PatientsArray) > 0) {
		        for($i = 0 ; $i < count($PatientsArray) ; $i ++) {
			    	$str.='<tr>
				            <td>'.$PatientsArray[$i]->getID().'</td>
				            <td>'.$PatientsArray[$i]->getUserName().'</td>
				            <td>'.$PatientsArray[$i]->getGender().'</td>
				            <td><a href="editPatient.php?patientID='.$PatientsArray[$i]->getID().'"> Edit </a></td>
				            <td><a href="doctor.php?action=deletePatient&patientID='.$PatientsArray[$i]->getID().'"> Delete </a></td>

			            </tr>';                    
	            }
            } else {
              $str.= "<p style='color:black;'>No data to view</p>";
            }
            $str.= '</table>


					<br> <br>
					<div class="regerv_btn">
					<a href="addPatient.php" class="btn_2">Add Patient</a>
					</div>


						</div>';  

					return $str;

     
	}


	public function viewProfile($userData){
		$str='


		<div   class="card">
  <img width:15000px; src="assets/img/picon.png" style="width:70%">
  <h1>'.$userData->getUserName().'</h1>
  <p class="title">'.$userData->getEmail().'</p>
  <p class="title">'.$userData->getGender().'</p>
  <p class="title">'.$userData->getDateOfBirth().'</p>
  <a><i class="fa fa-id-badge">'.$userData->getID().'</i></a>
  <a href="edituser.php?userID='.$userData->getID().'"> Edit </a>
  <a href="profile.php?action=deleteUser&userID='.$userData->getID().'"> Delete </a>
  
   </div>'
;
		
        return $str;	
	}


	public function editpForm(){
		$str='<form action="profile.php?action=editaction" method="post">
		<div>User Name:</div><div> <input type="text" name="username" value="'.$this->model->getUserName().'"/></div><br>
		<div>Email:</div><div> <input type="text" name="email" value="'.$this->model->getEmail().'"/></div><br>
		<div>Gender:</div><div> <input type="text" name="gender" value="'.$this->model->getGender().'"/></div><br>
		<div>Date Of Birth: </div><div><input type="text" name="dateofbirth" value="'.$this->model->getDateOfBirth().'"/></div><br>
		<div><input type="submit" /></div>';
		return $str;
	}


	public function viewEditUPatientData($patientData){
$str = ' <div style="margin: 0 auto; width:1500px;" class="form-group col-md-6">
<div class="form-group col-md-6">
			<form method="POST" action="" enctype="multipart/form-data" >
			<h4 style="font-size: 23px; ">Username</h4>
<div class= "input-container">
<i class="fa fa-user icon"></i>
				<input  class="input" name = "username" id="inputEmail4" placeholder="Username" value="'.$patientData->getUserName().'"><br>
				</div>
				<h4 style="font-size: 23px; ">Email</h4>
<div class= "input-container">
<i class="fa fa-envelope icon"></i>
				
				<input type="email" class="input" placeholder="Enter your email" required name="email" onkeyup="filter(this)" id="registeremail" value="'.$patientData->getEmail().'"><br>
				</div>

				<h4 style="font-size: 23px; width:150px;" >Select Gender:</h4>
<div class= "input-container">
<i class="fa fa-transgender icon"></i>
			<select name="gender" class="input" id="Select">
			<option disabled="">Select Gender</option>
			';
		if($patientData->getGender() == "Female"){
			$str .= '<option selected>Female</option>
					<option>Male</option>';
		}
		elseif($patientData->getGender() == "Male"){
			$str .=	'<option selected>Male</option>
					<option>Female</option>';
		}
		$str.= '</select required>
				<br>
				</div>
				<h4 style="font-size: 23px; width:150px;">Date of Birth:</h4>
<div class= "input-container">
<i class="fa fa-calendar icon"></i>
				<input type="date" name= "dateofbirth" class="input" id="birthday" placeholder="Your Birthday" value="'.$patientData->getDateOfBirth().'">
				<br>
				</div>
				<div class="regerv_btn">
				<button type="submit" name="save2"class="btn_2">Update</button>
				</div>
				</div>
			</form>
		</div>
		</div>';
		return $str;
	
	}


function testsform(){
$str=' <div style="margin: 0 auto; width:1500px;" class="form-group col-md-6">
<form method="POST" action="tests.php?action=addTest" enctype="multipart/form-data" style="   max-width: 100%;
margin: 0 auto;  
display: block;">

<div class= "input-container">

<input type="email" class="inputemail" placeholder="Enter your email..." required name="email" onkeyup="filter(this)" id="email"><br>
</div>

<input class="inputtest" type="file" accept="img/*" name="image"><br><br>
<div class="input_wrapper">
<h4 style= " color: #114C56; font-size: 25px;">CRP:</h4>
<input type="number" class="inputtest" placeholder="Enter CRP value" name="CPR" onkeyup="filter(this)" id="CPR" /><span style="margin-left:-40px; color: black;">mg/l</span>

</div>
<div class="input_wrapper">
<h4 style= " color: #114C56; font-size: 25px;">Ferritin:</h4>
<input type="number" class="inputtest" placeholder="Enter Ferritin value" name="Ferritin" onkeyup="filter(this)" id="Ferritin" /><span style="margin-left:-53px; color: black;">ng/mL</span>

</div>
<div class="input_wrapper">
<h4 style= " color: #114C56; font-size: 25px;">LDH:</h4>
<input type="number" class="inputtest" placeholder="Enter LDH value" name="LDH" onkeyup="filter(this)" id="LDH" /><span style="margin-left:-37px; color: black;">U/l</span>

</div>
<div class="input_wrapper">
<h4 style= " color: #114C56; font-size: 25px;">ALT:</h4>
<input type="number" class="inputtest" placeholder="Enter ALT value" name="ALT" onkeyup="filter(this)" id="ALT" /><span style="margin-left:-37px; color: black;">U/l</span>

</div>
<div class="input_wrapper">
<h4 style= " color: #114C56; font-size: 25px;">CBC:</h4>
<input  type="number" class="inputtest" placeholder="Enter CBC value" name="CBC" onkeyup="filter(this)" id="CBC" /><span style="margin-left:-40px; color: black;">g/dl</span>

</div>
<div class="input_wrapper">
<h4 style= " color: #114C56; font-size: 25px;">D-Dimer:</h4>
<input type="number" class="inputtest" placeholder="Enetr D-Dimer value" name="DDimer" onkeyup="filter(this)" id="DDimer" /><span style="margin-left:-90px; color: black;">µg FEU/mL</span>

</div>
<div class="input_wrapper">
<h4 style= " color: #114C56; font-size: 25px;">AST:</h4>
<input type="number" class="inputtest" placeholder="Enter AST value" name="AST" onkeyup="filter(this)" id="AST" /><span style="margin-left:-37px; color: black;">U/l</span>

</div>
<div class="regerv_btn"><button type="submit" name="submit"class="btn_2">Submit</button></div><br><br>

</form>
</div>';
return $str;
}

public function addPatientData(){
$str ='<div style="margin: 0 auto; width:1500px;" class="form-group col-md-6">
<form method="POST" action="addPatient.php?action=addPatient" enctype="multipart/form-data" >
<div class= "input-container">
<i class="fa fa-user icon"></i>
<input class="input" name="username" id="inputEmail4" placeholder="Enter Username"><br>
</div>
<div class= "input-container">
<i class="fa fa-envelope icon"></i>
<input type="email" class="input" placeholder="Enter Email" required name="email" onkeyup="filter(this)" id="registeremail"><br>
</div>
<div class= "input-container">
<i class="fa fa-transgender icon"></i>
<select name="gender" class="input" id="Select">
<option selected>Select Gender</option>
<option >Male</option>
<option >Female</option>
</select required>
<br>
</div>
<div class= "input-container">
<i class="fa fa-calendar icon"></i>
<input type="date" name= "dateofbirth" class="input" id="birthday" placeholder="Your Birthday">
<br>
</div>
<div class="regerv_btn">
<button  type="submit" name="submit"class="btn_2">Submit</button>
</div>
</form>';
return $str;


}

}
?>

