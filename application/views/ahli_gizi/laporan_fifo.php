 <?php 
 function tgl_indo($tanggal){
 $bulan = array (
        1 =>   'Januari',
             'Februari',
             'Maret',
             'April',
            'Mei',
            'Juni',
             'Juli',
             'Agustus',
             'September',
            'Oktober',
           'November',
         'Desember'
  );
   $pecahkan = explode('-', $tanggal);
            
   return $pecahkan[0] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[2];
  }

 function tgl_database($tanggal){
     $pecahkan = explode('-', $tanggal); 
     return $pecahkan[2] . '-' . $pecahkan[1] . '-' . $pecahkan[0];
 }

 ?>
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
    <div class="col-sm-12">
          <div class="portlet">
           <div class="portlet-heading bg-danger">
 <h3 class="portlet-title text-uppercase">
     Form Laporan FIFO
      </h3>
  <div class="clearfix"></div>
  </div>
   <div id="portlet1" class="panel-collapse collapse in">
   <div class="portlet-body">
      <div class=" form">
    <form class="cmxform form-horizontal tasi-form" method="POST" action="<?=base_url('ahli_gizi/fifo');?>">
       <div class="form-group">
         <label class="control-label col-lg-2">Laporan FIFO</label>
                <div class="col-lg-10">
    <select class=" form-control select2" data-placeholder="Nama Bahan" id="jenis_laporan" name="jenis_laporan" required>
          <option value="">Pilih Laporan</option>                                                          
            <option value="bm">Bahan Makanan Masuk</option>                                                          
              <option value="bk">Bahan Makanan Keluar</option>                                                          
     </select>
   </div>
 </div>
  <input type="hidden" name="tgl_sekarang" id="tgl_sekarang" value="<?=date('Y-m-d');?>">
       <div class="form-group"> 
          <label for="cname" class="control-label col-lg-2">Tanggal</label>
            <div class="col-lg-4">
              <input type="date" class="form-control" placeholder="Tanggal Awal" name="tgl_awal" id="tgl_awal" required value="<?=date('Y-m-d')?>"> 
            </div>
<div class="col-lg-2">
     <h6>Sampai Dengan</h6>
 </div>
  <div class="col-lg-4">
 <input type="date" class="form-control" placeholder="Tanggal Akhir" name="tgl_akhir" id="tgl_akhir" required value="<?=date('Y-m-d')?>"> 
  </div>
   </div> 
 <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
     <button class="btn btn-primary waves-effect waves-light" id="sbm" name="submit" type="submit" onclick="tgl()">Cari</button>
</div>
   </div>
 </form>
     </div> <!-- .form -->
 </div>
 </div> <!-- panel-body -->
     </div> <!-- panel -->
  </div> <!-- col -->

     </div> <!-- End row -->
  <?php 
   if(isset($_POST['submit'])){
      $jenis_laporan = $_POST['jenis_laporan'];
       if($jenis_laporan == "bm"){
             $jp = "BAHAN MAKANAN MASUK";
        }else if($jenis_laporan == "bk"){
            $jp = "BAHAN MAKANAN KELUAR";
         }
        $tgl_awal = $_POST['tgl_awal'];
      $tgl_akhir = $_POST['tgl_akhir'];
      $tgl_sekarang = $_POST['tgl_sekarang'];
       if($tgl_awal<=$tgl_sekarang && $tgl_akhir>=$tgl_awal){
   ?>
  <div class="row">
     <div class="col-md-12">
     <div class="panel panel-danger">
         <div class="panel-heading">
        <h3 class="panel-title text-white">LIST DATA <?=$jp;?></h3>
    </div>
  <div class="col-sm-6">
        <div class="m-b-30">
              <br><a class="btn btn-primary waves-effect waves-light" href="<?=base_url('ahli_gizi/export_fifo');?>/<?=$jenis_laporan."/".$tgl_awal."/".$tgl_akhir;?>" target="_blank"><i class="fa fa-print"></i> Cetak Laporan</a>
         </div>
   </div>
 <div class="panel-body">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="table-responsive" >
             <table class="table table-striped table-bordered" id="table">
          <thead style="text-align: center;">
            <?php 
                if($jenis_laporan == "bm"){
                  ?>
                  <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Kode Bahan Makanan</th>
                  <th>Nama Bahan Makanan</th>
                  <th>Jumlah</th>                                                           
                  </tr>
                   <tbody>
               <?php
                   $no=1; 
                  foreach ($data_laporan as $laporan) {
              ?>
               <tr id="hps">
                  <td><?=$no++;?></td>
               <td><?=tgl_indo(tgl_database($laporan['tgl_masuke']));?></td>
                 <td><?=$laporan['kode_barang'];?></td>
                    <td><?=$laporan['nama_barang'];?></td>
                 <td><?=$laporan['jumlah'];?></td>
               </tr>
                <?php 
                  }
              ?>
               </tbody>
                  <?php 
                }else if($jenis_laporan == "bk"){
                  ?>
                   <tr>
                  <th>No</th>
                  <th>Tanggal Masuk</th>
                  <th>Kode Bahan Makanan</th>
                  <th>Nama Bahan Makanan</th>
                  <th>Tanggal Keluar</th>
                  <th>Jumlah Keluar</th>                                                           
                  </tr>
                   <tbody>
                    <?php
                   $no=1; 
                  foreach ($data_laporan as $laporan) {
              ?>
               <tr id="hps">
                  <td><?=$no++;?></td>
               <td><?=tgl_indo(tgl_database($laporan['tgl_masuk']));?></td>
                 <td><?=$laporan['kode_barang'];?></td>
                    <td><?=$laporan['nama_barang'];?></td>
                    <td><?=tgl_indo(tgl_database($laporan['tgl_keluar']));?></td>
                 <td><?=$laporan['jml_keluar'];?></td>
               </tr>
                <?php 
                  }
              ?>
                  <?php 

                }
             ?>
 
 </thead>

    </table>
 </div>
  </div>
     </div>
  </div>
      </div>
  </div>
    </div>
  <?php
 }else{
?>
 <script type="text/javascript">
    $(document).ready(function(){
          swal("Tanggal yang dipilih melebih tanggal sekarang", " ", "error"); 
      });
 </script>
   <?php 
       } 
   }
 ?>
 <script type="text/javascript">
    $(document).ready(function(){
         $("#table").DataTable();
  });
                             
 </script>
                         
                        