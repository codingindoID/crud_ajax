<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_crud extends CI_Model {
	public function get_data(){
		return $this->db->get('tb_barang');
	}

	public function aksi_tambah($data, $table){
		$this->db->insert($table, $data);
	}

	public function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}

	public function aksi_update($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function aksi_hapus($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}

/* End of file M_crud.php */
/* Location: ./application/modules/crud/models/M_crud.php */