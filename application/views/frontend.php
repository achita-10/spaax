<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('content_main/frontend/head');
$this->load->view('content_main/frontend/header');
$this->load->view('frontend/'.$contenido);
$this->load->view('content_main/frontend/modales');
$this->load->view('content_main/frontend/footer');
