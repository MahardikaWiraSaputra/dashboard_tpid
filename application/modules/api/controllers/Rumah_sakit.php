<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Rumah_sakit extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model("M_rumah_sakit");
    }

    public function index_get()
	{
        $all_data = $this->M_rumah_sakit->all_data();
       
		if ($all_data) {
            $response['SUCCESS'] = array('status' => TRUE, 'message' => 'Data Ditemukan',
            'all_data'=>$all_data,
        );
			$this->response($response['SUCCESS'], 200);
		} else {
			$response['NOT_FOUND'] = array('status' => FALSE, 'message' => 'Data tidak tersedia', 'informasi' => null);
			$this->response($response['NOT_FOUND'], 400);
		}
    }
    
}