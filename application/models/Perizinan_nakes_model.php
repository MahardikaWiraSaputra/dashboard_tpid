<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perizinan_nakes_model extends CI_Model
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

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
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

/* End of file Perizinan_nakes_model.php */
/* Location: ./application/models/Perizinan_nakes_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-29 03:07:37 */
/* http://harviacode.com */