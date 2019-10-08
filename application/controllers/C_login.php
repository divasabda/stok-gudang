<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index()
	{
		$this->load->view('login');	
	}

	public function auth()
	{
		// menerima data user dan password yang di tampung pada $username dan $password
		$username=$this->input->post('username',TRUE);
        $password=$this->input->post('password',TRUE);

        // cek login username dan password
        $cek_login=$this->login_model->login($username,$password);

		// //jika login admin
		// jika row data ada maka akan di simpan pada aray $data_login
        if($cek_login->num_rows() > 0){ 
				$data_login=$cek_login->row_array();
        		$this->session->set_userdata('masuk',TRUE);
		         if($data_login['level_user']=='1'){ //Akses admin
		            $this->session->set_userdata('akses','1');
		            $this->session->set_userdata('id_admin',$data_login['id_admin']);
					$this->session->set_userdata('ses_nama',$data_login['username']);
		            redirect('admin/home');

		         }else{ //akses owner
		            $this->session->set_userdata('akses','2');
		            $this->session->set_userdata('id_admin',$data_login['id_admin']);
		            $this->session->set_userdata('ses_nama',$data_login['username']);
		            redirect('owner/home');
		         }
		     }

       			else{
					 // jika username dan password tidak ditemukan atau salah
							$url=base_url();
							$this->session->set_flashdata('gagal','Username Atau Password Salah');
							redirect($url);
					
       			}

	}

	public function logout(){
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    }
}

/* End of file C_login.php */
/* Location: ./application/controllers/C_login.php */