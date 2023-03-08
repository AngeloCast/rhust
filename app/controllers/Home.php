<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');


class Home extends Controller {


        public function index(){
                
                $newsdata = $this->home_model->get_news(); //[0]
                $articledata = $this->home_model->get_article(); //[1]
                $sidebar = $this->home_model->get_announcement(); //[2]
                $latest = $this->home_model->get_latest(); //[4]
                $events = $this->home_model->get_events(); //[4]
                $x = 1;

                if($this->auth_model->is_loggedin()){
                        
                        $userdata = $this->home_model->get_data(); //[3]
                        $data = array($newsdata, $articledata, $sidebar, $userdata, $latest, $events);

                        if($this->session->userdata('usertype') === 0){
                                redirect('admin/');
                                exit();
                        }
                        else if($this->session->userdata('usertype') === 2){
                                redirect('staff/');
                                exit();
                        }
                        else{
                                $this->call->view('index', $data);
                        }
                } 
                else 
                {
                        $data = array($newsdata, $articledata, $sidebar, $x, $latest, $events);
                        $this->call->view('index', $data);
                        exit();
                }
        }


        public function news(){
                if (!isset ($_GET['page']) ) {  $page = 1;  } else {  $page = $_GET['page']; }
                $records_per_page = 5;
                $offset = ($page - 1) * $records_per_page;
                $where = array('status' => 'publish',
                        'category' => '2'
                );
                $newsdata = $this->db->table('rhuposts')->where($where)->limit($offset, $records_per_page)->order_by('id', 'DESC')->get_all();
                $count = $this->db->table('rhuposts')->select_count('id', 'count')->where($where)->get_all()[0];
                $this->pagination->initialize($count['count'], $records_per_page, $page, 'home/news');
                $linkpage = $this->pagination->paginate();
                $events = $this->home_model->get_events(); //[4]
                $articledata = $this->home_model->get_article(); //[1]
                $sidebar = $this->home_model->get_announcement(); //[2]
                $x = 1; 
                if($this->auth_model->is_loggedin()){
                    
                        $userdata = $this->home_model->get_data(); //[3]
                        $data = array($newsdata, $articledata, $sidebar, $userdata, $linkpage, $events);

                        if($this->session->userdata('usertype') === 0){
                                redirect('admin/');
                                exit();
                        }
                        else if($this->session->userdata('usertype') === 2){
                                redirect('staff/');
                                exit();
                        }
                        else{
                                $this->call->view('news', $data);
                        }
                } else {
                        $data = array($newsdata, $articledata, $sidebar, $x, $linkpage, $events);
                        $this->call->view('news', $data);
                        exit();
                }
        }

        public function events(){
                $newsdata = $this->home_model->get_news(); //[0]
                $sidebar = $this->home_model->get_announcement(); //[2]
                $allevents = $this->home_model->get_allevents(); //[4]
                $x = 1;

                if($this->auth_model->is_loggedin()){
                        
                        $userdata = $this->home_model->get_data(); //[3]
                        $data = array($newsdata, $sidebar, $allevents, $userdata);

                        if($this->session->userdata('usertype') === 0){
                                redirect('admin/');
                                exit();
                        }
                        else if($this->session->userdata('usertype') === 2){
                                redirect('staff/');
                                exit();
                        }
                        else{
                                $this->call->view('events', $data);
                        }
                } 
                else 
                {
                        $data = array($newsdata, $sidebar, $allevents, $x);
                        $this->call->view('events', $data);
                        exit();
                }
        }

        public function health_info(){
                if (!isset ($_GET['page']) ) {  $page = 1;  } else {  $page = $_GET['page']; }
                $records_per_page = 5;
                $offset = ($page - 1) * $records_per_page;
                $where = array('status' => 'publish',
                        'category' => '4'
                );
                $hinfodata = $this->db->table('rhuposts')->where($where)->limit($offset, $records_per_page)->order_by('id', 'DESC')->get_all();
                $count = $this->db->table('rhuposts')->select_count('id', 'count')->where($where)->get_all()[0];
                $this->pagination->initialize($count['count'], $records_per_page, $page, 'home/news');
                $linkpage = $this->pagination->paginate();
                $events = $this->home_model->get_events(); //[4]
                $newsdata = $this->home_model->get_news(); //[0]
                $sidebar = $this->home_model->get_announcement(); //[2]
                $x = 1; //[3]
                if($this->auth_model->is_loggedin()){
            
                        $userdata = $this->home_model->get_data(); //[3]
                        
                        $data = array($hinfodata, $newsdata, $sidebar, $userdata, $linkpage, $events);

                        if($this->session->userdata('usertype') === 0){
                                redirect('admin/');
                                exit();
                        }
                        else if($this->session->userdata('usertype') === 2){
                                redirect('staff/');
                                exit();
                        }
                        else{
                                $this->call->view('health_info', $data);
                        }
                } else {

                        $data = array($hinfodata, $newsdata, $sidebar, $x, $linkpage, $events);
                        $this->call->view('health_info', $data);
                        exit();
                }
        }

