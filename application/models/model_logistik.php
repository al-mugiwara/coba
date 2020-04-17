<?php 

class Model_logistik extends CI_Model
{ 

	//model digunakan untuk menghubungkan sistem ke database
	
	function data_barang(){
		return $this->db->query("SELECT * FROM data_barang,data_persediaan,data_supplier WHERE data_barang.kode_barang = data_persediaan.kode_barang AND data_barang.id_supplier = data_supplier.id_supplier ORDER BY data_barang.nama_barang ASC");//menjalanakan query untuk mengambil tabel data_barang
	}
	function kering($jenis){
		return $this->db->query("SELECT * FROM data_barang,data_persediaan,data_supplier WHERE data_barang.kode_barang = data_persediaan.kode_barang AND data_barang.id_supplier = data_supplier.id_supplier AND data_barang.jenis_barang='$jenis' ORDER BY data_barang.nama_barang ASC");
	}

	function jml_barang($where){
		return $this->db->query("SELECT * FROM data_barang WHERE jenis_barang = '$where'");
	}

	function barang_simpan($data){
		$this->db->insert('data_barang',$data);
	}

	function persediaan_simpan($data2){
		$this->db->insert('data_persediaan',$data2);
	}

	function update_dt($id_detail,$jumlah){
		$this->db->where('id_detail',$id_detail);
		$this->db->update('barang_detail',$jumlah);
	}

	function hapus_barang($kode_barang){
		$this->db->where('kode_barang',$kode_barang);
		$this->db->delete('data_barang');
	}

	function hapus_persediaan($kode_barang){
		$this->db->where('kode_barang',$kode_barang);
		$this->db->delete('data_persediaan');
	}

	function edit_barang($kode_barang){
		$this->db->from('data_barang');
		$this->db->where('kode_barang',$kode_barang);
		$query = $this->db->get();
		return $query->row_array();
	}

	function edit_persediaan($id_persediaan){
		$this->db->from('data_persediaan');
		$this->db->where('id_persediaan',$id_persediaan);
		$query = $this->db->get();
		return $query->row_array();
	}

	function update_barang($kode_barang,$data){
		$this->db->where('kode_barang',$kode_barang);
		$this->db->update('data_barang',$data);
	}

	function update_persediaan($id_persediaan,$kode_barang){
		$this->db->where('id_persediaan',$id_persediaan);
		$this->db->update('data_persediaan',$kode_barang);
	}

	function barang(){
		return $this->db->query("SELECT * FROM data_barang ORDER BY nama_barang ASC")->result_array();
	}

	function barang_where($where){
		return $this->db->query("SELECT * FROM data_barang WHERE jenis_barang='$where' ORDER BY nama_barang ASC")->result_array();
	}

	function input_masuk($data){
		$this->db->insert('barang_masuk',$data);
	}

	function laporan_fifo($data){
		$this->db->insert('laporan_fifo',$data);
	}

	function input_detail($data){
		$this->db->insert('barang_detail',$data);
	}
	function update_detail($id_detail,$data){
		$this->db->where('id_detail',$id_detail);
		$this->db->update('barang_detail',$data);
	}

	function input_persediaan($kode_barang,$data2){
		$this->db->where('kode_barang',$kode_barang);
		$this->db->update('data_persediaan',$data2);
	}

	function masuk(){
		return $this->db->query("SELECT * FROM barang_masuk,data_barang WHERE barang_masuk.kode_barang = data_barang.kode_barang ORDER BY barang_masuk.tgl DESC")->result_array();
	}
	
	function keluar($data){
		$this->db->insert('barang_keluar',$data);
	}

	function data_keluar(){
		return $this->db->query("SELECT * FROM barang_keluar,data_barang WHERE barang_keluar.kode_barang = data_barang.kode_barang ORDER BY barang_keluar.tgl DESC");
	}

	function cari_laporan($tgl_awal,$tgl_akhir,$jenis){
		return $this->db->query("SELECT * FROM $jenis,data_barang WHERE $jenis.kode_barang = data_barang.kode_barang AND tgl BETWEEN '".$tgl_awal."'"." AND "."'".$tgl_akhir."'");
	}

	function cari_laporan_fifo($tgl_awal, $tgl_akhir,$jenis,$tgle){
		return $this->db->query("SELECT * FROM $jenis,data_barang WHERE $jenis.kode_barang = data_barang.kode_barang AND $tgle BETWEEN '".$tgl_awal."'"." AND "."'".$tgl_akhir."'");
	}

	function input_pengajuan($data){
		$this->db->insert('data_pengajuan',$data);
	}

	function pengajuan_selesai($kode_barang){
		$this->db->query("INSERT INTO pengajuan_selesai(SELECT 	tgl_pengajuan,kode_barang,jml_tersisa,jml_ajuan,id_supplier FROM data_pengajuan WHERE kode_barang='$kode_barang')");
		$this->db->where('kode_barang',$kode_barang);
		$this->db->delete('data_pengajuan');
	}

	function input_supplier($data2){
		$this->db->insert('data_supplier',$data2);
	}

	function data_supplier($where){
		return $this->db->query("SELECT * FROM data_supplier $where");
	}

	function hapus_supplier($id_supplier){
		$this->db->where('id_supplier',$id_supplier);
		$this->db->delete('data_supplier');

	}
	function update_supplier($id_supplier,$data2){
		$this->db->where('id_supplier',$id_supplier);
		$this->db->update('data_supplier',$data2);
	}
	function cetak_data_barang(){
		return $this->db->query("SELECT * FROM data_barang,data_persediaan,data_supplier WHERE data_barang.kode_barang=data_persediaan.kode_barang AND data_barang.id_supplier = data_supplier.id_supplier");
	}


	function update_kode($cek,$data){
		 $this->db->where('kode_barang',$cek);
		 
		 $this->db->update('data_barang',$data);
		
	}

	function update_kode2($cek,$data){
		 $this->db->where('kode_barang',$cek);
		
		 $this->db->update('data_persediaan',$data);
		
	}
	


	

	
}
 ?>