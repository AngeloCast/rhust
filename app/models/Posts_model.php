<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Posts_model extends Model{

    
    public function insert_post($photo, $category, $title, $content, $status, $id){
        date_default_timezone_set('Asia/Manila');
        $edited = date('Y-m-d H:i:s');
        $date = date('Y-m-d');

        $data = array(
            'title' => $title,
            'content' => $content,
            'photo' => $photo,
            'category' => $category,
            'date' => $date,
            'edited' => $edited,
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

        $check = $this->db->table('tblgallery')->select_count('*', 'grows')->where('n_id', $id)->get();
        if($check['grows'] > 0){
            $this->db->table('tblgallery')->where('n_id', $id)->delete();
        }

        $result = $this->db->table('rhuposts')
                        ->where(array('id' => $id))
                        ->delete();

        if($result){
            $_SESSION['success'] = 'Post was deleted successfully';
            return true;
        }
        else{
            $_SESSION['error'] = 'An error occurred! Post was not deleted';
            return false;
        }
    }

    public function update_post($id, $category, $title, $content, $status, $photo) {
        date_default_timezone_set('Asia/Manila');
        $datetime = date('Y-m-d H:i:s');
        $data = array(
            'title' => $title,
            'content' => $content,
            'category' => $category,
            'status' => $status,
            'edited' => $datetime,
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

    public function upload_gallery($post_id){
        $images = $_FILES['images'];
        $ok = 0;
        $not = 0;
        # Number of images
        $num_of_imgs = count($images['name']);

        for ($i=0; $i < $num_of_imgs; $i++) { 
            
            # get the image info and store them in var
            $image_name = $images['name'][$i];
            $tmp_name   = $images['tmp_name'][$i];
            $error      = $images['error'][$i];

            # if there is not error occurred while uploading
            if ($error === 0) {
                
                # get image extension store it in var
                $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);

                /** 
                convert the image extension into lower case 
                and store it in var 
                **/
                $img_ex_lc = strtolower($img_ex);
                
                /** 
                crating array that stores allowed
                to upload image extensions.
                **/
                $allowed_exs = array('jpg', 'jpeg', 'png');


                /** 
                check if the the image extension 
                is present in $allowed_exs array
                **/

                if (in_array($img_ex_lc, $allowed_exs)) {
                    /** 
                     renaming the image name with 
                     with random string
                    **/
                    $new_img_name = uniqid('IMG-', true).'.'.$img_ex_lc;
                    
                    # crating upload path on root directory
                    $img_upload_path = 'public/images/gallery/'.$new_img_name;

                    # inserting imge name into database
                    $data =array(
                        'image' => $new_img_name,
                        'n_id' => $post_id
                    );
                    $sql  = $this->db->table('tblgallery')->insert($data);

                    # move uploaded image to 'uploads' folder
                    move_uploaded_file($tmp_name, $img_upload_path);

                    $ok += 1;
                    # redirect to 'index.php'

                }else {
                    # error message
                    /*
                    redirect to 'index.php' and 
                    passing the error message
                    */
                    $not += 1;
                    
                }

       
            }else {
                # error message
                $this->session->set_flashdata(array('error' => "An error occured! Unknown Error Occurred while uploading"));
                /*
                redirect to 'index.php' and 
                passing the error message
                */
                return false;
            }

        }

        if($not == 0){
            $this->session->set_flashdata(array('success' => ''. $ok .' image/s uploaded! Gallery was successfully updated!'));
            return true;
        }
        else if($not > 0 && $ok > 0){
            $this->session->set_flashdata(array('success' => 'Gallery was successfully updated '. $ok .'file/s uploaded'));
            $this->session->set_flashdata(array('error' => '' .$not. ' file/s not uploaded due to file type! Only images are allowed!'));
            return true;
        }
        else if($ok == 0 && $not > 0)
        {
            $this->session->set_flashdata(array('error' => '' .$not. ' file/s not uploaded due to file type! Only images are allowed!'));
            return true;
        }
        else{
            $this->session->set_flashdata(array('error' => "An error occured! Unknown Error Occurred while uploading. Try again!"));
            return false;
        }
    }

    public function get_gallery($post_id){
        return $this->db->table('tblgallery')->select('*')->where('n_id', $post_id)->get_all();
    }

    public function deletegallery($g_id){
        return $this->db->table('tblgallery')
                        ->where(array('id' => $g_id))
                        ->delete();
    }

    public function get_post_info($pid){
        return $this->db->table('rhuposts')
                    ->select('id, title, category')
                    ->where('id', $pid)
                    ->get();
    }
}
?>