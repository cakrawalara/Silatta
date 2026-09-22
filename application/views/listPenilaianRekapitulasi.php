<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

  </head>
  <style type="text/css">
<!--
 .tab { margin-left: 50px; }
 .tab2{ margin-left: 50px;}
-->
</style>
  <?php



$userId = '';
$tanggalSidang = '';
$name = '';
$NAS = '';
$NAP = '';
$nilai = '';
$hurufMutu = '';
$kriteria = '';
$judul = '';
$dosen = '';
$dosen2 = '';
$ketuaId = '';
$penguji1Id = '';
$penguji2Id = '';
$penguji2 = '';
$totalPenguji11 = '';
$totalPenguji12 = '';
$totalPenguji21 = '';
$totalPenguji22 = '';
$totalKetua1='';
$totalKetua2='';

if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
        $userId = $uf->userId;
        $name = $uf->name;
        $tanggalSidang = $uf->tanggalSidang;
        $judul = $uf->judul;
        $dosen = $uf->dosen;
        $dosen2 = $uf->dosen2;
        $penguji2 = $uf->penguji2;
        $totalPenguji11 = $uf->totalPenguji11;
        $totalPenguji12 = $uf->totalPenguji12;
        $totalPenguji21 = $uf->totalPenguji21;
        $totalPenguji22 = $uf->totalPenguji22;
       $totalKetua1 = $uf->totalKetua1;
       $totalKetua2 = $uf->totalKetua2;
        $ketuaId = $uf->ketuaId;
        $NAS = $uf -> NAS;
        $NAP = $uf -> NAP;
        $nilai = $uf -> nilai;
        $hurufMutu = $uf -> hurufMutu;
        $kriteria = $uf -> kriteria;
    }
}




?>
<img src="<?php echo base_url(); ?>assets/dist/img/kop-2.jpg" />
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                <p><p>
                    <div class="box-header">
                        <center><h2 class="box-title"> <b>BERITA ACARA <br> PENGUJIAN SKRIPSI </b></h2></center>
                    </div><!-- /.box-header -->
                    <form role="form" action="<?php echo base_url() ?>penilaian/penilaianRekap" method="post" id="editUser" role="form">
                    <!-- form start -->
                       <div class="box-body">
                          <font size=3 class="tab">Pada hari ini tanggal <?php echo date('d F Y',strtotime($tanggalSidang));?> telah dilakukan pengujian Skripsi Jurusan Pendidikan Matematika</font><br>
                           <font size=3 class="tab2">Fakultas Keguruan dan Ilmu Pendidikan Universitas Sultan Ageng Tirtayasa</font> 
                           
                               
                    
                    
                    
                   <div class="box-body table-responsive">
                  <table width="500" border="0" class="tab2">
		<thead>
				<th width="10px">NAMA PENELITI</th>
				<td width="10px">: <?php echo $name; ?></td>
		</thead>
		<thead>

		<th>KETUA PENGUJI</th>
		<td>: <?php echo $dosen; ?></td>	
			
		</thead>
		<thead>

		<th>JUDUL SKRIPSI</th>
		<td width="10px">: <?php echo $judul; ?></td>
		
		</thead>
</table>
</div>
<font size=3.5 class="tab2">Adapun hasil pengujian / penilaian skripsi tersebut dinyatakan :</font>
<div class="col-md-6">
    <center><h3><b><?php echo $kriteria;?></b></h3></center>
</div>
</div>
<font size=3.5 class="tab2">dengan Nilai = <b><?php echo $nilai;?> (<?php echo $hurufMutu;?>)</b> sebagaimana format terlampir.</font>
<br>
<br>
<font size=3.5 class="tab2">Demikian berita acara ini kami buat dengan sebenar-benarnya</font>
</div>
<br>
<br>
<div class="col-md-12">
	    <div class="box-body table-responsive">
                  <table class="table.no-border ">
	    <thead>
	        <td><center>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</center></td>
	        <td><center> &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</center></td>
	        <td><center>Serang, <?php echo date('d F Y',strtotime($tanggalSidang));?> <br> Ketua Jurasan Pendidikan Matematika</center></td>
	        
	    </thead>
	    <thead>
	        <td><center></center></td>
	        <td><center></center></td>
	        <td><center><br><br><u>Dr. Cecep Anwar Hadi Firdos Santosa, M.Si.</u><br>NIP. 19810105 200812 1 001</center></td>
	        
	    </thead>
	    </table>
