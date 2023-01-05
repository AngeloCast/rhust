<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');


class Admin extends Controller {

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
                        if($this->session->userdata('usertype') === 0){
                                $this->call->view('admin/home', $data);
                                exit();
                        }
                        else if($this->session->userdata('usertype') === 1){
                                redirect('home/');
                                exit();
                        }
                        else{
                                redirect('staff/');
                                exit();
                        }
                } else {
                        redirect('auth/login');
                        exit();
                }
        }

        public function check(){
                
                if($this->auth_model->is_loggedin()){
                        if($this->session->userdata('usertype') === 0){
                                return true;
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

        public function announcements(){
                if($this->check()){
                        $announcementdata = $this->posts_model->show_announcements();
                        $userdata = $this->admin_model->get_data();
                        $inquirycount = $this->admin_model->get_inquiry_count();
                        $data = array($userdata, $inquirycount, $announcementdata);

                        $this->call->view('admin/announcements', $data);
                }
        }

        public function events(){
                if($this->check()){
                        $eventdata = $this->db->table('tblevents')->get_all();
                        $userdata = $this->admin_model->get_data();
                        $inquirycount = $this->admin_model->get_inquiry_count();
                        $data = array($userdata, $inquirycount, $eventdata);

                        $this->call->view('admin/events', $data);
                }
        }

        public function news_activities(){
                if($this->check()){
                        $newsactdata = $this->posts_model->show_newsacts();
                        $userdata = $this->admin_model->get_data();
                        $inquirycount = $this->admin_model->get_inquiry_count();
                        $data = array($userdata, $inquirycount, $newsactdata);

                        $this->call->view('admin/news_activities', $data);
                }
        }

        public function health_faqs(){
                if($this->check()){
                        $faqsdata = $this->posts_model->show_faqs();
                        $userdata = $this->admin_model->get_data();
                        $inquirycount = $this->admin_model->get_inquiry_count();
                        $data = array($userdata, $inquirycount, $faqsdata);

                        $this->call->view('admin/health_faqs', $data);
                }
        }

        public function health_info(){
                if($this->check()){
                        $infodata = $this->posts_model->show_healthinfo();
                        $userdata = $this->admin_model->get_data();
                        $inquirycount = $this->admin_model->get_inquiry_count();
                        $data = array($userdata, $inquirycount, $infodata);

                        $this->call->view('admin/health_info', $data);
                }
        }

        public function users(){
                if($this->check()){
                        $usersdata = $this->user_model->show_user();
                        $userdata = $this->admin_model->get_data();
                        $inquirycount = $this->admin_model->get_inquiry_count();
                        $data = array($userdata, $inquirycount, $usersdata);
                        if ($this->form_validation->submitted())
                        {
                                $this->form_validation
                                ->name('username')->required()
                                ->min_length(5)
                                ->max_length(15)
                                ->name('password')->required()
                                ->name('email')->required()
                                ->valid_email();
                                

                                if ($this->form_validation->run()){
                                $upresult = $this->user_model->upload();
                                        if ($upresult) {
                                                if($this->user_model->insert_user($this->io->post('username'), $this->io->post('password'), $this->io->post('email'), $this->io->post('firstname'), $this->io->post('lastname'), $this->io->post('birthday'), $this->io->post('usertype'), $this->io->post('address'), $this->io->post('gender'), $this->io->post('contact'), $upresult)) 
                                                {
                                                        $this->session->set_flashdata(array('success' => 'User was successfully added!'));
                                                        redirect('admin/users');
                                                        exit();
                                                }
                                        }
                                        else{
                                                redirect('admin/users');
                                                exit();
                                        }
                                }
                        }
                        else
                        {
                                $this->call->view('admin/users', $data);
                        }
                }
        }

        public function staff(){
                if($this->check()){
                        $staffdata = $this->staff_model->show_staff();
                        $userdata = $this->admin_model->get_data();
                        $inquirycount = $this->admin_model->get_inquiry_count();
                        $data = array($userdata, $inquirycount, $staffdata);

                        $this->call->view('admin/staff', $data);
                }
        }

        public function inquiry(){
                if($this->check()){
                        $inqdata = $this->inquiry_model->show_inquiry();
                        $userdata = $this->admin_model->get_data();
                        $inquirycount = $this->admin_model->get_inquiry_count();
                        $data = array($userdata, $inquirycount, $inqdata);

                        $this->call->view('admin/inquiry', $data);
                }
        }



        ///////////////////////////// C  R  U  D /////////////////////////////////////

        public function insert_staff(){
                if($this->check()){
                        if ($this->form_validation->submitted())
                        {
                                $this->form_validation
                                ->name('email')->required()
                                ->valid_email('Please input a valid email address')
                                ->name('password')->required()
                                ->min_length(9, 'Password must be at least 9 characters long!');

                                if ($this->form_validation->run()){
                                        $upresult = $this->staff_model->upload();
                                        if ($upresult) {
                                                if($this->staff_model->insert_staff($this->io->post('fullname'), $this->io->post('password'), $this->io->post('position'), $this->io->post('birthday'), $this->io->post('gender'), $this->io->post('email'), $this->io->post('cnumber'), $this->io->post('address'), $upresult)) 
                                                {
                                                        $this->session->set_flashdata(array('success' => 'Staff was successfully added!'));
                                                        redirect('admin/staff');
                                                        exit();
                                                }
                                                else{
                                                        redirect('admin/staff');
                                                        exit();
                                                }
                                        }
                                        else{
                                                redirect('admin/staff');
                                                exit();
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
        ///////////////// EVENTS CRUD ///////////////////

        public function save_event(){
                if($this->check()){
                        if ($this->form_validation->submitted())
                        {
                                $this->form_validation
                                ->name('title')->required();
                                    
                                if ($this->form_validation->run()){
                                        $upresult = $this->event_model->upload();
                                        if ($upresult) {
                                                if($this->event_model->insert_event($this->io->post('title'), $this->io->post('details'), $this->io->post('start_datetime'), $this->io->post('end_datetime'), $upresult))
                                                {
                                                        $this->session->set_flashdata(array('success' => 'Event was successfully added!'));
                                                        redirect('admin/events');
                                                        exit();
                                                }
                                                else
                                                {
                                                        $this->session->set_flashdata(array('error' => 'ERROR! Your event was not added!'));
                                                        redirect('admin/events');
                                                        exit();
                                                }
                                        }
                                        else{
                                                redirect('admin/events');
                                                exit();
                                        }
                                }
                        }
                        else{
                                redirect('admin/events');
                        }
                        
                }
        }

        public function delete_event($id){
                if($this->check()){
                        $check = $this->posts_model->get_single_data($id);
                        if($this->event_model->delete_post($id))
                        {
                                $this->session->set_flashdata(array('success' => 'Event was successfully deleted!'));
                                redirect('admin/events');
                                exit();
                        }
                        else{
                                $this->session->set_flashdata(array('error' => 'ERROR! Your event was not deleted!'));
                                redirect('admin/events');
                                exit();
                        }
                }
        }

        public function edit_event($id){
                if($this->check()){
                        $eventdata = $this->event_model->get_single_data($id);
                        $userdata = $this->admin_model->get_data();
                        $inquirycount = $this->admin_model->get_inquiry_count();
                        $data = array($userdata, $inquirycount, $eventdata);
                        $this->call->view('admin/edit_event', $data);
                }
        }

        public function update_event(){
                if($this->check()){
                        if ($this->form_validation->submitted())
                        {
                                $this->form_validation
                                ->name('title')->required();

                                if ($this->form_validation->run()){
                                        if($_FILES['fileToUpload']['name'] == '')
                                        {
                                                $id = $this->io->post('id');
                                                if($this->event_model->update_event($id, $this->io->post('title'), $this->io->post('details'), $this->io->post('start_datetime'), $this->io->post('end_datetime'), $this->io->post('photo')))
                                                {

                                                        $this->session->set_flashdata(array('success' => 'Event was successfully updated!'));
                                                        redirect('admin/edit_event/' . $id);
                                                        exit();
                                                }
                                                else{
                                                        $this->session->set_flashdata(array('success' => 'No Changes made!'));
                                                        redirect('admin/edit_event/' . $id);
                                                        exit();
                                                }
                                                        
                                        }
                                        else{
                                                $upresult = $this->posts_model->upload();
                                                $id = $this->io->post('id');

                                                if($upresult){
                                                        if($this->event_model->update_event($id, $this->io->post('title'), $this->io->post('details'), $this->io->post('start_datetime'), $this->io->post('end_datetime'), $upresult))
                                                        {
                                                                $this->session->set_flashdata(array('success' => 'Event was successfully updated!'));
                                                                redirect('admin/edit_event/' . $id);
                                                                exit();
                                                        }
                                                }
                                                else{
                                                        
                                                        redirect('admin/edit_event/' . $id);
                                                        exit();
                                                }
                                        }
                                }
                        }
                }
        }

        ///////////////// POST CRUD ///////////////////


        public function new_post($category){
                if($this->check()){
                        $userdata = $this->admin_model->get_data();
                        $inquirycount = $this->admin_model->get_inquiry_count();
                        $data = array($userdata, $inquirycount, $category);
                        $this->call->view('admin/create_post', $data);
                }
        }

        public function post(){
                if($this->check())
                {
                        if(isset($_POST['draft']))
                        {
                                if ($this->form_validation->submitted())
                                {
                                        $this->form_validation
                                        ->name('title')->required();
                                    
                                        if ($this->form_validation->run()){
                                                $category = $this->io->post('category');
                                                if($category == 1){
                                                        $upresult = 'rhubanner.jpg';
                                                }
                                                else{
                                                        $upresult = $this->posts_model->upload();
                                                }
                                                $status = 'draft';
                                                $catinput = '';
                                                if ($upresult) {
                                                        if($this->posts_model->insert_post($upresult, $category, $this->io->post('title'), $this->io->post('content'), $status, $this->io->post('userid'))) 
                                                        {
                                                                if($category == 1){
                                                                        $this->session->set_flashdata(array('success' => 'Announcement draft was successfully saved!'));
                                                                        redirect('admin/announcements');
                                                                        exit();
                                                                }
                                                                else if($category == 2){
                                                                        $this->session->set_flashdata(array('success' => 'News and Activities draft was successfully saved!'));
                                                                        redirect('admin/news_activities');
                                                                        exit();
                                                                }
                                                                else if($category == 3){
                                                                        $this->session->set_flashdata(array('success' => 'Health FAQ draft was successfully saved!'));
                                                                        redirect('admin/health_faqs');
                                                                        exit();
                                                                }
                                                                else{
                                                                        $this->session->set_flashdata(array('success' => 'Health Information draft was successfully saved!'));
                                                                        redirect('admin/health_info');
                                                                        exit();
                                                                }
                                                        }
                                                        else{
                                                                redirect('admin/health_info');
                                                                exit();
                                                        }
                                                }
                                                else{
                                                        if($category = 1) { $catinput = 'announcement'; }
                                                        elseif($category = 2) { $catinput = 'news_activities'; }
                                                        elseif($category = 2) { $catinput = 'health_faqs'; }
                                                        else { $catinput = 'health_info'; }
                                                        redirect('admin/new_post/'.$catinput);
                                                        exit();
                                                }
                                        }
                                }
                        }
                        else if(isset($_POST['publish']))
                        {
                                if ($this->form_validation->submitted())
                                {
                                        $this->form_validation
                                        ->name('title')->required();
                                    
                                        if ($this->form_validation->run()){
                                                $category = $this->io->post('category');
                                                if($category == 1){
                                                        $upresult = 'rhubanner.jpg';
                                                }
                                                else{
                                                        $upresult = $this->posts_model->upload();
                                                }
                                                $status = 'publish';
                                                $catinput = '';
                                                if ($upresult) {
                                                        if($this->posts_model->insert_post($upresult, $category, $this->io->post('title'), $this->io->post('content'), $status, $this->io->post('userid'))) 
                                                        {
                                                                if($category == 1){
                                                                        $this->session->set_flashdata(array('success' => 'Announcement was successfully published!'));
                                                                        redirect('admin/announcements');
                                                                        exit();
                                                                }
                                                                else if($category == 2){
                                                                        $this->session->set_flashdata(array('success' => 'News and Activities was successfully published!'));
                                                                        redirect('admin/news_activities');
                                                                        exit();
                                                                }
                                                                else if($category == 3){
                                                                        $this->session->set_flashdata(array('success' => 'Health FAQ was successfully published!'));
                                                                        redirect('admin/health_faqs');
                                                                        exit();
                                                                }
                                                                else{
                                                                        $this->session->set_flashdata(array('success' => 'Health Information was successfully published!'));
                                                                        redirect('admin/health_info');
                                                                        exit();
                                                                }
                                                        }
                                                }
                                                else{
                                                        if($category = 1) { $catinput = 'announcement'; }
                                                        elseif($category = 2) { $catinput = 'news_activities'; }
                                                        elseif($category = 2) { $catinput = 'health_faqs'; }
                                                        else { $catinput = 'health_info'; }
                                                        redirect('admin/new_post/'.$catinput);
                                                        exit();
                                                }
                                        }
                                }
                        }
                }
        }

        public function delete_post($id) {
                if($this->check()){
                        $check = $this->posts_model->get_single_data($id);
                        if($this->posts_model->delete_post($id))
                        {
                                if($check['category'] == 1){
                                        redirect('admin/announcements');
                                        exit();
                                }
                                else if($check['category'] == 2){
                                        redirect('admin/news_activities');
                                        exit();
                                }else if($check['category'] == 3){
                                        redirect('admin/health_faqs');
                                        exit();
                                }
                                else{
                                        redirect('admin/health_info');
                                        exit();
                                }
                        }
                }
        }

        public function edit_post($id) {
                if($this->check()){
                        $postdata = $this->posts_model->get_single_data($id);
                        $userdata = $this->admin_model->get_data();
                        $inquirycount = $this->admin_model->get_inquiry_count();
                        $gallery = $this->posts_model->get_gallery($id);
                        $data = array($userdata, $inquirycount, $postdata, $gallery);
                        $this->call->view('admin/edit_post', $data);
                } 
        }

        public function update_post(){
                if($this->check())
                {
                        if(isset($_POST['save'])){
                                if ($this->form_validation->submitted())
                                {
                                        $this->form_validation
                                        ->name('title')->required();

                                        if ($this->form_validation->run()){
                                                $category = $this->io->post('category');
                                                
                                                if($category == 1){
                                                        $id = $this->io->post('id');

                                                        if($this->posts_model->update_post($this->io->post('id'), $this->io->post('category'), $this->io->post('title'), $this->io->post('content'), $this->io->post('status'), $this->io->post('photo')))
                                                        {
                                                                $this->session->set_flashdata(array('success' => 'Announcement was successfully updated!'));
                                                                redirect('admin/edit_post/' . $id);
                                                                exit();
                                                        }
                                                        else{
                                                                $this->session->set_flashdata(array('success' => 'No Changes made!'));
                                                                redirect('admin/edit_post/' . $id);
                                                                exit();
                                                        }
                                                        
                                                }
                                                else if($_FILES['fileToUpload']['name'] == '')
                                                {
                                                        $photo = $this->io->post('photo');
                                                        $id = $this->io->post('id');
                                                        
                                                        if($this->posts_model->update_post($this->io->post('id'), $this->io->post('category'), $this->io->post('title'), $this->io->post('content'), $this->io->post('status'), $photo))
                                                        {
                                                                if($this->io->post('category') == 2){
                                                                        $this->session->set_flashdata(array('success' => 'News and Activities was successfully updated!'));
                                                                        redirect('admin/edit_post/' . $id);
                                                                        exit();
                                                                }
                                                                else if($this->io->post('category') == 3){
                                                                        $this->session->set_flashdata(array('success' => 'Health FAQ was successfully updated!'));
                                                                        redirect('admin/edit_post/' . $id);
                                                                        exit();
                                                                }
                                                                else{
                                                                        $this->session->set_flashdata(array('success' => 'Health Information was successfully updated!'));
                                                                        redirect('admin/edit_post/' . $id);
                                                                        exit();
                                                                }
                                                        }
                                                        else{
                                                                $this->session->set_flashdata(array('success' => 'No Changes made!'));
                                                                redirect('admin/edit_post/' . $id);
                                                                exit();
                                                        }
                                                        
                                                }
                                                else{
                                                        $upresult = $this->posts_model->upload();
                                                        $id = $this->io->post('id');

                                                        if($upresult){
                                                                if($this->posts_model->update_post($this->io->post('id'), $this->io->post('category'), $this->io->post('title'), $this->io->post('content'), $this->io->post('status'), $upresult))
                                                                {
                                                                        if($this->io->post('category') == 2){
                                                                                $this->session->set_flashdata(array('success' => 'News and Activities was successfully updated!'));
                                                                                redirect('admin/edit_post/' . $id);
                                                                                exit();
                                                                        }
                                                                        else if($this->io->post('category') == 3){
                                                                                $this->session->set_flashdata(array('success' => 'Health FAQ was successfully updated!'));
                                                                                redirect('admin/edit_post/' . $id);
                                                                                exit();
                                                                        }
                                                                        else{
                                                                                $this->session->set_flashdata(array('success' => 'Health Information was successfully updated!'));
                                                                                redirect('admin/edit_post/' . $id);
                                                                                exit();
                                                                        }
                                                                }
                                                        }
                                                }
                                                
                                        }

                                }
                                        
                        }
                        else if(isset($_POST['publish'])){

                                if ($this->form_validation->submitted())
                                {
                                        $this->form_validation
                                        ->name('title')->required();

                                        if ($this->form_validation->run()){
                                                $category = $this->io->post('category');
                                                
                                                if($category == 1){
                                                        $id = $this->io->post('id');
                                                        $status = 'publish';
                                                        if($this->posts_model->update_post($id, $category, $this->io->post('title'), $this->io->post('content'), $status, $this->io->post('photo')))
                                                        {
                                                                $this->session->set_flashdata(array('success' => 'Announcement was successfully published!'));
                                                                redirect('admin/edit_post/' . $id);
                                                                exit();
                                                        }
                                                }
                                                else if($_FILES['fileToUpload']['name'] == '')
                                                {
                                                        $id = $this->io->post('id');
                                                        $status = 'publish';
                                                        if($this->posts_model->update_post($this->io->post('id'), $this->io->post('category'), $this->io->post('title'), $this->io->post('content'), $status, $this->io->post('photo')))
                                                        {
                                                                if($this->io->post('category') == 2){
                                                                        $this->session->set_flashdata(array('success' => 'News and Activities was successfully published!'));
                                                                        redirect('admin/edit_post/' . $id);
                                                                        exit();
                                                                }
                                                                else if($this->io->post('category') == 3){
                                                                        $this->session->set_flashdata(array('success' => 'Health FAQ was successfully published!'));
                                                                        redirect('admin/edit_post/' . $id);
                                                                        exit();
                                                                }
                                                                else{
                                                                        $this->session->set_flashdata(array('success' => 'Health Information was successfully published!'));
                                                                        redirect('admin/edit_post/' . $id);
                                                                        exit();
                                                                }
                                                        }
                                                        else{
                                                                $this->session->set_flashdata(array('success' => 'No Changes made!'));
                                                                redirect('admin/edit_post/' . $id);
                                                                exit();
                                                        }
                                                        
                                                }
                                                else{
                                                        $upresult = $this->posts_model->upload();
                                                        $id = $this->io->post('id');
                                                        $status = 'publish';
                                                        if($upresult){
                                                                if($this->posts_model->update_post($this->io->post('id'), $this->io->post('category'), $this->io->post('title'), $this->io->post('content'), $status, $upresult))
                                                                {
                                                                        if($this->io->post('category') == 1)
                                                                        {
                                                                                $this->session->set_flashdata(array('success' => 'Announcement was successfully updated!'));
                                                                                redirect('admin/edit_post/' . $id);
                                                                                exit();
                                                                        }
                                                                        else if($this->io->post('category') == 2){
                                                                                $this->session->set_flashdata(array('success' => 'News and Activities was successfully updated!'));
                                                                                redirect('admin/edit_post/' . $id);
                                                                                exit();
                                                                        }
                                                                        else if($this->io->post('category') == 3){
                                                                                $this->session->set_flashdata(array('success' => 'Health FAQ was successfully updated!'));
                                                                                redirect('admin/edit_post/' . $id);
                                                                                exit();
                                                                        }
                                                                        else{
                                                                                $this->session->set_flashdata(array('success' => 'Health Information was successfully updated!'));
                                                                                redirect('admin/edit_post/' . $id);
                                                                                exit();
                                                                        }
                                                                }
                                                        }
                                                }
                                                
                                        }

                                }
                        }
                        
                }
        }

        public function add_gallery(){
                if($this->check())
                {
                        if ($this->form_validation->submitted())
                        {
                                if ($this->form_validation->run()){
                                        $post_id = $this->io->post('id');
                                        $upload = $this->posts_model->upload_gallery($post_id);

                                        if($upload){
                                                redirect('admin/edit_post/' . $post_id);
                                                exit();
                                        }
                                        else{
                                                redirect('admin/edit_post/' . $post_id);
                                                exit();
                                        }
                                }
                        }

                }
        }

        public function delete_gallery($g_id, $post_id){
                if($this->check()){
                        if($this->posts_model->deletegallery($g_id)){
                                $this->session->set_flashdata(array('success' => 'Image was successfully deleted!'));
                                redirect('admin/edit_post/' . $post_id);
                                exit();
                        }
                        else{
                                $this->session->set_flashdata(array('success' => 'An error occured! Image was not deleted!'));
                                redirect('admin/edit_post/' . $post_id);
                                exit();
                        }
                }
        }

        //////////////// USER CRUD /////////////////////////

        public function view_user($id){
                if($this->check()){
                        $user = $this->user_model->get_single_data($id);
                        $userdata = $this->admin_model->get_data();
                        $inquirycount = $this->admin_model->get_inquiry_count();
                        $data = array($userdata, $inquirycount, $user);
                        $this->call->view('admin/view_user', $data);
                }
        }

        public function delete_user($id){
                if($this->check()){
                        if($this->user_model->delete_user($id))
                        {
                                $this->session->set_flashdata(array('success' => 'User was successfully deleted!'));
                                redirect('admin/users');
                                exit();
                        }
                }
        }

        ///////////////// STAFF CRUD /////////////////////

        public function edit_staff($staff_id){
                if($this->check()){
                        $staffdata = $this->staff_model->get_single_data($staff_id);
                        $userdata = $this->admin_model->get_data();
                        $inquirycount = $this->admin_model->get_inquiry_count();
                        $data = array($userdata, $inquirycount, $staffdata);
                        $this->call->view('admin/edit_staff', $data);
                }
        }

        public function update_staff(){
                if($this->check()){
                        if ($this->form_validation->submitted())
                        {
                                $this->form_validation
                                ->name('fullname')->required();
                            
                                if ($this->form_validation->run()){
                                        if($_FILES['fileToUpload']['name'] == '')
                                        {
                                                $staffid = $this->io->post('staff_id');
                                                if($this->staff_model->update_data($this->io->post('staff_id'), $this->io->post('fullname'), $this->io->post('position'), $this->io->post('birthday'), $this->io->post('gender'), $this->io->post('cnumber'), $this->io->post('address'), $this->io->post('photo'))) 
                                                {
                                                        $this->session->set_flashdata(array('success' => 'User was successfully updated!'));
                                                        redirect('admin/edit_staff/' . $staffid);
                                                        exit();
                                                }
                                                else{
                                                        $this->session->set_flashdata(array('success' => 'No Changes made!'));
                                                        redirect('admin/edit_staff/' . $staffid);
                                                        exit();
                                                }
                                        }
                                        else{
                                                $upresult = $this->staff_model->upload();
                                                $staffid = $this->io->post('staff_id');
                                                if($upresult){
                                                        if($this->staff_model->update_data($this->io->post('staff_id'), $this->io->post('fullname'), $this->io->post('position'), $this->io->post('birthday'), $this->io->post('gender'), $this->io->post('cnumber'), $this->io->post('address'), $upresult)) 
                                                        {
                                                                $this->session->set_flashdata(array('success' => 'User was successfully updated!'));
                                                                redirect('admin/edit_staff/' . $staffid);
                                                                exit();
                                                        }
                                                        else{
                                                                redirect('admin/edit_staff/' . $staffid);
                                                                exit();
                                                        }
                                                }
                                        }
                                }
                        }
                }
        }

        public function delete_staff($id){
                if($this->check()){
                        if($this->staff_model->delete_staff($id))
                        {
                            redirect('admin/staff');
                            exit();
                        }
                }
        }
        //////////////////// INQUIRY CRUD /////////////////////////////

        public function view_inquiry($id){
                if($this->check()){
                        $inquiry = $this->inquiry_model->get_single_data($id);
                        $userdata = $this->admin_model->get_data();
                        $inquirycount = $this->admin_model->get_inquiry_count();
                        $data = array($userdata, $inquirycount, $inquiry);
                        $this->call->view('admin/inquiry_details', $data);
                }
        }

        public function delete_inquiry($id){
                if($this->check()){
                        if($this->inquiry_model->delete_inquiry($id))
                        {
                            redirect('admin/inquiry');
                            exit();
                        }
                }
        }

        /////////////////// ADMIN PROFILE /////////////////

        public function show_profile(){
                if($this->check()){
                        $userdata = $this->admin_model->get_data();
                        $inquirycount = $this->admin_model->get_inquiry_count();
                        $data = array($userdata, $inquirycount);
                        $this->call->view('admin/profile', $data);
                }
        }

        public function update_admin(){
                if($this->check()){
                        if ($this->form_validation->submitted())
                        {
                                $this->form_validation
                                ->name('fullname')->required();
                            
                                if ($this->form_validation->run()){
                                        if($_FILES['fileToUpload']['name'] == '')
                                        {
                                                if($this->admin_model->update_info($this->io->post('id'), $this->io->post('fullname'), $this->io->post('address'), $this->io->post('cnumber'), $this->io->post('photo'))) 
                                                {
                                                        $this->session->set_flashdata(array('success' => 'Successfully updated admin information!'));
                                                        redirect('admin/show_profile');
                                                        exit();
                                                }
                                                else{
                                                        $this->session->set_flashdata(array('success' => 'No Changes made!'));
                                                        redirect('admin/show_profile');
                                                        exit();
                                                }
                                        }
                                        else{
                                                $upresult = $this->admin_model->upload();
                                                $id = $this->io->post('id');
                                                if($upresult){
                                                        if($this->admin_model->update_info($this->io->post('id'), $this->io->post('fullname'), $this->io->post('address'), $this->io->post('cnumber'), $upresult)) 
                                                        {
                                                                $this->session->set_flashdata(array('success' => 'Successfully updated admin information!'));
                                                                redirect('admin/show_profile');
                                                                exit();
                                                        }
                                                        else{
                                                                redirect('admin/show_profile');
                                                                exit();
                                                        }
                                                }
                                        }
                                }
                        }
                }
        }

        public function admin_password(){
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
                                        if($this->admin_model->change_password($id, $this->io->post('oldpass'), $this->io->post('newpass'), $this->io->post('confirmpass')))
                                        {
                                                $this->session->set_flashdata(array('success' => 'Password successfully updated! Log in with your new credentials'));
                                                redirect('admin/relog');
                                                exit();
                                        }
                                        else{
                                                redirect('admin/show_profile');
                                                exit();
                                        }
                                }
                                else {
                                        $this->session->set_flashdata(array('error' => validation_errors()));
                                        redirect('admin/show_profile');
                                        exit();
                                }

                        }
                }
        }

        public function send_reply(){
                if($this->check()){
                        if ($this->form_validation->submitted())
                        {
                                $this->form_validation
                                ->name('message')->required('Email content is required!');
                                

                                if ($this->form_validation->run()){
                                        $id = $this->io->post('id');
                                        $email = $this->io->post('email');
                                        $subject = $this->io->post('subject');
                                        $content = $this->io->post('message');

                                        $this->send_email($email, $subject, $content);
                                        $this->session->set_flashdata(array('success' => 'Inquiry reply was successfully sent to ' . $email));
                                        redirect('admin/inquiry/'.$id);
                                }
                                else
                                {
                                        $this->session->set_flashdata(array('error' => validation_errors()));
                                        redirect('auth/register');
                                        exit();
                                }
                        }
                }
        }

        public function send_email($recipient, $subject, $content){
                $this->email->subject($subject);
                $this->email->sender('rhusanteodoro@gmail.com');
                $this->email->recipient($recipient);
                $this->email->email_content($content);
                $this->email->send();
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