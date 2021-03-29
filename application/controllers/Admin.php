<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('mod_admin');
		if ($this->session->userdata('login') <> 1) {
        	header('Location: '.base_url().'login');
    	}
	}

	public function index()
	{
	    $data = array('siswa' => $this->mod_admin->ambil_data(),);
		$this->load->view('admin/index', $data);
	}
	
	public function logout()
	{
		session_destroy();
		redirect(base_url().'login','refresh');
	}
	
	
}
