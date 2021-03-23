<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Perizinan_sekolah extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model("M_perizinan_sekolah");
    }

    public function index_get()
	{
        $all = $this->M_perizinan_sekolah->all_data();
        $all_by_kec= $this->M_perizinan_sekolah->all_by_kecamatan();
        $all_by_bentuk_pendidikan = $this->M_perizinan_sekolah->all_by_bentuk_pendidikan();
        $all_kecamatan = $this->M_perizinan_sekolah->all_tabel_kecamatan();
        $all_kelurahan = $this->M_perizinan_sekolah->by_kelurahan_all();
        $by_kelurahan_pendidikan = $this->M_perizinan_sekolah->by_kelurahan_pendidikan();
		if ($all) {
            $response['SUCCESS'] = array('status' => TRUE, 'message' => 'Data Ditemukan',
            'all_status_perizinan'=>$all,
            'all_kecamatan'=>$all_by_kec,
            'all_bentuk_pendidikan'=>$all_by_bentuk_pendidikan,
            'all_kecamatan_by_bulan'=>$all_kecamatan,
            'all_kelurahan'=>$all_kelurahan,
            'all_kelurahan_pendidikan'=>$by_kelurahan_pendidikan
        );
			$this->response($response['SUCCESS'], 200);
		} else {
			$response['NOT_FOUND'] = array('status' => FALSE, 'message' => 'Data tidak tersedia', 'informasi' => null);
			$this->response($response['NOT_FOUND'], 400);
		}
	}
}