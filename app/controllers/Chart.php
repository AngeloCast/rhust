<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Chart extends Controller {


    public function bigaan_chart() {
        $barangay = 'Bigaan';
        $data['chart'] =  $this->home_model->barangayChart();
        $this->call->view('clustering', $data);
    }

    public function logout(){
        $this->session->unset_userdata(array('loggedin', 'email', 'usertype'));
        $this->session->sess_destroy();
        redirect('auth');
	}
}

?>