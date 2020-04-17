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
    <?=$judul;?>
   </h3>
<div class="clearfix"></div>
 </div>
<div id="portlet1" class="panel-collapse collapse in">
    <div class="portlet-body">
       <div class=" form">
 <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" enctype="multipart/form-data" action="<?=base_url();?>logistik/ajukan_stok/<?=$kode_barang;?>/<?=$jml_tersisa;?>/<?=$supplier['id_supplier'];?>">
       <div class="form-group"> 
          <label for="cname" class="control-label col-lg-2">Tanggal </label>
        <div class="col-lg-10">
           <input type="date" class="form-control" placeholder="Tanggal" name="tanggal" id="tanggal"  readonly required value="<?=date('Y-m-d');?>"> 
          </div>
  </div> 
  <div class="form-group ">
       <label for="cname" class="control-label col-lg-2">Kode Barang</label>
         <div class="col-lg-10">
      <input class=" form-control" id="kode_barang" name="kode_barang" type="text"  placeholder="Nama Barang" required readonly>
  </div>
     </div>
 <div class="form-group">
    <label class="control-label col-lg-2">Nama Barang</label>
   <div class="col-lg-10">
      <select class=" form-control select2" id="nama_barang" name="nama_barang" required readonly disabled="readonly">
         <option value="">Pilih Barang</option>
 <?php 
     foreach ($barang as $data_barang) {
 ?>
  <option value="<?=$data_barang['kode_barang'];?>" jml_minimal="<?=$data_barang['jml_minimal'];?>" kode="<?=$data_barang['kode_barang'];?>"
<?php 
     if($kode_barang ==  $data_barang['kode_barang']):
 ?>
  selected
 <?php endif ?>
><?=$data_barang['nama_barang'];?></option>
 <?php 
    }
 ?>
    </select>
 </div>
  </div>
 <div class="form-group ">
    <label for="cname" class="control-label col-lg-2">Supplier</label>
 <div class="col-lg-10">
      <input class="form-control" id="supplier" name="supplier" type="text"  placeholder="Supplier" value="<?=$supplier['nama_supplier'];?>" required readonly>
    </div>
  </div>
 <div class="form-group ">
 <label for="cname" class="control-label col-lg-2">Jumlah Tersisa</label>
    <div class="col-lg-10">
       <input class=" form-control" id="jumlah_tersisa" name="jumlah_tersisa" type="number"  placeholder="Jumlah tersisa" required readonly value="<?=$jml_tersisa;?>">
      </div>
  </div>
     <div class="form-group ">
       <label for="cname" class="control-label col-lg-2">Jumlah Minimal</label>
     <div class="col-lg-10">
         <input class=" form-control" id="jumlah_minimal" name="jumlah_minimal" type="number"  placeholder="Jumlah Minimal" required readonly>
     </div>
  </div>
  <div class="form-group ">
      <label for="cname" class="control-label col-lg-2">Jumlah Ajuan</label>
    <div class="col-lg-10">
         <input class=" form-control" id="jumlah" name="jumlah" type="number"  placeholder="Jumlah Ajuan" required>
       </div>
 </div>
<div class="form-group">
     <div class="col-lg-offset-2 col-lg-10">
         <button class="btn btn-primary waves-effect waves-light" name="submit" type="submit">Mengajukan</button>
   </div>
     </div>
 </form>
      </div> <!-- .form -->
 </div>
   </div> <!-- panel-body -->
   </div> <!-- panel -->
   </div> <!-- col -->
 </div> <!-- End row -->
 <script type="text/javascript">
 $(document).ready(function(){
       var el  = $("#nama_barang option:selected").attr("kode");
        var jumlah_minimal  = $("#nama_barang option:selected").attr("jml_minimal");
        $("#kode_barang").val(el);
      $("#jumlah_minimal").val(jumlah_minimal);
});
</script>