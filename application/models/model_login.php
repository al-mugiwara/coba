<?php 

class Model_login extends CI_Model
{
	

	function get_login($username,$password){

		$password = hash("MD5",$password);
		$sql = "SELECT * FROM user_login WHERE username= '$username' AND password= '$password' ";
		$query = $this->db->query($sql);
		$result = $query->row();
		return $result;
	}

	
}
 ?>