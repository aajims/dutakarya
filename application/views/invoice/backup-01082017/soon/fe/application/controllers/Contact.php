<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('mainmodel');
    }

	public function index(){
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
		$data['footer'] = $this->mainmodel->getListFooter();
		$this->load->view('contact',$data);
	}

	public function Savecontact(){
		$Contact_sFirstname = $this->input->post("Contact_sFirstname");
		$Contact_sEmail = $this->input->post("Contact_sEmail");
		$Contact_sLastname = $this->input->post("Contact_sLastname");
		$Contact_sTo = str_replace("'", "", $this->input->post("Contact_sTo"));
		$Contact_sMessage = $this->input->post("Contact_sMessage");
		$checkbox = $this->input->post("checkbox");
		$currdate = date("Y-m-d H:i:s");
		$this->db->query("insert into table_contact(email,interest,fullname,telepon,message,created_at)values('$Contact_sEmail','$Contact_sTo','$Contact_sFirstname','$Contact_sLastname','$Contact_sMessage','$currdate')");
		$data['result'] = "success";
		$data['message'] = "Terima kasih telah menghubungi kami. Kami akan segera menjawab pesan anda";
		//echo json_encode($data);
		redirect("Contact/Success");
	}
	
	public function Success(){
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
		$this->load->view("success",$data);
	}
}
