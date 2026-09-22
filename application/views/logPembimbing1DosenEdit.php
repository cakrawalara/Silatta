<?php

$logSeminarId = '';

$logBimbinganSeminar = '';
$tanggalBimbingan = '';

if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
        $logSeminarId = $uf->logSeminarId;
        $tanggalBimbingan= $uf->tanggalBimbingan;
       
        $logBimbinganSeminar = $uf->logBimbinganSeminar;
    }
}



?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> View Log Pembimbing 1
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
                                        <input type="date" class="form-control" id="tanggalBimbingan" placeholder="Mobile Number" name="tanggalBimbingan" value="<?php echo $tanggalBimbingan; ?>" disabled >
                                       <input type="hidden" value="<?php echo $logSeminarId; ?>" name="logSeminarId" id="logSeminarId" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="logBimbinganSeminar">Log Bimbingan</label> <br><br>
                                        <?php echo $logBimbinganSeminar; ?>
                                            
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