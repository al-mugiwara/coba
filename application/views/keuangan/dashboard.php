<div class="row">
   <div class="col-sm-12">
     <h4 class="pull-left page-title"><i class="fa fa-calendar"></i>&nbsp;<span id="clock"></span></h4>
        <ol class="breadcrumb pull-right">
        <li><a href="#"><?=$this->session->userdata('login_hash');?></a></li>
       <li class="active"><?=$judul;?></li>
          </ol>
  </div>
 </div>

 <div class="row">
   <div class="col-lg-12">
      <div class="portlet"><!-- /portlet heading -->
       <div class="portlet-heading bg-danger">
       <h3 class="portlet-title text-uppercase">
     <?=$sub_judul;?>
   </h3>
 <div class="clearfix"></div>
   </div>
  <div id="portlet1" class="panel-collapse collapse in">
   <div class="portlet-body">
   <div class="row">
  <div class="col-md-12">
    <tr>
       <td width="28%">&nbsp;</td>
         <td width="41%">
    <center>
    Selamat datang, <b><?=$this->session->userdata('username');?></b> di halaman dashboard Keuangan. Pada aplikasi ini Anda dapat melihat data Pengajuan Bahan & data Bahan Masuk dan Keluar<br /> yang telah Diajukan. Anda juga dapat mencetak Laporan Pengajuan Bahan dan Laporan Bahan Masuk dan Keluar <br />
 <br>
Terimakasih, salam Administrator 
 </center>
   </td>
</tr>
                                                    
</div>
   </div>
 </div>
 </div>
  </div>
 </div> <!-- /Portlet -->
  </div> <!-- end col -->

                            
 </div> <!-- End row -->

 <div class="row">
    <div class="col-md-8 col-sm-8 col-lg-8">
   <div class="mini-stat clearfix bx-shadow">
 <span class="mini-stat-icon bg-danger"><i class=" fa fa-archive"></i></span>
 <div class="mini-stat-info text-right text-muted">
   <span class="counter"><?=$jml_barang;?></span>
      Jumlah Bahan
    </div>
    <div class="tiles-progress">
 <div class="m-t-20">
  <h5 class="text-uppercase">Jumlah Seluruh Bahan <span class="pull-right"><?=$jml_barang;?></span></h5>
 <div class="progress progress-sm m-0">
<div class="progress-bar">
   <span class="sr-only"><?=$jml_barang;?> Bahan</span>
    </div>
  </div>
 </div>
</div>
 </div>
  </div>
<?php 
   foreach ($cek_barang as $cek) {
   $cek['kode_barang'] = $cek['stok_tersedia'];
 
    if($cek['kode_barang'] <=$cek['jml_minimal'] ){
  ?>
  <div class="col-md-7 col-sm-7 col-lg-4">
   <div class="mini-stat clearfix bx-shadow">
      <span class="mini-stat-icon bg-warning"><i class=" fa fa-warning"></i></span>
  <div class="mini-stat-info text-right text-muted">
     Stok Tersedia &nbsp;<span class="counter"><?=$cek['stok_tersedia'];?></span>
         Permintaan Bahan <?=$cek['nama_barang'];?>
  </div>
    <div class="tiles-progress">
 <div class="m-t-20">
   <h5 class="text-uppercase">Ajuan Baru<span class="pull-right"><?=$cek['jml_ajuan'];?></span></h5>
   <div class="progress progress-sm m-0">
      <div class="progress-bar">
     <span class="sr-only"></span>
  </div>
    </div>
  </div>
  </div>
  </div>
   </div>
   <?php
    } 
        }
 ?>
 </div>


                               

                
           
 


           

