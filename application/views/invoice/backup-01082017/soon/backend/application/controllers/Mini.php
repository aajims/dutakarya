<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mini extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('mainmodel');
    }
    

	public function index(){
		if ( isset($_SESSION['users_id'])){
			$data['gallery_slider'] = $this->mainmodel->getMiniSlider();
			$this->load->view('mini_slider',$data);
		}
	}

	public function SaveTitle(){
		$form_slider_images = $this->input->post("form_slider_images");
		$currdate = date("Y-m-d H:i:s");
		/*echo $form_slider_images."<>".$form_slider_title."<>".$form_slider_karakter."<>".$form_slider_type;die;*/
		$this->db->query("insert into table_slider (img,type,created_at,status)values('$form_slider_images','C','$currdate','A')");

		$qry_get_main = $this->db->query("select * from table_slider where title ='$form_slider_title' order by id desc limit 0,1");
		$run_get_main = $qry_get_main->result();
		$id_slider_main = $run_get_main[0]->id;

		$this->db->query("insert into table_slider_en (img,type,created_at,id_main,status)values('$form_slider_images','C','$currdate','$id_slider_main','A')");
		redirect("Mini");
	}

	public function Add(){
		if ( isset($_SESSION['users_id'])){
			$this->load->view("add_mini_slider");
		}else{
			redirec(base_url());
		}
	}

	public function uploadFile(){
		$config['upload_path']   = './assets/dist/img/slider/';
        $config['allowed_types'] = '|jpg|png|gif';
        $config['max_size']      =  11061767;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('form_slider_photo')){
	      	$data['status'] = "1";
			$data['error'] = "Gagal simpan data";
	       	/* $error = array('error' => $this->upload->display_errors());
	        $this->load->view('upload_form', $error);*/
        }else{
        	$image_name = $this->upload->data('file_name');
        	$html = "<span>".$image_name."</span><br>";
			$html = "<div class='col-md-2' id='list".$image_name."' style='width:20% !important;'>";					
			$html .= "<img src='http://". $_SERVER['SERVER_NAME']."/panelpaypro/assets/dist/img/slider/". $image_name."' style='width:100px;height:100px;'/><br/>";
			$html .= "<br/>";
			$html .= '<a class="btn btn-xs btn-danger" onClick="deletePreview('."'".$image_name."'".')">Delete</a>';		
        	$data['status'] = "0";
			$data['html'] = $html;
			$data['img_name'] = $image_name;
           /* $data = array('upload_data' => $this->upload->data());
            $this->load->view('upload_success', $data);*/
        }
        echo json_encode($data);   
	}

	public function Setstatus($idSlider,$status){
		$this->db->query("update table_slider set status ='$status' where id = '$idSlider'");
		redirect("Mini");
	}

	public function Edit($idslider){
		$qry_get_slider = $this->db->query("select * from table_slider where id ='$idslider'");
		$run_get_slider = $qry_get_slider->result();

		$qry_get_slider_en = $this->db->query("select * from table_slider_en where id_main ='$idslider'");
		$run_get_slider_en = $qry_get_slider_en->result();

		$html = "<span>".$run_get_slider[0]->img."</span><br>";
		$html = "<div class='col-md-2' id='list".$run_get_slider[0]->img."' style='width:20% !important;'>";					
		$html .= "<img src='http://". $_SERVER['SERVER_NAME']."/panelpaypro/assets/dist/img/slider/". $run_get_slider[0]->img."' style='width:100px;height:100px;'/><br/>";
		$html .= "<br/>";
		$html .= '<a class="btn btn-xs btn-danger" onClick="deletePreview('."'".$run_get_slider[0]->img."'".')">Delete</a>';

		$data['html'] = $html;
		$data['slider_detail'] = $run_get_slider;
		$data['slider_detail_en'] = $run_get_slider_en;
		$this->load->view("edit_slider",$data);
	}

	public function UpdateSlider(){
		$form_slider_images = $this->input->post("form_slider_images");
		$form_slider_id_img = $this->input->post("form_slider_id_img");

		$this->db->query("update table_slider set img ='$form_slider_images' where id ='$form_slider_id_img'");
		$this->db->query("update table_slider_en set img ='$form_slider_images' where id_main ='$form_slider_id_img'");
		redirect("Mini");
	}

	public function DelSlide($idSlider){
		$this->db->query("delete from table_slider where id ='$idSlider'");
		redirect("Mini");
	}

	public function SectionMiniSlider($idpage){
		if ( isset($_SESSION['users_id'])){
			$data['page'] = $this->mainmodel->getPageById($idpage);
			$this->load->view("section_mini_slider_html",$data);
		}else{
			redirect(base_url());
		}
	}

	public function SaveSectionsMiniSlider(){
		if ( isset($_SESSION['users_id'])){
			$section_bg_images = $this->input->post("section_bg_images");
			$section_images = $this->input->post("section_images");
			$sections_title = $this->input->post("sections_title");
			$sections_background_type = $this->input->post("sections_background_type");
			$sections_background_color = $this->input->post("sections_background_color");
			$sections_description = $this->input->post("sections_description");
			$section_id_page = $this->input->post("section_id_page");
			$sections_title_en = $this->input->post("sections_title_en");
			$sections_description_en = $this->input->post("sections_description_en");
			$section_slider_icon = $this->input->post("section_slider_icon");

			if ( $sections_background_type == "C" ){
				$sections_background = $sections_background_color;
			}else{
				$sections_background = $section_bg_images;
			}
					
			$currdate = date("Y-m-d H:i:s");
			$this->db->query("insert into table_section(bg_type,background,description,images,created_at,title,sec_type,icon)values('$sections_background_type','$sections_background','$sections_description','$section_images','$currdate','$sections_title','C','$section_slider_icon')");
			$qry_get_id_sections = $this->db->query("select * from table_section where title = '$sections_title' order by id desc limit 0,1");
	
			$run_get_id_sections = $qry_get_id_sections->result();
			$idsections = $run_get_id_sections[0]->id;
			$this->db->query("insert into table_page_sections(id_page,id_sections,status)values('$section_id_page','$idsections','A')");
			$this->db->query("insert into table_section_en(bg_type,background,description,images,created_at,title,sec_type,id_main,icon)values('$sections_background_type','$sections_background','$sections_description_en','$section_images','$currdate','$sections_title_en','C','$idsections','$section_slider_icon')");


			redirect("Mini/MiniSliderList/".$section_id_page."/".$idsections);
		}else{
			redirect(base_url());
		}
	}

	public function MiniSliderList($id_page,$id_sections){
		if ( isset($_SESSION['users_id'])){
			$data['id_sections'] = $id_sections;
			$data['page'] = $this->mainmodel->getPageById($id_page);
			$data['gallery_slider'] = $this->mainmodel->getMiniSlider();
			$this->load->view("galery_mini_slider",$data);
		}else{
			redirect(base_url());
		}
	}

	public function SaveSectionMiniSlider($id_page,$id_slider,$id_sections){
		if ( isset($_SESSION['users_id'])){
			$this->db->query("insert into table_section_slider(id_section,id_slider,status)values('$id_sections','$id_slider','A')");
			redirect("Mini/DetailMiniSlider/".$id_sections."/".$id_page);
		}else{
			redirect(base_url());
		}
	}

	 public function DetailMiniSlider($id_sections,$id_page){
    	if ( isset($_SESSION['users_id'])){
    		$data['page'] = $this->mainmodel->getPageById($id_page);
    		$data['section_detail'] = $this->mainmodel->getSectionById($id_sections);
    		$qry_get_slider_section = $this->db->query("select * from table_section_slider where id_section ='$id_sections'");
    		$run_get_slider_section = $qry_get_slider_section->result();
    		$arrSlider = "";
    		$i=0;
    		foreach ( $run_get_slider_section as $data_slider_section ){
    			$idslider = $run_get_slider_section[$i]->id_slider;
    			$slider_detail = $this->mainmodel->getSliderById($idslider);
    			$arrSlider[$i] = array( "img" => $slider_detail[0]->img, "links" => $slider_detail[0]->links, "id_slider" => $slider_detail[0]->id, "status" => $run_get_slider_section[$i]->status, "id" => $run_get_slider_section[$i]->id);
    			$i++;
    		}
    		$data['gallery_slider'] = $arrSlider;
    		$data['id_page'] = $id_page;
    		$data['id_sections'] = $id_sections;
    		$this->load->view("section_mini_slider_detail",$data);
    	}else{

    	}

    }

    public function RemoveSectionSlider($id_slider,$id_sections,$id_page){
    	$this->db->query("delete from table_section_slider where id = '$id_slider'");
    	redirect("Mini/DetailMiniSlider/".$id_sections."/".$id_page);
    }
}
