<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_stok');
		$this->load->library('form_validation');

		if($this->session->userdata('masuk') != TRUE)
		{
			$url=base_url();
			redirect($url);
		}
	}

	public function index()
	{
		$this->load->view('admin/home');
	}

	//////////////////////////////// menu bahan////////////////////////////////////////////////////

	public function v_bahan()
	{
		$data['bahan']=$this->model_stok->semua_bahan();
		$this->load->view('admin/menu/bahan',$data);
	}

	public function tambah_bahan()
	{
		$this->form_validation->set_rules('nama-bahan','Nama bahan','required');
        $this->form_validation->set_rules('stok-bahan','Stok bahan','required');
        $this->form_validation->set_rules('satuan-bahan','Satuan bahan','required');

        if ($this->form_validation->run() == false )
        	{	
        		$data['bahan']=$this->model_stok->semua_bahan();
        		$this->load->view('admin/menu/bahan',$data);
        	}
        else
        	{
        		$data =
        			[
        				"nama_bahan" => $this->input->post('nama-bahan',TRUE),
        				"stok_bahan" => $this->input->post('stok-bahan',TRUE),
        				"satuan" => $this->input->post('satuan-bahan',TRUE),
        			];

            	$this->model_stok->tambah_bahan($data);
            	$this->session->set_flashdata('crud','Berhasil Di Tambahkan');
            	redirect('admin/bahan');
        	}

	}

	public function edit_bahan($data)
	{
        $result = $this->model_stok->cari_id($data);
        if($result->num_rows() > 0)
        {
            $i = $result->row_array();
            $data =  array(
                'id_bahan' => $i['id_bahan'], 
                'nama_bahan' => $i['nama_bahan'],
                'stok_bahan' => $i['stok_bahan'],
                'satuan_bahan' => $i['satuan'],
            );

            $data['bahan']=$this->model_stok->semua_bahan();
            $this->load->view('admin/menu/bahan_edit', $data);
        }
        else{
            echo "data tidak ada";
        }
	}

	public function update_bahan()
	{
		$data = 
		[
			'id_bahan' => $this->input->post('id-bahan',true),
			'nama_bahan' => $this->input->post('nama-bahan',true),
			'stok_bahan' => $this->input->post('stok-bahan',true),
			'satuan' => $this->input->post('satuan-bahan',true),
		];

		$this->model_stok->update_bahan($data);
		$this->session->set_flashdata('crud','Berhasil Di Edit');
        redirect('admin/bahan');
		
	}

	public function hapus_bahan($id)
	{   
		$this->model_stok->hapus_bahan($id);
        $this->session->set_flashdata('crud','Berhasil Di Hapus');
        redirect('admin/bahan');
		
	}


////////////////////////////// menu bahan masuk //////////////////////////////////////////////////

	public function v_bahan_masuk()
	{
		$data['masuk']=$this->model_stok->semua_bahan_masuk();
		$data['bahan']=$this->model_stok->semua_bahan();
		$this->load->view('admin/menu/bahan_masuk',$data);
	}

	public function tambah_bahan_masuk()
	{

		$this->form_validation->set_rules('id-bahan','Nama bahan','required');
        $this->form_validation->set_rules('jumlah-masuk','Jumlah masuk','required');
        $this->form_validation->set_rules('tanggal-masuk','Tanggal masuk','required');

        if ($this->form_validation->run() == false )
        	{	
        		$data['masuk']=$this->model_stok->semua_bahan_masuk();
				$data['bahan']=$this->model_stok->semua_bahan();
        		$this->load->view('admin/menu/bahan_masuk',$data);
        	}
        else
        	{

        		$id_bahan = $this->input->post('id-bahan',TRUE);
        		$jml_msk = $this->input->post('jumlah-masuk',TRUE);
        		$stok = $this->model_stok->cari_id_masuk($id_bahan);

	        	$data =
		        	[
		        	"id_bahan" => $id_bahan,
		        	"jumlah_masuk" => $jml_msk,
		        	"tanggal_masuk" => Date('y-m-d', strtotime($this->input->post('tanggal-masuk',TRUE))),
		        	];

		        	$mutasi=
		        	[
		        		"id_bahan" => $this->input->post('id-bahan',TRUE),
		        		"stok_awal" => $stok->stok_bahan,
		        		"jumlah_mutasi" => $jml_msk,
		        		"stok_akhir" => $stok->stok_bahan + $jml_msk,
		        		"create_at" => date("Y-m-d H:i:s"),
		        		"keterangan" =>'Barang Masuk',
		        	];

		        	// echo "<pre>";
		        	// print_r ($mutasi);
		        	// echo "</pre>";
		        	$this->model_stok->mutasi($mutasi);
		        	$this->model_stok->tambah_bahan_masuk($data);
		        	$this->session->set_flashdata('crud', 'Berhasil Di Tambahkan');
		        	redirect('admin/bahan-masuk');
        	}

	}

	// public function edit_bahan_masuk($data)
	// {
	// 	$result = $this->model_stok->cari_id_masuk($data);
 //        if($result->num_rows() > 0)
 //        {
 //            $i = $result->row_array();
 //            $data =  array(
 //                'id_laporan_masuk' => $i['id_laporan_masuk'], 
 //                'id_bahan' => $i['id_bahan'],
 //                'jumlah_masuk' => $i['jumlah_masuk'],
 //                'tanggal_masuk' => $i['tanggal_masuk'],
 //            );

 //            $data['bahan']=$this->model_stok->semua_bahan();
 //            $data['masuk']=$this->model_stok->semua_bahan_masuk();
 //            $this->load->view('admin/menu/edit_bahan_masuk', $data);
 //        }
 //        else{
 //            echo "data tidak ada";
 //        }	
	// }

	// public function update_bahan_masuk()
	// {
	// 	$data = 
	// 	[
	// 		'id_laporan_masuk' => $this->input->post('id-laporan-masuk',true),
	// 		'id_bahan' => $this->input->post('id-bahan',true),
	// 		'jumlah_masuk' => $this->input->post('jumlah-masuk',true),
	// 		'tanggal_masuk' => Date('y-m-d', strtotime($this->input->post('tanggal-masuk',TRUE))),
	// 	];

	// 	$this->model_stok->update_bahan_masuk($data);
	// 	$this->session->set_flashdata('crud','Berhasil Di Edit');
 //        redirect('admin/bahan-masuk');
	// }

	// public function hapus_bahan_masuk($id)
	// {
	// 	$this->model_stok->hapus_bahan_masuk($id);
 //        $this->session->set_flashdata('crud','Berhasil Di Hapus');
 //        redirect('admin/bahan-masuk');
	// }


