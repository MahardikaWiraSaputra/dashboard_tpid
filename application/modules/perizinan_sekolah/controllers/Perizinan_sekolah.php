<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perizinan_sekolah extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('Perizinan_sekolah_model');
		$this->load->model('Map_model');        
	}
	
	public function index()
	{
		// $bulan_skrg = date('m'); $tahun_skrg = date('Y');
		$bulan_skrg = '07'; $tahun_skrg = '2020';
		// $bulan_kmrn = date('m', strtotime("-1 month", strtotime(date("Y-m-d"))));
		$bulan_kmrn = '06';
		$data['by_kec_all']       	 = $this->Perizinan_sekolah_model->all_tabel_kecamatan();
		$data['list_tahun']		     = $this->Perizinan_sekolah_model->list_tahun();
		$izin_bulan_srkg  	 		 = $this->Perizinan_sekolah_model->perizinan_by_bulan($bulan_skrg,$tahun_skrg);
		$izin_bulan_kemarin  		 = $this->Perizinan_sekolah_model->perizinan_by_bulan($bulan_kmrn,$tahun_skrg);
		

		$data['total_perizinan']   	 = $this->Perizinan_sekolah_model->all_data();
		$data['layout'] = 'index';
		$this->load->view('layout',$data);
	}

	public function json_index()
	{
		$by_kec 				= $this->Perizinan_sekolah_model->all_by_kecamatan();
		$by_bentuk_pendidikan	= $this->Perizinan_sekolah_model->all_by_bentuk_pendidikan();

		$data = array('by_kec' => $by_kec,'by_bentuk_pendidikan'=>$by_bentuk_pendidikan);
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

	public function modal_nakes()
	{
		header('Content-Type: application/json');
		$bulan 		= $this->input->get('bulan');
		$tahun 		= $this->input->get('tahun');
		$kecamatan 	= $this->input->get('kecamatan');
		$get_kelurahan = $this->Perizinan_sekolah_model->by_kelurahan_filter($bulan,$tahun,$kecamatan);
		$get_tempat_praktek = $this->Perizinan_sekolah_model->by_kelurahan_praktek($bulan,$tahun,$kecamatan);
		$get_jenis_surat	= $this->Perizinan_sekolah_model->by_jenis_surat_filter($bulan,$tahun,$kecamatan);

		foreach($get_tempat_praktek as $val)
		{
			$tempat_praktek[] = array('label' => $val->tempat_praktek,
									  'value' => $val->total);
		}

		foreach($get_kelurahan as $data) {
			$label_kelurahan[] = array('label' => $data->kelurahan_tempat_praktek);
		}

		foreach($get_kelurahan as $data) {
			$label_kelurahan[] = array('label' => $data->kelurahan_tempat_praktek);
			if($data->berlaku) {
				$berlaku[] = array('value' => $data->berlaku);
			} else {
				$berlaku[] = array('value' => 0);
			}
			if($data->tidak_berlaku) {
				$tidak_berlaku[] = array('value' => $data->tidak_berlaku);
			} else {
				$tidak_berlaku[] = array('value' => 0);
			}

		$surat = array(array('label' =>'Surat Kerja'),
							 array('label' =>'Surat Izin Kerja Apoteker'),
							 array('label' =>'Surat Izin Keterangan'),
							 array('label' =>'Surat Izin Praktek'));
		$jenis_surat_aktif = array(
				array('value' => $get_jenis_surat->surat_izin_kerja_aktif),
				array('value' => $get_jenis_surat->sika_aktif),
				array('value' => $get_jenis_surat->surat_izin_keterangan_aktif),
				array('value' => $get_jenis_surat->surat_izin_praktik_aktif));
		$jenis_surat_nonaktif = array(
				array('value' => $get_jenis_surat->surat_izin_kerja_nonaktif),
				array('value' => $get_jenis_surat->sika_nonaktif),
				array('value' => $get_jenis_surat->surat_izin_keterangan_nonaktif),
				array('value' => $get_jenis_surat->surat_izin_praktik_nonaktif));
		}
		$nama_bulan = getBulan($bulan);
		$data = array('kelurahan_by_kecamatan' 		=> array($label_kelurahan,$berlaku,$tidak_berlaku),
					  'tempat_praktek_by_kecamatan' => $tempat_praktek,
					  'by_surat'					=> array($surat,$jenis_surat_aktif,$jenis_surat_nonaktif),
					  'waktu'						=> $nama_bulan);
		echo json_encode($data);
	}

	public function modal_perizinan_all()
	{
		header('Content-Type: application/json');
		$kecamatan 	= $this->input->get('kecamatan');
		$get_kelurahan = $this->Perizinan_sekolah_model->by_kelurahan_all($kecamatan);
		$get_status = $this->Perizinan_sekolah_model->by_kelurahan_status($kecamatan);
		$bentuk_pendidikan = $this->Perizinan_sekolah_model->by_kelurahan_pendidikan($kecamatan);

		foreach($get_kelurahan as $data) {
			$label_kelurahan[] = array('label' => $data->nama_desa,'value'=>$data->total);
		}
		$label_status = array(array('label'=> 'Ditolak','value'=>$get_status->ditolak),
							 array('label'=> 'Diajukan','value'=>$get_status->diajukan),
							 array('label'=> 'Disetujui','value'=>$get_status->disetujui));
		foreach($bentuk_pendidikan as $data){
			$label_pendidikan[] = array('label'=>$data->bentuk_pendidikan);
			$val_kelas[] = array('value'=>$data->total_kelas);
			$val_siswa[] = array('value'=>$data->total_siswa);
		}

		$data = array('kelurahan_by_kecamatan'=> $label_kelurahan,
					  'kelurahan_by_status'	=> $label_status,
					  'bentuk_pendidikan'=> array($label_pendidikan,$val_kelas,$val_siswa));
		echo json_encode($data);
		
	}

	public function table_filter()
	{
		$bulan = $this->input->get('bulan');
		$tahun = $this->input->get('tahun');
		if($bulan == 'semua') {
			$by_kec_filter = $this->Perizinan_sekolah_model->all_tabel_kecamatan();
			$data_res = '';
				foreach($by_kec_filter as $data) {
				$param = "'".$data->kecamatan."'";
				$data_res .= '<tr><td class="border-b"><div class="font-medium whitespace-no-wrap">'.$data->kecamatan.'</div></td><td class="text-center border-b">'.format($data->total).'</td><td class="text-center border-b">'.format($data->disetujui).'</td><td class="text-center border-b">'.format($data->diajukan).'</td><td class="text-center border-b">'.format($data->ditolak).'</td><td class="w-40 border-b"><div class="flex items-center sm:justify-center text-theme-9"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> Semua Data</div></td><td class="border-b w-5"><div class="flex sm:justify-center items-center"><a onclick="modal_by_kec('.$param.')" href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview" class="button w-32 mr-2 mb-2 flex items-center justify-center bg-theme-1 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity w-4 h-4 mr-2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg> Detail </a></div></td></tr>';
				}
		} else { 
			$by_kec_filter = $this->Perizinan_sekolah_model->all_tabel_kecamatan_filter($bulan,$tahun);
			$data_res = '';
				foreach($by_kec_filter as $data) {
				$list = array($data->bulan,$data->tahun,$data->kecamatan);
				$param = "'" . $data->bulan . "'" .','."'" . $data->tahun . "'" .','."'" . $data->kecamatan . "'";
				$data_res .= '<tr><td class="border-b"><div class="font-medium whitespace-no-wrap">'.$data->kecamatan.'</div></td><td class="text-center border-b">'.format($data->total).'</td><td class="text-center border-b">'.format($data->disetujui).'</td><td class="text-center border-b">'.format($data->diajukan).'</td><td class="text-center border-b">'.format($data->ditolak).'</td><td class="w-40 border-b"><div class="flex items-center sm:justify-center text-theme-9"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> '.getBulan($data->bulan).'</div></td><td class="border-b w-5"><div class="flex sm:justify-center items-center"><a onclick="modal_by_kec('.$param.')" href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview" class="button w-32 mr-2 mb-2 flex items-center justify-center bg-theme-1 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity w-4 h-4 mr-2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg> Detail </a></div></td></tr>';
				}
		}
		
		$data_json = array('table' => $data_res);
		echo json_encode($data_json);
	}

} 