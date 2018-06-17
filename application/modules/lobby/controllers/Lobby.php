<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lobby extends CI_Controller {
    public function index()
    {
        $this->load->view('lobby');
    }

    public function verify_pin()
    {
    	// var_dump('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'); exit;
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}

    	$data = $this->input->post();

    	$return = array(
    		'status' => true,
    		'is_valid' => true
    	);

    	echo json_encode($return);
    }
}
