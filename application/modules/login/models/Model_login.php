<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

	public function proses($table, $where)
	{
		$this->db->where($where);
		return $this->db->get($table);
		/*return $this->db->get_where($table,$where);*/
	}

}

/* End of file model_login.php */
/* Location: ./application/modules/login/models/model_login.php */