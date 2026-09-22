<?php

$userId = '';
$name = '';
$waktu = '';
$roleId = '';
$dosenId = '';
$dosenId2 = '';
$reviewerId ='';
$moderatorId = '';
$tempat = '';
$tanggal = '';
$linkSeminar = '';
$judul = '';

if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
        $userId = $uf->userId;
        $name = $uf->name;
        $waktu = $uf->waktu;
        $roleId = $uf->roleId;
        $dosenId = $uf->dosenId;
        $dosenId2 = $uf->dosenId2;
        $reviewerId = $uf->reviewerId;
        $moderatorId = $uf->moderatorId;
        $tempat = $uf->tempat;
        $judul = $uf->judul;
        $tanggal = $uf->tanggal;
        $linkSeminar = $uf->linkSeminar;
    }
}


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Edit Pengajuan Seminar
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
                    
                    <form role="form" action="<?php echo base_url() ?>listing/editSeminar" method="post" id="editUser" role="form">
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
                                        <label for="role">Status</label>
                                        <select class="form-control" id="role" name="role" readonly>
                                            <option value="4">Sidang</option>
                                            
                                        </select>
                                    </div>
                                </div>    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dosen">Pembimbing 1</label>
                                        <select class="form-control" id="dosen" name="dosen">
                                            <option value="0">Select Pembimbing 1</option>
                                            <?php
                                            if(!empty($dosens))
                                            {
                                                foreach ($dosens as $ds)
                                                {
                                                    ?>
                                                    <option value="<?php echo $ds->dosenId; ?>" <?php if($ds->dosenId == $dosenId) {echo "selected=selected";} ?>><?php echo $ds->dosen ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dosen2">Pembimbing 2</label>
                                        <select class="form-control" id="dosen2" name="dosen2">
                                            <option value="0">Select Pembimbing 2</option>
                                            <?php
                                            if(!empty($dosens2))
                                            {
                                                foreach ($dosens2 as $ds2)
                                                {
                                                    ?>
                                                    <option value="<?php echo $ds2->dosenId2; ?>" <?php if($ds2->dosenId2 == $dosenId2) {echo "selected=selected";} ?>><?php echo $ds2->dosen2 ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>   
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="reviewer">Reviewer</label>
                                        <select class="form-control" id="reviewer" name="reviewer">
                                            <option value="0">Select Reviewer</option>
                                            <?php
                                            if(!empty($reviewers))
                                            {
                                                foreach ($reviewers as $rv)
                                                {
                                                    ?>
                                                    <option value="<?php echo $rv->reviewerId; ?>" <?php if($rv->reviewerId == $reviewerId) {echo "selected=selected";} ?>><?php echo $rv->reviewer ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="moderator">Moderator</label>
                                        <select class="form-control" id="moderator" name="moderator">
                                            <option value="0">Select Moderator</option>
                                            <?php
                                            if(!empty($moderators))
                                            {
                                                foreach ($moderators as $mr)
                                                {
                                                    ?>
                                                    <option value="<?php echo $mr->moderatorId; ?>" <?php if($mr->moderatorId == $moderatorId) {echo "selected=selected";} ?>><?php echo $mr->moderator ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>   
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tempat">Ruang Seminar</label>
                                        <select class="form-control" id="tempat" name="tempat">
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
                                        <label for="moderator">Periode Seminar</label>
                                        <select class="form-control" id="tanggal" name="tanggal">
                                            <option value="0">Pilih Periode</option>
                                            <?php
                                            if(!empty($periodes))
                                            {
                                                foreach ($periodes as $mr)
                                                {
                                                    ?>
                                                    <option value="<?php echo $mr->tanggal; ?>" <?php if($mr->tanggal == $tanggal) {echo "selected=selected";} ?>><?php echo $mr->periode ?></option>
                                                    <?php
                                                }
                                            }
                                            else{ ?>
                                                <option disabled> Belum ada Periode (Tambah Periode Terlebih Dahulu) </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>   
                               
                    
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="waktu">Waktu Seminar</label>
                                        <input type="time" class="form-control" id="waktu" placeholder="Tanggal Seminar" name="waktu" value="<?php echo $waktu; ?>" required>
                                           
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="judul">Judul Skripsi</label>
                                        <input type="text" class="form-control" id="judul" placeholder="Full Name" name="judul" value="<?php echo $judul; ?>" maxlength="128" readonly>
                                           
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="linkSeminar">Link Seminar</label>
                                        <input type="text" class="form-control" id="linkSeminar" placeholder="Full Name" name="linkSeminar" value="<?php echo $linkSeminar; ?>" maxlength="128" readonly>
                                           
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