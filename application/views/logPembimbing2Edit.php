<?php

$logSeminar2Id = '';
$tanggalBimbingan2 = '';
$logBimbingan2Seminar = '';
$userId2 = '';

if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
        $tanggalBimbingan2 = $uf->tanggalBimbingan2;
       $logSeminar2Id = $uf->logSeminar2Id;
        $logBimbingan2Seminar = $uf->logBimbingan2Seminar;
        $userId2 = $uf->userId2;
    }
}



?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Edit Log Pembimbing 2
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
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url() ?>log/editLogProses2/<?php echo $userId2; ?>" method="post">
                        <div class="box-body">
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tanggalBimbingan2">Tanggal Bimbingan</label>
                                        <input type="date" class="form-control" id="tanggalBimbingan2" name="tanggalBimbingan2" value="<?php echo $tanggalBimbingan2; ?>" >
                                       
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="logBimbingan2Seminar">Log</label>
                                        <input type="text" class="form-control" id="logBimbingan2Seminar" placeholder="Mobile Number" name="logBimbingan2Seminar" value="<?php echo $logBimbingan2Seminar; ?>" >
                                        <input type="hidden" value="<?php echo $logSeminar2Id; ?>" name="logSeminar2Id" id="logSeminar2Id" />    
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