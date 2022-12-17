<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Auth_model extends Model{
	
	public function passwordhash($password)
	{
		$options = array(
		'cost' => 4,
		);
		return password_hash($password, PASSWORD_BCRYPT, $options);
	}

	public function login($email, $password)
	{
    	$row = $this->db->table('users') 					
    					->where('email', $email)
    					->get();
		if($row)
		{
			if(password_verify($password, $row['password']))
			{
				$row = $this->db->table('users')->where('email', $email)->get();
				$this->session->set_userdata(array('email' => $email, 'loggedin' => 1, 'usertype' => $row['usertype']));
				return true;
			} 
			else 
			{
				$_SESSION['error'] = 'Wrong password!';
				return false;
			}
		}
		else{
			$_SESSION['error'] = 'Wrong Email!';
			return false;
		}
	}
	
	public function register($fullname, $email, $password, $validation_code, $notification)
	{

		$data = array(
			'fullname' => $fullname,
			'email' => $email,
			'password' => $this->passwordhash($password),
			'validation_code' => $validation_code,
			'notification' => $notification
			);

		$code = array(
			'validation_code' => $validation_code,
			'fullname' => $fullname,
			'password' => $this->passwordhash($password)
		);
		
		$emailexist = $this->db->table('users')->select_count('*', 'erows')->where('email', $email)->get();
		$registered = $this->db->table('users')->select_count('*', 'rrows')->where('email', $email)->where('status', 1)->get();
		

		if($emailexist['erows'] > 0)
		{
			if($registered['rrows'] > 0)
			{
				$_SESSION['error'] = 'Email is already registered!';
				return false;
			}
			else{
				$updateusercode = $this->db->table('users')
											->where('email', $email)
											->update($code);
				if($updateusercode){
					$_SESSION['globalemail'] = $email;
					return true; //i-send ang updated code sa email
				}
				else{
					$_SESSION['error'] = 'An error occured sending the code! Please try again';
					return false;
				}
			}
		}
		else{

			$insertuser = $this->db->table('users')->insert($data);

			if($insertuser){
				$_SESSION['globalemail'] = $email;
				return true;
			}
			else{
				$_SESSION['error'] = 'An error occured sending the code! Please try again';
				return false;
			}

		}
	}


	public function validate_code($validation_code, $globalemail)
	{
		$update = array(
			'status' => 1
		);

		$check = $this->db->table('users')->where('email', $globalemail)->get();


			if($check['validation_code'] == $validation_code){
				$this->db->table('users')->where('email', $globalemail)->update($update);
				return true;
			}
			else{
				$this->session->set_flashdata(array('error' => 'The validation code was incorrect! Try again'));
				return false;
			}
		
	}

	public function checkreg($email){
		$check = $this->db->table('users')->select('status')->where('email', $email)->get();
		if($check == 1){
			return true;
		}
	}
	public function is_loggedin(){
		if($this->session->userdata('loggedin') === 1){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function usertype(){
		if($this->session->userdata('usertype') === 0){
			return true; //ADMIN
		}
		else{
			return false; //USER
		}
	}

	
	/**

	 */
	// public function is_logged_in()
	// {
	// 	if($this->session->userdata('loggedin') === 1)
	// 		return true;
	// }

	// /**

	//  */
	// public function get_username()
	// {
	// 	$username = $this->session->userdata('username');
	// 	return !empty($username) ? $username : false;
	// }

	// public function get_usertype()
	// {
	// 	$usertype = $this->session->userdata('usertype');
	// 	if($usertype == 0){
	// 		return true;
	// 	}
	// 	else{
	// 		return false;
	// 	}
	// }

	

	public function set_logged_out() {
		$this->session->unset_userdata(array('loggedin', 'username'));
		$this->session->sess_destroy();
	}
}
?>