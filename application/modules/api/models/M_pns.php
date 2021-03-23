<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pns extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        
        //Do your magic here
    }

    public function by_pendidikan()
    {
        $this->db->select('
        a.title,
        a.l as laki_laki,
        a.p as perempuan,
        a.`by` as berdasarkan
        ');
        $this->db->where('a.`by`','pendidikan');
        $this->db->from('sim_pns as a');
        return $this->db->get()->result();
    }

    public function by_skpd()
    {
        $this->db->select('
        a.title,
        a.l as laki_laki,
        a.p as perempuan,
        a.`by` as berdasarkan
        ');
        $this->db->where('a.`by`','skpd');
        $this->db->from('sim_pns as a');
        return $this->db->get()->result();
    }

    public function by_jabatan()
    {
        $this->db->select('
        a.title,
        a.l as laki_laki,
        a.p as perempuan,
        a.`by` as berdasarkan
        ');
        $this->db->where('a.`by`','jabatan');
        $this->db->from('sim_pns as a');
        return $this->db->get()->result();
    }

    public function by_pangkat()
    {
        $this->db->select('
        a.title,
        a.l as laki_laki,
        a.p as perempuan,
        a.`by` as berdasarkan
        ');
        $this->db->where('a.`by`','pangkat');
        $this->db->from('sim_pns as a');
        return $this->db->get()->result();
    }
}