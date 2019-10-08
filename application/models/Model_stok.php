<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_stok extends CI_Model {


//////////////////////////// model bahan //////////////////////////////////

	public function semua_bahan()
	{
		$result = $this->db->get('bahan');
		return $result;
	}

	public function tambah_bahan($data)
	{
		$this->db->insert('bahan', $data);
	}

	public function cari_id($id)
	{
		$query = $this->db->get_where('bahan', array('id_bahan' => $id));
		return $query;
	}

	public function update_bahan($data)
    {
        $this->db->where('id_bahan', $data['id_bahan']);
        $this->db->update('bahan', $data);
    }

    public function hapus_bahan($id)
    {
    	$this->db->where('id_bahan', $id); 
        $this->db->delete('bahan');
    }


//////////////////////////// model bahan masuk ////////////////////////////////// 


    public function semua_bahan_masuk()
    {

    	$this->db->select('*');
    	$this->db->from('laporan_masuk');
    	$this->db->join('bahan', 'bahan.id_bahan = laporan_masuk.id_bahan');
    	$result = $this->db->get();
    	return $result;

    }

    public function tambah_bahan_masuk($data)
    {
    	$this->db->insert('laporan_masuk', $data);
    }

	public function cari_id_masuk($id)
	{
		$query = $this->db->get_where('bahan', array('id_bahan' => $id));
		return $query->row();
	}

	// public function update_bahan_masuk($data)
 //    {
 //        $this->db->where('id_laporan_masuk', $data['id_laporan_masuk']);
 //        $this->db->update('laporan_masuk', $data);
 //    }

 //        public function hapus_bahan_masuk($id)
 //    {
 //    	$this->db->where('id_laporan_masuk', $id); 
 //        $this->db->delete('laporan_masuk');
 //    }

//////////////////////////// model bahan keluar //////////////////////////////////
    public function semua_bahan_keluar()
    {
    	$this->db->select('*');
    	$this->db->from('laporan_keluar');
    	$this->db->join('bahan', 'bahan.id_bahan = laporan_keluar.id_bahan');
    	$result = $this->db->get();
    	return $result;
    }

    public function tambah_bahan_keluar($data)
    {
    	$this->db->insert('laporan_keluar', $data);
    }

	// public function cari_id_keluar($id)
	// {
	// 	$query = $this->db->get_where('laporan_keluar', array('id_keluar' => $id));
	// 	return $query;
	// }

	// public function update_bahan_keluar($data)
 //    {
 //        $this->db->where('id_keluar', $data['id_bahan']);
 //        $this->db->update('laporan_masuk', $data);
 //    }

 //        public function hapus_bahan_keluar($id)
 //    {
 //    	$this->db->where('id_laporan_masuk', $id); 
 //        $this->db->delete('laporan_masuk');
 //    }



// mutasi////////

    public function mutasi($data)
    {
    	$this->db->insert('mutasi', $data);
    }

    // model laporan

	public function periode_semua_masuk($data)
	{
		$this->db->select('*'); 
		$this->db->from('laporan_masuk');
		$this->db->join('bahan', 'bahan.id_bahan = laporan_masuk.id_bahan');
		$this->db->where('tanggal_masuk >=',$data['a']);
		$this->db->where('tanggal_masuk <=',$data['b']);
		$result=$this->db->get();
		return $result;
	}

		public function periode_semua_keluar($data)
	{
		$this->db->select('*'); 
		$this->db->from('laporan_keluar');
		$this->db->join('bahan', 'bahan.id_bahan = laporan_keluar.id_bahan');
		$this->db->where('tanggal_keluar >=',$data['a']);
		$this->db->where('tanggal_keluar <=',$data['b']);
		$result=$this->db->get();
		return $result;
	}

	public function semua_mutasi()
	{
		$result = $this->db->get('mutasi');
		return $result;
	}

		public function periode_mutasi($data)
	{
		$this->db->select('*'); 
		$this->db->from('mutasi');
		$this->db->where('create_at >=',$data['a']);
		$this->db->where('create_at <=',$data['b']);
		$result=$this->db->get();
		return $result;
	}

}

/* End of file Model_stok.php */
/* Location: ./application/models/Model_stok.php */