        public function health_faqs(){
                if (!isset ($_GET['page']) ) {  $page = 1;  } else {  $page = $_GET['page']; }
                $records_per_page = 5;
                $offset = ($page - 1) * $records_per_page;
                $where = array('status' => 'publish',
                        'category' => '3'
                );
                $faqsdata = $this->db->table('rhuposts')->where($where)->limit($offset, $records_per_page)->order_by('id', 'DESC')->get_all();
                $count = $this->db->table('rhuposts')->select_count('id', 'count')->where($where)->get_all()[0];
                $this->pagination->initialize($count['count'], $records_per_page, $page, 'home/news');
                $linkpage = $this->pagination->paginate();
                $events = $this->home_model->get_events(); //[4]
                $newsdata = $this->home_model->get_news(); //[0]
                $sidebar = $this->home_model->get_announcement(); //[2]
                $x = 1; //[3]
                if($this->auth_model->is_loggedin()){
            
                        $userdata = $this->home_model->get_data(); //[3]
                        
                        $data = array($faqsdata, $newsdata, $sidebar, $userdata, $linkpage, $events);

                        if($this->session->userdata('usertype') === 0){
                                redirect('admin/');
                                exit();
                        }
                        else if($this->session->userdata('usertype') === 2){
                                redirect('staff/');
                                exit();
                        }
                        else{
                                $this->call->view('health_faq', $data);
                        }
                } else {

                        $data = array($faqsdata, $newsdata, $sidebar, $x, $linkpage, $events);
                        $this->call->view('health_faq', $data);
                        exit();
                }
        }

        public function view_post($id){ //view post

                $newsdata = $this->home_model->get_news(); //[0]
                $articledata = $this->home_model->get_article(); //[1]
                $sidebar = $this->home_model->get_announcement(); //[2]
                $view = $this->home_model->get_single_view($id); //[4]
                $events = $this->home_model->get_events(); //[4]
                $gallery = $this->home_model->get_gallery($id); //[5]
                $x = 1; //[3]
                if($this->auth_model->is_loggedin()){
                    
                        $userdata = $this->home_model->get_data(); //[3]
                    
                        $data = array($newsdata, $articledata, $sidebar, $userdata, $view, $events, $gallery);

                        if($this->session->userdata('usertype') === 0){
                                redirect('admin/');
                                exit();
                        }
                        else if($this->session->userdata('usertype') === 2){
                                redirect('staff/');
                                exit();
                        }
                        else{
                                $this->call->view('view', $data);
                        }
                } else {
                        
                        $data = array($newsdata, $articledata, $sidebar, $x, $view, $events, $gallery);
                        $this->call->view('view', $data);
                        exit();
                }
        }

        public function faqs($id){ //view FAQs

                $faqsdata = $this->home_model->get_faqs(); //[1]
                $sidebar = $this->home_model->get_announcement(); //[2]
                $view = $this->home_model->get_single_view($id); //[4]
                if($this->auth_model->is_loggedin()){
                    
                        $userdata = $this->home_model->get_data(); //[3]
                    
                        $data = array($faqsdata, $sidebar, $view, $userdata);

                        if($this->session->userdata('usertype') === 0){
                                redirect('admin/');
                                exit();
                        }
                        else if($this->session->userdata('usertype') === 2){
                                redirect('staff/');
                                exit();
                        }
                        else{
                                $this->call->view('view_faqs', $data);
                        }
                } else {
                        
                        $data = array($faqsdata, $sidebar, $view);
                        $this->call->view('view_faqs', $data);
                        exit();
                }
        }

        // public function announcement($id){ //view post

        //         $newsdata = $this->home_model->get_news(); //[0]
        //         $articledata = $this->home_model->get_article(); //[1]
                
        //         $x = 1; //[3]
        //         $view = $this->home_model->get_announcement_view($id); //[4]

        //         if($this->auth_model->is_loggedin()){
                    
        //                 $userdata = $this->home_model->get_data(); //[3]
                    
        //                 $data = array($newsdata, $articledata, $x, $userdata, $view);

        //                 if($this->auth_model->usertype()){
        //                         redirect('admin/');
        //                         exit();
        //                 }
        //                 else{
        //                         $this->call->view('announcement', $data);
        //                 }
        //         } else {
                        
        //                 $data = array($newsdata, $articledata, $x, $x, $view);
        //                 $this->call->view('announcement', $data);
        //                 exit();
        //         }
        // }

        public function contact_us(){

                $newsdata = $this->home_model->get_news(); //[0]
                $articledata = $this->home_model->get_article(); //[1]
                $sidebar = $this->home_model->get_announcement(); //[3]
                

                if($this->auth_model->is_loggedin()){
                        $userdata = $this->home_model->get_data(); //[4]
                        $data = array($newsdata, $articledata, $sidebar, $userdata);

                        if($this->session->userdata('usertype') === 0){
                                redirect('admin/');
                                exit();
                        }
                        else if($this->session->userdata('usertype') === 2){
                                redirect('staff/');
                                exit();
                        }
                        else{
                                $this->call->view('contact', $data);
                        }
                } else {
                        $this->session->set_flashdata(array('error' => 'You to log in first to send an inquiry!'));
                        $this->call->view('login');
                }
        }

        public function send_inquiry(){
                if ($this->form_validation->submitted())
                {
                        $this->form_validation
                        ->name('firstname')->required()
                        ->name('lastname')->required();

                        if ($this->form_validation->run()){
                                $firstname = $this->io->post('firstname');
                                $lastname = $this->io->post('lastname');
                                $email = $this->io->post('email');
                                $subject = $this->io->post('subject');
                                $message = $this->io->post('message');
                                if($this->home_model->send_inquiry($firstname, $lastname, $email, $subject, $message))
                                {
                                        $this->send_email($email, $firstname, $lastname, $subject, $message);
                                        $this->session->set_flashdata(array('success' => 'Inquiry was successfully sent! Check your email for the response, Thank you!'));
                                        redirect('home/contact_us');
                                        exit();
                                }
                                else{
                                        $this->session->set_flashdata(array('error' => 'An error occured! Inquiry not sent!'));
                                        redirect('home/contact_us');
                                        exit();
                                }
                        }
                }
                redirect('home/contact_us');
        }

        public function send_email($sender, $firstname, $lastname, $subject, $message){
                $this->email->subject($subject);
                $this->email->sender($sender);
                $this->email->recipient('castangelo123@gmail.com');
                $this->email->email_content($message);
                $this->email->send();
        }

        public function about(){
                $newsdata = $this->home_model->get_news(); //[1]
                $articledata = $this->home_model->get_article(); //[2]
                $sidebar = $this->home_model->get_announcement(); //[3]
                $staff = $this->home_model->get_staff(); //[3]
                $x = 1;
                if($this->auth_model->is_loggedin()){
                    
                        $userdata = $this->home_model->get_data(); //[0]
                        
                        $data = array($newsdata, $articledata, $sidebar, $userdata, $staff);

                        if($this->session->userdata('usertype') === 0){
                                redirect('admin/');
                                exit();
                        }
                        else if($this->session->userdata('usertype') === 2){
                                redirect('staff/');
                                exit();
                        }
                        else{
                                $this->call->view('about', $data);
                        }
                } else {
                        $data = array($newsdata, $articledata, $sidebar, $x, $staff);
                        $this->call->view('about', $data);
                        exit();
                }
        }

        public function services_schedules(){
                $newsdata = $this->home_model->get_news(); //[1]
                $articledata = $this->home_model->get_article(); //[2]
                $sidebar = $this->home_model->get_announcement(); //[3]
                $staff = $this->home_model->get_staff(); //[3]
                $x = 1;
                if($this->auth_model->is_loggedin()){
                    
                        $userdata = $this->home_model->get_data(); //[0]
                        
                        $data = array($newsdata, $articledata, $sidebar, $userdata, $staff);

                        if($this->session->userdata('usertype') === 0){
                                redirect('admin/');
                                exit();
                        }
                        else if($this->session->userdata('usertype') === 2){
                                redirect('staff/');
                                exit();
                        }
                        else{
                                $this->call->view('about', $data);
                        }
                } else {
                        $data = array($newsdata, $articledata, $sidebar, $x, $staff);
                        $this->call->view('services_schedules', $data);
                        exit();
                }
        }

