<?php

$tempat ='';

$idPeriodeSempro = '';


if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
        $tempat = $uf->tempat;
        
        $idPeriodeSempro = $uf->idPeriodeSempro;
    }
}


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Tambah Ruangan Seminar
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
                        <h3 class="box-title"></h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="addUser" action="<?php echo base_url() ?>PendaftaranAudiens/prosesTambah" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                               
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="idPeriodeSempro">Periode Seminar</label>
                                        <select class="form-control" id="idPeriodeSempro" name="idPeriodeSempro">
                                            <option value="0">Pilih Periode</option>
                                            <?php
                                            if(!empty($periodeSempro))
                                            {
                                                foreach ($periodeSempro as $rl)
                                                {
                                                    ?>
                                                    <option value="<?php echo $rl->idPeriodeSempro; ?>" <?php if($rl->idPeriodeSempro == $idPeriodeSempro) {echo "selected=selected";} ?>><?php echo $rl->periode ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ruangan">Ruangan Seminar</label>
                                        <select class="form-control" id="ruangan" name="ruangan">
                                            <option value="0">Pilih Ruangan</option>
                                            <?php
                                            if(!empty($ruangan))
                                            {
                                                foreach ($ruangan as $mr)
                                                {
                                                    ?>
                                                    <option value="<?php echo $mr->ruangan; ?>" <?php if($mr->ruangan == $tempat) {echo "selected=selected";} ?>><?php echo $mr->ruangan ?></option>
                                                    <?php
                                                }
                                            }
                                            else{ ?>
                                                <option disabled> Belum ada Ruangan (Tambah Ruangan Terlebih Dahulu) </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kuota">Kuota</label>
                                        <input type="number" class="form-control" id="kuota"  name="kuota" >
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                        <label>Status Audiens</label>
                            <select type="text" class="form-control" id="status" name="status" value="<?php echo $status; ?>" required>
                                     <option>Pilih Status</option>
                                    <option value="1">Dibuka</option>
                                    <option value="0">Ditutup</option>
                                </select>
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
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>