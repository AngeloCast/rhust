<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');


class Auth extends Controller {

        public function index(){ //Check if logged in
                if($this->check() == FALSE){
                        $this->call->view('login.php');
                }
        }

        public function check(){
                
                if($this->auth_model->is_loggedin()){
                        if($this->session->userdata('usertype') === 0){
                                redirect('admin/');
                        }
                        else if($this->session->userdata('usertype') === 1){
                                redirect('home/');
                        }
                        else{
                                redirect('staff/');
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
                                        if($this->session->userdata('usertype') === 0){
                                                redirect('admin/');
                                        }
                                        else if($this->session->userdata('usertype') === 1){
                                                redirect('home/');
                                        }
                                        else{
                                                redirect('staff/');
                                        }
                                }
                                else{
                                        redirect('auth/login');
                                        exit();
                                }
                        }
                        else {
                                $this->session->set_flashdata(array('error' => validation_errors()));
                                redirect('auth/login');
                                exit();
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
                                $data = array('email' => $email);
                                if($this->auth_model->register($fullname, $email, $password, $validation_code, $notification))
                                {
                                        $this->send_email($email, $fullname, $validation_code);
                                        $this->session->set_flashdata(array('success' => 'Validation code was sent to ' . $email));
                                        $this->call->view('validate', $data); //success, email sent for otp
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
                                $check = $this->auth_model->validate_code($this->io->post('code'), $this->io->post('email'));

                                if($check){
                                        $this->session->set_flashdata(array('success' => 'Account was successfully registered! Sign up now'));
                                        redirect('auth/login');
                                }
                                else{
                                        
                                        redirect('auth/validate');
                                }
                        }
                        else {
                                $this->session->set_flashdata(array('error' => validation_errors()));
                                redirect('auth/validate');
                                exit();
                        }
                }
                else{
                        redirect('auth/register');
                }

        }

        public function forgot_password(){
                $this->check();
                if ($this->form_validation->submitted())
                {
                        $this->form_validation
                        ->name('email')->required()
                        ->valid_email('Please enter a valid email!');
                        

                        if ($this->form_validation->run()){
                                $reset_token = mt_rand(11111111, 99999999);
                                $email = $this->io->post('email');
                                $check = $this->auth_model->check_email($email, $reset_token);
                                if($check){
                                        $this->send_reset_code($email, $reset_token);
                                        $this->session->set_flashdata(array('success' => 'The validation link to reset your password was sent to your email!'));
                                        redirect('auth/login');
                                }
                                else{
                                        redirect('auth/validate');
                                }
                        }
                        else {
                                $this->session->set_flashdata(array('error' => validation_errors()));
                                redirect('auth/forgot_password');
                                exit();
                        }
                }
                else{
                        $this->call->view('forgot_password');
                }
        }

        public function send_reset_code($recipient, $code){
                $this->email->subject('Reset Password Link');
                $this->email->sender('rhusanteodoro@gmail.com');
                $this->email->recipient($recipient);
                $link = (BASE_URL . '/auth/change_password/'.$recipient.'/'.$code);
                $email_template = "
                        <h3>Hello, </h3>
                        <h4>You are recieving this email because there was an attempt to reset your account's password.</h4>
                        <br><br>
                        <a href='$link'>Click Here To Reset Password >></a>
                        <br><br>
                        <h4>Use the link above to change your account's password. Thank you!.</h4>
                ";
                $this->email->email_content($email_template, 'html');
                $this->email->send();
        }

        public function change_password($email, $code){
                $this->check();
                $data = array('email' => $email, 'code' => $code);

                $this->call->view('change_password', $data);
        }

        public function reset_password(){
                $this->check();
                if ($this->form_validation->submitted())
                {
                        $this->form_validation
                        ->name('newpass')->required()
                        ->min_length(9, 'Password must be at least 9 characters long!')
                        ->name('confirmpass')->required()
                        ->min_length(9, 'Password must be at least 9 characters long!');
                        

                        if ($this->form_validation->run()){
                                $email = $this->io->post('email');
                                $reset_code = $this->io->post('reset_code');
                                $update = $this->auth_model->reset_password($this->io->post('newpass'), $this->io->post('confirmpass'), $email, $reset_code);

                                if($update){
                                        $this->session->set_flashdata(array('success' => 'Account password was successfully changed!'));
                                        redirect('auth/login');
                                }
                                else{
                                        
                                        redirect('auth/change_password/'.$email.'/'.$reset_code);
                                }
                        }
                        else {
                                $this->session->set_flashdata(array('error' => validation_errors()));
                                redirect('auth/validate');
                                exit();
                        }
                }
                else{
                        redirect('auth/register');
                }
        }

        public function logout(){
                $this->session->unset_userdata(array('loggedin', 'username', 'usertype'));
                $this->session->sess_destroy();
                redirect('auth/');
        }

}
?>