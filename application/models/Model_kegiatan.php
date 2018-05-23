<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kegiatan extends CI_Model {

	var $table = 'kegiatan';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function tampil_kegiatan()
	{
		return $this->db->get($this->table);
	}
	
	function tampilkan($user){
	   $this->db->FROM($this->table);
	   $this->db->ORDER_BY('');
	   $this->db->WHERE('id_admin',$user);  
       $query=$this->db->get();
       return $query->result();
	}
	
	function tampil(){

	   $this->db->SELECT('kegiatan.tgl, kegiatan.keterangan, kegiatan.status, admin.nama_lengkap');
	   $this->db->join('admin','admin.id_admin=kegiatan.id_admin');
       $query=$this->db->get($this->table);
       return $query->result();
	}
			
   
	function jumlah(){
		$this->db->select('SUM(nominal) as total');
		$this->db->from('kas_masuk');
		return $this->db->get()->row()->total;
	}
	
	function get($id){
		$this->db->from($this->table);
		$this->db->where('id_kegiatan',$id);
		$query = $this->db->get();
		return $query->row();
	}
	
	function get_id($id){
		$this->db->from($this->table);
		$this->db->where('id_kegiatan',$id);
		$query = $this->db->get();
		return $query->row();
	}
	
    function tambah($data){
    	return $this->db->insert($this->table,$data);
    }
	   
    function update($where, $data){
       $this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	    }

    public function delete_id($id)	{
	$this->db->where('id_kegiatan', $id);
	$this->db->delete($this->table);
	}
	
	
}
