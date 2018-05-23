<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('mainmodel');
    }
    

	public function index()
	{
		if ( isset($_SESSION['users_id'])){
			$data['total_suscriber'] = count($this->mainmodel->getSuscriber());
			$data['total_contact'] = count($this->mainmodel->getContact());
			$data['total_promo'] = count($this->mainmodel->getPromo());
			$data['contact'] = $this->mainmodel->getContact();
			$arrsuscriber = "";
			$arrcontact = "";
			$arrbulan = "";
			$i=0;
			for ( $bulan = 1; $bulan <= date("m"); $bulan++ ){
				$arrbulan[$i] = ($bulan);
				$i++;
			}
			$i=0;
			foreach ( $arrbulan as $data_arrbulan ){
				$bulan = $arrbulan[$i];
				$tahun = date("Y");
				
				$qry_get_suscriber = $this->db->query("select * from table_suscriber where month(created_at) = '$bulan' and year(created_at) ='$tahun'");
				$run_get_suscriber = $qry_get_suscriber->result();
				$arrsuscriber.= $bulan.",".date("Y").",".count($run_get_suscriber)."<>";

				$qry_get_contact = $this->db->query("select * from table_contact where month(created_at) = '$bulan' and year(created_at) ='$tahun'");
				$run_get_contact = $qry_get_contact->result();
				$arrcontact .= $bulan.",".date("Y").",".count($run_get_contact)."<>";

				$i++;
			} 
			$data['arrsuscriber'] = trim( $arrsuscriber, "<>");
			$data['arrcontact'] = trim( $arrcontact, "<>") ;
			$this->load->view('home',$data);
		}else{
			redirect("Login");
		}
	}
}
