<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Svrcrud extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_svrcrud');
	}

	public function index()
	{
		$data['tes']  = 'tes';

		/*echo json_encode(array($data));*/
		$this->template->load('Master/V_Master','V_svrcrud',$data);
	}

	function get_data_user()
    {
        $list = $this->M_svrcrud->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->id_buku;
            $row[] = $field->nm_buku;
            $row[] = $field->pengarang;
            $row[] = $field->tahun;
            $row[] = $field->kota;
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_svrcrud->count_all(),
            "recordsFiltered" => $this->M_svrcrud->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
}

/* End of file svrcrud.php */
/* Location: ./application/controllers/svrcrud.php */