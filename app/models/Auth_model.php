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
    	$row = $this->db->table('users')->where('email', $email)->get();
    	$staff = $this->db->table('tblstaff')->where('email', $email)->get();

		if(!empty($row))
		{
			if($row['status'] == 1){
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
				$_SESSION['error'] = 'This account is not fully registered!';
				redirect('auth/register');
			}
		}
		else if(!empty($staff)){
			if(password_verify($password, $staff['password']))
			{
				$sinfo = $this->db->table('tblstaff')->where('email', $email)->get();
				$this->session->set_userdata(array('email' => $email, 'loggedin' => 1, 'usertype' => $sinfo['usertype']));
				return true;
			} 
			else 
			{
				$_SESSION['error'] = 'Wrong password!';
				return false;
			}
		}
		else{
			$_SESSION['error'] = 'This account does not exist! Register now!';
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
		$emailexist2 = $this->db->table('tblstaff')->select_count('*', 'srows')->where('email', $email)->get();
		$registered = $this->db->table('users')->select_count('*', 'rrows')->where('email', $email)->where('status', 1)->get();
		

		if($emailexist['erows'] > 0)
		{
			if($registered['rrows'] > 0)
			{
				$_SESSION['error'] = 'Email is already registered! Use a different email';
				return false;
			}
			else{
				$updateusercode = $this->db->table('users')
											->where('email', $email)
											->update($code);
				if($updateusercode){
					return true; //i-send ang updated code sa email
				}
				else{
					$_SESSION['error'] = 'An error occured sending the code! Please try again';
					return false;
				}
			}
		}
		else if($emailexist2['srows'] > 0){
			$_SESSION['error'] = 'Email is already registered! Use a different email';
			return false;
		}
		else{

			$insertuser = $this->db->table('users')->insert($data);

			if($insertuser){
				return true;
			}
			else{
				$_SESSION['error'] = 'An error occured sending the code! Please try again';
				return false;
			}

		}
	}


	public function validate_code($validation_code, $email)
	{
		$update = array(
			'status' => 1
		);

		$check = $this->db->table('users')->where('email', $email)->get();


			if($check['validation_code'] == $validation_code){
				$this->db->table('users')->where('email', $email)->update($update);
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

	public function check_email($email, $reset_code){
		$update = array('reset_code' => $reset_code);
		$where = array('email' => $email, 'status' => 1);
		$uemail = $this->db->table('users')->select_count('*', 'urows')->where($where)->get();
		$semail = $this->db->table('tblstaff')->select_count('*', 'srows')->where('email', $email)->get();
		if($uemail['urows'] > 0)
		{
			$this->db->table('users')->where('email', $email)->update($update);
			return true;
		}
		else if($semail['srows'] > 0){
			$this->db->table('tblstaff')->where('email', $email)->update($update);
			return true;
		}
		else{
			$_SESSION['error'] = 'The email you entered is not registered! ';
			return false;
		}
	}

	public function reset_password($newpass, $confirmpass, $email, $reset_code){
		$where = array('email' => $email, 'status' => 1);
		$update = array('password' => $this->passwordhash($newpass));
		$checkcode = $this->db->table('users')->select('reset_code')->where($where)->get();
		$checkcode2 = $this->db->table('tblstaff')->select('reset_code')->where('email', $email)->get();

		if($newpass == $confirmpass){
			if(!empty($checkcode)){
				if($checkcode['reset_code'] == $reset_code){
					$this->db->table('users')->where('email', $email)->update($update);
					return true;
				}
				else{
					$_SESSION['error'] = 'Reset code did not match! Password was not updated';
					return false;
				}
			}
			else if(!empty($checkcode2)){
				if($checkcode2['reset_code'] == $reset_code){
					$this->db->table('tblstaff')->where('email', $email)->update($update);
					return true;
				}
				else{
					$_SESSION['error'] = 'Reset code did not match! Password was not updated';
					return false;
				}
			}
			else{
				$_SESSION['error'] = 'The account you entered does not exist! Try again.';
				return false;
			}
		}
		else
		{
			$_SESSION['error'] = 'New password and confirm password did not match! Try again.';
			return false;
		}

	}

	public function set_logged_out() {
		$this->session->unset_userdata(array('loggedin', 'username'));
		$this->session->sess_destroy();
	}
}
?>