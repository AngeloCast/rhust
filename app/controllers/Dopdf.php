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
            
            // $doc_e_signPath = BASE_URL . PUBLIC_DIR . '/doc_e_sign.webp';
            // $doc_e_signSrc = base64_encode(file_get_contents($doc_e_signPath));
         
            // var_dump($imageSrc);

            //$output = '<table width="100%" cellspacing="5" cellpadding="5">';
            // $output .= '
            //<img src="data:image/png;base64,'.$imageSrc.'"></br>
            //<img src="data:image/png;base64,' . $right_imageSrc . '"  width="100" 
            //height="100" style="float: right"> -- right image

            $output = '
            <title>RHUST Patient Record</title>
            <div align="left" style="">
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
                $line = '_______________________________________________________________';
                $line2 = '_______';
                $line3 = '___';
                $line4 = '__________________________________________________________';
                $line5 = '___________________________________________________________________________________';
                $line6 = '________________________________________________________';
                if(empty($data['age'])){
                    $data['age'] = $line3;
                }
                if(empty($data['gender'])){
                    $data['gender'] = $line3;
                }
                if(empty($data['civil_status'])){
                    $data['civil_status'] = $line2;
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
                    $data['chief_complaints'] = $line . '__';
                }
                if(empty($data['history_presentillness'])){
                    $data['history_presentillness'] = $line5 . '<br>' . $line5;
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
                    $data['visit_time'] = $line2 . '__';
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
                    $data['physical_exam'] = $line5 . '<br>' . $line5;
                }
                if(empty($data['assessment'])){
                    $data['assessment'] = $line5 . '<br>' . $line5;
                }
                if(empty($data['management_plan'])){
                    $data['management_plan'] = $line5 . '<br>' . $line5 . '<br>' .$line5 . '<br>' . $line5;
                }
                if(empty($data['service_provider'])){
                    $data['service_provider'] = $line2 . '____';
                }

                $output .= '
                <div style="margin-left: 80px; margin-right: 50px;">
                    <h5 align="left" style="margin-bottom: 0px;">A. <u>Patient\'s Personal Profile:</u></h5>
                    <p align="left" style="margin-top: 5px; margin-left: 16px;margin-bottom: 0px; font-size: 13px; font-weight: bold">Patient\'s Name:
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u style="font-weight: light;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    ' . $data['lastname']  . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    ' . $data['firstname']  . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    ' . $data['middlename'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>

                    </p>
                    <p align="left" style="margin-top: 0px;margin-bottom: 0px; margin-left: 190px; font-size: 13px; font-weight: bold">
                        Last Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        First Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Middle Name
                    </p>

                    <h5 align="left" style="margin-top: 0px;margin-bottom: 0px; margin-left: 16px;">

                        Age/Gender: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u style="font-weight: light">&nbsp;&nbsp;' . $data['age']  . ' / ' . $data['gender']  . '&nbsp;&nbsp;</u>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        Birthdate: <u style="font-weight: light;">&nbsp;&nbsp;'. date('d/m/Y', strtotime($data['birthday'])) . '&nbsp;&nbsp;</u>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        Civil Status: &nbsp;&nbsp;<u style="font-weight: light;">&nbsp;&nbsp;' . $data['civil_status']  . '&nbsp;&nbsp;</u>

                    </h5>

                    <h5 align="left" style="margin-top: 0px;margin-bottom: 0px; margin-left: 16px;">
                        Parent/Guardian/Contact Person: <u style="font-weight: light">&nbsp;&nbsp;Angelo M. Castillo&nbsp;&nbsp;</u>
                    </h5>

                    <h5 align="left" style="margin-top: 0px;margin-bottom: 0px; margin-left: 16px;">
                        Address: <u style="font-weight: light;">&nbsp;&nbsp;' . $data['address']  . '&nbsp;&nbsp;</u>
                    </h5>

                    <h5 align="left" style="margin-top: 0px;margin-bottom: 0px; margin-left: 16px;">
                        Contact Number: <u style="font-weight: light">&nbsp;&nbsp;' . $data['cnumber']  . '&nbsp;&nbsp;</u>
                        Health Insurance Membership: <u style="font-weight: light">&nbsp;&nbsp;' . $data['health_insurance']  . '&nbsp;&nbsp;</u>
                    </h5>

                    <h5 align="left" style="margin-top: 0px;margin-bottom: 10px; margin-left: 16px;">
                        Religion: <u style="font-weight: light">&nbsp;&nbsp;'. $data['religion']  .'&nbsp;&nbsp;</u>
                        Blood type: <u style="font-weight: light">&nbsp;&nbsp;' . $data['blood_type']  . '&nbsp;&nbsp;</u>
                    </h5>
                
                    <br>

                    <h5 align="left" style="margin-top: 0px;margin-bottom: 0px;">B. <u>Patient Case Summary:</u></h5>

                    <h5 align="left" style="margin-top: 5px;margin-bottom: 0px; margin-left: 16px;">

                        Date of visit: <u style="font-weight: light;">&nbsp;&nbsp;'. date('d/m/Y', strtotime($data['visit_date'])) . '&nbsp;&nbsp;</u>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        Age in months (if under 5 years old): <u style="font-weight: light">&nbsp;&nbsp;'. $data['age_months'] .'&nbsp;&nbsp;</u>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    </h5>

                    <h5 align="left" style="margin-top: 0px;margin-bottom: 0px; margin-left: 16px;">

                        Time of visit: <u style="font-weight: light;">&nbsp;&nbsp;'. $data['visit_time']  .'&nbsp;&nbsp;</u>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    </h5>

                    <h5 align="left" style="margin-top: 0px;margin-bottom: 0px; margin-left: 16px;">

                        ( ) Allergy to Food/s: <u style="font-weight: light;">&nbsp;&nbsp;'. $data['food_allergy']  .'&nbsp;&nbsp;</u>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    </h5>
                    <h5 align="left" style="margin-top: 0px;margin-bottom: 0px; margin-left: 16px;">

                        ( ) Allergy to Medication/s: <u style="font-weight: light;">&nbsp;&nbsp;'. $data['medicine_allergy']  .'&nbsp;&nbsp;</u>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        
                    </h5>

                    <br>

                    <h5 align="left" style="margin-top: 0px;margin-bottom: 0px;">I. <u>Subjective Complaint/s:</u></h5>

                    <h5 align="left" style="margin-top: 0px;margin-bottom: 0px; margin-left: 16px;">

                        Chief Complaint/s: <u style="font-weight: light;">&nbsp;&nbsp;'. $data['chief_complaints']  .'&nbsp;&nbsp;</u>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    </h5>
                    <h5 align="left" style="margin-top: 0px;margin-bottom: 0px; margin-left: 16px;">

                        History of Present Illness: <u style="font-weight: light;">
                        <br>
                        &nbsp;&nbsp;'. $data['history_presentillness']  .'&nbsp;&nbsp;</u>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    </h5>

                    <br>

                    <h5 align="left" style="margin-top: 0px;margin-bottom: 0px; margin-left: 16px;">
                        Pass Medical History:
                    </h5>
                    <h5 align="left" style="margin-top: 0px;margin-bottom: 0px; margin-left: 16px;">

                        ( ) Hypertension &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;meds: <u style="font-weight: light;">&nbsp;&nbsp;'. $data['hypertension_meds']  .'&nbsp;&nbsp;</u>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        
                    </h5>
                    <h5 align="left" style="margin-top: 0px;margin-bottom: 0px; margin-left: 16px;">

                        ( ) Diabetes Mellitus&nbsp;&nbsp;&nbsp;&nbsp;meds: <u style="font-weight: light;">&nbsp;&nbsp;'. $data['diabetes_meds'] .'&nbsp;&nbsp;</u>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        
                    </h5>
                    <h5 align="left" style="margin-top: 0px;margin-bottom: 0px; margin-left: 16px;">

                        ( ) Bronchial Asthma&nbsp;&nbsp; meds: <u style="font-weight: light;">&nbsp;&nbsp;'. $data['bronchial_meds'] .'&nbsp;&nbsp;</u>
                        Last Attack: <u style="font-weight: light;">&nbsp;&nbsp;'. $data['last_attack'] .'&nbsp;&nbsp;</u>
                        
                    </h5>
                    <h5 align="left" style="margin-top: 0px;margin-bottom: 0px; margin-left: 16px;">

                        ( ) Other Heart/Lung Dse. &nbsp;&nbsp;<u style="font-weight: light;">&nbsp;&nbsp;'. $data['other_hldse'] .'&nbsp;&nbsp;</u> 
                        ( ) Operation: <u style="font-weight: light;">&nbsp;&nbsp;'. $data['operation'] .'&nbsp;&nbsp;</u>
                        
                    </h5>

                    <br>

                    <h5 align="left" style="margin-top: 0px;margin-bottom: 0px;">II. <u>Objective Findings:</u></h5>

                    <h5 align="left" style="margin-top: 0px;margin-bottom: 0px; margin-left: 16px;">

                        Vital Signs: BP: <u style="font-weight: light;">&nbsp;&nbsp;'. $data['bp']  .'&nbsp;&nbsp;</u>mmhg
                            &nbsp;&nbsp;&nbsp;
                        Heart Rate: <u style="font-weight: light;">&nbsp;&nbsp;'. $data['heart_rate']  .'&nbsp;&nbsp;</u>bpm
                            &nbsp;&nbsp;&nbsp;
                        Respiratory Rate: <u style="font-weight: light;">&nbsp;&nbsp;'. $data['respiratory_rate']  .'&nbsp;&nbsp;</u>/min.
                            &nbsp;&nbsp;&nbsp;
                        <br>
                        Temperature: <u style="font-weight: light;">&nbsp;&nbsp;'. $data['temperature']  .'&nbsp;&nbsp;</u>°C
                            &nbsp;&nbsp;&nbsp;
                        Weight: <u style="font-weight: light;">&nbsp;&nbsp;'. $data['weight']  .'&nbsp;&nbsp;</u>Kg
                            &nbsp;&nbsp;&nbsp;
                        Height: <u style="font-weight: light;">&nbsp;&nbsp;'. $data['height']  .'&nbsp;&nbsp;</u>cm
                            &nbsp;&nbsp;&nbsp;
                    </h5>

                    <br>

                    <h5 align="left" style="margin-top: 0px;margin-bottom: 0px; margin-left: 16px;">

                        Physical Examination: <u style="font-weight: light;">&nbsp;&nbsp;'. $data['physical_exam']  .'&nbsp;&nbsp;</u>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    </h5>

                    <br>

                    <h5 align="left" style="margin-top: 0px;margin-bottom: 0px;">III. <u>Assessment/Classification:</u></h5>
                    <h5 align="left" style="margin-top: 0px;margin-bottom: 0px; margin-left: 16px;">

                        <u style="font-weight: light;">'. $data['assessment']  .'&nbsp;&nbsp;</u>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    </h5>

                    <br>

                    <h5 align="left" style="margin-top: 0px;margin-bottom: 0px;">IV. <u>Plan of Management: (Treat/Refer/Health Educate)</u></h5>
                    <h5 align="left" style="margin-top: 0px;margin-bottom: 0px; margin-left: 16px;">

                        <u style="font-weight: light;">'. $data['management_plan']  .'&nbsp;&nbsp;</u>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    </h5>

                    <br><br><br><br>

                    <h5 align="right" style="margin-top: 0px;margin-bottom: 0px;"><u style="font-weight: light; font-size: 14px;">_____________'. $data['service_provider']  .'_____________</u></h5>
                    <h5 align="right" style="margin-top: 0px;margin-bottom: 0px; margin-right: 15px;">Name and Signature of Service Provider</h5>
                ';
            }


            $this->pdf->create($output, $filename);
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
