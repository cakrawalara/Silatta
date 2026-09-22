<?php

$logSeminar2Id = '';

$logBimbingan2Seminar = '';
$tanggalBimbingan2 = '';

if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
        $logSeminar2Id = $uf->logSeminar2Id;
        $tanggalBimbingan2= $uf->tanggalBimbingan2;
       
        $logBimbingan2Seminar = $uf->logBimbingan2Seminar;
    }
}



?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> View Log Pembimbing 2
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
                    
                    <form role="form" action="<?php echo base_url() ?>log/editLogProses" method="post">
                        <div class="box-body">
                            <div class="row">
                                
                               <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tanggalBimbingan">Tanggal Bimbingan</label>
                                        <input type="date" class="form-control" id="tanggalBimbingan2" placeholder="" name="tanggalBimbingan2" value="<?php echo $tanggalBimbingan2; ?>" disabled >
                                       <input type="hidden" value="<?php echo $logSeminar2Id; ?>" name="logSeminarId" id="logSeminarId" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="logBimbingan2Seminar">Log Bimbingan</label> <br><br>
                                        <?php echo $logBimbingan2Seminar; ?>
                                            
                                    </div>
                                </div>
                               
                                
                            </div>
                        </div><!-- /.box-body -->
    
                        
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