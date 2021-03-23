<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rumah_sakit extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('Evb_model');
		$this->load->model('Map_model');        
	}
	
	public function index()
	{
		$data['by_desa'] = $this->Evb_model->by_desa();
		$data['layout'] = 'index';
		$this->load->view('layout',$data);
	}

	public function json_index()
	{
		$top_pendapatan 		= $this->Evb_model->alokasi_dana_desa();
		foreach($top_pendapatan as $data){
			$label_desa[] = array('label'=>$data->label);
			$value_desa[] = array('value'=>$data->value);
		}
		$top_pendapatan_kecamatan = $this->Evb_model->alokasi_dana_by_kecamatan();
		foreach($top_pendapatan_kecamatan as $data) {
			$label_kecamatan[] = array('label'=>$data->label);
			$value_kecamatan[] = array('value'=>$data->value);
		}
		$data = array('top_pendapatan_desa'=> array($label_desa,$value_desa),
					  'top_pendapatan_by_kecamatan'=> array($label_kecamatan,$value_kecamatan));
		echo json_encode($data);
	}
	
	public function map_nakes()
	{
		$list_data = $this->Map_model->map();
		$html = '';
		$header = '';
		$geojson = array(
			'type'      => 'FeatureCollection',
			'features'  => array()
		);

		foreach ($list_data as $result) {
			$polygon = array(json_decode($result['polygon']));
			$properties = array(
				'kecamatan_id' => $result['id'],
				'kecamatan'    => $result['kecamatan'],
				'kec_lat'      => $result['kec_lat'],
				'kec_long'     => $result['kec_long'],
				'color'        => $result['color']
			);

			$list_koordinat = array(
									'type' => 'Polygon',
									'coordinates' => $polygon
			);

			$feature = array(
							'type' => 'Feature',
							'properties'=> $properties,
							'geometry' => $list_koordinat,
			);

			array_push($geojson['features'], $feature);
		}
			header('Content-type: application/json');
			echo json_encode($geojson, JSON_NUMERIC_CHECK);
	}

	public function modal_evb_kecamatan()
	{
		header('Content-Type: application/json');
		$kecamatan = $this->input->get('kecamatan');
		$by_filter_kecamatan = $this->Evb_model->by_filter_kecamatan($kecamatan);
		$by_kecamatan_filter_bidang = $this->Evb_model->by_kecamatan_filter_bidang($kecamatan);
		$data = array('by_filter_kecamatan' => $by_filter_kecamatan,
					 'by_kecamatan_filter_bidang' => $by_kecamatan_filter_bidang);
		echo json_encode($data);
	}

	public function modal_evb()
	{
		header('Content-Type: application/json');
		$desa 	= $this->input->get('desa');
		$by_desa    = $this->Evb_model->by_desa_filter($desa);

		$data = array('by_desa' => $by_desa);
		echo json_encode($data);
		
	}

	public function table_filter()
	{
		$bulan = $this->input->get('bulan');
		$tahun = $this->input->get('tahun');
		if($bulan == 'semua') {
			$by_kec_filter = $this->Evb_model->by_kec_all();
			$data_res = '';
				foreach($by_kec_filter as $data) {
				$param = "'".$data->kecamatan_tempat_praktek."'";
				$data_res .= '<tr><td class="border-b"><div class="font-medium whitespace-no-wrap">'.$data->kecamatan_tempat_praktek.'</div></td><td class="text-center border-b">'.format($data->total).'</td><td class="text-center border-b">'.format($data->pria).'</td><td class="text-center border-b">'.format($data->wanita).'</td><td class="text-center border-b">'.format($data->berlaku).'</td><td class="text-center border-b">'.format($data->tidak_berlaku).'</td><td class="w-40 border-b"><div class="flex items-center sm:justify-center text-theme-9"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> Semua Data</div></td><td class="border-b w-5"><div class="flex sm:justify-center items-center"><a onclick="modal_by_kec('.$param.')" href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview" class="button w-32 mr-2 mb-2 flex items-center justify-center bg-theme-1 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity w-4 h-4 mr-2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg> Detail </a></div></td></tr>';
				}
		} else { 
			$by_kec_filter = $this->Evb_model->by_kec_filter($bulan,$tahun);
			$data_res = '';
				foreach($by_kec_filter as $data) {
				$list = array($data->bulan,$data->tahun,$data->kecamatan_tempat_praktek);
				$param = "'" . $data->bulan . "'" .','."'" . $data->tahun . "'" .','."'" . $data->kecamatan_tempat_praktek . "'";
				$data_res .= '<tr><td class="border-b"><div class="font-medium whitespace-no-wrap">'.$data->kecamatan_tempat_praktek.'</div></td><td class="text-center border-b">'.format($data->total).'</td><td class="text-center border-b">'.format($data->pria).'</td><td class="text-center border-b">'.format($data->wanita).'</td><td class="text-center border-b">'.format($data->berlaku).'</td><td class="text-center border-b">'.format($data->tidak_berlaku).'</td><td class="w-40 border-b"><div class="flex items-center sm:justify-center text-theme-9"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> '.getBulan($data->bulan).'</div></td><td class="border-b w-5"><div class="flex sm:justify-center items-center"><a onclick="modal_by_kec_filter('.$param.')" href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview" class="button w-32 mr-2 mb-2 flex items-center justify-center bg-theme-1 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity w-4 h-4 mr-2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg> Detail </a></div></td></tr>';
				}
		}
		
		$data_json = array('table' => $data_res);
		echo json_encode($data_json);
	}

} 