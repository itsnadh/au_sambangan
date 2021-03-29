<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
// 		$this->load->library('pdf');
		$this->load->model('mod_user');
		$this->load->library('session');
// 		if ($this->session->userdata('log_user') <> 1) {
//         	header('Location: '.base_url().'user');
//     	}
	}

	public function index()
	{
	   // $data = array('siswa' => $this->mod_user->ambil_data(),);
	    $data = $this->load_data();
		$this->load->view('fe/user', $data);
	}
	
	public function register()
	{
	    $data = $this->load_data();
        $kuota = $this->ambil_kuota();
		$this->load->view('fe/register',$data, $kuota);
	}
	
	public function load_data()
	{
	   // $this->session->set_userdata('id',47705);
		$id = $this->session->userdata('id');
		return $data = array('bio' =>$this->mod_user->load_data_siswa($id),
					'log' => $this->mod_user->load_data_sambangan($id), 
    //                 'info' => $this->mod_home->load_info(),
    //                 'raport' => $this->mod_home->cek_bukti($id),
    //                 'tf' => $this->mod_home->cek_tf($id),
    //                 'foto' => $this->mod_home->cari_foto($id),
    //                 'pros' => $this->mod_home->getprosedur(),
    //                 'bank' => $this->mod_home->get_seting('1'), 
    //                 'nama' => $this->mod_home->get_seting('2'),
    //                 'jml' => $this->mod_home->get_seting('3'),
    //                 'nominal' => $this->mod_home->nominal($id),
    //                 'du_ci' => $this->mod_home->get_daftar_ulang(1),
    //                 'du_exc' => $this->mod_home->get_daftar_ulang(2),
    //                 'seragam' => $this->mod_home->get_daftar_ulang(3),
        );
	}
	
	public function registration()
	{
	    $nama_walisantri = $this->input->post('nama_walisantri');
	    $nama_santri = $this->input->post('nama_santri');
	    $kelas_santri = $this->input->post('kelas_santri');
	    $sesi = $this->input->post('sesi');
	    $this->createDate = date("Y-m-d H:i:s");
	    
	    $data = array(
	        'username' => $this->session->userdata('id'),
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
	   redirect(base_url().'user','refresh');
	}
	
	public function ambil_kuota()
	{
	   // $kuota = array('kuota' => $this->mod_user->ambil_kuota());
	   $kuota = $this->mod_user->ambil_kuota();
	   print_r($kuota);
	}
	
	public function keluar()
	{
		session_destroy();
		redirect(base_url().'','refresh');
	}
}
