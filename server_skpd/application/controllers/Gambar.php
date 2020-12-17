<?php

require APPPATH . '/libraries/REST_Controller.php';

class Gambar extends REST_Controller {
	
	public function __construct($config = 'rest'){
		parent::__construct($config);
	}
	
	// show data 
    function index_get() {
        $id_gambar = $this->get('id_gambar');
        if ($id_gambar == '') {
			$this->db->order_by('view_gambar DESC');
            $gambar = $this->db->get('tbl_gambar')->result();
        } else {
            $this->db->where('id_gambar', $id_gambar);
			
            $gambar = $this->db->get('tbl_gambar')->result();
        }
        $this->response($gambar, 200);
    }
	
	 // insert new data
    function index_post() {
        $data = array(
                'nama_gambar'          => $this->post('nama_gambar'),
                'judul_gambar'    => $this->post('judul_gambar'),
				'deskripsi_gambar'    => $this->post('deskripsi_gambar'),
				'tanggal_gambar'    => date('Y-m-d'),
                'id_user'        => $this->post('id_user'));
        $insert = $this->db->insert('tbl_gambar', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}