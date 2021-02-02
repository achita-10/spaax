<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends MY_Controller{

    public function __construct(){
        parent::__construct();
        if(!$this->is_logged_in()){
            redirect(base_url());
        }else{
            
        }

    }
    public function index(){
        $data = new stdClass();
        
        $data->title = "Bienvenido | Sistema de Pago de Agua Automatizado de Xogapan";
        $data->contenido ='principal/index';
        $this->load->view('frontend',$data);
    }
}