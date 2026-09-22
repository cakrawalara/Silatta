<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i> Home
        <small>Sistem Informasi Layanan Akademik Terpadu Tugas Akhir</small>
      </h1>
    </section>
    <section >
    	<center><h2>Selamat Datang di SILATTA <br> ( Sistem Informasi Layanan Akademik Terpadu Tugas Akhir )
    		<br>
    		Hai <?php echo $name; ?><br>
    	</h2></center>
    	
    </section>
    <?php
            
            if($role == ROLE_ADMIN)
            {
            ?>
           <center><h2> 
    		Anda Bisa Menggunakan Menu Berikut:	</h2></center>
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h4><b>PENGAJUAN JUDUL</b></h4>
                  <p>SILATTA</p>
                  <br>
                </div>
                <div class="icon">
                  <i class="ion ion-calendar"></i>
                </div>
                <a href="<?php echo base_url(); ?>listing/listPengajuan" class="small-box-footer">Lihat Pengajuan <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h4><b>PENGAJUAN SEMINAR</b></h4>
                  <p>SILATTA</p>
                  <br>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?php echo base_url(); ?>listing/listSeminar" class="small-box-footer">Lihat Pengajuan <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h4><b>PENGAJUAN SIDANG</b></h4>
                  <p>SILATTA</p>
                  <br>
                </div>
                <div class="icon">
                  <i class="ion ion-university"></i>
                </div>
                <a href="<?php echo base_url(); ?>listing/listSidang" class="small-box-footer">Lihat Pengajuan <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h4><b>LIST USER</b></h4>
                  <p>SILATTA</p>
                  <br>
                </div>
                <div class="icon">
                  <i class="ion ion-person"></i>

                </div>
                <a href="<?php echo base_url(); ?>userListing" class="small-box-footer">Lihat User <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            </div>
<?php
            } 
            ?>
<br><br><br>
          </div>
    </section>