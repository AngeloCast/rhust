<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Admin_model extends Model{
	
	public function get_data(){
        return $this->db->table('users')
                    ->where('email', $_SESSION['email'])
                    ->get();
    }

    public function get_inquiry_count(){
    	return $this->db->table('tblinquiry')->select_count('*', 'crows')->where('status', 'unread')->get();
    }

    public function get_patient_records(){
    	return $this->db->table('tblpatientrecords')->select_count('*', 'prows')->get();
    }

    public function get_userscount(){
    	return $this->db->table('users')->select_count('*', 'numrows')->get();
    }

    public function get_inquirycount(){
    	return $this->db->table('tblinquiry')->select_count('*', 'inqrows')->get();
    }

    public function get_eventscount(){
        return $this->db->table('tblevents')->select_count('*', 'erows')->get();
    }

    public function update_info($id, $fullname, $email, $address, $cnumber, $photo) {
        $data = array(
            'fullname' => ucfirst($fullname),
            'email' => $email,
            'address' => $address,
            'cnumber' => $cnumber,
            'photo' => $photo
        );
        
            $result = $this->db->table('users')
                            ->where('id', $id)
                            ->update($data);

            if($result){
                return true;
            }
        
    }

    public function passwordhash($password)
    {
        $options = array(
        'cost' => 4,
        );
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

    public function change_password($id, $oldpass, $newpass, $confirmpass){

        $data = array(
            'password' => $this->passwordhash($newpass)
        );

        $user = $this->db->table('users')->where('id', $id)->get();
        if(password_verify($oldpass, $user['password']))
        {
            if($newpass == $confirmpass)
            {
                $updatepass = $this->db->table('users')->where('id', $id)->update($data);
                if($updatepass)
                {
                    return true;
                }
                else{
                    $_SESSION['error'] = 'Password not updated! Try again';
                    return false;
                }
            }
            else{
                $_SESSION['error'] = 'New and confirm password did not match! Try again';
                return false;
            }
        }
        else{
            $_SESSION['error'] = 'Incorrect old password! Try again';
            return false;
        }
    }

    public function upload(){
        $random = 'IMG' . rand(0, 100000);
        $target_dir = "public/images/";
        $target_file = $random . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                            // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $this->session->set_flashdata(array('error' => 'An error occured! Uploaded file is not an image!'));
                $uploadOk = 0;
            }
        }
        
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 10000000) {
            $this->session->set_flashdata(array('error' => 'An error occured! File is too large!'));
            $uploadOk = 0;
        }
                            // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            $this->session->set_flashdata(array('error' => 'An error occured! Sorry, only JPG, JPEG, PNG & GIF files are allowed!'));
            $uploadOk = 0;
        }
                            // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return false;
                            // if everything is ok, try to upload file
        } 
        else 
        {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $target_file)) {
                return $target_file;
            }
        }
    }
}
?>