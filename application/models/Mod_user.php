<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_user extends CI_Model {
    public function cek_login($id)
	{
		$this->db->where('username', $id);
		return $this->db->get('login_sambangan')->row_array();
	}
	
	public function load_data_siswa($username)
	{
		$this->db->where('username', $username);
		return $this->db->get('data_sambangan')->row_array();
	}
	
	public function load_data_sambangan($username)
	{
		$this->db->where('username', $username);
// 		return $this->db->get('sesi_sambangan')->row_array();
        return $this->db->get('sesi_sambangan')->result();
	}
	
	public function ambil_data()
	{
	    return $this->db->get('data_sambangan')->result();
	}
	
	public function simpan_data($data)
	{
		$this->db->insert('sesi_sambangan', $data);
	}
	
	public function ambil_kuota()
	{
	    $querry = $this->db->query('SELECT COUNT(*) FROM `sesi_sambangan` WHERE `sesi` = \'sesi_4\' AND `date_created` = \'2021-03-17\'');
	    return $querry->result();
	    
	}
}