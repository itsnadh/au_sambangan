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
		$this->db->select('list_sesi.id, gender, kuota, tanggal, jam_mulai, jam_selesai, COUNT(sesi) as used');
		$this->db->join('sesi_sambangan', 'list_sesi.id = sesi_sambangan.sesi', 'left');
		$this->db->group_by('list_sesi.id, gender, kuota, tanggal, jam_mulai, jam_selesai');
		
		return $this->db->get('list_sesi')->result();
	}

	public function simpan_sesi($data, $id)
	{
		if($id){
			$data['id'] = $id;
			return $this->db->replace('list_sesi', $data);
		}

		else return $this->db->insert('list_sesi', $data);
	}

	public function getSesiByID($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('list_sesi')->result()[0];
	}

	public function hapus_sesi($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('list_sesi');
	}
}
