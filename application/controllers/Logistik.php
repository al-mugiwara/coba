<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Logistik extends CI_Controller
{
//controller utk menghubungkan antara view dan model
	function __construct(){
		parent::__construct();
		$username  = $this->session->userdata('username'); //mengambil session username
		$password  = $this->session->userdata('password');//mengambil session password
		$login_hash = $this->session->userdata('login_hash');//mengambil session login_hash(hak akses)
		if($username == NULL || $password == NULL || $login_hash != 'bagian_gudang'){ 
			//cek username, password dan hak akses jika username/password kosong atau hak akses bukan logistik maka redirect ke controller login function logout
			redirect('login/logout');
		}
		
		$this->load->model('model_logistik','ml'); //memanggil model_logistik dengan nama alias ml
		$this->load->model('model_gizi','mg');
		 $this->load->library(array('PHPExcel'));
		 $this->load->helper('tanggal');
	}

	
	function index(){
		//function yang pertama dijalankan
		$data['judul'] = "Dashboard"; //$data merupakan variabel array dengan isi Dashboard
		$data['sub_judul'] ="Sistem Informasi Persediaan Bahan Makanan Rumah Sakit Karomah Holistic";
		$data['jml_barang'] = $this->ml->data_barang()->num_rows();
		$data['cek_barang'] = $this->ml->data_barang()->result_array();
		// $data['afa'] = $this->db->query("SELECT * FROM barang_detail WHERE jumlah !=0 ORDER BY tgl_masuke ASC LIMIT 1")->result_array();

		$this->template->load('template','gudang/dashboard',$data);//meload template, lalu admin/dashboard merupakan content, $data merupakan variabel array
	}
	function sub_suplier(){
		$this->template->load('template','gudang/sub_suplier');
	}
	function pesan(){
		$this->template->load('template','gudang/pesan');//meload template, lalu admin/dashboard merupakan content, $data merupakan variabel array
	}

	function barang(){
		$data['judul'] = "Data Bahan Makanan"; 
		$data['sub_judul'] ="Sistem Informasi Persediaan Bahan Makanan Rumah Sakit Karomah Holistic";
		$data['barang'] = $this->ml->data_barang()->result_array();
		$data['data_supplier'] = $this->ml->data_supplier("")->result_array();
		$data['kode_barang'] = $this->ml->jml_barang("basah")->num_rows();
		$data['kodes_barang'] = $this->ml->jml_barang("kering")->num_rows();
		$this->template->load('template','gudang/barang',$data);
	}

	function barang_save(){
		$data['kode_barang'] = $this->input->post('kode_barang');
		$data['nama_barang'] = $this->input->post('nama_barang');
		$data['jenis_barang'] = $this->input->post('jenis_barang');
		$data['id_supplier'] = $this->input->post('supplier');
		$data['satuan'] = $this->input->post('satuan_barang');
		$data['jml_minimal'] = $this->input->post('jml_minimal');
		$data2['kode_barang'] = $this->input->post('kode_barang');
		
		$data2['masuk'] = 0;
		$data2['keluar'] = 0;
		
		$data2['stok_tersedia'] = 0;

		$this->load->library('ciqrcode'); //memanggil library qrcode
		$config['cacheable'] = true;
		$config['cachedir'] = 'assets/images/';
		$config['error_log'] = 'assets/images/';
		$config['imagedir'] = 'assets/images/';
		$config['quality'] = true;
		$config['size'] = '1024';
		$config['black'] = array(224,255,255);
		$config['white'] = array(70,130,180);
		$this->ciqrcode->initialize($config);

		$data['qrcode'] = $this->input->post('kode_barang').'.png';
		$params['data'] = $this->input->post('kode_barang');
		$params['level'] = 'H';
		$params['size'] = 10;
		$params['savename'] = FCPATH.$config['imagedir'].$data['qrcode'];
		$this->ciqrcode->generate($params);

		$this->ml->barang_simpan($data);
		$this->ml->persediaan_simpan($data2);

		redirect('logistik/barang');

	}

	function delete_barang(){
		$kode_barang = $this->input->post('kode_barang');
		//$barang = $this->db->query("SELECT * FROM data_barang WHERE kode_barang=".$this->input->post('kode_barang'))->row_array();
		//$kode_barang = $barang['kode_barang'];
		$c = substr($this->input->post('kode_barang'), 0,1);
		$this->ml->hapus_persediaan($kode_barang);
		$this->ml->hapus_barang($kode_barang);
		$kodbar = $this->db->query("SELECT * FROM data_barang WHERE kode_barang LIKE '%$c%'")->result_array();
		//	$data=0;
		foreach ($kodbar as $kd) {
		 $cek = substr($this->input->post('kode_barang'), 0,1);
			// if($cek == "B"){
			$kb = substr($this->input->post('kode_barang'),1);
			$data = substr($kd['kode_barang'], 1);

			if($data> $kb && $data != 1 && $cek=="B"){
				if($kb == 1){
					$kodenya = $data-1;
				$datane['kode_barang'] = "B".$kodenya;	
				}else if($kb>=1){
					if($kb == 2){
						$datane['kode_barang'] = "B2";
					}
					$kodenya = $data-1;
					$datane['kode_barang'] = "B".$kodenya;
				}
				if($kd['kode_barang']!="B1"){
					$this->ml->update_kode($kd['kode_barang'],$datane);	
					$this->ml->update_kode2($kd['kode_barang'],$datane);	
				}
				
			}else if($data> $kb && $data != 1 && $cek=="K"){
				if($kb == 1){
					$kodenya = $data-1;
				$datane['kode_barang'] = "K".$kodenya;	
				}else if($kb>=1){
					if($kb == 2){
						$datane['kode_barang'] = "K2";
					}
					
					$kodenya = $data-1;
					$datane['kode_barang'] = "K".$kodenya;
				}
				if($kd['kode_barang']!="K1"){
					$this->ml->update_kode($kd['kode_barang'],$datane);	
					$this->ml->update_kode2($kd['kode_barang'],$datane);	
				}
				
			}
			 	
			 	
				
				
			
			
			
		}

		//$this->ml->update_kode("B","B6");
		
		 echo json_encode(array('status' => TRUE));
	}

	function edit_barang($kode_barang,$id_persediaan){
		$data['judul'] = "Edit Data Bahan Makanan";
		$data['edit'] = $this->ml->edit_barang($kode_barang);
		$data['edit2'] = $this->ml->edit_persediaan($id_persediaan);
		$data['data_supplier'] = $this->ml->data_supplier("")->result_array();
		$data['kode_barang'] = $this->ml->jml_barang("basah")->num_rows();
		$data['kodes_barang'] = $this->ml->jml_barang("kering")->num_rows();
		$this->template->load('template','gudang/edit_barang',$data);
	}

	function save_edit($kodbar){

		
		$id_persediaan = $this->input->post('id_persediaan');
		$data['nama_barang'] = $this->input->post('nama_barang');
		$data['jenis_barang'] = $this->input->post('jenis_barang');
		$data['id_supplier'] = $this->input->post('supplier');
		$data['satuan'] = $this->input->post('satuan_barang');
		$data['jml_minimal'] = $this->input->post('jml_minimal');
		
		$barang = $this->db->query("SELECT * FROM data_barang WHERE kode_barang='$kodbar'")->row_array();
		$jenis_barang = $barang['jenis_barang'];
		if($this->input->post('jenis_barang') != $jenis_barang){
			$data['kode_barang'] = $this->input->post('kode_barang');
			$data2['kode_barang'] = $this->input->post('kode_barang');
		}else{
			$data2['kode_barang'] = $barang['kode_barang'];
		}
		$this->ml->update_barang($kodbar,$data);
		$this->ml->update_persediaan($id_persediaan,$data2);
		redirect('logistik/barang');
	}

	function barang_masuk(){
		$data['judul'] = "Form Penerimaan Bahan Makanan";
		$data['barang'] = $this->ml->barang_where('basah');
		$data['kering'] = $this->ml->barang_where('kering');
		$data['masuk'] = $this->ml->masuk();
		$this->template->load('template','gudang/penerimaan_barang',$data);
	}

	function save_masuk(){
		$data['tgl'] = $this->input->post('tanggal');
		$data['kode_barang'] = $this->input->post('kode_barang');
		$data['jumlah'] = $this->input->post('jumlah');
		$kodbar = $this->input->post('kode_barang');
		$cek = $this->db->query("SELECT * FROM data_persediaan WHERE kode_barang='$kodbar'")->row_array();
		$cek_ajuan = $this->db->get_where('data_pengajuan',array('kode_barang' => $this->input->post('kode_barang')))->num_rows();
		if($cek_ajuan >=1){
			$this->ml->pengajuan_selesai($this->input->post('kode_barang'));
		}
		$jml_br = $cek['masuk'];
		$stok = $cek['stok_tersedia'];
		$data2['masuk'] = $this->input->post('jumlah')+$jml_br;
		$data2['stok_tersedia'] = $this->input->post('jumlah')+$stok;
		$data3['tgl_masuk'] = $this->input->post('tanggal');
		$this->ml->input_masuk($data);
		
		// $ip = $this->db->query("SELECT * FROM barang_header WHERE tgl_masuk LIKE '".$data3['tgl_masuk']."'")->num_rows();
		// $ip2 = $this->db->query("SELECT * FROM barang_header WHERE tgl_masuk LIKE '".$data3['tgl_masuk']."'")->row_array();
		$ip = $this->db->query("SELECT * FROM barang_detail WHERE kode_barang='$kodbar' AND tgl_masuke LIKE '".$data3['tgl_masuk']."'")->num_rows();
		$ip2 = $this->db->query("SELECT * FROM barang_detail WHERE kode_barang='$kodbar' AND tgl_masuke LIKE '".$data3['tgl_masuk']."'")->row_array();
		$this->ml->input_persediaan($this->input->post('kode_barang'),$data2);
		
		
		if($ip > 0){
			
			$data4['kode_barang'] = $this->input->post('kode_barang');
			$data4['jumlah'] = $this->input->post('jumlah')+$ip2['jumlah'];
			$data4['tgl_masuke'] = $this->input->post('tanggal');
			$this->ml->update_detail($ip2['id_detail'],$data4);
			redirect('logistik/barang_masuk');
		}else{
			// $this->ml->input_header($data3);
			// $ip3 = $this->db->query("SELECT * FROM barang_header WHERE tgl_masuk LIKE '".$data3['tgl_masuk']."'")->row_array();
			// $data4['id_masuk_h'] = $ip3['id_masuk_h'];
			$data4['kode_barang'] = $this->input->post('kode_barang');
			$data4['jumlah'] = $this->input->post('jumlah');
			$data4['tgl_masuke'] = $this->input->post('tanggal');
			$this->ml->input_detail($data4);
			redirect('logistik/barang_masuk');
		}

		
	}

	function barang_keluar(){
		$data['judul'] = "Form Pengeluaran Bahan Makanan";
		$data['barang'] = $this->ml->kering("basah")->result_array();
		$data['kering'] = $this->ml->kering("kering")->result_array();
		$data['keluar'] = $this->ml->data_keluar()->result_array();
		$this->template->load('template','gudang/pengeluaran_barang',$data);
	}

	function save_keluar(){
		$data['tgl'] = $this->input->post('tanggal');
		$data['kode_barang'] = $this->input->post('kode_barang');
		
		$kodbar = $this->input->post('kode_barang');
		$data['jumlah'] = $this->input->post('jml_barang');
		$cek = $this->db->query("SELECT * FROM data_persediaan WHERE kode_barang='$kodbar'")->row_array();
		$datal = $this->db->query("SELECT * FROM barang_detail WHERE jumlah !=0 AND kode_barang='$kodbar' ORDER BY tgl_masuke ASC LIMIT 1")->row_array();
		
			if($data['jumlah'] > $datal['jumlah']){
				$datane['jumlah'] = 0;
				$datanes['jumlah'] =  abs($datal['jumlah']-$data['jumlah']);
				$this->ml->update_dt($datal['id_detail'],$datane);
				$dataok['tgl_masuk'] = $datal['tgl_masuke'];
				$dataok['tgl_keluar'] = $this->input->post('tanggal');
				$dataok['kode_barang'] = $this->input->post('kode_barang');
				$dataok['jml_keluar'] = $datal['jumlah'];
				 $this->ml->laporan_fifo($dataok);
				$datau = $this->db->query("SELECT * FROM barang_detail WHERE jumlah !=0 AND kode_barang='$kodbar' ORDER BY tgl_masuke ASC LIMIT 1")->row_array();
				$databos['jumlah'] = $datau['jumlah'] - $datanes['jumlah'];
				$this->ml->update_dt($datau['id_detail'],$databos);
				$dataik['tgl_masuk'] = $datau['tgl_masuke'];
				$dataik['tgl_keluar'] = $this->input->post('tanggal');
				$dataik['kode_barang'] = $this->input->post('kode_barang');
				$dataik['jml_keluar'] = $datanes['jumlah'];
				 $this->ml->laporan_fifo($dataik);
			}else{
					$datao= $this->db->query("SELECT * FROM barang_detail WHERE jumlah !=0 AND kode_barang='$kodbar' ORDER BY tgl_masuke ASC LIMIT 1")->row_array();
				$rk['tgl_masuk'] = $datao['tgl_masuke'];
				$rk['tgl_keluar'] = $this->input->post('tanggal');
				$rk['kode_barang'] = $this->input->post('kode_barang');
				$rk['jml_keluar'] = $this->input->post('jml_barang');
				$datane['jumlah'] = $rk['jml_keluar'] - $datao['jumlah'];
				$this->ml->update_dt($datal['id_detail'],$datane);
				$this->ml->laporan_fifo($rk);
			}
			
		$jml_kl = $cek['keluar'];
		$data2['keluar'] = $this->input->post('jml_barang')+$jml_kl;
		$data2['stok_tersedia'] =  $this->input->post('tersedia') - $this->input->post('jml_barang');
		 $this->ml->keluar($data);
		 $this->ml->input_persediaan($this->input->post('kode_barang'),$data2);
		
		
		redirect('logistik/barang_keluar');
	}

	function laporan(){
		$data['judul'] = "Laporan Bahan Makanan Masuk dan Keluar";
		if(isset($_POST['submit'])){
			$tgl_awal = $this->input->post('tgl_awal');
			$tgl_akhir = $this->input->post('tgl_akhir');
			$jenis_laporan = $this->input->post('jenis_laporan');
			if($jenis_laporan == "bm"){
				$data['data_laporan'] = $this->ml->cari_laporan($tgl_awal,$tgl_akhir,"barang_masuk")->result_array();
			}elseif ($jenis_laporan=="bk") {
				$data['data_laporan'] = $this->ml->cari_laporan($tgl_awal,$tgl_akhir,"barang_keluar")->result_array();
			}
			
		}
			
			$this->template->load('template','gudang/laporan',$data);
		
		
	}
	function export($jenis_laporan,$tgl_awal,$tgl_akhir){
				
		if($jenis_laporan == "bm"){
			$ambil = $this->ml->cari_laporan($tgl_awal,$tgl_akhir,"barang_masuk")->result_array();
			$judul ="Laporan Bahan Makanan Masuk";
		}elseif($jenis_laporan == "bk"){
			$ambil = $this->ml->cari_laporan($tgl_awal,$tgl_akhir,"barang_keluar")->result_array();
			$judul ="Laporan Bahan Makanan Keluar";
		}
		
			 $this->load->library('fpdf');
	        $pdf = new FPDF('P','mm','A4');
	        $pdf->SetTitle($judul);
	        $pdf->AddPage();

	        $pdf->SetFont('Times','B',14);
	        $pdf->Image(base_url('assets/images/holistic.jpg'),40,5,20,20);

	        $pdf->SetLeftMargin(20);
	       // $pdf->Cell(190,5,'INSTALASI GIZI',0,1,'C');
	        $pdf->Cell(190,5,'Rumah Sakit Karomah Holistic',0,1,'C');
	       
	      
	         $pdf->SetDrawColor(0,0,0);
	                     
	 		$pdf->SetLineWidth(3);  
	        $pdf->SetFont('Times','',12);
	        $pdf->Cell(190,5,'Jl. Gajah Mada Barat No.124,Telp.(0285)420218,420219',0,1,'C');
	        //$pdf->Cell(190,5,'',0,1,'C');
	        $pdf->Cell(190,5,'Pekalongan 51119',0,1,'C');
	        $pdf->Ln(2);
	        $pdf->SetLineWidth(0.5);
	        $pdf->Line(25,28,190,28);
	        $pdf->Ln(5);
	        $pdf->SetFont('Times','',12);
	        $pdf->SetLeftMargin(20);
	      
		        $pdf->Cell(77,6,'',0,0,'');
		        $pdf->Cell(83,6,'Tgl Cetak : '.formatHariTanggal(date('d-m-Y')),0,1,'R');
		        $pdf->Cell(175,6,$judul,0,1,'R');
		        $pdf->Cell(77,6,'List Data Bahan',0,1,'');
		        $pdf->Ln(1);
		        $pdf->SetFont('Times','B',12);
		        $pdf->Cell(10,6,' No',1,0,'');
		        $pdf->Cell(40,6,' Tanggal',1,0,'C');
		        $pdf->Cell(40,6,' Kode Bahan',1,0,'C');
		        $pdf->Cell(40,6,' Nama Bahan',1,0,'C');
		        $pdf->Cell(31,6,' Jenis Bahan',1,0,'C');
		        $pdf->Cell(20,6,' Jumlah',1,1,'C');
		     
		       

	        $pdf->SetFont('Times','',12);
	        $no=1;
	       foreach ($ambil as $bahan):
	       			$pdf->Cell(10,6,$no++,1,0,'');
	                $pdf->Cell(40,6,formatHariTanggal($bahan['tgl']),1,0,'');
	                $pdf->Cell(40,6,$bahan['kode_barang'],1,0,'');
	                $pdf->Cell(40,6,$bahan['nama_barang'],1,0,'');
	                $pdf->Cell(31,6,$bahan['jenis_barang'],1,0,'');
	                $pdf->Cell(20,6,$bahan['jumlah'],1,1,'');
	             

	       endforeach;
	         $pdf->Ln(20);
	        $pdf->SetFont('Times','',12);
	      
	        $pdf->Cell(77,0.5,'Pekalongan, '.formatHariTanggal(date('d-m-Y')),0,1,'');
	       $pdf->Ln(5);
	        $pdf->Cell(77,0.5,'Mengetahui,',0,1,''); 
	       $pdf->Ln(10);
	      $pdf->SetLeftMargin(10);
	          $pdf->Cell(80,6,'Bagian Keuangan'.'                                '.'Bagian Gudang'.'                                      '.'Ahli Gizi',0,1,'');
	          $pdf->Ln(15); 
	           $pdf->SetLeftMargin(16); 
	         $pdf->Cell(80,6,'(-------------------------)'.'                       '.'(-------------------------)'.'                       '.'(-------------------------)',0,1,'');
	                
	                
	 

	        $pdf->Output();



	}

	function ajukan_stok($kode_barang,$jml_tersisa,$id_supplier){
		$data['judul'] = "Form Pengajuan Bahan Makanan";
		$data['barang'] = $this->ml->barang();
		$data['kode_barang'] = $kode_barang;
		$data['jml_tersisa'] = $jml_tersisa;
		$data['supplier'] = $this->ml->data_supplier("WHERE id_supplier=".$id_supplier)->row_array();
		$this->template->load('template','gudang/pengajuan',$data);

		if(isset($_POST['submit'])){
			$data2['tgl_pengajuan'] = $this->input->post('tanggal');
			$data2['kode_barang'] = $this->input->post('kode_barang');
			 $data2['jml_tersisa'] = $this->input->post('jumlah_tersisa');
			 $data2['jml_ajuan'] = $this->input->post('jumlah');
			 $data2['status_ajuan'] ="sudah";
			 $data2['id_supplier'] = $id_supplier;
			 $this->ml->input_pengajuan($data2);
			 redirect('Logistik');
		}
	}

	function ubah_ajuan($kode_barang,$jml_tersisa,$id_supplier,$id_pengajuan){
		$data['judul'] = "Form Pengajuan Bahan Makanan";
		$data['barang'] = $this->ml->barang();
		$data['kode_barang'] = $kode_barang;
		$data['jml_tersisa'] = $jml_tersisa;
		$data['supplier'] = $this->ml->data_supplier("WHERE id_supplier=".$id_supplier)->row_array();
		$data['pengajuan'] = $this->mg->data_pengajuan("WHERE id_pengajuan=".$id_pengajuan)->row_array();
		$this->template->load('template','gudang/ubah_pengajuan',$data);
	}

	function supplier(){
		$data['judul'] = "Data Supplier"; 
		$data['sub_judul'] ="Sistem Informasi Persediaan Bahan Makanan Rumah Sakit Karomah Holistic";
		$data['data_supplier'] = $this->ml->data_supplier("")->result_array();
		$this->template->load('template','gudang/supplier',$data);
		if(isset($_POST['submit'])){
			$data2['nama_supplier'] = $this->input->post('nama_supplier');
			$data2['alamat_supplier'] = $this->input->post('alamat');
			$data2['no_hp'] = $this->input->post('no_hp');
			$data2['email'] = $this->input->post('email');
			$this->ml->input_supplier($data2);
			redirect('logistik/supplier');
		}
	}

	function delete_supplier(){
		$id_supplier = $this->input->post('id_supplier');
		$this->ml->hapus_supplier($id_supplier);
		echo json_encode(array('status' => TRUE));
	}

	function edit_supplier($id_supplier){
		$data['judul'] = "Edit Data Supplier";
		$data['edit'] = $this->ml->data_supplier("WHERE id_supplier=".$id_supplier)->row_array();
		$this->template->load('template','gudang/edit_supplier',$data);
		if(isset($_POST['submit'])){

			$data2['nama_supplier'] = $this->input->post('nama_supplier');
			$data2['alamat_supplier'] = $this->input->post('alamat');
			$data2['no_hp'] = $this->input->post('no_hp');
			$data2['email'] = $this->input->post('email');
			$this->ml->update_supplier($this->input->post('id_supplier'),$data2);
			redirect('logistik/supplier');

		}
	}

	function data_barang(){
		
		$ambil = $this->ml->cetak_data_barang()->result_array();
		 $this->load->library('fpdf');
        $pdf = new FPDF('P','mm','A4');
        $pdf->SetTitle('Laporan Data Bahan Makanan');
        $pdf->AddPage();

        $pdf->SetFont('Times','B',14);
        $pdf->Image(base_url('assets/images/holistic.jpg'),40,5,20,20);

        $pdf->SetLeftMargin(20);
        $pdf->Cell(190,5,'INSTALASI GIZI',0,1,'C');
        $pdf->Cell(190,5,'Rumah Sakit Karomah Holistic',0,1,'C');
       
      
         $pdf->SetDrawColor(0,0,0);
                     
 		$pdf->SetLineWidth(3);  
        $pdf->SetFont('Times','',12);
        $pdf->Cell(190,5,'Jl. Gajah Mada Barat No.124,Telp.(0285)420218,420219',0,1,'C');
        //$pdf->Cell(190,5,'',0,1,'C');
        $pdf->Cell(190,5,'Pekalongan 51119',0,1,'C');
        $pdf->Ln(0.5);
        $pdf->SetLineWidth(0.5);
        $pdf->Line(25,30,190,30);
        $pdf->Ln(5);
        $pdf->SetFont('Times','',12);
        $pdf->SetLeftMargin(20);
      
	        $pdf->Cell(77,6,'',0,0,'');
	        $pdf->Cell(83,6,'Tgl Cetak : '.formatHariTanggal(date('Y-m-d')),0,1,'R');
	        $pdf->Cell(77,6,'List Data Bahan Makanan',0,1,'');
	        $pdf->Ln(1);
	        $pdf->SetFont('Times','B',12);
	        $pdf->Cell(10,6,' No',1,0,'');
	        $pdf->Cell(40,6,' Kode Bahan',1,0,'C');
	        $pdf->Cell(40,6,' Nama Bahan',1,0,'C');
	        $pdf->Cell(40,6,' Supplier',1,0,'C');
	        $pdf->Cell(30,6,' Jumlah Stok',1,1,'C');
	     
	       

        $pdf->SetFont('Times','',12);
        $no=1;
       foreach ($ambil as $bahan):
       			$pdf->Cell(10,6,$no++,1,0,'');
                $pdf->Cell(40,6,$bahan['kode_barang'],1,0,'');
               
                $pdf->Cell(40,6,$bahan['nama_barang'],1,0,'');
                $pdf->Cell(40,6,$bahan['nama_supplier'],1,0,'');
                $pdf->Cell(30,6,$bahan['stok_tersedia'],1,1,'');
             

       endforeach;
       $pdf->Ln(20);
        $pdf->SetFont('Times','',12);
      
        $pdf->Cell(77,0.5,'Pekalongan, '.formatHariTanggal(date('d-m-Y')),0,1,'');
       $pdf->Ln(5);
        $pdf->Cell(77,0.5,'Mengetahui,',0,1,''); 
       $pdf->Ln(10);
      $pdf->SetLeftMargin(10);
          $pdf->Cell(80,6,'Bagian Keuangan'.'                                '.'Bagian Gudang'.'                                      '.'Ahli Gizi',0,1,'');
          $pdf->Ln(15); 
           $pdf->SetLeftMargin(16); 
         $pdf->Cell(80,6,'(-------------------------)'.'                       '.'(-------------------------)'.'                       '.'(-------------------------)',0,1,'');

                
                
 

        $pdf->Output();
        

	}

	function label(){
		$data['judul'] = "Cetak Label Bahan Makanan";
		$this->template->load('template','gudang/label',$data);
		if(isset($_POST['submit'])){
			$tgl_awal = $this->input->post('tgl_awal');
			$tgl_akhir = $this->input->post('tgl_akhir');
			$tgl_sekarang = $this->input->post('tgl_sekarang');
			if($tgl_awal> $tgl_sekarang){
				redirect('logistik/label');
			}else if($tgl_akhir<$tgl_awal){
				redirect('logistik/label');
			}
			else{

						$ambil = $this->ml->cari_laporan($tgl_awal,$tgl_akhir,"barang_masuk")->result_array();
					require('PDF_Label.php');
				  $pdf = new PDF_Label('L7163');

				 $pdf->AddPage();

				 foreach($ambil as $data){
				 	$text = sprintf("%s\n%s\n%s","Bahan: ".$data['nama_barang'], 'Tanggal Masuk',formatHariTanggal($data['tgl']));
				 	$pdf->Add_Label($text);
					}

				 $pdf->Output();

			}
			
	}


		
		

}

function fifo(){
	$data['judul'] = "Laporan FIFO";
	if(isset($_POST['submit'])){
			$tgl_awal = $this->input->post('tgl_awal');
			$tgl_akhir = $this->input->post('tgl_akhir');
			$jenis_laporan = $this->input->post('jenis_laporan');
			if($jenis_laporan == "bm"){
				$data['data_laporan'] = $this->ml->cari_laporan_fifo($tgl_awal,$tgl_akhir,"barang_detail","tgl_masuke")->result_array();
			}elseif ($jenis_laporan=="bk") {
				$data['data_laporan'] = $this->ml->cari_laporan_fifo($tgl_awal,$tgl_akhir,"laporan_fifo","tgl_keluar")->result_array();
			}
			
		}
	$this->template->load('template','gudang/laporan_fifo',$data);

}

function export_fifo($jenis_laporan,$tgl_awal,$tgl_akhir){
				
		if($jenis_laporan == "bm"){
			$ambil = $this->ml->cari_laporan_fifo($tgl_awal,$tgl_akhir,"barang_detail","tgl_masuke")->result_array();
			$judul ="Laporan FIFO Bahan Makanan Masuk";
		}elseif($jenis_laporan == "bk"){
			$ambil = $this->ml->cari_laporan_fifo($tgl_awal,$tgl_akhir,"laporan_fifo","tgl_keluar")->result_array();
			$judul ="Laporan FIFO Bahan Makanan Keluar";
		}
		
		 $this->load->library('fpdf');
        $pdf = new FPDF('P','mm','A4');
        $pdf->SetTitle($judul);
        $pdf->AddPage();

        $pdf->SetFont('Times','B',14);
        $pdf->Image(base_url('assets/images/holistic.jpg'),40,5,20,20);

        $pdf->SetLeftMargin(20);
       // $pdf->Cell(190,5,'INSTALASI GIZI',0,1,'C');
        $pdf->Cell(190,5,'Rumah Sakit Karomah Holistic',0,1,'C');
       
      
         $pdf->SetDrawColor(0,0,0);
                     
 		$pdf->SetLineWidth(3);  
        $pdf->SetFont('Times','',12);
        $pdf->Cell(190,5,'Jl. Gajah Mada Barat No.124,Telp.(0285)420218,420219',0,1,'C');
        //$pdf->Cell(190,5,'',0,1,'C');
        $pdf->Cell(190,5,'Pekalongan 51119',0,1,'C');
        $pdf->Ln(2);
        $pdf->SetLineWidth(0.5);
        $pdf->Line(25,28,190,28);
        $pdf->Ln(5);
        $pdf->SetFont('Times','',12);
        $pdf->SetLeftMargin(20);
      
	        $pdf->Cell(77,6,'',0,0,'');
	        $pdf->Cell(83,6,'Tgl Cetak : '.formatHariTanggal(date('d-m-Y')),0,1,'R');
	        $pdf->Cell(175,6,$judul,0,1,'R');
	        $pdf->Cell(77,6,'List Data Bahan',0,1,'');
	        $pdf->Ln(1);
	        $pdf->SetFont('Times','B',12);
	        $pdf->Cell(10,6,' No',1,0,'');
	        $pdf->Cell(35,6,' Tanggal Masuk ',1,0,'C');
	        $pdf->Cell(15,6,' Kode',1,0,'C');
	        $pdf->Cell(40,6,' Nama Bahan',1,0,'C');
	        $pdf->Cell(31,6,' Jenis Bahan',1,0,'C');
	        if($jenis_laporan == "bk"){
	        $pdf->Cell(35,6,' Tanggal Keluar',1,0,'C');

	        }
	        $pdf->Cell(15,6,'Keluar',1,1,'C');
	     
	       

        $pdf->SetFont('Times','',12);
        $no=1;
       foreach ($ambil as $bahan):
       			$pdf->Cell(10,6,$no++,1,0,'');
       			if($jenis_laporan == "bm"){
       				$pdf->Cell(35,6,formatHariTanggal($bahan['tgl_masuke']),1,0,'');	
       			}else if($jenis_laporan == "bk"){
       				$pdf->Cell(35,6,formatHariTanggal($bahan['tgl_masuk']),1,0,'');	
       			}
                
                $pdf->Cell(15,6,$bahan['kode_barang'],1,0,'');
                $pdf->Cell(40,6,$bahan['nama_barang'],1,0,'');
                $pdf->Cell(31,6,$bahan['jenis_barang'],1,0,'');
                if($jenis_laporan == "bk"){
                	$pdf->Cell(35,6,formatHariTanggal($bahan['tgl_keluar']),1,0,'');	
                }
                if($jenis_laporan == "bm"){
                	$pdf->Cell(20,6,$bahan['jumlah'],1,1,'');
                }else if($jenis_laporan == "bk"){

                $pdf->Cell(15,6,$bahan['jml_keluar'],1,1,'');
                }
             

       endforeach;
         $pdf->Ln(20);
        $pdf->SetFont('Times','',12);
      
        $pdf->Cell(77,0.5,'Pekalongan, '.formatHariTanggal(date('d-m-Y')),0,1,'');
       $pdf->Ln(5);
        $pdf->Cell(77,0.5,'Mengetahui,',0,1,''); 
       $pdf->Ln(10);
      $pdf->SetLeftMargin(10);
          $pdf->Cell(80,6,'Bagian Keuangan'.'                                '.'Bagian Gudang'.'                                      '.'Ahli Gizi',0,1,'');
          $pdf->Ln(15); 
           $pdf->SetLeftMargin(16); 
         $pdf->Cell(80,6,'(-------------------------)'.'                       '.'(-------------------------)'.'                       '.'(-------------------------)',0,1,'');
                
                
 

        $pdf->Output();



	}



}

 ?>
