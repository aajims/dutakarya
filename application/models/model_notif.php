<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_notif extends CI_Model {

	var $table = 'ppu';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    function jum_notif(){
		$this->db->from($this->table);
		$this->db->where('notif','1');
		$query = $this->db->get();
		return $query->num_rows();
	}

	function count(){
		$this->db->set('notif', '0');
		$this->db->where('notif', '1');
		$query = $this->db->update($this->table);
		return $query->result();
	}

    function get_notif(){
		$this->db->from("ppu");
		$this->db->order_by('id_ppu', 'DESC');
		$this->db->limit('7');
		$query = $this->db->get();

		if ($query->num_rows() >0) {
			return $query->result();
		}
    }


}
