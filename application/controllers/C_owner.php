<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_owner extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_stok');

		if($this->session->userdata('masuk') != TRUE)
		{
			$url=base_url();
			redirect($url);
		}
	}

	public function index()
	{
		$this->load->view('owner/home');	
	}

}

/* End of file C_owner.php */
/* Location: ./application/controllers/C_owner.php */