</div>
</div>


<p style="page-break-before : always">









<!--__________________________________________________________________________-->
<img src="<?php echo base_url(); ?>assets/dist/img/kop-2.jpg" />
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                <p><p>
                    <div class="box-header">
                        <center><h2 class="box-title"> <b>REKAPITULASI PENILAIAN UJIAN SIDANG SKRIPSI<br>JURUSAN PENDIDIKAN MATEMATIKA<br>FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN </b></h2></center>
                    </div><!-- /.box-header -->
                    <form role="form" action="<?php echo base_url() ?>penilaian/penilaianRekap" method="post" id="editUser" role="form">
                    <!-- form start -->
                    <div class="box-body">
                  <div class="box-body table-responsive">
                  <table width="500" border="0">
		<thead>
				<td width="30px">NAMA PENELITI</td>
				<td width="30px">: <?php echo $name; ?></td>
		</thead>
		<thead>

		<td>KETUA PENGUJI</td>
		<td>: <?php echo $dosen; ?></td>	
			
		</thead>
		<thead>
		    <td>PENGUJI I</td>
		<td>: <?php echo $dosen2; ?></td>
		</thead>
		<thead>
		    <td>PENGUJI II</td>
		<td>: <?php echo $penguji2; ?></td>
		</thead>
		<thead>

		<td>JUDUL SKRIPSI</td>
		<td width="10px">: <?php echo $judul; ?></td>
		
		</thead>
		<section>
		    
	</table>
	</div>
              <div class="box-body table-responsive">
                  <table class="table table-bordered table-hover">
	    <thead>
	        <th><center>No</center></th>
	        <th><center>Kriteria</center></th>
	        <th><center>Penguji</center></th>
	        <th><center>NAS</center></th>
	        <th><center>NAP</center></th>
	        
	    </thead>  
	    <thead>
	        <td><center>1</center></td>
	        <td><center>KETUA PENGUJI</center></td>
	        <td><center><?php echo $dosen; ?></center></td>
	        <td><center><?php echo $totalKetua1; ?></center></td>
	        <td><center><?php echo $totalKetua2; ?></center></td>
	    </thead>
	    <thead>
	        <td><center>2</center></td>
	        <td><center>PENGUJI I</center></td>
	        <td><center><?php echo $dosen2; ?></center></td>
	        <td><center><?php echo $totalPenguji11; ?></center></td>
	        <td><center><?php echo $totalPenguji12; ?></center></td>
	    </thead>
	    <thead>
	        <td><center>3</center></td>
	        <td><center>PENGUJI II</center></td>
	        <td><center><?php echo $penguji2; ?></center></td>
	        <td><center><?php echo $totalPenguji21; ?></center></td>
	        <td><center>&nbsp;</center></td>
	    </thead>
	    <thead>
	        <td colspan="3"><center></center></td>
	        <td><center><?php echo round($NAS, 2); ?></center></td>
	        <td><center><?php echo round($NAP , 2); ?></center></td>
	    </thead>
	    <thead>
	        <td colspan="3"><center></center></td>
	        <td colspan="2"><center><?php echo round($nilai, 2); ?></center></td>
	    </thead>
	    <thead>
	        <td colspan="3"><center></center></td>
	        <td colspan="2"><center><b><?php echo $hurufMutu; ?> &nbsp;(<?php echo $kriteria; ?>)</b></center></td>
	    </thead>
	    
	    </table>
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