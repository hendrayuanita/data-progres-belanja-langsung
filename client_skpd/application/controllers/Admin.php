<?php
Class Admin extends CI_Controller{

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
$this->load->view('admin/login');
}

function login_user(){
		$user_login=array(
		'admin_email'=>$this->input->post('email'),
		'admin_password'=>$this->input->post('password'));

    $data=$this->admin_model->login_user($user_login['admin_email'],$user_login['admin_password']);
      if($data)
      {
		$this->session->set_userdata('isLogin',TRUE);
		$this->session->set_userdata('admin_id',$data['admin_id']);
        $this->session->set_userdata('email',$data['admin_email']);
        $this->session->set_userdata('password',$data['admin_password']);
		$this->session->set_userdata('nama',$data['admin_nama']);
		$this->session->set_userdata('gambar',$data['admin_gambar']);
		
		$data['admin']=$this->admin_model->readadmin();			
		echo "<script>alert('Welcome $data[admin_nama]')</script>";
		$this->load->view('admin/dashboard');
      }
      else{
		echo "<script>alert('Login Gagal \(O_o\) Cek username & Password')</script>";
        $this->load->view("admin/login");
		}
	}
	
	public function adminpage(){
	$data['admin'] = json_decode($this->curl->simple_get($this->API.'/admin'));
	$this->load->view('admin/list_admin',$data);
	}
	
	public function dashboard(){
	$this->load->view('admin/dashboard');
	}
	
	public function frontpage(){
	$this->load->view('front/main');
	}
	
	public function frontpagea(){
	$this->load->view('front/mains');
	}
	
	public function tambahpage(){
        $this->load->view('admin/tambah_admin_view.php');
		//redirect('admin/login.php', 'refresh');
	}
	
	public function user_logout(){

		$this->session->sess_destroy();
		redirect('admin','refresh');
		//redirect('admin/login.php', 'refresh');
	}

	//FUNGSI TAMBAH
	public function Create()
	{
	 	$this->form_validation->set_rules('admin_email','admin_email','trim|required');
	 	$this->form_validation->set_rules('admin_password','admin_password','trim|required');
		$this->form_validation->set_rules('admin_nomor_telp','admin_nomor_telp','trim|required');
		
	 if($this->form_validation->run()==FALSE)
	 {
	 	$this->load->view('admin/tambah_admin_view');
	 }
	 else
	 {
		//membuat konfigurasi
		$config = [
        'upload_path' => './assets/images/',
        'allowed_types' => 'gif|jpg|png',
        'max_size' => 3000, 'max_width' => 3000,
        'max_height' => 3000
		];
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('admin_gambar')) //jika gagal upload
		{
          $error = array('error' => $this->upload->display_errors()); //tampilkan error
          $this->load->view('admin/tambah_admin_gagal', $error);
		} else
		//jika berhasil upload
		{
        $file = $this->upload->data();
        
		//mengambil data di form
		$data = array(
		'admin_email'=>$this->input->post('admin_email'),
		'admin_password'=>$this->input->post('admin_password'),
		'admin_nama'=>$this->input->post('admin_nama'),
		'admin_nomor_telp'=>$this->input->post('admin_nomor_telp'),
		'admin_gambar' => $file['file_name']);
		$insert =$this->curl->simple_post($this->API.'/admin', $data, array(CURLOPT_BUFFERSIZE => 10)); 
		if($insert)
		{
		echo "<script>alert('Data Berhasil Dimasukkan')</script>";
		$data['admin'] = json_decode($this->curl->simple_get($this->API.'/admin'));
		$this->load->view('admin/list_admin',$data);
		}
		else
		{
		echo "<script>alert('Data Gagal Dimasukkan')</script>";
		$this->load->view('admin/tambah_admin_view');
		}
		
		}
	}
	}

// edit data 
function edit($id){
//membuat konfigurasi
		$gambar = $this->admin_model->gambar($id);
		if(isset($_FILES["admin_gambar"]["name"]))
		{
        //membuat konfigurasi
        $config = [
          'upload_path' => './assets/images/',
          'allowed_types' => 'gif|jpg|png',
          'max_size' => 3000, 'max_width' => 3000,
          'max_height' => 3000
        ];
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('admin_gambar')) //jika gagal upload
        {
            $error = array('error' => $this->upload->display_errors()); //tampilkan error
            $this->load->view('admin/tambah_admin_gagal', $error);
        } else
        //jika berhasil upload
        {
            $file = $this->upload->data();
			$removeImage = 'assets/images/'.$gambar->admin_gambar;
			$data['admin_gambar'] = $file['file_name'];
			if(file_exists($removeImage)) {
				unlink($removeImage); //menghapus gambar yang lama
			}
        }
		$this->load->view('admin/tambah_admin_gagal');
      }
	
			//mengambil data di form
			$data['admin_id']      = set_value('admin_id');
			$data['admin_email']      = set_value('admin_email');
			$data['admin_password']      = set_value('admin_password');
			$data['admin_nama']      = set_value('admin_nama');
			$data['admin_nomor_telp']   = set_value('admin_nomor_telp');
			$update = $this->curl->simple_put($this->API.'/admin', $data, array(CURLOPT_BUFFERSIZE => 10));
			
			if($update)
			{
			echo "<script>alert('Update Data Berhasil')</script>";
			$this->load->view('admin/edit_admin_sukses');
			}
			else
			{
			echo "<script>alert('Update Data Gagal')</script>";
			$this->load->view('admin/tambah_admin_view');
			}
	}

// delete data 
function delete($admin_id){
			if(empty($admin_id))
			{
				redirect('admin/adminpage');
			}
			else
			{
				$delete =$this->curl->simple_delete($this->API.'/admin', array('admin_id'=>$admin_id), array(CURLOPT_BUFFERSIZE => 10)); 
				if($delete)
				{
					echo "<script>alert('Data Berhasil Dihapus')</script>";
					redirect('admin/adminpage');
				}
				else
				{
					echo "<script>alert('Data Gagal Dihapus')</script>";
					redirect('admin/adminpage');
				}
			}
}

public function editpage($id){
	
		$where = array('admin_id' => $id);
		$data['admin'] = $this->admin_model->edit_data($where,'tbl_admin')->result();
        $this->load->view('admin/edit_admin_view.php', $data);
	}		
}