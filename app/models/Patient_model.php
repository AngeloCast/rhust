<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Patient_model extends Model{

    
    public function insert_patient($serial_no, $firstname, $lastname, $middlename, $age, $gender, $birthday, $civil_status, $contact_person, $address, $cnumber, $health_insurance, $religion, $blood_type, $visit_date, $visit_time, $age_months, $food_allergy, $medicine_allergy, $chief_complaints, $history_presentillness, $hypertension_meds, $diabetes_meds, $bronchial_meds, $last_attack, $other_hldse, $operation, $bp, $heart_rate, $respiratory_rate, $temperature, $weight, $height, $physical_exam, $assessment, $classification, $management_plan, $service_provider, $signature){
        date_default_timezone_set('Asia/Manila');
        $edited = date('Y-m-d H:i:s');
        $date = date('Y-m-d');
        $unique = mt_rand();
        if($age == ''){$age = NULL;}
        if($birthday == ''){$birthday = NULL;}
        if($cnumber == ''){$cnumber = NULL;}
        if($visit_date == ''){$visit_date = NULL;}
        if($visit_time == ''){$visit_time = NULL;}
        if($age_months == ''){$age_months = NULL;}
        if($last_attack == ''){$last_attack = NULL;}
        if($temperature == ''){$temperature = NULL;}
        if($weight == ''){$weight = NULL;}
        if($height == ''){$height = NULL;}
        
        $patientdata = array(
            'serial_no' => $serial_no,
            'firstname' => ucfirst($firstname),
            'lastname' => ucfirst($lastname),
            'middlename' => ucfirst($middlename),
            'age' => $age,
            'gender' => $gender,
            'birthday' => $birthday,
            'civil_status' => $civil_status,
            'contact_person' => $contact_person,
            'address' => $address,
            'cnumber' => $cnumber,
            'health_insurance' => $health_insurance,
            'religion' => $religion,
            'blood_type' => $blood_type,
            'visit_date' => $visit_date,
            'visit_time' => $visit_time,
            'age_months' => $age_months,
            'food_allergy' => $food_allergy,
            'medicine_allergy' => $medicine_allergy,
            'chief_complaints' => $chief_complaints,
            'history_presentillness' => $history_presentillness,
            'hypertension_meds' => $hypertension_meds,
            'diabetes_meds' => $diabetes_meds,
            'bronchial_meds' => $bronchial_meds,
            'last_attack' => $last_attack,
            'other_hldse' => $other_hldse,
            'operation' => $operation,
            'bp' => $bp,
            'heart_rate' => $heart_rate,
            'respiratory_rate' => $respiratory_rate,
            'temperature' => $temperature,
            'weight' => $weight,
            'height' => $height,
            'physical_exam' => $physical_exam,
            'assessment' => $assessment,
            'classification' => $classification,
            'management_plan' => $management_plan,
            'service_provider' => $service_provider,
            'signature' => $signature,
            'date_created' => $date,
            'last_edited' => $edited,
            'type' => 0,
            'p_id' => $unique
        );
        
        $result = $this->db->table('tblpatientrecords')
                ->insert($patientdata);

        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function show_patient(){
        return $this->db->table('tblpatientrecords')->where('type', 0)->get_all();
    }

    public function show_follow_up(){
        return $this->db->table('tblpatientrecords')->where('type', 1)->get_all();
    }

    public function delete_patient_record($id){
        $result = $this->db->table('tblpatientrecords')
                        ->where(array('id' => $id))
                        ->delete();

        if($result){
            $_SESSION['success'] = 'Patient record was deleted successfully';
            return true;
        }
        else{
            $_SESSION['error'] = 'ERROR! Patient record was not deleted';
            return false;
        }
    }

    public function delete_follow_up($id){
        $result = $this->db->table('tblfollowuprecords')
                        ->where(array('id' => $id))
                        ->delete();

        if($result){
            $_SESSION['success'] = 'Patient record was deleted successfully';
            return true;
        }
        else{
            $_SESSION['error'] = 'ERROR! Patient record was not deleted';
            return false;
        }
    }


    public function update_patientrecord($id, $serial_no, $firstname, $lastname, $middlename, $age, $gender, $birthday, $civil_status, $contact_person, $address, $cnumber, $health_insurance, $religion, $blood_type, $visit_date, $visit_time, $age_months, $food_allergy, $medicine_allergy, $chief_complaints, $history_presentillness, $hypertension_meds, $diabetes_meds, $bronchial_meds, $last_attack, $other_hldse, $operation, $bp, $heart_rate, $respiratory_rate, $temperature, $weight, $height, $physical_exam, $assessment, $classification, $management_plan, $service_provider, $p_id, $signature) {
        
        if($age == ''){$age = NULL;}
        if($birthday == ''){$birthday = NULL;}
        if($cnumber == ''){$cnumber = NULL;}
        if($visit_date == ''){$visit_date = NULL;}
        if($visit_time == ''){$visit_time = NULL;}
        if($age_months == ''){$age_months = NULL;}
        if($last_attack == ''){$last_attack = NULL;}
        if($temperature == ''){$temperature = NULL;}
        if($weight == ''){$weight = NULL;}
        if($height == ''){$height = NULL;}
        date_default_timezone_set('Asia/Manila');
        $datetime = date('Y-m-d H:i:s');
        $data = array(
            'serial_no' => $serial_no,
            'firstname' => ucfirst($firstname),
            'lastname' => ucfirst($lastname),
            'middlename' => ucfirst($middlename),
            'age' => $age,
            'gender' => $gender,
            'birthday' => $birthday,
            'civil_status' => $civil_status,
            'contact_person' => $contact_person,
            'address' => $address,
            'cnumber' => $cnumber,
            'health_insurance' => $health_insurance,
            'religion' => $religion,
            'blood_type' => $blood_type,
            'visit_date' => $visit_date,
            'visit_time' => $visit_time,
            'age_months' => $age_months,
            'food_allergy' => $food_allergy,
            'medicine_allergy' => $medicine_allergy,
            'chief_complaints' => $chief_complaints,
            'history_presentillness' => $history_presentillness,
            'hypertension_meds' => $hypertension_meds,
            'diabetes_meds' => $diabetes_meds,
            'bronchial_meds' => $bronchial_meds,
            'last_attack' => $last_attack,
            'other_hldse' => $other_hldse,
            'operation' => $operation,
            'bp' => $bp,
            'heart_rate' => $heart_rate,
            'respiratory_rate' => $respiratory_rate,
            'temperature' => $temperature,
            'weight' => $weight,
            'height' => $height,
            'physical_exam' => $physical_exam,
            'assessment' => $assessment,
            'classification' => $classification,
            'management_plan' => $management_plan,
            'service_provider' => $service_provider,
            'signature' => $signature,
            'last_edited' => $datetime,
            'p_id' => $p_id
        );
        
        $result = $this->db->table('tblpatientrecords')
                            ->where('id', $id)
                            ->update($data);

            if($result){
                return true;
            }
            else{
                return false;
            }
        
    }

    public function get_latest(){
        return $this->db->table('tblpatientrecords')->select('id')->limit(1)->order_by('id', 'DESC')->get();
    }

    public function get_single_data($id){
        return $this->db->table('tblpatientrecords')
                    ->where('id', $id)
                    ->get();
    }

    public function get_patient_records($pid){
        return $this->db->table('tblpatientrecords')->select('id, date_created, type')->where('p_id', $pid)->get_all();
    }

    public function insert_follow_up($serial_no, $firstname, $lastname, $middlename, $age, $gender, $birthday, $civil_status, $contact_person, $address, $cnumber, $health_insurance, $religion, $blood_type, $visit_date, $visit_time, $age_months, $food_allergy, $medicine_allergy, $chief_complaints, $history_presentillness, $hypertension_meds, $diabetes_meds, $bronchial_meds, $last_attack, $other_hldse, $operation, $bp, $heart_rate, $respiratory_rate, $temperature, $weight, $height, $physical_exam, $assessment, $classification, $management_plan, $service_provider, $uniqueid, $signature){
        if($age == ''){$age = NULL;}
        if($birthday == ''){$birthday = NULL;}
        if($cnumber == ''){$cnumber = NULL;}
        if($visit_date == ''){$visit_date = NULL;}
        if($visit_time == ''){$visit_time = NULL;}
        if($age_months == ''){$age_months = NULL;}
        if($last_attack == ''){$last_attack = NULL;}
        if($temperature == ''){$temperature = NULL;}
        if($weight == ''){$weight = NULL;}
        if($height == ''){$height = NULL;}
        date_default_timezone_set('Asia/Manila');
        $edited = date('Y-m-d H:i:s');
        $date = date('Y-m-d');

        $patientdata = array(
            'serial_no' => $serial_no,
            'firstname' => ucfirst($firstname),
            'lastname' => ucfirst($lastname),
            'middlename' => ucfirst($middlename),
            'age' => $age,
            'gender' => $gender,
            'birthday' => $birthday,
            'civil_status' => $civil_status,
            'contact_person' => $contact_person,
            'address' => $address,
            'cnumber' => $cnumber,
            'health_insurance' => $health_insurance,
            'religion' => $religion,
            'blood_type' => $blood_type,
            'visit_date' => $visit_date,
            'visit_time' => $visit_time,
            'age_months' => $age_months,
            'food_allergy' => $food_allergy,
            'medicine_allergy' => $medicine_allergy,
            'chief_complaints' => $chief_complaints,
            'history_presentillness' => $history_presentillness,
            'hypertension_meds' => $hypertension_meds,
            'diabetes_meds' => $diabetes_meds,
            'bronchial_meds' => $bronchial_meds,
            'last_attack' => $last_attack,
            'other_hldse' => $other_hldse,
            'operation' => $operation,
            'bp' => $bp,
            'heart_rate' => $heart_rate,
            'respiratory_rate' => $respiratory_rate,
            'temperature' => $temperature,
            'weight' => $weight,
            'height' => $height,
            'physical_exam' => $physical_exam,
            'assessment' => $assessment,
            'classification' => $classification,
            'management_plan' => $management_plan,
            'service_provider' => $service_provider,
            'signature' => $signature,
            'date_created' => $date,
            'last_edited' => $edited,
            'type' => 1,
            'p_id' => $uniqueid
        );
        
        $result = $this->db->table('tblpatientrecords')
                ->insert($patientdata);

        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function getpatientrecord($id){
        return $this->db->table('tblpatientrecords')->where('id', $id)->get_all();
    }

    public function get_class($id){
        return $this->db->table('classification')->where('id', $id)->get();
    }

    public function insert_class($name){
        
        $data = ['name' => $name];
        $result = $this->db->table('classification')
                ->insert($data);

        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function delete_class($id){
        
        $result = $this->db->table('classification')->where('id', $id)
                ->delete();

        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function update_class_name($id, $name){
        
        $data = ['name' => $name];
        $result = $this->db->table('classification')->where('id', $id)
                ->update($data);

        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function initial_gender_m(){
        return $this->db->table('tblpatientrecords')->select_count('*', 'mrow')->where('gender', 'M')->where('type', 0)->get();
    }

    public function initial_gender_f(){
        return $this->db->table('tblpatientrecords')->select_count('*', 'frow')->where('gender', 'F')->where('type', 0)->get();
    }

    public function initial_gender_o(){
        return $this->db->table('tblpatientrecords')->select_count('*', 'orow')->where('gender', 'O')->where('type', 0)->get();
    }
    public function initial_gender_n(){
        return $this->db->table('tblpatientrecords')->select_count('*', 'notrow')->where('gender', 'N')->where('type', 0)->get();
    }


    public function follow_gender_m(){
        return $this->db->table('tblpatientrecords')->select_count('*', 'mrow')->where('gender', 'M')->where('type', 1)->get();
    }

    public function follow_gender_f(){
        return $this->db->table('tblpatientrecords')->select_count('*', 'frow')->where('gender', 'F')->where('type', 1)->get();
    }

    public function follow_gender_o(){
        return $this->db->table('tblpatientrecords')->select_count('*', 'orow')->where('gender', 'O')->where('gender', 'N')->where('type', 1)->where('gender', 'N')->get();
    }

    public function follow_gender_n(){
        return $this->db->table('tblpatientrecords')->select_count('*', 'notrow')->where('gender', 'N')->where('type', 0)->get();
    }

    public function upload($oldfile=''){
        $target_dir = "public/images/signature/";
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
        if($imageFileType != "png") {
            $this->session->set_flashdata(array('error' => 'An error occured! Sorry, only png/transparent files are allowed!'));
            $uploadOk = 0;
        }
                            // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return 0;
                            // if everything is ok, try to upload file
        } 
        else 
        {
            if($oldfile != ''){
            $file_path = 'public/images/signature/'.$oldfile; // DELETE OLD IMAGE
                if(file_exists($file_path)) {
                    unlink($file_path);
                }
            } 
            $new_img_name = uniqid('esign-', true).'.'.$imageFileType;
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $new_img_name)) {
                return $new_img_name;
            }
        }
    }

}
?>