<?php

require APPPATH . '/libraries/REST_Controller.php';

class peminjaman extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    // show data 
    function index_get() {
        $id_admin = $this->get('id_admin');
        if ($id_admin == '') {
            $admin = $this->db->get('tbl_admin')->result();
        } else {
            $this->db->where('id_admin', $id_admin);
            $admin = $this->db->get('tbl_admin')->result();
        }
        $this->response($admin, 200);
    }

    // insert new data
    function index_post() {
        $data = array(
                    'id_admin'           => $this->post('id_admin'),
                    'username_admin'          => $this->post('username_admin'),
                    'password_admin'    => $this->post('username_admin'),
					'email_admin'    => $this->post('email_admin'),
                    'gambar_admin'        => $this->post('gambar_admin'));
        $insert = $this->db->insert('tbl_admin', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // update data 
    function index_put() {
        $id_admin = $this->put('id_admin');
        $data = array(
                    'id_admin'       => $this->put('id_admin'),
                    'username_admin'      => $this->put('username_admin'),
                    'password_admin'=> $this->put('password_admin'),
					'email_admin'=> $this->put('email_admin'),
                    'gambar_admin'    => $this->put('gambar_admin'));
        $this->db->where('id_admin', $id_peminjaman);
        $update = $this->db->update('admin', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // delete 
    function index_delete() {
        $id_admin = $this->delete('id_admin');
        $this->db->where('id_admin', $id_peminjaman);
        $delete = $this->db->delete('admin');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}