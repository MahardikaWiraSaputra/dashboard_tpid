<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Nakes extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model("M_nakes");
    }

    public function index_get()
	{
        $group_kecamatan = $this->M_nakes->all_by_kec();
        $group_kecamatan_filter = $this->M_nakes->all_by_kec_filter();
        $group_kelurahan = $this->M_nakes->all_by_kel();
        $group_kelurahan_filter = $this->M_nakes->all_by_kel_filter();
        $group_kecamatan_jenis_surat = $this->M_nakes->all_by_kec_jenis_surat();
        $group_kecamatan_jenis_surat_filter = $this->M_nakes->all_by_kec_jenis_surat_filter();
        $all_by_profesi = $this->M_nakes->all_by_profesi();
        $all_by_profesi_kelurahan = $this->M_nakes->all_by_profesi_kelurahan();
        $all_by_gender = $this->M_nakes->all_gender();
        $all_by_gender_kelurahan = $this->M_nakes->all_gender_kelurahan();
		if ($group_kecamatan) {
            $response['SUCCESS'] = array('status' => TRUE, 'message' => 'Data Ditemukan', 
            'group_kecamatan' => $group_kecamatan,
            'group_kecamatan_filter'=>$group_kecamatan_filter,
            'group_kelurahan'=>$group_kelurahan,
            'group_kelurahan_filter'=> $group_kelurahan_filter,
            'group_kecamatan_jenis_surat'=>$group_kecamatan_jenis_surat,
            'group_kecamatan_jenis_surat_filter'=>$group_kecamatan_jenis_surat_filter,
            'group_kecamatan_by_profesi'=>$all_by_profesi,
            'group_kelurahan_by_profesi'=>$all_by_profesi_kelurahan,
            'group_by_gender'=>$all_by_gender,
            'group_by_gender_kelurahan'=>$all_by_gender_kelurahan
        );
			$this->response($response['SUCCESS'], 200);
		} else {
			$response['NOT_FOUND'] = array('status' => FALSE, 'message' => 'Data tidak tersedia', 'informasi' => null);
			$this->response($response['NOT_FOUND'], 400);
		}
	}
}