<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_admin extends CI_Model {

	public function ambil_data()
	{
		return $this->db->get('sesi_sambangan')->result();
	}

	public function ambil_sesi()
	{
		return $this->db->get('list_sesi')->result();
	}

	public function simpan_sesi($data)
	{
		$this->db->insert('list_sesi', $data);
	}

	public function hapus_sesi($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('list_sesi');
	}
}
