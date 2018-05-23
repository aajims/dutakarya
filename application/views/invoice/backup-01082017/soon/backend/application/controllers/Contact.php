<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('mainmodel');
    }
    

	public function index()
	{
		if ( isset($_SESSION['users_id'])){
			$data['contact_list'] = $this->mainmodel->getContact();
			$this->load->view('contact_list',$data);
		}else{
			redirect("Login");
		}
	}

	public function Detail($id){
		if ( isset($_SESSION['users_id'])){
			$qry_get_contact_detail = $this->db->query("select * from table_contact where id ='$id'");
			$run_get_contact_detail = $qry_get_contact_detail->result();
			$data['contact_detail'] = $run_get_contact_detail;
			$this->load->view("contact_detail",$data);
		}else{
			redirect("Login");
		}
	}
}
