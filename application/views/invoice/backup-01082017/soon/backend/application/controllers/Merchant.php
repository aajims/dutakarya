<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchant extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('mainmodel');
    }
    

	public function index(){
		if ( isset($_SESSION['users_id'])){
			$data['merchant'] = $this->mainmodel->getKategoriMerchant();
			$this->load->view("merchant_list",$data);
		}else{
			redirect(base_url());
		}
	}

	public function AddKategori(){
		if ( isset($_SESSION['users_id'])){
			$promo_kategori = $this->db->escape($this->input->post("promo_kategori"));
			$promo_kategori_en = $this->db->escape($this->input->post("promo_kategori_en"));
			$currdate = date("Y-m-d H:i:s");
			$this->db->query("insert into table_merchant (kategori,created_at)values($promo_kategori,'$currdate')");
			$qry_id_main = $this->db->query("select * from table_merchant where kategori = $promo_kategori order by id limit 0,1");
			$run_id_main = $qry_id_main->result();
			$id_main = $run_id_main[0]->id;
			$this->db->query("insert into table_merchant_en(kategori,id_main,created_at)values($promo_kategori_en,'$id_main','$currdate')");
			redirect("Merchant");
		}else{
			redirect(base_url());
		}

	}

	public function DelMerchant($uid){
		if ( isset($_SESSION['users_id'])){
			$this->db->query("delete from table_merchant where id ='$uid'");
			$this->db->query("delete from table_merchant_en where id_main ='$uid'");
			$this->db->query("delete from table_merchant_name where kategori ='$uid'");
			$this->db->query("delete from table_merchant_name_en where kategori ='$uid'");
			redirect("Merchant");
		}else{
			redirect(base_url());
		}
	}

	public function DetailKategori($id){
		if ( isset($_SESSION['users_id'])){
			$qry_detail_kategori = $this->db->query("select * from table_merchant_name where kategori ='$id'");
     		$run_detail_kategori = $qry_detail_kategori->result();

			$data['id'] = $id;
			$data['run_detail_kategori'] = $run_detail_kategori;
			$this->load->view("merchant_kategori",$data);
		}else{
			redirect(base_url());
		}
	}

	public function SaveMerchantName(){
		if ( isset($_SESSION['users_id'])){
			$promo_kategori_id = $this->input->post("promo_kategori_id");
			$merchant_name = $this->db->escape($this->input->post("merchant_name"));
			$merchant_name_en = $this->db->escape($this->input->post("merchant_name_en"));
			$currdate = date("Y-m-d H:i:s");
			$this->db->query("insert into table_merchant_name(name,kategori,created_at)values($merchant_name,'$promo_kategori_id','$currdate')");
			$qry_id = $this->db->query("select * from table_merchant_name where name = $merchant_name_en");
			$run_id = $qry_id->result();
			$id_main = $run_id[0]->id;
			$this->db->query("insert into table_merchant_name_en(name,kategori,created_at,id_main)values($merchant_name_en,'$promo_kategori_id','$currdate','$id_main')");
			redirect("Merchant/DetailKategori/".$promo_kategori_id);
		}else{
			redirect(base_url());
		}
	}

	public function DelMerchantName($uid,$kategoriid){
		if ( isset($_SESSION['users_id'])){
			//echo "delete from table_merchant_name where id ='$uid'";
			//echo "delete from table_merchant_name_en where id_main ='$uid'";die;
			$this->db->query("delete from table_merchant_name where id ='$uid'");
			$this->db->query("delete from table_merchant_name_en where id_main ='$uid'");
			redirect("Merchant/DetailKategori/".$kategoriid);
		}else{
			redirect(base_url());
		}
	}
}

?>