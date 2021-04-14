<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
// 		$this->load->library('pdf');
		$this->load->model('mod_user');
		$this->load->library('session');
	}

	public function index()
	{
		$id = $this->session->userdata('id');
		if(!$id)
			redirect(base_url().'index.php/');

	    $data['log'] = $this->mod_user->load_data_sambangan($id);

		$this->load->view('fe/sambangan/index', $data);
	}
	
	public function register()
	{
		$gender = $this->session->userdata('gender');
		$data['kuota'] = $this->mod_user->ambil_kuota();
		$data['sesi'] = $this->mod_user->ambil_sesi($gender);

		$this->load->view('fe/sambangan/create', $data);
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
	        'user_id' => $id,
	        'nama_santri' => $nama_santri,
	        'nama_walisantri' => $nama_walisantri,
	        'kelas_santri' => $kelas_santri,
	        'status' => 0,
	        'sesi' => $sesi,
	        'created_at' => $this->createDate,
	        'date_created' => date("Y-m-d"),
		);

		if(!$this->mod_user->quotaCheck($sesi)){
			$this->session->set_flashdata('failed', 'Maaf, kuota sambangan pada sesi tersebut telah habis');
			redirect(base_url().'index.php/user');
		}

		if($this->mod_user->checkLastVisit($id, $sesi)){
			$this->session->set_flashdata('failed', 'Maaf, jatah sambangan anda pada bulan tersebut telah habis');
			redirect(base_url().'index.php/user');
		}

	   	$this->mod_user->simpan_data($data);
	   	redirect(base_url().'index.php/user');
	}
	
	public function hapus($id)
	{
		if($this->mod_user->isSambanganAuthorized($id, $this->session->userdata('id')))
			$this->mod_user->hapus_sambangan($id);
		
		redirect(base_url().'index.php/user');
	}

	public function kartu()
	{
		$this->load->view('fe/sambangan/kartu/kartu');
	}

	public function keluar()
	{
		session_destroy();
		redirect(base_url().'','refresh');
	}
}
