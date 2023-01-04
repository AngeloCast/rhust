<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_model extends Model{

    
    public function insert_user($username, $password, $email, $firstname, $lastname, $birthday, $gender, $address, $usertype, $cnumber, $photo){
        
        $data = array(
            'username' => $username,
            'password' => $this->auth->passwordhash($password),
            'email' => $email,
            'firstname' => ucfirst($firstname),
            'lastname' => ucfirst($lastname),
            'birthday' => $birthday,
            'gender' => $gender,
            'address' => $address,
            'usertype' => $usertype,
            'cnumber' => $cnumber,
            'photo' => $photo
        );
        
        $where = ['username' => $username];
        $where2 = ['email' => $email];
        
        $row = $this->db->table('users')->select_count('*', 'urows')->where($where)->get();
        $row2 = $this->db->table('users')->select_count('*', 'erows')->where($where2)->get();

        if($row['urows'] > 0){
            $_SESSION['error'] = 'Username already taken!';
            return false;
        }
        else if($row2['erows'] > 0){
            $_SESSION['error'] = 'Email already taken!';
            return false;
        }
        else{
        $result = $this->db->table('users')
                ->insert($data);

            if($result){
                return true;
            }
        }

    }

    public function show_user(){
        return $this->db->table('users')->where('usertype', 1)->order_by('id', 'DESC')->get_all();
    }

    public function delete_user($id){
        $result = $this->db->table('users')
                        ->where(array('id' => $id))
                        ->delete();

        if($result){
            return true;
        }
        else{
            return false;
        }
    }


    public function update_info($id, $fullname, $cnumber, $address, $notification, $photo) {
        $data = array(
            'fullname' => $fullname,
            'cnumber' => $cnumber,
            'address' => $address,
            'notification' => $notification,
            'photo' => $photo
        );
        
        
            $result = $this->db->table('users')
                            ->where('id', $id)
                            ->update($data);

            if($result){
                return true;
            }
            else{
                return false;
            }
    }

    public function passwordhash($password)
    {
        $options = array(
        'cost' => 4,
        );
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

    public function change_password($id, $oldpass, $newpass, $confirmpass){

        $data = array(
            'password' => $this->passwordhash($newpass)
        );

        $user = $this->db->table('users')->where('id', $id)->get();
        if(password_verify($oldpass, $user['password']))
        {
            if($newpass == $confirmpass)
            {
                $updatepass = $this->db->table('users')->where('id', $id)->update($data);
                if($updatepass)
                {
                    return true;
                }
                else{
                    $_SESSION['error'] = 'Password not updated! Try again';
                    return false;
                }
            }
            else{
                $_SESSION['error'] = 'New and confirm password did not match! Try again';
                return false;
            }
        }
        else{
            $_SESSION['error'] = 'Incorrect old password! Try again';
            return false;
        }

        
    }

    public function get_single_data($id){
        return $this->db->table('users')
                    ->where('id', $id)
                    ->get();
    }

    public function get_data(){
        return $this->db->table('users')
                    ->where('id', $_SESSION['userid'])
                    ->get();
    }

    public function update_photo($id, $photo){
        $data = array('photo' => $photo);
        return $this->db->table('users')
                        ->where('id', $id)
                        ->update($data);
    }

    public function get_article(){
        $where = array('status' => 'publish',
                        'category' => '3'
        );
        
        return $this->db->table('rhuposts')
                    ->where($where)
                    ->or_where('category', '4')
                    ->limit(5)
                    ->get_all();
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
                    ->get();
    }

    public function send_inquiry($firstname, $lastname, $email, $subject, $message, $userid){
        
        $date = date('Y-m-d');
        $data = array(
            'firstname' => ucfirst($firstname),
            'lastname' => ucfirst($lastname),
            'email' => $email,
            'subject' => $subject,
            'message' => $message,
            'date' => $date,
            'user_id' => $userid
        );
        
        $result = $this->db->table('tblinquiry')
                ->insert($data);

        if($result){
            return true;
        }

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
        if ($_FILES["fileToUpload"]["size"] > 10000000) {
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