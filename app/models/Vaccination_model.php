<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Vaccination_model extends Model{

    public function insert_vaccinationrecords($priority_group, $uniqueperson_id, $indigenous_member, $lastname, $firstname, $middlename, $suffix, $birthday, $sex, $cnumber, $region, $province, $municipality, $barangay, $pwd, $vaccination_info, $vaccinator, $vaccination_date, $lot_number){

        if($uniqueperson_id == ''){$uniqueperson_id = NULL;}
        if($birthday == ''){$birthday = NULL;}
        if($cnumber == ''){$cnumber = NULL;}
        if($vaccination_date == ''){$vaccination_date = NULL;}

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
            'vaccination_info' => $vaccination_info,
            'vaccinator' => $vaccinator,
            'vaccination_date' => $vaccination_date,
            'lot_number' => $lot_number,
            'date_created' => $date
            
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


    public function update_vaccinationrecord($id, $priority_group, $uniqueperson_id, $indigenous_member, $lastname, $firstname, $middlename, $suffix, $birthday, $sex, $cnumber, $region, $province, $municipality, $barangay, $pwd, $vaccination_info, $vaccinator, $vaccination_date, $lot_number) {

        if($uniqueperson_id == ''){$uniqueperson_id = NULL;}
        if($birthday == ''){$birthday = NULL;}
        if($cnumber == ''){$cnumber = NULL;}
        if($vaccination_date == ''){$vaccination_date = NULL;}

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
            'vaccination_info' => $vaccination_info,
            'vaccinator' => $vaccinator,
            'vaccination_date' => $vaccination_date,
            'lot_number' => $lot_number
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



    public function update_photo($id, $photo){
        $data = array('photo' => $photo);
        return $this->db->table('users')
                        ->where('id', $id)
                        ->update($data);
    }

    public function get_article(){
        
        return $this->db->table('rhuposts')
                    ->where('status', 'publish')
                    ->limit(8)
                    ->order_by('id', 'ASC')
                    ->get_all();
    }

}
?>