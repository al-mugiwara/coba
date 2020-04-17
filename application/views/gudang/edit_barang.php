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
        <div class="panel-heading"><h3 class="panel-title text-white">Form Edit Data Bahan Makanan</h3></div>
      <div class="panel-body">
  <div class=" form">
      <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" enctype="multipart/form-data" action="<?=base_url();?>logistik/save_edit/<?=$edit['kode_barang'];?>">
        <input type="hidden" name="id_persediaan" value="<?=$edit2['id_persediaan'];?>">
 <div class="form-group"> 
       <label for="cname" class="control-label col-lg-2">Kode Bahan Makanan</label>
       <div class="col-lg-10">
       <input type="text" class="form-control" placeholder="Kode Bahan" name="kode_barang" id="kode_barang" value="<?=$edit['kode_barang'];?>" readonly required> 
   </div>
        </div> 
     <div class="form-group ">
   <label for="cname" class="control-label col-lg-2">Nama Bahan Makanan</label>
       <div class="col-lg-10">
       <input class=" form-control" id="nama_barang" name="nama_barang" type="text" value="<?=$edit['nama_barang'];?>" placeholder="Nama Bahan" required>
  </div>
   </div>
     <div class="form-group ">
    <label for="cname" class="control-label col-lg-2">Satuan Bahan Makanan</label>
   <div class="col-lg-10">
     <input class=" form-control" id="satuan_barang" name="satuan_barang" type="text" value="<?=$edit['satuan'];?>" placeholder="Satuan Bahan" required>
  </div>
     </div>
       <div class="form-group ">
      <label for="cname" class="control-label col-lg-2">Jumlah Minimal Tersedia</label>
     <div class="col-lg-10">
    <input class=" form-control" id="jml_minimal" name="jml_minimal" type="number" value="<?=$edit['jml_minimal'];?>" placeholder="Jumlah Minimal" required>
  </div>
       </div>
                                              
  <div class="form-group">
    <label class="control-label col-lg-2">Jenis Bahan Makanan</label>
        <div class="col-lg-10">
          <select class=" form-control select2" data-placeholder="Jenis Bahan" id="jenis_barang" name="jenis_barang" required onchange="jenis()">
       <option value="">Pilih Hak Akses</option>
         <option value="basah"
         <?php 
        if($edit['jenis_barang'] == "basah")
             echo "selected";
          ?>
   >Basah</option>
        <option value="kering"
          <?php 
          if($edit['jenis_barang'] == "kering")
           echo "selected";
        ?>
       >Kering</option>
  </select>
      </div>
    </div>
  <div class="form-group">
     <label class="control-label col-lg-2">Supplier</label>
         <div class="col-lg-10">
     <select class=" form-control select2" data-placeholder="Jenis Bahan" id="supplier" name="supplier" required >
         <option value="">Pilih Supplier</option>
         <?php foreach($data_supplier as $supplier): ?>
        <option
       <?php if($supplier['id_supplier'] == $edit['id_supplier']): ?>
            selected
      <?php endif; ?>
         value="<?=$supplier['id_supplier'];?>"><?=$supplier['nama_supplier'];?></option>
       <?php endforeach; ?>
    </select>
        </div>
   </div>
   <div class="form-group">
         <div class="col-lg-offset-2 col-lg-10">
          <button class="btn btn-success waves-effect waves-light" type="submit">Simpan</button>
     <a href="<?=base_url('logistik/barang');?>" class="btn btn-default waves-effect">Batal</a>
      </div>
 </div>
   </form>
 </div> <!-- .form -->
 </div> <!-- panel-body -->
   </div> <!-- panel -->
    </div> <!-- col -->

  </div> <!-- End row -->
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
