<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perizinan_nakes extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Perizinan_nakes_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('perizinan_nakes/sektoral_nakes_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Perizinan_nakes_model->json();
    }

    public function read($id) 
    {
        $row = $this->Perizinan_nakes_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nik' => $row->nik,
		'nama' => $row->nama,
		'sex' => $row->sex,
		'tgl_berlaku' => $row->tgl_berlaku,
		'jenis_surat' => $row->jenis_surat,
		'tempat_praktek_ke' => $row->tempat_praktek_ke,
		'tempat_praktek' => $row->tempat_praktek,
		'alamat_tempat_praktek' => $row->alamat_tempat_praktek,
		'kecamatan_tempat_praktek' => $row->kecamatan_tempat_praktek,
		'kelurahan_tempat_praktek' => $row->kelurahan_tempat_praktek,
		'kecamatan_tempat_praktek_pribadi' => $row->kecamatan_tempat_praktek_pribadi,
		'kelurahan_tempat_praktek_pribadi' => $row->kelurahan_tempat_praktek_pribadi,
		'status_berlaku' => $row->status_berlaku,
		'created_date' => $row->created_date,
		'profesi' => $row->profesi,
	    );
            $this->load->view('perizinan_nakes/sektoral_nakes_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perizinan_nakes'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('perizinan_nakes/create_action'),
	    'id' => set_value('id'),
	    'nik' => set_value('nik'),
	    'nama' => set_value('nama'),
	    'sex' => set_value('sex'),
	    'tgl_berlaku' => set_value('tgl_berlaku'),
	    'jenis_surat' => set_value('jenis_surat'),
	    'tempat_praktek_ke' => set_value('tempat_praktek_ke'),
	    'tempat_praktek' => set_value('tempat_praktek'),
	    'alamat_tempat_praktek' => set_value('alamat_tempat_praktek'),
	    'kecamatan_tempat_praktek' => set_value('kecamatan_tempat_praktek'),
	    'kelurahan_tempat_praktek' => set_value('kelurahan_tempat_praktek'),
	    'kecamatan_tempat_praktek_pribadi' => set_value('kecamatan_tempat_praktek_pribadi'),
	    'kelurahan_tempat_praktek_pribadi' => set_value('kelurahan_tempat_praktek_pribadi'),
	    'status_berlaku' => set_value('status_berlaku'),
	    'created_date' => set_value('created_date'),
	    'profesi' => set_value('profesi'),
	);
        $this->load->view('perizinan_nakes/sektoral_nakes_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nik' => $this->input->post('nik',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'sex' => $this->input->post('sex',TRUE),
		'tgl_berlaku' => $this->input->post('tgl_berlaku',TRUE),
		'jenis_surat' => $this->input->post('jenis_surat',TRUE),
		'tempat_praktek_ke' => $this->input->post('tempat_praktek_ke',TRUE),
		'tempat_praktek' => $this->input->post('tempat_praktek',TRUE),
		'alamat_tempat_praktek' => $this->input->post('alamat_tempat_praktek',TRUE),
		'kecamatan_tempat_praktek' => $this->input->post('kecamatan_tempat_praktek',TRUE),
		'kelurahan_tempat_praktek' => $this->input->post('kelurahan_tempat_praktek',TRUE),
		'kecamatan_tempat_praktek_pribadi' => $this->input->post('kecamatan_tempat_praktek_pribadi',TRUE),
		'kelurahan_tempat_praktek_pribadi' => $this->input->post('kelurahan_tempat_praktek_pribadi',TRUE),
		'status_berlaku' => $this->input->post('status_berlaku',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'profesi' => $this->input->post('profesi',TRUE),
	    );

            $this->Perizinan_nakes_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('perizinan_nakes'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Perizinan_nakes_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('perizinan_nakes/update_action'),
		'id' => set_value('id', $row->id),
		'nik' => set_value('nik', $row->nik),
		'nama' => set_value('nama', $row->nama),
		'sex' => set_value('sex', $row->sex),
		'tgl_berlaku' => set_value('tgl_berlaku', $row->tgl_berlaku),
		'jenis_surat' => set_value('jenis_surat', $row->jenis_surat),
		'tempat_praktek_ke' => set_value('tempat_praktek_ke', $row->tempat_praktek_ke),
		'tempat_praktek' => set_value('tempat_praktek', $row->tempat_praktek),
		'alamat_tempat_praktek' => set_value('alamat_tempat_praktek', $row->alamat_tempat_praktek),
		'kecamatan_tempat_praktek' => set_value('kecamatan_tempat_praktek', $row->kecamatan_tempat_praktek),
		'kelurahan_tempat_praktek' => set_value('kelurahan_tempat_praktek', $row->kelurahan_tempat_praktek),
		'kecamatan_tempat_praktek_pribadi' => set_value('kecamatan_tempat_praktek_pribadi', $row->kecamatan_tempat_praktek_pribadi),
		'kelurahan_tempat_praktek_pribadi' => set_value('kelurahan_tempat_praktek_pribadi', $row->kelurahan_tempat_praktek_pribadi),
		'status_berlaku' => set_value('status_berlaku', $row->status_berlaku),
		'created_date' => set_value('created_date', $row->created_date),
		'profesi' => set_value('profesi', $row->profesi),
	    );
            $this->load->view('perizinan_nakes/sektoral_nakes_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perizinan_nakes'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nik' => $this->input->post('nik',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'sex' => $this->input->post('sex',TRUE),
		'tgl_berlaku' => $this->input->post('tgl_berlaku',TRUE),
		'jenis_surat' => $this->input->post('jenis_surat',TRUE),
		'tempat_praktek_ke' => $this->input->post('tempat_praktek_ke',TRUE),
		'tempat_praktek' => $this->input->post('tempat_praktek',TRUE),
		'alamat_tempat_praktek' => $this->input->post('alamat_tempat_praktek',TRUE),
		'kecamatan_tempat_praktek' => $this->input->post('kecamatan_tempat_praktek',TRUE),
		'kelurahan_tempat_praktek' => $this->input->post('kelurahan_tempat_praktek',TRUE),
		'kecamatan_tempat_praktek_pribadi' => $this->input->post('kecamatan_tempat_praktek_pribadi',TRUE),
		'kelurahan_tempat_praktek_pribadi' => $this->input->post('kelurahan_tempat_praktek_pribadi',TRUE),
		'status_berlaku' => $this->input->post('status_berlaku',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'profesi' => $this->input->post('profesi',TRUE),
	    );

            $this->Perizinan_nakes_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('perizinan_nakes'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Perizinan_nakes_model->get_by_id($id);

        if ($row) {
            $this->Perizinan_nakes_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('perizinan_nakes'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perizinan_nakes'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('sex', 'sex', 'trim|required');
	$this->form_validation->set_rules('tgl_berlaku', 'tgl berlaku', 'trim|required');
	$this->form_validation->set_rules('jenis_surat', 'jenis surat', 'trim|required');
	$this->form_validation->set_rules('tempat_praktek_ke', 'tempat praktek ke', 'trim|required');
	$this->form_validation->set_rules('tempat_praktek', 'tempat praktek', 'trim|required');
	$this->form_validation->set_rules('alamat_tempat_praktek', 'alamat tempat praktek', 'trim|required');
	$this->form_validation->set_rules('kecamatan_tempat_praktek', 'kecamatan tempat praktek', 'trim|required');
	$this->form_validation->set_rules('kelurahan_tempat_praktek', 'kelurahan tempat praktek', 'trim|required');
	$this->form_validation->set_rules('kecamatan_tempat_praktek_pribadi', 'kecamatan tempat praktek pribadi', 'trim|required');
	$this->form_validation->set_rules('kelurahan_tempat_praktek_pribadi', 'kelurahan tempat praktek pribadi', 'trim|required');
	$this->form_validation->set_rules('status_berlaku', 'status berlaku', 'trim|required');
	$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
	$this->form_validation->set_rules('profesi', 'profesi', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Perizinan_nakes.php */
/* Location: ./application/controllers/Perizinan_nakes.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-29 03:07:37 */
/* http://harviacode.com */