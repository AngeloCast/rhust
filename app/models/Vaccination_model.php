<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Vaccination_model extends Model{

    public function insert_vaccinationrecords($priority_group, $uniqueperson_id, $indigenous_member, $lastname, $firstname, $middlename, $suffix, $birthday, $sex, $cnumber, $region, $province, $municipality, $barangay, $pwd){

        if($uniqueperson_id == ''){$uniqueperson_id = NULL;}
        if($birthday == ''){$birthday = NULL;}
        if($cnumber == ''){$cnumber = NULL;}
        
        date_default_timezone_set('Asia/Manila');
        $edited = date('Y-m-d H:i:s');
        $date = date('Y-m-d');
        $data = array(
            'priority_group' => $priority_group,
            'uniqueperson_id' => $uniqueperson_id,
            'indigenous_member' => $indigenous_member,
            'lastname' => ucfirst($lastname),
            'firstname' => ucfirst($firstname),
            'middlename' => ucfirst($middlename),
            'suffix' => ucfirst($suffix),
            'birthday' => $birthday,
            'sex' => $sex,
            'cnumber' => $cnumber,
            'region' => $region,
            'province' => $province,
            'municipality' => $municipality,
            'barangay' => $barangay,
            'pwd' => $pwd,
            'date_created' => $date,
            'last_edited' => $edited
            
        );
        
        $result = $this->db->table('tblcovidvaccinationrecords')
                ->insert($data);

        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function show_vaccinationrecords(){
        return $this->db->table('tblcovidvaccinationrecords')->get_all();
    }

    public function delete_vaccination_records($id){
        $result = $this->db->table('tblcovidvaccinationrecords')
                        ->where(array('id' => $id))
                        ->delete();

        if($result){
            $_SESSION['success'] = 'Vaccination records deleted successfully';
            return true;
        }
    }


    public function update_vaccinationrecord($id, $priority_group, $uniqueperson_id, $indigenous_member, $lastname, $firstname, $middlename, $suffix, $birthday, $sex, $cnumber, $region, $province, $municipality, $barangay, $pwd) {

        if($uniqueperson_id == ''){$uniqueperson_id = NULL;}
        if($birthday == ''){$birthday = NULL;}
        if($cnumber == ''){$cnumber = NULL;}
        if($vaccination_date == ''){$vaccination_date = NULL;}
        date_default_timezone_set('Asia/Manila');
        $datetime = date('Y-m-d H:i:s');
        $data = array(
            'priority_group' => $priority_group,
            'uniqueperson_id' => $uniqueperson_id,
            'indigenous_member' => $indigenous_member,
            'lastname' => ucfirst($lastname),
            'firstname' => ucfirst($firstname),
            'middlename' => ucfirst($middlename),
            'suffix' => ucfirst($suffix),
            'birthday' => $birthday,
            'sex' => $sex,
            'cnumber' => $cnumber,
            'region' => $region,
            'province' => $province,
            'municipality' => $municipality,
            'barangay' => $barangay,
            'pwd' => $pwd,
            'last_edited' => $datetime
        );
        
            $result = $this->db->table('tblcovidvaccinationrecords')
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
        return $this->db->table('tblcovidvaccinationrecords')
                    ->where('id', $id)
                    ->get();
    }

    public function get_vacc_details($id){
        return $this->db->table('tblvaccdetails')->where('v_id', $id)->get_all();
    }

    public function insert_vacc_dose($id, $vaccination_info, $vaccinator, $date, $lot_number){
        
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d');
        $data = array(
            'vacc_info' => $vaccination_info,
            'vaccinator' => $vaccinator,
            'date' => $date,
            'lot_number' => $lot_number,
            'v_id' => $id
        );
        
        $result = $this->db->table('tblvaccdetails')
                ->insert($data);

        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function get_vacc_single($vaccid){
        return $this->db->table('tblvaccdetails')
                    ->select('id, vacc_info, v_id')
                    ->where('id', $vaccid)
                    ->get();
    }

    public function get_vacc_edit($vaccid){
        return $this->db->table('tblvaccdetails')
                    ->where('id', $vaccid)
                    ->get();
    }

    public function delete_vacc_detail($vaccid){
        $result = $this->db->table('tblvaccdetails')
                        ->where(array('id' => $vaccid))
                        ->delete();

        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function get_vacc_record($vaccid){
        return $this->db->table('tblcovidvaccinationrecords')
                    ->select('id, firstname, lastname')
                    ->where('id', $vaccid)
                    ->get();
    }
    public function update_vacc_dose($id, $vaccination_info, $vaccinator, $date, $lot_number) {

        date_default_timezone_set('Asia/Manila');
        $data = array(
            'vacc_info' => $vaccination_info,
            'vaccinator' => $vaccinator,
            'date' => $date,
            'lot_number' => $lot_number
        );
        
            $result = $this->db->table('tblvaccdetails')
                            ->where('id', $id)
                            ->update($data);

            if($result){
                return true;
            }
            else{
                return false;
            }
        
    }

}
?>