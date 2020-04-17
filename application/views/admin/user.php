
  <div class="row">
        <div class="col-sm-12">
         <h4 class="pull-left page-title"><i class="fa fa-calendar"></i>&nbsp;<span id="clock"></span></h4>
          <ol class="breadcrumb pull-right">
          <li><a href="#">Admin</a></li>
             <li class="active"><?=$judul;?></li>
         </ol>
    </div>
   </div>      
   </div> <!-- End row -->
   <?php
    $pesan = $this->session->userdata('pesan');
     if($pesan){
        ?>
           <script type="text/javascript">

           alert("Username Sudah Digunakan");
           </script>   
        <?php
    $this->session->unset_userdata('pesan');
                           }
                           ?>
 <div class="col-md-12">
     <div class="panel panel-danger">
      <div class="panel-heading">
        <h3 class="panel-title text-white">LIST DATA PENGGUNA </h3>
     </div>
<div class="col-sm-6">
    <div class="m-b-30">
 <br />
 &nbsp;&nbsp;<button onclick="tambah()" class="btn btn-danger waves-effect waves-light"><i class="fa fa-plus"></i>Tambah Data User</button>
    </div>
 </div>
  <div class="panel-body">
      <div class="row">
 <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="table-responsive" >
<table class="table table-striped table-bordered" id="table">
     <thead style="text-align: center;">
        <tr>
             <th>No</th>
            <th>Username</th>
             <th>Hak Akses</th>
           <th style="width: 15%">Aksi</th>                                                            
      </tr>
   </thead>
  <tbody>
    <?php 
     $no=1;
      foreach($pengguna as $user){

      ?>
      
  <tr id="hps">
   <td><?=$no++;?></td>
   <td><?=$user['username'];?></td>
    <td><?=$user['login_hash'];?></td>
     <td><a href="<?=base_url()?>admin/edit_user/<?=$user['id_username'];?>" class="btn btn-info"> <i class="ion-edit"></i></a>
      <a onclick="hapus(<?=$user['id_username'];?>)" class="btn btn-danger"> <i class="ion-trash-a"></i></a></td>
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
 });
function tambah(){
     $('#con-close-modal').modal('show');
     $('#form')[0].reset();
}
function hapus(id_username){
     swal({   
        title: "Hapus Data User?",   
        text: "Anda Akan Menghapus Data User!",   
       type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
         confirmButtonText: "Hapus!",   
          cancelButtonText: "Batal!",   
          closeOnConfirm: false,   
          closeOnCancel: false 
 }, function(isConfirm){ 
      if(isConfirm){
         $.ajax({
             url : "<?=base_url('admin/delete_user/')?>",
             type : "POST",
             data : {id_username:id_username},
    success: function(){
          swal("Data Berhasil Dihapus!"," ", "success");
              $('#hps').fadeTo("fast",0.1, function(){
               $(this).remove();
                location.reload();
            })
},
error : function(){
       swal('Data Gagal Dihapus','Error');
         }
  });
  }else{
     swal("Dibatalkan", " ", "error"); 
}  
 });
}
  </script>
     <form action="<?=base_url();?>admin/user_save" enctype="multipart/form-data" method="POST" id="form">
        <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
<div class="modal-dialog"> 
     <div class="modal-content"> 
      <div class="modal-header"> 
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
        <h4 class="modal-title">Form Tambah User</h4> 
        </div> 
   <div class="modal-body"> 
        <div class="row"> 
      <div class="col-md-12"> 
          <div class="form-group"> 
     <label  class="control-label">Username</label> 
        <input type="text" class="form-control" placeholder="Username"  name="username" id="username" required> 
      </div> 
  </div>
      <div class="col-md-6"> 
             <div class="form-group"> 
         <label  class="control-label">Password</label> 
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required> 
        </div> 
 </div> 
   <div class="col-md-6"> 
        <div class="form-group"> 
             <label  class="control-label">Hak Akses</label> 
     <select class="form-control" id="login_hash" name="login_hash" required>
                  <option value="">--Pilih Hak Akses--</option>
                   <option value="bagian_gudang">Bagian Gudang</option>
                  <option value="ahli_gizi">Ahli Gizi</option>
                   <option value="bagian_keuangan">Bagian Keuangan</option>
      </select> 
    </div> 
  </div>
     </div>
 <div class="modal-footer"> 
       <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button> 
          <button type="submit" class="btn btn-info waves-effect waves-light">Simpan</button> 
    </div> 
  </div>
      </form>
 </div>
      </div>
   </div>
   <script type="text/javascript">
     
   </script>
    