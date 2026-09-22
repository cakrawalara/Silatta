<?php

$logSidang2Id = '';
$tanggalBimbingan4 = '';
$logBimbingan2Sidang = '';

if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
        $logSidang2Id = $uf->logSidang2Id;
       $tanggalBimbingan4 = $uf->tanggalBimbingan4;
        $logBimbingan2Sidang = $uf->logBimbingan2Sidang;
    }
}



?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Edit Log Pembimbing 2
        <small>Bimbingan Sidang</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url() ?>log/editLogProses4" method="post">
                        <div class="box-body">
                            <div class="row">
                                
                               <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tanggalBimbingan4">Tanggal Bimbingan</label>
                                        <input type="date" class="form-control" id="tanggalBimbingan4" name="tanggalBimbingan4" value="<?php echo $tanggalBimbingan4; ?>" >
                                       
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="logBimbingan2Sidang">Log</label>
                                        <input type="text" class="form-control" id="logBimbingan2Sidang" placeholder="Log" name="logBimbingan2Sidang" value="<?php echo $logBimbingan2Sidang; ?>" >
                                        <input type="hidden" value="<?php echo $logSidang2Id; ?>" name="logSidang2Id" id="logSidang2Id" />    
                                    </div>
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