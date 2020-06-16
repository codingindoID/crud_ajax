<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends MY_Controller {

public function __construct()
{
	parent::__construct();
	$this->load->model('M_crud');
}
	public function index()
	{
		$data['tb_barang'] = $this->M_crud->get_data()->result();
		$this->load->view('V_crud',$data);
	}

	public function tambah_data(){
		$this->load->view('V_tambah');
	}

	public function aksi_tambah(){
		$data = array(
			'nama' 			=> $this->input->post('nama'),
			'warna' 		=> $this->input->post('warna'),
			'harga' 		=> $this->input->post('harga')

		);

		$this->M_crud->aksi_tambah($data, 'tb_barang');	
		redirect('index','refresh');
	}

	public function edit_data($id){
		$where = array(
			'id' => $id
		);

		$data['tb_barang'] = $this->M_crud->edit_data($where,'tb_barang')->result();
		$this->load->view('V_edit', $data);
	}

	public function aksi_update(){
		$where = array (
			'id' => $this->input->post('id'),
		);

		$data = array(
			'nama' => $this->input->post('nama'),
			'warna' => $this->input->post('warna'),
			'harga' => $this->input->post('harga')
		);

		$this->M_crud->aksi_update($where,$data,'tb_barang');
		redirect('index');
	}

	public function hapus_data($id){
		$where = array(
			'id' => $id
		);

		$this->M_crud->aksi_hapus($where,'tb_barang');
		redirect('index','refresh');
	}

}

/* End of file Crud.php */
/* Location: ./application/modules/crud/controllers/Crud.php */