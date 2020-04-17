 <div class="row">
  <div class="col-sm-12">
    <h4 class="pull-left page-title"><i class="fa fa-calendar"></i>&nbsp;<span id="clock"></span></h4>
      <ol class="breadcrumb pull-right">
         <li><a href="#"><?=$this->session->userdata('login_hash');?></a></li>
         <li class="active"><?=$judul;?></li>
       </ol>
  </div>
</div>      
</div> <!-- End row -->
 <div class="col-md-12">
     <div class="panel panel-danger">
      <div class="panel-heading">
        <h3 class="panel-title text-white">LIST DATA SUPPLIER </h3>
     </div>
<div class="col-sm-6">
    <div class="m-b-30">
      <br />
  &nbsp;&nbsp;<button onclick="tambah()" class="btn btn-danger waves-effect waves-light"><i class="fa fa-plus"></i>Tambah Data Supplier</button>
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
         <th>Nama Supplier</th>
         <th>Alamat Supplier</th>
         <th>No Hp</th>
         <th>Email</th>
         <th style="width: 15%">Aksi</th>                                                            
      </tr>
 </thead>
   <tbody>
     <?php 
      $no=1;
       foreach($data_supplier as $supplier){
    ?>
<tr id="hps">
    <td><?=$no++;?></td>
    <td><?=$supplier['nama_supplier'];?></td>
    <td><?=$supplier['alamat_supplier'];?></td>
   <td><?=$supplier['no_hp'];?></td>
   <td><?=$supplier['email'];?></td>
  <td><a href="<?=base_url()?>logistik/edit_supplier/<?=$supplier['id_supplier'];?>" class="btn btn-info"> <i class="ion-edit"></i></a>
   <a onclick="hapus(<?=$supplier['id_supplier'];?>)" class="btn btn-danger"> <i class="ion-trash-a"></i></a></td>
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
 function hapus(id_supplier){
    swal({   
      title: "Hapus Data Supplier?",   
      text: "Anda Akan Menghapus Data Supplier!",   
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
          url : "<?=base_url('logistik/delete_supplier')?>",
            type : "POST",
            data : {id_supplier:id_supplier},
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
  <form action="<?=base_url();?>logistik/supplier" enctype="multipart/form-data" method="POST" id="form">
     <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
     <div class="modal-dialog"> 
         <div class="modal-content"> 
           <div class="modal-header"> 
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
          <h4 class="modal-title">Form Tambah Supplier</h4> 
      </div> 
 <div class="modal-body"> 
     <div class="row"> 
     <div class="col-md-12"> 
<div class="form-group"> 
 <label  class="control-label">Nama Supplier</label> 
   <input type="text" class="form-control" placeholder="Nama Supplier" name="nama_supplier" id="nama_supplier" required> 
</div> 
    </div>
<div class="col-md-12"> 
  <div class="form-group"> 
  <label  class="control-label">Alamat Supplier</label> 
   <textarea class="form-control " id="alamat" name="alamat" required="" aria-required="true"></textarea>
   </div> 
 </div> 
  <div class="col-md-12"> 
     <div class="form-group"> 
       <label  class="control-label">No. Hp</label> 
      <input type="number" class="form-control" placeholder="No Hp" name="no_hp" id="no_hp" required> 
     </div> 
</div>
 <div class="col-md-12"> 
    <div class="form-group"> 
       <label  class="control-label">Email</label> 
       <input type="text" class="form-control" placeholder="Email Supplier" name="email" id="email" > 
     </div> 
  </div>
  </div>
  <div class="modal-footer"> 
       <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button> 
       <button type="submit" name="submit" class="btn btn-info waves-effect waves-light">Simpan</button> 
   </div> 
 </div>
   </form>
 </div>
  </div>
 </div>
                                       