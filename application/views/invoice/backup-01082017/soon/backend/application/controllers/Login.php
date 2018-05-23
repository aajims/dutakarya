<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('url');
    }
    

	public function index()
	{
		if ( isset($_SESSION['users_id'])){
			redirect("Home");
		}else{
			$this->load->view('login');
		}
	}

	public function fail(){
		$this->load->view("fail");
	}
}
