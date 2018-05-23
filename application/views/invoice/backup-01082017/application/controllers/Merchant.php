<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchant extends CI_Controller {

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

		/*if ( ! (isset($_SESSION['lang_paypro'])) ){		
			$this->session->set_userdata("lang_paypro", "en");
		}
		$data['merchant'] = $this->mainmodel->GetMerchant();
		$data['footer'] = $this->mainmodel->getListFooter();
		$this->load->view("merchant",$data);*/
		
		switch ( $_SESSION['lang_paypro'] ){
			case "en":
				$data['footer'] = $this->mainmodel->getListFooter();
				$this->load->view("merchant",$data);
			break;
			case "id":
				$data['footer'] = $this->mainmodel->getListFooter();
				$this->load->view("merchant_id",$data);
			break;
		}
	}
}

?>