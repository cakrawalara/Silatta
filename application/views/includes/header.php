<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <style>
      .error{
        color:red;
        font-weight: normal;
      }
    </style>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- <body class="sidebar-mini skin-black-light"> -->
  <body class="skin-green sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        
        <a href="<?php echo base_url(); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          
          <span class="logo-mini"><b>SILAT</b>TA</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><i class="fa fa-home"></i><b>  SILAT</b>TA</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                   <img src="<?php echo base_url('assets/img/profile/') . $image ; ?>" class="user-image" alt="User Image" width="80" height="60">
                  <span class="hidden-xs"><?php echo $name; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                   <img src="<?php echo base_url('assets/img/profile/') . $image ; ?>" class="img-circle" alt="User Image" width="80" height="60">
                    <p>
                      <?php echo $name; ?>
                      <small><?php echo $role_text; ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url(); ?>loadChangePass" class="btn btn-default btn-flat"><i class="fa fa-key"></i> Change Password</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url(); ?>logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <div class="user-panel">
          <div class="pull-left image">
          <img src="<?php echo base_url('assets/img/profile/') . $image ; ?>" class="img-circle" alt="User Image" width="80" height="60">
        </div>
        <div class="pull-left info">
          <p><?php echo $name; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <ul class="sidebar-menu">
            
            <!--<li class="treeview">-->
            <!--  <a href="<?php echo base_url(); ?>dashboard">-->
            <!--    <i class="fa fa-dashboard"></i> <span>Home</span></i>-->
            <!--  </a>-->
            <!--</li>-->
            <?php
            
            if($role == ROLE_PENGAJUAN || $role == ROLE_SEMINAR || $role == ROLE_MAHASISWA || $role == ROLE_ALUMNI || $role == ROLE_AUDIENS)
            {
            ?>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>profil/index/<?php echo $userId; ?>" >
                <i class="fa fa-user"></i>
                <span>Profil Mahasiswa</span>
              </a>
            </li>
            <?php
             }
            if( $role == ROLE_AUDIENS || $role == ROLE_PENGAJUAN || $role == ROLE_SEMINAR)
            {
                ?>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>audiens/index/<?php echo $userId; ?>" >
                <i class="fa fa-edit"></i>
                <span>Pendaftaran Audiens Sempro</span>
              </a>
            </li>
            <?php
             }
            if( $role == ROLE_MAHASISWA)
            {
            ?>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>DaftarUjianKompre/index/<?php echo $userId; ?>" >
                <i class="fa fa-pencil-square"></i>
                <span>Ujian Kompre</span>
              </a>
            </li>
            
            </li>
            <?php
             }
            if($role == ROLE_DOSEN )
            {
            ?>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>profil_dosen/index/<?php echo $userId; ?>" >
                <i class="fa fa-user"></i>
                <span>Profil Dosen</span>
              </a>
            </li>
            
            <?php
             }
             ?>



             <!-- __________________________________Mahasiswa___________________________________ -->
             
            
            <?php
             
            if($role == ROLE_PENGAJUAN )
            {
            ?>
            <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            
              <li class="treeview">
              <a href="<?php echo base_url(); ?>pengajuan/index/<?php echo $userId; ?>" >
                <i class="fa fa-thumb-tack"></i>
                <span>Pengajuan Judul</span>
              </a>
            </li>

            <?php
             }
            if( $role == ROLE_SEMINAR)
            {
            ?>
            <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            
            <li class="treeview">
              <a href="<?php echo base_url(); ?>log/index" >
                <i class="fa fa-pencil-square"></i>
                <span>Log Bimbingan Pra Penelitian</span>
              </a>
            </li>
            
            <li class="treeview">
              <a href="<?php echo base_url(); ?>seminar/index/<?php echo $userId; ?>" >
                <i class="fa fa-thumb-tack"></i>
                <span>Pendaftaran Seminar</span>
              </a>
            </li>

            <?php
             }
            if( $role == ROLE_MAHASISWA)
            {
            ?>
            <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            
            <li class="treeview">
              <a href="<?php echo base_url(); ?>log/index2/<?php echo $userId; ?>" >
                <i class="fa fa-pencil-square"></i>
                <span>Log Bimbingan Penelitian</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>sidang/index/<?php echo $userId; ?>" >
                <i class="fa fa-thumb-tack"></i>
                <span>Pendaftaran Sidang</span>
              </a>
            </li>




<!-- ______________________________________Dosen______________________________________________ -->
            



            <?php
             }
            if( $role == ROLE_DOSEN)
            {
            ?>
            <ul class="sidebar-menu">
            <li class="header">LOG AKTIVITAS</li>
            
            <li class="treeview">
              <a href="<?php echo base_url(); ?>logDosen/userListing/<?php echo $userId; ?>" >
                <i class="fa fa-pencil-square"></i>
                <span>Log Bimbingan Pra Penelitian</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>logDosen/userListing2/<?php echo $userId; ?>" >
                <i class="fa fa-pencil-square"></i>
                <span>Log Bimbingan Penelitian</span>
              </a>
            </li>
            <br>
            <ul class="sidebar-menu">
            <li class="header">PENILAIAN SIDANG</li>
            
            <li class="treeview">
              <a href="<?php echo base_url(); ?>dosen/userListing/<?php echo $userId; ?>" >
                <i class="fa fa-thumb-tack"></i>
                <span>Penilaian</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>dosen/lihatNilai/<?php echo $userId; ?>" >
                <i class="fa fa-thumb-tack"></i>
                <span>Histori Penilaian</span>
              </a>
            </li>




<!-- _________________________________ADMINISTRATOR ONLY________________________________________ -->
            




            <?php
            }
             if( $role == ROLE_ADMIN)
            {
              ?>
            
            
            
            
            <ul class="sidebar-menu">
            <li class="header">1. PENGAJUAN JUDUL</li>
            
            <li class="treeview">
              <a href="<?php echo base_url(); ?>listing/listPengajuan" >
                <i class="fa fa-tags"></i>
                <span>List Pengajuan Judul</span>
              </a>
            </li>


            <ul class="sidebar-menu">
            <li class="header">2. SEMINAR PROPOSAL</li>

            <li class="treeview">
              <a href="<?php echo base_url(); ?>PendaftaranAudiens/listing" >
                <i class="fa fa-user"></i>
                <span>Audiens Seminar</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>periode/index" >
                <i class="fa fa-clock-o"></i>
                <span> Periode Seminar</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>listing/ruangan" >
                <i class="fa fa-map-marker"></i>
                <span> Ruangan Seminar</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>listSeminar" >
                <i class="fa fa-th-list"></i>
                <span>List Pengajuan Seminar</span>
              </a>
            </li>

             <li class="treeview">
              <a href="<?php echo base_url(); ?>listing/listJadwalSeminar" >
                <i class="fa fa-calendar"></i>
                <span>List Jadwal Seminar</span>
              </a>
            </li>
            
            <li class="treeview">
              <a href="<?php echo base_url(); ?>listing/historySeminar" >
                <i class="fa fa-search"></i>
                <span>List Histori Seminar</span>
              </a>
            </li>

            <ul class="sidebar-menu">
            <li class="header" style="white">3. SIDANG SKRIPSI</li>
            
            <li class="treeview">
              <a href="<?php echo base_url(); ?>daftarUjianKompre/kompreSearch" >
                <i class="fa fa-edit"></i>
                <span>Ujian Kompre</span>
              </a>
            </li>
            
            <li class="treeview">
              <a href="<?php echo base_url(); ?>listing/ruangan" >
                <i class="fa fa-map-marker"></i>
                <span> Ruangan Sidang</span>
              </a>
            </li>

            <li class="treeview">
              <a href="<?php echo base_url(); ?>listing/listSidang" >
                <i class="fa fa-graduation-cap"></i>
                <span>List Pengajuan Sidang</span>
              </a>
            </li>

            <li class="treeview">
              <a href="<?php echo base_url(); ?>listing/listJadwalSidang" >
                <i class="fa fa-calendar"></i>
                <span>List Jadwal Sidang</span>
              </a>
            </li>

            <li class="treeview">
              <a href="<?php echo base_url(); ?>penilaian/listing" >
                <i class="fa fa-file-pdf-o"></i>
                <span>Rekapitulasi Sidang</span>
              </a>
            </li>
            
            <li class="treeview">
              <a href="<?php echo base_url(); ?>listing/historySidang" >
                <i class="fa fa-search"></i>
                <span>List Histori Sidang</span>
              </a>
            </li>
            <?php
             }
                if($role == ROLE_ADMIN )
            {
             ?>

             <ul class="sidebar-menu">
            <li class="header">ADMIN NAVIGATION</li>
            
            <li class="treeview">
              <a href="<?php echo base_url(); ?>userListing">
                <i class="fa fa-user"></i>
                <span>Manajemen Users</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>dosenUser/userListing">
                <i class="fa fa-graduation-cap"></i>
                <span>Manajemen Dosen</span>
              </a>
            </li>
            </ul>
            </li>
        
            <?php
            }
            ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>