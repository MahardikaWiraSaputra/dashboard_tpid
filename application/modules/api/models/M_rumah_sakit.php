<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_rumah_sakit extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        
        //Do your magic here
    }

    public function all_data()
    {
        $this->db->select('kelas,
        jml_bed,
        jml_isi,
        jml_empty,
        tgl,rumah_sakit'
        );
        $this->db->from('simrs');
        return $this->db->get()->result();
    }
}