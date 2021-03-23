<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pasar_model extends CI_Model
{

    public $table = 'sektoral_nakes';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id,nik,nama,sex,tgl_berlaku,jenis_surat,tempat_praktek_ke,tempat_praktek,alamat_tempat_praktek,kecamatan_tempat_praktek,kelurahan_tempat_praktek,kecamatan_tempat_praktek_pribadi,kelurahan_tempat_praktek_pribadi,status_berlaku,created_date,profesi');
        $this->datatables->from('sektoral_nakes');
        //add this line for join
        //$this->datatables->join('table2', 'sektoral_nakes.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('perizinan_nakes/read/$1'),'Read')." | ".anchor(site_url('perizinan_nakes/update/$1'),'Update')." | ".anchor(site_url('perizinan_nakes/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
        return $this->datatables->generate();
    }

    function by_kec_filter($bulan,$tahun){
        $this->db->select("MONTH(created_date) as bulan, YEAR(created_date) as tahun,kecamatan_tempat_praktek,COUNT( id ) AS total,COUNT( CASE WHEN sex = '1' THEN 1 END ) AS pria,COUNT( CASE WHEN sex = '2' THEN 1 END ) AS wanita,COUNT( CASE WHEN status_berlaku = '1' THEN 1 END ) AS berlaku,COUNT( CASE WHEN status_berlaku = '0' THEN 1 END ) AS tidak_berlaku");
        $this->db->from($this->table);
        $this->db->where('kecamatan_tempat_praktek is NOT NULL', NULL, FALSE);
        $this->db->where('MONTH(created_date)',$bulan);
        $this->db->where('YEAR(created_date)',$tahun);
        $this->db->group_by('kecamatan_tempat_praktek');
        $this->db->order_by('total','DESC');
        return $this->db->get()->result();
    }
    // get all perizinan
    function by_kec_all(){
        $this->db->select("kecamatan_tempat_praktek,COUNT( id ) AS total,COUNT( CASE WHEN sex = '1' THEN 1 END ) AS pria,COUNT( CASE WHEN sex = '2' THEN 1 END ) AS wanita,COUNT( CASE WHEN status_berlaku = '1' THEN 1 END ) AS berlaku,COUNT( CASE WHEN status_berlaku = '0' THEN 1 END ) AS tidak_berlaku");
        $this->db->from($this->table);
        $this->db->where('kecamatan_tempat_praktek is NOT NULL', NULL, FALSE);
        $this->db->group_by('kecamatan_tempat_praktek');
        $this->db->order_by('total','DESC');
        return $this->db->get()->result();
    }

    //get kelurahan by kecamatan
    function by_kelurahan_filter($bulan,$tahun,$kecamatan)
    {
        $this->db->select('kelurahan_tempat_praktek,COUNT( id ) AS total,COUNT( CASE WHEN status_berlaku = "1" THEN 1 END ) AS berlaku,
        COUNT( CASE WHEN status_berlaku = "0" THEN 1 END ) AS tidak_berlaku	');
        $this->db->from($this->table);
        $this->db->where('MONTH(created_date)',$bulan);
        $this->db->where('YEAR(created_date)',$tahun);
        $this->db->where('kecamatan_tempat_praktek',$kecamatan);
        $this->db->group_by('kelurahan_tempat_praktek');
        $this->db->order_by('total','DESC');
        return $this->db->get()->result();
    }

    function by_kelurahan_praktek($bulan,$tahun,$kecamatan)
    {
        $this->db->select("tempat_praktek,
        COUNT( id ) AS total,
        COUNT( CASE WHEN status_berlaku = '1' THEN 1 END ) AS berlaku,
        COUNT( CASE WHEN status_berlaku = '0' THEN 1 END ) AS tidak_berlaku");
        $this->db->from($this->table);
        $this->db->where('MONTH(created_date)',$bulan);
        $this->db->where('YEAR(created_date)',$tahun);
        $this->db->where('kecamatan_tempat_praktek',$kecamatan);
        $this->db->group_by('tempat_praktek');
        $this->db->order_by('total','DESC');
        return $this->db->get()->result();
    }

    function by_jenis_surat_filter($bulan,$tahun,$kecamatan)
    {
        $this->db->select("COUNT( id ) AS total,
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
        $this->db->where('MONTH(created_date)',$bulan);
        $this->db->where('YEAR(created_date)',$tahun);
        $this->db->where('kecamatan_tempat_praktek',$kecamatan);
        $this->db->group_by('kecamatan_tempat_praktek');
        $this->db->order_by('total','DESC');
        return $this->db->get()->row();
    }

    //get kelurahan by kecamatan
    function by_kelurahan_all($kecamatan)
    {
        $this->db->select('kelurahan_tempat_praktek,COUNT( id ) AS total,COUNT( CASE WHEN status_berlaku = "1" THEN 1 END ) AS berlaku,
        COUNT( CASE WHEN status_berlaku = "0" THEN 1 END ) AS tidak_berlaku	');
        $this->db->from($this->table);
        $this->db->where('kecamatan_tempat_praktek',$kecamatan);
        $this->db->group_by('kelurahan_tempat_praktek');
        $this->db->order_by('total','DESC');
        return $this->db->get()->result();
    }

    function by_kelurahan_praktek_all($kecamatan)
    {
        $this->db->select("tempat_praktek,
        COUNT( id ) AS total,
        COUNT( CASE WHEN status_berlaku = '1' THEN 1 END ) AS berlaku,
        COUNT( CASE WHEN status_berlaku = '0' THEN 1 END ) AS tidak_berlaku");
        $this->db->from($this->table);
        $this->db->where('kecamatan_tempat_praktek',$kecamatan);
        $this->db->group_by('tempat_praktek');
        $this->db->order_by('total','DESC');
        return $this->db->get()->result();
    }

    function by_jenis_surat_all($kecamatan)
    {
        $this->db->select("COUNT( id ) AS total,
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
        $this->db->where('kecamatan_tempat_praktek',$kecamatan);
        $this->db->group_by('kecamatan_tempat_praktek');
        $this->db->order_by('total','DESC');
        return $this->db->get()->row();
    }

    //get bulan dan tahun
    function list_tahun()
    {
        $this->db->select('MONTH( created_date ) AS bulan,YEAR ( created_date ) AS tahun');
        $this->db->from('sektoral_nakes');
        $this->db->group_by(array('MONTH(created_date),YEAR(created_date)'));
        return $this->db->get()->result();
    }

    // get all perizinan
    function all_perizinan()
    {
        $this->db->select('COUNT(id) AS TOTAL,MONTH(created_date) as bulan, YEAR(created_date) as tahun');
        $this->db->from($this->table);
        $this->db->group_by(array('MONTH(created_date),YEAR(created_date)'));
        $this->db->order_by('YEAR(created_date)');
        return $this->db->get()->result();
    }

    // get all perizinan by month
    function perizinan_by_bulan($bulan,$tahun)
    {
        $this->db->select('COUNT(id) AS total,MONTH(created_date) as bulan, YEAR(created_date) as tahun');
        $this->db->from($this->table);
        $this->db->where('MONTH(created_date)',$bulan);
        $this->db->where('YEAR(created_date)',$tahun);
        $this->db->group_by(array('MONTH(created_date),YEAR(created_date)'));
        $this->db->order_by('YEAR(created_date)');
        return $this->db->get()->row();
    }

    ///get pria perizinan by month
    function get_gender_by_month($bulan,$tahun,$gender)
    {
        $this->db->select('COUNT(id) AS total,MONTH(created_date) as bulan, YEAR(created_date) as tahun');
        $this->db->from($this->table);
        $this->db->where('MONTH(created_date)',$bulan);
        $this->db->where('YEAR(created_date)',$tahun);
        $this->db->where('sex',$gender);
        $this->db->group_by(array('MONTH(created_date),YEAR(created_date)'));
        $this->db->order_by('YEAR(created_date)');
        return $this->db->get()->row();
    }

    function by_kecamatan_praktek()
    {
        $this->db->select('kecamatan_tempat_praktek as label, COUNT(id) as value');
        $this->db->from($this->table);
        $this->db->where('kecamatan_tempat_praktek is NOT NULL', NULL, FALSE);
        $this->db->group_by('kecamatan_tempat_praktek');
        $this->db->order_by('value','DESC');
        return $this->db->get()->result();
    }

    //get berdasarkan jenis surat
    function by_jenis_surat()
    {
        $this->db->select("COUNT( id ) AS total,COUNT( CASE WHEN jenis_surat LIKE '%KERJA%' AND status_berlaku = '1' THEN 1 END ) AS surat_izin_kerja,COUNT( CASE WHEN jenis_surat LIKE '%SIK%' AND status_berlaku = '1' THEN 1 END ) AS surat_izin_keterangan,COUNT( CASE WHEN jenis_surat LIKE '%SIP%' AND status_berlaku = '1' THEN 1 END ) AS surat_izin_praktik,COUNT( CASE WHEN jenis_surat LIKE '%SIP-E%' AND status_berlaku = '1' THEN 1 END ) AS sipe,COUNT( CASE WHEN jenis_surat LIKE '%SIKA%' AND status_berlaku = '1' THEN 1 END ) AS sika,");
        $this->db->from($this->table);
        return $this->db->get()->row();
    }

    //get berdasarkan profesi
    function by_profesi()
    {
        $this->db->select('profesi,COUNT(id) as total');
        $this->db->from($this->table);
        $this->db->group_by('profesi');
        return $this->db->get()->result();
    }

    //get berdasarkan status berlaku
    function by_status_berlaku()
    {
        $this->db->select("COUNT(id) AS total,COUNT( CASE WHEN status_berlaku = '1' THEN 1 END ) AS berlaku,COUNT( CASE WHEN status_berlaku = '0' THEN 1 END ) AS tidak_berlaku");
        $this->db->from($this->table);
        return $this->db->get()->row();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
        $this->db->or_like('nik', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('sex', $q);
        $this->db->or_like('tgl_berlaku', $q);
        $this->db->or_like('jenis_surat', $q);
        $this->db->or_like('tempat_praktek_ke', $q);
        $this->db->or_like('tempat_praktek', $q);
        $this->db->or_like('alamat_tempat_praktek', $q);
        $this->db->or_like('kecamatan_tempat_praktek', $q);
        $this->db->or_like('kelurahan_tempat_praktek', $q);
        $this->db->or_like('kecamatan_tempat_praktek_pribadi', $q);
        $this->db->or_like('kelurahan_tempat_praktek_pribadi', $q);
        $this->db->or_like('status_berlaku', $q);
        $this->db->or_like('created_date', $q);
        $this->db->or_like('profesi', $q);
        $this->db->from($this->table);
            return $this->db->count_all_results();
        }

    function alokasi_dana_desa()
    {
        $this->db->select('a.desa as label,b.jumlah as value');
        $this->db->from('evb as a');
        $this->db->join('evb_transaksi as b','a.id = b.id_evb_master');
        $this->db->where('b.tipe','pendapatan');
        $this->db->order_by('b.jumlah','DESC');
        // $this->db->limit('10');
        return $this->db->get()->result();
    }

    function alokasi_dana_by_kecamatan()
    {
        $this->db->select('a.kecamatan as label,SUM(b.jumlah) as value');
        $this->db->from('evb as a');
        $this->db->join('evb_transaksi as b','a.id = b.id_evb_master');
        $this->db->where('b.tipe','pendapatan');
        $this->db->group_by('a.kecamatan');
        $this->db->order_by('value','DESC');
        // $this->db->limit('10');
        return $this->db->get()->result();
    }

    function by_desa()
    {
        $this->db->select('a.kecamatan,a.desa,SUM(b.jumlah) as total');
        $this->db->from('evb as a');
        $this->db->join('evb_transaksi as b','a.id = b.id_evb_master');
        $this->db->where('b.tipe','pendapatan');
        $this->db->group_by('a.desa');
        $this->db->order_by('total','DESC');
        return $this->db->get()->result();
    }

    function by_desa_filter($desa)
    {
        $this->db->select('b.program as label,sum(b.jumlah) as value');
        $this->db->from('evb as a');
        $this->db->join('evb_transaksi as b','a.id = b.id_evb_master');
        $this->db->where('b.tipe','belanja');
        $this->db->where('a.desa',$desa);
        $this->db->group_by('b.program');
        $this->db->order_by('value','DESC');
        return $this->db->get()->result();
    }

    function by_kecamatan_filter($kecamatan)
    {
        $this->db->select('a.desa,sum(b.jumlah) as total');
        $this->db->from('evb as a');
        $this->db->join('evb_transaksi as b','a.id = b.id_evb_master');
        $this->db->where('b.tipe','belanja');
        $this->db->where('a.kecamatan',$kecamatan);
        $this->db->group_by('a.desa');
        $this->db->order_by('value','DESC');
        return $this->db->get()->result();
    }

    function by_filter_kecamatan($kecamatan)
    {
        $this->db->select('a.desa as label,sum(b.jumlah) as value');
        $this->db->from('evb as a');
        $this->db->join('evb_transaksi as b','a.id = b.id_evb_master');
        $this->db->where('b.tipe','belanja');
        $this->db->where('a.kecamatan',$kecamatan);
        $this->db->group_by('a.desa');
        $this->db->order_by('value','DESC');
        return $this->db->get()->result();
    }

    function by_kecamatan_filter_bidang($kecamatan)
    {
        $this->db->select('b.bidang as label,sum(b.jumlah) as value');
        $this->db->from('evb as a');
        $this->db->join('evb_transaksi as b','a.id = b.id_evb_master');
        $this->db->where('b.tipe','belanja');
        $this->db->where('a.kecamatan',$kecamatan);
        $this->db->group_by('b.bidang');
        $this->db->order_by('value','DESC');
        return $this->db->get()->result();
    }

    function komoditas_pasar($pasar,$tanggal)
    {
        $query = $this->db->query("SELECT b.pasar,a.KET,b.harga,b.tanggal,a.satuan,a.gambar FROM komoditas_pasar as a
        LEFT JOIN harga_pasar as b ON a.KODE_JENIS = b.komoditas
        AND b.pasar = '$pasar'
        AND b.tanggal = '$tanggal'
        ");
        return $query->result();
    }

    function get_pasar()
    {
        // $query = $this->db->query("SELECT * FROM siskaperbapo_pasar");
        $this->db->select('*');
        $this->db->from('siskaperbapo_pasar');
        // $this->db->where('tanggal','>=',$sekarang);
        // $this->db->where('tanggal','<=',$kemarin);
        // $this->db->group_by('pasar');
        return $this->db->get()->result_array();
    }

}