///////////////////////////////////////// menu bahan keluar ////////////////////////////////////////

	public function v_bahan_keluar()
	{
		$data['keluar']=$this->model_stok->semua_bahan_keluar();
		$data['bahan']=$this->model_stok->semua_bahan();
		$this->load->view('admin/menu/bahan_keluar',$data);
	}

	public function tambah_bahan_keluar()
	{

		$this->form_validation->set_rules('id-bahan','Nama bahan','required');
        $this->form_validation->set_rules('jumlah-keluar','Jumlah keluar','required');
        $this->form_validation->set_rules('tanggal-keluar','Tanggal keluar','required');

        if ($this->form_validation->run() == false )
        	{	
        		$data['keluar']=$this->model_stok->semua_bahan_keluar();
				$data['bahan']=$this->model_stok->semua_bahan();
				$this->load->view('admin/menu/bahan_keluar',$data);
        	}
        else
        	{

				$id_bahan = $this->input->post('id-bahan',TRUE);
        		$jml_klr = $this->input->post('jumlah-keluar',TRUE);
        		$stok = $this->model_stok->cari_id_masuk($id_bahan);

	        	$data =
		        	[
		        	"id_bahan" => $id_bahan,
		        	"jumlah_keluar" => $jml_klr,
		        	"tanggal_keluar" => Date('y-m-d', strtotime($this->input->post('tanggal-keluar',TRUE))),
		        	];

		        	$mutasi=
		        	[
		        		"id_bahan" => $this->input->post('id-bahan',TRUE),
		        		"stok_awal" => $stok->stok_bahan,
		        		"jumlah_mutasi" => $jml_klr,
		        		"stok_akhir" => $stok->stok_bahan - $jml_klr,
		        		"create_at" => date("Y-m-d H:i:s"),
		        		"keterangan" =>'Barang Keluar',
		        	];

		        	// echo "<pre>";
		        	// print_r ($mutasi);
		        	// echo "</pre>";
		        	$this->model_stok->mutasi($mutasi);
		        	$this->model_stok->tambah_bahan_keluar($data);
		        	$this->session->set_flashdata('crud', 'Berhasil Di Tambahkan');
		        	redirect('admin/bahan-keluar');
        	}

	}

	// public function edit_bahan_keluar($data)
	// {
	// 	$result = $this->model_stok->cari_id_masuk($data);
 //        if($result->num_rows() > 0)
 //        {
 //            $i = $result->row_array();
 //            $data =  array(
 //                'id_laporan_masuk' => $i['id_laporan_masuk'], 
 //                'id_bahan' => $i['id_bahan'],
 //                'jumlah_masuk' => $i['jumlah_masuk'],
 //                'tanggal_masuk' => $i['tanggal_masuk'],
 //            );

 //            $data['bahan']=$this->model_stok->semua_bahan();
 //            $data['masuk']=$this->model_stok->semua_bahan_masuk();
 //            $this->load->view('admin/menu/edit_bahan_masuk', $data);
 //        }
 //        else{
 //            echo "data tidak ada";
 //        }	
	// }

	// public function update_bahan_keluar()
	// {
	// 	$data = 
	// 	[
	// 		'id_laporan_masuk' => $this->input->post('id-laporan-masuk',true),
	// 		'id_bahan' => $this->input->post('id-bahan',true),
	// 		'jumlah_masuk' => $this->input->post('jumlah-masuk',true),
	// 		'tanggal_masuk' => Date('y-m-d', strtotime($this->input->post('tanggal-masuk',TRUE))),
	// 	];

	// 	$this->model_stok->update_bahan_masuk($data);
	// 	$this->session->set_flashdata('crud','Berhasil Di Edit');
 //        redirect('admin/bahan-masuk');
	// }

	// public function hapus_bahan_keluar($id)
	// {
	// 	$this->model_stok->hapus_bahan_masuk($id);
 //        $this->session->set_flashdata('crud','Berhasil Di Hapus');
 //        redirect('admin/bahan-masuk');
	// }

//////////////////////////////////////////////// menu laporan////////////////////////////////////////

		public function v_laporan()
	{
		$this->load->view('admin/menu/laporan');
	}

	public function detail_laporan()
	{	
		$menu = $this->input->get('laporan',TRUE);
		// var_dump($menu);
		if ($menu == 'laporan-masuk')
		{	
			sleep(1);
			$data['masuk']=$this->model_stok->semua_bahan_masuk();
	        $this->load->view('admin/menu/detail_masuk', $data);
		}

		if ($menu == "laporan-keluar")
		{
			sleep(1);
			$data['keluar']=$this->model_stok->semua_bahan_keluar();
	        $this->load->view('admin/menu/detail_laporan', $data);
		}
	}


}

/* End of file C_admin.php */
/* Location: ./application/controllers/C_admin.php */