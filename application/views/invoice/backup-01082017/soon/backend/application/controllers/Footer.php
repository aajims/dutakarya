<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Footer extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('mainmodel');
    }
    

	public function index()	{
		if ( isset($_SESSION['users_id'])){
			$data['get_page'] = $this->mainmodel->getListFooter();
			$this->load->view('footer_page_list',$data);
		}else{
			redirect(base_url());
		}
	}

	public function AddFooter(){
		if ( isset($_SESSION['users_id'])){
			$footer_title = ($this->input->post("footer_title"));
			$footer_links = $this->db->escape($this->input->post("footer_links"));
			$footer_title_en = $this->db->escape($this->input->post("footer_title_en"));
			$footer_id_page = $this->input->post("footer_id_page");
			$currdate = date("Y-m-d H:i:s");

			$this->db->query("insert into table_footer(title,links,created_at,page)values('$footer_title',$footer_links,'$currdate','$footer_id_page')");
			$get_id_main = $this->db->query("select * from table_footer where title like '%$footer_title%' limit 0,1");
			$run_id_main = $get_id_main->result();
			$id_main = $run_id_main[0]->id;
			$this->db->query("insert into table_footer_en(title,links,created_at,page,id_main)values($footer_title_en,$footer_links,'$currdate','$footer_id_page','$id_main')");
			redirect("Footer");
		}else{
			redirect(base_url());
		}
	}

	public function AddMaster(){
		if ( isset($_SESSION['users_id'])){
			$footer_master = $this->input->post("footer_master");
			$footer_master_en = $this->input->post("footer_master_en");
			$footer_type = $this->input->post("footer_type");
			$footer_id = $this->input->post("footer_id");
			if ( $footer_type == "add" ){	
				$this->db->query("insert into table_master_menu(title)values('$footer_master')");
				$get_id_main = $this->db->query("select * from table_master_menu where title like '%$footer_master%' limit 0,1");
				$run_id_main = $get_id_main->result();
				$id_main = $run_id_main[0]->id;
				$this->db->query("insert into table_master_menu_en(title,id_main)values('$footer_master_en','$id_main')");
			}else{

				$this->db->query("update table_master_menu set title ='$footer_master' where id ='$footer_id'");
				$this->db->query("update table_master_menu_en set title ='$footer_master_en' where id_main ='$footer_id'");

			}

			
			redirect("Footer");
		}else{
			redirect(base_url());
		}
	}

	public function Detail($id_page){
		if ( isset($_SESSION['users_id'])){
			$qry_get_list = $this->db->query("select * from table_footer where page ='$id_page'");
			$run_get_list = $qry_get_list->result();
			$data['footer_list'] = $run_get_list;
			$data['id_page'] = $id_page;
			$this->load->view("footer_page_list_detail",$data);
		}else{
			redirect(base_url());
		}
	}

	public function DelFooter($id_page,$id_footer){
		$this->db->query("delete from table_footer where id ='$id_footer'");
		redirect("Footer/Detail/".$id_page);
	}

	public function GetDetail(){
		if ( isset($_SESSION['users_id'])){
			$id = $_POST['id'];
			$qry_title_id = $this->db->query("select * from table_master_menu where id ='$id'");
			$run_title_id = $qry_title_id->result();
			if ( count($run_title_id) > 0 ){
				$data['title_id'] = $run_title_id[0]->title;
			}else{
				$data['title_id'] = "";
			}

			$qry_title_en = $this->db->query("select * from table_master_menu_en where id_main ='$id'");
			$run_title_en = $qry_title_en->result();
			if ( count($run_title_en) > 0 ){
				$data['title_en'] = $run_title_en[0]->title;
			}else{
				$data['title_en'] = "";
			}
			$data['id'] = $id;
			echo json_encode($data);
		}else{
			redirect(base_url());
		}

	}

	public function DelHeader($id){
		$this->db->query("delete from table_master_menu where id ='$id'");
		$this->db->query("delete from table_master_menu_en where id_main ='$id'");
		$this->db->query("delete from table_footer where page ='$id'");
		$this->db->query("delete from table_footer_en where page ='$id'");
		redirect("Footer");
	}

	public function GetDetailSub(){
		if ( isset($_SESSION['users_id'])){
			$id = $_POST['id'];
			$qry_title_id = $this->db->query("select * from table_footer where id ='$id'");
			$run_title_id = $qry_title_id->result();
			if ( count($run_title_id) > 0 ){
				$data['title_id'] = $run_title_id[0]->title;
				$data['link_id'] = $run_title_id[0]->links;
				$data['page'] = $run_title_id[0]->page;
			}else{
				$data['title_id'] = "";
				$data['link_id'] = "";
				$data['page'] = "";
			}

			$qry_title_en = $this->db->query("select * from table_footer_en where id_main ='$id'");
			$run_title_en = $qry_title_en->result();
			if ( count($run_title_en) > 0 ){
				$data['title_en'] = $run_title_en[0]->title;
				$data['link_en'] = $run_title_en[0]->links;
			}else{
				$data['title_en'] = "";
				$data['link_en'] = "";
			}
			$data['id'] = $id;
			echo json_encode($data);
		}else{
			redirect(base_url());
		}

	}

	public function EditSubmenu(){
		if ( isset($_SESSION['users_id'])){
		$footer_id = $this->input->post("footer_id");
		$footer_label = $this->input->post("footer_label");
		$footer_label_en = $this->input->post("footer_label_en");
		$footer_link = $this->input->post("footer_link");
		$footer_page = $this->input->post("footer_page");
		
		$this->db->query("update table_footer set title ='$footer_label',links = '$footer_link' where id ='$footer_id'");
		$this->db->query("update table_footer_en set title ='$footer_label_en',links = '$footer_link' where id_main ='$footer_id'");
		redirect("Footer/Detail/".$footer_page);
		}else{
			redirect(base_url());
		}
	}
}
