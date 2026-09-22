<?php

$pengajuanId = '';
$userId = '';
$name = '';
$ajuan1 = '';
$ajuan2 = '';
$dosenId = '';
$dosenId2 = '';

if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
        $pengajuanId = $uf->pengajuanId;
        $userId = $uf->userId;
        $name = $uf->name;
        $ajuan1 = $uf->ajuan1;
        $ajuan2 = $uf->ajuan2;
        $dosenId = $uf->dosenId;
        $dosenId2 = $uf->dosenId2;
    }
}


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-user"></i> Pengajuan Judul
        <small>Ajukan Judul Kamu dan Pembimbing Kamu</small>
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
                    
                    <form role="form" action="<?php echo base_url() ?>pengajuan/editUser" method="post" id="editUser" role="form">
                        <div class="box-body">
                            <div class="row">
                                
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="fname">Full Name</label>
                                        <input type="text" class="form-control" id="fname" placeholder="Full Name" name="fname" value="<?php echo $name; ?>" maxlength="128" readonly>
                                        <input type="hidden" value="<?php echo $userId; ?>" name="userId" id="userId" />  
                                        </div>
                                        </div>
                                    
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="ajuan1">Ajuan Judul 1</label>
                                        <input type="text" class="form-control" id="ajuan1" placeholder="Ajuan Judul Kamu" name="ajuan1" value="<?php echo $ajuan1; ?>" >
                                    </div>
                                    </div>
                            
                            <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="ajuan2">Ajuan Judul 2</label>
                                        <input type="text" class="form-control" id="ajuan2" placeholder="Ajuan Judul Kamu yang Lain" name="ajuan2" value="<?php echo $ajuan2; ?>" >
                                    </div>
                                </div>

                                 <div class="col-md-6">
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
                                </div>    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dosen2">Ajuan Pembimbing 2</label>
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