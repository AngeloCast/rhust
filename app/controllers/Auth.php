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
                                else {
                                        $this->session->set_flashdata(array('error' => validation_errors()));
                                        redirect('auth/login');
                                        exit();
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
                        ->name('fullname')->required()
                        ->name('email')->valid_email('Please input a valid email address')
                        ->name('password')->required()
                        ->min_length(9, 'Password must be at least 9 characters long!');

                        if ($this->form_validation->run()){

                                $fullname = $this->io->post('fullname');
                                $email = $this->io->post('email');
                                $password = $this->io->post('password');
                                $notification = $this->io->post('notification');
                                $validation_code = mt_rand(11111, 99999);

                                if($this->auth_model->register($fullname, $email, $password, $validation_code, $notification))
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
                        else {
                                $this->session->set_flashdata(array('error' => validation_errors()));
                                redirect('auth/register');
                                exit();
                        }

                }
                else{
                        $this->call->view('register.php');
                }
        }

        public function send_email($recipient, $fullname, $code){
                $this->email->subject('Validation Code');
                $this->email->sender('castangelo123@gmail.com');
                $this->email->recipient($recipient);
                $this->email->email_content('Use this code to validate your account: ' . $code);
                $this->email->send();
        }

        public function validate(){
                $this->check();
                if(empty($_SESSION['globalemail'])){
                        redirect('auth/register');
                }
                
                if ($this->form_validation->submitted())
                {
                        $this->form_validation
                        ->name('code')->required();
                        

                        if ($this->form_validation->run()){
                                $check = $this->auth_model->validate_code($this->io->post('code'), $_SESSION['globalemail']);

                                if($check){
                                        $this->session->set_flashdata(array('success' => 'Account was successfully registered! Sign up now'));
                                        $this->session->unset_userdata(array('globalemail'));
                                        redirect('auth/login');
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

        public function logout(){
                $this->session->unset_userdata(array('loggedin', 'username', 'usertype'));
                $this->session->sess_destroy();
                redirect('auth/');
        }

}
?>