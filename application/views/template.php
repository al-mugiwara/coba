
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="<?=base_url();?>/assets/images/holistic.jpg" width="10px" height="10px">

        <title>Instalasi Gizi Rskh</title>

        <!-- Base Css Files -->
        <link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="<?=base_url();?>assets/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?=base_url();?>assets/assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="<?=base_url();?>assets/css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- animate css -->
        <link href="<?=base_url();?>assets/css/animate.css" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="<?=base_url();?>assets/css/waves-effect.css" rel="stylesheet">

        <!-- sweet alerts -->
        <link href="<?=base_url();?>assets/assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

        <!-- Custom Files -->
        <link href="<?=base_url();?>assets/css/helper.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
<!-- 
        <script src="<?=base_url();?>assets/admin/js/modernizr.min.js"></script> -->
        <script src="<?=base_url();?>assets/clock.js"></script>
           <script src="<?=base_url();?>assets/js/jquery.min.js"></script>
        <script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
             <script src="<?=base_url();?>assets/assets/datatables/jquery.dataTables.min.js"></script>
            <script src="<?=base_url();?>assets/assets/datatables/dataTables.bootstrap.js"></script>
            <style type="text/css">
            body{
                
            }
                .navbar-default{
                    background-color: #ef1820 ; 
                }
                .topbar-left{
                     background-color: #ef1820 !important;
                }
                .topbar .topbar-left {
                  float: left;
                  height: 75px;
                  position: relative;
                  z-index: 1;
                  width: 300px;
                  background: #317eeb;
                }
            .logo i {
              font-size: 30px;
              margin-right: 5px;
              color: white;
            }
              .logos {
              font-size: 10px;
              margin-right: -40px;
              margin-top: -20px;   
              color: white;
            }
            /** mengatur warna pada header panel**/
            .bg-danger{
                background:  #ef1820 !important;
            }
            .panel-danger > .panel-heading {
              color: #a94442;
              background-color:  #ef1820 !important;
              border-color: #ebccd1;
            }
            /** mengatur warna pada isi kotak panel*/
            .portlet-body{
                background-color: !important;
            }
            /** mengatur warna pada kotak pengajuan*/
            .mini-stat {
                background-color: !important;
            }
            /** mengatur warna sidebar kiri*/
            .left {
                background-color: !important;
            }
            #sidebar-menu{
                background-color: !important;
            }
            </style>
            
        
    </head>



    <body onload="goforit();" class="fixed-left">

        
        <!-- Begin page -->
        <div id="wrapper">
        
            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <!-- logo -->
                        <a href="#" class="logo"><img src="<?=base_url();?>/assets/images/holistic.jpg" width="65px" height="65px"> <span>Instalasi Gizi </span></a><br /> 
                      
                    </div>
                    <div class="logos">
                  <span style="margin-left: 112px;position: relative;">Rumah Sakit Karomah Holistic</span>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                           <!--  <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div> -->
                         

                            <ul class="nav navbar-nav navbar-right pull-right">
                                
                                
                                <li class="dropdown">
                                    <!-- user -->
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="<?=base_url()?>/assets/images/man.png" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?=base_url('Login/logout');?>"><i class="md md-settings-power"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
               
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <!-- user -->
                            <img src="<?=base_url()?>/assets/images/man.png" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?= $this->session->userdata('username')?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=base_url('setting/setting_user');?>" target="_blank"><i class="md md-settings"></i> Setting Akun</a></li>
                                </ul>
                            </div>
                            
                            <p class="text-muted m-0"><?=$this->session->userdata('login_hash');?></p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <!-- menu -->
                   <div id="sidebar-menu">
                        <ul>
                            <?php
                            //menentukan hak akses
                              $login_hash = $this->session->userdata('login_hash');
                            $sql_main = $this->db->get_where('menu',array('hak_akses' => $login_hash,'id_main_menu' => 0));
                            foreach($sql_main->result_array() as $main_menu){
                                $sql_sub = $this->db->get_where('menu',array('hak_akses' => $login_hash,'id_main_menu' => $main_menu['id']));
                                if($sql_sub->num_rows() == 0){
                                ?>
                            <li>
                                <a href="<?=base_url($main_menu['link'])?>" class="waves-effect" 
                                        <?php 
                                            if($main_menu['judul_menu'] == "Laporan Data Bahan Makanan"):
                                                ?>
                                                target="_blank"
                                                <?php endif ?>
                                         
                                    ><i class="<?=$main_menu['icon'];?>"></i><span> <?=$main_menu['judul_menu']?> </span></a>               
                            </li>
                                <?php 
                            }else if($sql_sub->num_rows>=1){
                         ?>
                          <li class="has_sub">
                                <a href="<?=base_url($main_menu['link']);?>" class="waves-effect"><i class="<?=$main_menu['icon'];?>"></i><span> <?=$main_menu['judul_menu'];?> </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   
                                    <?php 
                                    foreach ($sql_sub->result_array() as $submenu) {
                                        ?>
                                         <li>
                                <a href="<?=base_url($submenu['link'])?>" class="waves-effect" 
                                     <?php 
                                            if($submenu['judul_menu'] == "Laporan Data Bahan Makanan"):
                                                ?>
                                                target="_blank"
                                                <?php endif ?>

                                                ><i class="<?=$submenu['icon'];?>"></i><span> <?=$submenu['judul_menu']?> </span></a>
                            </li>
                                        <?php 
                                    }
                                     ?>                               
                                     </ul>
                            </li>
                            <?php 
                                }
                            }
                             ?>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <!-- Page-Title -->
                        
                       <?=$contents;?>

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    Instalasi Gizi RSKH &copy;2019
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


           

        </div>
        

      
        <!-- END wrapper -->


    
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
     
        <script src="<?=base_url();?>assets/js/waves.js"></script>
        <script src="<?=base_url();?>assets/js/wow.min.js"></script>
        <script src="<?=base_url();?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="<?=base_url();?>assets/js/jquery.scrollTo.min.js"></script>
        <script src="<?=base_url();?>assets/assets/chat/moment-2.2.1.js"></script>
        <script src="<?=base_url();?>assets/assets/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="<?=base_url();?>assets/assets/jquery-detectmobile/detect.js"></script>
        <script src="<?=base_url();?>assets/assets/fastclick/fastclick.js"></script>
        <script src="<?=base_url();?>assets/assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="<?=base_url();?>assets/assets/jquery-blockui/jquery.blockUI.js"></script>

        <!-- sweet alerts -->
        <script src="<?=base_url();?>assets/assets/sweet-alert/sweet-alert.min.js"></script>
        <script src="<?=base_url();?>assets/assets/sweet-alert/sweet-alert.init.js"></script>

       
        <!-- Counter-up -->
        <script src="<?=base_url();?>assets/assets/counterup/waypoints.min.js" type="text/javascript"></script>
        <script src="<?=base_url();?>assets/assets/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        
        <!-- CUSTOM JS -->
        <script src="<?=base_url();?>assets/js/jquery.app.js"></script>

     
        <script type="text/javascript">
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>
        
    
    </body>
</html>