        public function clustering(){
                $newsdata = $this->home_model->get_news(); //[0]
                $articledata = $this->home_model->get_article(); //[1]
                $sidebar = $this->home_model->get_announcement(); //[2]
                $classifications = $this->admin_model->get_classification_names();
                //count per barangay
                $Bigaanrecords = $this->home_model->AllrecordBigaan();
                $Calangatanrecords = $this->home_model->AllrecordCalangatan();
                $Calsaparecords = $this->home_model->AllrecordCalsapa();
                $Ilagrecords = $this->home_model->AllrecordIlag();
                $Lumangbayanrecords = $this->home_model->AllrecordLumangbayan();
                $Tacliganrecords = $this->home_model->AllrecordTacligan();
                $Poblacionrecords = $this->home_model->AllrecordPoblacion();
                $Caagutayanrecords = $this->home_model->AllrecordCaagutayan();

                

                $barangayGender = [
                        'bigaanmale' => $this->cluster_model->get_male('Bigaan'),
                        'bigaanfemale' => $this->cluster_model->get_female('Bigaan'),
                        'bigaanother' => $this->cluster_model->get_other('Bigaan'),

                        'calangatanmale' => $this->cluster_model->get_male('Calangatan'),
                        'calangatanfemale' => $this->cluster_model->get_female('Calangatan'),
                        'calangatanother' => $this->cluster_model->get_other('Calangatan'),

                        'calsapamale' => $this->cluster_model->get_male('Calsapa'),
                        'calsapafemale' => $this->cluster_model->get_female('Calsapa'),
                        'calsapaother' => $this->cluster_model->get_other('Calsapa'),

                        'ilagmale' => $this->cluster_model->get_male('Ilag'),
                        'ilagfemale' => $this->cluster_model->get_female('Ilag'),
                        'ilagother' => $this->cluster_model->get_other('Ilag'),

                        'lumangbayanmale' => $this->cluster_model->get_male('Lumangbayan'),
                        'lumangbayanfemale' => $this->cluster_model->get_female('Lumangbayan'),
                        'lumangbayanother' => $this->cluster_model->get_other('Lumangbayan'),

                        'tacliganmale' => $this->cluster_model->get_male('Tacligan'),
                        'tacliganfemale' => $this->cluster_model->get_female('Tacligan'),
                        'tacliganother' => $this->cluster_model->get_other('Tacligan'),

                        'poblacionmale' => $this->cluster_model->get_male('Poblacion'),
                        'poblacionfemale' => $this->cluster_model->get_female('Poblacion'),
                        'poblacionother' => $this->cluster_model->get_other('Poblacion'),

                        'caagutayanmale' => $this->cluster_model->get_male('Caagutayan'),
                        'caagutayanfemale' => $this->cluster_model->get_female('Caagutayan'),
                        'caagutayanother' => $this->cluster_model->get_other('Caagutayan'),

                ];

                $barangaypieCharts = [
                        'bigaandough' => $this->cluster_model->get_classification('Bigaan'),
                        'calangatandough' => $this->cluster_model->get_classification('Calangatan'),
                        'calsapadough' => $this->cluster_model->get_classification('Calsapa'),
                        'ilagdough' => $this->cluster_model->get_classification('Ilag'),
                        'lumangbayandough' => $this->cluster_model->get_classification('Lumangbayan'),
                        'tacligandough' => $this->cluster_model->get_classification('Tacligan'),
                        'poblaciondough' => $this->cluster_model->get_classification('Poblacion'),
                        'caagutayandough' => $this->cluster_model->get_classification('Caagutayan'),
                ];

                $barangayageCharts = [
                        'bigaanpie' => $this->cluster_model->get_age('Bigaan'),
                        'calangatanpie' => $this->cluster_model->get_age('Calangatan'),
                        'calsapapie' => $this->cluster_model->get_age('Calsapa'),
                        'ilagpie' => $this->cluster_model->get_age('Ilag'),
                        'lumangbayanpie' => $this->cluster_model->get_age('Lumangbayan'),
                        'tacliganpie' => $this->cluster_model->get_age('Tacligan'),
                        'poblacionpie' => $this->cluster_model->get_age('Poblacion'),
                        'caagutayanpie' => $this->cluster_model->get_age('Caagutayan'),
                ];

                if($this->auth_model->is_loggedin()){
                        if($this->session->userdata('usertype') === 0){
                                redirect('admin/');
                                exit();
                        }
                        else if($this->session->userdata('usertype') === 2){
                                redirect('staff/');
                                exit();
                        }
                        else{
                                $userdata = $this->home_model->get_data(); //[3]
                                
                                $data = array($newsdata, $articledata, $sidebar, $userdata, $classifications, $Bigaanrecords, $Calangatanrecords, $Calsaparecords, $Ilagrecords, $Lumangbayanrecords, $Tacliganrecords, $Poblacionrecords, $Caagutayanrecords, $barangayGender, $barangaypieCharts, $barangayageCharts);


                                $this->call->view('clustering', $data);
                        }
                }
                else{
                        $this->session->set_flashdata(array('error' => 'You need to log in first to access the clustering page!'));
                        $this->call->view('login');
                }
        }

