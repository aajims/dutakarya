<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_gaji extends CI_Model {

	var $table = 'gaji';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function tampil_gaji(){
		return $this->db->get($this->table);
	}
	
	function tampil(){       	
       $this->db->FROM($this->table);
	   $this->db->WHERE('id_admin',$user);  
       $query=$this->db->get();
       return $query->result();
    }

    // function tampil_cetak($id) {
    // 	$this->db->select('gaji.jab,gaji.gaji,gaji.periode,gaji_detail.tgl,gaji_detail.jenis_hari,gaji_detail.jam_masuk,gaji_detail.jam_pulang,gaji_detail.total_lembur,gaji_detail.nom_lembur,karyawan.nm_karyawan,karyawan.penempatan');

    // 	$this->db->join('gaji', 'gaji.kode=gaji_detail.kode');
    // 	$this->db->join('karyawan', 'karyawan.id_karyawan=gaji.id_karyawan');

    // 	return $this->db->get('gaji_detail')->result();
    // }
	
	function tampilkan(){       	
       $this->db->SELECT('gaji.kode, gaji.nik, gaji.jab, gaji.gaji, gaji.periode, partner.nm_partner, karyawan.nm_karyawan');
	   $this->db->join('partner','partner.id_partner=gaji.id_partner');
	   $this->db->join('karyawan','karyawan.id_karyawan=gaji.id_karyawan');
       $query=$this->db->get($this->table);
       return $query->result();
    }
	
	function edit($id){
        $this->db->SELECT('gaji.kode, gaji.nik, gaji.jab, gaji.gaji, gaji.periode, partner.nm_partner, karyawan.nm_karyawan');
	   $this->db->WHERE('gaji.nik',$id);
	   $this->db->FROM('gaji');
	   $this->db->join('partner','partner.id_partner=gaji.id_partner');
       $this->db->join('karyawan','karyawan.id_karyawan=gaji.id_karyawan');
       $query = $this->db->get();
	   return $query->row();
    }

    function pdf($id) {
    	$this->db->select('gaji_detail.kode, gaji_detail.tgl, gaji_detail.ket, gaji_detail.nik,  gaji_detail.jam_masuk, gaji_detail.jam_pulang, gaji_detail.jam_lembur, gaji_detail.total_lembur, gaji_detail.nom_lembur, gaji.jab, gaji.gaji, gaji.periode, karyawan.nm_karyawan');
	   $this->db->where('gaji_detail.nik', $id);
	   $this->db->join('karyawan', 'karyawan.nik=gaji_detail.nik');
	   $this->db->join('gaji','gaji.nik=gaji_detail.nik');
       $query=$this->db->get('gaji_detail');
       return $query;
    }

	function detail($id){
	   $this->db->FROM('gaji_detail');
	   $this->db->WHERE('kode',$id);  
       $query=$this->db->get();
       return $query->result();
    }
	
	function kode()   {    
	  $this->db->select('RIGHT(gaji.kode,1) as kode', FALSE);
	  $this->db->order_by('kode','DESC');    
	  $this->db->limit(1);     
	  $query = $this->db->get('gaji');        
	  if($query->num_rows() <> 0){       
	   //jika kode ternyata sudah ada.      
	   $data = $query->row();      
	   $kode = intval($data->kode) + 1;     
	  }
	  else{       
	   //jika kode belum ada      
	   $kode = 1;     
	  }
	  $today=date('d-h.i.s');
	  $kodemax = str_pad($kode, 1, "0", STR_PAD_LEFT);
	  $kodejadi = $today.$kodemax;
	  return $kodejadi;  
	 }
			
    function get_id($id){
		$this->db->from($this->table);
		$this->db->where('id_gaji',$id);
		$query = $this->db->get();
		return $query->row();
	}
	
	function tampilTmp(){
		$this->db->from('tmp_gaji');
		$query = $this->db->get();
		return $query;
        
    }
	
	 function jumlahTmp(){
        $this->db->count_all("tmp_gaji");
    }
	
	function simpantmp($data){
        $this->db->insert("tmp_gaji",$data);
    }
	
	function cekTmp($kode){
        $this->db->where("id_tmp",$kode);
        return $this->db->get("tmp_gaji");
    }
	
	function hapusTmp($kode){
        $this->db->where("ket",$kode);
        $this->db->delete("tmp_gaji");
    }
	
	function hapusTemp(){        
       $this->db->truncate("tmp_gaji");
    }
	
	function simpan($info){
        $this->db->insert("gaji",$info);
		return $this->db->insert_id();
    }
	
	function simpan_detail($data){
        $this->db->insert("gaji_detail",$data);
		return $this->db->insert_id();
    }
	
    function tambah($data){    	
        $this->db->insert($this->table,$data);
		return true;			
    }
	
    function update($where, $data){
       $this->db->update($this->table, $data, $where);
	return $this->db->affected_rows();
    }

    public function delete_tmp($id)	{
	$this->db->where('kode', $id);
	$this->db->delete('tmp_gaji');
	}
	
	function laporan($from,$to,$sumber){
		 $this->db->SELECT('kas_keluar.id_keluar,kas_keluar.kwitansi,kas_keluar.keperluan,kas_keluar.tgl_keluar,kas_keluar.nominal,kas_keluar.id_kas,guru.nm_guru,kas.dana');
		 $this->db->WHERE('kas_keluar.id_kas',$sumber);
		 $this->db->WHERE('tgl_keluar BETWEEN "'. date('Y-m-d', strtotime($from)). '" and "'. date('Y-m-d', strtotime($to)).'"');		         
	     $this->db->join('guru','guru.id_guru=kas_keluar.id_guru');
	   	 $this->db->join('kas','kas.id_kas=kas_keluar.id_kas');	           
	     return $this->db->get('kas_keluar');
	}
	
	function laporan_pdf($from,$to,$sumber){
		 $this->db->SELECT('kas_keluar.id_keluar,kas_keluar.kwitansi,kas_keluar.keperluan,kas_keluar.tgl_keluar,kas_keluar.nominal,guru.nm_guru,kas.dana');
		 $this->db->WHERE('kas_keluar.id_kas',$sumber);
		 $this->db->WHERE('tgl_keluar BETWEEN "'. date('Y-m-d', strtotime($from)). '" and "'. date('Y-m-d', strtotime($to)).'"');		         
	     $this->db->join('guru','guru.id_guru=kas_keluar.id_guru');
	   	 $this->db->join('kas','kas.id_kas=kas_keluar.id_kas');	           
	     return $this->db->get('kas_keluar');
	}
	
}
