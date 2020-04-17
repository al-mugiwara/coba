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
         Sortir Laporan
 </h3>
 <div class="clearfix"></div>
        </div>
 <div id="portlet1" class="panel-collapse collapse in">
       <div class="portlet-body">
             <div class=" form">
          <form class="cmxform form-horizontal tasi-form" method="POST" action="<?=base_url()?>Ahli_gizi/cetak_pengajuan/cetak_semua">
   <div class="form-group">
        <label class="control-label col-lg-2">Pilih Bulan</label>
        <div class="col-lg-10">
           <select class=" form-control select2" data-placeholder="Pilih Bulan" id="bulan" name="bulan" required>
            <option value="">Pilih Bulan</option>                                                          
            <option value="01">Januari</option>                                                          
            <option value="02">Februari</option>                                                          
            <option value="03">Maret</option>                                                          
            <option value="04">April</option>                                                          
            <option value="05">Mei</option>                                                          
            <option value="06">Juni</option>                                                          
            <option value="07">Juli</option>                                                          
            <option value="08">Agustus</option>                                                          
            <option value="09">September</option>                                                          
            <option value="10">Oktober</option>                                                          
            <option value="11">November</option>                                                          
            <option value="12">Desember</option>                                                          
  </select>
   </div>
</div>
 <div class="form-group">
     <div class="col-lg-offset-2 col-lg-10">
      <button class="btn btn-inverse waves-effect waves-light" target="_blank" id="sbm" name="submit" type="submit"><i class="ion-printer"></i> Cetak Semua Permintaan</button>
      </div>
 </div>
   </form>
  </div> <!-- form -->
  </div>
</div> <!-- panel-body -->
   </div> <!-- panel -->
   </div> <!-- col -->
</div> <!-- End row -->
 <div class="row">
       <div class="col-md-12">
          <div class="panel panel-danger">
    <div class="panel-heading">
          <h3 class="panel-title text-white">LIST DATA PENGAJUAN</h3>
     </div>
  <div class="panel-body">
<div class="row">
 <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive" >
 <table class="table table-striped table-bordered" id="table">
       <thead style="text-align: center;">
       <tr>
          <th>No</th>
         <th>Tanggal Pengajuan</th>
          <th>Kode Bahan Makanan</th>
           <th>Jumlah Tersisa</th>                                           
            <th>Jumlah Yang Diajukan</th>                                                           
             <th>Status Ajuan</th>                                                           
              <th>Action</th>                                                           
         </tr>
     </thead>
 <tbody>
  <?php 
   $no=1;
    foreach ($data_pengajuan as $pengajuan) {
  ?> 
    <tr id="hps">
      <td><?=$no++;?></td>
    <td><?=tgl_indo(tgl_database($pengajuan['tgl_pengajuan']));?></td>
      <td><?=$pengajuan['kode_barang'];?></td>
       <td><?=$pengajuan['jml_tersisa'];?></td>
       <td><?=$pengajuan['jml_ajuan'];?></td>
       <td><?=$pengajuan['status_ajuan'];?></td>
        <td>
      <a href="<?=base_url()?>Ahli_gizi/action/<?=$pengajuan['id_pengajuan'];?>" class="btn btn-info"> <i class="ion-edit"></i></a>
       <a href="<?=base_url()?>Ahli_gizi/cetak_pengajuan/<?=$pengajuan['id_pengajuan'];?>" class="btn btn-inverse" target="_blank"> <i class="ion-printer"></i></a>
       <?php 
        if($pengajuan['status_ajuan'] == "sudah"){
          ?>
          <a href="<?=base_url()?>Ahli_gizi/ubah_status/<?=$pengajuan['id_pengajuan'];?>/ditolak" class="btn btn-danger" > <i class="glyphicon glyphicon-remove"></i></a>
       <a href="<?=base_url()?>Ahli_gizi/ubah_status/<?=$pengajuan['id_pengajuan'];?>/acc" class="btn btn-success"> <i class="glyphicon glyphicon-ok"></i></a>
          <?php 
        }

        ?>
       
     </td>
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
  </div>