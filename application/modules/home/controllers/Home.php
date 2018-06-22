<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function index()
    {
        $this->load->view('home');
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

    public function verifyPin()
    {
        if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
        }

        $lGamePin = $this->input->post('pin');
        $NomeUsuario = $this->input->post('name');
        if(!isset($lGamePin) || (isset($lGamePin) && empty($lGamePin)))
            echo json_encode(array('status' => false, 'message' => 'Game Pin inválido')); die();

        $this->load->model('home_m');
        $lSala = $this->home_m->get(array('GAMEPINSALA' => $lGamePin));

        if (!isset($lSala) || !is_array($lSala) || !count($lSala)) {
            $id = $this->home_m->insert(array('GAMEPINSALA' => $lGamePin));
        }else{
            $id = $lSala['IDSALA'];
        }

        $this->home_m->insertUser(array(
            'NOMEPARTICIPANTE' => $NomeUsuario,
            'IDSALA' => $id,
            'NROACERTOS' => 0
        ));

        echo json_encode(array('status' => true, 'message' => 'Game Pin válido')); die();
    }
}
