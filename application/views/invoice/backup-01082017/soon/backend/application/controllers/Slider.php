<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Slider extends CI_Controller {



	function __construct(){

        parent::__construct();

		$this->load->helper('url');

		$this->load->model('mainmodel');

    }

    



	public function index()

	{

		if ( isset($_SESSION['users_id'])){

			$data['gallery_slider'] = $this->mainmodel->getSlider();

			$this->load->view('slider',$data);

		}else{

			redirect("Login");

		}

	}



	public function Add(){

		if ( isset($_SESSION['users_id'])){

			$this->load->view("addslider");

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

			$html .= "<img src='http://". $_SERVER['SERVER_NAME']."/soon/backend/assets/dist/img/slider/". $image_name."' style='width:100px;height:100px;'/><br/>";

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



	public function SaveTitle(){

		$form_slider_images = $this->input->post("form_slider_images");

		$form_slider_title = $this->input->post("form_slider_title");

		$form_slider_karakter = $this->input->post("form_slider_karakter");

		$form_slider_type = $this->input->post("form_slider_type");

		$form_slider_url = $this->input->post("form_slider_url");

		$form_slider_title_en = $this->input->post("form_slider_title_en");

		$form_slider_karakter_en = $this->input->post("form_slider_karakter_en");

		$form_slider_background_color = $this->input->post("form_slider_background_color");

		$form_slider_icon = $this->input->post("form_slider_icon");
		$form_slider_class = $this->input->post("form_slider_class");
		$form_slider_gif = $this->input->post("form_slider_gif");

		$currdate = date("Y-m-d H:i:s");

		/*echo $form_slider_images."<>".$form_slider_title."<>".$form_slider_karakter."<>".$form_slider_type;die;*/

		$this->db->query("insert into table_slider (title,img,content,links,type,status,created_at,section,background,icon,sec_class,gif)values('$form_slider_title','$form_slider_images','$form_slider_karakter','$form_slider_url','$form_slider_type','A','$currdate','N','$form_slider_background_color','$form_slider_icon','$form_slider_class','$form_slider_gif')");



		$qry_get_main = $this->db->query("select * from table_slider where title ='$form_slider_title' order by id desc limit 0,1");

		$run_get_main = $qry_get_main->result();

		$id_slider_main = $run_get_main[0]->id;



		$this->db->query("insert into table_slider_en (title,img,content,links,type,status,created_at,section,id_main,background,icon,sec_class,gif)values('$form_slider_title_en','$form_slider_images','$form_slider_karakter_en','$form_slider_url','$form_slider_type','A','$currdate','N','$id_slider_main','$form_slider_background_color','$form_slider_icon','$form_slider_class','$form_slider_gif')");

		redirect("Slider");

	}



	public function Setstatus($idSlider,$status){

		$this->db->query("update table_slider set status ='$status' where id = '$idSlider'");

		redirect("Slider");

	}



	public function DelSlide($idSlider){

		$this->db->query("delete from table_slider where id ='$idSlider'");
		$this->db->query("delete from table_slider_en where id_main ='$idSlider'");
		$this->db->query("delete from table_section_slider where id_slider ='$idSlider'");
		redirect("Slider");

	}



	public function Edit($idslider){

		$qry_get_slider = $this->db->query("select * from table_slider where id ='$idslider'");

		$run_get_slider = $qry_get_slider->result();

		//echo "select * from table_slider_en where id_main ='$idslider'";die;

		$qry_get_slider_en = $this->db->query("select * from table_slider_en where id_main ='$idslider'");

		$run_get_slider_en = $qry_get_slider_en->result();


		$html = "<span>".$run_get_slider[0]->img."</span><br>";

		$html = "<div class='col-md-2' id='list".$run_get_slider[0]->img."' style='width:20% !important;'>";					

		$html .= "<img src='http://". $_SERVER['SERVER_NAME']."/soon/backend/assets/dist/img/slider/". $run_get_slider[0]->img."' style='width:100px;height:100px;'/><br/>";

		$html .= "<br/>";

		$html .= '<a class="btn btn-xs btn-danger" onClick="deletePreview('."'".$run_get_slider[0]->img."'".')">Delete</a>';



		$html_icon = "<span>".$run_get_slider[0]->icon."</span><br>";

		$html_icon = "<div class='col-md-2' id='list".$run_get_slider[0]->icon."' style='width:20% !important;'>";					

		$html_icon .= "<img src='http://". $_SERVER['SERVER_NAME']."/soon/backend/assets/dist/img/slider/". $run_get_slider[0]->icon."' style='width:100px;height:100px;'/><br/>";

		$html_icon .= "<br/>";

		$html_icon .= '<a class="btn btn-xs btn-danger" onClick="deletePreviewIcon('."'".$run_get_slider[0]->icon."'".')">Delete</a>';



		$data['html'] = $html;

		$data['html_icon'] = $html_icon;

		$data['slider_detail'] = $run_get_slider;

		$data['slider_detail_en'] = $run_get_slider_en;

		$this->load->view("editslider",$data);

	}



	public function UpdateSlider(){

		$form_slider_images = $this->input->post("form_slider_images");

		$form_slider_title = $this->input->post("form_slider_title");

		$form_slider_karakter = $this->db->escape($this->input->post("form_slider_karakter"));

		$form_slider_type = $this->input->post("form_slider_type");

		$form_slider_url = $this->input->post("form_slider_url");

		$form_slider_title_en = $this->input->post("form_slider_title_en");

		$form_slider_karakter_en = $this->db->escape($this->input->post("form_slider_karakter_en"));

		$form_slider_id_img = $this->input->post("form_slider_id_img");

		$form_slider_background_color = $this->input->post("form_slider_background_color");

		$form_slider_icon = $this->input->post("form_slider_icon");

		$form_slider_gif = $this->input->post("form_slider_gif");

		$form_slider_class = $this->input->post("form_slider_class");


		$this->db->query("update table_slider set img ='$form_slider_images', title ='$form_slider_title', content =$form_slider_karakter,gif ='$form_slider_gif', background ='$form_slider_background_color', sec_class ='$form_slider_class',icon ='$form_slider_icon',links='$form_slider_url' where id ='$form_slider_id_img'");

		$this->db->query("update table_slider_en set img ='$form_slider_images', title ='$form_slider_title_en', content =$form_slider_karakter_en,  background ='$form_slider_background_color', gif ='$form_slider_gif', sec_class='$form_slider_class',icon ='$form_slider_icon',links='$form_slider_url' where id_main ='$form_slider_id_img'");

		redirect("Slider");

	}



	public function uploadIcon(){

		$config['upload_path']   = './assets/dist/img/slider/';

        $config['allowed_types'] = '|jpg|png|gif';

        $config['max_size']      = 3500;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('form_slider_icon_upload')){

	      	$data['status'] = "1";

			$data['error'] = "Gagal simpan data";

	       	/* $error = array('error' => $this->upload->display_errors());

	        $this->load->view('upload_form', $error);*/

        }else{

        	$image_name = $this->upload->data('file_name');

        	$html = "<span>".$image_name."</span><br>";

			$html = "<div class='col-md-2' id='list".$image_name."' style='width:20% !important;'>";					

			$html .= "<img src='http://". $_SERVER['SERVER_NAME']."/soon/backend/assets/dist/img/slider/". $image_name."' style='width:100px;height:100px;'/><br/>";

			$html .= "<br/>";

			$html .= '<a class="btn btn-xs btn-danger" onClick="deletePreviewIcon('."'".$image_name."'".')">Delete</a>';		

        	$data['status'] = "0";

			$data['html'] = $html;

			$data['img_name'] = $image_name;

           /* $data = array('upload_data' => $this->upload->data());

            $this->load->view('upload_success', $data);*/

        }

        echo json_encode($data);   

	}

}

