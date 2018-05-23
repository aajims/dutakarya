<?php
class Mainmodel extends CI_Model {

   

    public function getMainSlider(){

      if ( ! ( isset($_SESSION['lang_paypro']))){
        $_SESSION['lang_paypro'] = "id";
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
              $arrSection[$i] = array( "bg_type" => $run_section[0]->bg_type, "background" => $run_section[0]->background, "description" => $run_section[0]->background, "images" => $run_section[0]->images, "title" => $run_section[0], "sec_type" => $run_section[0]->sec_type, "id_slider" => $run_section[0]->id_slider, "id" => $run_section[0]->id, "slider_type" => $run_section[0]->slider_type);
            }else{
                 $arrSection[$i] = array( "bg_type" => $run_section[0]->bg_type, "background" => $run_section[0]->background, "description" => $run_section[0]->background, "images" => $run_section[0]->images, "title" => $run_section[0], "sec_type" => $run_section[0]->sec_type, "id_slider" => $run_section[0]->id_slider, "id" => $run_section[0]->id_main, "slider_type" => $run_section[0]->slider_type);
            }
          }
          $i++;
        }
      }
      return $arrSection;
    }

    public function getSliderListById($id_section){

      if ( $_SESSION['lang_paypro'] == "id" ){ 
        $table_slider = "table_slider";
      }else{
        $table_slider = "table_slider_en";
      }

      $qry_get_slider_list = $this->db->query("select * from table_section_slider where id_section ='$id_section' order by id asc");
      $run_get_slider_list = $qry_get_slider_list->result();
      $i=0;
      $arrSliderList = "";

      if ( count($run_get_slider_list) > 0 ){
        foreach ( $run_get_slider_list as $data_get_slider_list ){
          $idSlider = $run_get_slider_list[$i]->id_slider;
          if ( $run_get_slider_list[$i]->type == "A" ){
            $qry_get_slider_detail = $this->db->query("select * from $table_slider where id ='$idSlider'");
            $run_get_slider_detail = $qry_get_slider_detail->result();

            $arrSliderList[$i] = array("title" => $run_get_slider_detail[0]->title, "img" => $run_get_slider_detail[0]->img, "content" => $run_get_slider_detail[0]->content, "background" => $run_get_slider_detail[0]->background, "icon" => $run_get_slider_detail[0]->icon, "minislider" => "", "type" => $run_get_slider_list[$i]->type );
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
              $arrSliderList[$i] = array("title" => $run_get_slider_detail[0]->title, "img" => $run_get_slider_detail[0]->img, "content" => $run_get_slider_detail[0]->content, "background" => $run_get_slider_detail[0]->background, "icon" => $run_get_slider_detail[0]->icon, "minislider" => $arrMini, "type" => $run_get_slider_list[$i]->type );
          }

          $i++;
        }
      }
      return $arrSliderList;
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

}