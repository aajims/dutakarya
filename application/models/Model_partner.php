<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_partner extends CI_Model {

	var $table = 'partner';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function tampil_partner()
	{
		return $this->db->get($this->table);
	}
	
	function tampilkan(){
		$this->db->SELECT('*');
		$this->db->FROM('partner');
		$query=$this->db->get();
       	return $query->result();
	}
			
   
	function jumlah(){
		$this->db->select('SUM(nominal) as total');
		$this->db->from('kas_masuk');
		return $this->db->get()->row()->total;
	}
	
	function get($id){
		$this->db->from($this->table);
		$this->db->where('id_partner',$id);
		$query = $this->db->get();
		return $query->row();
	}
	
	function get_id($id){
		$this->db->from($this->table);
		$this->db->where('id_partner',$id);
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
	$this->db->where('id_partner', $id);
	$this->db->delete($this->table);
	}
	
	
}
