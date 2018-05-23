<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('mainmodel');
    }
    

	public function index(){
		if ( isset($_SESSION['users_id'])){
			$data['kategori'] = $this->mainmodel->getKategoriPromo();
			$this->load->view("kategori_list",$data);
		}else{
			redirect(base_url());
		}
	}

	public function AddKategori(){
		if ( isset($_SESSION['users_id'])){
			$promo_kategori = $this->db->escape($this->input->post("promo_kategori"));
			$this->db->query("insert into table_kategori_promo(kategori)values($promo_kategori)");
			redirect("Promo");
		}else{
			redirect(base_url());
		}
	}

	public function DetailKategori($id){
		if ( isset($_SESSION['users_id'])){
			$data['title'] = $this->mainmodel->getKategoriById($id);
			$data['promo_list'] = $this->mainmodel->GetPromoByKategori($id);
			$this->load->view("promo_list",$data);
		}else{
			redirect(base_url());
		}
	}

	public function AddPromo($idkategori){
		if ( isset($_SESSION['users_id'])){
			$data['idkategori'] = $idkategori;
			$data['promoid'] = "";
			$this->load->view("add_promo",$data);
		}else{
			redirect(base_url());
		}
	}

	public function UploadImages(){

		if ( isset($_SESSION['users_id'])){
			$config['upload_path']   = './assets/dist/img/promo/';
	        $config['allowed_types'] = 'jpeg|gif|jpg|png';
	        $config['max_size']      = 1500;


	        $this->load->library('upload', $config);
	        if ( ! $this->upload->do_upload('promo_upload_images')){
		      	$data['status'] = "1";
				$data['error'] =  "Gagal simpan data ".$this->upload->display_errors();
				//$this->load->view('upload_form', $error);*/
	        }else{
	        	$image_name = $this->upload->data('file_name');
	        	$html = "<span>".$image_name."</span><br>";
				$html = "<div class='col-md-2' id='list".$image_name."' style='width:20% !important;'>";		
				$html .= "<img src='http://". $_SERVER['SERVER_NAME']."/soon/backend/assets/dist/img/promo/". $image_name."' style='width:100px;height:100px;'/><br/>";
				$html .= "<br/>";
				$html .= '<a class="btn btn-xs btn-danger" onClick="deleteImages('."'".$image_name."'".')">Delete</a>';	
	        	$data['status'] = "0";
				$data['html'] = $html;
				$data['img_name'] = $image_name;
	           /* $data = array('upload_data' => $this->upload->data());
	            $this->load->view('upload_success', $data);*/
	        }
	        echo json_encode($data); 
       	}else{
			redirect(base_url());
		}

	}

	public function SavePromo(){
		$promo_method = $this->input->post("promo_method");
		$promo_kategori = $this->input->post("promo_kategori");
		$promo_images = $this->input->post("promo_images");
		$promo_kategori = $this->input->post("promo_kategori");
		$promo_id = $this->input->post("promo_id");
		$sections_title = $this->db->escape($this->input->post("sections_title"));
		$sections_title_en = $this->db->escape($this->input->post("sections_title_en"));
		$sections_description = $this->db->escape($this->input->post("sections_description"));
		$sections_description_en = $this->db->escape($this->input->post("sections_description_en"));
		$sections_intro = $this->db->escape($this->input->post("sections_intro"));
		$sections_intro_en = $this->db->escape($this->input->post("sections_intro_en"));
		$currdate = date("Y-m-d H:i:s");
		if ( $promo_method == "add" ){
			$this->db->query("insert into table_promo(title,promo,img,created_at,status,kategori,intro)values($sections_title,$sections_description,'$promo_images','$currdate','A','$promo_kategori',$sections_intro)");
			$qry_get_id_main = $this->db->query("select * from table_promo where title = $sections_title");
			$run_get_id_main = $qry_get_id_main->result();
			$id_main = $run_get_id_main[0]->id;
			$this->db->query("insert into table_promo_en(title,promo,img,created_at,status,kategori,id_main,intro)values($sections_title_en,$sections_description_en,'$promo_images','$currdate','A','$promo_kategori','$id_main',$sections_intro_en)");
			redirect("Promo/DetailKategori/".$promo_kategori);
		}else{
			$this->db->query("update table_promo set title = $sections_title, promo = $sections_description,img ='$promo_images',intro = $sections_intro where id ='$promo_id'");
			$this->db->query("update table_promo_en set title = $sections_title_en, promo = $sections_description_en, img ='$promo_images', intro = $sections_intro_en where id_main ='$promo_id'");
			redirect("Promo/DetailKategori/".$promo_kategori);
		}

	}

	public function Setstatus($promoid,$status,$promo_kategori){
		$this->db->query("update table_promo set status ='$status' where id ='$promoid'");
		$this->db->query("update table_promo_en set status ='$status' where id_main ='$promoid'");
		redirect("Promo/DetailKategori/".$promo_kategori);
	}

	public function DeletePromo($promoid,$kategori){
		$this->db->query("delete from table_promo where id ='$promoid'");
		$this->db->query("delete from table_promo_en where id_main ='$promoid'");
		redirect("Promo/DetailKategori/".$kategori);
	}

	public function EditPromo($promoid,$kategori){
		$qry_get_promo = $this->db->query("select * from table_promo where id ='$promoid'");
		$run_get_promo = $qry_get_promo->result();
		$data['promo'] = $run_get_promo;

		$qry_get_promo_en = $this->db->query("select * from table_promo_en where id_main ='$promoid'");
		$run_get_promo_en = $qry_get_promo_en->result();
		$data['promo_en'] = $run_get_promo_en;

		$html = "<span>".$run_get_promo[0]->img."</span><br>";
		$html = "<div class='col-md-2' id='list".$run_get_promo[0]->img."' style='width:20% !important;'>";		
		$html .= "<img src='http://". $_SERVER['SERVER_NAME']."/soon/backend/assets/dist/img/promo/". $run_get_promo[0]->img."' style='width:100px;height:100px;'/><br/>";
		$html .= "<br/>";
		$html .= '<a class="btn btn-xs btn-danger" onClick="deleteImages('."'".$run_get_promo[0]->img."'".')">Delete</a>';	
    	$data['status'] = "0";
		$data['html_images'] = $html;

		$this->load->view("edit_promo",$data);
	}
}
