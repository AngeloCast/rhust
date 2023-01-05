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

}
?>