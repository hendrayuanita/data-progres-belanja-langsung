<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	
	public function readadmin(){
		$query=$this->db->get('tbl_admin');
		return $query->result();
	}
	
	public function gambar($id)
	{
		$this->db->where('admin_id',$id);
		return $this->db->get('tbl_admin')->row();
	}
	
	public function login_user($email,$password){

	$this->db->select('*');
	$this->db->from('tbl_admin');
	$this->db->where('admin_email',$email);
	$this->db->where('admin_password',$password);

	if($query=$this->db->get())
	{
      return $query->row_array();
	}
	else{
		return false;
	}

	}
	
	 public function insertadmin($data,$table)
	 {
	 	$this->db->insert($table,$data);
	 }

	public function getadmin($id)
	{
		$this->db->where('id_admin',$id);
		$query=$this->db->get('id_admin');
		return $query->result();	 
	}
	
	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	
	function edit_data($where,$table){		
	return $this->db->get_where($table,$where);
}

	function edit_data_skpd($where,$table){		
	return $this->db->get_where($table,$where);
}

public function get_product_keyword($progress_bulan,$progress_tahun)
{
$query = $this->db->query("SELECT * FROM tbl_pengeluaran WHERE MONTHNAME(pengeluaran_tgl) = '$progress_bulan' AND YEAR(pengeluaran_tgl) = $progress_tahun;");
return $query->result();
}

function edit_data_pengeluaran($where,$table){		
	return $this->db->get_where($table,$where);
}

	public function delete($id)
	{
		$this->db->where('id_admin',$id);
		$this->db->delete('tbl_admin');
	}
}

/* End of file event_model.php */
/* Location: ./application/models/event_model.php */