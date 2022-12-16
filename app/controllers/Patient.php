<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');


class Patient extends Controller {

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

         public function patient_records(){
                if($this->check()){
                        $patientdata = $this->patient_model->show_patient();
                        $inquirycount = $this->admin_model->get_inquiry_count();
                        $userdata = $this->admin_model->get_data();
                        $data = array($userdata, $inquirycount, $patientdata);
                        $this->call->view('admin/patient_records', $data);
                }
        }

        public function new_patient(){
                if($this->check()){
                        $inquirycount = $this->admin_model->get_inquiry_count();
                        $userdata = $this->admin_model->get_data();
                        $data = array($userdata, $inquirycount);
                        $this->call->view('admin/new_patient', $data);
                }
        }

        public function add_patientrecord(){
                if($this->check()){
                        if ($this->form_validation->submitted())
                        {
                                $this->form_validation->name('firstname')->required();
                                $this->form_validation->name('lastname')->required();
                                $this->form_validation->name('middlename')->required();

                                if ($this->form_validation->run()){
                                        if($this->patient_model->insert_patient(
                                                $this->io->post('firstname'), 
                                                $this->io->post('lastname'), 
                                                $this->io->post('middlename'), 
                                                $this->io->post('age'), 
                                                $this->io->post('gender'), 
                                                $this->io->post('birthday'),
                                                $this->io->post('civil_status'),
                                                $this->io->post('contact_person'), 
                                                $this->io->post('address'), 
                                                $this->io->post('cnumber'), 
                                                $this->io->post('health_insurance'),
                                                $this->io->post('religion'),
                                                $this->io->post('blood_type'),
                                                $this->io->post('visit_date'), //PATIENT CASE SUMMARY
                                                $this->io->post('visit_time'),
                                                $this->io->post('age_months'),
                                                $this->io->post('food_allergy'),
                                                $this->io->post('medicine_allergy'),
                                                $this->io->post('chief_complaints'),
                                                $this->io->post('history_presentillness'),
                                                $this->io->post('hypertension_meds'),
                                                $this->io->post('diabetes_meds'),
                                                $this->io->post('bronchial_meds'),
                                                $this->io->post('last_attack'),
                                                $this->io->post('other_hldse'),
                                                $this->io->post('operation'),
                                                $this->io->post('bp'),
                                                $this->io->post('heart_rate'),
                                                $this->io->post('respiratory_rate'),
                                                $this->io->post('temperature'),
                                                $this->io->post('weight'),
                                                $this->io->post('height'),
                                                $this->io->post('physical_exam'),
                                                $this->io->post('assessment'),
                                                $this->io->post('management_plan'),
                                                $this->io->post('service_provider')
                                                ))                                         {
                                                $this->session->set_flashdata(array('success' => 'Patient record was successfully created!'));
                                                redirect('patient/patient_records/');
                                                exit();
                                        }
                                }
                                else{
                                        redirect('patient/patient_records');
                                        exit();
                                }
                        }
                        else{
                                redirect('patient/patient_records');
                        }
                }
        }

        public function edit_patientrecord($id) {
                if($this->check()){
                        $patientdata = $this->patient_model->get_single_data($id);
                        $userdata = $this->admin_model->get_data();
                        $inquirycount = $this->admin_model->get_inquiry_count();
                        $data = array($userdata, $inquirycount, $patientdata);
                        $this->call->view('admin/edit_patient', $data);
                }
        }

        public function update_patientrecord(){
                if($this->check()){
                        if ($this->form_validation->submitted())
                        {
                                $this->form_validation
                                ->name('firstname')->required();
                                
                                if ($this->form_validation->run()){
                                        $id = $this->io->post('id');
                                        if($this->patient_model->update_patientrecord(
                                                $id,
                                                $this->io->post('firstname'), 
                                                $this->io->post('lastname'), 
                                                $this->io->post('middlename'), 
                                                $this->io->post('age'), 
                                                $this->io->post('gender'), 
                                                $this->io->post('birthday'),
                                                $this->io->post('civil_status'),
                                                $this->io->post('contact_person'), 
                                                $this->io->post('address'), 
                                                $this->io->post('cnumber'), 
                                                $this->io->post('health_insurance'),
                                                $this->io->post('religion'),
                                                $this->io->post('blood_type'),
                                                $this->io->post('visit_date'), //PATIENT CASE SUMMARY
                                                $this->io->post('visit_time'),
                                                $this->io->post('age_months'),
                                                $this->io->post('food_allergy'),
                                                $this->io->post('medicine_allergy'),
                                                $this->io->post('chief_complaints'),
                                                $this->io->post('history_presentillness'),
                                                $this->io->post('hypertension_meds'),
                                                $this->io->post('diabetes_meds'),
                                                $this->io->post('bronchial_meds'),
                                                $this->io->post('last_attack'),
                                                $this->io->post('other_hldse'),
                                                $this->io->post('operation'),
                                                $this->io->post('bp'),
                                                $this->io->post('heart_rate'),
                                                $this->io->post('respiratory_rate'),
                                                $this->io->post('temperature'),
                                                $this->io->post('weight'),
                                                $this->io->post('height'),
                                                $this->io->post('physical_exam'),
                                                $this->io->post('assessment'),
                                                $this->io->post('management_plan'),
                                                $this->io->post('service_provider')
                                                )) 
                                        {
                                                $this->session->set_flashdata(array('success' => 'Patient record was successfully updated!'));
                                                redirect('patient/edit_patientrecord/'.$id);
                                                exit();
                                        }
                                        else{
                                                $this->session->set_flashdata(array('success' => 'No Changes Made!'));
                                                redirect('patient/edit_patientrecord/'.$id);
                                                exit();
                                        }
                                }
                                else{
                                        redirect('patient/edit_patientrecord/'.$id);
                                        exit();
                                }
                        }
                        else{
                                redirect('patient/patient_records');
                        }
                }
        }

       

        public function delete_patient_record($id) {
                if($this->check()){
                        if($this->patient_model->delete_patient_records($id))
                        {
                                redirect('patient/patient_records');
                                exit();
                        }
                        else{
                                redirect('patient/patient_records');
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