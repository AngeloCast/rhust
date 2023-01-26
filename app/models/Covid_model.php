<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Covid_model extends Model{

    public function insert_covid($case_no, $release_date, $antigen_date, $rtpcr_date, $lastname, $firstname, $middlename, $birthday, $age, $sex, $address, $cnumber, $contact_nature, $last_exposure, $symptoms, $isolation_place, $illness_onset, $quarantine_period, $recovery_date, $outcome, $contact_tracing, $closed_contact, $status, $vaccination_status) {

        if($case_no == ''){$case_no = NULL;}
        if($release_date == ''){$release_date = NULL;}
        if($antigen_date == ''){$antigen_date = NULL;}
        if($rtpcr_date == ''){$rtpcr_date = NULL;}
        if($birthday == ''){$birthday = NULL;}
        if($age == ''){$age = NULL;}
        if($cnumber == ''){$cnumber = NULL;} 
        if($last_exposure == ''){$last_exposure = NULL;}
        if($illness_onset == ''){$illness_onset = NULL;}
        if($recovery_date == ''){$recovery_date = NULL;}
        if($contact_tracing == ''){$contact_tracing = NULL;}
        if($closed_contact == ''){$closed_contact = NULL;}
        date_default_timezone_set('Asia/Manila');
        $edited = date('Y-m-d H:i:s');
        $date = date('Y-m-d');
        $data =array(
            'case_no' => $case_no,
            'release_date' => $release_date,
            'antigen_date' => $antigen_date,
            'rtpcr_date' => $rtpcr_date,
            'lastname' => ucfirst($lastname),
            'firstname' => ucfirst($firstname),
            'middlename' => ucfirst($middlename),
            'birthday' => $birthday,
            'age' => $age,
            'sex' => $sex,
            'address' => $address,
            'cnumber' => $cnumber,
            'contact_nature' => $contact_nature,
            'last_exposure' => $last_exposure,
            'symptoms' => $symptoms,
            'isolation_place' => $isolation_place,
            'illness_onset' => $illness_onset,
            'quarantine_period' => $quarantine_period,
            'recovery_date' => $recovery_date,
            'outcome' => $outcome,
            'contact_tracing' => $contact_tracing,
            'closed_contact' => $closed_contact,
            'status' => $status,
            'vaccination_status' => $vaccination_status,
            'date_created' => $date,
            'last_edited' => $edited
        );   
        $result = $this->db->table('tblcovidrecords')->insert($data);

        if($result){
            return true;
        }
        else{
            return false;
        }
    }
    
    public function delete_covid($id){
        $result = $this->db->table('tblcovidrecords')
                        ->where(array('id' => $id))
                        ->delete();

        if($result){
            $_SESSION['success'] = 'COVID19 Case record deleted successfully!';
            return true;
        }
        else{
            $_SESSION['error'] = 'ERROR! COVID19 Case record was not deleted successfully!';
            return false;
        }
    }
    public function update_covid($id, $case_no, $release_date, $antigen_date, $rtpcr_date, $lastname, $firstname, $middlename, $birthday, $age, $sex, $address, $cnumber, $contact_nature, $last_exposure, $symptoms, $isolation_place, $illness_onset, $quarantine_period, $recovery_date, $outcome, $contact_tracing, $closed_contact, $status, $vaccination_status) {
        
        if($case_no == ''){$case_no = NULL;}
        if($release_date == ''){$release_date = NULL;}
        if($antigen_date == ''){$antigen_date = NULL;}
        if($rtpcr_date == ''){$rtpcr_date = NULL;}
        if($birthday == ''){$birthday = NULL;}
        if($age == ''){$age = NULL;}
        if($cnumber == ''){$cnumber = NULL;} 
        if($last_exposure == ''){$last_exposure = NULL;}
        if($illness_onset == ''){$illness_onset = NULL;}
        if($recovery_date == ''){$recovery_date = NULL;}
        if($contact_tracing == ''){$contact_tracing = NULL;}
        if($closed_contact == ''){$closed_contact = NULL;}
        date_default_timezone_set('Asia/Manila');
        $datetime = date('Y-m-d H:i:s');
        $data = array(
            'case_no' => $case_no,
            'release_date' => $release_date,
            'antigen_date' => $antigen_date,
            'rtpcr_date' => $rtpcr_date,
            'lastname' => ucfirst($lastname),
            'firstname' => ucfirst($firstname),
            'middlename' => ucfirst($middlename),
            'birthday' => $birthday,
            'age' => $age,
            'sex' => $sex,
            'address' => $address,
            'cnumber' => $cnumber,
            'contact_nature' => $contact_nature,
            'last_exposure' => $last_exposure,
            'symptoms' => $symptoms,
            'isolation_place' => $isolation_place,
            'illness_onset' => $illness_onset,
            'quarantine_period' => $quarantine_period,
            'recovery_date' => $recovery_date,
            'outcome' => $outcome,
            'contact_tracing' => $contact_tracing,
            'closed_contact' => $closed_contact,
            'status' => $status,
            'vaccination_status' => $vaccination_status,
            'last_edited' => $datetime
        );
        
            $result = $this->db->table('tblcovidrecords')
                            ->where('id', $id)
                            ->update($data);

            if($result){
                return true;
            }
            else{
                return false;
            }
    }

    public function get_single_data($id){
        return $this->db->table('tblcovidrecords')
                    ->where('id', $id)
                    ->get();
    }
  
    public function get_all_tblcovidrecords(){
        return $this->db->table('tblcovidrecords')
                    ->get_all(); 
    }

    public function get_latest(){
        return $this->db->table('tblcovidrecords')->select('id')->limit(1)->order_by('id', 'DESC')->get();
    }

    public function get_covid_record($id){
        return $this->db->table('tblcovidrecords')
                    ->select('id, firstname, lastname')
                    ->where('id', $id)
                    ->get();
    }
}
