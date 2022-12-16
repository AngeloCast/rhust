<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Inquiry_model extends Model{

    
    public function insert_inquiry($firstname, $lastname, $birthday, $age, $gender, $email, $cnumber, $address, $photo){
        
        $data = array(
            'firstname' => ucfirst($firstname),
            'lastname' => ucfirst($lastname),
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

    public function show_inquiry(){
        return $this->db->table('tblinquiry')->get_all();
    }

    public function delete_inquiry($id){
        $result = $this->db->table('tblinquiry')
                        ->where(array('id' => $id))
                        ->delete();

        if($result){
            $_SESSION['success'] = 'Inquiry was deleted successfully';
            return true;
        }
        else{
            return false;
        }
    }


    public function update_data($staff_id, $firstname, $lastname, $birthday, $age, $gender, $email, $cnumber, $address) {
        $data = array(
            'firstname' => ucfirst($firstname),
            'lastname' => ucfirst($lastname),
            'birthday' => $birthday,
            'age' => $age,
            'gender' => $gender,
            'email' => $email,
            'cnumber' => $cnumber,
            'address' => $address
        );
        
            $result = $this->db->table('tblstaff')
                            ->where('staff_id', $staff_id)
                            ->update($data);

            if($result){
                return true;
            }
        
    }

    public function get_single_data($id){
        

        $data = array('status' => 'read');
        
        $this->db->table('tblinquiry')
                ->where('id', $id)
                ->update($data);

        return $this->db->table('tblinquiry')
                    ->where('id', $id)
                    ->get();
        
    }

    public function get_data(){
        return $this->db->table('tblstaff')
                    ->where('staff_id', $_SESSION['userid'])
                    ->get();
    }

    public function update_photo($id, $photo){
        $data = array('photo' => $photo);
        return $this->db->table('tblstaff')
                        ->where('staff_id', $staff_id)
                        ->update($data);
    }
}
?>