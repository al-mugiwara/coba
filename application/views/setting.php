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
        <div class="panel panel-danger">
       <div class="panel-heading"><h3 class="panel-title text-white">Form Setting Akun</h3></div>
  <div class="panel-body">
     <div class=" form">
<form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" enctype="multipart/form-data" action="<?=base_url();?>setting/save_edit" novalidate="novalidate">
    <input type="hidden" name="id_username" value="<?=$edit['id_username'];?>">
  <div class="form-group ">
      <label for="cname" class="control-label col-lg-2">Username</label>
     <div class="col-lg-10">
 <input class=" form-control" id="username" name="username" type="text" value="<?=$edit['username'];?>" placeholder="Nama Dokter" required>
       </div>
     </div>
 <div class="form-group ">
     <label for="cemail" class="control-label col-lg-2">Password</label>
        <div class="col-lg-10">
        <input class="form-control " id="password" type="password" name="password" required="Email Dokter" aria-required="true" value="<?=$edit['password'];?>" placeholder="Password" required>
     </div>
   </div>
 <?php 
    if($edit['login_hash'] != "administrator"){
 ?>
 <div class="form-group">
      <label class="control-label col-lg-2">Hak Akses</label>
         <div class="col-lg-10">
          <select class=" form-control select2" data-placeholder="Pilih Akses" id="hak_akses" name="hak_akses" required disabled>
            <option value="">Pilih Hak Akses</option>
             <option value="bagian_gudang"
   <?php 
      if($edit['login_hash'] == "bagian_gudang")
          echo "selected";
 ?>
  >Bagian Gudang</option>
        <option value="ahli_gizi"
<?php 
     if($edit['login_hash'] == "ahli_gizi")
      echo "selected";
   ?>
 >Ahli Gizi</option>
 <option value="bagian_keuangan"
    <?php 
     if($edit['login_hash'] == "bagian_keuangan")
         echo "selected";
    ?>
>Bagian Keuangan</option>
 </select>
   </div>
</div>
 <?php 
   }else{
 ?>
 <div class="form-group">
    <label class="control-label col-lg-2">Hak Akses</label>
  <div class="col-lg-10">
    <select class=" form-control select2" data-placeholder="Pilih Akses" id="hak_akses" name="hak_akses" required readonly>
       <option value="administrator" selected>Administrator</option>
   </select>
     </div>
 </div>
 <?php 
    }
 ?>
  <div class="form-group">
      <div class="col-lg-offset-2 col-lg-10">
        <button class="btn btn-success waves-effect waves-light" type="submit">Simpan</button>
        </div>
      </div>
 </form>
     </div> <!-- .form -->
  </div> <!-- panel-body -->
 </div> <!-- panel -->
   </div> <!-- col -->
 </div> <!-- End row -->
                       