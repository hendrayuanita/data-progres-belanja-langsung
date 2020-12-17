<?php
Class Progress extends CI_Controller{

var $API ="";

function __construct() {
parent::__construct();
$this->load->library('form_validation');
$this->load->helper('url','form');
$this->load->library('session');
$this->load->model('admin_model');
$this->API="http://localhost/server_skpd/index.php";
}

// Login 
function index(){
	$this->load->view('progress/search_progress');
}
	
public function tambahpage(){
	$this->load->view('admin/tambah_admin_view.php');
}

public function editpage($id){
	$where = array('admin_id' => $id);
	$data['admin'] = $this->admin_model->edit_data($where,'tbl_admin')->result();
	$this->load->view('admin/edit_admin_view.php', $data);
	}	

public function search(){
	$progress_bulan = $this->input->post('progress_bulan');
	$progress_tahun = $this->input->post('progress_tahun');
	$data['bulan'] = $progress_bulan;
	$data['tahun'] = $progress_tahun;
	$data['progress']=$this->admin_model->get_product_keyword($progress_bulan,$progress_tahun);
	$this->load->view('progress/list_progress',$data);
	}	
}

