<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-book"></i> Menu Ujian Kompre
        <small></small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-10">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    
    <section class="content" >
            <div class="col-lg-4 col-xs-6 ">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h4><b>Daftar Ujian Kompre</b></h4>
                  <p>SILATTA</p>
                  <br>
                </div>
                <div class="icon">
                  <i class="ion ion-edit"></i>
                </div>
                <a href="<?php echo base_url(); ?>DaftarUjianKompre/daftar/<?php echo $this->session->userdata ( 'userId' );?>" class="small-box-footer">Daftar <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h4><b>Hasil Kompre</b></h4>
                  <p>SILATTA</p>
                  <br>
                </div>
                <div class="icon">
                  <i class="ion ion-email"></i>
                </div>
                <a href="<?php echo base_url(); ?>DaftarUjianKompre/hasilKompre/<?php echo $this->session->userdata ( 'userId' );?>" class="small-box-footer">Lihat  <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            


          </div>
    </section>
</div>