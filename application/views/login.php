<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>INSTALASI GIZI RSKH</title>
<link rel="stylesheet" href="<?=base_url()?>assets/assets2/css/style.default.css" type="text/css" />
 <link rel="shortcut icon" href="<?=base_url();?>/assets/images/holistic.jpg" width="10px" height="10px">
<script type="text/javascript" src="<?=base_url()?>assets/assets2/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/assets2/js/jquery-migrate-1.1.1.min.js"></script>
</head>
<style type="text/css">
    /** mengatur warna backgroud login*/
    body {
        background:  !important;
    }
    .loginwrapperinner{
        background: !important;
    }
</style>
<body class="loginbody">

    <div class="loginwrapper">
        <div class="loginwrap zindex100 animate2 bounceInDown">
        <h1 class="logintitle"><span style="font-size: 48px; margin-top: 14px; float: left; margin-right: 10px;"><img src="<?=base_url();?>/assets/images/holistic.jpg" width="50px" height="50px" ></span> SISTEM INFORMASI PERSEDIAAN BAHAN MAKANAN <br/ >Instalasi Gizi<span style="font-size: 12px; font-weight: normal; display: block; margin-left: 55px; text-transform: none; color: #666;">Rumah Sakit Karomah Holistic</span></h1>
    <div class="loginwrapperinner">
				<form id="loginform" action="<?=base_url('Login')?>" method="post">
    <p class="animate4 bounceIn"><input type="text" id="username" name="username" placeholder="Username" /></p>
    <p class="animate5 bounceIn"><input type="password" id="password" name="password" placeholder="Password" /></p>
    <p class="animate6 bounceIn"><button class="btn btn-default btn-block" style="background:  #ef1820 !important;" name="submit">Masuk</button></p>
    <?php
    $pesan = $this->session->userdata('pesan');
     if($pesan){
        ?>
            <p class="animate4 bounceIn"><font color="red"><?=$pesan?></font></p>    
        <?php
    $this->session->unset_userdata('pesan');
                           }
                           ?>
</form>
            </div><!--loginwrapperinner-->
        </div>
        <div class="loginshadow animate3 fadeInUp"></div>
    </div><!--loginwrapper-->
    
   
</body>
</html>