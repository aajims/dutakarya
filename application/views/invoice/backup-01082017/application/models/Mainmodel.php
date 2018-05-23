<?php
class Mainmodel extends CI_Model {

   

    public function getMainSlider(){

      if ( ! ( isset($_SESSION['lang_paypro']))){
        $_SESSION['lang_paypro'] = "en";
      }
      
      if ( $_SESSION['lang_paypro'] == "id" ){ 
        $table_slider = "table_slider";
      }else{
        $table_slider = "table_slider_en";
      }

      $qry_get_main_slider = $this->db->query("select * from $table_slider where ( section ='N' and status ='A' and type in ('A','B'))");
      $run_get_main_slider = $qry_get_main_slider->result();
      return $run_get_main_slider;
    }

    public function getSection($idpage){
      if ( $_SESSION['lang_paypro'] == "id" ){ 
        $table_section = "table_section  where id  ";
      }else{
        $table_section = "table_section_en  where id_main ";
      }

      $qry_get_section = $this->db->query("select * from table_page_sections where status ='A' and id_page ='$idpage' order by order_section");
      $run_get_section = $qry_get_section->result();
      $i=0;
      $arrSection = "";
      if ( count($run_get_section) > 0 ){
        foreach ( $run_get_section as $data_run_section ){
          $id_section = $run_get_section[$i]->id_sections;
          $qry_section = $this->db->query("select * from $table_section ='$id_section'");
          $run_section = $qry_section->result();
          if ( count($run_section) > 0 ){
            if ( $_SESSION['lang_paypro'] == "id" ){ 
              $arrSection[$i] = array( "bg_type" => $run_section[0]->bg_type, "background" => $run_section[0]->background, "description" => $run_section[0]->background, "images" => $run_section[0]->images, "title" => $run_section[0], "sec_type" => $run_section[0]->sec_type, "id_slider" => $run_section[0]->id_slider, "id" => $run_section[0]->id, "slider_type" => $run_section[0]->slider_type, "id_section" => $run_section[0]->id, "sec_class" => $run_section[0]->sec_class, "gif" => $run_section[0]->gif, "type" => $run_section[0]->slider_type );
            }else{
                 $arrSection[$i] = array( "bg_type" => $run_section[0]->bg_type, "background" => $run_section[0]->background, "description" => $run_section[0]->background, "images" => $run_section[0]->images, "title" => $run_section[0], "sec_type" => $run_section[0]->sec_type, "id_slider" => $run_section[0]->id_slider, "id" => $run_section[0]->id_main, "slider_type" => $run_section[0]->slider_type, "id_section" => $run_section[0]->id, "sec_class" => $run_section[0]->sec_class, "gif" => $run_section[0]->gif, "type" => $run_section[0]->slider_type );
            }
          }
          $i++;
        }
      }
      return $arrSection;
    }

    public function getSliderListById($id_section){

      if ( $_SESSION['lang_paypro'] == "id" ){ 
        $table_slider = "table_slider where id ";
      }else{
        $table_slider = "table_slider_en where id_main ";
      }

      $qry_get_slider_list = $this->db->query("select * from table_section_slider where id_section ='$id_section' order by id asc");
      $run_get_slider_list = $qry_get_slider_list->result();
      $i=0;
      $arrSliderList = "";
      if ( count($run_get_slider_list) > 0 ){
        foreach ( $run_get_slider_list as $data_get_slider_list ){
          $idSlider = $run_get_slider_list[$i]->id_slider;
          if ( $run_get_slider_list[$i]->type == "A" ){
            $qry_get_slider_detail = $this->db->query("select * from $table_slider = '$idSlider'");
            $run_get_slider_detail = $qry_get_slider_detail->result();
			if (count($run_get_slider_detail) > 0 ){
				$arrSliderList[$i] = array("idSlider" => $idSlider, "title" => $run_get_slider_detail[0]->title, "img" => $run_get_slider_detail[0]->img, "content" => $run_get_slider_detail[0]->content, "background" => $run_get_slider_detail[0]->background, "icon" => $run_get_slider_detail[0]->icon, "minislider" => "", "type" => $run_get_slider_list[$i]->type, "sec_class" => $run_get_slider_detail[0]->sec_class, "gif" => $run_get_slider_detail[0]->gif, "link" => $run_get_slider_detail[0]->links);
			}
          }else{
              $id_mini_slider = $run_get_slider_list[$i]->id_slider;
              $qry_get_mini = $this->db->query("select * from table_section_slider where id_section ='$id_mini_slider'");
              $run_get_mini = $qry_get_mini->result();
              $k=0;
              $arrMini = "";
              if ( count($run_get_mini) > 0 ){
                foreach ($run_get_mini as $data_run_get_mini) {
                    $id_slider = $run_get_mini[$k]->id_slider;
                    $qry_get_slider = $this->db->query("select * from table_slider where id ='$id_slider'");
                    $run_get_slider = $qry_get_slider->result();
                    $arrMini[$k] = ($run_get_slider[0]->img);
                    $k++;
                }  
                
              }
              /* $arrSliderList[$i] = array("title" => $run_get_slider_detail[0]->title, "img" => $run_get_slider_detail[0]->img, "content" => $run_get_slider_detail[0]->content, "background" => $run_get_slider_detail[0]->background, "icon" => $run_get_slider_detail[0]->icon, "minislider" => $arrMini, "type" => $run_get_slider_list[$i]->type  );*/
			  $arrSliderList[$i] = array("title" => "", "img" => "", "content" => "", "background" => "", "icon" =>"", "minislider" => $arrMini, "type" => $run_get_slider_list[$i]->type);
          }

          $i++;
        }
      }
      return $arrSliderList;
    }

