<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_new extends CI_Model {

	function get(){
		return $this->db->get('tb_buku');
	}

	public function aksi_tambah($data, $table){
		$this->db->insert($table, $data);
	}

	public function aksi_hapus($where,$table){
			$this->db->where($where);
			$this->db->delete($table);
		}

	public function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}	

	public function aksi_update($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table, $data);

		return $this->db->affected_rows();
	}

}

/* End of file M_new.php */
/* Location: ./application/modules/newcrud/models/M_new.php */