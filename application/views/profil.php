<?php

$userId = '';
$ajuan1= '';
$ajuan2= '';
$name = '';
$email = '';
$mobile = '';
$dosenId = '';
$dosenId2 = '';
$nim = '';
$jenisKelamin = '';
$alamat = '';
$tanggalLahir = '';
$agama = '';
$alamatOrtu = '';
$alamatKos = '';
$namaBapak = '';
$namaIbu = '';
$mobileOrtu = '';

if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
        $ajuan1 = $uf->ajuan1;
        $ajuan2 = $uf->ajuan2;
        $userId = $uf->userId;
        $name = $uf->name;
        $email = $uf->email;
        $mobile = $uf->mobile;
        $dosenId = $uf->dosenId;
        $dosenId2 = $uf->dosenId2;
        $nim = $uf->nim;
        $jenisKelamin = $uf->jenisKelamin;
        $alamat = $uf->alamat;
        $tanggalLahir = $uf->tanggalLahir;
        $agama = $uf->agama;
        $alamatOrtu = $uf->alamatOrtu;
        $alamatKos = $uf->alamatKos;
        $namaBapak = $uf->namaBapak;
        $namaIbu = $uf->namaIbu;
        $mobileOrtu = $uf->mobileOrtu;
    }
}


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-user"></i> Profil Mahasiswa
        <small>Edit Your Info</small>
      </h1>
       
    </section>

    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
              <form role="form" action="<?php echo base_url() ?>profil/editUser" method="post" id="editUser" role="form" enctype="multipart/form-data">

                <div class="box box-primary">
                    <center><div class="box-body">
                            <div class="col-md-12">
                            <img src="<?php echo base_url('assets/img/profile/' . $user['image']); ?>" class="img-thumbnail" width="200" height="150" >
                        </div>
                        <br>
                                    <label for="name" class="col-sm-12 col-form-label">Ganti Foto Profil</label>
                                    <br>
                                        <div class="col-sm-12">
                                        <div class="custom-file" >
                                          <input type="file" class="custom-file-input" id="image" name="image">
                                          <p class="help-block text-muted">* Format foto jpg, jpeg dan png (ukuran max <b>300 kb</b>)</p>
                                        </div>
                                        <br>
                             <button type="submit" class="btn btn-primary" onclick="return confirm('Untuk melihat perubahan foto profil anda, silahkan logout terlebih dahulu')">Simpan</button>
                            </div>
                    </div>
                </div>
            </center>

                <div class="box box-primary">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                              
                                    <div class="form-group">
                                        <label for="fname">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="fname" placeholder="Full Name" name="fname" value="<?php echo $name; ?>" maxlength="128">
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
                                        <label for="nim">Nomor Induk Mahasiswa</label>
                                        <input type="nim" class="form-control" id="nim" placeholder="Masukan NIM" name="nim" value="<?php echo $nim; ?>" maxlength="128">
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
                                        <label for="alamat">Alamat tempat tinggal saat ini</label>
                                        <input type="alamat" class="form-control" id="alamat" placeholder="Masukan Alamat Kos" name="alamat" value="<?php echo $alamat; ?>" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Nomor HP</label>
                                        <input type="text" class="form-control" id="mobile" placeholder="Nomor HP" name="mobile" value="<?php echo $mobile; ?>" maxlength="13">
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="ajuan1">Pengajuan Judul 1</label>
                                        <textarea  class="form-control"  disabled><?php echo $ajuan1; ?></textarea>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="ajuan2">Pengajuan Judul 2</label>
                                        <textarea type="text" class="form-control" disabled><?php echo $ajuan2; ?></textarea>
                                    </div>
                                </div>
                                

                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dosen">Pembimbing 1</label>
                                        <select class="form-control" id="dosen" name="dosen" disabled="true">
                                            <option value="0">Belum Ada Pembimbing 1</option>
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
                                            <option value="0">Belum Ada Pembimbing 2</option>
                                            <?php
                                            if(!empty($dosens2))
                                            {
                                                foreach ($dosens2 as $ds)
                                                {
                                                    ?>
                                                    <option value="<?php echo $ds->dosenId2; ?>" <?php if($ds->dosenId2 == $dosenId2) {echo "selected=selected";} ?>><?php echo $ds->dosen2 ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="namaIbu">Nama Ibu</label>
                                        <input type="text" class="form-control" id="namaIbu" placeholder="Nama Ibu Kamu" name="namaIbu" value="<?php echo $namaIbu; ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="namaBapak">Nama Bapak</label>
                                        <input type="text" class="form-control" id="namaBapak" placeholder="Nama Bapak Kamu" name="namaBapak" value="<?php echo $namaBapak; ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobileOrtu">Nomor HP Orang Tua (yang Dapat di Hubungi)</label>
                                        <input type="Number" class="form-control" id="mobileOrtu" placeholder="Nomor HP Orang Tua" name="mobileOrtu" value="<?php echo $mobileOrtu; ?>" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alamatOrtu">Alamat Orang Tua</label>
                                        <input type="text" class="form-control" id="alamatOrtu" placeholder="Alamat Orang Tua" name="alamatOrtu" value="<?php echo $alamatOrtu; ?>" >
                                    </div>
                                </div>

                        </div><!-- /.box-body -->
        
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