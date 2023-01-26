<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Staff extends Controller {

    public function index()
    {
        if($this->auth_model->is_loggedin()){

            $userdata = $this->admin_model->get_data();
            $inquirycount = $this->admin_model->get_inquiry_count();
            $patientrecords = $this->admin_model->get_patient_records();
            $userscount = $this->admin_model->get_userscount();
            $inqcount = $this->admin_model->get_inquirycount();
            $eventscount = $this->admin_model->get_eventscount();
            $data = array($userdata, $inquirycount, $patientrecords, $userscount, $inqcount, $eventscount);
            if($this->session->userdata('usertype') === 2){
                $this->call->view('admin/home', $data);
                exit();
            }
            else if($this->session->userdata('usertype') === 0){
                redirect('admin/');
                exit();
            }
            else{
                redirect('home/');
                exit();
            }
        } else {
            redirect('auth/login');
            exit();
        }
    }

    public function check(){
            
        if($this->auth_model->is_loggedin()){
            if($this->session->userdata('usertype') === 2){
                return true;
            }
            else if($this->session->userdata('usertype') === 0){
                redirect('admin/');
            }
            else{
                redirect('home/');
            }
        }
        else{
            redirect('auth/login');
            exit();
        }
    }

    public function show_profile(){
        if($this->check()){
            $userdata = $this->admin_model->get_data();
            $inquirycount = $this->admin_model->get_inquiry_count();
            $data = array($userdata, $inquirycount);
            $this->call->view('admin/staff_profile', $data);
        }
    }

    public function update_staff_info(){
        if($this->check()){
                if ($this->form_validation->submitted())
                {
                        $this->form_validation
                        ->name('fullname')->required();
                    
                        if ($this->form_validation->run()){
                                if($_FILES['fileToUpload']['name'] == '')
                                {
                                        
                                    if($this->staff_model->update_info($this->io->post('id'), $this->io->post('fullname'), $this->io->post('address'), $this->io->post('cnumber'), $this->io->post('photo'))) 
                                    {
                                        $this->session->set_flashdata(array('success' => 'Successfully updated staff information!'));
                                        redirect('staff/show_profile');
                                        exit();
                                    }
                                    else{
                                        $this->session->set_flashdata(array('success' => 'No Changes made!'));
                                        redirect('staff/show_profile');
                                        exit();
                                    }
                                }
                                else{
                                        $upresult = $this->staff_model->upload();
                                        $id = $this->io->post('id');
                                        if($upresult){
                                                if($this->staff_model->update_info($this->io->post('id'), $this->io->post('fullname'), $this->io->post('address'), $this->io->post('cnumber'), $upresult)) 
                                                {
                                                    $this->session->set_flashdata(array('success' => 'Successfully updated staff information!'));
                                                    redirect('staff/show_profile');
                                                    exit();
                                                }
                                                else{
                                                    redirect('staff/show_profile');
                                                    exit();
                                                }
                                        }
                                }
                        }
                }
        }
    }

    public function staff_password(){
            if($this->check()){
                     if ($this->form_validation->submitted())
                    {
                            $this->form_validation
                            ->name('oldpass')->required()
                            ->name('newpass')->required()
                            ->name('confirmpass')->required()
                            ->min_length(9, 'Password must be at least 9 characters long!');
                            if ($this->form_validation->run()){
                                    $id = $this->io->post('id');
                                    if($this->staff_model->change_password($id, $this->io->post('oldpass'), $this->io->post('newpass'), $this->io->post('confirmpass')))
                                    {
                                            $this->session->set_flashdata(array('success' => 'Password successfully updated! Log in with your new credentials'));
                                            redirect('staff/relog');
                                            exit();
                                    }
                                    else{
                                            
                                            redirect('staff/show_profile');
                                            exit();
                                    }
                            }
                            else {
                                $this->session->set_flashdata(array('error' => validation_errors()));
                                redirect('staff/show_profile');
                                exit();
                            }

                    }
            }
    }

    public function relog(){
        $this->session->unset_userdata(array('loggedin', 'email', 'usertype'));
        $this->session->sess_destroy();
        $this->call->view('login');
    }

    public function logout(){
        $this->session->unset_userdata(array('loggedin', 'email', 'usertype'));
        $this->session->sess_destroy();
        redirect('auth');
	}
}

?>