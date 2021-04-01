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
		$this->db->select('nama_santri, nama_walisantri, kelas_santri, tanggal, jam_mulai, jam_selesai, sesi_sambangan.id');
		$this->db->join('list_sesi', 'list_sesi.id = sesi_sambangan.sesi');

        return $this->db->get('sesi_sambangan')->result();
	}
	
	public function ambil_data()
	{
	    return $this->db->get('data_sambangan')->result();
	}
	
	public function simpan_data($data)
	{
		$this->db->insert('sesi_sambangan', $data);

		$this->update_kuota($data['sesi'], false);
	}

	private function update_kuota($id, $add = true)
	{
		$this->db->select('sisa');
		$this->db->where('id', $id);
		$sisa = $this->db->get('list_sesi')->result()[0]->sisa;
		
		$test = $add ? $sisa+1 : $sisa-1;
		// var_dump($test); die();

		$this->db->set('sisa', $test);
		$this->db->update('list_sesi');
	}
	
	public function ambil_kuota()
	{
		return $this->db->get('sesi_sambangan')->result();
	}

	public function hapus_sambangan($id)
	{
		$this->db->select('sesi');
		$this->db->where('id', $id);
		$sesi = $this->db->get('sesi_sambangan')->result()[0]->sesi;

		$this->db->where('id', $id);
		$this->db->delete('sesi_sambangan');

		return $this->update_kuota($sesi);
	}
}
