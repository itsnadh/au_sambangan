<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
// 		$this->load->library('pdf');
		$this->load->model('mod_user');
		$this->load->library('session');
		$this->load->library('Pdf');
	}

	public function index()
	{
		$id = $this->session->userdata('id');
		if(!$id)
			redirect(base_url().'index.php/');

	    $data['log'] = $this->mod_user->load_data_sambangan($id);

		$this->load->view('fe/sambangan/index', $data);
	}
	
	public function register()
	{
		$gender = $this->session->userdata('gender');
		$data['sesi'] = $this->mod_user->ambil_sesi($gender);

		$this->load->view('fe/sambangan/create', $data);
	}
	
	public function registration()
	{
		$id = $this->session->userdata('id');
		$siswa = $this->mod_user->load_data_siswa($id);
	    $nama_walisantri = $siswa['nama_walisantri'];
	    $nama_santri = $siswa['nama_santri'];
	    $kelas_santri = $siswa['kelas_santri'];
	    $sesi = $this->input->post('sesi');
	    $this->createDate = date("Y-m-d H:i:s");
	    
	    $data = array(
	        'user_id' => $id,
	        'nama_santri' => $nama_santri,
	        'nama_walisantri' => $nama_walisantri,
	        'kelas_santri' => $kelas_santri,
	        'status' => 1,
	        'sesi' => $sesi,
	        'created_at' => $this->createDate,
	        'date_created' => date("Y-m-d"),
		);

		if(!$this->mod_user->quotaCheck($sesi)){
			$this->session->set_flashdata('failed', 'Maaf, kuota sambangan pada sesi tersebut telah habis');
			redirect(base_url().'index.php/user');
		}

		if($this->mod_user->checkLastVisit($id, $sesi)){
			$this->session->set_flashdata('failed', 'Kuota sambangan anda pada bulan tersebut telah habis, sambangan masih diajukan');
			$data['status'] = 0;
		}

	   	$this->mod_user->simpan_data($data);
	   	redirect(base_url().'index.php/user');
	}
	
	public function hapus($id)
	{
		if($this->mod_user->isSambanganAuthorized($id, $this->session->userdata('id')))
			$this->mod_user->hapus_sambangan($id);
		
		redirect(base_url().'index.php/user');
	}

	public function kartu()
	{
		$this->load->view('fe/sambangan/kartu/kartu');
	}

	public function cetak($id)
	{
		$santri = null;
		if($this->mod_user->isSambanganAuthorized($id, $this->session->userdata('id'), true))
			$santri = $this->mod_user->getPrintData($id);
		else
			redirect(base_url().'index.php/user');

		// error_reporting(0);
		$pdf = new FPDF('P','mm','Letter');
		$pdf->AddPage();
		$pdf->Rect(10, 7, 190, 90, 'D');
		$pdf->SetTitle("Cetak Kartu Sambangan");
		$urr = base_url()."assets/user/kartu/logoMAI.png";
        $pdf->Image($urr, 20, 10, 30, 30); 
		$pdf->Cell(25);
        $pdf->SetFont('Times', 'B', '12');
		$pdf->Cell(0, 5, "KARTU SAMBANGAN WALISANTRI", 0, 1, 'C');
		$pdf->Ln(2);
        $pdf->Cell(25);
        $pdf->SetFont('Times', 'B', '16');
		$pdf->Cell(0, 5, 'MADRASAH ALIYAH ISTIMEWA', 0, 1, 'C');
		$pdf->Ln(2);
        $pdf->Cell(25);
        $pdf->SetFont('Times', 'B', '20');
        $pdf->Cell(0, 5, 'AMANATUL UMMAH', 0, 1, 'C');
		$pdf->Ln(2);
        $pdf->Cell(25);
        $pdf->SetFont('Times', 'B', '12');
        $pdf->Cell(0, 5, 'Program Layanan SKS 2 Tahun dan 3 Tahun', 0, 1, 'C');
        $pdf->Cell(25);
        $pdf->SetFont('Times', 'B', '12');
        $pdf->Cell(0, 5, "Tahun Pelajaran 2021/2022", 0, 1, 'C');
		$pdf->Ln(2);
        $pdf->Cell(25);
        $pdf->SetLineWidth(1);
        $pdf->Line(20, 42, 190, 42);
        $pdf->SetLineWidth(0);
        $pdf->Line(20, 43, 190, 43);
		
		$pdf->Ln(10);
        $pdf->Cell(10);
        $pdf->SetFont('Times', '',  '12');
        $pdf->Cell(50, 5, 'NAMA WALISANTRI', 0, 0);
        $pdf->Cell(3, 5, ':', 0, 0);
        $pdf->SetFont('Times', 'B', '12');
        $pdf->Cell(80, 5, $santri->nama_walisantri , 0, 0);
        $pdf->Ln(6);
        $pdf->Cell(10);
        $pdf->SetFont('Times', '', '12');
        $pdf->Cell(50, 5, 'NAMA SANTRI', 0, 0);
        $pdf->Cell(3, 5, ':', 0, 0);
        $pdf->SetFont('Times', 'B', '12');
        $pdf->Cell(80, 5, $santri->nama_santri, 0, 0);
        $pdf->Ln(6);
        $pdf->Cell(10);
        $pdf->SetFont('Times', '', '12');
        $pdf->Cell(50, 5, 'KELAS', 0, 0);
        $pdf->Cell(3, 5, ':', 0, 0);
        $pdf->SetFont('Times', 'B', '12');
        $pdf->Cell(80, 5, $santri->kelas_santri, 0, 0);
		$pdf->Ln(6);
        $pdf->Cell(10);
		$pdf->SetFont('Times', '', '12');
        $pdf->Cell(50, 5, 'TANGGAL', 0, 0);
        $pdf->Cell(3, 5, ':', 0, 0);
        $pdf->SetFont('Times', 'B', '12');
        $pdf->Cell(80, 5, $santri->tanggal, 0, 0);
		$pdf->Ln(6);
        $pdf->Cell(10);
		$pdf->SetFont('Times', '', '12');
        $pdf->Cell(50, 5, 'SESI', 0, 0);
        $pdf->Cell(3, 5, ':', 0, 0);
        $pdf->SetFont('Times', 'B', '12');
        $pdf->Cell(80, 5, $santri->jam_mulai . ' - ' . $santri->jam_selesai, 0, 0);
		// $pdf->Ln(6);
        // $pdf->Cell(10);
		// $pdf->SetFont('Times', '', '12');
        // $pdf->Cell(50, 5, 'BILIK', 0, 0);
        // $pdf->Cell(3, 5, ':', 0, 0);
        // $pdf->SetFont('Times', 'B', '12');
        // $pdf->Cell(80, 5, 'BILIK', 0, 0);
		// $pdf->Ln(6);
        // $pdf->Cell(10);

		$pdf->Output();
	}

	public function keluar()
	{
		session_destroy();
		redirect(base_url().'','refresh');
	}
}
