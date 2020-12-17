<?php

require APPPATH . '/libraries/REST_Controller.php';

class admin extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    // show data 
    function index_get() {
        $admin_id = $this->get('admin_id');
        if ($admin_id == '') {
            $admin = $this->db->get('tbl_admin')->result();
        } else {
            $this->db->where('admin_id', $admin_id);
            $admin = $this->db->get('tbl_admin')->result();
        }
        $this->response($admin, 200);
    }

    // insert new data
    function index_post() {
        $data = array(
                'admin_email'        => $this->post('admin_email'),
                'admin_password'   	 => $this->post('admin_password'),
				'admin_nama'   		 => $this->post('admin_nama'),
				'admin_nomor_telp'   => $this->post('admin_nomor_telp'),
                'admin_gambar'       => $this->post('admin_gambar'));
        $insert = $this->db->insert('tbl_admin', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // update data 
    function index_put() {
        $admin_id = $this->put('admin_id');
        $data = array(
                    'admin_id'       => $this->put('admin_id'),
                    'admin_email'      => $this->put('admin_email'),
                    'admin_password'	=> $this->put('admin_password'),
					'admin_nama'	=> $this->put('admin_nama'),
					'admin_nomor_telp'	=> $this->put('admin_nomor_telp'),
					'admin_gambar'	=> $this->put('admin_gambar'));
        $this->db->where('admin_id', $admin_id);
        $update = $this->db->update('tbl_admin', $data);
		/* if($data['admin_gambar']!==NULL){
		$data = array(
					'admin_gambar'	=> $this->put('admin_gambar'));
        $this->db->where('admin_id', $admin_id);
        $update = $this->db->update('tbl_admin', $data);
		} */
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // delete 
    function index_delete() {
        $admin_id = $this->delete('admin_id');
        $this->db->where('admin_id', $admin_id);		
        $delete = $this->db->delete('tbl_admin');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}