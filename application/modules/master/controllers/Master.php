<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends MY_Controller {

	public function index()
	{
		//$this->load->view('V_Master');
		$this->template->load('Master/V_Master','Tes_konten');
	}

}

/* End of file Master.php */
/* Location: ./application/modules/master/controllers/Master.php */