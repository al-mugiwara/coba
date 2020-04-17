<?php 

	class Login extends CI_Controller
	{

		function __construct(){
			parent::__construct();
			$this->load->model('Model_login','ml');
		}
		
		function Index(){
			if(isset($_POST['submit'])){

				$username = $this->input->post('username',true);
				$password = $this->input->post('password',true);


				$this->form_validation->set_rules('username','username','required');
				$this->form_validation->set_rules('password','password','required');

			if(!$this->form_validation->run()){

				echo"<script>alert('Harus Diisi')</script>";
				redirect('Login');
				
			}else{
					$result = $this->ml->get_login($username,$password);

					if($result){
						$sdata['username'] = $result->username;
						$sdata['password'] = $result->password;
						$sdata['login_hash'] = $result->login_hash;
						$sdata['id_username'] = $result->id_username;
						$this->session->set_userdata($sdata);
						if($sdata['login_hash'] == 'administrator'){
							redirect('admin');
						}else if($sdata['login_hash'] == 'bagian_gudang'){
							redirect('Logistik');
						}else if($sdata['login_hash'] == 'bagian_keuangan'){
							redirect('Keuangan');
						}else if($sdata['login_hash'] == "ahli_gizi"){
							redirect('Ahli_gizi');
						}
						
					}else{
						$this->session->set_flashdata('pesan','<div class="alert alert-danger">Maaf username dan password salah</div>');
						redirect('Login');
					}

			}

			}else{
				$this->load->view('Login');
			}			
		}

		function logout(){
			$this->session->sess_destroy();
			redirect('Login');
		}

		

	}
 ?>