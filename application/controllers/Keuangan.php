<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Controller
{
//controller utk menghubungkan antara view dan model
	function __construct(){
		parent::__construct();
		$username  = $this->session->userdata('username'); //mengambil session username
		$password  = $this->session->userdata('password');//mengambil session password
		$login_hash = $this->session->userdata('login_hash');//mengambil session login_hash(hak akses)
		if($username == NULL || $password == NULL || $login_hash != 'bagian_keuangan'){ 
			//cek username, password dan hak akses jika username/password kosong atau hak akses bukan logistik maka redirect ke controller login function logout
			redirect('login/logout');
		}
		
		$this->load->model('model_gizi','mg'); //memanggil model_logistik dengan nama alias mg
		$this->load->model('model_logistik','ml');
		 $this->load->library(array('PHPExcel'));
     $this->load->helper('tanggal');
	}

	
	function index(){
		//function yang pertama dijalankan
		$data['judul'] = "Dashboard"; //$data merupakan variabel array dengan isi Dashboard
		$data['sub_judul'] ="Sistem Informasi Persediaan Bahan Makanan Rumah Sakit Karomah Holistic";
		$data['jml_barang'] = $this->mg->data_pengajuan(",data_barang WHERE data_pengajuan.kode_barang = data_barang.kode_barang")->num_rows();
		$data['cek_barang'] = $this->mg->data_pengajuan(",data_barang,data_persediaan WHERE data_pengajuan.kode_barang = data_barang.kode_barang AND data_persediaan.kode_barang = data_barang.kode_barang AND data_pengajuan.status_ajuan='acc'")->result_array();
		$this->template->load('template','keuangan/dashboard',$data);//meload template, lalu admin/dashboard merupakan content, $data merupakan variabel array
	}

	function pengajuan(){
		$data['judul'] = "Cetak Pengajuan"; //$data merupakan variabel array dengan isi Dashboard
		$data['sub_judul'] ="Sistem Informasi Persediaan Bahan Makanan Rumah Sakit Karomah Holistic";
		$data['data_pengajuan'] = $this->mg->data_pengajuan("WHERE status_ajuan='acc'")->result_array();
		$this->template->load('template','keuangan/laporan_pengajuan',$data);//meload template, lalu admin/dashboard merupakan content, $data merupakan variabel array
	}

	function cetak_pengajuan($id_pengajuan){
		 $this->load->library('fpdf');
        $pdf = new FPDF('P','mm','A4');
        $pdf->SetTitle('Laporan Pengajuan Bahan Makanan');
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
        if($id_pengajuan!= "cetak_semua"){
        	 $id_pengajuan = $this->uri->segment(3);
     		$barang = $this->mg->data_pengajuan(",data_barang,data_supplier WHERE data_pengajuan.kode_barang = data_barang.kode_barang AND data_pengajuan.id_supplier=data_supplier.id_supplier AND data_pengajuan.status_ajuan='acc' AND data_pengajuan.id_pengajuan = ".$id_pengajuan."")->row_array();

	        $pdf->Cell(77,6,'',0,0,'');
	        $pdf->Cell(83,6,'Tgl Cetak : '.formatHariTanggal(date('Y-m-d')),0,1,'R');
	        $pdf->Cell(77,6,'List Permintaan Bahan',0,1,'');
	        $pdf->Ln(1);
	        $pdf->Cell(77,6,' Kode Bahan',1,0,'');
	        $pdf->Cell(83,6,': '.$barang['kode_barang'],1,1,'');
	        $pdf->Cell(77,6,' Nama Bahan',1,0,'');
	        $pdf->Cell(83,6,': '.$barang['nama_barang'],1,1,'');
	        $pdf->Cell(77,6,' Supplier',1,0,'');
	        $pdf->Cell(83,6,': '.$barang['nama_supplier'],1,1,'');
	        $pdf->Cell(77,6,' Tanggal Pengajuan',1,0,'');
	        $pdf->Cell(83,6,': '.formatHariTanggal($barang['tgl_pengajuan']),1,1,'');
	        $pdf->Cell(77,6,' Jumlah Tersisa',1,0,'');
	        $pdf->Cell(83,6,': '.$barang['jml_tersisa'],1,1,'');
	        $pdf->Cell(77,6,' Jumlah Ajuan',1,0,'');
	        $pdf->Cell(83,6,': '.$barang['jml_ajuan'],1,1,'');
	        $pdf->Ln(2);
	      $pdf->Ln(20);
        $pdf->SetFont('Times','',12);
      
        $pdf->Cell(77,0.5,'Pekalongan, '.formatHariTanggal(date('d-m-Y')),0,1,'');
       $pdf->Ln(5);
        $pdf->Cell(77,0.5,'Mengetahui,',0,1,''); 
       $pdf->Ln(10);
      $pdf->SetLeftMargin(10);
          $pdf->Cell(80,6,'Ahli Gizi'.'                                          '.'Bagian Keuangan'.'                                '.'Kepala RS. Holistic',0,1,'');
          $pdf->Ln(15); 
           $pdf->SetLeftMargin(16); 
         $pdf->Cell(80,6,'(-------------------------)'.'                       '.'(-------------------------)'.'                       '.'(-------------------------)',0,1,'');
                
	        $pdf->Output();
        }else{
        
        $pdf->SetFont('Times','B',10);
          $pdf->Cell(175,5,'Tgl Cetak : '.formatHariTanggal(date('Y-m-d')),0,1,'R');
        $pdf->Cell(77,6,'List Permintaan Bahan : ',0,1,'');
        $pdf->Cell(10,5,'No.',1,0,'');
        $pdf->Cell(40,5,'Tanggal Pengajuan',1,0,'');
        $pdf->Cell(30,5,'Kode Bahan',1,0,'');
        $pdf->Cell(35,5,'Nama Bahan',1,0,'');
        $pdf->Cell(50,5,'Supplier',1,0,'');
       $pdf->Cell(20,5,'Jumlah ',1,1,'');
      
        // $pdf->SetFont('Times','',10);
       $bulan = $this->input->post('bulan');
       $permintaan = $this->mg->data_pengajuan(",data_barang,data_supplier WHERE data_pengajuan.kode_barang = data_barang.kode_barang AND data_pengajuan.id_supplier=data_supplier.id_supplier AND data_pengajuan.status_ajuan='acc' AND month(data_pengajuan.tgl_pengajuan) = ".$bulan)->result_array();
       $no=1;
       foreach ($permintaan as $pengajuan) {
       			$pdf->Cell(10,5,$no++,1,0,'');
                $pdf->Cell(40,5,formatHariTanggal($pengajuan['tgl_pengajuan']),1,0,'');
               
                $pdf->Cell(30,5,$pengajuan['kode_barang'],1,0,'');
                $pdf->Cell(35,5,$pengajuan['nama_barang'],1,0,'');
                $pdf->Cell(50,5,$pengajuan['nama_supplier'],1,0,'');
                   $pdf->Cell(20,5,$pengajuan['jml_ajuan'],1,1,'');

       }
 $pdf->Ln(20);
        $pdf->SetFont('Times','',12);
      
        $pdf->Cell(77,0.5,'Pekalongan, '.formatHariTanggal(date('d-m-Y')),0,1,'');
       $pdf->Ln(5);
        $pdf->Cell(77,0.5,'Mengetahui,',0,1,''); 
       $pdf->Ln(10);
      $pdf->SetLeftMargin(10);
          $pdf->Cell(80,6,'Ahli Gizi'.'                                          '.'Bagian Keuangan'.'                                '.'Kepala RS. Holistic',0,1,'');
          $pdf->Ln(15); 
           $pdf->SetLeftMargin(16); 
         $pdf->Cell(80,6,'(-------------------------)'.'                       '.'(-------------------------)'.'                       '.'(-------------------------)',0,1,'');
                
                
                
                
 

        $pdf->Output();
        }
       
	}

	function laporan_mk(){
			$data['judul'] = "Laporan Bahan Masuk dan Keluar";
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
			
			$this->template->load('template','keuangan/laporan_mk',$data);
	}


function export($jenis_laporan,$tgl_awal,$tgl_akhir){
	if($jenis_laporan == "bm"){
			$ambil = $this->ml->cari_laporan($tgl_awal,$tgl_akhir,"barang_masuk")->result_array();
			$judul ="Laporan Bahan Masuk";
		}elseif($jenis_laporan == "bk"){
			$ambil = $this->ml->cari_laporan($tgl_awal,$tgl_akhir,"barang_keluar")->result_array();
			$judul ="Laporan Bahan Keluar";
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
	        $pdf->Cell(83,6,'Tgl Cetak : '.formatHariTanggal(date('Y-m-d')),0,1,'R');
	        $pdf->Cell(178,6,'Laporan : '.$judul,0,1,'R');
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
          $pdf->Cell(80,6,'Ahli Gizi'.'                                        '.'Bagian Keuangan'.'                                  '.'Kepala RS. Holistic',0,1,'');
          $pdf->Ln(15); 
           $pdf->SetLeftMargin(16); 
         $pdf->Cell(80,6,'(-------------------------)'.'                       '.'(-------------------------)'.'                       '.'(-------------------------)',0,1,'');
                
                
                
 

        $pdf->Output();
        

	}

	function data_barang(){

		$ambil = $this->ml->cetak_data_barang()->result_array();
		 $this->load->library('fpdf');
        $pdf = new FPDF('P','mm','A4');
        $pdf->SetTitle('Laporan Data Bahan');
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
	        $pdf->Cell(83,6,'Tgl Cetak : '.formatHariTanggal(date('Y-m-d')),0,1,'R');
	        $pdf->Cell(77,6,'List Data Bahan',0,1,'');
	        $pdf->Ln(1);
	        $pdf->SetFont('Times','B',12);
	        $pdf->Cell(10,6,' No',1,0,'');
	        $pdf->Cell(25,6,' Kode Bahan',1,0,'C');
	        $pdf->Cell(40,6,' Nama Bahan',1,0,'C');
	        $pdf->Cell(56,6,' Supplier',1,0,'C');
	        $pdf->Cell(30,6,' Jumlah Stok',1,1,'C');
	     
	       

        $pdf->SetFont('Times','',12);
        $no=1;
       foreach ($ambil as $bahan):
       			$pdf->Cell(10,6,$no++,1,0,'');
                $pdf->Cell(25,6,$bahan['kode_barang'],1,0,'');
               
                $pdf->Cell(40,6,$bahan['nama_barang'],1,0,'');
                $pdf->Cell(56,6,$bahan['nama_supplier'],1,0,'');
                $pdf->Cell(30,6,$bahan['stok_tersedia'],1,1,'');
             

       endforeach;
        $pdf->Ln(20);
        $pdf->SetFont('Times','',12);
      
        $pdf->Cell(77,0.5,'Pekalongan, '.formatHariTanggal(date('d-m-Y')),0,1,'');
       $pdf->Ln(5);
        $pdf->Cell(77,0.5,'Mengetahui,',0,1,''); 
       $pdf->Ln(10);
      $pdf->SetLeftMargin(10);
          $pdf->Cell(80,6,'Ahli Gizi'.'                                          '.'Bagian Keuangan'.'                               '.'Kepala RS. Holistic',0,1,'');
          $pdf->Ln(15); 
           $pdf->SetLeftMargin(16); 
         $pdf->Cell(80,6,'(-------------------------)'.'                       '.'(-------------------------)'.'                       '.'(-------------------------)',0,1,'');
                
                
                
 

        $pdf->Output();
        

	}

	

	




}

 ?>
