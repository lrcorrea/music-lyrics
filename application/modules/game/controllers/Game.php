<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Controller {
    public function index()
    {
        $this->load->view('game');
    }

    public function verify_word()
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
