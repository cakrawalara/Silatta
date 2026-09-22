<?php

$idPeriodeSempro = '';
$periode = '';
$tanggal = '';
$aktif = '';

if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
        $idPeriodeSempro = $uf->idPeriodeSempro;
        $periode = $uf->periode;
        $tanggal = $uf->tanggal;
        $aktif = $uf->aktif;
        
    }
}


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Edit Periode Seminar
        <small></small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Periode Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url() ?>periode/editPeriodeProses" method="post" id="editUser" role="form">
                        <div class="box-body">
                            
                                <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="periode">Nama Periode</label>
                                        <input type="text" class="form-control" id="periode" placeholder="Full Name" name="periode" value="<?php echo $periode; ?>" >
                                        <input type="hidden" class="form-control" id="idPeriodeSempro" placeholder="Full Name" name="idPeriodeSempro" value="<?php echo $idPeriodeSempro; ?>" >
                                        
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="tanggal">Tanggal Periode</label>
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $tanggal; ?>" >
                                        
                                        
                                    </div>
                                    
                                </div>
                                </div>
                                
                                <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                            <label for="aktif"> Status </label><?php if (($aktif)==1):?>
                     
                         
                          <a class="btn btn-xs btn-success" ><i class="fa fa-check"><b> Periode Aktif</b></i></a>
                          
                      <?php else: ?>
                        <a class="btn btn-xs btn-danger"><i class="fa fa-close"><b> Tidak Aktif  </b></i></a>
                     
                      <?php endif ?>
                      <br>
                            <select type="text" class="form-control" id="aktif" name="aktif" value="<?php echo $aktif; ?>" required>
                                    <option value="<?php echo $aktif; ?>">Pilih Status Periode</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
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