 <div class="row">
      <div class="col-sm-12">
     <h4 class="pull-left page-title"><i class="fa fa-calendar"></i>&nbsp;<span id="clock"></span></h4>
        <ol class="breadcrumb pull-right">
          <li><a href="#">Admin</a></li>
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
   Selamat datang, <b><?=$this->session->userdata('username');?></b> di halaman dashboard Admin. Pada aplikasi ini Anda dapat melihat data semua Pengguna <br /> yang telah terdaftar. Anda juga dapat mengedit atau mengahpus pengguna <br />
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
          <span class="mini-stat-icon bg-danger"><i class=" fa fa-user"></i></span>
         <div class="mini-stat-info text-right text-muted">
         <span class="counter"><?=$jml_pengguna;?></span>
                User Management
      </div>
   <div class="tiles-progress">
      <div class="m-t-20">
        <h5 class="text-uppercase">Jumlah Pengguna <span class="pull-right"><?=$jml_pengguna;?></span></h5>
           <div class="progress progress-sm m-0">
            <div class="progress-bar">
                 <span class="sr-only"><?=$jml_pengguna;?> User</span>
             </div>
         </div>
      </div>
  </div>
     </div>
 </div>
      </div>
