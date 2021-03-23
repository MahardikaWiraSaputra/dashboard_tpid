<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Map_model extends CI_Model
{

    public function map(){
        $this->db->select('*');
        $this->db->from('ref_kecamatan');
        return $this->db->get()->result_array();
    }

}
