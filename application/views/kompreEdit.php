<?php

$userId = '';
$idKompre = '';
$name = '';
$nilai = '';
$statusKelulusan='';

if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
        $userId = $uf->userId;
        $idKompre = $uf->idKompre;
        $name = $uf->name;
        $nilai = $uf->nilai;
        $statusKelulusan = $uf->statusKelulusan;
    }
}



?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Edit Kompre 
        <small>Add / Edit User</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter User Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url() ?>DaftarUjianKompre/editNilai" method="post" id="editUser" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Full Name</label>
                                        <input type="text" class="form-control" id="fname" placeholder="Full Name" name="fname" value="<?php echo $name; ?>" maxlength="128">
                                       
                                    </div>
                                    
                                </div>
                                </div>
                               <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nilai">Nilai Kompre</label>
                                        <input type="text" class="form-control" id="nilai" placeholder="Nilai Kompre" name="nilai" value="<?php echo $nilai; ?>">
                                         <input type="hidden" value="<?php echo $idKompre; ?>" name="idKompre" id="idKompre" />    
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                            <label for="statusKelulusan"> Status Kelulusan </label>
                            <select type="text" class="form-control" id="statusKelulusan" name="statusKelulusan" value="<?php echo $statusKelulusan; ?>" required>
                                    <option value="<?php echo $statusKelulusan; ?>">Pilih Status</option>
                                    <option value="1">Lulus</option>
                                    <option value="0">Belum Lulus</option>
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

<script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>