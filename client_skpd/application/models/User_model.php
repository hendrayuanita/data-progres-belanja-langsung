<?php
class User_model extends CI_model{

	public function register_user($user)
	{
		$this->db->insert('user', $user);
	}
	
	public function login_user($username,$password)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('username_user',$username);
		$this->db->where('password_user',$password);

		if($query=$this->db->get())
		{
		return $query->row_array();
		}
		else
		{
		return false;
		}
	}
	
	public function readadmin(){
		$query=$this->db->get('tbl_user');
		return $query->result();
	}
	
	public function update_view($id){
		$query=$this->db->query("UPDATE tbl_gambar SET view_gambar=view_gambar+1 WHERE id_gambar=$id");
	}
	
	function edit_data($id){	
	$this->db->select('*');
	$this->db->from('tbl_gambar g');
	$this->db->join('tbl_user u','g.id_user = u.id_user');
	$this->db->where('g.id_gambar', $id);
	
	return $this->db->get();
}
	
	public function readgambar(){
		$query=$this->db->get('tbl_gambar');
		return $query->result();
	}

}
?>
