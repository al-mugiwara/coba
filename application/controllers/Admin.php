<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
//controller utk menghubungkan antara view dan model
	function __construct(){
		parent::__construct();
		$username  = $this->session->userdata('username'); //mengambil session username
		$password  = $this->session->userdata('password');//mengambil session password
		$login_hash = $this->session->userdata('login_hash');//mengambil session login_hash(hak akses)
		if($username == NULL || $password == NULL || $login_hash != 'administrator'){ 
			//cek username, password dan hak akses jika username/password kosong atau hak akses bukan administrator maka redirect ke controller login function logout
			redirect('Login/logout');
		}
		
		$this->load->model('model_admin','ma'); //memanggil model_admin dengan nama alias ma
	}
	
	function index(){
		//function yang pertama dijalankan
		$data['judul'] = "Dashboard"; //$data merupakan variabel array dengan isi Dashboard
		$data['jml_pengguna'] = $this->ma->jml_pengguna()->num_rows(); // meload model_admin dan function jml_pengguna num_rows digunakan untuk menghitung jml_data
		$data['sub_judul'] ="Sistem Informasi Persediaan Bahan Makanan Rumah Sakit Karomah Holistic";
		$this->template->load('template','admin/dashboard',$data);//meload template, lalu admin/dashboard merupakan content, $data merupakan variabel array
	}

	function user_management(){
		$data['judul'] = "User Management";
		$data['jml_pengguna'] = $this->ma->jml_pengguna()->num_rows();
		$data['pengguna'] = $this->ma->jml_pengguna()->result_array();//meload model_admin dan function jml_pengguna result_array digunakan untuk memanggil data dalam bentuk array
		$this->template->load('template','admin/user',$data);
	}

	function user_save(){
		$data['username'] = $this->input->post('username'); //mengambil inputan dari form dengan name username
		$username = $this->input->post('username'); //mengambil inputan dari form dengan name username
		$data['password'] = md5($this->input->post('password'));
		$data['login_hash'] = $this->input->post('login_hash');
		$cek = $this->db->query("SELECT * FROM user_login WHERE username= '$username'")->num_rows();
		if($cek > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger">Maaf username dan password salah</div>');
				redirect('admin/user_management');
		}else{
			$this->ma->insert_user($data); //menyimpan data ke database dengan function insert_user yang ada di model_admin
		redirect('admin/user_management'); //kembali ke controller admin function user_management
		}
		
	}	

	function delete_user(){
		$id_username = $this->input->post('id_username');
		$this->ma->delete_user($id_username);
		echo json_encode(array("status"=>TRUE));
	}

	function edit_user($id_username){
		$data['edit'] = $this->ma->edit_pengguna($id_username); //mengambil data pengguna dengan id yang dipilih
		$data['judul'] = "Edit User";
		$this->template->load('template','admin/edit_user',$data);
	}

	function save_edit(){
		$id_username = $this->input->post('id_username');
		$cek = $this->ma->edit_pengguna($id_username);
		$data['username'] = $this->input->post('username');
		if($this->input->post('password') != $cek['password']){//mengecek apakah passwordnya diubah?
			$data['password'] = md5($this->input->post('password'));
		}else{
			$data['password'] = $this->input->post('password');
		}
		
		$data['login_hash'] = $this->input->post('hak_akses');
		$this->ma->update_user($id_username,$data);
		redirect('admin/user_management');
	}

}

 ?>
