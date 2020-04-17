 <style type="text/css">
   .mini-stat{
    height: 180px !important;
   }
 </style>
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
     <div class="col-lg-12">
       <div class="portlet"><!-- /portlet heading -->
        <div class="portlet-heading bg-danger">
          <h3 class="portlet-title text-uppercase">
             <?=$sub_judul;?>
    </h3>
 <div class="clearfix"></div>
      </div>
   <div id="portlet1" class="panel-collapse collapse in">
    <div class="portlet-body">
          <div class="row">
              <div class="col-md-12">
     <tr>
         <td width="28%">&nbsp;</td>
           <td width="41%">
            <center>
               Selamat datang, <b><?=$this->session->userdata('username');?></b> di halaman dashboard Gudang. Pada aplikasi ini Anda dapat melihat data semua Bahan <br /> yang ada. Anda juga dapat mengedit atau mengahpus data Bahan, selain itu anda dapat menginput barang masuk dan keluar<br/> serta mencetak laporan barang masuk atau keluar <br />
                 <br>
            Terimakasih, salam Administrator 
          </center>
      </td>
      </tr>
                                                    
    </div>
  </div>
      </div>
        </div>
     </div>
  </div> <!-- /Portlet -->
       </div> <!-- end col -->

       </div> <!-- End row -->
  <div class="row">
          <div class="col-md-8 col-sm-8 col-lg-8">
         <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-danger"><i class=" fa fa-archive"></i></span>
                 <div class="mini-stat-info text-right text-muted">
                 <span class="counter"><?=$jml_barang;?></span>
                     Jumlah Bahan
            </div>
    <div class="tiles-progress">
         <div class="m-t-20">
                <h5 class="text-uppercase">Jumlah Seluruh Bahan <span class="pull-right"><?=$jml_barang;?></span></h5>
                 <div class="progress progress-sm m-0">
               <div class="progress-bar">
 <span class="sr-only"><?=$jml_barang;?> Bahan</span>
      </div>
      </div>
    </div>
 </div>
       </div>
     </div>
 <?php 
     foreach ($cek_barang as $cek) {
         $cek['jml_barang'] = $cek['stok_tersedia'];
                                   
      if($cek['jml_barang'] <=$cek['jml_minimal'] ){
          $link = base_url('logistik/ajukan_stok/').$cek['kode_barang']."/".$cek['jml_barang']."/".$cek['id_supplier'];
          $text = "Ajukan Stok";
          $class ="btn-warning";
      ?>
     <div class="col-md-7 col-sm-7 col-lg-4">
        <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-warning"><i class=" fa fa-warning"></i></span>
       <?php 
       $cek_ajuan = $this->db->get_where('data_pengajuan',array('kode_barang' => $cek['kode_barang']))->result_array();
            foreach($cek_ajuan as $ajuan){
                                                
    $status_ajuan = $ajuan['status_ajuan'];
          if($status_ajuan == "sudah"){
            $link="#";
            $text="Sudah Diajukan";
              $class="btn-primary";
      }else if($status_ajuan == "ditolak"){
         $link=base_url('logistik/ubah_ajuan/').$cek['kode_barang']."/".$cek['jml_barang']."/".$cek['id_supplier']."/".$ajuan['id_pengajuan'];
            $text="Ditolak";
              $class="btn-danger";
      }else if($status_ajuan == "acc"){
        $link="#";
            $text="Diterima";
              $class="btn-info";
      }
}
        ?> 
 <span class="mini-stat-icon"><a href="<?=$link;?>" class="btn <?=$class;?> btn-rounded waves-effect waves-light m-b-5"><strong><?=$text;?></strong></a></span>
 <div class="mini-stat-info text-right text-muted"><br />
      <span class="counter"><?=$cek['stok_tersedia'];?></span>
         Stok <?=$cek['nama_barang'];?> Sedikit
   </div>
 <div class="tiles-progress">
     <div class="m-t-20">
            <h6 class="text-uppercase">Jumlah Stok <?=$cek['nama_barang'];?> Tersisa <span class="pull-right"><?=$cek['stok_tersedia'];?></span></h6>
     <div class="progress progress-sm m-0">
        <div class="progress-bar">
           <span class="sr-only"><?=$cek['stok_tersedia'];?> Bahan</span>
         </div>
     </div>
  </div>
     </div>
  </div>
  </div>
   <?php
    } 
      }
   ?>
   </div>
           

