<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professor extends CI_Controller {

    public function index()
    {
        $this->load->view('professor');
    }

    public function cadastrar()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('NOMEPROFESSOR', 'Nome', 'trim|required');
        $this->form_validation->set_rules('EMAILPROFESSOR', 'E-mail', 'trim|required');
        $this->form_validation->set_rules('SENHAPROFESSOR', 'Senha', 'trim|required');

        if ($this->form_validation->run() === TRUE){
            $this->load->model('professor_m');
            $this->professor_m->insert(array(
                'NOMEPROFESSOR' => $this->input->post('NOMEPROFESSOR'),
                'EMAILPROFESSOR' => $this->input->post('EMAILPROFESSOR'),
                'SENHAPROFESSOR' => '*'.md5($this->input->post('SENHAPROFESSOR')).'*'
            ));
        } else {
            $errors = array_values($this->form_validation->error_array());
            $response = array('status'=> false, 'classe'=> 'error','message' => $errors[0], 'redirect' => false);
            $this->output->set_output(json_encode($response));
        }
    }

    public function login()
    {
        $this->load->helper('cookie');
        if(get_cookie('notari_eh_deiz')){
            echo '<pre>';die(var_dump(get_cookie('notari_eh_deiz')));
        }

        $this->load->view('login');
    }

    public function entrar()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('EMAILPROFESSOR', 'E-mail', 'trim|required');
        $this->form_validation->set_rules('SENHAPROFESSOR', 'Senha', 'trim|required');

        if ($this->form_validation->run() === TRUE){
            $this->load->model('professor_m');

            $professor = $this->professor_m->get(array(
                'EMAILPROFESSOR' => $this->input->post('EMAILPROFESSOR'),
                'SENHAPROFESSOR' => '*'.md5($this->input->post('SENHAPROFESSOR')).'*'
            ));

            if(is_array($professor) && count($professor) > 0){
                $this->load->helper('cookie');
                set_cookie('notari_eh_deiz', serialize($professor), 18000, base_url(), '/');
            }

        } else {
            $errors = array_values($this->form_validation->error_array());
            $response = array('status'=> false, 'classe'=> 'error','message' => $errors[0], 'redirect' => false);
            $this->output->set_output(json_encode($response));
        }
    }

}
