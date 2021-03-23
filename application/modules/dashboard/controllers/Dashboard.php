<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data['layout'] = 'index';
		$data['query'] = $this->db->query("SELECT
											b.INDIKATOR,
											b.SATUAN,
											a.KATEGORI,
											a.TIPE_CHART,
											a.COLOR,
											a.GAMBAR,
											c.NAMA_SKPD,
											d.URUSAN,
											b.ID
											FROM
											connect_update.grafik_indikator AS a
											INNER JOIN portal_baru_rev.tx_indikator_ref AS b ON a.ID_INDIKATOR = b.ID
											INNER JOIN portal_baru_rev.m_skpd AS c ON b.SKPD_ID = c.ID
											INNER JOIN portal_baru_rev.m_urusan AS d ON b.URUSAN_ID = d.ID
								")->result_array();
		$this->load->view('layout',$data);
	}

	public function kategori($param)
	{
		$data['kategori'] = $param;
		$data['layout'] = 'v_kategori';
		$data['query'] = $this->db->query("SELECT
											b.INDIKATOR,
											b.SATUAN,
											a.KATEGORI,
											a.TIPE_CHART,
											a.COLOR,
											a.GAMBAR,
											c.NAMA_SKPD,
											d.URUSAN,
											b.ID
											FROM
											connect_update.grafik_indikator_copy1 AS a
											INNER JOIN portal_baru_rev.tx_indikator_ref AS b ON a.ID_INDIKATOR = b.ID
											INNER JOIN portal_baru_rev.m_skpd AS c ON b.SKPD_ID = c.ID
											INNER JOIN portal_baru_rev.m_urusan AS d ON b.URUSAN_ID = d.ID
											WHERE a.KATEGORI = '".$param."'
								")->result_array();
		$this->load->view('layout',$data);
	}

	public function pencarian()
	{
		$pencarian = $this->input->post('keyword');
		$data['pencarian'] = $pencarian;
		$data['layout'] = 'v_pencarian';
		$data['query'] = $this->db->query("SELECT
											b.INDIKATOR,
											b.SATUAN,
											a.KATEGORI,
											a.TIPE_CHART,
											a.COLOR,
											a.GAMBAR,
											c.NAMA_SKPD,
											d.URUSAN,
											b.ID
											FROM
											connect_update.grafik_indikator AS a
											INNER JOIN portal_baru_rev.tx_indikator_ref AS b ON a.ID_INDIKATOR = b.ID
											INNER JOIN portal_baru_rev.m_skpd AS c ON b.SKPD_ID = c.ID
											INNER JOIN portal_baru_rev.m_urusan AS d ON b.URUSAN_ID = d.ID
											WHERE b.INDIKATOR LIKE '%".$pencarian."%'
								")->result_array();
		$this->load->view('layout',$data);
	}

	function load_data($id){
		$query = $this->db->query("SELECT
								a.INDIKATOR,
								c.NAMA_SKPD,
								a.SATUAN,
								b.TAHUN,
								b.`DATA`,
								d.TIPE_CHART,
								d.COLOR,
								d.`GROUP`
								FROM
								portal_baru_rev.tx_indikator_ref AS a
								INNER JOIN portal_baru_rev.tx_data_dasar AS b ON a.ID = b.INDIKATOR_ID
								INNER JOIN portal_baru_rev.m_skpd AS c ON a.SKPD_ID = c.ID
								INNER JOIN connect_update.grafik_indikator_copy1 AS d ON a.ID = d.ID_INDIKATOR
								WHERE
								a.ID = '".$id."' AND b.TAHUN = '2019' AND d.GROUP = 'group_16' ")->result_array();
		$chart = '';
		foreach ($query as $key => $value) {
			$data[] = array(
						'label'=>$value['TAHUN'],
						'value'=>$value['DATA'],
						'color'=>$value['COLOR']
					);
			$caption = $value['INDIKATOR'];
			$subcaption = $value['NAMA_SKPD'];

			if($value['TIPE_CHART'] == 'Pie Chart'){
				$chart = 'pie2d';
			} 
		}

		$group = array('tabel'=>$data,'caption'=>$caption,'subcaption'=>$subcaption,'chart'=>$chart);
		echo json_encode($group);
	}

	function data(){
		$data['layout'] = 'v_data';
		$this->load->view('layout',$data);
	}

}