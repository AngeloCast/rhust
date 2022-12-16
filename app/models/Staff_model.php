<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Staff_model extends Model{

    
    public function insert_staff($firstname, $lastname, $position, $birthday, $age, $gender, $email, $cnumber, $address, $photo){
        
        $data = array(
            'firstname' => ucfirst($firstname),
            'lastname' => ucfirst($lastname),
            'position' => $position,
            'birthday' => $birthday,
            'age' => $age,
            'gender' => $gender,
            'email' => $email,
            'cnumber' => $cnumber,
            'address' => $address,
            'photo' => $photo
        );
        
        
        $result = $this->db->table('tblstaff')
                ->insert($data);

            if($result){
                return true;
            }
        

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


    public function update_data($staff_id, $firstname, $lastname, $position, $birthday, $age, $gender, $email, $cnumber, $address, $photo) {
        $data = array(
            'firstname' => ucfirst($firstname),
            'lastname' => ucfirst($lastname),
            'position' => $position,
            'birthday' => $birthday,
            'age' => $age,
            'gender' => $gender,
            'email' => $email,
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

    public function upload(){
        $random = 'File' . rand(0, 100000);
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