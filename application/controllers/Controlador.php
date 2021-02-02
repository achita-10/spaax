<?php
class Controlador extends CI_Controller{
	public function __Construct(){
		parent::__construct();
	}
	public function index(){
		
		$this->load->helper('date');
		$datestring = "%Y-%m-%d";
		echo mdate($datestring);
	
	}
}