<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_pasar extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('Pasar_model');
		$this->load->model('Map_model');        
	}
	
	public function index()
	{
		$param = 'PASAR BANYUWANGI';
		$tanggal = date('Y-m-d');
        // $tanggal = '2021-01-12';
		// $sekarang = date('Y-m-d');
		// $kemarin = date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d"))));
		$sekarang = '2021-01-12'; $kemarin = '2021-01-11';
		$data['harga_pasar'] = $this->Pasar_model->komoditas_pasar($param,$tanggal);
		$data['get_pasar'] = $this->Pasar_model->get_pasar();
		$data['sekarang'] = $sekarang;
		$data['layout'] = 'index';
		$this->load->view('layout',$data);
	}

	public function by_pasar()
	{
		header('Content-Type: application/json');
		$pasar = $this->input->get('pasar');
		$tanggal = $this->input->get('tanggal');
		$by_pasar = $this->Pasar_model->komoditas_pasar($param,$tanggal);

		$get_1 = array_slice($by_pasar,0,3);
		$get_2 = array_slice($by_pasar,3,3);
		$get_3 = array_slice($by_pasar,6,3);
		$get_4 = array_slice($by_pasar,9,3);
		$get_5 = array_slice($by_pasar,12,3);
		$get_6 = array_slice($by_pasar,15,3);
		$get_7 = array_slice($by_pasar,18,3);
		$get_8 = array_slice($by_pasar,21,3);
		$get_9 = array_slice($by_pasar,23,3);
		$get_10 = array_slice($by_pasar,26,3);
		$get_11 = array_slice($by_pasar,29,3);
		$get_12 = array_slice($by_pasar,32,3);
		$get_13 = array_slice($by_pasar,35,3);
		$get_14 = array_slice($by_pasar,38,3);
		$get_15 = array_slice($by_pasar,41,3);
		$get_16 = array_slice($by_pasar,44,3);
		$get_17 = array_slice($by_pasar,47,3);
		$get_18 = array_slice($by_pasar,50,3);
		$get_19 = array_slice($by_pasar,53,3);
		$get_20 = array_slice($by_pasar,56,3);
		$get_21 = array_slice($by_pasar,59,3);
		$get_22 = array_slice($by_pasar,62,3);
		$get_23 = array_slice($by_pasar,65,3);
		$get_24 = array_slice($by_pasar,68,3);
		$get_25 = array_slice($by_pasar,71,3);
		$no = 0;
        $html1 = '';
        $html2 = '';
        $html3 = '';
        $html4 = '';
        $html5 = '';
		$html6 = '';
		$html7 = '';
		$html8 = '';
        $html9 = '';
        $html11= '';
        $html11 = '';
        $html12 = '';
		$html13 = '';
		$html14 = '';

		$data = array('by_filter_kecamatan' => $by_filter_kecamatan,
					 'by_kecamatan_filter_bidang' => $by_kecamatan_filter_bidang);
		echo json_encode($data);
	}

	public function get_api(){
        $data_api = $this->db->query("SELECT * FROM v_stok_pasar")->result_array();

        foreach ($data_api as $result => $data) {
            $data_json[] = array(
                'nama_pasar' => $data['pasar'],
                'tanggal' => $data['tanggal'],
                'VAL1' => $data['VAL1'],
                'VAL2' => $data['VAL2'],
                'VAL3' => $data['VAL3'],
                'VAL4' => $data['VAL4'],
                'VAL5' => $data['VAL5'],
                'VAL6' => $data['VAL6'],
                'VAL7' => $data['VAL7'],
                'VAL8' => $data['VAL8'],
                'VAL9' => $data['VAL9'],
                'VAL10' => $data['VAL10'],
                'VAL11' => $data['VAL11'],
                'VAL12' => $data['VAL12'],
                'VAL13' => $data['VAL13'],
                'VAL14' => $data['VAL14'],
                'VAL15' => $data['VAL15'],
                'VAL16' => $data['VAL16'],
                'VAL17' => $data['VAL17'],
                'VAL18' => $data['VAL18'],
                'VAL19' => $data['VAL19'],
                'VAL20' => $data['VAL20'],
                'VAL21' => $data['VAL21'],
                'VAL22' => $data['VAL22'],
                'VAL23' => $data['VAL23'],
                'VAL24' => $data['VAL24'],
                'VAL25' => $data['VAL25'],
                'VAL26' => $data['VAL26'],
                'VAL27' => $data['VAL27'],
                'VAL28' => $data['VAL28'],
                'VAL29' => $data['VAL29'],
                'VAL30' => $data['VAL30'],
                'VAL31' => $data['VAL31'],
                'VAL32' => $data['VAL32'],
                'VAL33' => $data['VAL33'],
                'VAL34' => $data['VAL34'],
                'VAL35' => $data['VAL35'],
                'VAL36' => $data['VAL36'],
                'VAL37' => $data['VAL37'],
                'VAL38' => $data['VAL38'],
                'VAL39' => $data['VAL39'],
                'VAL40' => $data['VAL40'],
                'VAL41' => $data['VAL41'],
                'VAL42' => $data['VAL42'],
                'VAL43' => $data['VAL43'],
                'VAL44' => $data['VAL44'],
                'VAL45' => $data['VAL45'],
                'VAL46' => $data['VAL46'],
                'VAL47' => $data['VAL47'],
                'VAL48' => $data['VAL48'],
                'VAL49' => $data['VAL49'],
                'VAL50' => $data['VAL50'],
                'VAL51' => $data['VAL51'],
                'VAL52' => $data['VAL52'],
                'VAL53' => $data['VAL53'],
                'VAL54' => $data['VAL54'],
                'VAL55' => $data['VAL55'],
                'VAL56' => $data['VAL56'],
                'VAL57' => $data['VAL57'],
                'VAL58' => $data['VAL58'],
                'VAL59' => $data['VAL59'],
                'VAL60' => $data['VAL60'],
                'VAL61' => $data['VAL61'],
                'VAL62' => $data['VAL62'],
                'VAL63' => $data['VAL63'],
                'VAL64' => $data['VAL64'],
                'VAL65' => $data['VAL65'],
                'VAL66' => $data['VAL66'],
                'VAL67' => $data['VAL67'],
                'VAL68' => $data['VAL68'],
                'VAL69' => $data['VAL69'],
                'VAL70' => $data['VAL70'],
                'VAL71' => $data['VAL71'],
                'VAL72' => $data['VAL72'],
                'VAL73' => $data['VAL73'],
                'VAL74' => $data['VAL74']
            );
        }
        return $data_json;
	}

	public function get_api_stok(){
        $data_api = $this->db->query("SELECT * FROM v_stok_pasar")->result_array();

        foreach ($data_api as $result => $data) {
            $data_json[] = array(
                'nama_pasar' => $data['pasar'],
                'tanggal' => $data['tanggal'],
                'STC_VAL1' => $data['STC_VAL1'],
                'STC_VAL2' => $data['STC_VAL2'],
                'STC_VAL3' => $data['STC_VAL3'],
                'STC_VAL4' => $data['STC_VAL4'],
                'STC_VAL5' => $data['STC_VAL5'],
                'STC_VAL6' => $data['STC_VAL6'],
                'STC_VAL7' => $data['STC_VAL7'],
                'STC_VAL8' => $data['STC_VAL8'],
                'STC_VAL9' => $data['STC_VAL9'],
                'STC_VAL10' => $data['STC_VAL10'],
                'STC_VAL11' => $data['STC_VAL11'],
                'STC_VAL12' => $data['STC_VAL12'],
                'STC_VAL13' => $data['STC_VAL13'],
                'STC_VAL14' => $data['STC_VAL14'],
                'STC_VAL15' => $data['STC_VAL15'],
                'STC_VAL16' => $data['STC_VAL16'],
                'STC_VAL17' => $data['STC_VAL17'],
                'STC_VAL18' => $data['STC_VAL18'],
                'STC_VAL19' => $data['STC_VAL19'],
                'STC_VAL20' => $data['STC_VAL20'],
                'STC_VAL21' => $data['STC_VAL21'],
                'STC_VAL22' => $data['STC_VAL22'],
                'STC_VAL23' => $data['STC_VAL23'],
                'STC_VAL24' => $data['STC_VAL24'],
                'STC_VAL25' => $data['STC_VAL25'],
                'STC_VAL26' => $data['STC_VAL26'],
                'STC_VAL27' => $data['STC_VAL27'],
                'STC_VAL28' => $data['STC_VAL28'],
                'STC_VAL29' => $data['STC_VAL29'],
                'STC_VAL30' => $data['STC_VAL30'],
                'STC_VAL31' => $data['STC_VAL31'],
                'STC_VAL32' => $data['STC_VAL32'],
                'STC_VAL33' => $data['STC_VAL33'],
                'STC_VAL34' => $data['STC_VAL34'],
                'STC_VAL35' => $data['STC_VAL35'],
                'STC_VAL36' => $data['STC_VAL36'],
                'STC_VAL37' => $data['STC_VAL37'],
                'STC_VAL38' => $data['STC_VAL38'],
                'STC_VAL39' => $data['STC_VAL39'],
                'STC_VAL40' => $data['STC_VAL40'],
                'STC_VAL41' => $data['STC_VAL41'],
                'STC_VAL42' => $data['STC_VAL42'],
                'STC_VAL43' => $data['STC_VAL43'],
                'STC_VAL44' => $data['STC_VAL44'],
                'STC_VAL45' => $data['STC_VAL45'],
                'STC_VAL46' => $data['STC_VAL46'],
                'STC_VAL47' => $data['STC_VAL47'],
                'STC_VAL48' => $data['STC_VAL48'],
                'STC_VAL49' => $data['STC_VAL49'],
                'STC_VAL50' => $data['STC_VAL50'],
                'STC_VAL51' => $data['STC_VAL51'],
                'STC_VAL52' => $data['STC_VAL52'],
                'STC_VAL53' => $data['STC_VAL53'],
                'STC_VAL54' => $data['STC_VAL54'],
                'STC_VAL55' => $data['STC_VAL55'],
                'STC_VAL56' => $data['STC_VAL56'],
                'STC_VAL57' => $data['STC_VAL57'],
                'STC_VAL58' => $data['STC_VAL58'],
                'STC_VAL59' => $data['STC_VAL59'],
                'STC_VAL60' => $data['STC_VAL60'],
                'STC_VAL61' => $data['STC_VAL61'],
                'STC_VAL62' => $data['STC_VAL62'],
                'STC_VAL63' => $data['STC_VAL63'],
                'STC_VAL64' => $data['STC_VAL64'],
                'STC_VAL65' => $data['STC_VAL65'],
                'STC_VAL66' => $data['STC_VAL66'],
                'STC_VAL67' => $data['STC_VAL67'],
                'STC_VAL68' => $data['STC_VAL68'],
                'STC_VAL69' => $data['STC_VAL69'],
                'STC_VAL70' => $data['STC_VAL70'],
                'STC_VAL71' => $data['STC_VAL71'],
                'STC_VAL72' => $data['STC_VAL72'],
                'STC_VAL73' => $data['STC_VAL73'],
                'STC_VAL74' => $data['STC_VAL74']
            );
        }
        return $data_json;
	}
	
	public function get_pasar(){
        $data = $this->get_api();
        foreach ($data as $result => $value) {
            if (!empty($value['nama_pasar'])) {
                $data_json[] = array(
                    'nama_pasar' => $value['nama_pasar']
                );
            }
        }
        // $result = sort($data_json);
        return array_unique($data_json, SORT_REGULAR);
    }

    public function get_tanggal(){
        $data = $this->get_api();
        foreach ($data as $result => $value) {
            if (!empty($value['tanggal'])) {
                $data_json[] = array(
                    'tanggal' => $value['tanggal']
                );
            }
        }
        // print_r($data_json);
        return array_unique($data_json, SORT_REGULAR);
	}

	public function stok(){
        error_reporting(0);
        $data = $this->get_api();

        // $filter_pasar = $this->input->post('pasar');

        if ($this->input->post('pasar') == null) {
            $filter_pasar = 'PASAR BANYUWANGI';
        }
        else {
            $filter_pasar = $this->input->post('pasar');
        }

        // $sekarang = date('Y-m-d');
        // $sekarang = '2020-12-14';
		// $kemarin = date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d"))));
        $sekarang = '2021-03-15'; $kemarin = '2021-03-14';
// 		$kemarin = '2020-12-13';

        $filtered_pasar = array_filter($data, function ($data) use ($filter_pasar) {
            return ($data["nama_pasar"] == $filter_pasar);
        });

        $filtered_sekarang = array_filter($filtered_pasar, function ($filtered_pasar) use ($sekarang) {
            return ($filtered_pasar["tanggal"] == $sekarang);
        });
        
        foreach ($filtered_sekarang as $key => $value) {
            $result_skrg = $value;
        }
        // echo "<pre>" . var_export($result_skrg, true) . "</pre>";

        $filtered_kemarin = array_filter($filtered_pasar, function ($filtered_pasar) use ($kemarin) {
            return ($filtered_pasar["tanggal"] == $kemarin);
        });

        foreach ($filtered_kemarin as $key => $value) {
            $result_kmrn = $value;
        }
        $list_pasar = $this->db->query("SELECT * FROM komoditas_pasar")->result_array();
        // print_r($filtered_pasar);
        // print_r($filtered_sekarang);
        foreach ($list_pasar as $key_pasar) {
			$kode_filter = $key_pasar['KODE_JENIS'];
			$gambar = $key_pasar['GAMBAR'];
            $data_skrg = $result_skrg[''.$kode_filter.''];
            $data_kmrn = $result_kmrn[''.$kode_filter.''];

            // print_r('sekarang'.' '.$data_skrg.'<br>');
            // print_r('kemarin'.' '.$data_kmrn.'<br>');

            $margin = ((int)$data_skrg - (int)$data_kmrn);
            if ($data_skrg == $data_kmrn) { $status = 'HARGA STABIL'; }
            elseif ($data_kmrn < $data_skrg) { $status = 'NAIK'; }
            elseif ($data_kmrn > $data_skrg) { $status = 'TURUN'; }

            $data_pasar[] = array(
                'pasar' => $result_skrg['nama_pasar'],
                'tanggal' => $result_skrg['tanggal'],
                'kode' => $key_pasar['KODE_JENIS'],
                'komoditas' => $key_pasar['KET'],
                'satuan' => $key_pasar['SATUAN'],
                'harga_sekarang' => $data_skrg,
                'harga_kemarin' => $data_kmrn,
                'status' => $status,
				'margin' => $margin,
				'gambar'=>$gambar
            );
            // print_r('<pre>'.print_r($data_pasar).'</pre>');
        }
		// var_dump($data_pasar); die;
        
        $data  = array_slice($data_pasar, 0, 3);
        $data2 = array_slice($data_pasar, 3, 3);
        $data3 = array_slice($data_pasar, 6, 3);
        $data4 = array_slice($data_pasar, 9, 3);
        $data5 = array_slice($data_pasar, 12, 3);
		$data6 = array_slice($data_pasar, 15, 3);
		$data7 = array_slice($data_pasar, 18, 3);
		$data8 = array_slice($data_pasar, 18, 3);
		$data9 = array_slice($data_pasar, 21, 3);
		$data10 = array_slice($data_pasar, 23, 3);
		$data11 = array_slice($data_pasar, 26, 3);
		$data12 = array_slice($data_pasar, 29, 3);
		$data13 = array_slice($data_pasar, 32, 3);
		$data14 = array_slice($data_pasar, 35, 3);
		$data15 = array_slice($data_pasar, 38, 3);
		$data16 = array_slice($data_pasar, 41, 3);
		$data17 = array_slice($data_pasar, 44, 3);
		$data18 = array_slice($data_pasar, 47, 3);
		$data19 = array_slice($data_pasar, 50, 3);
		$data20 = array_slice($data_pasar, 53, 3);
		$data21 = array_slice($data_pasar, 56, 3);
		$data22 = array_slice($data_pasar, 59, 3);
		$data23 = array_slice($data_pasar, 62, 3);
		$data24 = array_slice($data_pasar, 65, 3);
		$data25 = array_slice($data_pasar, 68, 3);
		$data26 = array_slice($data_pasar, 71, 3);

        $no = 0;
        $html = '';
        $html2 = '';
        $html3 = '';
        $html4 = '';
        $html5 = '';
        $html6 = '';
        $html7 = '';
		$html8 = '';
		$html9 = '';
		$html10 = '';
		$html11 = '';
		$html12 = '';
		$html13 = '';
		$html14 = '';
		$html15 = '';
		$html16 = '';
		$html17 = '';
		$html18 = '';
		$html19 = '';
		$html20 = '';
		$html21 = '';
		$html22 = '';
		$html23 = '';
		$html24 = '';
		$html25 = '';
		$html26 = '';

        foreach ($data as $key) {
            if ($key['status'] == 'NAIK') {
				$html .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['status'] == 'TURUN') {
                $html .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['harga_sekarang'] == 0) {
				$html .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 not">Belum Diupdate</h6>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
            else {
                $html .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
		}
		foreach ($data2 as $key) {
            if ($key['status'] == 'NAIK') {
				$html2 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['status'] == 'TURUN') {
                $html2 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['harga_sekarang'] == 0) {
				$html2 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 not">Belum Diupdate</h6>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
            else {
                $html2 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
		}
		foreach ($data3 as $key) {
            if ($key['status'] == 'NAIK') {
				$html3 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['status'] == 'TURUN') {
                $html3 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['harga_sekarang'] == 0) {
				$html3 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 not">Belum Diupdate</h6>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
            else {
                $html3 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
		}
		foreach ($data4 as $key) {
            if ($key['status'] == 'NAIK') {
				$html4 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['status'] == 'TURUN') {
                $html4 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['harga_sekarang'] == 0) {
				$html4 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 not">Belum Diupdate</h6>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
            else {
                $html4 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
		}
		foreach ($data5 as $key) {
            if ($key['status'] == 'NAIK') {
				$html5 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['status'] == 'TURUN') {
                $html5 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['harga_sekarang'] == 0) {
				$html5 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 not">Belum Diupdate</h6>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
            else {
                $html5 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
		}
		foreach ($data6 as $key) {
            if ($key['status'] == 'NAIK') {
				$html6 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['status'] == 'TURUN') {
                $html6 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['harga_sekarang'] == 0) {
				$html6 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 not">Belum Diupdate</h6>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
            else {
                $html6 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
		}
		foreach ($data7 as $key) {
            if ($key['status'] == 'NAIK') {
				$html7 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['status'] == 'TURUN') {
                $html7 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['harga_sekarang'] == 0) {
				$html7 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 not">Belum Diupdate</h6>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
            else {
                $html7 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
		}
		foreach ($data8 as $key) {
            if ($key['status'] == 'NAIK') {
				$html8 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['status'] == 'TURUN') {
                $html8 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['harga_sekarang'] == 0) {
				$html8 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 not">Belum Diupdate</h6>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
            else {
                $html8 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
		}
		foreach ($data9 as $key) {
            if ($key['status'] == 'NAIK') {
				$html9 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['status'] == 'TURUN') {
                $html9 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['harga_sekarang'] == 0) {
				$html9 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 not">Belum Diupdate</h6>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
            else {
                $html9 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
		}
		foreach ($data10 as $key) {
            if ($key['status'] == 'NAIK') {
				$html10 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['status'] == 'TURUN') {
                $html10 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['harga_sekarang'] == 0) {
				$html10 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 not">Belum Diupdate</h6>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
            else {
                $html10 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
		}
		foreach ($data11 as $key) {
            if ($key['status'] == 'NAIK') {
				$html11 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['status'] == 'TURUN') {
                $html11 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['harga_sekarang'] == 0) {
				$html11 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 not">Belum Diupdate</h6>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
            else {
                $html11 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
		}
		foreach ($data12 as $key) {
            if ($key['status'] == 'NAIK') {
				$html12 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['status'] == 'TURUN') {
                $html12 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['harga_sekarang'] == 0) {
				$html12 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 not">Belum Diupdate</h6>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
            else {
                $html12 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }

		}
		foreach ($data13 as $key) {
            if ($key['status'] == 'NAIK') {
				$html13 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['status'] == 'TURUN') {
                $html13 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['harga_sekarang'] == 0) {
				$html13 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 not">Belum Diupdate</h6>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
            else {
                $html13 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
		}
		foreach ($data14 as $key) {
            if ($key['status'] == 'NAIK') {
				$html14 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['status'] == 'TURUN') {
                $html14 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['harga_sekarang'] == 0) {
				$html14 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 not">Belum Diupdate</h6>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
            else {
                $html14 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }

		}
		foreach ($data15 as $key) {
            if ($key['status'] == 'NAIK') {
				$html15 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['status'] == 'TURUN') {
                $html15 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['harga_sekarang'] == 0) {
				$html15 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 not">Belum Diupdate</h6>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
            else {
                $html15 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }

		}
		foreach ($data16 as $key) {
            if ($key['status'] == 'NAIK') {
				$html16 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['status'] == 'TURUN') {
                $html16 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['harga_sekarang'] == 0) {
				$html16 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 not">Belum Diupdate</h6>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
            else {
                $html16 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }

		}
		foreach ($data17 as $key) {
            if ($key['status'] == 'NAIK') {
				$html17 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['status'] == 'TURUN') {
                $html17 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['harga_sekarang'] == 0) {
				$html17 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 not">Belum Diupdate</h6>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
            else {
                $html17 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }

		}
		foreach ($data18 as $key) {
            if ($key['status'] == 'NAIK') {
				$html18 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['status'] == 'TURUN') {
                $html18 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['harga_sekarang'] == 0) {
				$html18 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 not">Belum Diupdate</h6>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
            else {
                $html18 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }

		}
		foreach ($data19 as $key) {
            if ($key['status'] == 'NAIK') {
				$html19 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['status'] == 'TURUN') {
                $html19 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['harga_sekarang'] == 0) {
				$html19 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 not">Belum Diupdate</h6>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
            else {
                $html19 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }

		}
		foreach ($data20 as $key) {
            if ($key['status'] == 'NAIK') {
				$html20 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['status'] == 'TURUN') {
                $html20 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['harga_sekarang'] == 0) {
				$html20 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 not">Belum Diupdate</h6>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
            else {
                $html20 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }

		}
		foreach ($data21 as $key) {
            if ($key['status'] == 'NAIK') {
				$html21 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['status'] == 'TURUN') {
                $html21 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['harga_sekarang'] == 0) {
				$html21 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 not">Belum Diupdate</h6>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
            else {
                $html21 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }

		}
		foreach ($data22 as $key) {
            if ($key['status'] == 'NAIK') {
				$html22 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['status'] == 'TURUN') {
                $html22 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['harga_sekarang'] == 0) {
				$html22 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 not">Belum Diupdate</h6>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
            else {
                $html22 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }

		}
		foreach ($data23 as $key) {
            if ($key['status'] == 'NAIK') {
				$html23 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['status'] == 'TURUN') {
                $html23 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['harga_sekarang'] == 0) {
				$html23 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 not">Belum Diupdate</h6>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
            else {
                $html23 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }

		}
		foreach ($data24 as $key) {
            if ($key['status'] == 'NAIK') {
				$html24 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['status'] == 'TURUN') {
                $html24 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['harga_sekarang'] == 0) {
				$html24 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 not">Belum Diupdate</h6>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
            else {
                $html24 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }

		}
		foreach ($data25 as $key) {
            if ($key['status'] == 'NAIK') {
				$html25 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['status'] == 'TURUN') {
                $html25 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['harga_sekarang'] == 0) {
				$html25 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 not">Belum Diupdate</h6>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
            else {
                $html25 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }

		}
		foreach ($data26 as $key) {
            if ($key['status'] == 'NAIK') {
				$html26 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['status'] == 'TURUN') {
                $html26 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }
            elseif ($key['harga_sekarang'] == 0) {
				$html26 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 not">Belum Diupdate</h6>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
            else {
                $html26 .= '
				<div class="col-xs-2 col-6 col-sm-6 col-lg-3">
                    <div class="card shop-card">
                        <div class="product-img-wrap"><img class="card-img-top" style="width:286px;height:286px" src="'.$key['gambar'].'" alt="">
                        </div>
                        <div class="product-meta d-flex align-items-center justify-content-between p-4">
                            <div class="product-name">
                                <h6>'.$key['komoditas'].'</h6>
                                <h6 class="price mb-0 stabil">Stok : '.rupiah($key['harga_sekarang']).'</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
				';
            }

		}
        
        $skrg = '2021-01-25';
        $kmrn = '2021-01-24';
		$data_json = array('data' => $html,
						   'data2'=> $html2,
						   'data3'=> $html3,
						   'data4'=> $html4,
						   'data5'=> $html5,
						   'data6'=> $html6,
						   'data7'=> $html7,
						   'data8'=> $html8,
						   'data9'=> $html9,
						   'data10'=> $html10,
						   'data11'=> $html11,
						   'data12'=> $html12,
						   'data13'=> $html13,
						   'data14'=> $html14,
						   'data15'=> $html15,
						   'data16'=> $html16,
						   'data17'=> $html17,
						   'data18'=> $html18,
						   'data19'=> $html19,
						   'data20'=> $html20,
						   'data21'=> $html21,
						   'data22'=> $html22,
						   'data23'=> $html23,
						   'data24'=> $html24,
						   'data25'=> $html25,
						   'data26'=> $html26,
						   'sekarang'=> tgl_indo($sekarang),
                           'kemarin' => tgl_indo($kemarin));
        echo json_encode($data_json);
    }

} 