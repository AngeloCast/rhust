<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Patient_model extends Model{

    
    public function insert_patient($firstname, $lastname, $middlename, $age, $gender, $birthday, $civil_status, $contact_person, $address, $cnumber, $health_insurance, $religion, $blood_type, $visit_date, $visit_time, $age_months, $food_allergy, $medicine_allergy, $chief_complaints, $history_presentillness, $hypertension_meds, $diabetes_meds, $bronchial_meds, $last_attack, $other_hldse, $operation, $bp, $heart_rate, $respiratory_rate, $temperature, $weight, $height, $physical_exam, $assessment, $management_plan, $service_provider){
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
        $unique = mt_rand();

        $patientdata = array(
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
            'management_plan' => $management_plan,
            'service_provider' => $service_provider,
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


    public function update_patientrecord($id, $firstname, $lastname, $middlename, $age, $gender, $birthday, $civil_status, $contact_person, $address, $cnumber, $health_insurance, $religion, $blood_type, $visit_date, $visit_time, $age_months, $food_allergy, $medicine_allergy, $chief_complaints, $history_presentillness, $hypertension_meds, $diabetes_meds, $bronchial_meds, $last_attack, $other_hldse, $operation, $bp, $heart_rate, $respiratory_rate, $temperature, $weight, $height, $physical_exam, $assessment, $management_plan, $service_provider, $p_id) {
        
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
            'management_plan' => $management_plan,
            'service_provider' => $service_provider,
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

    public function insert_follow_up($firstname, $lastname, $middlename, $age, $gender, $birthday, $civil_status, $contact_person, $address, $cnumber, $health_insurance, $religion, $blood_type, $visit_date, $visit_time, $age_months, $food_allergy, $medicine_allergy, $chief_complaints, $history_presentillness, $hypertension_meds, $diabetes_meds, $bronchial_meds, $last_attack, $other_hldse, $operation, $bp, $heart_rate, $respiratory_rate, $temperature, $weight, $height, $physical_exam, $assessment, $management_plan, $service_provider, $uniqueid){
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
            'management_plan' => $management_plan,
            'service_provider' => $service_provider,
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
}
?>