<?php
Class Pengeluaran extends CI_Controller{

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
$data['pengeluaran'] = json_decode($this->curl->simple_get($this->API.'/pengeluaran'));
$this->load->view('pengeluaran/list_pengeluaran',$data);
}

	public function pengeluaranpage(){
	$data['pengeluaran'] = json_decode($this->curl->simple_get($this->API.'/pengeluaran'));
	$this->load->view('pengeluaran/list_pengeluaran',$data);
	}
	
	public function tambahpage(){
        $this->load->view('pengeluaran/tambah_pengeluaran_view.php');
	}
	
	//FUNGSI TAMBAH
	public function Create()
	{
	 	$this->form_validation->set_rules('pengeluaran_nominal','pengeluaran_nominal','trim|required');
		
	 if($this->form_validation->run()==FALSE)
	 {
	 	$this->load->view('pengeluaran/tambah_pengeluaran_view');
	 }
	 else
	 {
		//mengambil data di form
		$data = array(
		'skpd_nama'=>$this->input->post('skpd_nama'),
		'pengeluaran_nominal'=>$this->input->post('pengeluaran_nominal'),
		'pengeluaran_tgl'=>$this->input->post('pengeluaran_tgl'),
		'pengeluaran_added_by'=>$this->input->post('pengeluaran_added_by'));
		$insert =$this->curl->simple_post($this->API.'/pengeluaran', $data, array(CURLOPT_BUFFERSIZE => 10)); 
		if($insert)
		{
		echo "<script>alert('Data Berhasil Dimasukkan')</script>";
		$data['pengeluaran'] = json_decode($this->curl->simple_get($this->API.'/pengeluaran'));
		$this->load->view('pengeluaran/list_pengeluaran',$data);
		}
		else
		{
		echo "<script>alert('Data Gagal Dimasukkan')</script>";
		$this->load->view('pengeluaran/tambah_pengeluaran_view');
		}
		
		}
	}

// edit data 
function edit(){
		//mengambil data di form
		$data['pengeluaran_id']      = set_value('pengeluaran_id');
		$data['skpd_nama']      = set_value('skpd_nama');
		$data['pengeluaran_nominal']      = set_value('pengeluaran_nominal');
		$data['pengeluaran_tgl']      = set_value('pengeluaran_tgl');
		$data['pengeluaran_added_by']      = set_value('pengeluaran_added_by');
		$update = $this->curl->simple_put($this->API.'/pengeluaran', $data, array(CURLOPT_BUFFERSIZE => 10));
			
		if($update)
		{
		echo "<script>alert('Update Data Berhasil ! $update')</script>";
		$this->load->view('pengeluaran/edit_pengeluaran_sukses');
		}
		else
		{
		echo "<script>alert('Update Data Gagal')</script>";
		$this->load->view('pengeluaran/tambah_pengeluaran_view');
		}
	}

// delete data 
function delete($pengeluaran_id){
			if(empty($pengeluaran_id))
			{
				redirect('pengeluaran/pengeluaranpage');
			}
			else
			{
				$delete =$this->curl->simple_delete($this->API.'/pengeluaran', array('pengeluaran_id'=>$pengeluaran_id), array(CURLOPT_BUFFERSIZE => 10)); 
				if($delete)
				{
					echo "<script>alert('Data Berhasil Dihapus')</script>";
					redirect('pengeluaran/pengeluaranpage');
				}
				else
				{
					echo "<script>alert('Data Gagal Dihapus')</script>";
					redirect('pengeluaran/pengeluaranpage');
				}
			}
}

public function editpage($id){
	
		$where = array('pengeluaran_id' => $id);
		$data['pengeluaran'] = $this->admin_model->edit_data_pengeluaran($where,'tbl_pengeluaran')->result();
        $this->load->view('pengeluaran/edit_pengeluaran_view.php', $data);
	}		
}