<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_laporan extends CI_Controller {

		function __construct()
	{
		parent::__construct();
		$this->load->model('model_stok');
		$this->load->library('pdf');
		if($this->session->userdata('masuk') != TRUE)
		{
			$url=base_url();
			redirect($url);
		}
	}

	public function laporan_bahan()
	{
		$pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(290,7,'STOK BAHAN',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(290,7,'DAFTAR LAPORAN KESELURUHAN BAHAN',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(15,6,'NO',1,0);
        $pdf->Cell(22,6,'ID BAHAN',1,0);
        $pdf->Cell(100,6,'NAMA BAHAN',1,0);
        $pdf->Cell(30,6,'STOK BAHAN',1,0);
        $pdf->Cell(35,6,'SATUAN',1,1);
        $pdf->SetFont('Arial','',10);
        $bahan = $this->model_stok->semua_bahan();
        $no=1;
        foreach ($bahan->result() as $row){
        	$pdf->Cell(15,6,$no++,1,0);
            $pdf->Cell(22,6,$row->id_bahan,1,0);
            $pdf->Cell(100,6,$row->nama_bahan,1,0);
            $pdf->Cell(30,6,$row->stok_bahan,1,0);
            $pdf->Cell(35,6,$row->satuan,1,1); 
        }
        $pdf->Output();
	}


	public function laporan_bahan_masuk()
	{
		$masuk=$this->model_stok->semua_bahan_masuk();
		$pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(290,7,'BAHAN MASUK',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(290,7,'DAFTAR LAPORAN KESELURUHAN BAHAN MASUK',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(15,6,'NO',1,0);
        $pdf->Cell(35,6,'ID BAHAN MASUK',1,0);
        $pdf->Cell(100,6,'NAMA BAHAN',1,0);
        $pdf->Cell(50,6,'JUMLAH MASUK',1,0);
        $pdf->Cell(35,6,'TANGGAL MASUK',1,1);
        $pdf->SetFont('Arial','',10);
        $no=1;
        foreach ($masuk->result() as $row){
        	$pdf->Cell(15,6,$no++,1,0);
            $pdf->Cell(35,6,$row->id_laporan_masuk,1,0);
            $pdf->Cell(100,6,$row->nama_bahan,1,0);
            $pdf->Cell(50,6,$row->jumlah_masuk,1,0);
            $pdf->Cell(35,6,$row->tanggal_masuk,1,1); 
        }
        $pdf->Output();
	}

	public function laporan_periode_masuk()
	{

		$data = 
			[
				'a' => $this->input->post('tanggal-a'),
				'b' => $this->input->post('tanggal-b'),
			];
		$bahan = $this->model_stok->periode_semua_masuk($data);

		$pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(290,7,'BAHAN MASUK',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(290,7,'DAFTAR LAPORAN KESELURUHAN BAHAN MASUK',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(15,6,'NO',1,0);
        $pdf->Cell(35,6,'ID BAHAN MASUK',1,0);
        $pdf->Cell(100,6,'NAMA BAHAN',1,0);
        $pdf->Cell(50,6,'JUMLAH MASUK',1,0);
        $pdf->Cell(35,6,'TANGGAL MASUK',1,1);
        $pdf->SetFont('Arial','',10);
        $no=1;
        foreach ($bahan->result() as $row){
        	$pdf->Cell(15,6,$no++,1,0);
            $pdf->Cell(35,6,$row->id_laporan_masuk,1,0);
            $pdf->Cell(100,6,$row->nama_bahan,1,0);
            $pdf->Cell(50,6,$row->jumlah_masuk,1,0);
            $pdf->Cell(35,6,$row->tanggal_masuk,1,1); 
        }
        $pdf->Output();
	}


	public function laporan_bahan_keluar()
	{
		$keluar=$this->model_stok->semua_bahan_keluar();
		$pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(290,7,'BAHAN KELUAR',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(290,7,'DAFTAR LAPORAN KESELURUHAN BAHAN KELUAR',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(15,6,'NO',1,0);
        $pdf->Cell(35,6,'ID BAHAN MASUK',1,0);
        $pdf->Cell(100,6,'NAMA BAHAN',1,0);
        $pdf->Cell(50,6,'JUMLAH KELUAR',1,0);
        $pdf->Cell(35,6,'TANGGAL KELUAR',1,1);
        $pdf->SetFont('Arial','',10);
        $no=1;
        foreach ($keluar->result() as $row){
        	$pdf->Cell(15,6,$no++,1,0);
            $pdf->Cell(35,6,$row->id_keluar,1,0);
            $pdf->Cell(100,6,$row->nama_bahan,1,0);
            $pdf->Cell(50,6,$row->jumlah_keluar,1,0);
            $pdf->Cell(35,6,$row->tanggal_keluar,1,1); 
        }
        $pdf->Output();
	}

	public function laporan_periode_keluar()
	{

		$data = 
			[
				'a' => $this->input->post('tanggal-a'),
				'b' => $this->input->post('tanggal-b'),
			];
		$bahan = $this->model_stok->periode_semua_keluar($data);

		$pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(290,7,'BAHAN KELUAR',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(290,7,'DAFTAR LAPORAN KESELURUHAN BAHAN KELUAR',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(15,6,'NO',1,0);
        $pdf->Cell(35,6,'ID BAHAN KELUAR',1,0);
        $pdf->Cell(100,6,'NAMA BAHAN',1,0);
        $pdf->Cell(50,6,'JUMLAH KELUAR',1,0);
        $pdf->Cell(35,6,'TANGGAL KELUAR',1,1);
        $pdf->SetFont('Arial','',10);
        $no=1;
        foreach ($bahan->result() as $row){
        	$pdf->Cell(15,6,$no++,1,0);
            $pdf->Cell(35,6,$row->id_keluar,1,0);
            $pdf->Cell(100,6,$row->nama_bahan,1,0);
            $pdf->Cell(50,6,$row->jumlah_keluar,1,0);
            $pdf->Cell(35,6,$row->tanggal_keluar,1,1); 
        }
        $pdf->Output();
	}

		public function laporan_mutasi()
	{
		$pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(290,7,'MUTASI',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(290,7,'DAFTAR LAPORAN KESELURUHAN MUTASI',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(15,6,'NO',1,0);
        $pdf->Cell(22,6,'ID MUTASI',1,0);
        $pdf->Cell(22,6,'ID BAHAN',1,0);
        $pdf->Cell(30,6,'STOK AWAL',1,0);
        $pdf->Cell(35,6,'JUMLAH MUTASI',1,0);
        $pdf->Cell(35,6,'STOK AKHIR',1,0);
        $pdf->Cell(35,6,'CREATE AT',1,0);
        $pdf->Cell(35,6,'KETERANGAN',1,1);
        $pdf->SetFont('Arial','',10);
        $mutasi = $this->model_stok->semua_mutasi();
        $no=1;
        foreach ($mutasi->result() as $row){
        	$pdf->Cell(15,6,$no++,1,0);
            $pdf->Cell(22,6,$row->id_mutasi,1,0);
            $pdf->Cell(22,6,$row->id_bahan,1,0);
            $pdf->Cell(30,6,$row->stok_awal,1,0);
            $pdf->Cell(35,6,$row->jumlah_mutasi,1,0);
            $pdf->Cell(35,6,$row->stok_akhir,1,0);
            $pdf->Cell(35,6,$row->create_at,1,0);
            $pdf->Cell(35,6,$row->keterangan,1,1); 
        }
        $pdf->Output();
	}


	public function laporan_periode_mutasi()
	{

		$data = 
			[
				'a' => $this->input->post('tanggal-a'),
				'b' => $this->input->post('tanggal-b'),
			];
		$mutasi = $this->model_stok->periode_mutasi($data);

		$pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(290,7,'MUTASI',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(290,7,'DAFTAR LAPORAN KESELURUHAN MUTASI',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(15,6,'NO',1,0);
        $pdf->Cell(22,6,'ID MUTASI',1,0);
        $pdf->Cell(22,6,'ID BAHAN',1,0);
        $pdf->Cell(30,6,'STOK AWAL',1,0);
        $pdf->Cell(35,6,'JUMLAH MUTASI',1,0);
        $pdf->Cell(35,6,'STOK AKHIR',1,0);
        $pdf->Cell(35,6,'CREATE AT',1,0);
        $pdf->Cell(35,6,'KETERANGAN',1,1);
        $pdf->SetFont('Arial','',10);
        
        $no=1;
        foreach ($mutasi->result() as $row){
        	$pdf->Cell(15,6,$no++,1,0);
            $pdf->Cell(22,6,$row->id_mutasi,1,0);
            $pdf->Cell(22,6,$row->id_bahan,1,0);
            $pdf->Cell(30,6,$row->stok_awal,1,0);
            $pdf->Cell(35,6,$row->jumlah_mutasi,1,0);
            $pdf->Cell(35,6,$row->stok_akhir,1,0);
            $pdf->Cell(35,6,$row->create_at,1,0);
            $pdf->Cell(35,6,$row->keterangan,1,1); 
        }
        $pdf->Output();
	}
}

/* End of file C_laporan.php */
/* Location: ./application/controllers/C_laporan.php */