<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Home_model extends Model{
	
	public function get_data(){
        return $this->db->table('users')
                    ->where('email', $_SESSION['email'])
                    ->get();
    }

    public function get_article(){
        
        return $this->db->table('rhuposts')
                    ->where('category', 4)
                    ->where('status', 'publish')
                    ->limit(5)
                    ->get_all();
    }

    public function get_article_with_faqs(){
        
        return $this->db->table('rhuposts')
                    ->where('category = ? OR category = ?', [3, 4])
                    ->where('status', 'publish')
                    ->limit(5)
                    ->get_all();
    }

    public function get_faqs(){
        
        return $this->db->table('rhuposts')
                    ->where('category', 3)
                    ->where('status', 'publish')
                    ->get_all();
    }

    public function get_events(){
        
        return $this->db->table('tblevents')->order_by('id', 'DESC')->limit(1)->get_all();
    }

    public function get_allevents(){
        
        return $this->db->table('tblevents')->order_by('id', 'DESC')->get_all();
    }

    public function get_latest(){
        $where = array('status' => 'publish',
                        'category' => '2'
        );
        return $this->db->table('rhuposts')
                    ->where($where)
                    ->limit(1)
                    ->order_by('id', 'DESC')
                    ->get_all();
    }

    public function get_announcement(){
						
        $where = array('category' => 1, 'status' => 'publish' );
        return $this->db->table('rhuposts')->where($where)->limit(1)->order_by('id', 'DESC')->get();
    }

    public function get_news(){

        $where = array('status' => 'publish',
                        'category' => '2'
        );
        return $this->db->table('rhuposts')
                    ->where($where)
                    ->limit(5)
                    ->order_by('id', 'ASC')
                    ->get_all();
    }


    public function get_single_view($id){
        return $this->db->table('rhuposts')
                    ->where('id', $id)
                    ->where('status', 'publish')
                    ->get();
    }

    public function get_gallery($id){
        return $this->db->table('tblgallery')
                    ->select('image')
                    ->where('n_id', $id)
                    ->get_all();
    }

    public function get_announcement_view($id){
        return $this->db->table('rhuposts')
                    ->where('id', $id)
                    ->where('category', 1)
                    ->where('status', 'publish')
                    ->get();
    }

    public function get_ann_single($annID){
        return $this->db->table('rhuposts')
                    ->where('id', $annID)
                    ->get();
    }

    public function get_event_single($eID){
        return $this->db->table('tblevents')
                    ->where('id', $eID)
                    ->get();
    }

    public function get_staff(){
        return $this->db->table('tblstaff')->select('fullname, position, photo, email, cnumber')->where('display', 1)
                    ->get_all();
    }

    public function send_inquiry($firstname, $lastname, $email, $subject, $message){
        
        //$userid = $this->db->table('users')->select('id')->where('email', $email)->get();

        $date = date('Y-m-d');
        $data = array(
            'firstname' => ucfirst($firstname),
            'lastname' => ucfirst($lastname),
            'email' => $email,
            'subject' => $subject,
            'message' => $message,
            'date' => $date,
        );
        
        $result = $this->db->table('tblinquiry')
                ->insert($data);

        if($result){
            return true;
        }
        else{
            return false;
        }

    }

    public function AllrecordBigaan(){
        return $this->db->table('tblpatientrecords')->select_count('*', 'Bigaanrecords')->where('address', 'Bigaan')->get();
    }
    public function AllrecordCalangatan(){
        return $this->db->table('tblpatientrecords')->select_count('*', 'Calangatanrecords')->where('address', 'Calangatan')->get();
    }
    public function AllrecordCalsapa(){
        return $this->db->table('tblpatientrecords')->select_count('*', 'Calsaparecords')->where('address', 'Calsapa')->get();
    }
    public function AllrecordIlag(){
        return $this->db->table('tblpatientrecords')->select_count('*', 'Ilagrecords')->where('address', 'Ilag')->get();
    }
    public function AllrecordLumangbayan(){
        return $this->db->table('tblpatientrecords')->select_count('*', 'Lumangbayanrecords')->where('address', 'Lumangbayan')->get();
    }
    public function AllrecordTacligan(){
        return $this->db->table('tblpatientrecords')->select_count('*', 'Tacliganrecords')->where('address', 'Tacligan')->get();
    }
    public function AllrecordPoblacion(){
        return $this->db->table('tblpatientrecords')->select_count('*', 'Poblacionrecords')->where('address', 'Poblacion')->get();
    }
    public function AllrecordCaagutayan(){
        return $this->db->table('tblpatientrecords')->select_count('*', 'Caagutayanrecords')->where('address', 'Caagutayan')->get();
    }

    //BIGAAN
    public function barangayChart($name)
    {
        return $this->db->raw("SELECT date_format(visit_date,'%Y-%m') AS dayCreation, COUNT(id) AS perDayPatient FROM `tblpatientrecords` WHERE address='$name' GROUP BY date_format(visit_date,'%Y-%m')");
    }

    public function barangayagechart($name){
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
                address='$name'
            GROUP BY 
              patientAge
            ORDER BY 
              patientAge;");
    }

    public function barangaypiechart($name){
        return $this->db->raw("SELECT classification AS patientClass, COUNT(id) AS numPerPatient FROM `tblpatientrecords` WHERE address='$name' AND classification IS NOT NULL GROUP BY classification");
    }

    
}
?>