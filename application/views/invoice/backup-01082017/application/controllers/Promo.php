<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Promo extends CI_Controller {



	function __construct(){

        parent::__construct();

		$this->load->helper('url');

		$this->load->model('mainmodel');

		$this->load->library('pagination');

    }

	

	public function index()	{

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

		$i=0;

		$section_list = $this->mainmodel->getSection("7");

		if ( $section_list !== "" ){

			foreach ( $section_list as $data_section_list ){

				if ( $section_list[$i]['sec_type'] == "H" ){

					$arr_page_section[$i] = array( "sec_type" => $section_list[$i]['sec_type'], "html" => $section_list[$i] , "slider" => "", "background" => "", "type" => "", "id_section" =>  $section_list[$i]['id_section']);

				}else{

					$id_section = $section_list[$i]['id'];

					$get_slider_list = $this->mainmodel->getSliderListById($id_section);

					$arr_page_section[$i] = array( "sec_type" => $section_list[$i]['sec_type'], "html" => "", "slider" => $get_slider_list, "background" => $section_list[$i]['background'], "type" => $section_list[$i]['type'], "id_section" =>  $section_list[$i]['id_section']);

					if ( $get_slider_list[0]['gif'] == "Y" ){

						$gif .= $section_list[$i]['id_section'] .",";

					}

				}

				

				$i++;

			}

		}



		/* Start Paging */

		$config['display_pages'] = FALSE;

		$config['first_link'] = FALSE;

		$config['last_link'] = FALSE;

		$config['total_rows'] = count($this->mainmodel->GetPromo());		

		$config['per_page'] = 6;

		$config['base_url'] = base_url().'Promo/Page/';

		$config['attributes']['rel'] = FALSE;

		$this->pagination->initialize($config);

		/* End Paging */



		$data['promo'] = $this->mainmodel->GetListPromo(0,6);

		$data['page_section'] = $arr_page_section;

		$data['footer'] = $this->mainmodel->getListFooter();		

		$data['pagination'] = $this->pagination->create_links();

		$this->load->view("promo_offers",$data);

	}



	public function Page($start =0)	{

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



		$i=0;

		$section_list = $this->mainmodel->getSection("7");

		if ( $section_list !== "" ){

			foreach ( $section_list as $data_section_list ){

				if ( $section_list[$i]['sec_type'] == "H" ){

					$arr_page_section[$i] = array( "sec_type" => $section_list[$i]['sec_type'], "html" => $section_list[$i] , "slider" => "", "background" => "", "type" => "", "id_section" =>  $section_list[$i]['id_section']);

				}else{

					$id_section = $section_list[$i]['id'];

					$get_slider_list = $this->mainmodel->getSliderListById($id_section);

					$arr_page_section[$i] = array( "sec_type" => $section_list[$i]['sec_type'], "html" => "", "slider" => $get_slider_list, "background" => $section_list[$i]['background'], "type" => $section_list[$i]['type'], "id_section" =>  $section_list[$i]['id_section']);

					if ( $get_slider_list[0]['gif'] == "Y" ){

						$gif .= $section_list[$i]['id_section'] .",";

					}

				}

				

				$i++;

			}

		}



		/* Start Paging */

		$config['display_pages'] = FALSE;

		$config['first_link'] = FALSE;

		$config['last_link'] = FALSE;

		$config['total_rows'] = count($this->mainmodel->GetPromo());		

		$config['per_page'] = 6;

		$config['base_url'] = base_url().'Promo/Page/';

		$config['attributes']['rel'] = FALSE;

		$this->pagination->initialize($config);

		/* End Paging */



		$data['page_section'] = $arr_page_section;

		$data['footer'] = $this->mainmodel->getListFooter();

		$data['promo'] = $this->mainmodel->GetListPromo($start,6);

		$data['pagination'] = $this->pagination->create_links();

		$this->load->view("promo_offers",$data);

	}



	public function DetailPromo($id){
		
		if ( ! (isset($_SESSION['lang_paypro'])) ){		

			$this->session->set_userdata("lang_paypro", "en");

		}
		
		if ( $_SESSION['lang_paypro'] == "id" ){ 

	       $file_trans = "paypro_id.txt";

	       $table_service = "table_promo where id ";
		   $table_master = " table_promo ";

      	}else{

	       $file_trans = "paypro_en.txt";

	       $table_service = "table_promo_en  where id_main ";
		   $table_master = " table_promo_en ";

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



		

		$qry_get_service = $this->db->query(" select *,day(created_at) as tgl, month(created_at)as bln, year(created_at) as thn from $table_service = '$id' order by id desc");

      	$run_get_service = $qry_get_service->result();

      	$data['promo_service'] = $run_get_service;
		
		$nextid = ( $id + 1 );
		$qry_get_total = $this->db->query("select * from $table_master ");
		$run_get_total = $qry_get_total->result();
		
		if ( (count($run_get_total )) < $nextid ){
			$qry_get_id_first = $this->db->query("select * from $table_master limit 0,1");
			$run_get_id_first = $qry_get_id_first->result();
			
			if ( $_SESSION['lang_paypro'] == "id" ){
				$id_first = $run_get_id_first[0]->id;
			}else{
				$id_first = $run_get_id_first[0]->id_main;
			}
			$qry_get_next_promo = $this->db->query(" select *,day(created_at) as tgl, month(created_at)as bln, year(created_at) as thn from $table_service = '$id_first' order by id desc");
			$run_get_next_promo = $qry_get_next_promo->result();			
			$data['run_get_next_promo'] = $run_get_next_promo;
			$data['nextid'] = $run_get_next_promo[0]->id;
		}else{
			$qry_get_next_promo = $this->db->query(" select *,day(created_at) as tgl, month(created_at)as bln, year(created_at) as thn from $table_service = '$nextid' order by id desc");
			$run_get_next_promo = $qry_get_next_promo->result();

			$data['run_get_next_promo'] = $run_get_next_promo;
			$data['nextid'] = $run_get_next_promo[0]->id;
		}
		$data['footer'] = $this->mainmodel->getListFooter();

		$this->load->view("promo_service",$data);

	}

}

