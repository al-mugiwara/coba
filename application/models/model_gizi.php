<?php 

class Model_gizi extends CI_Model
{ 

	//model digunakan untuk menghubungkan sistem ke database
	
	function data_pengajuan($where){
		return $this->db->query("SELECT * FROM data_pengajuan $where");//menjalanakan query untuk mengambil tabel user_login
	}

	function update_pengajuan($id_pengajuan,$data2){
		$this->db->where('id_pengajuan',$id_pengajuan);
		$this->db->update('data_pengajuan',$data2);
	}

	

	
}
 ?>