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
       <h3 class="panel-title text-white">LIST DATA BAHAN MAKANAN</h3>
     </div>
<div class="col-sm-6">
     <div class="m-b-30">
 <br />
  &nbsp;&nbsp;<button onclick="tambah()" class="btn btn-danger waves-effect waves-light"><i class="fa fa-plus"></i>Tambah Data Bahan Makanan</button>
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
          <th>Kode Bahan Makanan</th>
           <th>Nama Bahan Makanan</th>
         <th>Satuan Bahan Makanan</th>
          <th>Jenis Bahan Makanan</th>
           <th>Stok Tersedia</th>
          <th>Minimal Tersedia</th>
       <th>Suppplier</th>
       <th>QR Code</th>
  <th style="width: 15%">Aksi</th>                                                            
      </tr>
    </thead>
    <tbody>
      <?php 
          $no=1;
         foreach($barang as $data){
           ?>
     <tr id="hps">
          <td><?=$no++;?></td>
         <td><?=$data['kode_barang'];?></td>
          <td><?=$data['nama_barang'];?></td>
          <td><?=$data['satuan'];?></td>
           <td><?=$data['jenis_barang'];?></td>
           <td><?=$data['stok_tersedia'];?></td>
        <td><?=$data['jml_minimal'];?></td>
        <td><?=$data['nama_supplier'];?></td>
        <td><img src="<?=base_url();?>assets/images/<?=$data['qrcode'];?>" width="100px"></td>
       <td><a href="<?=base_url()?>logistik/edit_barang/<?=$data['kode_barang'];?>/<?=$data['id_persediaan'];?>" class="btn btn-info"> <i class="ion-edit"></i></a>
      <a onclick="hapus('<?=$data['kode_barang'];?>')" class="btn btn-danger"> <i class="ion-trash-a"></i></a></td>
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
 function hapus(kode_barang){
     swal({   
     title: "Hapus Data Bahan?",   
     text: "Anda Akan Menghapus Data Bahan!",   
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
       url : "<?=base_url('logistik/delete_barang/')?>",
        type : "POST",
      data : {kode_barang:kode_barang},
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
   console.log(kode_barang);
           }

   </script>
  <form action="<?=base_url();?>logistik/barang_save" enctype="multipart/form-data" method="POST" id="form">
 <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
       <div class="modal-dialog"> 
  <div class="modal-content"> 
      <div class="modal-header"> 
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
       <h4 class="modal-title">Form Tambah Bahan Makanan</h4> 
       </div> 
        <div class="modal-body"> 
   <div class="row"> 
         <div class="col-md-12"> 
           <div class="form-group"> 
          <label  class="control-label">Kode Bahan Makanan</label> 
           <input type="text" class="form-control" placeholder="Kode Bahan" name="kode_barang" id="kode_barang" readonly required> 
     </div> 
         </div>
    <div class="col-md-6"> 
         <div class="form-group"> 
         <label  class="control-label">Nama Bahan Makanan</label> 
          <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Bahan" required> 
       </div> 
          </div> 
    <div class="col-md-6"> 
         <div class="form-group"> 
       <label  class="control-label">Jenis Bahan Makanan</label> 
        <select class="form-control" id="jenis_barang" name="jenis_barang" onchange="jenis()" required readonly>
        <option value="">--Pilih Jenis Bahan--</option>
      <option value="basah">Basah</option>
         <option value="kering">Kering</option>
      </select> 
    </div> 
 </div> 
      <div class="col-md-6"> 
   <div class="form-group"> 
   <label  class="control-label">Satuan Bahan Makanan</label> 
       <input type="text" class="form-control" id="satuan_barang" name="satuan_barang" placeholder="Satuan Bahan" required> 
    </div> 
   </div> 
   <div class="col-md-6"> 
         <div class="form-group"> 
        <label  class="control-label">Jumlah Minimal Tersedia</label> 
          <input type="number" class="form-control" id="jml_minimal" name="jml_minimal" placeholder="Jumlah Minimal" required> 
       </div> 
   </div>  
       <div class="col-md-12"> 
      <div class="form-group"> 
      <label  class="control-label">Supplier</label> 
     <select class="form-control" id="supplier" name="supplier" required>
     <option value="">--Pilih Supplier--</option>
     <?php foreach($data_supplier as $supplier): ?>
      <option value="<?=$supplier['id_supplier'];?>"><?=$supplier['nama_supplier'];?></option>
          <?php endforeach; ?>
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
    <script>
  function jenis(){
         jenis_barang = $('#jenis_barang').val();
         if(jenis_barang == "basah"){
             if(<?=$kode_barang;?> < 1){
              $('#kode_barang').val("B"+1);
                  }else{
                  $('#kode_barang').val("B"+<?=++$kode_barang;?>);
                    }
         }else if(jenis_barang == "kering"){
              if(<?=$kodes_barang;?> < 1){
                   $('#kode_barang').val("K"+1);
                }else{
         $('#kode_barang').val("K"+<?=++$kodes_barang;?>);
           }
   }else{
       $('#kode_barang').val("");
         }
    }

        </script>

    