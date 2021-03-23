<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_ketenagakerjaan extends CI_Model
{
    protected $table = 'sektoral_disnaker';
    public function __construct()
    {
        parent::__construct();
        
        //Do your magic here
    }

    function group_gender()
    {
        $this->db->select('count(id) as total,jenis_kelamin');
        $this->db->from($this->table);
        $this->db->group_by('jenis_kelamin');
        return $this->db->get()->result();
    }
    function total_by_status_perkawinan()
    {
        $this->db->select('status_perkawinan,count(id) as total');
        $this->db->from('sektoral_disnaker');
        $this->db->group_by('status_perkawinan');
        return $this->db->get()->result();
    }
    function by_kecamatan_pendaftar()
    {
        $this->db->select('COUNT(id) as total,nama_wilayah');
        $this->db->from('sektoral_disnaker');
        $this->db->group_by('nama_wilayah');
        $this->db->order_by('total','DESC');
        return $this->db->get()->result();
    }
    function by_jenjang_pendidikan()
    {
        $this->db->select("nama_wilayah,
        COUNT(case when nm_instansi LIKE '%SD%' then 1 end) as SD,
        COUNT(case when nm_instansi LIKE '%MI%' then 1 end) as MI,
        COUNT(case when nm_instansi LIKE '%SMP%' then 1 end) as SMP,
        COUNT(case when nm_instansi LIKE '%SLTP%' then 1 end) as SLTP,
        COUNT(case when nm_instansi LIKE '%MTS%' then 1 end) as MTS,
        COUNT(case when nm_instansi LIKE '%SMA%' then 1 end) as SMA,
        COUNT(case when nm_instansi LIKE '%SMU%' then 1 end) as SMU,
        COUNT(case when nm_instansi LIKE '%MAN%' then 1 end) as MAN,
        COUNT(case when nm_instansi LIKE '%SMK%' then 1 end) as SMK,
        COUNT(case when nm_instansi LIKE '%UNIVERSITAS%' then 1 end) as UNIVERSITAS,
        COUNT(case when nm_instansi LIKE '%POLITEKNIK%' then 1 end) as POLITEKNIK,
        COUNT(case when nm_instansi LIKE '%INSTITUT%' then 1 end) as INSTITUT,
        COUNT(case when nm_instansi LIKE '%IKIP STIKER%' then 1 end) as IKIP_STIKER,
        COUNT(case when nm_instansi LIKE '%SEKOLAH TINGGI%' then 1 end) as SEKOLAH_TINGGI,
        COUNT(case when nm_instansi LIKE '%POLTEKKES%' then 1 end) as POLTEKKES,
        COUNT(case when nm_instansi LIKE '%STAI%' then 1 end) as STAI,
        COUNT(case when nm_instansi LIKE '%AAK%' then 1 end) as AAK,
        COUNT(case when nm_instansi LIKE '%AKADEMI%' then 1 end) as AKADEMI,
        COUNT(case when nm_instansi LIKE '%AKBID%' then 1 end) as AKBID,
        COUNT(case when nm_instansi LIKE '%AKES%' then 1 end) as AKES,
        COUNT(case when nm_instansi LIKE '%AKPER%' then 1 end) as AKPER,
        COUNT(case when nm_instansi LIKE '%AMIK%' then 1 end) as AMIK,
        COUNT(case when nm_instansi LIKE '%BHAKTI%' then 1 end) as BHAKTI,
        COUNT(case when nm_instansi LIKE '%D3%' then 1 end) as D3,
        COUNT(case when nm_instansi LIKE '%DIII%' then 1 end) as DIII,
        COUNT(case when nm_instansi LIKE '%AMIK%' then 1 end) as AMIK,
        COUNT(case when nm_instansi LIKE '%D4%' then 1 end) as D4,
        COUNT(case when nm_instansi LIKE '%FAKULTAS%' then 1 end) as FAKULTAS,
        COUNT(case when nm_instansi LIKE '%FKM%' then 1 end) as FKM,
        COUNT(case when nm_instansi LIKE '%IAIN%' then 1 end) as IAIN,
        COUNT(case when nm_instansi LIKE '%IAI%' then 1 end) as IAI,
        COUNT(case when nm_instansi LIKE '%ITN%' then 1 end) as ITN,
        COUNT(case when nm_instansi LIKE '%ITS%' then 1 end) as ITS,
        COUNT(case when nm_instansi LIKE '%KEMENKES%' then 1 end) as KEMENKES,
        COUNT(case when nm_instansi LIKE '%INSTITUT AGAMA%' then 1 end) as INSTITUT_AGAMA,
        COUNT(case when nm_instansi LIKE '%OASIS%' then 1 end) as OASIS,
        COUNT(case when nm_instansi LIKE '%PSDKU%' then 1 end) as PSDKU,
        COUNT(case when nm_instansi LIKE '%STIKES%' then 1 end) as STIKES,
        COUNT(case when nm_instansi LIKE '%STAIN%' then 1 end) as STAIN,
        COUNT(case when nm_instansi LIKE '%STHD%' then 1 end) as STHD,
        COUNT(case when nm_instansi LIKE '%STI%' then 1 end) as STI,
        COUNT(case when nm_instansi LIKE '%STIB%' then 1 end) as STIB,
        COUNT(case when nm_instansi LIKE '%STIKOM%' then 1 end) as STIKOM,
        COUNT(case when nm_instansi LIKE '%STIKI%' then 1 end) as STIKI,
        COUNT(case when nm_instansi LIKE '%SIKIP%' then 1 end) as STKIP,
        COUNT(case when nm_instansi LIKE '%STMIK%' then 1 end) as STMIK,
        COUNT(case when nm_instansi LIKE '%STP%' then 1 end) as STP,
        COUNT(case when nm_instansi LIKE '%STT%' then 1 end) as STT,
        COUNT(case when nm_instansi LIKE '%STTI%' then 1 end) as STTI,
        COUNT(case when nm_instansi LIKE '%UIN%' then 1 end) as UIN,
        COUNT(case when nm_instansi LIKE '%TELKOM%' then 1 end) as TELKOM,
        COUNT(case when nm_instansi LIKE '%UMM%' then 1 end) as UMM,
        COUNT(case when nm_instansi LIKE '%UNDAR%' then 1 end) as UNDAR,
        COUNT(case when nm_instansi LIKE '%UNIBA%' then 1 end) as UNIBA,
        COUNT(case when nm_instansi LIKE '%UNIV%' then 1 end) as UNIV,
        COUNT(case when nm_instansi LIKE '%UPN%' then 1 end) as UPN,
        COUNT(case when nm_instansi LIKE '%UT%' then 1 end) as UT");
        $this->db->from('sektoral_disnaker');
        $this->db->group_by('nama_wilayah');
        return $this->db->get()->result();
    }

    function by_umur()
    {
        $query = $this->db->query("SELECT t.grup_umur, COUNT(*) AS total
        FROM
        (
            SELECT
                CASE WHEN TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) BETWEEN 17 AND 19 THEN '17-19'
                                 WHEN TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) BETWEEN 20 AND 25
                     THEN '20-25'
                     WHEN TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) BETWEEN 26 AND 35
                     THEN '26-35'
                     WHEN TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) BETWEEN 36 AND 45
                     THEN '36-45'
                     WHEN TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) BETWEEN 46 AND 55
                     THEN '46-55'
                     WHEN TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) > 55
                     THEN '46-55'
                     ELSE 'lainnya'
                END AS grup_umur
            FROM sektoral_disnaker
        ) t
        GROUP BY t.grup_umur");
        return $query->result();
    }
}