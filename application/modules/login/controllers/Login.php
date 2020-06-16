<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->view('master/V_Header');
		$this->load->model('Model_login');
	}
	public function index()
	{
		$this->load->view('v_login');
	}

	public function proses()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = array(
			'user'	=> $username,
			'password'	=> md5($password)
		);

		$ceklogin = $this->Model_login->proses('user',$where)->num_rows();
		$row = 	$this->Model_login->proses('user',$where)->row_array();
		if ($ceklogin > 0) {
			if($row['level'] ==1){	
				$this->session->userdata($row);
				redirect('Newcrud/index','refresh');
			}else{
				$this->session->userdata($row);
				echo "login sebagai kasir";
			}
		} else {
			echo "Login gagal";
		}
	}
}

/* End of file Auth.php */
/* Location: ./application/modules/login/controllers/Auth.php */