<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('mod_admin');
		if ($this->session->userdata('login') <> 1) {
        	header('Location: '.base_url().'index.php/login');
    	}
	}

	public function index()
	{
	    $data = array('siswa' => $this->mod_admin->ambil_data());
		$this->load->view('admin/dasbor/index', $data);
	}
	
	public function logout()
	{
		session_destroy();
		redirect(base_url().'index.php/login','refresh');
	}
	
	public function sesi()
	{
	    $data['sesi'] = $this->mod_admin->ambil_sesi();
		$this->load->view('admin/sesi/index', $data);
	}
	
	public function create_sesi()
	{
		$this->load->view('admin/sesi/create');
	}
	
	public function post_sesi()
	{
		$jadwal_mulai = $this->input->post('tanggal') . " " . $this->input->post('jam_mulai');
		$jadwal_selesai = $this->input->post('tanggal') . " " . $this->input->post('jam_selesai');

	    $data = array(
			'tanggal' => $this->input->post('tanggal'),
			'jam_mulai' => $this->input->post('jam_mulai'),
			'jam_selesai' => $this->input->post('jam_selesai'),
			'kuota' => $this->input->post('kuota'),
			'sisa' => $this->input->post('kuota'),
			'gender' => $this->input->post('gender'),
			'jadwal_mulai' => $jadwal_mulai,
			'jadwal_selesai' => $jadwal_selesai,
		);

		$this->mod_admin->simpan_sesi($data);

		redirect(base_url().'index.php/admin/sesi');
	}
	
	public function hapus_sesi($id)
	{
		$this->mod_admin->hapus_sesi($id);

		redirect(base_url().'index.php/admin/sesi');
	}
}
