<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_karyawan extends CI_Model {

	var $table = 'karyawan';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function tampil_karyawan(){
		return $this->db->get('karyawan');
	}
	

	function tampilkan(){
	   $this->db->SELECT('*');
       $this->db->FROM('karyawan');
       $this->db->join('partner','partner.id_partner=karyawan.id_partner', 'left');
       $query=$this->db->get();
       return $query->result();
    }
			
    function tampil(){
       $this->db->SELECT('karyawan.id_karyawan,karyawan.kd_karyawan,karyawan.nm_karyawan,karyawan.no_telepon,karyawan.tgl_lahir,karyawan.jabatan,karyawan.akhir_kontrak,partner.nm_partner');	
       $this->db->from('karyawan');	   
	   $this->db->join('partner','partner.id_partner=karyawan.id_partner');
       $query=$this->db->get();
       return $query->result();
    }
	
	function buat_kode()   {    
	  $this->db->select('RIGHT(karyawan.kd_karyawan,2) as kode', FALSE);
	  $this->db->order_by('kd_karyawan','DESC');    
	  $this->db->limit(1);     
	  $query = $this->db->get('karyawan');        
	  if($query->num_rows() <> 0){       
	   //jika kode ternyata sudah ada.      
	   $data = $query->row();      
	   $kode = intval($data->kode) + 1;     
	  }
	  else{       
	   //jika kode belum ada      
	   $kode = 1;     
	  }
	  $today=date('Ym');
	  $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT);    
	  $kodejadi = "DKS-".$today.$kodemax;     
	  return $kodejadi;  
	 }
	
	function get($id){
        $this->db->SELECT('*');
		$this->db->from($this->table);
        $this->db->join('partner','partner.id_partner=karyawan.id_partner', 'left');
        $this->db->join('bank','bank.id_bank=karyawan.id_bank', 'left');
		$this->db->where('id_karyawan',$id);
		$query = $this->db->get();
		return $query->row();
	}

	
    function tambah($data){    	
        $this->db->insert('karyawan',$data);
		return true;			
    }
	
    function update($where, $data){
       $this->db->update($this->table, $data, $where);
	return $this->db->affected_rows();
    }

    public function delete_id($id)	{
	$this->db->where('id_karyawan', $id);
	$this->db->delete($this->table);
	}
	
	function lapo($from,$to,$sumber){
		 $this->db->SELECT('kas_keluar.id_keluar,kas_keluar.kwitansi,kas_keluar.keperluan,kas_keluar.tgl_keluar,kas_keluar.nominal,kas_keluar.id_kas,guru.nm_guru,kas.dana');
		 $this->db->WHERE('kas_keluar.id_kas',$sumber);
		 $this->db->WHERE('tgl_keluar BETWEEN "'. date('Y-m-d', strtotime($from)). '" and "'. date('Y-m-d', strtotime($to)).'"');		         
	     $this->db->join('guru','guru.id_guru=kas_keluar.id_guru');
	   	 $this->db->join('kas','kas.id_kas=kas_keluar.id_kas');	           
	     return $this->db->get('kas_keluar');
	}
	
	function laporan($from,$to){
		$this->db->SELECT('karyawan.id_karyawan,karyawan.kd_karyawan,karyawan.nm_karyawan,karyawan.no_telepon,karyawan.tgl_lahir,karyawan.jabatan,karyawan.akhir_kontrak,partner.nm_partner');
		$this->db->WHERE('akhir_kontrak BETWEEN "'. date('Y-m-d', strtotime($from)). '" and "'. date('Y-m-d', strtotime($to)).'"');	
		$this->db->join('partner','partner.id_partner=karyawan.id_partner');	     	           
	    return $this->db->get($this->table);
	}
	
	function pdf($from,$to){
		$this->db->SELECT('karyawan.id_karyawan,karyawan.kd_karyawan,karyawan.nm_karyawan,karyawan.no_telepon,karyawan.tgl_lahir,karyawan.jabatan,karyawan.akhir_kontrak,partner.nm_partner');
		$this->db->WHERE('akhir_kontrak BETWEEN "'. date('Y-m-d', strtotime($from)). '" and "'. date('Y-m-d', strtotime($to)).'"');	
		$this->db->join('partner','partner.id_partner=karyawan.id_partner');	     	           
	    return $this->db->get($this->table);
	}
	
}
