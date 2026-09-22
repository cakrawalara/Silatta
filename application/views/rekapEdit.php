<?php

$nim = '';
$name = '';
$ketuaId = '';
$penguji1Id = '';
$penguji2Id = '';
$totalPenguji11='';
$totalPenguji12='';
$totalPenguji21='';
$totalPenguji22='';
$totalKetua1='';
$totalKetua2='';

if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
        $nim = $uf->nim;
        $name = $uf->name;
        $ketuaId = $uf->ketuaId;
        $penguji1Id = $uf->penguji1Id;
        $penguji2Id = $uf->penguji2Id;
        $totalPenguji11 = $uf->totalPenguji11;
        $totalPenguji12 = $uf->totalPenguji12;
        $totalPenguji21 = $uf->totalPenguji21;
        $totalPenguji22 = $uf->totalPenguji22;
        $totalKetua1 = $uf->totalKetua1;
        $totalKetua2 = $uf->totalKetua2;
    }
}



?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
        
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url() ?>penilaian/addNewUser" method="post" id="editUser" role="form">
                         <center><div class="box-body">
                            <div class="row">
                               <div class="col-md-center">                                <h3>Apakah Anda akan Merekap Nilai <?php echo $name; ?> ?</h3>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="fname" placeholder="Full Name" name="fname" value="<?php echo $name; ?>" maxlength="128">
                                        <input type="hidden" value="<?php echo $ketuaId; ?>" name="ketuaId" id="ketuaId" />   
                                        <input type="hidden" value="<?php echo $penguji1Id; ?>" name="penguji1Id" id="penguji1Id" />   
                                        <input type="hidden" value="<?php echo $penguji2Id; ?>" name="penguji2Id" id="penguji2Id" /> 
                                        <input type="hidden" value="<?php echo $nim; ?>" name="nim" id="nim" /> 
                                        <input type="hidden" value="<?php echo $totalPenguji11; ?>" name="totalPenguji11" id="totalPenguji11" /> 
                                        <input type="hidden" value="<?php echo $totalPenguji12; ?>" name="totalPenguji12" id="totalPenguji12" /> 
                                        <input type="hidden" value="<?php echo $totalPenguji21; ?>" name="totalPenguji21" id="totalPenguji21" /> 
                                        <input type="hidden" value="<?php echo $totalPenguji22; ?>" name="totalPenguji22" id="totalPenguji22" /> 
                                        <input type="hidden" value="<?php echo $totalKetua1; ?>" name="totalKetua1" id="totalKetua1" /> 
                                        <input type="hidden" value="<?php echo $totalKetua2; ?>" name="totalKetua2" id="totalKetua2" /> 
                                    </div>
                                    
                                </div>
                                </div>
                               
                                
                        <div class="box-footer">
                            <input type="submit" class="btn btn-success" value="Rekap" />
                            <a href="<?php echo base_url('penilaian/listing'); ?>" ><button style="background-color: red" type="button" class="btn btn-danger" >
                             Nanti
                            </button></a>
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