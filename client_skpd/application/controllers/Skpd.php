<?php
Class Skpd extends CI_Controller{

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
$data['skpd'] = json_decode($this->curl->simple_get($this->API.'/skpd'));
$this->load->view('skpd/list_skpd',$data);
}

	public function skpdpage(){
	$data['skpd'] = json_decode($this->curl->simple_get($this->API.'/skpd'));
	$this->load->view('skpd/list_skpd',$data);
	}
	
	public function tambahpage(){
        $this->load->view('skpd/tambah_skpd_view.php');
	}
	
	//FUNGSI TAMBAH
	public function Create()
	{
	 	$this->form_validation->set_rules('skpd_nama','skpd_nama','trim|required');
	 	$this->form_validation->set_rules('skpd_pagu','skpd_pagu','trim|required');
		$this->form_validation->set_rules('skpd_color','skpd_color','trim|required');
		
	 if($this->form_validation->run()==FALSE)
	 {
	 	$this->load->view('skpd/tambah_skpd_view');
	 }
	 else
	 {
		//mengambil data di form
		$data = array(
		'skpd_nama'=>$this->input->post('skpd_nama'),
		'skpd_pagu'=>$this->input->post('skpd_pagu'),
		'skpd_added_by'=>$this->input->post('skpd_added_by'),
		'skpd_color'=>$this->input->post('skpd_color'));
		$insert =$this->curl->simple_post($this->API.'/skpd', $data, array(CURLOPT_BUFFERSIZE => 10)); 
		if($insert)
		{
		echo "<script>alert('Data Berhasil Dimasukkan')</script>";
		$data['skpd'] = json_decode($this->curl->simple_get($this->API.'/skpd'));
		$this->load->view('skpd/list_skpd',$data);
		}
		else
		{
		echo "<script>alert('Data Gagal Dimasukkan')</script>";
		$this->load->view('skpd/tambah_skpd_view');
		}
		
		}
	}

// edit data 
function edit(){
		//mengambil data di form
		$data['skpd_id']      = set_value('skpd_id');
		$data['skpd_nama']      = set_value('skpd_nama');
		$data['skpd_pagu']      = set_value('skpd_pagu');
		$data['skpd_added_by']      = set_value('skpd_added_by');
		$data['skpd_color']   = set_value('skpd_color');
		$update = $this->curl->simple_put($this->API.'/skpd', $data, array(CURLOPT_BUFFERSIZE => 10));
			
		if($update)
		{
		echo "<script>alert('Update Data Berhasil $update')</script>";
		$this->load->view('skpd/edit_skpd_sukses',$update);
		}
		else
		{
		echo "<script>alert('Update Data Gagal')</script>";
		$this->load->view('skpd/tambah_skpd_view');
		}
	}

// delete data 
function delete($skpd_id){
			if(empty($skpd_id))
			{
				redirect('skpd/skpdpage');
			}
			else
			{
				$delete =$this->curl->simple_delete($this->API.'/skpd', array('skpd_id'=>$skpd_id), array(CURLOPT_BUFFERSIZE => 10)); 
				if($delete)
				{
					echo "<script>alert('Data Berhasil Dihapus')</script>";
					redirect('skpd/skpdpage');
				}
				else
				{
					echo "<script>alert('Data Gagal Dihapus')</script>";
					redirect('skpd/skpdpage');
				}
			}
}

public function editpage($id){
	
		$where = array('skpd_id' => $id);
		$data['skpd'] = $this->admin_model->edit_data_skpd($where,'tbl_skpd')->result();
        $this->load->view('skpd/edit_skpd_view.php', $data);
	}		
}