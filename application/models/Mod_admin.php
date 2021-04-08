<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_admin extends CI_Model {

	public function ambil_data()
	{
		$this->db->select('nama_santri, nama_walisantri, kelas_santri, tanggal, jam_mulai, jam_selesai, sesi_sambangan.id, created_at');
		$this->db->join('list_sesi', 'list_sesi.id = sesi_sambangan.sesi');

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
