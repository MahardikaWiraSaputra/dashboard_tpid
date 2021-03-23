<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sektoral_disnaker extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sektoral_disnaker_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('sektoral_disnaker/sektoral_disnaker_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Sektoral_disnaker_model->json();
    }

    public function read($id) 
    {
        $row = $this->Sektoral_disnaker_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'NIK' => $row->NIK,
		'nm_lengkap' => $row->nm_lengkap,
		'gelar_belakang' => $row->gelar_belakang,
		'tempat_lahir' => $row->tempat_lahir,
		'tgl_lahir' => $row->tgl_lahir,
		'jenis_kelamin' => $row->jenis_kelamin,
		'agama' => $row->agama,
		'status_perkawinan' => $row->status_perkawinan,
		'alamat' => $row->alamat,
		'nama_wilayah' => $row->nama_wilayah,
		'nm_instansi' => $row->nm_instansi,
	    );
            $this->load->view('sektoral_disnaker/sektoral_disnaker_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sektoral_disnaker'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sektoral_disnaker/create_action'),
	    'id' => set_value('id'),
	    'NIK' => set_value('NIK'),
	    'nm_lengkap' => set_value('nm_lengkap'),
	    'gelar_belakang' => set_value('gelar_belakang'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'tgl_lahir' => set_value('tgl_lahir'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'agama' => set_value('agama'),
	    'status_perkawinan' => set_value('status_perkawinan'),
	    'alamat' => set_value('alamat'),
	    'nama_wilayah' => set_value('nama_wilayah'),
	    'nm_instansi' => set_value('nm_instansi'),
	);
        $this->load->view('sektoral_disnaker/sektoral_disnaker_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'NIK' => $this->input->post('NIK',TRUE),
		'nm_lengkap' => $this->input->post('nm_lengkap',TRUE),
		'gelar_belakang' => $this->input->post('gelar_belakang',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'status_perkawinan' => $this->input->post('status_perkawinan',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'nama_wilayah' => $this->input->post('nama_wilayah',TRUE),
		'nm_instansi' => $this->input->post('nm_instansi',TRUE),
	    );

            $this->Sektoral_disnaker_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('sektoral_disnaker'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Sektoral_disnaker_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sektoral_disnaker/update_action'),
		'id' => set_value('id', $row->id),
		'NIK' => set_value('NIK', $row->NIK),
		'nm_lengkap' => set_value('nm_lengkap', $row->nm_lengkap),
		'gelar_belakang' => set_value('gelar_belakang', $row->gelar_belakang),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'agama' => set_value('agama', $row->agama),
		'status_perkawinan' => set_value('status_perkawinan', $row->status_perkawinan),
		'alamat' => set_value('alamat', $row->alamat),
		'nama_wilayah' => set_value('nama_wilayah', $row->nama_wilayah),
		'nm_instansi' => set_value('nm_instansi', $row->nm_instansi),
	    );
            $this->load->view('sektoral_disnaker/sektoral_disnaker_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sektoral_disnaker'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'NIK' => $this->input->post('NIK',TRUE),
		'nm_lengkap' => $this->input->post('nm_lengkap',TRUE),
		'gelar_belakang' => $this->input->post('gelar_belakang',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'status_perkawinan' => $this->input->post('status_perkawinan',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'nama_wilayah' => $this->input->post('nama_wilayah',TRUE),
		'nm_instansi' => $this->input->post('nm_instansi',TRUE),
	    );

            $this->Sektoral_disnaker_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sektoral_disnaker'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Sektoral_disnaker_model->get_by_id($id);

        if ($row) {
            $this->Sektoral_disnaker_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sektoral_disnaker'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sektoral_disnaker'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('NIK', 'nik', 'trim|required');
	$this->form_validation->set_rules('nm_lengkap', 'nm lengkap', 'trim|required');
	$this->form_validation->set_rules('gelar_belakang', 'gelar belakang', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('agama', 'agama', 'trim|required');
	$this->form_validation->set_rules('status_perkawinan', 'status perkawinan', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('nama_wilayah', 'nama wilayah', 'trim|required');
	$this->form_validation->set_rules('nm_instansi', 'nm instansi', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Sektoral_disnaker.php */
/* Location: ./application/controllers/Sektoral_disnaker.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-21 06:45:51 */
/* http://harviacode.com */