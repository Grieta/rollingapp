<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->has_userdata('iduser')!= null){
            redirect('/inicio');

        }

    }
    public function index()
    {

        $this->load->view('login');
    }
    public function logeo()
    {
        $datos = $this->input->post();
        $this->load->model('Usuario');

        $logeado = $this->Usuario->auth_login($datos['user'],$datos['pass']);
        //logear
    echo $logeado;
    }
}
