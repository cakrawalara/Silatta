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
   <center>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-calendar" aria-hidden="true"></i> Jadwal Seminar dan Sidang
      </h1>
    </section>
    </center>
    
    <section class="content" >
            <div class="col-lg-4 col-xs-6 ">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h4><b>JADWAL SEMINAR</b></h4>
                  <p>SILATTA</p>
                  <br>
                </div>
                <div class="icon">
                  <i class="ion ion-calendar"></i>
                </div>
                <a href="<?php echo base_url(); ?>jadwal/jadwalSeminar" class="small-box-footer">Lihat Jadwal <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h4><b>JADWAL SIDANG</b></h4>
                  <p>SILATTA</p>
                  <br>
                </div>
                <div class="icon">
                  <i class="ion ion-university"></i>
                </div>
                <a href="<?php echo base_url(); ?>jadwal/jadwalSidang" class="small-box-footer">Lihat Jadwal <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            


          </div>
    </section>
</div>