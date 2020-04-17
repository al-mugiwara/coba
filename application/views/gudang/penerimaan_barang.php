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
        Form Penerimaan Bahan Makanan
     </h3>
  <div class="clearfix"></div>
  </div>
 <div id="portlet1" class="panel-collapse collapse in">
     <div class="portlet-body">
       <div class=" form">
     <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" enctype="multipart/form-data" action="<?=base_url();?>logistik/save_masuk">
  <div class="form-group"> 
    <label for="cname" class="control-label col-lg-2">Tanggal </label>
<div class="col-lg-10">
  <input type="date" class="form-control" placeholder="Tanggal" name="tanggal" id="tanggal"   required value="<?=date('Y-m-d');?>"> 
 </div>
    </div>
    <div class="form-group">
       <label class="control-label col-lg-2">Jenis Bahan</label>
 <div class="col-lg-10">
       <select class=" form-control select2"  id="jenis" name="jenis" required onchange="jenise()">
             <option value="">Pilih Bahan</option>
             <option value="basah">Basah</option>
             <option value="kering">Kering</option>

  </select>
     </div>
   </div> 
  <div class="form-group">
   <label for="cname" class="control-label col-lg-2">Kode Bahan Makanan</label>
 <div class="col-lg-10">
     <input class=" form-control" id="kode_barang" name="kode_barang" type="text"  placeholder="Nama Bahan" required readonly>
    </div>
 </div>
  <div class="form-group" id="ok">
       <label class="control-label col-lg-2">Nama Bahan Makanan</label>
 <div class="col-lg-10">
       <select class=" form-control select2"  id="nama_barang" name="nama_kering" novalidate onchange="jenifs()">
             <option value="">Pilih Bahan</option>
 <?php 
     foreach ($barang as $data_barang) {
   ?>
    <option value="<?=$data_barang['kode_barang'];?>" jml_min="<?=$data_barang['jml_minimal'];?>"><?=$data_barang['nama_barang'];?></option>
  <?php 
     }
   ?>
  </select>
     </div>
   </div>
 <div class="form-group" id="ok2">
       <label class="control-label col-lg-2">Nama Bahan Makanan</label>
 <div class="col-lg-10">
       <select class=" form-control select2"  id="namae" name="nama_barang" novalidate onchange="jenisk()">
             <option value="">Pilih Bahan</option>
 <?php 
     foreach ($kering as $data_barang) {
   ?>
    <option value="<?=$data_barang['kode_barang'];?>" jml_min="<?=$data_barang['jml_minimal'];?>"><?=$data_barang['nama_barang'];?></option>
  <?php 
     }
   ?>
  </select>
     </div>
   </div>
 <div class="form-group ">
     <label for="cname" class="control-label col-lg-2">Jumlah Minimal Tersedia</label>
          <div class="col-lg-10">
         <input class=" form-control" id="jumlah_min" name="jumlah_min" type="number"  placeholder="Jumlah Minimal Tersedia" readonly required>
    </div>
   </div>
  <div class="form-group ">
    <label for="cname" class="control-label col-lg-2">Jumlah Bahan Makanan</label>
     <div class="col-lg-10">
   <input class=" form-control" id="jumlah" name="jumlah" type="number"  placeholder="Jumlah Bahan Makanan" required>
     </div>
  </div>
 <div class="form-group">
     <div class="col-lg-offset-2 col-lg-10">
       <button class="btn btn-success waves-effect waves-light" type="submit">Simpan</button>
     </div>
 </div>
   </form>
 </div> <!-- .form -->
      </div>
  </div> <!-- panel-body -->
     </div> <!-- panel -->
   </div> <!-- col -->
 </div> <!-- End row -->
 <div class="col-md-12">
      <div class="panel panel-danger">
     <div class="panel-heading">
        <h3 class="panel-title text-white">LIST DATA BAHAN MAKANAN MASUK</h3>
       </div>
 <div class="panel-body">
     <div class="row">
     <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="table-responsive" >
 <table class="table table-striped table-bordered" id="table">
     <thead style="text-align: center;">
    <tr>
        <th>No</th>
       <th>Tanggal Masuk</th>
         <th>Nama Bahan Makanan</th>
         <th>Jumlah Masuk</th>                                                           
 </tr>
 </thead>
    <tbody>
  <?php 
   $no=1;
   foreach ($masuk as $barang_masuk) {
  ?>
 <tr id="hps">
   <td><?=$no++;?></td>
    <td><?=tgl_indo(tgl_database($barang_masuk['tgl']));?></td>
     <td><?=$barang_masuk['nama_barang'];?></td>
      <td><?=$barang_masuk['jumlah'];?></td>
 </tr>
  <?php 
     }
 ?>
 </tbody>
  </table>
       </div>
 </div>
      </div>
  </div>
      </div>
 </div>
 <script>
 $(document).ready(function(){
      $("#table").DataTable();
     $("#nama_barang").hide();
     $("#namae").hide();
     $("#ok").hide();
     $("#ok2").hide();
});
 
 function jenifs(){
         var el  = $("#nama_barang").val();
         jml_min = $("#nama_barang option:selected").attr("jml_min");
         
          
         $("#kode_barang").val(el);
         $("#jumlah_min").val(jml_min);
    }

function jenisk(){
       var el  = $("#namae").val();
         jml_min = $("#namae option:selected").attr("jml_min");
         
          
         $("#kode_barang").val(el);
         $("#jumlah_min").val(jml_min);
    }

 function jenise(){
   var jenise = $("#jenis").val();
  if(jenise == "basah"){
    $("#ok2").hide();  
    $("#namae").hide();
      $("#nama_barang").show();  
      $("#ok").show();  
  }else if(jenise == "kering"){
    $("#ok").hide();  
    $("#namae").show();
      $("#nama_barang").hide();  
      $("#ok2").show();  
  }else{
    $("#ok2").hide();  
    $("#namae").hide();
     $("#ok").hide();  
      $("#nama_barang").hide(); 
  }
  
  
}
 </script>
