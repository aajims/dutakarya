<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akses extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('mainmodel');
    }
    

	public function index()
	{
		if ( isset($_SESSION['users_id'])){
			$data['privilege'] = $this->mainmodel->getPrivilege();
			$this->load->view('akses_list',$data);
		}else{
			redirect(base_url());
		}
	}

	public function DelAkses($id){
		$this->db->query("delete from table_privilege where id ='$id'");
		redirect("Akses");
	}

	public function AddAkses(){
		$akses_email = $this->input->post("akses_email");
		$currdate = date("Y-m-d H:i:s");
		$this->db->query("insert into table_privilege (email,privilege,created_at)values('$akses_email','A','$currdate')");
		redirect("Akses");
	}
}
