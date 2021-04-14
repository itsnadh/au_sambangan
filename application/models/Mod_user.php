<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_user extends CI_Model {
    public function cek_login($id)
	{
		$this->db->where('username', $id);
		return $this->db->get('login_sambangan')->row_array();
	}
	
	public function load_data_siswa($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('login_sambangan')->row_array();
	}
	
	public function load_data_sambangan($id)
	{
		$this->db->where('user_id', $id);
		$this->db->select('tanggal, jam_mulai, jam_selesai, sesi_sambangan.id');
		$this->db->join('list_sesi', 'list_sesi.id = sesi_sambangan.sesi');

        return $this->db->get('sesi_sambangan')->result();
	}
	
	public function ambil_data()
	{
	    return $this->db->get('login_sambangan')->result();
	}
	
	public function simpan_data($data)
	{
		return $this->db->insert('sesi_sambangan', $data);
	}

	public function quotaCheck($id)
	{
		$this->db->select('list_sesi.id, kuota, COUNT(sesi) as used');
		$this->db->join('sesi_sambangan', 'list_sesi.id = sesi_sambangan.sesi', 'left');
		$this->db->group_by('list_sesi.id, kuota');
		$data = $this->db->get('list_sesi')->result();
		
		return $data[0]->used < $data[0]->kuota;
	}
	
	public function checkLastVisit($id, $sesi)
	{
		$this->db->select('tanggal');
		$this->db->where('user_id', $id);
		$this->db->order_by('created_at', 'desc');
		$this->db->limit(1);
		$this->db->join('list_sesi', 'list_sesi.id = sesi_sambangan.sesi');
		$date =  $this->db->get('sesi_sambangan')->result();

		if(!$date)
			return false;

		$date = $date[0]->tanggal;

		$this->db->select('tanggal');
		$this->db->where('id', $sesi);
		$sesi =  $this->db->get('list_sesi')->result()[0]->tanggal;
		
		return (int) substr($date, 5, 2) == (int) substr($sesi, 5, 2);
	}

	public function ambil_sesi($gender, $kuota = false)
	{	
		$this->db->where('gender', $gender);
		$this->db->where('jadwal_mulai >=', date('Y-m-d H:i:s'));

		if($kuota){
			$this->db->select('id, tanggal, jam_mulai, jam_selesai, kuota, COUNT(id) as used');
			$this->db->group_by('id, tanggal, jam_mulai, jam_selesai, kuota');
		}

		return $this->db->get('list_sesi')->result();
	}

	public function isSambanganAuthorized($id, $user_id, $cetak = false)
	{
		$this->db->select('1');
		$this->db->where('sesi_sambangan.id', $id);
		$this->db->where('user_id', $user_id);
		$this->db->join('list_sesi', 'list_sesi.id = sesi_sambangan.sesi');

		if($cetak)
			$this->db->where('jadwal_selesai >=', date('Y-m-d H:i:s'));

		try {
			$data = $this->db->get('sesi_sambangan')->result()[0];
			
			if($data)
				return true;
		} catch (\Throwable $th) {}

		return false;
	}

	public function getPrintData($id)
	{
		$this->db->select('list_sesi.id, tanggal, jam_mulai, jam_selesai, nama_santri, nama_walisantri, kelas_santri');
		$this->db->where('sesi_sambangan.id', $id);
		$this->db->join('list_sesi', 'list_sesi.id = sesi_sambangan.sesi');

		return $this->db->get('sesi_sambangan')->result()[0];
	}

	public function hapus_sambangan($id)
	{
		$this->db->select('sesi');
		$this->db->where('id', $id);

		$this->db->where('id', $id);
		return $this->db->delete('sesi_sambangan');
	}
}
