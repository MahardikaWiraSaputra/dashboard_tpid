<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Evb extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model("M_evb");
    }

    public function index_get()
	{
        $all_data = $this->M_evb->all_desa();
        $alokasi_dana_desa_by_kec = $this->M_evb->alokasi_dana_by_kecamatan();
        $belanja_by_desa = $this->M_evb->program_by_desa();
		if ($all_data) {
            $response['SUCCESS'] = array('status' => TRUE, 'message' => 'Data Ditemukan',
            'all_data'=>$all_data,
            'total_alokasi_dana_by_kecamatan'=>$alokasi_dana_desa_by_kec,
            'belanja_by_desa'=>$belanja_by_desa
        );
			$this->response($response['SUCCESS'], 200);
		} else {
			$response['NOT_FOUND'] = array('status' => FALSE, 'message' => 'Data tidak tersedia', 'informasi' => null);
			$this->response($response['NOT_FOUND'], 400);
		}
    }
    
    public function belanja_get()
	{
        $belanja_by_desa = $this->M_evb->program_by_desa();
		if ($belanja_by_desa) {
            $response['SUCCESS'] = array('status' => TRUE, 'message' => 'Data Ditemukan',
            'belanja_by_desa'=>$belanja_by_desa
        );
			$this->response($response['SUCCESS'], 200);
		} else {
			$response['NOT_FOUND'] = array('status' => FALSE, 'message' => 'Data tidak tersedia', 'informasi' => null);
			$this->response($response['NOT_FOUND'], 400);
		}
	}
}