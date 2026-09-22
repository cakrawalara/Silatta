<?php

$sidangId = '';
$userId = '';
$name = '';
$nim = '';
$dosenId = '';
$dosenId2 = '';
$judul = '';
$linkSidang = '';
$accSidang1 = '';
$accSidang2 = '';
if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
        $sidangId = $uf->sidangId;
        $userId = $uf->userId;
        $name = $uf->name;
        $nim = $uf->nim;
        $judul = $uf->judul;
        $dosenId = $uf->dosenId;
        $dosenId2 = $uf->dosenId2;
        $linkSidang = $uf->linkSidang;
        $accSidang1 = $uf->accSidang1;
        $accSidang2 = $uf->accSidang2;
    }
}


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-user"></i> Pendaftaran Sidang
        <small>Daftarkan Dirimu untuk Sidang</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                <?php 
                    if (($uf->accSidang1)==0 && ($uf->accSidang2)==0 )
                    { ?>
                     <center> <h3><b>Pembimbing 1 & Pembimbing 2 Belum ACC Sidang Skripsi Kamu <br> Semangat Bimbingannya :) </b></h3></center>
                      <?php } 
                      else if (($uf->accSidang1)==0 && ($uf->accSidang2)==1 )
                      { ?>
                      <center> <h3><b>Satu Tahap Lagi, Kamu Belum ACC Pembimbing 1 <br> Semangat Bimbingannya :) </b></h3></center>
                      <?php } 
                      else if (($uf->accSidang1)==1 && ($uf->accSidang2)==0 )
                      { ?>
                      <center> <h3><b>Satu Tahap Lagi, Kamu Belum ACC Pembimbing 2 <br> Semangat Bimbingannya :) </b></h3></center>
                      <?php } 
                      else 
                      { ?>
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter User Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url() ?>sidang/editUser" method="post" id="editUser" role="form">
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
                                        <label for="nim">NIM</label>
                                        <input type="text" class="form-control" id="nim" placeholder="Nomor Induk Mahasiswa" name="nim" value="<?php echo $nim; ?>" maxlength="128" readonly>
                                           
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dosen">Pembimbing 1</label>
                                        <select class="form-control" id="dosen" name="dosen" disabled="true">
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
                                        <select class="form-control" id="dosen2" name="dosen2" disabled="true">
                                            <option value="0">Select Pembimbing 1</option>
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

                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="judul">Judul Sidang Kamu</label>
                                        <input type="text" class="form-control" id="judul" placeholder="Judul Final Kamu" name="judul" value="<?php echo $judul; ?>" maxlength="128" readonly>
                                            
                                    </div>
                                </div>

                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="linkSidang">Link Sidang Kamu</label>
                                        <input type="text" class="form-control" id="linkSidang" placeholder="Link Sidang" name="linkSidang" value="<?php echo $linkSidang; ?>" maxlength="128">
                                            
                                    </div>
                                </div>
                                

                                 
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dosen">Ajuan Pembimbing 1</label>
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
                                </div>     -->
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
        </form>
    </div>
<?php } ?>
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