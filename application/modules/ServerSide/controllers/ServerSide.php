<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServerSide extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_server');
		$db2 = $this->load->database('db_kedua',TRUE);
	}

	public function index()
	{
		$data['OPD']  = $this->M_server->get_opd();
		$this->template->load('Master/V_Master','V_server',$data);
	}

	function get_data_user()
    {
        $list = $this->M_server->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->tgl_input;
            $row[] = $field->tgl_jatuh_tempo_pajak;
            $row[] = $field->no_polisi;
            $row[] = $field->jenis_kendaraan;
            $row[] = $field->tipe_kendaraan;
            $row[] = $field->singkatan_opd;
            $row[] = '<button type="button" onclick="view('."'".$field->id_identitas."'".')" class="btn-xs btn-primary">view</button>
                      <button type="button" onclick="edit('."'".$field->id_identitas."'".')" class="btn-xs btn-success">edit</button>
                      <button type="button" onclick="hapus('."'".$field->id_identitas."'".')" class="btn-xs btn-danger">hapus</button>';

            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_server->count_all(),
            "recordsFiltered" => $this->M_server->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
 
    function get_data_user_by_id()
    {
        $list = $this->M_server->get_datatables_id();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->tgl_input;
            $row[] = $field->tgl_jatuh_tempo_pajak;
            $row[] = $field->no_polisi;
            $row[] = $field->jenis_kendaraan;
            $row[] = $field->tipe_kendaraan;
            $row[] = $field->singkatan_opd;
            $row[] = '<button type="button" onclick="view('."'".$field->id_identitas."'".')" class="btn-xs btn-primary">view</button>
                      <button type="button" onclick="edit('."'".$field->id_identitas."'".')" class="btn-xs btn-success">edit</button>
                      <button type="button" onclick="hapus('."'".$field->id_identitas."'".')" class="btn-xs btn-danger">hapus</button>';

            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_server->count_all(),
            "recordsFiltered" => $this->M_server->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

}

/* End of file serverSide.php */
/* Location: ./application/controllers/serverSide.php */