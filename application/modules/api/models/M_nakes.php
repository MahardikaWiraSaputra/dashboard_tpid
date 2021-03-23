<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_nakes extends CI_Model
{
    protected $table = 'sektoral_nakes';
    public function __construct()
    {
        parent::__construct();
        
        //Do your magic here
    }

    function all_by_kec()
    {
        $this->db->select("kecamatan_tempat_praktek,COUNT( id ) AS total,COUNT( CASE WHEN sex = '1' THEN 1 END ) AS pendaftar_pria,COUNT( CASE WHEN sex = '2' THEN 1 END ) AS pendaftar_wanita,COUNT( CASE WHEN status_berlaku = '1' THEN 1 END ) AS izin_berlaku,COUNT( CASE WHEN status_berlaku = '0' THEN 1 END ) AS izin_tidak_berlaku");
        $this->db->from($this->table);
        $this->db->where('kecamatan_tempat_praktek is NOT NULL', NULL, FALSE);
        $this->db->group_by('kecamatan_tempat_praktek');
        $this->db->order_by('total','DESC');
        return $this->db->get()->result();
    }
    
    function all_by_kec_filter()
    {
        $this->db->select("kecamatan_tempat_praktek,CONCAT(MONTH(created_date),'-',YEAR(created_date)) as bulan_tahun,
        COUNT( id ) AS total,
        COUNT( CASE WHEN sex = '1' THEN 1 END ) AS pendaftar_pria,
        COUNT( CASE WHEN sex = '2' THEN 1 END ) AS pendaftar_wanita,
        COUNT( CASE WHEN status_berlaku = '1' THEN 1 END ) AS izin_berlaku,
        COUNT( CASE WHEN status_berlaku = '0' THEN 1 END ) AS izin_tidak_berlaku");
        $this->db->from($this->table);
        $this->db->where('kecamatan_tempat_praktek is NOT NULL', NULL, FALSE);
        $this->db->group_by('kecamatan_tempat_praktek,MONTH(created_date),YEAR(created_date)');
        $this->db->order_by('MONTH(created_date),YEAR(created_date)');
        return $this->db->get()->result();
    }

    function all_by_kel()
    {
        $this->db->select("kecamatan_tempat_praktek,COUNT( id ) AS total,COUNT( CASE WHEN sex = '1' THEN 1 END ) AS pendaftar_pria,COUNT( CASE WHEN sex = '2' THEN 1 END ) AS pendaftar_wanita,COUNT( CASE WHEN status_berlaku = '1' THEN 1 END ) AS izin_berlaku,COUNT( CASE WHEN status_berlaku = '0' THEN 1 END ) AS izin_tidak_berlaku");
        $this->db->from($this->table);
        $this->db->where('kecamatan_tempat_praktek is NOT NULL', NULL, FALSE);
        $this->db->group_by('kecamatan_tempat_praktek');
        $this->db->order_by('total','DESC');
        return $this->db->get()->result();
    }

    function all_by_kel_filter()
    {
        $this->db->select("kelurahan_tempat_praktek,kecamatan_tempat_praktek,CONCAT(MONTH(created_date),'-',YEAR(created_date)) as bulan_tahun,
        COUNT( id ) AS total,
        COUNT( CASE WHEN sex = '1' THEN 1 END ) AS pendaftar_pria,
        COUNT( CASE WHEN sex = '2' THEN 1 END ) AS pendaftar_wanita,
        COUNT( CASE WHEN status_berlaku = '1' THEN 1 END ) AS izin_berlaku,
        COUNT( CASE WHEN status_berlaku = '0' THEN 1 END ) AS izin_tidak_berlaku");
        $this->db->from($this->table);
        $this->db->where('kecamatan_tempat_praktek is NOT NULL', NULL, FALSE);
        $this->db->group_by('kelurahan_tempat_praktek,MONTH(created_date),YEAR(created_date)');
        $this->db->order_by('MONTH(created_date),YEAR(created_date)');
        return $this->db->get()->result();
    }

    function all_by_kec_jenis_surat()
    {
        $this->db->select("kecamatan_tempat_praktek,
        COUNT( id ) AS total,
        COUNT( CASE WHEN jenis_surat LIKE '%KERJA%' AND status_berlaku = '1' THEN 1 END ) AS surat_izin_kerja_aktif,
        COUNT( CASE WHEN jenis_surat LIKE '%KERJA%' AND status_berlaku = '0' THEN 1 END ) AS surat_izin_kerja_nonaktif,
        COUNT( CASE WHEN jenis_surat LIKE '%SIKA%' AND status_berlaku = '1' THEN 1 END ) AS sika_aktif,
        COUNT( CASE WHEN jenis_surat LIKE '%SIKA%' AND status_berlaku = '0' THEN 1 END ) AS sika_nonaktif,
        COUNT( CASE WHEN jenis_surat LIKE '%SIK%' AND status_berlaku = '1' THEN 1 END ) AS surat_izin_keterangan_aktif,
        COUNT( CASE WHEN jenis_surat LIKE '%SIK%' AND status_berlaku = '0' THEN 1 END ) AS surat_izin_keterangan_nonaktif,
        COUNT( CASE WHEN jenis_surat LIKE '%SIP%' AND status_berlaku = '1' THEN 1 END ) AS surat_izin_praktik_aktif,
        COUNT( CASE WHEN jenis_surat LIKE '%SIP%' AND status_berlaku = '0' THEN 1 END ) AS surat_izin_praktik_nonaktif,
        COUNT( CASE WHEN jenis_surat LIKE '%SIP-E%' AND status_berlaku = '1' THEN 1 END ) AS sipe_aktif,
        COUNT( CASE WHEN jenis_surat LIKE '%SIP-E%' AND status_berlaku = '0' THEN 1 END ) AS sipe_nonaktif");
        $this->db->from($this->table);
        $this->db->where('kecamatan_tempat_praktek is NOT NULL', NULL, FALSE);
        $this->db->group_by('kecamatan_tempat_praktek');
        $this->db->order_by('total','DESC');
        return $this->db->get()->result();
    }

    function all_by_kec_jenis_surat_filter()
    {
        $this->db->select("kecamatan_tempat_praktek,CONCAT(MONTH(created_date),'-',YEAR(created_date)) as bulan_tahun,
        COUNT( id ) AS total,
        COUNT( CASE WHEN jenis_surat LIKE '%KERJA%' AND status_berlaku = '1' THEN 1 END ) AS surat_izin_kerja_aktif,
        COUNT( CASE WHEN jenis_surat LIKE '%KERJA%' AND status_berlaku = '0' THEN 1 END ) AS surat_izin_kerja_nonaktif,
        COUNT( CASE WHEN jenis_surat LIKE '%SIKA%' AND status_berlaku = '1' THEN 1 END ) AS sika_aktif,
        COUNT( CASE WHEN jenis_surat LIKE '%SIKA%' AND status_berlaku = '0' THEN 1 END ) AS sika_nonaktif,
        COUNT( CASE WHEN jenis_surat LIKE '%SIK%' AND status_berlaku = '1' THEN 1 END ) AS surat_izin_keterangan_aktif,
        COUNT( CASE WHEN jenis_surat LIKE '%SIK%' AND status_berlaku = '0' THEN 1 END ) AS surat_izin_keterangan_nonaktif,
        COUNT( CASE WHEN jenis_surat LIKE '%SIP%' AND status_berlaku = '1' THEN 1 END ) AS surat_izin_praktik_aktif,
        COUNT( CASE WHEN jenis_surat LIKE '%SIP%' AND status_berlaku = '0' THEN 1 END ) AS surat_izin_praktik_nonaktif,
        COUNT( CASE WHEN jenis_surat LIKE '%SIP-E%' AND status_berlaku = '1' THEN 1 END ) AS sipe_aktif,
        COUNT( CASE WHEN jenis_surat LIKE '%SIP-E%' AND status_berlaku = '0' THEN 1 END ) AS sipe_nonaktif");
        $this->db->from($this->table);
        $this->db->where('kecamatan_tempat_praktek is NOT NULL', NULL, FALSE);
        $this->db->group_by('kelurahan_tempat_praktek,MONTH(created_date),YEAR(created_date)');
        $this->db->order_by('MONTH(created_date),YEAR(created_date)');
        return $this->db->get()->result();
    }

    function all_by_profesi()
    {
        $this->db->select('kecamatan_tempat_praktek,
        profesi,COUNT( id ) AS total');
        $this->db->from($this->table);
        $this->db->where('kecamatan_tempat_praktek IS NOT NULL');
        $this->db->group_by('profesi,kecamatan_tempat_praktek');
        $this->db->order_by('total','DESC');
        return $this->db->get()->result();
    }
    
    function all_by_profesi_kelurahan()
    {
        $this->db->select('kecamatan_tempat_praktek,kelurahan_tempat_praktek,
        profesi,COUNT( id ) AS total');
        $this->db->from($this->table);
        $this->db->where('kecamatan_tempat_praktek IS NOT NULL');
        $this->db->group_by('profesi,kelurahan_tempat_praktek');
        $this->db->order_by('total','DESC');
        return $this->db->get()->result();
    }

    function all_gender()
    {
        $this->db->select("kecamatan_tempat_praktek,
        COUNT( CASE WHEN sex = '1' THEN 1 END ) AS laki_laki,
        COUNT( CASE WHEN sex = '2' THEN 1 END ) AS perempuan");
        $this->db->from($this->table);
        $this->db->where('kecamatan_tempat_praktek IS NOT NULL');
        $this->db->group_by('kecamatan_tempat_praktek');
        return $this->db->get()->result();
    }

    function all_gender_kelurahan()
    {
        $this->db->select("kelurahan_tempat_praktek,kecamatan_tempat_praktek,
        COUNT( CASE WHEN sex = '1' THEN 1 END ) AS laki_laki,
        COUNT( CASE WHEN sex = '2' THEN 1 END ) AS perempuan");
        $this->db->from($this->table);
        $this->db->where('kelurahan_tempat_praktek IS NOT NULL');
        $this->db->group_by('kelurahan_tempat_praktek');
        return $this->db->get()->result();
    }
    
}