     public function getListFooter(){

      if ( $_SESSION['lang_paypro'] == "id" ){ 
        $table_master_menu = "table_master_menu where id ";
        $table_footer = "table_footer"; 
      }else{
        $table_master_menu = "table_master_menu_en where id_main ";
        $table_footer = "table_footer_en"; 
      }

      $qry_get_page = $this->db->query("select * from $table_master_menu ");
      $run_get_page = $qry_get_page->result();
      $i=0;
      $arrPage = "";
      if ( count($run_get_page) && $run_get_page !== "" ){
        foreach ( $run_get_page as $data_get_page ){
          if ( $_SESSION['lang_paypro'] == "id" ){ 
            $id_page = $run_get_page[$i]->id; 
          }else{
            $id_page = $run_get_page[$i]->id_main; 
          }

          
          $qry_get_footer = $this->db->query("select * from $table_footer where page ='$id_page'");
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

    public function GetPromo(){
      if ( $_SESSION['lang_paypro'] == "id" ){ 
        $table_promo = "table_promo ";
      }else{
        $table_promo = "table_promo_en  ";
      }

      $qry_get_promo = $this->db->query(" select *,day(created_at) as tgl, month(created_at)as bln, year(created_at) as thn from $table_promo where status ='A' order by id desc");
      $run_get_promo = $qry_get_promo->result();
      return $run_get_promo;
    }

    public function GetListPromo($start,$limit){
      if ( $_SESSION['lang_paypro'] == "id" ){ 
        $table_promo = "table_promo ";
      }else{
        $table_promo = "table_promo_en  ";
      }

      $qry_get_promo = $this->db->query(" select *,day(created_at) as tgl, month(created_at)as bln, year(created_at) as thn from $table_promo where status ='A' order by id desc limit $start,$limit ");
      $run_get_promo = $qry_get_promo->result();
      return $run_get_promo;
    }

    public function getPromoService(){
      if ( $_SESSION['lang_paypro'] == "id" ){ 
        $table_service = "table_service ";
      }else{
        $table_service = "table_service_en  ";
      }

      $qry_get_service = $this->db->query(" select *,day(created_at) as tgl, month(created_at)as bln, year(created_at) as thn from $table_service where status ='A' order by id desc");
      $run_get_service = $qry_get_service->result();
      return $run_get_service;
    }

    public function GetMerchant(){
      if ( $_SESSION['lang_paypro'] == "id" ){ 
        $table_kategori = "table_merchant ";
        $table_merchant = "table_merchant_name ";
      }else{
        $table_kategori = "table_merchant_en  ";
        $table_merchant = "table_merchant_name_en ";
      }

      $qry_get_kategori = $this->db->query("select * from $table_kategori");
      $run_get_kategori = $qry_get_kategori->result();
      $i=0;
      $k=0;
      $arrMerchant = "";
      if ( count($run_get_kategori) > 0 ){
        foreach ($run_get_kategori as $data_kategori ) {
   
            
            if ( $_SESSION['lang_paypro'] == "id" ){ 
              $idkatergori = $run_get_kategori[$i]->id;
            }else{
              $idkatergori = $run_get_kategori[$i]->id_main;
            }

          $kategori = $run_get_kategori[$i]->kategori;
          $qry_get_merchant = $this->db->query("select * from $table_merchant where kategori = '$idkatergori'");
          $run_get_merchant = $qry_get_merchant->result();
          if ( count($run_get_merchant) > 0 ){
            $j=0;
            foreach ($run_get_merchant  as $data_get_merchant ) {
               $arrMerchant[$k] = array("merchant" => $run_get_merchant[$j]->name, "kategori" => $kategori );
               $j++;
               $k++;
            }
           
          }
          
          $i++;
        }
      }
      return $arrMerchant;
    }

}