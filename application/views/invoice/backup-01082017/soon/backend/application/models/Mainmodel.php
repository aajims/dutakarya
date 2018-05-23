<?php
class Mainmodel extends CI_Model {


    public function getSuscriber() {
        $query_get_suscriber = $this->db->query("select *,day(created_at) as dates, month(created_at) as months, year(created_at) as years from table_suscriber where status ='A' order by id desc");
        $run_get_suscriber = $query_get_suscriber->result();
        return $run_get_suscriber;
    }

    public function getContact(){
    	$qry_get_contact = $this->db->query("select * from table_contact order by id desc");
    	$run_get_contact = $qry_get_contact->result();
    	return $run_get_contact;
    }

    public function getPromo(){
    	$qry_get_promo = $this->db->query("select * from table_promo order by id desc");
    	$run_get_promo = $qry_get_promo->result();
    	return $run_get_promo;
    }

    public function getSlider(){
        $qry_get_slider = $this->db->query("select * from table_slider where type in ('B','A') order by id desc");
        $run_get_slider = $qry_get_slider->result();
        $i = 0;
        $arrSlider = "";
        foreach ( $run_get_slider as $data_slider ){
          $id_slider = $run_get_slider[$i]->id;
          
          $qry_section_slider = $this->db->query("select * from table_section_slider where id_slider ='$id_slider'");
          $run_section_slider = $qry_section_slider->result();
          
          if ( count($run_section_slider) > 0 ){
            $id_section = $run_section_slider[0]->id_section;

            $qry_get_section = $this->db->query("select * from table_page_sections where id_sections ='$id_section'");
            $run_get_section = $qry_get_section->result();
            if ( sizeof($run_get_section) > 0 ){
               $id_page = $run_get_section[0]->id_page;
              $qry_get_page = $this->db->query("select * from table_page where id ='$id_page'");
              $run_get_page = $qry_get_page->result();
              $page_title = $run_get_page[0]->page;
            }else{
              $page_title = "";
              $id_page = "";
            }
           
            $arrSlider[$i] = array( "img" => $run_get_slider[$i]->img, "status" => $run_get_slider[$i]->status, "title" => $run_get_slider[$i]->title, "links" => $run_get_slider[$i]->links, "page" => $page_title, "id" => $id_slider );
          }else{
             $arrSlider[$i] = array( "img" => $run_get_slider[$i]->img, "status" => $run_get_slider[$i]->status, "title" => $run_get_slider[$i]->title, "links" => $run_get_slider[$i]->links, "page" => "Home", "id" => $id_slider );
          }

          $i++; 
        }
        return $arrSlider;
    }

    public function getNewsletter(){
        $qry_get_newsletter = $this->db->query("select *,day(created_at) as dates, month(created_at) as months, year(created_at) as years from table_newsletter order by id desc");
        $run_get_newsletter = $qry_get_newsletter->result();
        return $run_get_newsletter;
    }

    public function getNewsletterById($id){
        $qry_get_newsletter = $this->db->query("select * from table_newsletter where id ='$id'");
        $run_get_newsletter = $qry_get_newsletter->result();
        return $run_get_newsletter;
    }

    
    public function getPage(){
      $qry_get_page = $this->db->query("select * from table_page order by id desc");
      $run_get_page = $qry_get_page->result();
      $i=0;
      $arrPage = "";
      foreach ( $run_get_page as $data_page ){
        $idPage = $run_get_page[$i]->id;
        $qry_section = $this->db->query("select * from table_page_sections where id_page ='$idPage'");
        $run_section = $qry_section->result();
        $arrPage[$i] = array( "page" => $run_get_page[$i]->page, "sumSection" => count($run_section), "id" => $idPage);
        $i++;
      }

      return $arrPage;
    }

    public function getListSectionsByPage($id){
      $qry_get_details = $this->db->query("select * from table_page_sections where id_page ='$id'");
      $run_get_details = $qry_get_details->result();
      $i=0;
      $arrDetails = "";

      foreach ( $run_get_details as $data_get_details ){
        $id_sections = $run_get_details[$i]->id_sections;
        $qry_section_detail = $this->db->query("select * from table_section where id ='$id_sections'");
        $run_section_detail = $qry_section_detail->result();
		//if ( count($run_section_detail) > 0 ){
        $arrDetails[$i] = array( "id_sections" => $id_sections, "title_sections" => $run_section_detail[0]->title, "status" => $run_get_details[$i]->status, "sec_type" => $run_section_detail[0]->sec_type ,"order_section" => $run_get_details[$i]->order_section, "slider_type" => $run_section_detail[0]->slider_type);
		//}
        $i++;
      }
      return $arrDetails;
    }

    public function getPageById($id){
      $qry_get_page = $this->db->query("select * from table_page where id ='$id'");
      $run_get_page = $qry_get_page->result();
      return $run_get_page;
    }

