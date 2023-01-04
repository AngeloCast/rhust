<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');


class Vaccination extends Controller {

        public function check(){
                if($this->auth_model->is_loggedin()){
                        if($this->session->userdata('usertype') === 0 or $this->session->userdata('usertype') === 2){
                                return true;
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

        public function vaccination_records(){

                if($this->check()){
                        $userdata = $this->admin_model->get_data();
                        $inquirycount = $this->admin_model->get_inquiry_count();
                        $vaccinationdata = $this->vaccination_model->show_vaccinationrecords();
                        $data = array($userdata, $inquirycount, $vaccinationdata);
                        $this->call->view('admin/vaccination_records', $data);
                        
                }
        }

        public function new_vaccination(){
                if($this->check()){
                        $inquirycount = $this->admin_model->get_inquiry_count();
                        $userdata = $this->admin_model->get_data();
                        $data = array($userdata, $inquirycount);
                        $this->call->view('admin/new_vaccination', $data);
                }
        }

        public function add_vaccination(){
                if($this->check()){
                        if ($this->form_validation->submitted())
                        {
                                $this->form_validation
                                ->name('firstname')->required();

                                if ($this->form_validation->run()){
                                        if($this->vaccination_model->insert_vaccinationrecords(
                                                $this->io->post('priority_group'), 
                                                $this->io->post('uniqueperson_id'), 
                                                $this->io->post('indigenous_member'), 
                                                $this->io->post('lastname'), 
                                                $this->io->post('firstname'), 
                                                $this->io->post('middlename'),
                                                $this->io->post('suffix'),
                                                $this->io->post('birthday'),
                                                $this->io->post('sex'), 
                                                $this->io->post('cnumber'), 
                                                $this->io->post('region'),
                                                $this->io->post('province'),
                                                $this->io->post('municipality'),
                                                $this->io->post('barangay'),
                                                $this->io->post('pwd'),
                                                $this->io->post('vaccination_info'),
                                                $this->io->post('vaccinator'),
                                                $this->io->post('vaccination_date'),
                                                $this->io->post('lot_number')
                                                ))       
                                        {
                                                $this->session->set_flashdata(array('success' => 'COVID Vaccination record was successfully added!'));
                                                redirect('vaccination/vaccination_records');
                                                exit();
                                        }
                                }
                                else{
                                    redirect('vaccination/vaccination_records');
                                    exit();
                                }
                        }
                        else
                        {
                                $this->call->view('vaccination/vaccination_records', $data);
                        }
                }
        }

        public function edit_vaccinationrecord($id){
                if($this->check()){
                        $userdata = $this->admin_model->get_data();
                        $inquirycount = $this->admin_model->get_inquiry_count();
                        $vaccination = $this->vaccination_model->get_single_data($id);
                        $data = array($userdata, $inquirycount, $vaccination);
                        $this->call->view('admin/edit_vaccination', $data);
                }
        }

        public function update_vaccinationrecord(){
                if($this->check()){
                        if ($this->form_validation->submitted())
                        {
                                $this->form_validation
                                ->name('firstname')->required();
                            
                                if($this->form_validation->run()){
                                        $id = $this->io->post('id');
                                        if($this->vaccination_model->update_vaccinationrecord(
                                                $id,
                                                $this->io->post('priority_group'), 
                                                $this->io->post('uniqueperson_id'), 
                                                $this->io->post('indigenous_member'), 
                                                $this->io->post('lastname'), 
                                                $this->io->post('firstname'), 
                                                $this->io->post('middlename'),
                                                $this->io->post('suffix'),
                                                $this->io->post('birthday'),
                                                $this->io->post('sex'), 
                                                $this->io->post('cnumber'), 
                                                $this->io->post('region'),
                                                $this->io->post('province'),
                                                $this->io->post('municipality'),
                                                $this->io->post('barangay'),
                                                $this->io->post('pwd'),
                                                $this->io->post('vaccination_info'),
                                                $this->io->post('vaccinator'),
                                                $this->io->post('vaccination_date'),
                                                $this->io->post('lot_number')
                                                ))    
                                        {
                                                $this->session->set_flashdata(array('success' => 'COVID Vaccination record was successfully updated!'));
                                                redirect('vaccination/edit_vaccinationrecord/' . $id);
                                                exit();
                                        }
                                        else{
                                                
                                                redirect('vaccination/edit_vaccinationrecord/' . $id);
                                                exit();
                                        }
                                }
                        }
                }
        }
        

         public function delete_vaccinationrecord($id){
                if($this->check()){
                        if($this->vaccination_model->delete_vaccination_records($id))
                        {
                                redirect('vaccination/vaccination_records');
                                exit();
                        }
                        else{
                                redirect('vaccination/vaccination_records');
                                exit();
                        }
                }
        }

        
        public function logout(){
                $this->session->unset_userdata(array('loggedin', 'username', 'usertype'));
                $this->session->sess_destroy();
                redirect('auth/');
        }

}
?>