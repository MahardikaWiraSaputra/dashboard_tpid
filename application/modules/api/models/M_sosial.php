<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_sosial extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        
        //Do your magic here
    }

    public function all_data()
    {
        $this->db->select('kecamatan,
        desa,
        jumlah_kpm as jumlah_bpnt,
        jumlah_pkh,
        tahun');
        $this->db->from('bc_dinsos');
        return $this->db->get()->result();
    }
}