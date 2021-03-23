<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Simpus extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model("M_simpus");
    }

    public function index_get()
	{
        $all_kunjungan = $this->M_simpus->puskesmas_by_bulan();
        $all_diagnosa_by_bulan = $this->M_simpus->all_diagnosa_filter();
        $all_puskesmas_by_bulan = $this->M_simpus->all_puskesmas_filter();

		if ($all_kunjungan) {
            $response['SUCCESS'] = array('status' => TRUE, 'message' => 'Data Ditemukan', 
            'all_kunjungan'=>$all_kunjungan,
            'all_diagnosa_by_bulan'=>$all_diagnosa_by_bulan,
            'all_puskesmas_by_bulan'=>$all_puskesmas_by_bulan,
        );
			$this->response($response['SUCCESS'], 200);
		} else {
			$response['NOT_FOUND'] = array('status' => FALSE, 'message' => 'Data tidak tersedia', 'informasi' => null);
			$this->response($response['NOT_FOUND'], 400);
		}
    }
    
    public function puskesmas_get()
	{
        $all_kunjungan_by_puskesmas = $this->M_simpus->by_puskesmas();

		if ($all_kunjungan_by_puskesmas) {
            $response['SUCCESS'] = array('status' => TRUE, 'message' => 'Data Ditemukan', 
            'all_kunjungan'=>$all_kunjungan_by_puskesmas,
        );
			$this->response($response['SUCCESS'], 200);
		} else {
			$response['NOT_FOUND'] = array('status' => FALSE, 'message' => 'Data tidak tersedia', 'informasi' => null);
			$this->response($response['NOT_FOUND'], 400);
		}
	}
}