        public function classification(){
                $sakit = $this->io->post('classification');
                $newsdata = $this->home_model->get_news(); //[0]
                $articledata = $this->home_model->get_article(); //[1]
                $sidebar = $this->home_model->get_announcement(); //[2]
                $classifications = $this->admin_model->get_classification_names();
                //count per barangay
                $Bigaanrecords = $this->home_model->Allrecordsakit($sakit, 'Bigaan');
                $Calangatanrecords = $this->home_model->Allrecordsakit($sakit, 'Calangatan');
                $Calsaparecords = $this->home_model->Allrecordsakit($sakit, 'Calsapa');
                $Ilagrecords = $this->home_model->Allrecordsakit($sakit, 'Ilag');
                $Lumangbayanrecords = $this->home_model->Allrecordsakit($sakit, 'Lumangbayan');
                $Tacliganrecords = $this->home_model->Allrecordsakit($sakit, 'Tacligan');
                $Poblacionrecords = $this->home_model->Allrecordsakit($sakit, 'Poblacion');
                $Caagutayanrecords = $this->home_model->Allrecordsakit($sakit, 'Caagutayan');
                
                $barangayGender = [
                        'bigaanmale' => $this->cluster_model->get_malesakit('Bigaan', $sakit),
                        'bigaanfemale' => $this->cluster_model->get_femalesakit('Bigaan', $sakit),
                        'bigaanother' => $this->cluster_model->get_othersakit('Bigaan', $sakit),

                        'calangatanmale' => $this->cluster_model->get_male('Calangatan', $sakit),
                        'calangatanfemale' => $this->cluster_model->get_female('Calangatan', $sakit),
                        'calangatanother' => $this->cluster_model->get_other('Calangatan', $sakit),

                        'calsapamale' => $this->cluster_model->get_malesakit('Calsapa', $sakit),
                        'calsapafemale' => $this->cluster_model->get_femalesakit('Calsapa', $sakit),
                        'calsapaother' => $this->cluster_model->get_othersakit('Calsapa', $sakit),

                        'ilagmale' => $this->cluster_model->get_malesakit('Ilag', $sakit),
                        'ilagfemale' => $this->cluster_model->get_femalesakit('Ilag', $sakit),
                        'ilagother' => $this->cluster_model->get_othersakit('Ilag', $sakit),

                        'lumangbayanmale' => $this->cluster_model->get_malesakit('Lumangbayan', $sakit),
                        'lumangbayanfemale' => $this->cluster_model->get_femalesakit('Lumangbayan', $sakit),
                        'lumangbayanother' => $this->cluster_model->get_othersakit('Lumangbayan', $sakit),

                        'tacliganmale' => $this->cluster_model->get_malesakit('Tacligan', $sakit),
                        'tacliganfemale' => $this->cluster_model->get_femalesakit('Tacligan', $sakit),
                        'tacliganother' => $this->cluster_model->get_othersakit('Tacligan', $sakit),

                        'poblacionmale' => $this->cluster_model->get_malesakit('Poblacion', $sakit),
                        'poblacionfemale' => $this->cluster_model->get_femalesakit('Poblacion', $sakit),
                        'poblacionother' => $this->cluster_model->get_othersakit('Poblacion', $sakit),

                        'caagutayanmale' => $this->cluster_model->get_malesakit('Caagutayan', $sakit),
                        'caagutayanfemale' => $this->cluster_model->get_femalesakit('Caagutayan', $sakit),
                        'caagutayanother' => $this->cluster_model->get_othersakit('Caagutayan', $sakit),

                ];

                $barangayageCharts = [
                        'bigaanpie' => $this->cluster_model->get_agesakit('Bigaan', $sakit),
                        'calangatanpie' => $this->cluster_model->get_agesakit('Calangatan', $sakit),
                        'calsapapie' => $this->cluster_model->get_agesakit('Calsapa', $sakit),
                        'ilagpie' => $this->cluster_model->get_agesakit('Ilag', $sakit),
                        'lumangbayanpie' => $this->cluster_model->get_agesakit('Lumangbayan', $sakit),
                        'tacliganpie' => $this->cluster_model->get_agesakit('Tacligan', $sakit),
                        'poblacionpie' => $this->cluster_model->get_agesakit('Poblacion', $sakit),
                        'caagutayanpie' => $this->cluster_model->get_agesakit('Caagutayan', $sakit),
                ];

                if($this->auth_model->is_loggedin()){
                        if($this->session->userdata('usertype') === 0){
                                redirect('admin/');
                                exit();
                        }
                        else if($this->session->userdata('usertype') === 2){
                                redirect('staff/');
                                exit();
                        }
                        else{
                                $userdata = $this->home_model->get_data(); //[3]
                                
                                $data = array($newsdata, $articledata, $sidebar, $userdata, $classifications, $Bigaanrecords, $Calangatanrecords, $Calsaparecords, $Ilagrecords, $Lumangbayanrecords, $Tacliganrecords, $Poblacionrecords, $Caagutayanrecords, $barangayGender, $barangayageCharts, $sakit);

                                $this->session->set_flashdata(array('success' => 'Showing clustering of patients records with the health disease | classification: '.$sakit));
                                $this->call->view('classification', $data);
                        }
                }
                else{
                        $this->session->set_flashdata(array('error' => 'You need to log in first to access the clustering page!'));
                        $this->call->view('login');
                }
        }
        
