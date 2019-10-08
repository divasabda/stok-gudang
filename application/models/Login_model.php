<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	function login($username,$password){
		$query=$this->db->query("SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1");
		return $query;
	}


	// //cek user dan password anggota
	// function auth_owner($username,$password){
	// 	$query=$this->db->query("SELECT * FROM user WHERE user_anggota='$username' AND pass_anggota=MD5('$password') LIMIT 1");
	// 	return $query;
	// }	

}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */