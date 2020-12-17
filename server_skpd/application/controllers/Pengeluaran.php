<?php

require APPPATH . '/libraries/REST_Controller.php';

class pengeluaran extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    // show data 
    function index_get() {
        $pengeluaran_id = $this->get('pengeluaran_id');
        if ($pengeluaran_id == '') {
            $pengeluaran = $this->db->get('tbl_pengeluaran')->result();
        } else {
            $this->db->where('pengeluaran_id', $pengeluaran_id);
            $pengeluaran = $this->db->get('tbl_pengeluaran')->result();
        }
        $this->response($pengeluaran, 200);
    }

    // insert new data
    function index_post() {
        $data = array(
                'skpd_nama'        => $this->post('skpd_nama'),
                'pengeluaran_nominal'   	 => $this->post('pengeluaran_nominal'),
				'pengeluaran_tgl'   		 => $this->post('pengeluaran_tgl'),
				'pengeluaran_added_by'   => $this->post('pengeluaran_added_by'));
        $insert = $this->db->insert('tbl_pengeluaran', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // update data 
    function index_put() {
        $pengeluaran_id = $this->put('pengeluaran_id');
        $data = array(
                    'pengeluaran_id'       => $this->put('pengeluaran_id'),
                    'skpd_nama'      => $this->put('skpd_nama'),
                    'pengeluaran_nominal'	=> $this->put('pengeluaran_nominal'),
					'pengeluaran_tgl'	=> $this->put('pengeluaran_tgl'),
					'pengeluaran_added_by'	=> $this->put('pengeluaran_added_by'));
        $this->db->where('pengeluaran_id', $pengeluaran_id);
        $update = $this->db->update('tbl_pengeluaran', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // delete 
    function index_delete() {
        $pengeluaran_id = $this->delete('pengeluaran_id');
        $this->db->where('pengeluaran_id', $pengeluaran_id);		
        $delete = $this->db->delete('tbl_pengeluaran');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}