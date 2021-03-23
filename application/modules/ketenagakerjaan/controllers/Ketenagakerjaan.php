<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ketenagakerjaan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('Sektoral_disnaker_model');
		$this->load->model('Map_model');        
	    $this->load->library('datatables');
	}
	
	public function index()
	{
		$data['gender'] 				= $this->Sektoral_disnaker_model->group_gender();
		$data['pendaftar_by_kecamatan'] = $this->Sektoral_disnaker_model->pendaftar_by_kecamatan();
		$data['data_by_kec'] 			= $this->Sektoral_disnaker_model->all_data_by_kec();
		$data['layout'] = 'index';
		$this->load->view('layout',$data);
	}

	public function json_index()
	{
		$gender 					= $this->Sektoral_disnaker_model->group_gender();
		$pendaftar_by_kecamatan 	= $this->Sektoral_disnaker_model->pendaftar_by_kecamatan();
		$jenjang_pendidikan 		= $this->Sektoral_disnaker_model->jenjang_pendidikan();
		$total_by_status_perkawinan = $this->Sektoral_disnaker_model->total_by_status_perkawinan();
		$group_pendidikan 			= array('PERGURUAN TINGGI','SMA/SMK','SMP/MTS','SD/MI');
// 		$nilai_group_pendidikan 	= array(
// 										$jenjang_pendidikan->UNIVERSITAS + $jenjang_pendidikan->INSTITUT + $jenjang_pendidikan->IKIP_STIKER + $jenjang_pendidikan->SEKOLAH_TINGGI + $jenjang_pendidikan->POLTEKKES +  $jenjang_pendidikan->STAI + $jenjang_pendidikan->AAK +  $jenjang_pendidikan->AKADEMI + $jenjang_pendidikan->AKBID + $jenjang_pendidikan->AKES + $jenjang_pendidikan->AKPER + $jenjang_pendidikan->AMIK + $jenjang_pendidikan->BHKATI + $jenjang_pendidikan->D3 + $jenjang_pendidikan->D_III + $jenjang_pendidikan->D4 + $jenjang_pendidikan->DIII + $jenjang_pendidikan->FAKULTAS + $jenjang_pendidikan->FKM + $jenjang_pendidikan->IAI + $jenjang_pendidikan->IAIN + $jenjang_pendidikan->ITN + $jenjang_pendidikan->ITS + $jenjang_pendidikan->KEMENKES + $jenjang_pendidikan->INSTITUT_AGAMA + $jenjang_pendidikan->Oasis + $jenjang_pendidikan->PSDKU + $jenjang_pendidikan->STIKES + $jenjang_pendidikan->STAIN + $jenjang_pendidikan->STHD + $jenjang_pendidikan->STI + $jenjang_pendidikan->STIB + $jenjang_pendidikan->STIKOM + $jenjang_pendidikan->STIKI + $jenjang_pendidikan->STKIP + $jenjang_pendidikan->STMIK + $jenjang_pendidikan->STP + $jenjang_pendidikan->STT + $jenjang_pendidikan->STTI + $jenjang_pendidikan->UIN + $jenjang_pendidikan->TELKOM + $jenjang_pendidikan->UMM + $jenjang_pendidikan->UNDAR + $jenjang_pendidikan->UNIBA + $jenjang_pendidikan->UNIV + $jenjang_pendidikan->UT + $jenjang_pendidikan->UPN,
// 										$jenjang_pendidikan->SMA + $jenjang_pendidikan->SMU + $jenjang_pendidikan->MAN + $jenjang_pendidikan->SMK,
// 										$jenjang_pendidikan->SMP + $jenjang_pendidikan->SLTP + $jenjang_pendidikan->MTS,
// 										$jenjang_pendidikan->SD + $jenjang_pendidikan->MI
// 										);
        $nilai_group_pendidikan 	= array(
										$jenjang_pendidikan->UNIVERSITAS,
										$jenjang_pendidikan->SMA ,
										$jenjang_pendidikan->SMP ,
										$jenjang_pendidikan->SD 
										);
        $pendidikan = array(
        	array('label'=>'Universitas','value'=>$jenjang_pendidikan->UNIVERSITAS),
        	array('label'=>'SMA','value'=>$jenjang_pendidikan->SMA),
        	array('label'=>'SMP','value'=>$jenjang_pendidikan->SMP),
        	array('label'=>'SD','value'=>$jenjang_pendidikan->SD)
        );

		$data = array('gender' 				   => $gender,
					  'pendaftar_by_kecamatan' => $pendaftar_by_kecamatan,
					  'jenjang_pendidikan' 	   => $pendidikan,
					  'total_by_status_kawin'  => $total_by_status_perkawinan);
		echo json_encode($data);
	}

	public function json() {
        header('Content-Type: application/json');
        echo $this->Sektoral_disnaker_model->json();
	}
	
	public function map_naker()
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

	public function modal_naker($kecamatan)
	{
		header('Content-Type: application/json');
		$jenjang_pendidikan = $this->Sektoral_disnaker_model->jenjang_pendidikan_by_kec($kecamatan);
		$by_kec 			= $this->Sektoral_disnaker_model->data_by_kec($kecamatan);
		$by_pendidikan		= array(array('label'  => 'SD/MI','value'  => $jenjang_pendidikan->SD + $jenjang_pendidikan->MI),
											array('label'  => 'SMP/MTS','value'  => $jenjang_pendidikan->SMP + $jenjang_pendidikan->SLTP + $jenjang_pendidikan->MTS),
											array('label'  => 'SMA/SMK', 'value'  => $jenjang_pendidikan->SMA + $jenjang_pendidikan->SMU + $jenjang_pendidikan->MAN + $jenjang_pendidikan->SMK),
											array('label'  => 'Perguruan Tinggi', 'value' => $jenjang_pendidikan->UNIVERSITAS + $jenjang_pendidikan->INSTITUT + $jenjang_pendidikan->IKIP_STIKER + $jenjang_pendidikan->SEKOLAH_TINGGI + $jenjang_pendidikan->POLTEKKES +  $jenjang_pendidikan->STAI + $jenjang_pendidikan->AAK +  $jenjang_pendidikan->AKADEMI + $jenjang_pendidikan->AKBID + $jenjang_pendidikan->AKES + $jenjang_pendidikan->AKPER + $jenjang_pendidikan->AMIK + $jenjang_pendidikan->BHKATI + $jenjang_pendidikan->D3 + $jenjang_pendidikan->D_III + $jenjang_pendidikan->D4 + $jenjang_pendidikan->DIII + $jenjang_pendidikan->FAKULTAS + $jenjang_pendidikan->FKM + $jenjang_pendidikan->IAI + $jenjang_pendidikan->IAIN + $jenjang_pendidikan->ITN + $jenjang_pendidikan->ITS + $jenjang_pendidikan->KEMENKES + $jenjang_pendidikan->INSTITUT_AGAMA + $jenjang_pendidikan->Oasis + $jenjang_pendidikan->PSDKU + $jenjang_pendidikan->STIKES + $jenjang_pendidikan->STAIN + $jenjang_pendidikan->STHD + $jenjang_pendidikan->STI + $jenjang_pendidikan->STIB + $jenjang_pendidikan->STIKOM + $jenjang_pendidikan->STIKI + $jenjang_pendidikan->STKIP + $jenjang_pendidikan->STMIK + $jenjang_pendidikan->STP + $jenjang_pendidikan->STT + $jenjang_pendidikan->STTI + $jenjang_pendidikan->UIN + $jenjang_pendidikan->TELKOM + $jenjang_pendidikan->UMM + $jenjang_pendidikan->UNDAR + $jenjang_pendidikan->UNIBA + $jenjang_pendidikan->UNIV + $jenjang_pendidikan->UT + $jenjang_pendidikan->UPN));
		$by_pernikahan		= array(array('label' => 'Laki-laki','value' => $by_kec->laki_laki,'isSliced' => '1'),
									array('label' => 'Perempuan','value' => $by_kec->perempuan));
		$by_gender			= array(array('label' => 'Menikah','value' => $by_kec->menikah,'isSliced' => '1'),
									array('label' => 'Belum','value' => $by_kec->belum));
		$data = array('by_pendidikan' => $by_pendidikan,
					  'by_pernikahan' 	  => $by_pernikahan,
					  'by_gender'		  => $by_gender,
					  'by_wilayah'		  => $by_kec->nama_wilayah);
		echo json_encode($data);

	}

}