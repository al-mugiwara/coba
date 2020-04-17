<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$username  = $this->session->userdata('username'); //mengambil session username
		$password  = $this->session->userdata('password');//mengambil session password
		$login_hash = $this->session->userdata('login_hash');//mengambil session login_hash(hak akses)
		if($username == NULL || $password == NULL){ 
			//cek username, password dan hak akses jika username/password kosong atau hak akses bukan administrator maka redirect ke controller login function logout
			redirect('Login/logout');
		}
		
		$this->load->model('model_admin','ma'); //memanggil model_admin dengan nama alias ma
	}

	function setting_user(){
		$id_username = $this->session->userdata('id_username');
		$data['edit'] = $this->ma->edit_pengguna($id_username); //mengambil data pengguna dengan id yang dipilih
		$data['judul'] = "Setting User Data";
		$this->template->load('template','setting',$data);
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
		
		
		$this->ma->update_user($id_username,$data);
		redirect('Login/logout');
	}



}

 ?>
