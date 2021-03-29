<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_admin extends CI_Model {

	public function ambil_data()
	{
		return $this->db->get('sesi_sambangan')->result();
	}
	
}
