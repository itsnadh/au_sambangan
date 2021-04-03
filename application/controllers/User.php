<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
// 		$this->load->library('pdf');
		$this->load->model('mod_user');
		$this->load->model('mod_admin');
		$this->load->library('session');
// 		if ($this->session->userdata('log_user') <> 1) {
//         	header('Location: '.base_url().'user');
//     	}
	}

	public function index()
	{
		$id = $this->session->userdata('id');
		if(!$id)
			redirect(base_url().'index.php/');

	    $data['log'] = $this->mod_user->load_data_sambangan($id);
		
		// var_dump($data['bio']); die();
		$this->load->view('fe/user', $data);
	}
	
	public function register()
	{
		$id = $this->session->userdata('id');
		$data['kuota'] = $this->mod_user->ambil_kuota();
		$data['sesi'] = $this->mod_admin->ambil_sesi();

		$this->load->view('fe/register', $data);
	}
	
	public function registration()
	{
		$id = $this->session->userdata('id');
		$siswa = $this->mod_user->load_data_siswa($id);
	    $nama_walisantri = $siswa['nama_walisantri'];
	    $nama_santri = $siswa['nama_santri'];
	    $kelas_santri = $siswa['kelas_santri'];
	    $sesi = $this->input->post('sesi');
	    $this->createDate = date("Y-m-d H:i:s");
	    
	    $data = array(
	        'user_id' => $this->session->userdata('id'),
	        'nama_santri' => $nama_santri,
	        'nama_walisantri' => $nama_walisantri,
	        'kelas_santri' => $kelas_santri,
	        'is_aktif' => 0,
	        'is_offline' => 0,
	        'status' => 0,
	        'sesi' => $sesi,
	        'created_at' => $this->createDate,
	        'date_created' => date("Y-m-d"), 
		);
	        
	   $this->mod_user->simpan_data($data);
	   redirect(base_url().'index.php/user','refresh');
	}
	
	public function hapus($id)
	{
		if($this->mod_user->isSambanganAuthorized($id, $this->session->userdata('id')))
			$this->mod_user->hapus_sambangan($id);
		
		redirect(base_url().'index.php/user');
	}

	public function keluar()
	{
		session_destroy();
		redirect(base_url().'','refresh');
	}
}
