<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

	public function api_pasar(){
        $apiURL = 'http://sipo.banyuwangikab.go.id/naker/getdata.php';
        $curlh = curl_init($apiURL);
		curl_setopt($curlh, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($curlh, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:19.0) Gecko/20100101 Firefox/19.0");
        curl_setopt($curlh, CURLOPT_HEADER, FALSE);
        curl_setopt($curlh, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curlh, CURLOPT_CONNECTTIMEOUT, 30000000);
        curl_setopt($curlh, CURLOPT_TIMEOUT, 3000000);
		$resultJSON = curl_exec($curlh);
		$res = json_decode($resultJSON,TRUE);
        foreach($res as $data) {
			echo $data['nik'];
		}
        // curl_close($curlh);
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

	function naker(){
		$curl = $this->curl("http://sipo.banyuwangikab.go.id/naker/getdata.php");
		$result =  json_decode($curl, TRUE);
        foreach($result['data'] as $row){
			$data_form = array('NIK' =>$row['nik'] ,
								'nm_lengkap'=>$row['nm_lengkap'],
    							'gelar_belakang' =>$row['gelar_belakang'],
    							'tempat_lahir' =>$row['tempat_lahir'],
    							'tgl_lahir' =>$row['tgl_lahir'],
    							'jenis_kelamin' =>$row['jenis_kelamin'],
    							'agama' =>$row['agama'],
    							'status_perkawinan' =>$row['status_perkawinan'],
    							'alamat' =>$row['alamat'],
    							'nama_wilayah' =>$row['nama_wilayah'],
    							'nm_instansi' =>$row['nm_instansi'],
							  );
			// $nik =  "'".$row['nik']."'";
			// $cek_nik = $this->db->query('SELECT NIK FROM sektoral_disnaker WHERE NIK = ".$nik." ')->row();
			// if($cek_nik->NIK == $row['nik']) {

			// } else {
				$this->db->insert('sektoral_disnaker', $data_form);
			// }
			
		}
	}

	function nakes(){
		$curl = $this->curl("http://103.202.227.41/data/api/nakesSurat");
		$result =  json_decode($curl, TRUE);
        foreach($result as $row){
			$data_form = array('NIK' =>$row['nik'] ,
								'nama'=>$row['nama'],
    							'profesi' =>$row['profesi'],
    							'sex' =>$row['sex'],
    							'tgl_berlaku' =>$row['tgl_berlaku'],
    							'jenis_surat' =>$row['jenis_surat'],
    							'tempat_praktek_ke' =>$row['tempat_praktek_ke'],
    							'tempat_praktek' =>$row['tempat_paraktek'],
    							'kecamatan_tempat_praktek' =>$row['kecamatan_tempat_praktek'],
								'kelurahan_tempat_praktek' =>$row['kelurahan_tempat_praktek'],
								'kecamatan_tempat_praktek_pribadi' =>$row['kecamatan_tempat_praktek_pribadi'],
								'kelurahan_tempat_praktek_pribadi' =>$row['kelurahan_tempat_praktek_pribadi'],
								'status_berlaku' =>$row['status_berlaku'],
								'created_date' =>$row['created_date'],
							  );
			$this->db->insert('sektoral_nakes', $data_form);
		}
	}

	function evb(){
		$curl = $this->curl("http://localhost/evb.json");
		$result =  json_decode($curl, TRUE);
       
		foreach($result['apbdes'] as $key => $data){
			$data_master = array('kecamatan' => $data['kecamatan'],
								'desa'=> $data['desa'],
								'tahun_anggaran' =>$data['tahun_anggaran']);
			$this->db->insert('evb',$data_master);
			$get_id = $this->db->insert_id();
			foreach($result['apbdes'][$key]['data_pendapatan'] as $datas){
				$data_transaksi = array('id_evb_master' =>$get_id,
									'bidang' => $datas['bidang'],
									'program'=> $datas['program'],
									'kegiatan'=> $datas['kegiatan'],
									'jumlah'=>$datas['jumlah'],
									'tipe' =>$datas['akun']);
				$this->db->insert('evb_transaksi',$data_transaksi);
			}
			foreach($result['apbdes'][$key]['data_belanja'] as $dataj){
				$data_transaksi = array('id_evb_master' =>$get_id,
									'bidang' => $dataj['bidang'],
									'program'=> $dataj['program'],
									'kegiatan'=> $dataj['kegiatan'],
									'jumlah'=>$dataj['jumlah'],
									'tipe' =>$dataj['akun']);
				$this->db->insert('evb_transaksi',$data_transaksi);
			}
		}
		// foreach($result['apbdes'] as $key => $data){ 
		// 	echo $result['apbdes'][$key]['jumlah_anggaran'];
		// }
		

	}

	function perizinan_sekolah(){
		$curl = $this->curl("http://perijinan-sekolah.banyuwangikab.go.id/simpos/index.php?r=Simpos/Service_api");
		$result =  json_decode($curl, TRUE);
        foreach($result as $row){
			$data_form = array(
								'nama_sekolah' =>$row['nama'],
								'no_kec'	   =>$row['NO_KEC'],
								'no_kel'	   =>$row['NO_KEL'],
								'bentuk_pendidikan'=>$row['bentuk_pendidikan'],
								'ruang_kelas'	=>$row['ruang_kelas'],
								'siswa'			=>$row['siswa'],
								'status'		=>$row['status'],
								'created_date'	=>$row['create_date'] 
							  );
			$this->db->insert('perizinan_sekolah', $data_form);
		}
	}

	function simpus(){
		$curl = $this->curl("https://dinkes.banyuwangikab.go.id/simpuswangi/ws/penyakitTerbesar");
		$result =  json_decode($curl, TRUE);
        foreach($result as $row){
			$data_form = array(
								'puskesmas' =>$row['puskesmas'],
								'kecamatan'=>$row['namaKec'],
								'diagnosa'=>$row['nmDiagnosa'],
								'jml'=>$row['jml'],
								'baru_l'=>$row['baruL'],
								'baru_p'=>$row['baruP'],
								'lama_l'=>$row['lamaL'],
								'lama_p'=>$row['lamaP'],
								'tgl_kunjungan'=>$row['tglKunjungan']
							  );
			$this->db->insert('simpus', $data_form);
		}
	}

	function simrs(){
		$curl = $this->curl("http://192.168.253.5/production/webapps/webservice/module/Aplikasi/lib.php?req=room");
		$result =  json_decode($curl, TRUE);
        foreach($result as $row){
			$data_form = array(
								'kelas' =>$row['kelas'],
								'jml_bed'=>$row['jml_bed'],
								'jml_isi'=>$row['jml_isi'],
								'jml_empty'=>$row['jml_empty']
							  );
			$this->db->insert('simrs', $data_form);
		}
	}

	function harga_pasar(){
		$curl = $this->curl("http://tpid.banyuwangikab.go.id/api/services/get_data_connect");
		$result =  json_decode($curl, TRUE);
		foreach($result['data'] as $key => $value){
			// echo $value['pasar'];
			foreach($result['data'][$key]['harga'] as $key => $val_harga){
				foreach($val_harga as $key=> $nilai){
					// echo 'VAL'.$key.' '.$nilai;
					$data_form = array('pasar'=>$value['pasar'],
									   'komoditas'=>$key,
									   'harga'=>$nilai,
									   'tanggal'=>$value['tanggal']);
					// var_dump($data_form);
					$this->db->insert('harga_pasar',$data_form);
				}
			}
		}
	}

	function stok_pasar(){
		$curl = $this->curl("http://tpid.banyuwangikab.go.id/api/services/get_data_connect_stok");
		$result =  json_decode($curl, TRUE);
		foreach($result['data'] as $key => $value){
			// echo $value['pasar'];
			foreach($result['data'][$key]['harga'] as $key => $val_harga){
				foreach($val_harga as $key=> $nilai){
					// echo 'VAL'.$key.' '.$nilai;
					$data_form = array('pasar'=>$value['pasar'],
									   'komoditas'=>$key,
									   'stok'=>$nilai,
									   'tanggal'=>$value['tanggal']);
					// var_dump($data_form);
					$this->db->insert('stok_pasar',$data_form);
				}
			}
		}
	}
	
	function api_cek(){
// 		$curl = $this->curl("http://192.168.253.5/production/webapps/webservice/module/Aplikasi/lib.php?req=room");
// 		$result =  json_decode($curl, TRUE);
// 		var_dump($result);
        $url = 'http://simpasar.banyuwangikab.go.id/api/by_tempat_dagang';
        // $data = array('key1' => 'value1', 'key2' => 'value2');
        
        // use key 'http' even if you send the request to https://...
        $options = array(
          'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            // 'content' => http_build_query($data),
          ),
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        
        var_dump($result);
	}

}