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
          <div class="panel-heading"><h3 class="panel-title text-white">Form Edit Pengajuan</h3></div>
           <div class="panel-body">
        <div class=" form">
            <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" enctype="multipart/form-data" action="<?=base_url();?>ahli_gizi/action/<?=$ajuan['id_pengajuan'];?>" novalidate="novalidate">
       <input type="hidden" name="id_pengajuan" value="<?=$ajuan['id_pengajuan'];?>">
 <div class="form-group ">
        <label for="cname" class="control-label col-lg-2">Tanggal Pengajuan</label>
 <div class="col-lg-10">
      <input class=" form-control" id="tgl_pengajuan" name="tgl_pengajuan" value="<?=$ajuan['tgl_pengajuan'];?>" type="date" required>
    </div>
   </div>
 <div class="form-group ">
     <label for="cemail" class="control-label col-lg-2">Kode Bahan Makanan</label>
    <div class="col-lg-10">
  <input class="form-control " id="kode_barang" type="text" name="kode_barang" aria-required="true" placeholder="Kode Barang" value="<?=$ajuan['kode_barang'];?>" readonly required>
    </div>
 </div>
 <div class="form-group ">
      <label for="cemail" class="control-label col-lg-2">Jumlah Tersisa</label>
    <div class="col-lg-10">
       <input class="form-control " id="jml_tersisa" type="number" name="jml_tersisa" aria-required="true" placeholder="Kode Barang" value="<?=$ajuan['jml_tersisa'];?>" readonly required>
    </div>
 </div>
 <div class="form-group ">
       <label for="cemail" class="control-label col-lg-2">Jumlah Minimal Tersedia</label>
          <div class="col-lg-10">
           <input class="form-control " id="jml_minimal" type="number" name="jml_minimal" aria-required="true" placeholder="Kode Barang" value="<?=$ajuan['jml_minimal'];?>" readonly required>
           </div>
     </div>
 <div class="form-group ">
        <label for="cemail" class="control-label col-lg-2">Jumlah Ajuan</label>
           <div class="col-lg-10">
           <input class="form-control " id="jml_ajuan" type="number" name="jml_ajuan" aria-required="true" placeholder="Kode Barang" value="<?=$ajuan['jml_ajuan'];?>"required>
          </div>
 </div>
 <div class="form-group">
      <div class="col-lg-offset-2 col-lg-10">
        <button class="btn btn-primary waves-effect waves-light" name="submit" type="submit">Simpan</button>
        <a href="<?=base_url('ahli_gizi/cetak');?>" class="btn btn-default waves-effect">Batal</a>
    </div>
 </div>
     </form>
 </div> <!-- .form -->
      </div> <!-- panel-body -->
   </div> <!-- panel -->
</div> <!-- col -->
 </div> <!-- End row -->
                       