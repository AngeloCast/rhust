<?php

use FontLib\Table\Type\name;

defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class DoPDF extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->call->helper(array('form', 'alert'));
    }

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
    // 
    public function generate_patientrecord($pID)
    {
        if($this->check()){
            $this->call->library('pdf');
            $filename = "RHUST Patient Record PDF";
            
            $pdata = $this->patient_model->getpatientrecord($pID);

            // var_dump($data);
            $logo_imagePath = BASE_URL . PUBLIC_DIR . '/images/MHOST_logo.jpg';
            $mho_logo = base64_encode(file_get_contents($logo_imagePath));
            // $right_imagePath = BASE_URL . PUBLIC_DIR . '/right.png';
            // $right_imageSrc = base64_encode(file_get_contents($right_imagePath));
            
            $exist = 'public/images/signature/' . $pdata[0]['signature'];
            if(!file_exists($exist) or $pdata[0]['signature'] == NULL or $pdata[0]['signature'] == '') {
                $doc_e_signPath = BASE_URL . PUBLIC_DIR . '/images/signature/sample_signature.png';
                $signature = base64_encode(file_get_contents($doc_e_signPath));
            }
            else{
                $doc_e_signPath = BASE_URL .PUBLIC_DIR . '/images/signature/' . $pdata[0]['signature'];
                $signature = base64_encode(file_get_contents($doc_e_signPath));
            }
         
            // var_dump($imageSrc);

            //$output = '<table width="100%" cellspacing="5" cellpadding="5">';
            // $output .= '
            //<img src="data:image/png;base64,'.$imageSrc.'"></br>
            //<img src="data:image/png;base64,' . $right_imageSrc . '"  width="100" 
            //height="100" style="float: right"> -- right image

            $output = '
            <title>RHUST Patient Record</title>
            <div align="left" style="font-family: arial">
                <img src="data:image/png;base64,' . $mho_logo . '"  width="95" 
                height="95" style="float: left; margin-right: 20px;">
            
                <h3 style="font-size: 22px; margin-bottom:0px;"><u>MUNICIPAL HEALTH OFFICE</u></h3>
                <p style="margin-top:3px; margin-bottom:40px; font-size: 20px; font-family: Arial">San Teodoro, Oriental Mindoro</p>
            </div>
    		';

            $output .= '
            
            <h5 align="center" style=""><u>INDIVIDUAL TREATMENT RECORD (ITR)</u></h5>
            
                ';

            foreach ($pdata as $data) {
                $line = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                $line2 = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                $line3 = '&nbsp;&nbsp;&nbsp;';
                $line4 = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                $line5 = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                $line6 = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                if(empty($data['age'])){
                    $data['age'] = $line3;
                }
                if(empty($data['gender'])){
                    $data['gender'] = $line3;
                }
                if(empty($data['civil_status'])){
                    $data['civil_status'] = $line2;
                }
                if(empty($data['contact_person'])){
                    $data['contact_person'] = $line2;
                }
                if(empty($data['address'])){
                    $data['address'] = $line;
                }
                if(empty($data['cnumber'])){
                    $data['cnumber'] = $line2 . '' . $line2;
                }
                if(empty($data['health_insurance'])){
                    $data['health_insurance'] = $line2 . '' . $line2;
                }
                if(empty($data['religion'])){
                    $data['religion'] = $line2;
                }
                if(empty($data['blood_type'])){
                    $data['blood_type'] = $line2;
                }
                if(empty($data['chief_complaints'])){
                    $data['chief_complaints'] = $line . '' .$line;
                }
                if(empty($data['history_presentillness'])){
                    $data['history_presentillness'] = $line5.''.$line2.''.$line2;
                }
                if(empty($data['food_allergy'])){
                    $data['food_allergy'] = $line;
                }
                if(empty($data['medicine_allergy'])){
                    $data['medicine_allergy'] = $line4;
                }
                if(empty($data['age_months'])){
                    $data['age_months'] = $line2;
                }
                if(empty($data['visit_date'])){
                    $data['visit_date'] = $line2;
                }
                if(empty($data['visit_time'])){
                    $data['visit_time'] = $line2;
                }
                if(empty($data['hypertension_meds'])){
                    $data['hypertension_meds'] = $line6;
                }
                if(empty($data['diabetes_meds'])){
                    $data['diabetes_meds'] = $line6;
                }
                if(empty($data['bronchial_meds'])){
                    $data['bronchial_meds'] = $line2.''.$line2.''.$line2;
                }
                if(empty($data['last_attack '])){
                    $data['last_attack'] = $line2.''.$line2.''.$line2;
                }
                if(empty($data['other_hldse '])){
                    $data['other_hldse'] = $line2.''.$line2.''.$line2;
                }
                if(empty($data['operation '])){
                    $data['operation'] = $line2.''.$line2.''.$line2;
                }
                if(empty($data['bp'])){
                    $data['bp'] = $line3.''.$line3;
                }
                if(empty($data['heart_rate'])){
                    $data['heart_rate'] = $line3.''.$line3;
                }
                if(empty($data['respiratory_rate'])){
                    $data['respiratory_rate'] = $line3.''.$line3;
                }
                if(empty($data['temperature'])){
                    $data['temperature'] = $line3.''.$line3;
                }
                if(empty($data['weight'])){
                    $data['weight'] = $line3.''.$line3;
                }
                if(empty($data['height'])){
                    $data['height'] = $line3.''.$line3;
                }
                if(empty($data['physical_exam'])){
                    $data['physical_exam'] = $line6.''.$line5.''.$line2;
                }
                if(empty($data['assessment'])){
                    $data['assessment'] = $line6.''.$line5.''.$line2;
                }
                if(empty($data['management_plan'])){
                    $data['management_plan'] = $line6.''.$line5.''.$line2;
                }
                if(empty($data['service_provider'])){
                    $data['service_provider'] = $line2 .''. $line2;
                }

                $output .= '
                <div style="margin: 0px 20px 0px 40px; font-family: Arial">

                    <div class="row">
                        <h5 align="left" style="margin-bottom: 0px;">A. <u>Patient\'s Personal Profile:</u></h5>
                    </div>

                    <div class="row">
                        <p align="left" style="margin-top: 5px; margin-left: 16px;margin-bottom: 0px; font-size: 13px;"><b>Patient\'s Name:</b>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u style="font-weight: light;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        ' . $data['lastname']  . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        ' . $data['firstname']  . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        ' . $data['middlename'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>

                        </p>

                        <p align="left" style="margin-top: 0px;margin-bottom: 0px; margin-left: 190px; font-size: 13px; font-weight: bold;">
                            Last Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            First Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Middle Name
                        </p>
                    </div>

                    <div class="row">
                        <b align="left" style="margin: 0px 80px 0px 16px; font-size: 13px;">Age/Gender: </b>
                            <u style="font-size: 13px;">&nbsp;&nbsp;
                            ' . $data['age']  . ' / ' . $data['gender']  . '&nbsp;&nbsp;</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <b style="font-size: 13px;">Birthdate:</b> 
                            <u style="font-size: 13px;">&nbsp;&nbsp;'. date('d/m/Y', strtotime($data['birthday'])) . '&nbsp;&nbsp;</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <b style="font-size: 13px;">Civil Status:</b> &nbsp;&nbsp;
                            <u style="font-size: 13px;">&nbsp;&nbsp;' . $data['civil_status']  . '&nbsp;&nbsp;</u>
                    </div> 


                    <div class="row">
                        <b align="left" style="margin: 0px 0px 0px 16px; font-size: 13px;">
                            Parent/Guardian/Contact Person: 
                        </b>
                            <u style="font-size: 13px;">&nbsp;&nbsp;' . $data['contact_person']  . '&nbsp;&nbsp;</u>
                    </div>

                    <div class="row">
                        <b align="left" style="margin: 0px 0px 0px 16px; font-size: 13px;">
                            Address: 
                        </b>
                            <u style="font-size: 13px;">&nbsp;&nbsp;' . $data['address']  . '&nbsp;&nbsp;</u>
                    </div>

                    <div class="row">
                        <b align="left" style="margin: 0px 0px 0px 16px; font-size: 13px;">
                            Contact Number:
                        </b>
                            <u style="font-size: 13px;">&nbsp;&nbsp;' . $data['cnumber']  . '&nbsp;&nbsp;</u>
                        <b align="left" style="margin: 0px 0px 0px 16px; font-size: 13px;">
                            Health Insurance Membership:
                        </b>
                            <u style="font-size: 13px;">&nbsp;&nbsp;' . $data['health_insurance']  . '&nbsp;&nbsp;</u>
                    </div>

                    <div class="row">
                        <b align="left" style="margin: 0px 0px 0px 16px; font-size: 13px;">
                            Religion: 
                        </b>
                            <u style="font-size: 13px;">&nbsp;&nbsp;'. $data['religion']  .'&nbsp;&nbsp;</u>
                        <b align="left" style="margin: 0px 0px 0px 16px; font-size: 13px;">
                            Blood type: 
                        </b>
                            <u style="font-size: 13px;">&nbsp;&nbsp;' . $data['blood_type']  . '&nbsp;&nbsp;</u>
                    </div>
                    <br>

                    <div class="row">
                        <h5 align="left" style="margin-top: 0px;margin-bottom: 0px;">B. <u>Patient Case Summary:</u></h5>
                    </div>

                    <div class="row">
                        <b align="left" style="margin: 5px 0px 0px 16px; font-size: 13px;">
                            Date of visit: 
                        </b>
                            <u style="font-size: 13px;">&nbsp;&nbsp;'. date('d/m/Y', strtotime($data['visit_date'])) . '&nbsp;&nbsp;</u>
                        <b align="left" style="margin: 5px 0px 0px 30px; font-size: 13px;">
                            Age in months (if under 5 years old):
                        </b>
                            <u style="font-size: 13px;">&nbsp;&nbsp;'. $data['age_months'] .'&nbsp;&nbsp;</u>
                    </div>

                    <div class="row">
                        <b align="left" style="margin: 5px 0px 0px 16px; font-size: 13px;">
                            Time of visit: 
                        </b>
                            <u style="font-size: 13px;">&nbsp;&nbsp;'. date('h:i A', strtotime($data['visit_time']))  .'&nbsp;&nbsp;</u>
                    </div>

                    <div class="row">
                        <b align="left" style="margin: 5px 0px 0px 16px; font-size: 13px;">
                            ( ) Allergy to Food/s: 
                        </b>
                            <u style="font-size: 13px;">&nbsp;&nbsp;'. $data['food_allergy']  .'&nbsp;&nbsp;</u>
                    </div>

                    <div class="row">
                        <b align="left" style="margin: 5px 0px 0px 16px; font-size: 13px;">
                            ( ) Allergy to Medication/s:
                        </b>
                            <u style="font-size: 13px;">&nbsp;&nbsp;'. $data['medicine_allergy']  .'&nbsp;&nbsp;</u>
                    </div>

                    <br>

                    <div class="row">
                        <h5 align="left" style="margin-top: 0px;margin-bottom: 0px;">I. <u>Subjective Complaint/s:</u></h5>
                    </div>
                    
                    <div class="row">
                        <b align="left" style="margin: 0px 0px 0px 16px; font-size: 13px;">
                            Chief Complaint/s:
                        </b>
                            <u style="font-size: 13px;">&nbsp;&nbsp;'. $data['chief_complaints']  .'&nbsp;&nbsp;</u>
                    </div>

                    <div class="row">
                        <b align="left" style="margin: 0px 0px 0px 16px; font-size: 13px;">
                            History of Present Illness: 
                        </b>
                            <u style="font-size: 13px;">&nbsp;&nbsp;'. $data['history_presentillness']  .'&nbsp;&nbsp;</u>
                    </div>

                    <br>

                    <div class="row">
                        <b align="left" style="margin: 0px 0px 0px 16px; font-size: 13px;">
                            Pass Medical History:
                        </b>
                            <u style="font-size: 13px;">&nbsp;&nbsp;'. $data['history_presentillness']  .'&nbsp;&nbsp;</u>
                    </div>

                    <div class="row">
                        <b align="left" style="margin: 0px 0px 0px 16px; font-size: 13px;">
                            ( ) Hypertension meds: 
                        </b>
                            <u style="font-size: 13px;">&nbsp;&nbsp;'. $data['hypertension_meds']  .'&nbsp;&nbsp;</u>
                        
                    </div>

                    <div class="row">
                        <b align="left" style="margin: 0px 0px 0px 16px; font-size: 13px;">
                            ( ) Diabetes Mellitus meds: 
                        </b>
                            <u style="font-size: 13px;">&nbsp;&nbsp;'. $data['diabetes_meds']  .'&nbsp;&nbsp;</u>
                        
                    </div>

                    <div class="row">
                        <b align="left" style="margin: 0px 0px 0px 16px; font-size: 13px;">
                            ( ) Bronchial Asthma meds: 
                        </b>
                            <u style="font-size: 13px;">&nbsp;&nbsp;'. $data['bronchial_meds']  .'&nbsp;&nbsp;</u>
                        <b align="left" style="margin: 0px 0px 0px 16px; font-size: 13px;">
                            Last Attack:
                        </b>
                            <u style="font-size: 13px;">&nbsp;&nbsp;'. $data['last_attack']  .'&nbsp;&nbsp;</u>
                    </div>

                    <div class="row">
                        <b align="left" style="margin: 0px 0px 0px 16px; font-size: 13px;">
                            ( ) Other Heart/Lung Dse. 
                        </b>
                            <u style="font-size: 13px;">&nbsp;&nbsp;'. $data['other_hldse']  .'&nbsp;&nbsp;</u>
                        <b align="left" style="margin: 0px 0px 0px 16px; font-size: 13px;">
                            ( ) Operation:
                        </b>
                            <u style="font-size: 13px;">&nbsp;&nbsp;'. $data['operation']  .'&nbsp;&nbsp;</u>
                    </div>

                    <br>

                    <div class="row">
                        <h5 align="left" style="margin-top: 0px;margin-bottom: 0px;">II. <u>Objective Findings:</u></h5>
                    </div>

                    <div class="row">
                        <b align="left" style="margin: 0px 0px 0px 16px; font-size: 13px;">
                            Vital Signs: BP:
                        </b>
                            <u style="font-size: 13px;">&nbsp;&nbsp;'. $data['bp']  .'&nbsp;&nbsp;</u>

                        <b align="left" style="margin: 0px 0px 0px 16px; font-size: 13px;">
                            Heart Rate:
                        </b>
                            <u style="font-size: 13px;">&nbsp;&nbsp;'. $data['heart_rate']  .'&nbsp;&nbsp;</u>

                        <b align="left" style="margin: 0px 0px 0px 16px; font-size: 13px;">
                            Respiratory Rate:
                        </b>
                            <u style="font-size: 13px;">&nbsp;&nbsp;'. $data['respiratory_rate']  .'&nbsp;&nbsp;</u>
                    </div>

                    <div class="row">
                        <b align="left" style="margin: 0px 0px 0px 16px; font-size: 13px;">
                            Temperature:
                        </b>
                            <u style="font-size: 13px;">&nbsp;&nbsp;'. $data['temperature']  .'&nbsp;&nbsp;</u>

                        <b align="left" style="margin: 0px 0px 0px 16px; font-size: 13px;">
                            Weight:
                        </b>
                            <u style="font-size: 13px;">&nbsp;&nbsp;'. $data['weight']  .'&nbsp;&nbsp;</u>

                        <b align="left" style="margin: 0px 0px 0px 16px; font-size: 13px;">
                            Height
                        </b>
                            <u style="font-size: 13px;">&nbsp;&nbsp;'. $data['height']  .'&nbsp;&nbsp;</u>
                    </div>

                    <br>

                    <div class="row" style="margin: 0px 0px 0px 16px;font-size: 13px;">
                        <b align="left" style="font-size: 13px;">
                            Physical Examination:
                        </b>
                            <u style="font-size: 13px;">&nbsp;&nbsp;'. $data['physical_exam']  .'&nbsp;&nbsp;</u>
                    </div>

                    <br>

                    <div class="row">
                        <h5 align="left" style="margin-top: 0px;margin-bottom: 0px;">III. <u>Assessment/Classification:</u></h5>
                    </div>

                    
                    <div class="row" style="margin-left: 16px;">
                        <u style="font-size: 13px;">'. $data['assessment']  .'&nbsp;&nbsp;</u>
                    </div>
                    <br>


                    <div class="row">
                        <h5 align="left" style="margin-top: 0px;margin-bottom: 0px;">IV. <u>Plan of Management: (Treat/Refer/Health Educate)</u></h5>
                    </div>

                    
                    <div class="row" style="margin-left: 16px;">
                        <u style="font-size: 13px;">'. $data['management_plan']  .'&nbsp;&nbsp;</u>
                    </div>

                    <br><br><br><br>
                    <div style="position: absolute; bottom: 30px;right: 80;">
                        <img src="data:image/png;base64,' . $signature . '" width="100" height="100" style="">
                    </div>
                    <div style="position: absolute; bottom: 20px;right: 0;">
                        <h5 align="right" style="margin-top: 0px;margin-bottom: 0px;"><u style="font-weight: light; font-size: 14px;">'.$line2.$line2.$data['service_provider'].$line2.$line2.'</u></h5>
                        <h5 align="right" style="margin-top: 0px;margin-bottom: 0px; margin-right: 15px;">Name and Signature of Service Provider</h5>
                    </div>
                </div>';
            }

            // $userdata = $this->admin_model->get_data();
            // $inquirycount = $this->admin_model->get_inquiry_count();
            // $data = array($userdata, $inquirycount, $output);
            $this->pdf->create($output, $filename);

            // $this->call->view('admin/pdf', $data);

            // <img src="data:image/png;base64,' . $signature . '"  width="95" 
            //     height="95" style="position: absolute; right: 100px; bottom: 220px">
        }
        //$html = $this->call->view('test_pdf', $data, TRUE);
    }

    //public function generate_recordPDF($appid)
    // {   
        

    //     $pdata = $this->patient_model->get_pat_details();
    //     $data2 = $this->patient_model->get_my_app_details($appid);
    //     $data3 = $this->patient_model->get_med_details($appid);
    //     $data4 = $this->patient_model->get_disease_details($appid);
    //     $this->call->library('pdf');
    //     $filename = "Health Record PDF";
    //     //$data['name'] = 'Juan Sipag';

    //     // var_dump($data);
    //     $left_imagePath = BASE_URL . PUBLIC_DIR . '/left.png';
    //     $left_imageSrc = base64_encode(file_get_contents($left_imagePath));
    //     $right_imagePath = BASE_URL . PUBLIC_DIR . '/right.png';
    //     $right_imageSrc = base64_encode(file_get_contents($right_imagePath));
    //     // var_dump($imageSrc);

    //     //$output = '<table width="100%" cellspacing="5" cellpadding="5">';
    //     // $output .= '
    //     //<img src="data:image/png;base64,'.$imageSrc.'"></br>

    //     $output = '
        
    //     <title>Patient Record</title>
       
    //     <img src="data:image/png;base64,' . $left_imageSrc . '"  width="110" 
    //     height="110" style="float: left">
    //     <img src="data:image/png;base64,' . $right_imageSrc . '"  width="100" 
    //     height="100" style="float: right">

    //     <p  align="center">Republic of the Philippines 
    //     <br>Province of Oriental Mindoro
    //     <br>Municipality of Baco 

    //     </p>
       
    //     <h3 align="center">OFFICE OF THE MUNICIPAL HEALTH</h3>
        
    //  ';


    //     $output .= '
    //     <hr/>
    //     ';
    //     $output .= '
    //     <br/>
    //     <table border="0" cellpadding="5" cellspacing="0" width="100%">';
    //     foreach ($pdata as $data) {
    //         $output .= '
    //         <caption><b>Patient Details</b></caption>
    //         <tr>
    //             <td width="75%">
    //                 <p><b>Name : </b>' . $data['f_name']  . ' ' . $data['m_name'] . ' ' .  $data['l_name'] . ' ' . $data['suffix'] . '</p>
    //                 <p><b>Address : </b>' . $data['addressID'] . '</p>
    //                 <p><b>Contact Number : </b>' . $data['contactnum'] . '</p>
    //             </td>
    //         </tr>
    //         ';
    //     }

    //     $output .= '</table>';

    //     $output .= '<hr/>
       
    //     <table border="0" cellpadding="5" cellspacing="0" width="100%">';


    //     foreach ($data2 as $rec2) {
    //         $output .= '
    //         <caption><b>Appointment Details</b></caption>
    //             <tr>
    //                 <td width="75%">
    //                     <p><b>Appointment Number : </b>' . $rec2['appointment_num']  . '</p>
    //                     <p><b>Doctor Name : </b>' . $rec2['name'] . '</p>
    //                     <p><b>Appointment Day : </b>' . $rec2['day'] . '</p>
    //                     <p><b>Appointment Date : </b>' . $rec2['date'] . '</p>
    //                     <p><b>Reason for Appointment: </b>' . $rec2['reason'] . '</p>
    //                     <p><b>Doctor Comment: </b>' . $rec2['doc_comment'] . '</p>
    //                 </td>
    //             </tr>
    //             ';
    //     }

    //     $output .= '</table>';


    //     $output .= '<hr/>
       
    //     <table border="0" cellpadding="5" cellspacing="0" width="100%">';


    //     foreach ($data4 as $rec4) {
    //         $output .= '
    //         <caption><b>Diagnosis</b></caption>
    //             <tr>
    //                 <td width="75%">
    //                     <p><b>Disease Code : </b>' . $rec4['code']  . '</p>
    //                     <p><b>Disease Name : </b>' . $rec4['name'] . '</p>
                     
    //                 </td>
    //             </tr>
    //             ';
    //     }

    //     $output .= '</table>';



    //     $output .= '<hr/>
       
    //     <table border="0" cellpadding="5" cellspacing="0" width="100%">
    //     <caption><b>Medicine Dispense Details</b></caption>';


    //     foreach ($data3 as $rec3) {
    //         $output .= '
          
    //             <tr>
    //                 <td width="75%">
    //                     <p><b>Medicine Name : </b>' . $rec3['name']  . '</p>
    //                     <p><b>Medicine Purpose : </b>' . $rec3['purpose'] . '</p>
    //                     <p><b>Medicine Quantity : </b>' . $rec3['medQuantity'] . '</p>
    //                 </td>
    //             </tr>
    //             ';
    //     }

    //     $output .= '</table>';

    //     $this->pdf->create($output, $filename);

    //     //$html = $this->call->view('test_pdf', $data, TRUE);


    // }

}
