<?php

$userId = '';
$name = '';
$roleId = '';
$dosenId = '';
$waktu = '';
$dosenId2 = '';
$penguji2Id = '';
$tempatSidang = '';
$tanggalSidang = '';
$linkSidang = '';
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
        $penguji2Id = $uf->penguji2Id;
        $tempatSidang = $uf->tempatSidang;
        $tanggalSidang = $uf->tanggalSidang;
        $linkSidang = $uf->linkSidang;
        $judul = $uf->judul;
    }
}


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Edit Pengajuan Sidang
        <small>Edit User</small>
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
                    
                    <form role="form" action="<?php echo base_url() ?>listing/editSidang" method="post" id="editUser" role="form">
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
                                            <option value="3">Alumni</option>
                                            
                                        </select>
                                    </div>
                                </div>    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dosen">Ketua Penguji</label>
                                        <select class="form-control" id="dosen" name="dosen">
                                            <option value="0">Select Ketua Penguji</option>
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
                                        <label for="dosen2">Penguji 1</label>
                                        <select class="form-control" id="dosen2" name="dosen2">
                                            <option value="0">Select Penguji 1</option>
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
                                        <label for="penguji2">Penguji 2</label>
                                        <select class="form-control" id="penguji2" name="penguji2">
                                            <option value="0">Select Penguji 2</option>
                                            <?php
                                            if(!empty($pengujis))
                                            {
                                                foreach ($pengujis as $pg)
                                                {
                                                    ?>
                                                    <option value="<?php echo $pg->penguji2Id; ?>" <?php if($pg->penguji2Id == $penguji2Id) {echo "selected=selected";} ?>><?php echo $pg->penguji2 ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div> 
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tempatSidang">Ruang Sidang</label>
                                        <select class="form-control" id="tempatSidang" name="tempatSidang">
                                            <option value="0">Pilih Ruangan</option>
                                            <?php
                                            if(!empty($ruangan))
                                            {
                                                foreach ($ruangan as $mr)
                                                {
                                                    ?>
                                                    <option value="<?php echo $mr->ruangan; ?>" <?php if($mr->ruangan == $tempatSidang) {echo "selected=selected";} ?>><?php echo $mr->ruangan ?></option>
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
                                        <label for="tanggalSidang">Tanggal Sidang</label>
                                        <input type="date" class="form-control" id="tanggalSidang" placeholder="Tanggal Sidang" name="tanggalSidang" value="<?php echo $tanggalSidang; ?>" required>
                                           
                                    </div>
                                </div>
                                 <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="waktu">Waktu Sidang</label>
                                        <input type="time" class="form-control" id="waktu" placeholder="Tanggal Sidang" name="waktu" value="<?php echo $waktu; ?>" required>
                                           
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="judul">Judul Skripsi</label>
                                        <input type="text" class="form-control" id="judul" placeholder="Tanggal Sidang" name="judul" value="<?php echo $judul; ?>" readonly>
                                           
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="linkSidang">Link Sidang</label>
                                        <input type="text" class="form-control" id="linkSidang" placeholder="Link Sidang" name="linkSidang" value="<?php echo $linkSidang; ?>" readonly>
                                           
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