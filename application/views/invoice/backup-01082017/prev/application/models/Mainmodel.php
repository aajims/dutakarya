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

      $qry_get_main_slider = $this->db->query("select * from $table_slider where section ='N' and status ='A'");
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
          if ( $_SESSION['lang_paypro'] == "id" ){ 
            $arrSection[$i] = array( "bg_type" => $run_section[0]->bg_type, "background" => $run_section[0]->background, "description" => $run_section[0]->background, "images" => $run_section[0]->images, "title" => $run_section[0], "sec_type" => $run_section[0]->sec_type, "id_slider" => $run_section[0]->id_slider, "id" => $run_section[0]->id);
          }else{
               $arrSection[$i] = array( "bg_type" => $run_section[0]->bg_type, "background" => $run_section[0]->background, "description" => $run_section[0]->background, "images" => $run_section[0]->images, "title" => $run_section[0], "sec_type" => $run_section[0]->sec_type, "id_slider" => $run_section[0]->id_slider, "id" => $run_section[0]->id_main);
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

      $qry_get_slider_list = $this->db->query("select * from table_section_slider where id_section ='$id_section'");
      $run_get_slider_list = $qry_get_slider_list->result();
      $i=0;
      $arrSliderList = "";
      if ( count($run_get_slider_list) > 0 ){
        foreach ( $run_get_slider_list as $data_get_slider_list ){
          $idSlider = $run_get_slider_list[$i]->id_slider;
          $qry_get_slider_detail = $this->db->query("select * from $table_slider where id ='$idSlider'");
          $run_get_slider_detail = $qry_get_slider_detail->result();
          $arrSliderList[$i] = array("title" => $run_get_slider_detail[0]->title, "img" => $run_get_slider_detail[0]->img, "content" => $run_get_slider_detail[0]->content);
          $i++;
        }
      }
      return $arrSliderList;
    }

}