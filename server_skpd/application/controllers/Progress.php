<?php

require APPPATH . '/libraries/REST_Controller.php';

class progress extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    // show data 
    function index_get() {
        $skpd_id = $this->get('skpd_id');
        if ($skpd_id == '') 
		{
            $skpd = $this->db->get('tbl_skpd')->result();
        }
		else 
		{
            $this->db->where('skpd_id', $skpd_id);
            $skpd = $this->db->get('tbl_skpd')->result();
        }
        $this->response($skpd, 200);
    }

    // insert new data
    function index_post() {
        $data = array(
                'skpd_nama'        => $this->post('skpd_nama'),
                'skpd_pagu'   	 => $this->post('skpd_pagu'),
				'skpd_added_by'   		 => $this->post('skpd_added_by'),
				'skpd_color'   => $this->post('skpd_color'));
        $insert = $this->db->insert('tbl_skpd', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // update data 
    function index_put() {
        $skpd_id = $this->put('skpd_id');
        $data = array(
                'skpd_id'       => $this->put('skpd_id'),
				'skpd_nama'        => $this->put('skpd_nama'),
				'skpd_pagu'   	 => $this->put('skpd_pagu'),
				'skpd_added_by'   	=> $this->put('skpd_added_by'),
				'skpd_color'   => $this->put('skpd_color'));
        $this->db->where('skpd_id', $skpd_id);
        $update = $this->db->update('tbl_skpd', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // delete 
    function index_delete() {
        $skpd_id = $this->delete('skpd_id');
        $this->db->where('skpd_id', $skpd_id);		
        $delete = $this->db->delete('tbl_skpd');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}