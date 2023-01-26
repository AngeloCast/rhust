<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Event_model extends Model{

    
    public function insert_event($title, $details, $start, $end, $photo){

        $data =array(
            'title' => $title,
            'details' => $details,
            'start_datetime' => $start,
            'end_datetime' => $end,
            'photo' => $photo
        );   
                
        $result = $this->db->table('tblevents')->insert($data);

        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function delete_post($id){
        $result = $this->db->table('tblevents')
                        ->where(array('id' => $id))
                        ->delete();

        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function update_event($id, $title, $details, $start, $end, $photo) {
        $data =array(
            'title' => $title,
            'details' => $details,
            'start_datetime' => $start,
            'end_datetime' => $end,
            'photo' => $photo
        );  
        
            $result = $this->db->table('tblevents')
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
        return $this->db->table('tblevents')
                    ->where('id', $id)
                    ->get();
    }

    public function get_event_info($id){
        return $this->db->table('tblevents')
                    ->select('id, title, photo')
                    ->where('id', $id)
                    ->get();
    }

    public function upload(){
        $target_dir = "public/images/";
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
        if ($_FILES["fileToUpload"]["size"] > 50000000) {
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
            $new_img_name = uniqid('IMG-', true).'.'.$imageFileType;
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $new_img_name)) {
                return $new_img_name;
            }
        }
    }

}
?>