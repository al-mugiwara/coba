<?php 

class Model_admin extends CI_Model
{ 

	//model digunakan untuk menghubungkan sistem ke database
	
	function jml_pengguna(){
		return $this->db->query("SELECT * FROM user_login");//menjalanakan query untuk mengambil tabel user_login
	}

	function insert_user($data){
		$this->db->insert('user_login',$data); //$this->db->insert untuk memasukkan data ke tabel $data merupakan data yang diinsert dlm bentuk array
	}

	function delete_user($id_username){
		$this->db->where('id_username',$id_username);
		$this->db->delete('user_login');
	}

	function edit_pengguna($id_username){
		return $this->db->query("SELECT * FROM user_login WHERE id_username= $id_username")->row_array();
	}

	function update_user($id_username,$data){
		$this->db->where('id_username',$id_username);
		$this->db->update('user_login',$data);
	}

	
}
 ?>