    public function getSectionById($id){
      $qry_section_detail = $this->db->query("select * from table_section where id ='$id'");
      $run_section_detail = $qry_section_detail->result();
      return $run_section_detail;
    }

    public function getSectionEnById($id){
      $qry_section_detail = $this->db->query("select * from table_section_en where id_main ='$id'");
      $run_section_detail = $qry_section_detail->result();
      return $run_section_detail;
    }

    public function getSliderById($id){
        $qry_get_slider = $this->db->query("select * from table_slider where id ='$id' order by id desc");
        $run_get_slider = $qry_get_slider->result();
        return $run_get_slider;
    }

    public function getPrivilege(){
      $qry_get_privilege = $this->db->query("select * from table_privilege order by id desc");
      $run_get_privilege = $qry_get_privilege->result();
      return $run_get_privilege;

    }

    public function getMiniSlider(){
        $qry_get_slider = $this->db->query("select * from table_slider where type ='C' order by id desc");
        $run_get_slider = $qry_get_slider->result();
        $i = 0;
        $arrSlider = "";
        foreach ( $run_get_slider as $data_slider ){
          $id_slider = $run_get_slider[$i]->id;
          
          $qry_section_slider = $this->db->query("select * from table_section_slider where id_slider ='$id_slider'");
          $run_section_slider = $qry_section_slider->result();

          if ( count($run_section_slider) > 0 ){
            $id_section = $run_section_slider[0]->id_section; 
            $qry_get_page_section = $this->db->query("select * from table_page_sections where id_sections ='$id_section'");
            $run_get_page_section = $qry_get_page_section->result();
            if ( count($run_get_page_section) > 0 ){
              $id_page = $run_get_page_section[0]->id_page;
              $qry_get_page = $this->db->query("select * from table_page where id ='$id_page'");
              $run_get_page = $qry_get_page->result();
              $page_title = $run_get_page[0]->page;
            }else{
              $page_title = "";
            }         
            /**/

            $arrSlider[$i] = array( "img" => $run_get_slider[$i]->img, "status" => $run_get_slider[$i]->status, "title" => $run_get_slider[$i]->title, "links" => $run_get_slider[$i]->links, "id" => $id_slider, "page" => $page_title );
          }else{
             $arrSlider[$i] = array( "img" => $run_get_slider[$i]->img, "status" => $run_get_slider[$i]->status, "title" => $run_get_slider[$i]->title, "links" => $run_get_slider[$i]->links, "id" => $id_slider, "page" => "" );
          }

          $i++; 
        }
        return $arrSlider;
    }

    public function getListFooter(){
      $qry_get_page = $this->db->query("select * from table_master_menu ");
      $run_get_page = $qry_get_page->result();
      $i=0;
      $arrPage = "";

      if ( count($run_get_page) && $run_get_page !== "" ){
        foreach ( $run_get_page as $data_get_page ){
          $id_page = $run_get_page[$i]->id;
          $qry_get_footer = $this->db->query("select * from table_footer where page ='$id_page'");
          $run_get_footer = $qry_get_footer->result();
          $j=0;
          $arrSub = "";
          if ( count($run_get_footer) > 0 ){
            foreach ( $run_get_footer as $data_get_footer){
              $arrSub[$j] = array("title_submenu" => $run_get_footer[$j]->title, "links" => $run_get_footer[$j]->links);
              $j++;
            }
          }
          $arrPage[$i] = array("page_id" => $id_page, "title" =>  $run_get_page[$i]->title, "submenu" => $arrSub);
          $i++;
        }        
      }  
      return $arrPage;    
    }

    public function getKategoriPromo(){
      $qry_get_kategori = $this->db->query("select * from table_kategori_promo");
      $run_get_kategori = $qry_get_kategori->result();
      return $run_get_kategori;
    }

    public function GetPromoByKategori($id){
      $qry_get_promo = $this->db->query("select *,day(created_at) as tgl, month(created_at)as bln, year(created_at) as thn from table_promo where kategori ='$id'");
      $run_get_promo = $qry_get_promo->result();
      return $run_get_promo;
    }

    public function getKategoriById($id){
      $qry_get_detail_kategori = $this->db->query("select * from table_kategori_promo where id ='$id'");
      $run_get_detail_kategori = $qry_get_detail_kategori->result();
      return $run_get_detail_kategori;
    }

    public function getPromoServices(){
      $qry_get_service = $this->db->query("select *,day(created_at) as tgl, month(created_at)as bln, year(created_at) as thn from table_service");
      $run_get_service = $qry_get_service->result();
      return $run_get_service;
    }

    public function getKategoriMerchant(){
      $qry_get_kategori = $this->db->query("select * from table_merchant");
      $run_get_kategori = $qry_get_kategori->result();
      return $run_get_kategori;
    }
}