<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newcrud extends MY_Controller {

	function __construct()
	{
		$this->load->model('M_new');
	}
	public function index()
	{
		$data['buku']	= $this->M_new->get()->result();
		$this->template->load('Master/V_Master','V_new',$data);
		/*$this->load->view('V_new', $data);*/
	}


	public function viewData(){
		$data['buku']	= $this->M_new->get()->result();
		$this->template->load('Master/V_Master','V_data',$data);
	}


	public function aksi_tambah(){
		$data = array(
			'nm_buku' 			=> $this->input->post('nm_buku'),
			'pengarang' 		=> $this->input->post('pengarang'),
			'kota' 				=> $this->input->post('kota'),
			'tahun' 			=> $this->input->post('tahun')

		);

		$this->M_new->aksi_tambah($data,'tb_buku');
		redirect('Newcrud/index','refresh');
	}

	public function aksi_hapus(){
		$where = array(
			'id_buku' => $this->input->post('id')
		);

		$this->M_new->aksi_hapus($where,'tb_buku');
	}

	public function edit($id){
		$where = array(
			'id_buku' => $id
		);

		$data = $this->M_new->edit_data($where,'tb_buku')->row();  //jangan sampai lupa antara row dan result

		echo json_encode($data);
		// $data['tb_buku'] = $this->M_New->edit_data($where,'tb_buku')->result();
	}

	public function aksi_update(){
		$where = array (
			'id_buku' => $this->input->post('id_buku')
		);

		$data = array(
			'nm_buku' => $this->input->post('nm_buku'),
			'pengarang' => $this->input->post('pengarang'),
			'kota' => $this->input->post('kota'),
			'tahun' => $this->input->post('tahun')
		);

		$this->M_new->aksi_update($where,$data,'tb_buku');

		echo json_encode(array("status"=>TRUE));

	}


}

/* End of file Newcrud.php */
/* Location: ./application/modules/newcrud/controllers/Newcrud.php */