        public function profile(){
                if($this->auth_model->is_loggedin()){
                        if($this->session->userdata('usertype') === 0){
                                redirect('admin/');
                                exit();
                        }
                        else if($this->session->userdata('usertype') === 2){
                                redirect('staff/');
                                exit();
                        }
                        else{
                                $newsdata = $this->home_model->get_news(); //[0]
                                $articledata = $this->home_model->get_article(); //[1]
                                $sidebar = $this->home_model->get_announcement(); //[2]
                                $userdata = $this->home_model->get_data(); //[3]
                                $data = array($newsdata, $articledata, $sidebar, $userdata);
                                $this->call->view('profile', $data);
                        }
                }
                else{
                        redirect('auth/login');
                        exit();
                }
        }

        public function edit_profile(){
                if($this->auth_model->is_loggedin()){
                        if($this->session->userdata('usertype') === 0){
                                redirect('admin/');
                                exit();
                        }
                        else if($this->session->userdata('usertype') === 2){
                                redirect('staff/');
                                exit();
                        }
                        else{
                                
                                $userdata = $this->home_model->get_data(); //[3]
                                $data = array(1, 2, 3, $userdata);
                                $this->call->view('edit_profile', $data);
                        }
                }
                else{
                        redirect('auth/login');
                        exit();
                }
        }

        public function update_profile(){
                if($this->auth_model->is_loggedin()){
                        if($this->session->userdata('usertype') === 0){
                                redirect('admin/');
                                exit();
                        }
                        else if($this->session->userdata('usertype') === 2){
                                redirect('staff/');
                                exit();
                        }
                        else{
                                if ($this->form_validation->submitted())
                                {
                                        $this->form_validation
                                        ->name('fullname')->required();
                            
                                        if ($this->form_validation->run()){
                                                if($_FILES['fileToUpload']['name'] == '')
                                                {
                                                        $id = $this->io->post('id');
                                                        if($this->user_model->update_info($id, $this->io->post('fullname'), $this->io->post('cnumber'), $this->io->post('address'), $this->io->post('notification'), $this->io->post('photo'))) 
                                                        {
                                                                $this->session->set_flashdata(array('success' => 'Your information was successfully updated!'));
                                                                redirect('home/edit_profile');
                                                                exit();
                                                        }
                                                        else{
                                                                $this->session->set_flashdata(array('success' => 'No Changes made!'));
                                                                redirect('home/edit_profile');
                                                                exit();
                                                        }
                                                }
                                                else
                                                {
                                                        $upresult = $this->user_model->upload();
                                                        $id = $this->io->post('id');

                                                        if($this->user_model->update_info($id, $this->io->post('fullname'), $this->io->post('cnumber'), $this->io->post('address'), $this->io->post('notification'), $upresult)) 
                                                        {
                                                                $this->session->set_flashdata(array('success' => 'Your information was successfully updated!'));
                                                                redirect('home/edit_profile');
                                                                exit();
                                                        }
                                                        else{
                                                                $this->session->set_flashdata(array('success' => 'No Changes made!'));
                                                                redirect('home/edit_profile');
                                                                exit();
                                                        }
                                                }
                                        }
                                }
                                redirect('home/edit_profile');
                        }
                }
                else{
                        redirect('auth/login');
                        exit();
                }
        }

