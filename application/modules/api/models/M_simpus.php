<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_simpus extends CI_Model
{
    protected $table = 'simpus';
    public function __construct()
    {
        parent::__construct();
        
        //Do your magic here
    }

    /// puskesmas
    // get all perizinan by month
    function puskesmas_by_bulan()
    {
        $this->db->select('MONTH(tgl_kunjungan) AS bulan,YEAR(tgl_kunjungan) AS tahun,SUM(jml) AS total,SUM(baru_l + lama_l) as pria,SUM(baru_p + lama_p) as wanita');
        $this->db->from($this->table);
        return $this->db->get()->result();
    }

    //get by diagnosa
    function all_diagnosa_filter()
    {
        $this->db->select('diagnosa,
        MONTH(tgl_kunjungan) as bulan,YEAR(tgl_kunjungan) as tahun,
        SUM( jml ) AS total,
        SUM( baru_l ) AS kunjungan_baru_laki,
        SUM( baru_p ) AS kunjungan_baru_perempuan,
        SUM( lama_l ) AS kunjungan_lama_laki,
        SUM( lama_p ) AS kunjungan_lama_perempuan');
        $this->db->from($this->table);
        $this->db->where('diagnosa IS NOT NULL');
        $this->db->group_by('diagnosa');
        $this->db->order_by('total','DESC');
        return $this->db->get()->result();
    }

    //get by puskesmas
    function all_puskesmas_filter()
    {
        $this->db->select('kecamatan,puskesmas,MONTH(tgl_kunjungan) as bulan,YEAR(tgl_kunjungan) as tahun,sum(jml) as total,
        SUM( baru_l ) AS kunjungan_baru_laki,
        SUM( baru_p ) AS kunjungan_baru_perempuan,
        SUM( lama_l ) AS kunjungan_lama_laki,
        SUM( lama_p ) AS kunjungan_lama_perempuan');
        $this->db->from($this->table);
        $this->db->group_by('puskesmas');
        $this->db->order_by('total','DESC');
        return $this->db->get()->result();
    }

    function by_puskesmas()
    {
        $this->db->select('puskesmas,
        kecamatan,
        diagnosa,
        SUM(jml) as total_kunjungan,
        SUM(baru_l + baru_p) as kunjungan_baru,
        SUM(lama_l + lama_p) as kunjungan_lama');
        $this->db->from($this->table);
        $this->db->group_by('puskesmas,diagnosa');
        return $this->db->get()->result();
    }
}