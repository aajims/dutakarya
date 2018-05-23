<?php



defined('BASEPATH') OR exit('No direct script access allowed');







class Main extends CI_Controller {







	function __construct(){



        parent::__construct();



		$this->load->helper('url');



		$this->load->model('mainmodel');



		//$this->load->library('mcapi');



    }







	public function index(){

		if ( ! (isset($_SESSION['lang_paypro'])) ){		

			$this->session->set_userdata("lang_paypro", "id");

		}

	

	

		/*Translation*/

		if ( isset($_SESSION['lang_paypro'])) {

			if ( ($_SESSION['lang_paypro'] == "id" )){ 

		       $file_trans = "paypro_id.txt";

	      	}else{

		       $file_trans = "paypro_en.txt";

	      	}

		}else{

			$_SESSION['lang_paypro'] = "en";

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







		$data['slider'] = $this->mainmodel->getMainSlider();



		$section_list = $this->mainmodel->getSection("5");



		$i=0;



		$arr_page_section = "";



		if ( count($section_list) > 0 && $section_list !== ""){



			foreach ( $section_list as $data_section_list ){



				if ( $section_list[$i]['sec_type'] == "H" ){



					$arr_page_section[$i] = array( "sec_type" => $section_list[$i]['sec_type'], "html" => $section_list[$i] , "slider" => "", "slider_type" => $section_list[$i]['slider_type'],"id_section" => $section_list[$i]['id_section'], "sec_class" => $section_list[$i]['sec_class'], "gif" => $section_list[$i]['gif']);



				}else{



					$id_section = $section_list[$i]['id'];



					$get_slider_list = $this->mainmodel->getSliderListById($id_section);



					$arr_page_section[$i] = array( "sec_type" => $section_list[$i]['sec_type'], "html" => "", "slider" => $get_slider_list, "slider_type" => $section_list[$i]['slider_type'], "id_section" => $section_list[$i]['id_section'], "sec_class" => $section_list[$i]['sec_class'], "gif" => $section_list[$i]['gif']);



				}



				



				$i++;



			}



		}







		/*echo "<pre>";



		print_r($arr_page_section);*/



		$data['page_section'] = $arr_page_section;



		$data['footer'] = $this->mainmodel->getListFooter();



		$this->load->view('main',$data);



	}







	public function SaveSuscriber(){
		echo "masuk";
		$Newsletter_email = $this->input->post("Newsletter_email");
		$currdate = date("Y-m-d H:i:s");
		$this->db->query("insert into table_suscriber(email,created_at,status)values('$Newsletter_email','$currdate','A')");
		//echo "insert into table_suscriber(email,created_at,status)values('$Newsletter_email','$currdate','A')";die;
		$data['result'] = "success";
		$data['message'] = "Thank you for subscribe";		
		//$this->mcapi->listSubscribe("265e143f35", $Newsletter_email);  
		
		//$data['result'] = "success";
		//$data['message'] = "Thank you for subscribe";

		echo json_encode($data);



	}







	public function Setlanguage($language){



		$_SESSION['lang_paypro'] = $language;



		redirect(base_url());



	}



}



