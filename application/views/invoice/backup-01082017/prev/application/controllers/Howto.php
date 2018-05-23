<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Howto extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('mainmodel');
    }

	public function index(){
		$data['slider'] = $this->mainmodel->getMainSlider();
		$section_list = $this->mainmodel->getSection("2");
		$i=0;
		$arr_page_section = "";
		
		/*Translation*/
		if ( $_SESSION['lang_paypro'] == "id" ){ 
	       $file_trans = "paypro_id.txt";
      	}else{
	       $file_trans = "paypro_en.txt";
      	}
		$openfile = fopen("./assets/trans/".$file_trans, "r");
		$k=0;
		if ($openfile) {
			while (!feof($openfile)) {
				$translation_words[$k] = fgets($openfile);
				$k++;
			}
			$data['words'] = $translation_words;
		}
		/*Translation*/

		if ( $section_list !== "" ){
			foreach ( $section_list as $data_section_list ){
				if ( $section_list[$i]['sec_type'] == "H" ){
					$arr_page_section[$i] = array( "sec_type" => $section_list[$i]['sec_type'], "html" => $section_list[$i] , "slider" => "");
				}else{
					$id_section = $section_list[$i]['id'];
					$get_slider_list = $this->mainmodel->getSliderListById($id_section);
					$arr_page_section[$i] = array( "sec_type" => $section_list[$i]['sec_type'], "html" => "", "slider" => $get_slider_list, "background" => $section_list[$i]['background']);
				}
				
				$i++;
			}
		}
		$data['page_section'] = $arr_page_section;
		$this->load->view('howto',$data);
	}

	public function SaveSuscriber(){
		$Newsletter_email = $this->input->post("Newsletter_email");
		$currdate = date("Y-m-d H:i:s");
		$this->db->query("insert into table_suscriber(email,created_at,status)values('$Newsletter_email','$currdate','A')");
		$data['result'] = "success";
		$data['message'] = "Terima kasih telah menjadi suscriber kami";
		echo json_encode($data);
	}
}
