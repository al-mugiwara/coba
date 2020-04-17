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
          Form Pengeluaran Bahan Makanan
      </h3>
  <div class="clearfix"></div>
 </div>
    <div id="portlet1" class="panel-collapse collapse in">
        <div class="portlet-body">
         <div class=" form">
             <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" enctype="multipart/form-data" action="<?=base_url();?>logistik/save_keluar">
 <div class="form-group"> 
      <label for="cname" class="control-label col-lg-2">Tanggal </label>
  <div class="col-lg-10">
         <input type="date" class="form-control" placeholder="Tanggal" name="tanggal" id="tanggal"   required value="<?=date('Y-m-d');?>"> 
     </div>
 </div> 
  <div class="form-group ">
       <label for="cname" class="control-label col-lg-2">Kode Bahan Makanan</label>
      <div class="col-lg-10">
    <input class=" form-control" id="kode_barang" name="kode_barang" type="text"  placeholder="Nama Bahan" required readonly>
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
   <div class="form-group" id="ok">
       <label class="control-label col-lg-2">Nama Bahan Makanan</label>
 <div class="col-lg-10">
       <select class=" form-control select2"  id="nama_barang" name="nama_kering" novalidate onchange="jenifs()">
             <option value="">Pilih Bahan</option>
 <?php 
     foreach ($barang as $data_barang) {
   ?>
    <option value="<?=$data_barang['kode_barang'];?>" satuan="<?=$data_barang['satuan'];?>" kode="<?=$data_barang['kode_barang'];?>" persediaan="<?=$data_barang['stok_tersedia'];?>"><?=$data_barang['nama_barang'];?></option>
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
    <option value="<?=$data_barang['kode_barang'];?>" satuan="<?=$data_barang['satuan'];?>" kode="<?=$data_barang['kode_barang'];?>" persediaan="<?=$data_barang['stok_tersedia'];?>"><?=$data_barang['nama_barang'];?></option>
  <?php 
     }
   ?>
  </select>
     </div>
   </div>
   <div class="form-group ">
       <label for="cname" class="control-label col-lg-2">Satuan Bahan Makanan</label>
      <div class="col-lg-10">
    <input class=" form-control" id="satuan" name="satuan" type="text"  placeholder="Satuan Bahan" required readonly>
       </div>
 </div>
    <input type="hidden" name="tersedia" id="tersedia">
     <div class="form-group" id="id_jml">
           <label for="cname" class="control-label col-lg-2">Jumlah Bahan Makanan</label>
            <div class="col-lg-10">
    <input type="number" class="form-control" onkeyup="cek()" name="jml_barang" id="jml_barang" placeholder="Jumlah Bahan" required>
           <p id="lebih" style="color:red"></p>
    <span id="error"></span><br />
        <div id="info">
         <div id="btn"></div>
  </div>
       </div>
</div>
 <div class="form-group">
     <div class="col-lg-offset-2 col-lg-10">
<button class="btn btn-success waves-effect waves-light" id="sbm" type="submit">Simpan</button>
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
<h3 class="panel-title text-white">LIST DATA BAHAN MAKANAN KELUAR</h3>
          </div>
<div class="panel-body">
   <div class="row">
     <div class="col-md-12 col-sm-12 col-xs-12">
       <div class="table-responsive" >
<table class="table table-striped table-bordered" id="table">
       <thead style="text-align: center;">
         <tr>
           <th>No</th>
            <th>Tanggal Keluar</th>
              <th>Nama Bahan Makanan</th>
              <th>Jumlah Keluar</th>                                                          
           </tr>
      </thead>
  <tbody>
    <?php 
    $no=1;
  foreach ($keluar as $barang_keluar) {
   ?>
 <tr id="hps">
    <td><?=$no++;?></td>
     <td><?=tgl_indo(tgl_database($barang_keluar['tgl']));?></td>
      <td><?=$barang_keluar['nama_barang'];?></td>
       <td><?=$barang_keluar['jumlah'];?></td>
  </tr>
  <?php 
    }?>
 </tbody>
  </table>
      </div>
  </div>
       </div>
  </div>
        </div>
  </div>
 
  <script type="text/javascript">
function jenifs(){
         var el  = $("#nama_barang option:selected").attr("kode");
         tersedia = $("#nama_barang option:selected").attr("persediaan");
         satuan = $("#nama_barang option:selected").attr("satuan");
          $("#tersedia").val(tersedia);
         $("#kode_barang").val(el);
         $("#satuan").val(satuan);
    }

function jenisk(){
       var el  = $("#namae option:selected").attr("kode");
         tersedia = $("#namae option:selected").attr("persediaan");
         satuan = $("#namae option:selected").attr("satuan");
          $("#tersedia").val(tersedia);
         $("#kode_barang").val(el);
         $("#satuan").val(satuan);
    }
function cek(){
   jml_tersedia = parseInt($("#tersedia").val());
    input = parseInt($("#jml_barang").val());
 if(input<1){
       $("#sbm").attr({
        'disabled':'disabled',
      }); 
   }else if(input>jml_tersedia){
     $("#jml_barang").removeClass();
     $("#id_jml").removeClass();
     $("#error").removeClass();
     $("#id_jml").addClass('form-group has-error has-feedback');
     $("#jml_barang").addClass('form-control inputmask');
     $("#error").addClass('glyphicon glyphicon-remove form-control-feedback');
     $("#info").addClass('alert alert-info alert-dismissable');
     $("#btn").html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Stok Bahan<a href='#' class='alert-link'>&nbsp;"+jml_tersedia+"</a>");
     $("#lebih").html("Jumlah yang diinput melebihi stok tersedia");
     $("#sbm").attr({
         'disabled':'disabled',
      }); 
     }else if(input<jml_tersedia){
      $("#jml_barang").removeClass();
      $("#id_jml").removeClass();
      $("#error").removeClass();
      $("#id_jml").addClass('form-group  has-success has-feedback');
      $("#jml_barang").addClass('form-control inputmask');
      $("#error").addClass('glyphicon glyphicon-ok form-control-feedback');
      $("#info").addClass('alert alert-info alert-dismissable');
      $("#btn").html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Stok Bahan<a href='#' class='alert-link'>&nbsp;"+jml_tersedia+"</a>");
      $("#lebih").html("");
      $("#sbm").removeAttr('disabled');
    }else if(input == jml_tersedia){
      $("#jml_barang").removeClass();
      $("#id_jml").removeClass();
      $("#error").removeClass();
      $("#id_jml").addClass('form-group  has-warning has-feedback');
      $("#jml_barang").addClass('form-control inputmask');
      $("#error").addClass('glyphicon glyphicon-warning-sign form-control-feedback');
      $("#info").addClass('alert alert-info alert-dismissable');
      $("#btn").html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Stok Bahan<a href='#' class='alert-link'>&nbsp;"+jml_tersedia+"</a>");
      $("#lebih").html("");
      $("#sbm").removeAttr('disabled');
 }else if(isNaN(input) || isNaN(jml_tersedia)){
      $("#jml_barang").removeClass();
      $("#id_jml").removeClass();
      $("#error").removeClass();
      $("#id_jml").addClass('form-group');
      $("#jml_barang").addClass('form-control');
      $("#lebih").html("");
      $("#info").removeClass();
      $("#btn").empty();
      $("#sbm").attr({
        'disabled':'disabled',
      }); 
    }
}

function jenise(){
   var jenise = $("#jenis") .val();
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
  $(document).ready(function(){
     $("#table").DataTable();
     $("#nama_barang").hide();
     $("#namae").hide();
     $("#ok").hide();
     $("#ok2").hide();
 });
 </script>