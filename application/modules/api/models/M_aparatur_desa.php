<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_aparatur_desa extends CI_Model
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
        a.nilai,
        a.`by` as berdasarkan
        ');
        $this->db->where('a.`by`','pendidikan');
        $this->db->from('sim_aparatur_desa as a');
        return $this->db->get()->result();
    }

    public function by_jenis_kelamin()
    {
        $this->db->select('
        a.title,
        a.nilai,
        a.`by` as berdasarkan
        ');
        $this->db->where('a.`by`','jenis_kelamin');
        $this->db->from('sim_aparatur_desa as a');
        return $this->db->get()->result();
    }

    public function by_agama()
    {
        $this->db->select('
        a.title,
        a.nilai,
        a.`by` as berdasarkan
        ');
        $this->db->where('a.`by`','agama');
        $this->db->from('sim_aparatur_desa as a');
        return $this->db->get()->result();
    }

    public function by_umur()
    {
        $this->db->select('
        a.title,
        a.nilai,
        a.`by` as berdasarkan
        ');
        $this->db->where('a.`by`','umur');
        $this->db->from('sim_aparatur_desa as a');
        return $this->db->get()->result();
    }

    public function by_masa_kerja()
    {
        $this->db->select('
        a.title,
        a.nilai,
        a.`by` as berdasarkan
        ');
        $this->db->where('a.`by`','masa_kerja');
        $this->db->from('sim_aparatur_desa as a');
        return $this->db->get()->result();
    }

    public function by_jabatan()
    {
        $this->db->select('
        a.title,
        a.nilai,
        a.`by` as berdasarkan
        ');
        $this->db->where('a.`by`','jabatan');
        $this->db->from('sim_aparatur_desa as a');
        return $this->db->get()->result();
    }
}