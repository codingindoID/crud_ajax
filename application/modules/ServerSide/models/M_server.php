<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_server extends CI_Model {

		var $table = 'identitas'; //nama tabel dari database
		var $column_order = array(null, 'tgl_input','tgl_jatuh_tempo_pajak','no_polisi','jenis_kendaraan', 'tipe_kendaraan', 'singkatan_opd'); //field yang ada di table user
		var $column_search = array('tgl_input','tgl_jatuh_tempo_pajak','no_polisi','jenis_kendaraan', 'tipe_kendaraan', 'singkatan_opd'); //field yang diizin untuk pencarian 
		//var $order = array('id_identitas' => 'asc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->db2 = $this->load->database('db_kedua',TRUE);
	}

	private function _get_datatables_query()
		{
			$this->db2->select('id_identitas,tgl_input,tgl_jatuh_tempo_pajak,no_polisi,jenis_kendaraan, tipe_kendaraan, singkatan_opd');
			$this->db2->from('identitas');

			$i = 0;
		
			foreach ($this->column_search as $item) // looping awal
			{
				if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
				{
					
					if($i===0) // looping awal
					{
						$this->db2->group_start(); 
						$this->db2->like($item, $_POST['search']['value']);
					}
					else
					{
						$this->db2->or_like($item, $_POST['search']['value']);
					}

					if(count($this->column_search) - 1 == $i) 
						$this->db2->group_end(); 
				}
				$i++;
			}
			
			if(isset($_POST['order'])) 
			{
				$this->db2->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			} 
			else if(isset($this->order))
			{
				$order = $this->order;
				$this->db2->order_by(key($order), $order[key($order)]);
			}
		}

		function get_datatables()
		{
			$this->_get_datatables_query();//------------------>indentifikasi query sebelumnya yang kemudian akan digabung
			
			/*Modifikasi database join dan sebagainya taruh disini*/
			if($_POST['length'] != -1)
			$this->db2->limit($_POST['length'], $_POST['start']);
			$this->db2->join('jenis', 'identitas.id_jenis = jenis.id_jenis');
			$this->db2->join('tipe', 'identitas.id_tipe = tipe.id_tipe');
			$this->db2->join('opd', 'identitas.id_opd = opd.id_opd');
			$query = $this->db2->get();
			return $query->result();
		}

		function count_filtered()
		{
			$this->_get_datatables_query();
			$this->db2->join('jenis', 'identitas.id_jenis = jenis.id_jenis');
			$this->db2->join('tipe', 'identitas.id_tipe = tipe.id_tipe');
			$this->db2->join('opd', 'identitas.id_opd = opd.id_opd');
			$query = $this->db2->get();
			return $query->num_rows();
		}

		public function count_all()
		{
			$this->db2->from($this->table);
			return $this->db2->count_all_results();
		}


		public function get_opd()
		{
			return $this->db2->get('opd')->result();
		}

}

/* End of file m_server.php */
/* Location: ./application/models/m_server.php */