        public function change_password(){
                if($this->auth_model->is_loggedin()){
                        if($this->session->userdata('usertype') === 0){
                                redirect('admin/');
                                exit();
                        }
                        else if($this->session->userdata('usertype') === 2){
                                redirect('staff/');
                                exit();
                        }
                        else{
                                if ($this->form_validation->submitted())
                                {
                                        $this->form_validation
                                        ->name('oldpass')->required()
                                        ->name('confirmpass')->required()
                                        ->min_length(9, 'Password must be at least 9 characters long!')
                                        ->name('newpass')->required()
                                        ->min_length(9, 'Password must be at least 9 characters long!');
                            
                                        if ($this->form_validation->run()){
                                                $id = $this->io->post('id');
                                                if($this->user_model->change_password($id, $this->io->post('oldpass'), $this->io->post('newpass'), $this->io->post('confirmpass'))) 
                                                {
                                                        $this->session->set_flashdata(array('success' => 'Your password was successfully updated!'));
                                                        redirect('home/edit_profile');
                                                        exit();
                                                }  
                                                else{
                                                        redirect('home/edit_profile');
                                                }
                                        }
                                        else {
                                                $this->session->set_flashdata(array('error' => validation_errors()));
                                                redirect('auth/register');
                                                exit();
                                        }
                                }
                        }
                }
        }

        public function get_ann(){
                
                $annID = $this->io->post('annid');
                $data = $this->home_model->get_ann_single($annID);

                if(!empty($data)){
                        echo 
                        '       <h5 class="text-center"><b>'.$data['title'].'</b></h5>
                                    <br> 
                                    <div class="container p-3 border">
                                    <h6 class="text-left">'.$data['content'].'</h6>
                                </div>
                        ';    
                }
                else{
                        echo 'Error retrieving data';
                }
                
        }

        public function get_barangay_data() {
                $bid = $this->io->post('bid');
                $data['record'] = $this->home_model->get_barangay_data($bid);

                if(!empty($data)){
                    $this->call->view('includes/clustering_modal', $data);
                }
                else{
                        echo 'Error retrieving data';
                }
        }

        public function get_event(){
                $eID = $this->io->post('eid');
                $data = $this->home_model->get_event_single($eID);

                if(!empty($data)){
                        echo 
                        '<div class="modal-header">
                                <h5 class="modal-title"><b>'.$data['title'].'</b></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">      
                                <div class="row">
                                        <div class="col-md-8">
                                            <img class="modal-content" style="width: 100%; height: auto;" src="'. BASE_URL . PUBLIC_DIR . '/images/' . $data['photo'].'">     
                                        </div>
                                        <div class="col-md-4">
                                                <header class="container p-3 border" style="color: white; background-color: teal; font-size: 14px;"><b>EVENT DETAILS <i class="fa fa-info-circle"></i></b></header>
                                                <div class="container p-3 border">
                                                        <h6 style="font-size: 13px;"><i class="fa fa-calendar"></i> '.date('M d', strtotime($data['start_datetime'])).' - '.date('M d Y', strtotime($data['end_datetime'])).'</h6>
                                                        <hr>
                                                        <p style="font-size: 12px;">'.$data['details'].'</p>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        ';    
                }
                else{
                        echo 'Error retrieving data';
                }
        }

        public function search($title){
                
                if (!isset ($_GET['page']) ) {  $page = 1;  } else {  $page = $_GET['page']; }
                $records_per_page = 5;
                $offset = ($page - 1) * $records_per_page;
                
                
                $hinfodata = $this->db->table('rhuposts')->where('category = ? OR category = ?', [3, 4])->where('status', 'publish')->like('title', '%'.$title.'%')->limit($offset, $records_per_page)->order_by('id', 'ASC')->get_all();
                $count = $this->db->table('rhuposts')->select_count('id', 'count')->where('category = ? OR category = ?', [3, 4])->where('status', 'publish')->like('title', '%'.$title.'%')->get_all()[0];
                $this->pagination->initialize($count['count'], $records_per_page, $page, 'home/news');

                $linkpage = $this->pagination->paginate();
                $events = $this->home_model->get_events(); //[4]
                $newsdata = $this->home_model->get_news(); //[0]
                $sidebar = $this->home_model->get_announcement(); //[2]
                $x = 1; //[3]
                if($this->auth_model->is_loggedin()){
                       
                        $userdata = $this->home_model->get_data(); //[3]
                        $data = array($hinfodata, $newsdata, $sidebar, $userdata, $linkpage, $events, $title);

                        if($this->session->userdata('usertype') === 0){
                                redirect('admin/');
                                exit();
                        }
                        else if($this->session->userdata('usertype') === 2){
                                redirect('staff/');
                                exit();
                        }
                        else{
                                if($count['count'] > 0){
                                        $this->session->set_flashdata(array('success' => 'We found article/s with the keyword: '.$title));
                                }
                                else{
                                        $this->session->set_flashdata(array('error' => 'No article/s were found with the keyword: '.$title));
                                }
                                $this->call->view('cluster_article', $data);
                        }
                } else {
                        
                        $this->session->set_flashdata(array('success' => 'We found article/s with the keyword: '.$title));
                        $data = array($hinfodata, $newsdata, $sidebar, $x, $linkpage, $events, $title);
                        $this->call->view('cluster_article', $data);
                        exit();
                }
        }

