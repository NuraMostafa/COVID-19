
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
			         <div class= "input-container">
			    <i class="fa fa-envelope icon"></i>
			        <input type="email" class="input"  placeholder="Enter your email" required name="email" onkeyup="filter(this)" id="registeremail"><br>
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
            <input type="text" placeholder="Search" style="margin: 0 auto; width: 300px; display:inline-block;" class="form-control" id="searchtext" name="searchKey" value="'.((isset($_GET['searchKey']) && !empty($_GET['searchKey'])) ? $_GET['searchKey'] : '') .'">  <button style="background-color: #008CBA;border: none;color: white;padding: 1px 17px;text-align: center;text-decoration: none;display: inline-block;font-size: 14px;" type="submit">Search</button>
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
		$str = '
		<div class="form-group col-md-6">
			<form method="POST" action="" enctype="multipart/form-data" >
			<h4 >Username</h4>
				<input  class="x" name = "username" id="inputEmail4" placeholder="Username" value="'.$userData->getUserName().'"><br>
				<h4 >Email</h4>
				<input type="email" class="x" placeholder="Enter your email" required name="email" onkeyup="filter(this)" id="registeremail" value="'.$userData->getEmail().'"><br>
				<h4 >password</h4>
				<input type="password" class="x" placeholder="Enter your password" required name="password" onkeyup="filter(this)" id="rwgisterpassword" value="'.$userData->getPassword().'"><br>
				<input type="password" class="x" required name="user_type" value="'.$userData->getUserType().'" hidden>
				<h4 >Select Gender</h4>
			<select name="gender" class="x" id="Select">
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
				<h4 >Date of Birth</h4>
				<input type="date" name= "dateofbirth" class="x" id="birthday" placeholder="Your Birthday" value="'.$userData->getDateOfBirth().'">
				<br>
				<div class="regerv_btn">
				<button type="submit" name="save"class="btn_2">Update</button>
				</div>
				</div>
			</form>
		</div>
		';
		return $str;;
	
	}
		public function addUserData(){
		$str ='<form method="POST" action="adduser.php?action=addUser" enctype="multipart/form-data" >
			    <h4 >Username</h4>
		        <input class="x" name="username" id="inputEmail4" placeholder="Username"><br>
		        <h4 >Email</h4>
		        <input type="email" class="x" placeholder="Enter your email" required name="email" onkeyup="filter(this)" id="registeremail"><br>
		        <h4 >Password</h4>
		        <input type="password" class="x" placeholder="Enter your password" required name="password" onkeyup="filter(this)" registerpassword"><br>
		        <h4 >Confirm Password</h4>
		        <input type="password" class="x" id="inputEmail4" placeholder="Confirm Password" required name="Confirmpassword" onkeyup="filter(this)" id="registerconfirmpassword"><br>
		        <h4 >Select Gender</h4>
		        <select name="gender" class="x" id="Select">
			        <option selected>Select Gender</option>
			        <option >Male</option>
			        <option >Female</option>
		        </select required>
			    <br>
			    <h4 >Date of Birth</h4>
			    <input type="date" name= "dateofbirth" class="x" id="birthday" placeholder="Your Birthday">
				<br>
		        <div class="regerv_btn">
		        	<button  type="submit" name="save"class="btn_2">Submit</button>
		        </div>
			</form>';
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
                    <th>Email</th> 
                    <th>Edit</th> 
                    <th>Delete</th> 
                    <th>AddTest</th> 
                  </tr>';
                  
        	if (count($PatientsArray) > 0) {
		        for($i = 0 ; $i < count($PatientsArray); $i ++) {
			    	$str.='<tr>
				            <td>'.$PatientsArray[$i]->getiD().'</td>
				            <td>'.$PatientsArray[$i]->getuserName().'</td>
				            <td>'.$PatientsArray[$i]->getuserName().'</td>
				            <td>'.$PatientsArray[$i]->getgender().'</td>
				            <td><a href="editPatient.php?patientID='.$PatientsArray[$i]->getID().'"> Edit </a></td>
				            <td><a href="doctor.php?action=deletePatient&patientID='.$PatientsArray[$i]->getID().'"> Delete </a></td>
				            <td><a href="tests.php"> Add Test </a></td>

			            </tr>';                    
	            }
            } else {
              $str.= "<p style='color:black;'>No data to view</p>";
            }
            $str.= '</table>
					<br> <br>
					<div class="regerv_btn">
					<a href="adduser.php" class="btn_2">Add Patient</a>
					</div>
						</div>';
        return $str;
	}


	public function viewProfile($userData){
		$str='
		<br><br>
		<h1 >Profile</h1>
		<br>
		<div class="form-group col-lg-12">
			<form method="GET" action="">
			<div class="row" id="old">
                <table>
					<tr>
						<td>ID</td>
						<td>'.$userData->getID().'</td>
					</tr>
					<tr>
						<td>User Name</td>
						<td>'.$userData->getUserName().'</td>
					</tr>
					<tr>
						<td>Email</td>
						<td>'.$userData->getEmail().'</td>
					</tr>
					<tr>
						<td>Gender</td>
						<td>'.$userData->getGender().'</td>
					</tr>
					<tr>
						<td>Date Of Birth</td>
						<td>'.$userData->getDateOfBirth().'</td>
					</tr>
					<tr>
				            <td><a href="editPatientaccount.php?userID='.$userData->getID().'"> Edit </a></td>
				            <td><a href="profile.php?action=deleteUser&userID='.$userData->getID().'"> Delete </a></td>
			            </tr>  
	            </table>
			<br> <br>
			<div class="regerv_btn">
					<a href="tests.php" class="btn_2">Add Test</a>
					</div>
		</div>';
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
		$str = '
			<div class="form-group col-md-6">
			<form method="POST" action="" enctype="multipart/form-data" >
			<h4 >Username</h4>
				<input  class="x" name = "username" id="inputEmail4" placeholder="Username" value="'.$patientData->getUserName().'"><br>
				<h4 >Email</h4>
				<input type="email" class="x" placeholder="Enter your email" required name="email" onkeyup="filter(this)" id="registeremail" value="'.$patientData->getEmail().'"><br>
				<h4 >Select Gender</h4>
			<select name="gender" class="x" id="Select">
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
				<h4 >Date of Birth</h4>
				<input type="date" name= "dateofbirth" class="x" id="birthday" placeholder="Your Birthday" value="'.$patientData->getDateOfBirth().'">
				<br>
				<div class="regerv_btn">
				<button type="submit" name="save2"class="btn_2">Update</button>
				</div>
				</div>
			</form>
		</div>
		';
		return $str;;
	}


	
	function testsform(){
		$str=' <form method="POST" action="tests.php?action=addTest" enctype="multipart/form-data" style="   max-width: 100%;
  margin: 0 auto;  
  display: block;">
        
        <div class= "input-container">
		        
        <input type="email" class="input" style="  -webkit-border-radius: 10px;
                                                   -moz-border-radius: 10px;
                                                    border-radius: 20px; 
                                                    background-color: white;" 
       placeholder="Enter your email..." required name="email" onkeyup="filter(this)" id="email"><br>
        </div>
        <div class="input_wrapper">
        <h4 style= " color: #114C56; font-size: 25px;">CRP:</h4>
       <input type="number" class="input" placeholder="Enter CRP value" name="CPR" onkeyup="filter(this)" id="CPR" /><span style="margin-left:-40px; color: black;">mg/l</span>
   
  </div>
  <div class="input_wrapper">
  <h4 style= " color: #114C56; font-size: 25px;">Ferritin:</h4>
    <input type="number" class="input" placeholder="Ferritin" name="Ferritin" onkeyup="filter(this)" id="Ferritin" /><span style="margin-left:-53px; color: black;">ng/mL</span>
   
  </div>
  <div class="input_wrapper">
  <h4 style= " color: #114C56; font-size: 25px;">LDH:</h4>
    <input type="number" class="input" placeholder="LDH" name="LDH" onkeyup="filter(this)" id="LDH" /><span style="margin-left:-37px; color: black;">U/l</span>
    
  </div>
  <div class="input_wrapper">
  <h4 style= " color: #114C56; font-size: 25px;">ALT:</h4>
    <input type="number" class="input" placeholder="ALT" name="ALT" onkeyup="filter(this)" id="ALT" /><span style="margin-left:-37px; color: black;">U/l</span>
    
  </div>
  <div class="input_wrapper">
  <h4 style= " color: #114C56; font-size: 25px;">CBC:</h4>
    <input  type="number" class="input" placeholder="CBC" name="CBC" onkeyup="filter(this)" id="CBC" /><span style="margin-left:-40px; color: black;">g/dl</span>
   
  </div>
  <div class="input_wrapper">
  <h4 style= " color: #114C56; font-size: 25px;">D-Dimer:</h4>
    <input type="number" class="input" placeholder="D-Dimer" name="DDimer" onkeyup="filter(this)" id="DDimer" /><span style="margin-left:-90px; color: black;">µg FEU/mL</span>
   
  </div>
  <div class="input_wrapper">
  <h4 style= " color: #114C56; font-size: 25px;">AST:</h4>
    <input type="number" class="input" placeholder="AST" name="AST" onkeyup="filter(this)" id="AST" /><span style="margin-left:-37px; color: black;">U/l</span>
    
  </div>
        <div class="regerv_btn"><button type="submit" name="submit"class="btn_2">Add Test</button></div><br><br>

    </form>';
		return $str;
	}
			public function addPatientData(){
		$str ='<form method="POST" action="addPatient.php?action=addPatient" enctype="multipart/form-data" >
			    <h4 >Username</h4>
		        <input class="x" name="username" id="inputEmail4" placeholder="Username"><br>
		        <h4 >Email</h4>
		        <input type="email" class="x" placeholder="Enter your email" required name="email" onkeyup="filter(this)" id="registeremail"><br>
		        <h4 >Select Gender</h4>
		        <select name="gender" class="x" id="Select">
			        <option selected>Select Gender</option>
			        <option >Male</option>
			        <option >Female</option>
		        </select required>
			    <br>
			    <h4 >Date of Birth</h4>
			    <input type="date" name= "dateofbirth" class="x" id="birthday" placeholder="Your Birthday">
				<br>
		        <div class="regerv_btn">
		        	<button  type="submit" name="submit"class="btn_2">Submit</button>
		        </div>
			</form>';
		return $str;


}

}
?>

