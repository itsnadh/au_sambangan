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
					$biodata = $this->mod_user->load_data_siswa($id);
					$nama_santri = $biodata['nama_santri'];
					$nama_walisantri = $biodata['nama_walisantri'];
					$username = $biodata['username'];
					//echo $jalur;
					//die;
					
					$sess = array('id' => $id,
					           'log_user' => 1,
					           
					    );
					
					$sesi = array('id' => $id,
								'log_user' => 1, 
								'nama_santri' => $nama_santri,
								'nama_walisantri' => $nama_walisantri,);
					$this->session->set_userdata($sess);

				// 	$object = array('upd' => $this->createDate = date("Y-m-d H:i:s"), );
				// 	$this->db->update('siswa_c1', $object);

					redirect(base_url().'user','refresh');
				}else{
					//echo "Password Tidak Sesuai";
					$this->session->set_flashdata('gagal', 'Password tidak sesuai..!!');

					redirect(base_url().'','refresh');
				}
			}else{
				//echo "Nomor Peserta Tidak ditemukan";
				$this->session->set_flashdata('gagal', 'Nomor peserta tidak ditemukan..!!');
				redirect(base_url().'','refresh');
			}
		}else{
			//echo "Masukkan Nomor Peserta dan Password dengan benar..";
			$this->session->set_flashdata('gagal', 'Masukkan Nomor Peserta dan Password dengan benar..!!');
			redirect(base_url().'','refresh');
		}
	}
}
