<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Admin_model extends Model{
	
	public function get_data(){

        if($_SESSION['usertype'] == 0){
            return $this->db->table('users')
                    ->where('email', $_SESSION['email'])
                    ->get();
        }
        else{
            return $this->db->table('tblstaff')
                    ->where('email', $_SESSION['email'])
                    ->get();
        }
    }

    public function patientChart()
    {
        return $this->db->raw("SELECT DATE(visit_date) AS dayCreation, COUNT(id) AS perDayPatient FROM `tblpatientrecords` GROUP BY DATE(visit_date)");
    }

    public function patientinitialChart()
    {
        return $this->db->raw("SELECT DATE(visit_date) AS dayCreation, COUNT(id) AS perDayPatient FROM `tblpatientrecords` WHERE type=0 GROUP BY DATE(visit_date)");
    }

    public function patientfollowChart(){
        return $this->db->raw("SELECT DATE(visit_date) AS dayCreation, COUNT(id) AS perDayPatient FROM `tblpatientrecords` WHERE type=1 GROUP BY DATE(visit_date)");
    }

    public function barangayChart()
    {
        return $this->db->table('tblpatientrecords')->select('address')->select_count('id', 'numPerPatient')->group_by('address')->get_all();
    }

    public function barangayinitialChart()
    {
        return $this->db->table('tblpatientrecords')->select('address')->select_count('id', 'numPerPatient')->where('type', 0)->group_by('address')->get_all();
    }

    public function barangayfollowChart()
    {
        return $this->db->table('tblpatientrecords')->select('address')->select_count('id', 'numPerPatient')->where('type', 1)->group_by('address')->get_all();
    }

    public function get_barangay(){
        return $this->db->table('barangay')->get_all();
    }

    public function get_classification_names(){
        return $this->db->table('classification')->select('name')->get_all();
    }

    public function get_inquiry_count(){
    	return $this->db->table('tblinquiry')->select_count('*', 'crows')->where('status', 'unread')->get();
    }

    public function get_patient_records(){
    	return $this->db->table('tblpatientrecords')->select_count('*', 'prows')->where('type', 0)->get();
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

    public function get_classifications(){
        return $this->db->table('classification')->get_all();
    }

    public function update_info($id, $fullname, $address, $cnumber, $photo) {
        $data = array(
            'fullname' => ucwords($fullname),
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

    public function get_staff_info($sid){
        return $this->db->table('tblstaff')
                    ->select('staff_id, fullname')
                    ->where('staff_id', $sid)
                    ->get();
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


    public function patientageChart(){
        return $this->db->raw("SELECT 
              IF(age BETWEEN 0 AND 14, '0-14',
                IF(age BETWEEN 15 AND 24, '15-24',
                    IF(age BETWEEN 25 AND 44, '25-44',
                        IF(age BETWEEN 45 AND 64, '45-64',
                            IF(age BETWEEN 65 AND 74, '65-74',
                                IF(age >= 75, '75-80+', '')
                                )
                            )
                        )
                    )
                ) AS patientAge,
              SUM(1) AS numPerPatient
            FROM 
              tblpatientrecords
            WHERE
                type=0
            GROUP BY 
              patientAge
            ORDER BY 
              patientAge;");
    }

    public function patientbarangayChart(){
        return $this->db->raw("SELECT address AS patientAdd, COUNT(id) AS numPerPatient FROM `tblpatientrecords` WHERE address IS NOT NULL GROUP BY address");
    }


    public function patientagefollowageChart(){
        return $this->db->raw("SELECT 
              IF(age BETWEEN 0 AND 14, '0-14',
                IF(age BETWEEN 15 AND 24, '15-24',
                    IF(age BETWEEN 25 AND 44, '25-44',
                        IF(age BETWEEN 45 AND 64, '45-64',
                            IF(age BETWEEN 65 AND 74, '65-74',
                                IF(age >= 75, '75-80+', '')
                                )
                            )
                        )
                    )
                ) AS patientAge,
              SUM(1) AS numPerPatient
            FROM 
              tblpatientrecords
            WHERE
                type=1
            GROUP BY 
              patientAge
            ORDER BY 
              patientAge;");
    }
}
?>