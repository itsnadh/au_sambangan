<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index1 extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('mod_user');
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('index1.php');
	}
	
	public function proses_login()
	{
		$pass = $this->input->post('password');
		$id = $this->input->post('username');
		if ($pass && $id) {
			$ambil  = $this->mod_user->cek_login($id);
			if ($ambil) {
				if ($pass == $ambil['password']) {
					$sess = [
						'id' => $ambil['id'],
						'nama_santri' => $ambil['nama_santri'],
						'nama_walisantri' => $ambil['nama_walisantri'],
						'kelas_santri' => $ambil['kelas_santri'],
						'gender' => $ambil['gender'],
					];
					$this->session->set_userdata($sess);
					
					redirect(base_url().'index.php/user');
				}else{
					//echo "Password Tidak Sesuai";
					$this->session->set_flashdata('gagal', 'Password tidak sesuai..!!');

					redirect(base_url());
				}
			}else{
				//echo "Nomor Peserta Tidak ditemukan";
				$this->session->set_flashdata('gagal', 'Nomor peserta tidak ditemukan..!!');
				redirect(base_url());
			}
		}else{
			//echo "Masukkan Nomor Peserta dan Password dengan benar..";
			$this->session->set_flashdata('gagal', 'Masukkan Nomor Peserta dan Password dengan benar..!!');
			redirect(base_url());
		}
	}
}
