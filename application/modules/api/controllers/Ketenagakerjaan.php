<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Ketenagakerjaan extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model("M_ketenagakerjaan");
    }

    public function index_get()
	{
        $group_gender = $this->M_ketenagakerjaan->group_gender();
        $group_perkawinan = $this->M_ketenagakerjaan->total_by_status_perkawinan();
        $group_kecamatan = $this->M_ketenagakerjaan->by_kecamatan_pendaftar();
        $jenjang_pendidikan = $this->M_ketenagakerjaan->by_jenjang_pendidikan();
        foreach($jenjang_pendidikan as $pendidikan){
                $by_kec[] = array('nama_wilayah'=>$pendidikan->nama_wilayah,'data' =>
                                array(
                                    array('SD/MI'=>$pendidikan->SD + $pendidikan->MI),
                                    array('SMP/MTS'=>$pendidikan->SMP + $pendidikan->SLTP + $pendidikan->MTS),
                                    array('SMA/SMK'=>$pendidikan->SMA + $pendidikan->SMU + $pendidikan->MAN + $pendidikan->SMK),
                                    array('perguruan_tinggi'=>$pendidikan->UNIVERSITAS + $pendidikan->INSTITUT + $pendidikan->IKIP_STIKER + $pendidikan->SEKOLAH_TINGGI + $pendidikan->POLTEKKES +  $pendidikan->STAI + $pendidikan->AAK +  $pendidikan->AKADEMI + $pendidikan->AKBID + $pendidikan->AKES + $pendidikan->AKPER + $pendidikan->AMIK + $pendidikan->BHAKTI + $pendidikan->D3 + $pendidikan->DIII + $pendidikan->D4 + $pendidikan->FAKULTAS + $pendidikan->FKM + $pendidikan->IAI + $pendidikan->IAIN + $pendidikan->ITN + $pendidikan->ITS + $pendidikan->KEMENKES + $pendidikan->INSTITUT_AGAMA + $pendidikan->OASIS + $pendidikan->PSDKU + $pendidikan->STIKES + $pendidikan->STAIN + $pendidikan->STHD + $pendidikan->STI + $pendidikan->STIB + $pendidikan->STIKOM + $pendidikan->STIKI + $pendidikan->STKIP + $pendidikan->STMIK + $pendidikan->STP + $pendidikan->STT + $pendidikan->STTI + $pendidikan->UIN + $pendidikan->TELKOM + $pendidikan->UMM + $pendidikan->UNDAR + $pendidikan->UNIBA + $pendidikan->UNIV + $pendidikan->UT + $pendidikan->UPN)
                                    ));
        }
        $group_umur = $this->M_ketenagakerjaan->by_umur();
		if ($group_gender) {
            $response['SUCCESS'] = array('status' => TRUE, 'message' => 'Data Ditemukan', 
            'pendaftar_by_gender' => $group_gender,
            'pendaftar_by_perkawinan'=>$group_perkawinan,
            'pendaftar_by_kecamatan'=>$group_kecamatan,
            'jenjang_pendidikan_by_kec'=>$by_kec,
            'pendaftar_by_umur'=>$group_umur);
			$this->response($response['SUCCESS'], 200);
		} else {
			$response['NOT_FOUND'] = array('status' => FALSE, 'message' => 'Data tidak tersedia', 'informasi' => null);
			$this->response($response['NOT_FOUND'], 400);
		}
	}
}