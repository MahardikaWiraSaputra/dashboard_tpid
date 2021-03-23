<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Aparatur_desa extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model("M_aparatur_desa");
    }

    public function index_get()
	{
        $by_pendidikan = $this->M_aparatur_desa->by_pendidikan();
        $by_jenis_kelamin = $this->M_aparatur_desa->by_jenis_kelamin();
        $by_agama = $this->M_aparatur_desa->by_agama();
        $by_umur = $this->M_aparatur_desa->by_umur();
        $by_masa_kerja = $this->M_aparatur_desa->by_masa_kerja();
        $by_jabatan = $this->M_aparatur_desa->by_jabatan();
       
		if ($by_pendidikan) {
            $response['SUCCESS'] = array('status' => TRUE, 'message' => 'Data Ditemukan',
            'aparatur_by_pendidikan'=>$by_pendidikan,
            'aparatur_by_jenis_kelamin'=>$by_jenis_kelamin,
            'aparatur_by_agama'=>$by_agama,
            'aparatur_by_umur'=>$by_umur,
            'aparatur_by_masa_kerja'=>$by_masa_kerja,
            'aparatur_by_jabatan'=>$by_jabatan
        );
			$this->response($response['SUCCESS'], 200);
		} else {
			$response['NOT_FOUND'] = array('status' => FALSE, 'message' => 'Data tidak tersedia', 'informasi' => null);
			$this->response($response['NOT_FOUND'], 400);
		}
    }
    
}