<?php
    function format($val)
    {
	    return number_format($val,0);
    }

    function persen($a, $b)
    {
        return (100 * (($a / $b) - 1)) . '%';
    }

    function uri_check() 
    {
        $ci = get_instance();
        $uri = $ci->uri->segment(2);
        echo $uri;
    }

    function getBulan($bln)
    {
			switch ($bln){

					case 1:

						return "Januari";

						break;

					case 2:

						return "Februari";

						break;

					case 3:

						return "Maret";

						break;

					case 4:

						return "April";

						break;

					case 5:

						return "Mei";

						break;

					case 6:

						return "Juni";

						break;

					case 7:

						return "Juli";

						break;

					case 8:

						return "Agustus";

						break;

					case 9:

						return "September";

						break;

					case 10:

						return "Oktober";

						break;

					case 11:

						return "November";

						break;

					case 12:

						return "Desember";

						break;

			}

	}
    
    function tgl_indo($tgl){
        $tanggal = substr($tgl,8,2);
        $bulan   = getBulan(substr($tgl,5,2));
        $tahun   = substr($tgl,0,4);
        $jam	 = substr($tgl, 11);
        return $tanggal.' '.$bulan.' '.$tahun.' '.$jam;
    }
    
    function rupiah($total){
        return number_format($total,0);
    }
    
    function http_request($url){
		// persiapkan curl
		$ch = curl_init(); 
	
		// set url 
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
		curl_setopt($ch, CURLOPT_ENCODING, '');
		// set user agent    
		curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
	
		// return the transfer as a string 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
		// $output contains the output string 
		$output = curl_exec($ch); 
	
		// tutup curl 
		curl_close($ch);      
	
		// mengembalikan hasil curl
		return $output;
	}
