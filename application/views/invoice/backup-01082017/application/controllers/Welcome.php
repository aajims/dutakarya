<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('mainmodel');
    }

	public function index()
	{
		$this->load->view('welcome_message');
		$this->db->query("delete from table_slider_en where id_main not in ('4','3','2')");
	}
}
