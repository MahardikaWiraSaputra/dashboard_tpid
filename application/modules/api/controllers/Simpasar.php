<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Simpasar extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
  }

  private function curl($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:19.0) Gecko/20100101 Firefox/19.0");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
		return $output;
	}

  public function index_get()
	{
    $curl_by_pasar = $this->curl('http://simpasar.banyuwangikab.go.id/api/by_pasar');
    $parsing_by_pasar =  json_decode($curl_by_pasar, TRUE);
    $curl_by_tempat_dagang = $this->curl('http://simpasar.banyuwangikab.go.id/api/by_tempat_dagang');
    $parsing_by_tempat_dagang =  json_decode($curl_by_tempat_dagang, TRUE);
    $curl_by_status_sewa = $this->curl('http://simpasar.banyuwangikab.go.id/api/tempat_dagang_by_status_sewa');
    $parsing_by_status_sewa =  json_decode($curl_by_status_sewa, TRUE);
    
    $group = array(
      'by_pasar'=>$parsing_by_pasar,
      'by_tempat_dagang'=>$parsing_by_tempat_dagang,
      'tempat_dagang_by_status_sewa'=>$parsing_by_status_sewa);

		if ($group) {
            $response['SUCCESS'] = array('status' => TRUE, 'message' => 'Data Ditemukan', 
            'data'=>$group
        );
			$this->response($response['SUCCESS'], 200);
		} else {
			$response['NOT_FOUND'] = array('status' => FALSE, 'message' => 'Data tidak tersedia', 'informasi' => null);
			$this->response($response['NOT_FOUND'], 400);
		}
    }
    
}