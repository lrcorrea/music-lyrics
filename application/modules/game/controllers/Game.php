<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Controller {
    public function index()
    {
        $this->load->view('game');
    }

    public function verify_word()
    {
    	if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}

    	$data = $this->input->post();

        $return = array(
            'status' => true,
            'word' => 'aaaa',
            'is_valid' => true
        );
        
        if(isset($data['res']) && $data['trecho'] == 1 && strtoupper($data['res']) == 'MALUQUEZ')
        {   
            $return = array(
                'status' => true,
                'word' => 'maluquez',
                'is_valid' => true
            );
        }
        elseif(isset($data['res']) && $data['trecho'] == 1 &&  strtoupper($data['res']) == 'LUCIDEZ')
        {
            $return = array(
                'status' => true,
                'word' => 'lucidez',
                'is_valid' => true
            );
        }
        elseif(isset($data['res']) && $data['trecho'] == 1 &&  (strtoupper($data['res']) == 'BELEZA' || strtoupper($data['res']) == 'BLZ'))
        {
            $return = array(
                'status' => true,
                'word' => 'beleza',
                'is_valid' => true
            );
        }


        if($return['status'])
        {
            $this->load->model('home/home_m');
            $this->home_m->updateParticipantRoom( $this->session->userdata('usuario_maluquinho'), $this->session->userdata('id_sala') );
        }

    	echo json_encode($return);
    }
}
