<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Pns extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model("M_pns");
    }

    public function index_get()
	{
        $by_pendidikan = $this->M_pns->by_pendidikan();
        $by_skpd = $this->M_pns->by_skpd();
        $by_jabatan = $this->M_pns->by_jabatan();
        $by_pangkat = $this->M_pns->by_pangkat();
       
		if ($by_pendidikan) {
            $response['SUCCESS'] = array('status' => TRUE, 'message' => 'Data Ditemukan',
            'pns_by_pendidikan'=>$by_pendidikan,
            'pns_by_skpd'=>$by_skpd,
            'pns_by_jabatan'=>$by_jabatan,
            'pns_by_pangkat'=>$by_pangkat
        );
			$this->response($response['SUCCESS'], 200);
		} else {
			$response['NOT_FOUND'] = array('status' => FALSE, 'message' => 'Data tidak tersedia', 'informasi' => null);
			$this->response($response['NOT_FOUND'], 400);
		}
    }
    
}