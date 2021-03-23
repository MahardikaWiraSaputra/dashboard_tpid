<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_harga_pasar extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        
        //Do your magic here
    }

    public function all_data()
    {
        $this->db->select('a.pasar,
        b.KET,
        b.SATUAN,
        a.harga,
        a.tanggal');
        $this->db->from('harga_pasar AS a');
        $this->db->join('komoditas_pasar AS b','a.komoditas = b.KODE_JENIS');
        return $this->db->get()->result();
    }
}