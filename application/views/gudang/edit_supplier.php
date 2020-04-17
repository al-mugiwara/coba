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
 <div class="panel-heading"><h3 class="panel-title text-white">Form Edit Data Supplier</h3></div>
     <div class="panel-body">
         <div class=" form">
   <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" enctype="multipart/form-data" action="<?=base_url();?>logistik/edit_supplier/<?=$edit['id_supplier'];?>">
       <input type="hidden" name="id_supplier" value="<?=$edit['id_supplier'];?>">
      <div class="form-group"> 
  <label for="cname" class="control-label col-lg-2">Nama Supplier</label>
    <div class="col-lg-10">
         <input type="text" class="form-control" placeholder="Nama Supplier" name="nama_supplier" id="nama_supplier" value="<?=$edit['nama_supplier'];?>" required> 
    </div>
 </div> 
     <div class="form-group ">
  <label for="cname" class="control-label col-lg-2">Alamat Supplier</label>
     <div class="col-lg-10">
       <textarea class="form-control " id="alamat" name="alamat" required="" aria-required="true"><?=$edit['alamat_supplier'];?></textarea>
  </div>
 </div>
<div class="form-group"> 
 <label for="cname" class="control-label col-lg-2">No. Hp</label>
     <div class="col-lg-10">
      <input type="number" class="form-control" placeholder="No Hp" name="no_hp" id="no_hp" value="<?=$edit['no_hp'];?>" required> 
  </div>
    </div> 
  <div class="form-group"> 
     <label for="cname" class="control-label col-lg-2">Email</label>
     <div class="col-lg-10">
      <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="<?=$edit['email'];?>" required> 
            </div>
 </div> 
   <div class="form-group">
     <div class="col-lg-offset-2 col-lg-10">
       <button class="btn btn-success waves-effect waves-light" name="submit" type="submit">Simpan</button>
         <a href="<?=base_url('logistik/supplier');?>" class="btn btn-default waves-effect">Batal</a>
     </div>
   </div>
  </form>
    </div> <!-- .form -->
  </div> <!-- panel-body -->
      </div> <!-- panel -->
  </div> <!-- col -->
  </div> <!-- End row -->
                       
                  