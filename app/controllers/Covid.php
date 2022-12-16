<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');


class Covid extends Controller {

        public function check(){
                if($this->auth_model->is_loggedin()){
                        if($this->auth_model->usertype()){
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
        
        public function covid_records(){

                if($this->check()){
                        $userdata = $this->admin_model->get_data();
                        $inquirycount = $this->admin_model->get_inquiry_count();
                        $coviddata = $this->covid_model->get_all_tblcovidrecords();
                        $data = array($userdata, $inquirycount, $coviddata);
                        $this->call->view('admin/covid_records', $data);
                }
        }

        public function new_covidcase(){
                if($this->check()){
                        $inquirycount = $this->admin_model->get_inquiry_count();
                        $userdata = $this->admin_model->get_data();
                        $data = array($userdata, $inquirycount);
                        $this->call->view('admin/new_covidcase', $data);
                }
        }

        public function add_covidcase(){
                if($this->check()){
                        if ($this->form_validation->submitted())
                        {
                                $this->form_validation->name('firstname')->required();
                                $this->form_validation->name('lastname')->required();
                                $this->form_validation->name('middlename')->required();

                                if ($this->form_validation->run()){
                                        if($this->covid_model->insert_covid(
                                                $this->io->post('case_no'), 
                                                $this->io->post('release_date'), 
                                                $this->io->post('antigen_date'), 
                                                $this->io->post('rtpcr_date'), 
                                                $this->io->post('lastname'), 
                                                $this->io->post('firstname'), 
                                                $this->io->post('middlename'), 
                                                $this->io->post('birthday'),
                                                $this->io->post('age'), 
                                                $this->io->post('sex'), 
                                                $this->io->post('cnumber'), 
                                                $this->io->post('contact_nature'),
                                                $this->io->post('last_exposure'),
                                                $this->io->post('symptoms'),
                                                $this->io->post('isolation_place'),
                                                $this->io->post('illness_onset'),
                                                $this->io->post('quarantine_period'),
                                                $this->io->post('recovery_date'),
                                                $this->io->post('outcome'),
                                                $this->io->post('contact_tracing'),
                                                $this->io->post('closed_contact'),
                                                $this->io->post('status'),
                                                $this->io->post('vaccination_status')
                                                ))                                         
                                        {
                                                $this->session->set_flashdata(array('success' => 'Patient record was successfully created!'));
                                                redirect('covid/covid_records');
                                                exit();
                                        }
                                }
                                else{
                                        redirect('covid/covid_records');
                                        exit();
                                }
                        }
                        else{
                                redirect('covid/covid_records');
                        }
                }
        }

        public function edit_covidcase($id) {
                if($this->check()){
                        $coviddata = $this->covid_model->get_single_data($id);
                        $userdata = $this->admin_model->get_data();
                        $inquirycount = $this->admin_model->get_inquiry_count();
                        $data = array($userdata, $inquirycount, $coviddata);
                        $this->call->view('admin/edit_covid', $data);
                }
        }

        public function update_covidcase(){
                if($this->check()){
                        if ($this->form_validation->submitted())
                        {
                                $this->form_validation->name('firstname')->required();
                                $this->form_validation->name('lastname')->required();
                                $this->form_validation->name('middlename')->required();
                                
                                if ($this->form_validation->run()){
                                        $id = $this->io->post('id');
                                        if($this->covid_model->update_covid(
                                                $id,
                                                $this->io->post('case_no'), 
                                                $this->io->post('release_date'), 
                                                $this->io->post('antigen_date'), 
                                                $this->io->post('rtpcr_date'), 
                                                $this->io->post('lastname'), 
                                                $this->io->post('firstname'), 
                                                $this->io->post('middlename'), 
                                                $this->io->post('birthday'),
                                                $this->io->post('age'), 
                                                $this->io->post('sex'), 
                                                $this->io->post('cnumber'), 
                                                $this->io->post('contact_nature'),
                                                $this->io->post('last_exposure'),
                                                $this->io->post('symptoms'),
                                                $this->io->post('isolation_place'),
                                                $this->io->post('illness_onset'),
                                                $this->io->post('quarantine_period'),
                                                $this->io->post('recovery_date'),
                                                $this->io->post('outcome'),
                                                $this->io->post('contact_tracing'),
                                                $this->io->post('closed_contact'),
                                                $this->io->post('status'),
                                                $this->io->post('vaccination_status')
                                                ))
                                        {
                                                $this->session->set_flashdata(array('success' => 'COVID19 Case record was successfully updated!'));
                                                redirect('covid/edit_covidcase/'.$id);
                                                exit();
                                        }
                                        else{
                                                $this->session->set_flashdata(array('success' => 'No Changes Made!'));
                                                redirect('covid/edit_covidcase/'.$id);
                                                exit();
                                        }
                                }
                                else{
                                        redirect('covid/edit_covidcase/'.$id);
                                        exit();
                                }
                        }
                        else{
                                redirect('covid/covid_records');
                        }
                }
        }
        
        public function delete_covid($id) {
                if($this->check()){
                        if($this->covid_model->delete_covid($id))
                        {
                                redirect('covid/covid_records');
                                exit();
                        }
                        else{
                                redirect('covid/covid_records');
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