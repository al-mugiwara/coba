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
     Cetak Label Bahan Makanan
       </h3>
  <div class="clearfix"></div>
              </div>
     <div id="portlet1" class="panel-collapse collapse in">
 <div class="portlet-body">
    <div class=" form">
    <form class="cmxform form-horizontal tasi-form" method="POST" id="form">
      <input type="hidden" name="tgl_sekarang" id="tgl_sekarang" value="<?=date('Y-m-d');?>">
    <div class="form-group"> 
      <label for="cname" class="control-label col-lg-2">Tanggal Masuk</label>
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
    <button class="btn btn-primary waves-effect waves-light" id="sbm" name="submit" onclick="validasi()">Cetak</button>
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
   function validasi(){
       tgl_awal = $("#tgl_awal").val();
      tgl_sekarang = $("#tgl_sekarang").val();
      if(tgl_awal>tgl_sekarang){
          alert("Tanggal Melebihi hari ini");  
        }else if($tgl_akhir<$tgl_awal){
       alert("Tanggal akhir kurang dari tanggal awal");
        }
      else{
           $("#form").attr("action","<?=base_url('logistik/label');?>");
           $("#sbm").attr('target','_blank');
           $('#sbm').attr('type','submit');
     }
   }
 </script>