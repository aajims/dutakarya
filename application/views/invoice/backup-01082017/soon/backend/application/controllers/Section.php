<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Section extends CI_Controller {



	function __construct(){

        parent::__construct();

		$this->load->helper('url');

		$this->load->model('mainmodel');

    }

    



	public function index(){

		if ( isset($_SESSION['users_id'])){

			$data['page_list'] = $this->mainmodel->getPage();

			$this->load->view('page_list',$data);

		}else{

			redirect("Login");

		}

	}



	public function Addpage(){

		if ( isset($_SESSION['users_id'])){

			$sections_add_page = $this->input->post("sections_add_page");

			$this->db->query("insert into table_page(page)values('$sections_add_page')");

			redirect("Section");

		}else{

			redirect(base_urL());

		}

	}



	public function Delpage($id){

		if ( isset($_SESSION['users_id'])){

			$this->db->query("delete from table_page where id ='$id'");

			redirect("Section");

		}else{

			redirect(base_url());

		}	

	}



	public function PageSections($id){

		if ( isset($_SESSION['users_id'])){
			
	
			$data['page'] = $this->mainmodel->getPageById($id);

			$data['sections_list'] = $this->mainmodel->getListSectionsByPage($id);

	

			$this->load->view("section_list",$data);

		}else{

			redirect(base_url());

		}

	}



	public function Addsection($idpage){

		if ( isset($_SESSION['users_id'])){

			$data['page'] = $this->mainmodel->getPageById($idpage);

			$this->load->view("addsections",$data);

		}else{

			redirect(base_url());

		}

	}



	public function UploadBackground(){

		if ( isset($_SESSION['users_id'])){

			$config['upload_path']   = './assets/dist/img/sections/bg_sections/';

	        $config['allowed_types'] = 'jpeg|jpg|png|gif';

	        $config['max_size']      = 1500;



	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('section_upload_background_images')){

	        	print_r($this->upload->data('file_name'));

		      	$data['status'] = "1";

				$data['error'] = "Gagal simpan data";

		       	/* $error = array('error' => $this->upload->display_errors());

		        $this->load->view('upload_form', $error);*/

	        }else{

	        	$image_name = $this->upload->data('file_name');

	        	$html = "<span>".$image_name."</span><br>";

				$html = "<div class='col-md-2' id='list".$image_name."' style='width:20% !important;'>";					

				$html .= "<img src='http://". $_SERVER['SERVER_NAME']."/soon/backend/assets/dist/img/sections/bg_sections/". $image_name."' style='width:100px;height:100px;'/><br/>";

				$html .= "<br/>";

				$html .= '<a class="btn btn-xs btn-danger" onClick="deleteBg('."'".$image_name."'".')">Delete</a>';		

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



	public function UploadImages(){

		if ( isset($_SESSION['users_id'])){

			$config['upload_path']   = './assets/dist/img/sections/';

	        $config['allowed_types'] = 'jpeg|gif|jpg|png';

	        $config['max_size']      = 1500;



	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('section_upload_images')){

		      	$data['status'] = "1";

				$data['error'] =  "Gagal simpan data ".$this->upload->display_errors();

		       

		        //$this->load->view('upload_form', $error);*/

	        }else{

	        	$image_name = $this->upload->data('file_name');

	        	$html = "<span>".$image_name."</span><br>";

				$html = "<div class='col-md-2' id='list".$image_name."' style='width:20% !important;'>";					

				$html .= "<img src='http://". $_SERVER['SERVER_NAME']."/soon/backend/assets/dist/img/sections/". $image_name."' style='width:100px;height:100px;'/><br/>";

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



	public function SaveSections(){

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

			$section_slider_class = $this->input->post("form_slider_class");

			$section_gif_value = $this->input->post("section_gif_value");

			if ( $sections_background_type == "C" ){

				$sections_background = $sections_background_color;

			}else{

				$sections_background = $section_bg_images;

			}

					
			//$this->db->query("delete from table_section where title like '%Makin banyak%'");
			
			$currdate = date("Y-m-d H:i:s");
			$this->db->query("insert into table_section(bg_type,background,description,images,created_at,title,sec_type,icon,sec_class,gif)values('$sections_background_type','$sections_background','$sections_description','$section_images','$currdate','$sections_title','H','$section_slider_icon','$section_slider_class','$section_gif_value')");

			$qry_get_id_sections = $this->db->query("select * from table_section where title like '%$sections_title' order by id desc limit 0,1");
			$run_get_id_sections = $qry_get_id_sections->result();
			$idsections = $run_get_id_sections[0]->id;

			//echo $idsections;die;

			$this->db->query("insert into table_page_sections(id_page,id_sections,status)values('$section_id_page','$idsections','A')");
			
			$this->db->query("insert into table_section_en(bg_type,background,description,images,created_at,title,sec_type,id_main,icon,sec_class,gif)values('$sections_background_type','$sections_background','$sections_description_en','$section_images','$currdate','$sections_title_en','H','$idsections','$section_slider_icon','$section_slider_class','$section_gif_value')");





			redirect("Section/PageSections/".$section_id_page);

		}else{

			redirect(base_url());

		}

	}



	public function DelSection($id,$idpage){

		if ( isset($_SESSION['users_id'])){

			$this->db->query("delete from table_section where id ='$id'");
			$this->db->query("delete from table_section_en where id ='$id'");

			$this->db->query("delete from table_page_sections where id_sections ='$id'");

			redirect("Section/PageSections/".$idpage);

		}else{

			redirect(base_url());

		}

	}



	public function SectionDetail($id,$idpage){

		if ( isset($_SESSION['users_id'])){

			$sectiondetail = $this->mainmodel->getSectionById($id);
			$sectiondetail_en = $this->mainmodel->getSectionEnById($id);
			$html_bg = "";
			$html_images = "";
			$html_icon = "";

			if ( $sectiondetail[0]->bg_type == "C" ){
				$data['color_selected'] = "selected";
				$data['bgimg_selected'] = "";
			}else if ( $sectiondetail[0]->bg_type == "I" ){
				$data['color_selected'] = "";
				$data['bgimg_selected'] = "selected";
			}

			if ( $sectiondetail[0]->bg_type == "I" && $sectiondetail[0]->background !== "" ){
				$html_bg = "<span>".$sectiondetail[0]->images."</span><br>";
				$html_bg .= "<div class='col-md-2' id='list".$sectiondetail[0]->background."' style='width:20% !important;'>";					
				$html_bg .= "<img src='http://". $_SERVER['SERVER_NAME']."/soon/backend/assets/dist/img/sections/bg_sections/". $sectiondetail[0]->background."' style='width:100px;height:100px;'/><br/>";
				$html_bg .= "<br/>";
				$html_bg .= '<a class="btn btn-xs btn-danger" onClick="deleteBgImages('."'".$sectiondetail[0]->background."'".')">Delete</a>';
			}

			if ( $sectiondetail[0]->images != "" ){
				$html_images = "<span>".$sectiondetail[0]->images."</span><br>";
				$html_images .= "<div class='col-md-2' id='list".$sectiondetail[0]->images."' style='width:20% !important;'>";					
				$html_images .= "<img src='http://". $_SERVER['SERVER_NAME']."/soon/backend/assets/dist/img/sections/". $sectiondetail[0]->images."' style='width:100px;height:100px;'/><br/>";
				$html_images .= "<br/>";
				$html_images .= '<a class="btn btn-xs btn-danger" onClick="deleteImages('."'".$sectiondetail[0]->images."'".')">Delete</a>';
			}
			
			if ( $sectiondetail[0]->icon != "" ){
				$html_icon = "<span>".$sectiondetail[0]->icon."</span><br>";
				$html_icon = "<div class='col-md-2' id='list".$sectiondetail[0]->icon."' style='width:20% !important;'>";

				$html_icon .= "<img src='http://". $_SERVER['SERVER_NAME']."/soon/backend/assets/dist/img/sections/". $sectiondetail[0]->icon."' style='width:100px;height:100px;'/><br/>";
				$html_icon .= "<br/>";
				$html_icon .= '<a class="btn btn-xs btn-danger" onClick="deletePreviewIcon('."'".$sectiondetail[0]->icon."'".')">Delete</a>';
			}
			$data['html_images'] = $html_images;
			$data['html_icon'] = $html_icon;
			$data['html_bg'] = $html_bg;

			$data['section_detail'] = $this->mainmodel->getSectionById($id);
			$data['sectiondetail_en'] = $this->mainmodel->getSectionEnById($id);

			$data['page'] = $this->mainmodel->getPageById($idpage);

			if ( $sectiondetail[0]->bg_type == "I" ){
				$image_name = $sectiondetail[0]->background;
				$html = "<span>".$image_name."</span><br>";
				$html = "<div class='col-md-2' id='list".$image_name."' style='width:20% !important;'>";	
				$html .= "<img src='http://". $_SERVER['SERVER_NAME']."/soon/backend/assets/dist/img/sections/bg_sections/". $image_name."' style='width:100px;height:100px;'/><br/>";
				$html .= "<br/>";
				$html .= '<a class="btn btn-xs btn-danger" onClick="deleteBgImages('."'".$image_name."'".')">Delete</a>';	
			}else{
				$html = "";
			}
			$data['html'] = $html;
			$this->load->view("updateDetail",$data);

		}else{

			redirect(base_url());

		}

	}



	public function UpdateSection(){

		if ( isset($_SESSION['users_id'])){

			$section_bg_images = $this->input->post("section_bg_images");

			$section_images = $this->input->post("section_images");

			$sections_title = $this->input->post("sections_title");

			$sections_background_type = $this->input->post("sections_background_type");

			$sections_background_color = $this->input->post("sections_background_color");

			$sections_description = $this->db->escape($this->input->post("sections_description"));

			$section_id_page = $this->input->post("section_id_page");

			$section_id_section = $this->input->post("section_id_section");

			$sections_title_en = $this->input->post("sections_title_en");

			$sections_description_en = $this->db->escape($this->input->post("sections_description_en"));

			$section_slider_icon = $this->input->post("section_slider_icon");

			$section_gif_value = $this->input->post("section_gif_value");

			$form_slider_class  = $this->input->post("form_slider_class");

			$section_slider_icon = $this->input->post("section_slider_icon");

			if ( $sections_background_type == "C" ){

				$sections_background = $sections_background_color;

			}else{

				$sections_background = $section_bg_images;

			}
			


			$this->db->query("update table_section set background ='$sections_background', bg_type='$sections_background_type', description =$sections_description,images ='$section_images', icon ='$section_slider_icon', gif ='$section_gif_value', title ='$sections_title',sec_class='$form_slider_class',icon ='$section_slider_icon' where id ='$section_id_section'");



			$this->db->query("update table_section_en set background ='$sections_background', bg_type='$sections_background_type', description =$sections_description_en,images ='$section_images', icon ='$section_slider_icon' , gif ='$section_gif_value', title ='$sections_title_en',icon ='$section_slider_icon' ,sec_class='$form_slider_class' where id_main ='$section_id_section'");



			redirect("Section/PageSections/".$section_id_page);

		}else{

			redirect(base_url());

		}

	}



	public function SectionHtml($idpage){

		if ( isset($_SESSION['users_id'])){

			$data['page'] = $this->mainmodel->getPageById($idpage);

			$this->load->view("section_html",$data);

		}else{

			redirect(base_url());

		}

	}



	public function Setstatus($idpage,$idSections,$status){

		if ( isset($_SESSION['users_id'])){

			$this->db->query("update table_page_sections set status ='$status' where id_sections ='$idSections' and id_page ='$idpage'");

			redirect("Section/PageSections/".$idpage);

		}else{

			redirect(base_url());

		}

	}



	public function SectionSlider($idpage){

		if ( isset($_SESSION['users_id'])){

			$data['page'] = $this->mainmodel->getPageById($idpage);

			$data['gallery_slider'] = $this->mainmodel->getSlider();

			$this->load->view("section_slider",$data);

		

		}else{

			redirect(base_url());

		}

	}



	public function SaveSectionSlider($id_page,$id_slider){

		if ( isset($_SESSION['users_id'])){

			$currdate = date("Y-m-d H:i:s");

	      	$this->db->query("insert into table_section(title,created_at,sec_type,id_slider)values('Slider','$currdate','S','$id_slider')");



	      	$qry_get_id_sections = $this->db->query("select * from table_section where id_slider ='$id_slider' order by id desc limit 0,1");

	      	$run_get_id_sections = $qry_get_id_sections->result();

	      	$id_sections = $run_get_id_sections[0]->id;



	      	$this->db->query("insert into table_page_sections(id_page,id_sections,status)values('$id_page','$id_sections','A')");

	      	$this->db->query("insert into table_section_slider(id_section,id_slider,status)values('$id_sections','$id_slider','A')");

      	 	$this->db->query("insert into table_section_en(title,created_at,sec_type,id_slider,id_main)values('Slider','$currdate','S','$id_slider','$id_sections')");

      	 	$this->db->query("update table_slider set section ='$id_page' where id ='$id_slider'");

      	 	$this->db->query("update table_slider_en set section ='$id_page' where id_main ='$id_slider'");
			

	      	redirect("Section/SectionDetailSlider/".$id_sections."/".$id_page);

      	}else{

			redirect(base_url());

		}

    }



    public function SectionDetailSlider($id_sections,$id_page){

    	if ( isset($_SESSION['users_id'])){

    		$data['page'] = $this->mainmodel->getPageById($id_page);

    		$data['section_detail'] = $this->mainmodel->getSectionById($id_sections);
    		$section_detail = $this->mainmodel->getSectionById($id_sections);

    		$qry_get_slider_section = $this->db->query("select * from table_section_slider where id_section ='$id_sections'");

    		$run_get_slider_section = $qry_get_slider_section->result();

    		$arrSlider = "";

    		if ( $section_detail[0]->slider_type == "B" ){
    			$data['typea'] = "";
    			$data['typeb'] = "checked";
    		}else{
    			$data['typea'] = "checked";
    			$data['typeb'] = "";
    		}

    		$i=0;
			$j=0;
			if ( count($run_get_slider_section) > 0 ){
    			foreach ( $run_get_slider_section as $data_slider_section ){
	    			if ( $run_get_slider_section[$i]->type == "A" ){
	    			$idslider = $run_get_slider_section[$i]->id_slider;
	    			$slider_detail = $this->mainmodel->getSliderById($idslider);
					if ( count($slider_detail) > 0 ){
						$arrSlider[$j] = array( "img" => $slider_detail[0]->img, "links" => $slider_detail[0]->links, "id_slider" => $slider_detail[0]->id, "status" => $run_get_slider_section[$i]->status, "id" => $run_get_slider_section[$i]->id, "title" => "");  
						$j++;
					}				

	    			}else{
	    				$idslider = $run_get_slider_section[$i]->id_slider;
	    				$qry_check_slider = $this->db->query("select * from table_section where id ='$idslider'");
	    				$slider_detail = $qry_check_slider->result();
						if ( count($slider_detail) > 0 ){
	    				$arrSlider[$j] = array( "img" => "", "links" => "/Mini/DetailMiniSlider/".$slider_detail[0]->id."/".$id_page, "id_slider" => $slider_detail[0]->id, "status" => $run_get_slider_section[$i]->status, "id" => $run_get_slider_section[$i]->id, "title" => "Mini Slider");
							$j++;
						}
	    			}
	    			$i++;

    			}
			}

    		$data['gallery_slider'] = $arrSlider;

    		$data['id_page'] = $id_page;

    		$data['id_sections'] = $id_sections;

    		$this->load->view("section_slider_detail",$data);

    	}else{



    	}



    }



    public function UpdateSectionSlider($id_section,$id_page){

    	$data['gallery_slider'] = $this->mainmodel->getSlider();

    	$data['id_page'] = $id_page;

    	$data['id_section'] = $id_section;

    	

    	$this->load->view("update_slider_section",$data);

    }



    public function AddSectionSlider($id_slider,$id_sections,$id_page){

    	$this->db->query("insert into table_section_slider(id_section,id_slider,status)values('$id_sections','$id_slider','A')");
		$this->db->query("update table_slider set section ='$id_page' where id ='$id_slider'");
		$this->db->query("update table_slider_en set section ='$id_page' where id_main ='$id_slider'");

    	redirect("Section/SectionDetailSlider/".$id_sections."/".$id_page);

    }



    public function RemoveSectionSlider($id_slider,$id_sections,$id_page){

    	$this->db->query("delete from table_section_slider where id ='$id_slider'");

    	redirect("Section/SectionDetailSlider/".$id_sections."/".$id_page);

    }



    public function SetOrdering(){

    	$section_order = $this->input->post("section_order");

    	$section_order_id_section = $this->input->post("section_order_id_section");

    	$section_order_id_page = $this->input->post("section_order_id_page");

    	$this->db->query("update table_page_sections set order_section ='$section_order' where id_page ='$section_order_id_page' and id_sections ='$section_order_id_section'");

    	redirect("Section/PageSections/".$section_order_id_page);

    }



    public function SetBgSlider(){

    	$section_bg_images = $this->input->post("section_bg_images");

    	$section_id_section = $this->input->post("section_id_section");

    	$section_id_page = $this->input->post("section_id_page");

    	$section_type_slider = $this->input->post("section_type_slider");

    	$this->db->query("update table_section set background ='$section_bg_images',slider_type='$section_type_slider' where id ='$section_id_section'");



    	$this->db->query("update table_section_en set background ='$section_bg_images',slider_type='$section_type_slider' where id_main ='$section_id_section'");

    	redirect("Section/PageSections/".$section_id_page);

    }



    public function UploadIcon(){

		if ( isset($_SESSION['users_id'])){

			$config['upload_path']   = './assets/dist/img/sections/';

	        $config['allowed_types'] = 'jpeg|gif|jpg|png';

	        $config['max_size']      = 15000000;



	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('form_slider_icon_upload')){

		      	$data['status'] = "1";

				$data['error'] =  "Gagal simpan data ".$this->upload->display_errors();

		       

		        //$this->load->view('upload_form', $error);*/

	        }else{

	        	$image_name = $this->upload->data('file_name');

	        	$html = "<span>".$image_name."</span><br>";

				$html = "<div class='col-md-2' id='list".$image_name."' style='width:20% !important;'>";					

				$html .= "<img src='http://". $_SERVER['SERVER_NAME']."/soon/backend/assets/dist/img/sections/". $image_name."' style='width:100px;height:100px;'/><br/>";

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



	public function MiniSlider($idpage,$id_sections){

		$qry_get_mini = $this->db->query("select * from table_section where slider_type ='C'");

		$run_get_mini = $qry_get_mini->result();

		$i=0;

		$arrDetails = "";

		if ( count($run_get_mini) > 0 ){

			foreach ($run_get_mini as $data_get_mini ) {

				$arrDetails[$i] = array( "id_sections" => $run_get_mini[$i]->id, "title_sections" => $run_get_mini[$i]->title, "sec_type" => $run_get_mini[$i]->sec_type , "slider_type" => $run_get_mini[$i]->slider_type, "id_slider" => $run_get_mini[$i]->id, "id_page" =>$idpage);

				$i++;

			}

		}

		

		$data['page'] = $this->mainmodel->getPageById($idpage);

		$data['sections_list'] = $arrDetails;

		$this->load->view("section_mini_slider_add",$data);



	}



	public function AddMiniSlider($id_section,$id_slider,$id_page){

		$this->db->query("insert into table_section_slider(id_section,id_slider,status,type)values('3','$id_slider','A','B')");

		redirect("Section/SectionDetailSlider/".$id_section."/".$id_page);

	}



	



}