        public function search_article(){
                $title = $this->io->post('title');
                $category = $this->io->post('category');
                if (!isset ($_GET['page']) ) {  $page = 1;  } else {  $page = $_GET['page']; }
                $records_per_page = 5;
                $offset = ($page - 1) * $records_per_page;
                
                
                $hinfodata = $this->db->table('rhuposts')->where('category', $category)->where('status', 'publish')->like('title', '%'.$title.'%')->limit($offset, $records_per_page)->order_by('id', 'ASC')->get_all();
                $count = $this->db->table('rhuposts')->select_count('id', 'count')->where('category', $category)->where('status', 'publish')->like('title', '%'.$title.'%')->get_all()[0];
                $this->pagination->initialize($count['count'], $records_per_page, $page, 'home/news');

                $linkpage = $this->pagination->paginate();
                $events = $this->home_model->get_events(); //[4]
                $newsdata = $this->home_model->get_news(); //[0]
                $sidebar = $this->home_model->get_announcement(); //[2]
                $x = 1; //[3]
                if($this->auth_model->is_loggedin()){
                       
                        $userdata = $this->home_model->get_data(); //[3]
                        $data = array($hinfodata, $newsdata, $sidebar, $userdata, $linkpage, $events, $title, $category);

                        if($this->session->userdata('usertype') === 0){
                                redirect('admin/');
                                exit();
                        }
                        else if($this->session->userdata('usertype') === 2){
                                redirect('staff/');
                                exit();
                        }
                        else{
                                if(!empty($hinfodata)){
                                        $this->session->set_flashdata(array('success' => 'We found article/s with the keyword: '.$title));
                                }
                                else{
                                        $this->session->set_flashdata(array('error' => 'No article/s were found with the keyword: '.$title));
                                }
                                $this->call->view('read_article', $data);
                        }
                } else {
                        if(!empty($hinfodata)){
                                $this->session->set_flashdata(array('success' => 'We found article/s with the keyword: '.$title));
                        }
                        else{
                                $this->session->set_flashdata(array('error' => 'No article/s were found with the keyword: '.$title));
                        }
                        $data = array($hinfodata, $newsdata, $sidebar, $x, $linkpage, $events, $title, $category);
                        $this->call->view('read_article', $data);
                        exit();
                }
        }

        public function search_cluster(){
                $title = $this->io->post('title');
                if (!isset ($_GET['page']) ) {  $page = 1;  } else {  $page = $_GET['page']; }
                $records_per_page = 5;
                $offset = ($page - 1) * $records_per_page;
                
                
                $hinfodata = $this->db->table('rhuposts')->where('category = ? OR category = ?', [3, 4])->where('status', 'publish')->like('title', '%'.$title.'%')->limit($offset, $records_per_page)->order_by('id', 'ASC')->get_all();
                $count = $this->db->table('rhuposts')->select_count('id', 'count')->where('category = ? OR category = ?', [3, 4])->where('status', 'publish')->like('title', '%'.$title.'%')->get_all()[0];
                $this->pagination->initialize($count['count'], $records_per_page, $page, 'home/news');

                $linkpage = $this->pagination->paginate();
                $events = $this->home_model->get_events(); //[4]
                $newsdata = $this->home_model->get_news(); //[0]
                $sidebar = $this->home_model->get_announcement(); //[2]
                $x = 1; //[3]
                if($this->auth_model->is_loggedin()){
                       
                        $userdata = $this->home_model->get_data(); //[3]
                        $data = array($hinfodata, $newsdata, $sidebar, $userdata, $linkpage, $events, $title);

                        if($this->session->userdata('usertype') === 0){
                                redirect('admin/');
                                exit();
                        }
                        else if($this->session->userdata('usertype') === 2){
                                redirect('staff/');
                                exit();
                        }
                        else{
                                if($count['count'] > 0){
                                        $this->session->set_flashdata(array('success' => 'We found article/s with the keyword: '.$title));
                                }
                                else{
                                        $this->session->set_flashdata(array('error' => 'No article/s were found with the keyword: '.$title));
                                }
                                $this->call->view('cluster_article', $data);
                        }
                } else {
                        
                        $this->session->set_flashdata(array('success' => 'We found article/s with the keyword: '.$title));
                        $data = array($hinfodata, $newsdata, $sidebar, $x, $linkpage, $events, $title);
                        $this->call->view('cluster_article', $data);
                        exit();
                }
        }
        
        public function logout(){
                $this->session->unset_userdata(array('loggedin', 'email', 'usertype'));
                $this->session->sess_destroy();
                redirect('home');
        }

        
        
}
?>