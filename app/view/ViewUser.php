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
			        <h4 >Email</h4>
			        <input type="email" class="x" placeholder="Enter your email" required name="email" onkeyup="filter(this)" id="registeremail"><br>
			        <h4 >Password</h4>
			        <input type="password" class="x" placeholder="Enter your password" required name="password" onkeyup="filter(this)" id="registerpassword"><br>
			        <div class="regerv_btn">
			        <button type="submit" name="login"class="btn_2">Login</button>
			        </div>
			        </div>
			    </form>';
		return $str;
	}

	function signupForm(){
		$str='<form method="POST" action="user.php?action=insert" enctype="multipart/form-data" >
			    <h4 >Username</h4>
		        <input  class="x" name="username" id="inputEmail4" placeholder="Username"><br>
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
		return $str;
	}
}
?>
