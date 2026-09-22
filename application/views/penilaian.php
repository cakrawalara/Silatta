<?php

$name = '';
$nim = '';
$judul = '';
$dosenId = '';
$dosen = '';
$statusSidang = '';

if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
        $name = $uf->name;
        $nim = $uf->nim;
        $judul = $uf->judul;
        $dosenId = $uf->dosenId;
        $dosen = $uf->dosen;
        $statusSidang = $uf->statusSidang;
    }
}


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-user"></i> Penilaian Sidang Skripsi
        <small><?php echo $dosen; ?> (Ketua Penguji)</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Penilaian Ketua Penguji </h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url() ?>dosen/penilaian" method="post" id="penilaian" role="form">	
                    	<div class="box-body">
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="fname">Full Name</label>
                                        <input type="text" class="form-control" id="fname" placeholder="Full Name" name="fname" value="<?php echo $name; ?>" maxlength="128" readonly>
                                        <input type="hidden" value="<?php echo $userId; ?>" name="userId" id="userId" />    
                                    </div>
                                </div>
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="nim">NIM</label>
                                        <input type="text" class="form-control" id="nim" placeholder="Full Name" name="nim" value="<?php echo $nim; ?>" maxlength="128" readonly>
                                           
                                    </div>
                                </div>
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="judul">Judul Skripsi</label>
                                        <input type="textfield" class="form-control" id="judul" placeholder="Full Name" name="judul" value="<?php echo $judul; ?>" maxlength="128" readonly>
                                           
                                    </div>
                                </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dosen">Nama Penguji</label>
                                        <select class="form-control" id="dosen" name="dosen" disabled>
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
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="judul">Status Penguji Sebagai</label>
                                        <input type="textfield" class="form-control" id="status" placeholder="Full Name" name="status" value="<?php echo $statusSidang; ?>" maxlength="128" readonly>
                                           
                                    </div>
                                </div>
						<div class="box-body">
						</div>
						<div class="panel panel-default">
						<div class="panel-heading">
						<h1 class="panel-title">Skor Penyajian</h1>
						</div>
						<hr>
							<div class="box-body">
					        <div class="form-group">
					        <label class="col-sm-12 ">a.	Presentasi dan penampilan (bobot 3) * </label>
					        
					            <div class="col-sm-12">
					            <input type="radio" name="a1" value="1" required > 1<br>
					            <input type="radio" name="a1" value="2" required > 2<br>
					            <input type="radio" name="a1" value="3" required > 3<br>
					            <input type="radio" name="a1" value="4" required > 4<br>
					        
					        </div>
					    </div>
					    </div>


					    <div class="box-body">
					        <div class="form-group">
					        <label class="col-sm-12 ">b.	Kerincian dalam memaparkan hasil penelitian (bobot 3) *</label>
					            <div class="col-sm-12">
					            <input type="radio" name="a2" value="1" required> 1<br>
					            <input type="radio" name="a2" value="2" required> 2<br>
					            <input type="radio" name="a2" value="3" required> 3<br>
					            <input type="radio" name="a2" value="4" required> 4<br>
					            
					        </div>
					    </div>
					    </div>

					    <div class="box-body">
					        <div class="form-group">
					        <label class="col-sm-12 ">c.	Cara menjawab pertanyaan (bobot 4) *</label>
					            <div class="col-sm-12">
					            <input type="radio" name="a3" value="1" required> 1<br>
					            <input type="radio" name="a3" value="2" required> 2<br>
					            <input type="radio" name="a3" value="3" required> 3<br>
					            <input type="radio" name="a3" value="4" required> 4<br>
					        </div>
					    </div>
					    </div>

					    </div>
						<div class="panel panel-default">
						<div class="panel-heading">
						<h1 class="panel-title">Ide, Inovasi, dan Manfaat</h1>
						</div>
						<hr>
					    
					    <div class="box-body">
					        <div class="form-group">
					        <label class="col-sm-12 ">a.	Ide (bobot 5) *</label>
					            <div class="col-sm-12">
					            <input type="radio" name="b1" value="1" required> 1<br>
					            <input type="radio" name="b1" value="2" required> 2<br>
					            <input type="radio" name="b1" value="3" required> 3<br>
					            <input type="radio" name="b1" value="4" required> 4<br>
					        </div>
					    </div>
					    </div>

					    <div class="box-body">
					        <div class="form-group">
					        <label class="col-sm-12 ">b.	Inovasi (bobot 5) *</label>
					            <div class="col-sm-12">
					            <input type="radio" name="b2" value="1" required> 1<br>
					            <input type="radio" name="b2" value="2" required> 2<br>
					            <input type="radio" name="b2" value="3" required> 3<br>
					            <input type="radio" name="b2" value="4" required> 4<br>
					        </div>
					    </div>
					    </div>

					    <div class="box-body">
					        <div class="form-group">
					        <label class="col-sm-12 ">c.	Manfaat (bobot 5) *</label>
					            <div class="col-sm-12">
					            <input type="radio" name="b3" value="1" required> 1<br>
					            <input type="radio" name="b3" value="2" required> 2<br>
					            <input type="radio" name="b3" value="3" required> 3<br>
					            <input type="radio" name="b3" value="4" required> 4<br>
					        </div>
					    </div>
					    </div>
					    
					    </div>
						<div class="panel panel-default">
						<div class="panel-heading">
						<h1 class="panel-title">Latar belakang dan upaya penyelesaian</h1>
						</div>
						<hr>

						<div class="box-body">
					        <div class="form-group">
					        <label class="col-sm-12 ">a.	Keberadaan masalah jelas (bobot 5) *</label>
					            <div class="col-sm-12">
					            <input type="radio" name="c1" value="1" required> 1<br>
					            <input type="radio" name="c1" value="2" required> 2<br>
					            <input type="radio" name="c1" value="3" required> 3<br>
					            <input type="radio" name="c1" value="4" required> 4<br>
					        </div>
					    </div>
					    </div>

					    <div class="box-body">
					        <div class="form-group">
					        <label class="col-sm-12 ">b.	Kesesuaian tindakan / penyelesaian masalah (bobot 5) *</label>
					            <div class="col-sm-12">
					            <input type="radio" name="c2" value="1" required> 1<br>
					            <input type="radio" name="c2" value="2" required> 2<br>
					            <input type="radio" name="c2" value="3" required> 3<br>
					            <input type="radio" name="c2" value="4" required> 4<br>
					        </div>
					    </div>
					    </div>

					    <div class="box-body">
					        <div class="form-group">
					        <label class="col-sm-12 ">c.	Argumentasi logis (bobot 5) *</label>
					            <div class="col-sm-12">
					            <input type="radio" name="c3" value="1" required> 1<br>
					            <input type="radio" name="c3" value="2" required> 2<br>
					            <input type="radio" name="c3" value="3" required> 3<br>
					            <input type="radio" name="c3" value="4" required> 4<br>
					        </div>
					    </div>
					    </div>

					    </div>
						<div class="panel panel-default">
						<div class="panel-heading">
						<h1 class="panel-title">Metode penelitian</h1>
						</div>
						<hr>


						<div class="box-body">
					        <div class="form-group">
					        <label class="col-sm-12 ">a.	Kesesuaian dengan masalah (bobot 3) *</label>
					            <div class="col-sm-12">
					            <input type="radio" name="d1" value="1" required> 1<br>
					            <input type="radio" name="d1" value="2" required> 2<br>
					            <input type="radio" name="d1" value="3" required> 3<br>
					            <input type="radio" name="d1" value="4" required> 4<br>
					        </div>
					    </div>
					    </div>

					    <div class="box-body">
					        <div class="form-group">
					        <label class="col-sm-12 ">b.	Ketepatan rancangan (bobot 4) *</label>
					            <div class="col-sm-12">
					            <input type="radio" name="d2" value="1" required> 1<br>
					            <input type="radio" name="d2" value="2" required> 2<br>
					            <input type="radio" name="d2" value="3" required> 3<br>
					            <input type="radio" name="d2" value="4" required> 4<br>
					        </div>
					    </div>
					    </div>

					    <div class="box-body">
					        <div class="form-group">
					        <label class="col-sm-12 ">c.	Ketepatan instrument (bobot 4) *</label>
					            <div class="col-sm-12">
					            <input type="radio" name="d3" value="1" required> 1<br>
					            <input type="radio" name="d3" value="2" required> 2<br>
					            <input type="radio" name="d3" value="3" required> 3<br>
					            <input type="radio" name="d3" value="4" required> 4<br>
					        </div>
					    </div>
					    </div>

					    <div class="box-body">
					        <div class="form-group">
					        <label class="col-sm-12 ">d.	Ketepatan dan ketajaman analisis (bobot 4) *</label>
					            <div class="col-sm-12">
					            <input type="radio" name="d4" value="1" required> 1<br>
					            <input type="radio" name="d4" value="2" required> 2<br>
					            <input type="radio" name="d4" value="3" required> 3<br>
					            <input type="radio" name="d4" value="4" required> 4<br>
					        </div>
					    </div>
					    </div>

					    </div>
						<div class="panel panel-default">
						<div class="panel-heading">
						<h1 class="panel-title">Hasil Penelitian</h1>
						</div>
						<hr>

						<div class="box-body">
					        <div class="form-group">
					        <label class="col-sm-12 ">a.	Kesesuaian dengan tujuan (bobot 5) *</label>
					            <div class="col-sm-12">
					            <input type="radio" name="e1" value="1" required> 1<br>
					            <input type="radio" name="e1" value="2" required> 2<br>
					            <input type="radio" name="e1" value="3" required> 3<br>
					            <input type="radio" name="e1" value="4" required> 4<br>
					        </div>
					    </div>
					    </div>

					    <div class="box-body">
					        <div class="form-group">
					        <label class="col-sm-12 ">b.	Kedalaman bahasan (bobot 5) *</label>
					            <div class="col-sm-12">
					            <input type="radio" name="e2" value="1" required> 1<br>
					            <input type="radio" name="e2" value="2" required> 2<br>
					            <input type="radio" name="e2" value="3" required> 3<br>
					            <input type="radio" name="e2" value="4" required> 4<br>
					        </div>
					    </div>
					    </div>

					    <div class="box-body">
					        <div class="form-group">
					        <label class="col-sm-12 ">c.	Mutu hasil (bobot 5) *</label>
					            <div class="col-sm-12">
					            <input type="radio" name="e3" value="1" required> 1<br>
					            <input type="radio" name="e3" value="2" required> 2<br>
					            <input type="radio" name="e3" value="3" required> 3<br>
					            <input type="radio" name="e3" value="4" required> 4<br>
					        </div>
					    </div>
					    </div>

					     </div>
						<div class="panel panel-default">
						<div class="panel-heading">
						<h1 class="panel-title">Penulisan</h1>
						</div>
						<hr>

						<div class="box-body">
					        <div class="form-group">
					        <label class="col-sm-12 ">a.	Tata Bahasa (bobot 5) *</label>
					            <div class="col-sm-12">
					            <input type="radio" name="f1" value="1" required> 1<br>
					            <input type="radio" name="f1" value="2" required> 2<br>
					            <input type="radio" name="f1" value="3" required> 3<br>
					            <input type="radio" name="f1" value="4" required> 4<br>
					        </div>
					    </div>
					    </div>

					    <div class="box-body">
					        <div class="form-group">
					        <label class="col-sm-12 ">b.	Referensi (bobot 5) *</label>
					            <div class="col-sm-12">
					            <input type="radio" name="f2" value="1" required> 1<br>
					            <input type="radio" name="f2" value="2" required> 2<br>
					            <input type="radio" name="f2" value="3" required> 3<br>
					            <input type="radio" name="f2" value="4" required> 4<br>
					        </div>
					    </div>
					    </div>

					     </div>
						<div class="panel panel-default">
						<div class="panel-heading">
						<h1 class="panel-title">Kompetensi</h1>
						</div>
						<hr>

						<div class="box-body">
					        <div class="form-group">
					        <label class="col-sm-12 ">a.	Pendidikan (bobot 10) *</label>
					            <div class="col-sm-12">
					            <input type="radio" name="g1" value="1" required> 1<br>
					            <input type="radio" name="g1" value="2" required> 2<br>
					            <input type="radio" name="g1" value="3" required> 3<br>
					            <input type="radio" name="g1" value="4" required> 4<br>
					        </div>
					    </div>
					    </div>

					    <div class="box-body">
					        <div class="form-group">
					        <label class="col-sm-12 ">b.	Materi Matematika (bobot 10) *</label>
					            <div class="col-sm-12">
					            <input type="radio" name="g2" value="1" required> 1<br>
					            <input type="radio" name="g2" value="2" required> 2<br>
					            <input type="radio" name="g2" value="3" required> 3<br>
					            <input type="radio" name="g2" value="4" required> 4<br>
					        </div>
					    </div>
					    </div>


					      </div>
						<div class="panel panel-default">
						<div class="panel-heading">
						<h1 class="panel-title">PENILAIAN PROSES BIMBINGAN SKRIPSI</h1>
						</div>
						<hr>

						<div class="box-body">
					        <div class="form-group">
					        <label class="col-sm-12 ">1. Respon (bobot 20)</label>
					            <div class="col-sm-12">
					            <input type="radio" name="i1" value="1" required> 1<br>
					            <input type="radio" name="i1" value="2" required> 2<br>
					            <input type="radio" name="i1" value="3" required> 3<br>
					            <input type="radio" name="i1" value="4" required> 4<br>
					        </div>
					    </div>
					    </div>

					    <div class="box-body">
					        <div class="form-group">
					        <label class="col-sm-12 ">2. Studi Pustaka (bobot 10)</label>
					            <div class="col-sm-12">
					            <input type="radio" name="i2" value="1" required> 1<br>
					            <input type="radio" name="i2" value="2" required> 2<br>
					            <input type="radio" name="i2" value="3" required> 3<br>
					            <input type="radio" name="i2" value="4" required> 4<br>
					        </div>
					    </div>
					    </div>


					    <div class="box-body">
					        <div class="form-group">
					        <label class="col-sm-12 ">3. Tata tulis (bobot 10)</label>
					            <div class="col-sm-12">
					            <input type="radio" name="i3" value="1" required> 1<br>
					            <input type="radio" name="i3" value="2" required> 2<br>
					            <input type="radio" name="i3" value="3" required> 3<br>
					            <input type="radio" name="i3" value="4" required> 4<br>
					        </div>
					    </div>
					    </div>


					    <div class="box-body">
					        <div class="form-group">
					        <label class="col-sm-12 ">4. Motivasi (bobot 10)</label>
					            <div class="col-sm-12">
					            <input type="radio" name="i4" value="1" required> 1<br>
					            <input type="radio" name="i4" value="2" required> 2<br>
					            <input type="radio" name="i4" value="3" required> 3<br>
					            <input type="radio" name="i4" value="4" required> 4<br>
					        </div>
					    </div>
					    </div>

					    <div class="box-body">
					        <div class="form-group">
					        <label class="col-sm-12 ">5. Originalitas data (bobot 20)</label>
					            <div class="col-sm-12">
					            <input type="radio" name="i5" value="1" required> 1<br>
					            <input type="radio" name="i5" value="2" required> 2<br>
					            <input type="radio" name="i5" value="3" required> 3<br>
					            <input type="radio" name="i5" value="4" required> 4<br>
					        </div>
					    </div>
					    </div>


					    <div class="box-body">
					        <div class="form-group">
					        <label class="col-sm-12 ">6. Akurasi Data (bobot 20)</label>
					            <div class="col-sm-12">
					            <input type="radio" name="i6" value="1" required> 1<br>
					            <input type="radio" name="i6" value="2" required> 2<br>
					            <input type="radio" name="i6" value="3" required> 3<br>
					            <input type="radio" name="i6" value="4" required> 4<br>
					        </div>
					    </div>
					    </div>

					    <div class="box-body">
					        <div class="form-group">
					        <label class="col-sm-12 ">7. Kesesuaian Waktu Penelitian (bobot 10 )</label>
					            <div class="col-sm-12">
					            <input type="radio" name="i7" value="1" required> 1<br>
					            <input type="radio" name="i7" value="2" required> 2<br>
					            <input type="radio" name="i7" value="3" required> 3<br>
					            <input type="radio" name="i7" value="4" required> 4<br>
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