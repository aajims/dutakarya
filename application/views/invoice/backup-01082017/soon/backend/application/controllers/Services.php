<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('mainmodel');
    }

	public function index(){
		if ( isset($_SESSION['users_id'])){
			$data['service'] = $this->mainmodel->getPromoServices();
			$this->load->view("services",$data);
		}else{
			redirect(base_url());
		}
	}

	public function AddPromoService(){
		if ( isset($_SESSION['users_id'])){
			$this->load->view("add_promo_service");
		}else{
			redirect(base_url());
		}
	}

	public function SaveServices(){
		if ( isset($_SESSION['users_id'])){
			$sections_title = $this->db->escape($this->input->post("sections_title"));
			$sections_title_en = $this->db->escape($this->input->post("sections_title_en"));
			$sections_description = $this->db->escape($this->input->post("sections_description"));
			$sections_description_en = $this->db->escape($this->input->post("sections_description_en"));
			$currdate = date("Y-m-d H:i:s");
			$this->db->query("insert into table_service(title,description,status,created_at)values($sections_title,$sections_description,'A','$currdate')");
			$qry_get_id_main = $this->db->query("select * from table_service where title = $sections_title");
			$run_get_id_main = $qry_get_id_main->result();
			$id_main = $run_get_id_main[0]->id;

			$this->db->query("insert into table_service_en(title,description,status,created_at,id_main)values($sections_title_en,$sections_description_en,'A','$currdate','$id_main')");
			redirect("Services");

		}else{
			redirect(base_url());
		}
	}

	public function SetStatus($idservice,$status){
		if ( isset($_SESSION['users_id'])){
			$this->db->query("update table_service set status ='$status' where id ='$idservice'");
			$this->db->query("update table_service_en set status ='$status' where id_main ='$idservice'");
			redirect("Services");
		}else{
			redirect(base_url());
		}		
	}

	public function DeletePromo($idservice){
		if ( isset($_SESSION['users_id'])){
			$this->db->query("delete from table_service where id ='$idservice'");
			$this->db->query("delete from table_service_en where id_main ='$idservice'");
			redirect("Services");
		}else{
			redirect(base_url());
		}
	}

	public function EditPromo($idservice){
		if ( isset($_SESSION['users_id'])){
			$qry_get_promo_service = $this->db->query("select * from table_service where id ='$idservice'");
			$run_get_promo_service = $qry_get_promo_service->result();
			$data['service_id'] = $run_get_promo_service;

			$qry_get_promo_service_en = $this->db->query("select * from table_service_en where id_main ='$idservice'");
			$run_get_promo_service_en = $qry_get_promo_service_en->result();
			$data['service_en'] = $run_get_promo_service_en;
			$this->load->view("edit_promo_service",$data);
		}else{
			redirect(base_url());
		}	
	}

	public function UpdateService(){
		if ( isset($_SESSION['users_id'])){
			$service_id = $this->input->post("service_id");
			$sections_title = $this->db->escape($this->input->post("sections_title"));
			$sections_title_en = $this->db->escape($this->input->post("sections_title_en"));
			$sections_description = $this->db->escape($this->input->post("sections_description"));
			$sections_description_en = $this->db->escape($this->input->post("sections_description_en"));
			$currdate = date("Y-m-d H:i:s");
			$this->db->query("update table_service set title =$sections_title, description =$sections_description where id ='$service_id'");
			$this->db->query("update table_service_en set title =$sections_title_en, description =$sections_description_en where id_main ='$service_id'");
			redirect("Services");

		}else{
			redirect(base_url());
		}
	}
}
