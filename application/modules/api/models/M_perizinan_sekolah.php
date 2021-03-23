<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_perizinan_sekolah extends CI_Model
{
    protected $table = 'perizinan_sekolah';
    public function __construct()
    {
        parent::__construct();
        
        //Do your magic here
    }
    function all_data()
    {
        $this->db->select("COUNT(id) as total,COUNT( CASE WHEN status ='DITOLAK' THEN 1 END ) AS ditolak,COUNT( CASE WHEN status ='' THEN 1 END ) AS diajukan,COUNT( CASE WHEN status ='DISETUJUI' THEN 1 END ) AS disetujui");
        $this->db->from('perizinan_sekolah');
        return $this->db->get()->row();
    }

   function all_by_kecamatan()
   {
        $this->db->select('b.KEC_NAMA as kecamatan, COUNT(a.id) as total_perizinan');
        $this->db->from('perizinan_sekolah as a');
        $this->db->join('kecamatan as b','a.no_kec=b.KEC_KODE');
        $this->db->where('a.no_kec IS NOT NULL');
        $this->db->group_by('a.no_kec');
        $this->db->order_by('total_perizinan','DESC');
        return $this->db->get()->result();
   }

   function all_by_bentuk_pendidikan()
   {
        $this->db->select('bentuk_pendidikan, COUNT(id) as total');
        $this->db->from('perizinan_sekolah');
        $this->db->where('no_kec IS NOT NULL');
        $this->db->group_by('bentuk_pendidikan');
        $this->db->order_by('total','DESC');
        return $this->db->get()->result();
   }

    function all_tabel_kecamatan()
    {
        $this->db->select("MONTH(a.created_date) as bulan,YEAR(a.created_date) as tahun,b.KEC_NAMA as kecamatan, COUNT(a.id) as total,COUNT( CASE WHEN status ='DITOLAK' THEN 1 END ) AS ditolak,COUNT( CASE WHEN status ='' THEN 1 END ) AS diajukan,COUNT( CASE WHEN status ='DISETUJUI' THEN 1 END ) AS disetujui");
        $this->db->from('perizinan_sekolah as a');
        $this->db->join('kecamatan as b','a.no_kec=b.KEC_KODE');
        $this->db->where('a.no_kec IS NOT NULL');
        $this->db->group_by('a.no_kec');
        $this->db->order_by('total','DESC');
        return $this->db->get()->result();
    }

    //get kelurahan by kecamatan
    function by_kelurahan_all()
    {
        $this->db->select("b.DESA_NAMA as desa,b.KEC_NAMA as kecamatan,COUNT( a.id ) AS total,COUNT( CASE WHEN a.status = 'DITOLAK' THEN 1 END ) AS ditolak,COUNT( CASE WHEN a.status = '' THEN 1 END ) AS diajukan,COUNT( CASE WHEN a.status = 'DISETUJUI' THEN 1 END ) AS disetujui");
        $this->db->from('perizinan_sekolah as a');
        $this->db->join('kelurahan AS b','a.no_kel = b.DESA_KODE');
        $this->db->where('a.no_kec = b.KEC_KODE');
        $this->db->group_by('a.no_kel');
        $this->db->order_by('total','DESC');
        return $this->db->get()->result();
    }

    //get bentuk pendidikan by kecamatan
    function by_kelurahan_pendidikan()
    {
        $this->db->select("b.DESA_NAMA as desa,b.KEC_NAMA as kecamatan,a.bentuk_pendidikan,COUNT( a.id ) AS total,sum(a.ruang_kelas) as total_kelas,sum(a.siswa) as total_siswa");
        $this->db->from('perizinan_sekolah as a');
        $this->db->join('kelurahan AS b','a.no_kel = b.DESA_KODE');
        $this->db->where('a.no_kec = b.KEC_KODE');
        $this->db->group_by(array('b.KEC_NAMA','a.bentuk_pendidikan'));
        $this->db->order_by('total','DESC');
        return $this->db->get()->result();
    }
}