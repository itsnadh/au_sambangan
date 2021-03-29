<?php 
 
class Mod_login extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	
	public function cek_user($user)
	{
		$this->db->where('username_admin', $user);
		$data = $this->db->get('admin_sambangan')->row_array();
        return $data;
	}

	public function cek_pass($pass)
	{
		$this->db->where('password_admin', $pass);
		return $this->db->get('admin_sambangan')->row_array();
	}
}