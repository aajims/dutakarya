<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('mainmodel');
    }

	public function index()
	{
		/*Translation
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
		

		$this->load->view('sticker',$data);*/
		
		if ( ! (isset($_SESSION['lang_paypro'])) ){		
			$this->session->set_userdata("lang_paypro", "en");
		}


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
	
		switch ( $_SESSION['lang_paypro'] ){
			case "en":
				$data['footer'] = $this->mainmodel->getListFooter();
				$this->load->view("service_type",$data);
			break;
			case "id":
				$data['footer'] = $this->mainmodel->getListFooter();
				$this->load->view("service_type_id",$data);
			break;
		}		
	}
}
