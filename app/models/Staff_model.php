<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Staff_model extends Model{

    
    public function insert_staff($fullname, $password, $position, $birthday, $gender, $email, $cnumber, $address, $photo){
        
        $data = array(
            'fullname' => ucwords($fullname),
            'password' => $this->passwordhash($password),
            'usertype' => 2, //no need to edit modal and controller
            'position' => $position,
            'birthday' => $birthday,
            'gender' => $gender,
            'email' => $email,
            'cnumber' => $cnumber,
            'address' => $address,
            'photo' => $photo
        );
        
        $emailexist = $this->db->table('users')->select_count('*', 'erows')->where('email', $email)->get();
        $emailexist2 = $this->db->table('tblstaff')->select_count('*', 'srows')->where('email', $email)->get();

        if($emailexist['erows'] > 0){
            $_SESSION['error'] = 'Staff was not added, email is already in use!';
            return false;
        }
        else if($emailexist2['srows'] > 0){
            $_SESSION['error'] = 'Staff was not added, email is already in use!';
            return false;
        }
        else{
            $result = $this->db->table('tblstaff')->insert($data);
            
            if($result){
                return true;
            }
            else{
                $_SESSION['error'] = 'An error occured while adding the staff. Try again!';
                return false;
            }
        }

    }

    public function passwordhash($password)
    {
        $options = array(
        'cost' => 4,
        );
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

    public function show_staff(){
        return $this->db->table('tblstaff')->get_all();
    }

    public function delete_staff($staff_id){
        $result = $this->db->table('tblstaff')
                        ->where(array('staff_id' => $staff_id))
                        ->delete();

        if($result){
            $_SESSION['success'] = 'Staff deleted successfully';
            return true;
        }
    }


    public function update_data($staff_id, $fullname, $position, $birthday, $gender, $cnumber, $address, $photo) {
        $data = array(
            'fullname' => ucwords($fullname),
            'position' => $position,
            'birthday' => $birthday,
            'gender' => $gender,
            'cnumber' => $cnumber,
            'address' => $address,
            'photo' => $photo
        );
        
            $result = $this->db->table('tblstaff')
                            ->where('staff_id', $staff_id)
                            ->update($data);

            if($result){
                return true;
            }
        
    }

    public function get_single_data($staff_id){
        return $this->db->table('tblstaff')
                    ->where('staff_id', $staff_id)
                    ->get();
    }

    public function get_data(){
        return $this->db->table('tblstaff')
                    ->where('staff_id', $_SESSION['userid'])
                    ->get();
    }

    public function update_photo($staff_id, $photo){
        $data = array('photo' => $photo);
        return $this->db->table('tblstaff')
                        ->where('staff_id', $staff_id)
                        ->update($data);
    }

    public function update_info($id, $fullname, $address, $cnumber, $photo) {
        $data = array(
            'fullname' => ucwords($fullname),
            'address' => $address,
            'cnumber' => $cnumber,
            'photo' => $photo
        );
        
            $result = $this->db->table('tblstaff')
                            ->where('staff_id', $id)
                            ->update($data);

            if($result){
                return true;
            }
        
    }

    public function display_staff($id, $value){
        $data = array(
            'display' => $value
        );
        $up = $this->db->table('tblstaff')->where('staff_id', $id)->update($data);

        if($up){
            return true;
        }
        else{
            return false;
        }
    }

    public function change_password($id, $oldpass, $newpass, $confirmpass){

        $data = array(
            'password' => $this->passwordhash($newpass)
        );

        $user = $this->db->table('tblstaff')->where('staff_id', $id)->get();
        if(password_verify($oldpass, $user['password']))
        {
            if($newpass == $confirmpass)
            {
                $updatepass = $this->db->table('tblstaff')->where('staff_id', $id)->update($data);
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
        $target_dir = "public/images/avatar/";
        $target_file = basename($_FILES["fileToUpload"]["name"]);
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
            $new_img_name = uniqid('PROFILE-', true).'.'.$imageFileType;
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $new_img_name)) {
                return $new_img_name;
            }
        }
    }
}
?>