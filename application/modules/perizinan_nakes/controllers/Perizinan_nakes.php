<?php
Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed
defined('BASEPATH') OR exit('No direct script access allowed');

class Perizinan_nakes extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('Perizinan_nakes_model');
		$this->load->model('Map_model');        
	}
	
	public function index()
	{
		// $bulan_skrg = date('m'); $tahun_skrg = date('Y');
		$bulan_skrg = '07'; $tahun_skrg = '2020';
		// $bulan_kmrn = date('m', strtotime("-1 month", strtotime(date("Y-m-d"))));
		$bulan_kmrn = '06';
		$data['by_kec_all']       	 = $this->Perizinan_nakes_model->by_kec_all();
		$data['list_tahun']		     = $this->Perizinan_nakes_model->list_tahun();
		$izin_bulan_srkg  	 		 = $this->Perizinan_nakes_model->perizinan_by_bulan($bulan_skrg,$tahun_skrg);
		$izin_bulan_kemarin  		 = $this->Perizinan_nakes_model->perizinan_by_bulan($bulan_kmrn,$tahun_skrg);
		$cek_persentase				 = persen($izin_bulan_srkg->total,$izin_bulan_kemarin->total);
		if ($cek_persentase < 0) {
			$data['persentase'] = $cek_persentase;
			$data['class']      = 'report-box__indicator bg-theme-6 tooltip cursor-pointer tooltipstered';
		} else {
			$data['persentase'] = $cek_persentase;
			$data['class'] 	    = 'report-box__indicator bg-theme-9 tooltip cursor-pointer tooltipstered';
		}
		$agregat_pria_srkg				 = $this->Perizinan_nakes_model->get_gender_by_month($bulan_skrg,$tahun_skrg,1);
		$agregat_wanita_skrg			 = $this->Perizinan_nakes_model->get_gender_by_month($bulan_skrg,$tahun_skrg,2);
		$agregat_pria_kmrn				 = $this->Perizinan_nakes_model->get_gender_by_month($bulan_kmrn,$tahun_skrg,1);
		$agregat_wanita_kmrn			 = $this->Perizinan_nakes_model->get_gender_by_month($bulan_kmrn,$tahun_skrg,2);
		$persentase_pria				 = persen($agregat_pria_srkg->total,$agregat_pria_kmrn->total);
		$persentase_wanita				 = persen($agregat_wanita_skrg->total,$agregat_wanita_kmrn->total);

		if ($persentase_pria < 0) {
			$data['persentase_pria']	 = $persentase_pria;
			$data['pria']				 = $agregat_pria_srkg->total;
			$data['class_p']      		 = 'report-box__indicator bg-theme-6 tooltip cursor-pointer tooltipstered';
		} else {
			$data['persentase_pria']	 = $persentase_pria;
			$data['pria']				 = $agregat_pria_srkg->total;
			$data['class_p'] 	    	 = 'report-box__indicator bg-theme-9 tooltip cursor-pointer tooltipstered';
		}

		if ($persentase_wanita < 0) {
			$data['persentase_wanita']   = $persentase_wanita;
			$data['wanita']				 = $agregat_wanita_skrg->total;
			$data['class_w']      		 = 'report-box__indicator bg-theme-6 tooltip cursor-pointer tooltipstered';
		} else {
			$data['persentase_wanita']	 = $persentase_wanita;
			$data['wanita']				 = $agregat_wanita_skrg->total;
			$data['class_w'] 	    	 = 'report-box__indicator bg-theme-9 tooltip cursor-pointer tooltipstered';
		}

		$data['total_perizinan']   	 = $this->Perizinan_nakes_model->total_rows();
		$data['layout'] = 'index';
		$this->load->view('layout',$data);
	}

	public function json_index()
	{
	    header('Content-Type: application/json');
		$by_kecamatan_praktek 		= $this->Perizinan_nakes_model->by_kecamatan_praktek();
		foreach($by_kecamatan_praktek as $data) {
			$group[] = array('label' => $data->label,
						  	 'value' => $data->value,
						  	 'color' => "#269ffb");
		}
		$jenis_surat				= $this->Perizinan_nakes_model->by_jenis_surat();
		$by_profesi					= $this->Perizinan_nakes_model->by_profesi();
		$by_jenis_surat_nilai 		= array('Surat Kerja' 					  => (int)$jenis_surat->surat_izin_kerja,
											'Surat Izin Keterangan' 		  => (int)$jenis_surat->surat_izin_keterangan,
											'Surat Izin Praktik'			  => (int)$jenis_surat->surat_izin_praktik,
											'Surat izin Praktik Elektromedis' => (int)$jenis_surat->sipe,
											'Surat Izin Kerja Apoteker' 	  => (int)$jenis_surat->sika);

		foreach($by_jenis_surat_nilai as $key => $data) {
			$group_jenis_surat[] = array('label' =>$key,
										 'value' =>$data,
										 'color' =>"#269ffb");
		}

		$status_berlaku				= $this->Perizinan_nakes_model->by_status_berlaku();
		$by_status_berlaku			= array(array('label' => 'Aktif',
												  'value' => $status_berlaku->berlaku,
												  'isSliced' => '1'),
											array('label' => 'Tidak Aktif',
												  'value' => $status_berlaku->tidak_berlaku));

		$data = array('by_kec' 				   => $group,
					 'by_jenis_surat'		   => $group_jenis_surat,
					 'by_profesi'			   => $by_profesi,
					 'by_status_berlaku'	   => $by_status_berlaku);
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
		$get_kelurahan = $this->Perizinan_nakes_model->by_kelurahan_filter($bulan,$tahun,$kecamatan);
		$get_tempat_praktek = $this->Perizinan_nakes_model->by_kelurahan_praktek($bulan,$tahun,$kecamatan);
		$get_jenis_surat	= $this->Perizinan_nakes_model->by_jenis_surat_filter($bulan,$tahun,$kecamatan);

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

	public function modal_nakes_all()
	{
		header('Content-Type: application/json');
		$kecamatan 	= $this->input->get('kecamatan');
		$get_kelurahan = $this->Perizinan_nakes_model->by_kelurahan_all($kecamatan);
		$get_tempat_praktek = $this->Perizinan_nakes_model->by_kelurahan_praktek_all($kecamatan);
		$get_jenis_surat	= $this->Perizinan_nakes_model->by_jenis_surat_all($kecamatan);

		foreach($get_tempat_praktek as $val)
		{
			$tempat_praktek[] = array('label' => $val->tempat_praktek,
									  'value' => $val->total);
		}

// 		foreach($get_kelurahan as $data) {
// 			$label_kelurahan[] = array('label' => $data->kelurahan_tempat_praktek);
// 		}

		foreach($get_kelurahan as $data) {
			$label_kelurahan[] = array('label' => $data->kelurahan_tempat_praktek);
// 			echo $data->kelurahan_tempat_praktek;
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
		$data = array('kelurahan_by_kecamatan' 		=> array($label_kelurahan,$berlaku,$tidak_berlaku),
					  'tempat_praktek_by_kecamatan' => $tempat_praktek,
					  'by_surat'					=> array($surat,$jenis_surat_aktif,$jenis_surat_nonaktif));
		echo json_encode($data);
		
	}

	public function table_filter()
	{
		$bulan = $this->input->get('bulan');
		$tahun = $this->input->get('tahun');
		if($bulan == 'semua') {
			$by_kec_filter = $this->Perizinan_nakes_model->by_kec_all();
			$data_res = '';
				foreach($by_kec_filter as $data) {
				$param = "'".$data->kecamatan_tempat_praktek."'";
				$data_res .= '<tr><td class="border-b"><div class="font-medium whitespace-no-wrap">'.$data->kecamatan_tempat_praktek.'</div></td><td class="text-center border-b">'.format($data->total).'</td><td class="text-center border-b">'.format($data->pria).'</td><td class="text-center border-b">'.format($data->wanita).'</td><td class="text-center border-b">'.format($data->berlaku).'</td><td class="text-center border-b">'.format($data->tidak_berlaku).'</td><td class="w-40 border-b"><div class="flex items-center sm:justify-center text-theme-9"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> Semua Data</div></td><td class="border-b w-5"><div class="flex sm:justify-center items-center"><a onclick="modal_by_kec('.$param.')" href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview" class="button w-32 mr-2 mb-2 flex items-center justify-center bg-theme-1 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity w-4 h-4 mr-2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg> Detail </a></div></td></tr>';
				}
		} else { 
			$by_kec_filter = $this->Perizinan_nakes_model->by_kec_filter($bulan,$tahun);
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