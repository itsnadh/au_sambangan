<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('mod_login');
 
	}
    
    public function index()
	{
		$this->load->view('admin/login');
	}
    
    public function login()
	{
		$user = $this->input->post('user');
		$pass = md5($this->input->post('passw'));
		//echo $user.'-'.$pass;

		$login = $this->mod_login->cek_user($user);
		if ($login) {
			$pasw = $this->mod_login->cek_pass($pass);
			if ($pasw['password_admin']==$pass) {
				$array = array(
					'login' => '1',
					'id' => $login['id'],
					'uname' => $login['username_admin'],
				);
				
				$this->session->set_userdata( $array );
				redirect(base_url().'index.php/admin','refresh');
			}else{
				$this->session->set_flashdata('gagal', 'Password yang anda masukkan salah..!!');
				$this->index();
			}
		}else{
			$this->session->set_flashdata('gagal', 'User tidak ditemukan..!!');
			$this->index();
		}

	}
	
	
// 	function logout(){
// 		$this->session->sess_destroy();
// 		redirect(base_url('login'));
// 	}
}
