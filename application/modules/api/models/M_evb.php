<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_evb extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        
        //Do your magic here
    }

    function all_desa()
    {
        $this->db->select("a.desa,
        a.kecamatan,
        a.tahun_anggaran,
        SUM( CASE WHEN b.tipe = 'pendapatan' THEN b.jumlah END ) AS alokasi_dana,
        SUM( CASE WHEN b.tipe = 'belanja' THEN b.jumlah END ) AS total_belanja");
        $this->db->from('evb as a');
        $this->db->join('evb_transaksi as b','a.id = b.id_evb_master');
        $this->db->group_by('a.desa','DESC');
        return $this->db->get()->result();
    }

    function alokasi_dana_by_kecamatan()
    {
        $this->db->select("
        a.kecamatan,
        a.tahun_anggaran,
        SUM( CASE WHEN b.tipe = 'pendapatan' THEN b.jumlah END ) AS alokasi_dana,
        SUM( CASE WHEN b.tipe = 'belanja' THEN b.jumlah END ) AS total_belanja");
        $this->db->from('evb as a');
        $this->db->join('evb_transaksi as b','a.id = b.id_evb_master');
        $this->db->group_by('a.kecamatan','DESC');
        return $this->db->get()->result();
    }

    function program_by_desa()
    {
        $this->db->select('a.kecamatan,a.desa,b.program,sum(b.jumlah) as total_belanja');
        $this->db->from('evb as a');
        $this->db->join('evb_transaksi as b','a.id = b.id_evb_master');
        $this->db->where('b.tipe','belanja');
        $this->db->group_by('b.program,a.desa');
        return $this->db->get()->result();
    }

}