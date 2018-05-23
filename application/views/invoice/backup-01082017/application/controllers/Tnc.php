<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tnc extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('mainmodel');
    }
	
	public function index(){
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
				$this->load->view("tnc",$data);
			break;
			case "id":
				$data['footer'] = $this->mainmodel->getListFooter();
				$this->load->view("tnc_id",$data);
			break;
		}		
	}

	public function Privacy(){
		if ( ! (isset($_SESSION['lang_paypro'])) ){		
			$this->session->set_userdata("lang_paypro", "en");
		}
		
		
		switch ( $_SESSION['lang_paypro'] ){
			case "en":
				$data['footer'] = $this->mainmodel->getListFooter();
				$this->load->view("privacy",$data);
			break;
			case "id":
				$data['footer'] = $this->mainmodel->getListFooter();
				$this->load->view("privacy",$data);
			break;
		}		
	}
}

?>