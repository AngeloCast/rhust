<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');


class Auth extends Controller {

        public function index(){ //Check if logged in
                $this->session->unset_userdata(array('globalemail'));
                if($this->check() == FALSE){
                        $this->call->view('login.php');
                }
        }

        public function check(){
                
                if($this->auth_model->is_loggedin()){
                        if($this->auth_model->usertype()){
                                redirect('admin/');
                        }
                        else{
                                redirect('home/');
                        }
                }
                else{
                        return false;
                }
        }

        public function login()
        {
                $this->check();
                if ($this->form_validation->submitted())
                        {
                                $this->form_validation
                                        ->name('email')->required()
                                        ->name('password')->required();
                                if ($this->form_validation->run()){
                                        
                                        $data = $this->auth_model->login($this->io->post('email'), $this->io->post('password'));

                                if($data){
                                        if($this->auth_model->usertype()){
                                                redirect('admin/');
                                        }
                                        else{
                                                redirect('home/');
                                        }
                                                
                                }
                                else{
                                        redirect('auth/');
                                }
                        }
                }
                else{
                        $this->call->view('login.php');
                }
        }
        
        public function register(){
                $this->check();
                if ($this->form_validation->submitted())
                {
                        $this->form_validation
                        ->name('fullname')->required();
                        

                        if ($this->form_validation->run()){

                                $fullname = $this->io->post('fullname');
                                $email = $this->io->post('email');
                                $notification = $this->io->post('notification');
                                $validation_code = mt_rand(11111, 99999);

                                if($this->auth_model->register($fullname, $email, $validation_code, $notification))
                                {
                                        $this->send_email($email, $fullname, $validation_code);
                                        $this->session->set_flashdata(array('success' => 'Validation code was sent to ' . $email));
                                        redirect('auth/validate'); //success, email sent for otp
                                        exit();
                                                
                                }
                                else{  
                                                
                                        redirect('auth/register'); //Error, email not sent
                                        exit();
                                }
                                
                        }

                }
                else{
                        $this->call->view('register.php');
                }
        }

        public function send_email($recipient, $fullname, $code){
                $this->email->subject('Validation Code');
                $this->email->sender('rhusanteodoro@gmail.com');
                $this->email->recipient($recipient);
                $this->email->email_content('Use this code to validate your account: ' . $code);
                $this->email->send();
        }

        public function validate(){
                $this->check();
                if ($this->form_validation->submitted())
                {
                        $this->form_validation
                        ->name('code')->required();
                        

                        if ($this->form_validation->run()){
                                $check = $this->auth_model->validate_code($this->io->post('code'), $_SESSION['globalemail']);

                                if($check){
                                        $this->session->set_flashdata(array('success' => 'Email was successfully validated! Enter New Password'));
                                        redirect('auth/password');
                                }
                                else{
                                        
                                        redirect('auth/validate');
                                }
                        }
                }
                else{
                        $this->call->view('validate.php');
                }

        }

        public function password(){
                $this->check();
                if ($this->form_validation->submitted())
                {
                        $this->form_validation
                        ->name('password')->required();
                        

                        if ($this->form_validation->run()){
                                $check = $this->auth_model->create_password($this->io->post('password'), $this->io->post('confirmpass'),  $_SESSION['globalemail']);

                                if($check){
                                        $this->session->set_flashdata(array('success' => 'Account was successfully registered! Sign up now'));
                                        $this->session->unset_userdata(array('globalemail'));
                                        redirect('auth/');
                                }
                                else{
                                        
                                        redirect('auth/password');
                                }
                        }
                }
                else{
                        $this->call->view('password.php');
                }
        }

        public function show_session(){
                
                var_dump($_SESSION);
        }

        public function logout(){
                $this->session->unset_userdata(array('loggedin', 'username', 'usertype'));
                $this->session->sess_destroy();
                redirect('auth/');
        }

}
?>