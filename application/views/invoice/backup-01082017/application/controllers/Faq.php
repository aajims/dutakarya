<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('mainmodel');
    }
	
	public function Promos(){
		redirect("Promo");
		if ( ! (isset($_SESSION['lang_paypro'])) ){		
			$this->session->set_userdata("lang_paypro", "en");
		}
	
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
		
		$data['promo_service'] = $this->mainmodel->getPromoService();
		$this->load->view("promo_service",$data);
	}

	public function Privacy(){
		if ( ! (isset($_SESSION['lang_paypro'])) ){		
			$this->session->set_userdata("lang_paypro", "en");
		}
	

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

		switch ( $_SESSION['lang_paypro'] ){
			case "en":
				$data['footer'] = $this->mainmodel->getListFooter();
				$this->load->view("privacy",$data);
			break;
			case "id":
				$data['footer'] = $this->mainmodel->getListFooter();
				$this->load->view("privacy_id",$data);
			break;
		}		
	}
}

?>