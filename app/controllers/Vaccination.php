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
                                                $this->io->post('pwd')
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
                        $details = $this->vaccination_model->get_vacc_details($id);
                        $data = array($userdata, $inquirycount, $vaccination, $details);
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
        
        public function add_vaccination_dose(){
                if($this->check()){
                        if ($this->form_validation->submitted())
                        {
                                $this->form_validation
                                ->name('vaccinator')->required();
                                
                                if($this->form_validation->run()){
                                        $id = $this->io->post('id');
                                        if($this->vaccination_model->insert_vacc_dose($id, $this->io->post('vaccination_info'), $this->io->post('vaccinator'), $this->io->post('vaccination_date'), $this->io->post('lot_number')))
                                        {
                                                $this->session->set_flashdata(array('success' => 'New Vaccination Dose added!'));
                                                redirect('vaccination/edit_vaccinationrecord/' . $id);
                                                exit();
                                        }
                                        else{
                                                $this->session->set_flashdata(array('error' => 'An Error occurred! Vaccination Dose was not added!'));
                                                redirect('vaccination/edit_vaccinationrecord/' . $id);
                                                exit();
                                        }
                                }
                        }
                }
        }


        public function delete_vaccinationrecord(){
                if($this->check()){
                        if ($this->form_validation->submitted())
                        {
                                $id = $this->io->post('id');
                                if($this->form_validation->run()){
                                        if($this->vaccination_model->delete_vaccination_records($id))
                                        {
                                                redirect('vaccination/vaccination_records');
                                                exit();
                                        }
                                        else{
                                                $this->session->set_flashdata(array('error' => 'An Error occurred! Vaccination record was not deleted!'));
                                                redirect('vaccination/vaccination_records');
                                                exit();
                                        }
                                }
                        }
                }
        }

        public function delete_vacc_detail(){
                if($this->check()){
                        if ($this->form_validation->submitted())
                        {
                                $vid = $this->io->post('v_id');
                                if($this->form_validation->run()){
                                        if($this->vaccination_model->delete_vacc_detail($this->io->post('id'))){
                                                $this->session->set_flashdata(array('success' => 'Vaccination Dose was successfully deleted!'));
                                                redirect('vaccination/edit_vaccinationrecord/'.$vid);
                                                exit();
                                        }
                                        else{
                                                $this->session->set_flashdata(array('error' => 'An Error occurred! Vaccination Dose was not deleted!'));
                                                redirect('vaccination/edit_vaccinationrecord/'.$vid);
                                                exit();
                                        }
                                }
                        }
                }
        }

        public function update_vaccination_dose(){
                if($this->check()){
                        if ($this->form_validation->submitted())
                        {
                                $this->form_validation
                                ->name('vaccinator')->required();
                                
                                if($this->form_validation->run()){
                                        $id = $this->io->post('id');
                                        $vid = $this->io->post('v_id');
                                        if($this->vaccination_model->update_vacc_dose($id, $this->io->post('vaccination_info'), $this->io->post('vaccinator'), $this->io->post('date'), $this->io->post('lot_number')))
                                        {
                                                $this->session->set_flashdata(array('success' => 'Vaccination Dose was successfully updated!'));
                                                redirect('vaccination/edit_vaccinationrecord/' . $vid);
                                                exit();
                                        }
                                        else{
                                                $this->session->set_flashdata(array('error' => 'An Error occurred! Vaccination Dose was not updated!'));
                                                redirect('vaccination/edit_vaccinationrecord/' . $vid);
                                                exit();
                                        }
                                }
                        }
                }
        }

        public function get_details(){
                
                $vaccid = $this->io->post('vaccid');
                $data['detail'] = $this->vaccination_model->get_vacc_single($vaccid);

                if(!empty($data)){

                        $this->call->view('admin/includes/vacc_details_modal', $data);
                }
                else{
                        echo 'Error retrieving data';
                }
        }

        public function get_vacc_details(){
                $vaccid = $this->io->post('vaccid');
                $data['edit'] = $this->vaccination_model->get_vacc_edit($vaccid);

                if(!empty($data)){

                        $this->call->view('admin/includes/edit_vacc_details', $data);
                }
                else{
                        echo 'Error retrieving data';
                }
        }
        
        public function get_vacc_record(){
                $vaccid = $this->io->post('vaccid');
                $data['record'] = $this->vaccination_model->get_vacc_record($vaccid);

                if(!empty($data)){

                        $this->call->view('admin/includes/delvacc_modal', $data);
                }
                else{
                        echo 'Error retrieving data';
                }
        }

        public function logout(){
                $this->session->unset_userdata(array('loggedin', 'username', 'usertype'));
                $this->session->sess_destroy();
                redirect('auth/');
        }

}
?>