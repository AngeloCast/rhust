<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Posts_model extends Model{

    
    public function insert_post($photo, $category, $title, $content, $status, $id){

        $date = date('Y-m-d');

        $data = array(
            'title' => $title,
            'content' => $content,
            'photo' => $photo,
            'category' => $category,
            'date' => $date,
            'status' => $status,
            'author_id' => $id
        );
        
        $result = $this->db->table('rhuposts')
                ->insert($data);

        if($result){
            return true;
        }
    }

    public function show_announcements(){
        return $this->db->table('rhuposts')->where('category', '1')->get_all();
    }

    public function show_newsacts(){
        return $this->db->table('rhuposts')->where('category', '2')->get_all();
    }

    public function show_faqs(){
        return $this->db->table('rhuposts')->where('category', '3')->get_all();
    }

    public function show_healthinfo(){
        return $this->db->table('rhuposts')->where('category', '4')->get_all();
    }

    public function delete_post($id){
        $result = $this->db->table('rhuposts')
                        ->where(array('id' => $id))
                        ->delete();

        if($result){
            $_SESSION['success'] = 'Post was deleted successfully';
            return true;
        }
    }

    public function update_post($id, $category, $title, $content, $status, $photo) {
        $data = array(
            'title' => $title,
            'content' => $content,
            'category' => $category,
            'status' => $status,
            'photo' => $photo
        );
        
            $result = $this->db->table('rhuposts')
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
        return $this->db->table('rhuposts')
                    ->where('id', $id)
                    ->get();
    }

    
    public function update_photo($id, $photo){
        $data = array('photo' => $photo);
        return $this->db->table('rhuposts')
                        ->where('id', $id)
                        ->update($data);
    }

    public function upload(){
        $random = 'File' . rand(0, 100000);
        $target_dir = "public/images/";
        $target_file = $random . basename($_FILES["fileToUpload"]["name"]);
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
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $target_file)) {
                return $target_file;
            }
        }
    }

}
?>