<?php


$userId = '';
$name = '';
$nim = '';
$idPeriodeKompre = '';
$daftar = '';


if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
        
        $userId = $uf->userId;
        $name = $uf->name;
        $nim = $uf->nim;
        $daftar = $uf->daftar;
        $idPeriodeKompre = $uf->idPeriodeKompre;
    }
}


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-user"></i> Pendaftaran Ujian Kompre
        <small></small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                <?php 
                    if (($uf->daftar)== 1 )
                    { ?>
                     <center> <h3><b>Kamu Sudah Daftar, Semangat Komprenya :) </b></h3></center>
                      <?php } 
                      
                      else 
                      { ?>
                
                
                
                    
                      <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter User Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                      <form role="form" action="<?php echo base_url() ?>DaftarUjianKompre/prosesDaftar" method="post" id="editUser" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Full Name</label>
                                        <input type="text" class="form-control" id="fname" placeholder="Full Name" name="fname" value="<?php echo $name; ?>" maxlength="128" readonly>
                                        <input type="hidden" value="<?php echo $userId; ?>" name="userId" id="userId" />    
                                    </div>
                                </div>

                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="nim">NIM</label>
                                        <input type="text" class="form-control" id="nim" placeholder="Nomor Induk Mahasiswa" name="nim" value="<?php echo $nim; ?>" maxlength="128" readonly>
                                           
                                    </div>
                                </div>
                                

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="idPeriodeKompre">Periode Kompre</label>
                                        <select class="form-control" id="idPeriodeKompre" name="idPeriodeKompre" required="">
                                            <option value="">Pilih Periode</option>
                                            <?php
                                            if(!empty($periodeKompre))
                                            {
                                                foreach ($periodeKompre as $rl)
                                                {
                                                    ?>
                                                    <option value="<?php echo $rl->idPeriodeKompre; ?>" <?php if($rl->idPeriodeKompre == $idPeriodeKompre) {echo "selected=selected";} ?>><?php echo $rl->periode ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>    
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
        </form>
    </div>
                     
                     <?php } ?>

            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>
</div>

<script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>