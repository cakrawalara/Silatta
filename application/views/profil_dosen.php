<?php

$dosenId = '';
$dosen = '';
$email = '';
$mobile = '';
$nip = '';
$jenisKelamin = '';
$alamat = '';
$tanggalLahir = '';
$agama = '';


if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
        $dosenId = $uf->dosenId;
        $dosen = $uf->dosen;
        $email = $uf->email;
        $mobile = $uf->mobile;
        $nip = $uf->nip;
        $jenisKelamin = $uf->jenisKelamin;
        $alamat = $uf->alamat;
        $tanggalLahir = $uf->tanggalLahir;
        $agama = $uf->agama;
        
    }
}


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-user"></i> Profil Dosen
        <small>Edit Your Info</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    
                    
                    <form role="form" action="<?php echo base_url() ?>profil_dosen/editUser" method="post" id="editUser" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="fname" placeholder="Full Name" name="fname" value="<?php echo $dosen; ?>" maxlength="128">
                                        <input type="hidden" value="<?php echo $userId; ?>" name="userId" id="userId" />    
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                            <label for="jenisKelamin"> Jenis Kelamin </label>
                            <select type="text" class="form-control" id="jenisKelamin" name="jenisKelamin" value="<?php echo $jenisKelamin; ?>" required>
                                    <option value="<?php echo $jenisKelamin; ?>"><?php echo $jenisKelamin; ?></option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nip">Nomor Induk Pegawai</label>
                                        <input type="nip" class="form-control" id="nip" placeholder="Masukan nip" name="nip" value="<?php echo $nip; ?>" maxlength="128">
                                    </div>
                                </div>
                    <div class="col-md-6">
                                    <div class="form-group">
                            <label for="agama"> Agama </label>
                            <select type="text" class="form-control" id="agama" name="agama" value="<?php echo $agama; ?>" required>
                                    <option value="<?php echo $agama; ?>"><?php echo $agama; ?></option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katholik">Katholik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                        </div>
                    </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggalLahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tanggalLahir" placeholder="Masukan tanggalLahir" name="tanggalLahir" value="<?php echo $tanggalLahir; ?>" maxlength="128">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" id="email" placeholder="Masukan email" name="email" value="<?php echo $email; ?>" maxlength="128">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Nomor HP</label>
                                        <input type="text" class="form-control" id="mobile" placeholder="Nomor HP" name="mobile" value="<?php echo $mobile; ?>" maxlength="13">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" placeholder="Alamat Anda" name="alamat" value="<?php echo $alamat; ?>" maxlength="13">
                                    </div>
                                </div>

                                </div>
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
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