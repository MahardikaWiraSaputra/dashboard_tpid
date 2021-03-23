<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Harga_pasar extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model("M_harga_pasar");
    }

    public function index_get()
	{
        $all_data = $this->M_harga_pasar->all_data();
       
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