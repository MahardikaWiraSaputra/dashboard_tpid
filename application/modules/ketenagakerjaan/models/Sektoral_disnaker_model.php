<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sektoral_disnaker_model extends CI_Model
{

    public $table = 'sektoral_disnaker';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id,NIK,nm_lengkap,gelar_belakang,tempat_lahir,tgl_lahir,jenis_kelamin,agama,status_perkawinan,alamat,nama_wilayah,nm_instansi');
        $this->datatables->from('sektoral_disnaker');
        //add this line for join
        //$this->datatables->join('table2', 'sektoral_disnaker.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('sektoral_disnaker/read/$1'),'Read')." | ".anchor(site_url('sektoral_disnaker/update/$1'),'Update')." | ".anchor(site_url('sektoral_disnaker/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // group l/p
    function group_gender()
    {
        $this->db->select('count(id) as value,jenis_kelamin as label');
        $this->db->from('sektoral_disnaker');
        $this->db->group_by('jenis_kelamin');
        return $this->db->get()->result();
    }

    function pendaftar_by_kecamatan()
    {
        $this->db->select('COUNT(id) as value,nama_wilayah as label,color');
        $this->db->from('sektoral_disnaker');
        $this->db->group_by('nama_wilayah');
        $this->db->order_by('value','DESC');
        return $this->db->get()->result();
    }

    function total_by_status_perkawinan()
    {
        $this->db->select('status_perkawinan as label,count(id) as value');
        $this->db->from('sektoral_disnaker');
        $this->db->group_by('label');
        return $this->db->get()->result();
    }

    function jenjang_pendidikan_old()
    {
        $this->db->select("(SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%SD%') as SD,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%MI%') as MI,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%SMP%') as SMP,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%SLTP%') as SLTP,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%MTS%') as MTS,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%SMA%') as SMA,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%SMU%') as SMU,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%MAN%') as MAN,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%SMK%') as SMK,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%UNIVERSITAS%') as UNIVERSITAS,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%POLITEKNIK%') as POLITEKNIK,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%INSTITUT%') as INSTITUT,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%IKIP STIKER%') as IKIP_STIKER,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%SEKOLAH TINGGI%') as SEKOLAH_TINGGI,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%POLTEKKES%') as POLTEKKES,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%STAI%') as STAI,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%AAK%') as AAK,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%AKADEMI%') as AKADEMI,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%AKBID%') as AKBID,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%AKES%') as AKES,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%AKPER%') as AKPER,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%AMIK%') as AMIK,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%BHKATI%') as BHKATI,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%D3%') as D3,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%D III%') as D_III,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%D4%') as D4,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%DIII%') as DIII,  
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%FAKULTAS%') as FAKULTAS,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%FKM%') as FKM,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%IAIN%') as IAIN,            
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%IAI%') as IAI, 
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%ITN%') as ITN,  
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%ITS%') as ITS,  
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%KEMENKES%') as KEMENKES, 
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%INSTITUT AGAMA%') as INSTITUT_AGAMA, 
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%Oasis%') as Oasis,  
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%PSDKU%') as PSDKU,  
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%STIKES%') as STIKES,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%STAIN%') as STAIN, 
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%STHD%') as STHD,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%STI%') as STI,  
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%STIB%') as STIB, 
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%STIKOM%') as STIKOM, 
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%STIKI%') as STIKI,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%STKIP%') as STKIP,  
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%STMIK%') as STMIK,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%STP%') as STP,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%STT%') as STT,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%STTI%') as STTI,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%UIN%') as UIN, 
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%TELKOM%') as TELKOM,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%UMM%') as UMM,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%UNDAR%') as UNDAR,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%UNIBA%') as UNIBA,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%UNIV%') as UNIV,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%UT%') as UT,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%UPN%') as UPN
            ");
        return $this->db->get('sektoral_disnaker')->row();
    }
    
    function jenjang_pendidikan()
    {
        $this->db->select("(SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%SD%') as SD,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%MI%') as MI,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%SMP%') as SMP,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%SLTP%') as SLTP,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%MTS%') as MTS,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%SMA%') as SMA,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%SMU%') as SMU,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%MAN%') as MAN,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%SMK%') as SMK,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE sektoral_disnaker.nm_instansi LIKE '%UNIVERSITAS%') as UNIVERSITAS
            ");
        return $this->db->get('sektoral_disnaker')->row();
    }

    function jenjang_pendidikan_by_kec($kecamatan)
    {
        $this->db->select("(SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%SD%') as SD,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%MI%') as MI,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%SMP%') as SMP,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%SLTP%') as SLTP,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%MTS%') as MTS,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%SMA%') as SMA,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%SMU%') as SMU,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%MAN%') as MAN,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%SMK%') as SMK,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%UNIVERSITAS%') as UNIVERSITAS,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%POLITEKNIK%') as POLITEKNIK,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%INSTITUT%') as INSTITUT,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%IKIP STIKER%') as IKIP_STIKER,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%SEKOLAH TINGGI%') as SEKOLAH_TINGGI,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%POLTEKKES%') as POLTEKKES,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%STAI%') as STAI,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%AAK%') as AAK,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%AKADEMI%') as AKADEMI,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%AKBID%') as AKBID,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%AKES%') as AKES,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%AKPER%') as AKPER,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%AMIK%') as AMIK,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%BHKATI%') as BHKATI,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%D3%') as D3,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%D III%') as D_III,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%D4%') as D4,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%DIII%') as DIII,  
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%FAKULTAS%') as FAKULTAS,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%FKM%') as FKM,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%IAIN%') as IAIN,            
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%IAI%') as IAI, 
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%ITN%') as ITN,  
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%ITS%') as ITS,  
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%KEMENKES%') as KEMENKES, 
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%INSTITUT AGAMA%') as INSTITUT_AGAMA, 
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%Oasis%') as Oasis,  
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%PSDKU%') as PSDKU,  
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%STIKES%') as STIKES,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%STAIN%') as STAIN, 
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%STHD%') as STHD,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%STI%') as STI,  
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%STIB%') as STIB, 
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%STIKOM%') as STIKOM, 
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%STIKI%') as STIKI,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%STKIP%') as STKIP,  
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%STMIK%') as STMIK,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%STP%') as STP,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%STT%') as STT,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%STTI%') as STTI,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%UIN%') as UIN, 
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%TELKOM%') as TELKOM,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%UMM%') as UMM,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%UNDAR%') as UNDAR,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%UNIBA%') as UNIBA,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%UNIV%') as UNIV,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%UT%') as UT,
        (SELECT COUNT(nm_instansi) FROM sektoral_disnaker WHERE nama_wilayah = '$kecamatan' AND sektoral_disnaker.nm_instansi LIKE '%UPN%') as UPN
            ");
        $this->db->where('nama_wilayah',$kecamatan);
        return $this->db->get('sektoral_disnaker')->row();
    }

    function all_data_by_kec()
    {
        // select b.id,a.nama_wilayah, COUNT(a.id) as tot, 
        // COUNT(case when a.jenis_kelamin='PRIA' then 1 end) as laki_laki,
        // COUNT(case when a.jenis_kelamin='WANITA' then 1 end) as perempuan,
        // COUNT(case when a.status_perkawinan='KAWIN' then 1 end) as kawin,
        // COUNT(case when a.status_perkawinan='BELUM KAWIN' then 1 end) as belum_kawin
        // from sektoral_disnaker as a JOIN ref_kecamatan as b ON a.nama_wilayah = b.kecamatan group by a.nama_wilayah
        $this->db->select('b.id,a.nama_wilayah, COUNT(a.id) as total,COUNT(case when a.jenis_kelamin="PRIA" then 1 end) as laki_laki,COUNT(case when a.jenis_kelamin="WANITA" then 1 end) as perempuan,COUNT(case when a.status_perkawinan="KAWIN" then 1 end) as menikah,COUNT(case when a.status_perkawinan="BELUM KAWIN" then 1 end) as belum');
        $this->db->from('sektoral_disnaker as a');
        $this->db->join('ref_kecamatan as b','a.nama_wilayah = b.kecamatan');
        $this->db->group_by('a.nama_wilayah');
        return $this->db->get()->result();
    }

    function data_by_kec($kecamatan)
    {
        // select b.id,a.nama_wilayah, COUNT(a.id) as tot, 
        // COUNT(case when a.jenis_kelamin='PRIA' then 1 end) as laki_laki,
        // COUNT(case when a.jenis_kelamin='WANITA' then 1 end) as perempuan,
        // COUNT(case when a.status_perkawinan='KAWIN' then 1 end) as kawin,
        // COUNT(case when a.status_perkawinan='BELUM KAWIN' then 1 end) as belum_kawin
        // from sektoral_disnaker as a JOIN ref_kecamatan as b ON a.nama_wilayah = b.kecamatan group by a.nama_wilayah
        $this->db->select('b.id,a.nama_wilayah, COUNT(a.id) as total,COUNT(case when a.jenis_kelamin="PRIA" then 1 end) as laki_laki,COUNT(case when a.jenis_kelamin="WANITA" then 1 end) as perempuan,COUNT(case when a.status_perkawinan="KAWIN" then 1 end) as menikah,COUNT(case when a.status_perkawinan="BELUM KAWIN" then 1 end) as belum');
        $this->db->from('sektoral_disnaker as a');
        $this->db->join('ref_kecamatan as b','a.nama_wilayah = b.kecamatan');
        $this->db->where('b.kecamatan',$kecamatan);
        $this->db->group_by('a.nama_wilayah');
        return $this->db->get()->row();
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
        $this->db->or_like('NIK', $q);
        $this->db->or_like('nm_lengkap', $q);
        $this->db->or_like('gelar_belakang', $q);
        $this->db->or_like('tempat_lahir', $q);
        $this->db->or_like('tgl_lahir', $q);
        $this->db->or_like('jenis_kelamin', $q);
        $this->db->or_like('agama', $q);
        $this->db->or_like('status_perkawinan', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('nama_wilayah', $q);
        $this->db->or_like('nm_instansi', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('NIK', $q);
	$this->db->or_like('nm_lengkap', $q);
	$this->db->or_like('gelar_belakang', $q);
	$this->db->or_like('tempat_lahir', $q);
	$this->db->or_like('tgl_lahir', $q);
	$this->db->or_like('jenis_kelamin', $q);
	$this->db->or_like('agama', $q);
	$this->db->or_like('status_perkawinan', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('nama_wilayah', $q);
	$this->db->or_like('nm_instansi', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Sektoral_disnaker_model.php */
/* Location: ./application/models/Sektoral_disnaker_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-21 06:45:51 */
/* http://harviacode.com */