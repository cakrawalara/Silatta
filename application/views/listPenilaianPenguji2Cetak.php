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
<?php

$userId = '';
$nam = '';
$dosen = '';
$a1='';
$a1a='';
$a2='';
$a3='';
$b1='';
$b2='';
$b3='';
$c1='';
$c2='';
$c3='';
$d1='';
$d2='';
$d3='';
$d4='';
$e1='';
$e2='';
$e3='';
$f1='';
$f2='';
$g1='';
$g2='';
$totalPenguji21='';



if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
        $userId = $uf->userId;
        $nam = $uf->name;
        $judul = $uf->judul;
        $dosen = $uf->dosen;
        $a1= $uf->a1;
        $a1a= $uf->a1;
        $a2= $uf->a2;
        $a3= $uf->a3;
        $b1= $uf->b1;
        $b2= $uf->b2;
        $b3= $uf->b3;
        $c1= $uf->c1;
        $c2= $uf->c2;
        $c3= $uf->c3;
        $d1= $uf->d1;
        $d2= $uf->d2;
        $d3= $uf->d3;
        $d4= $uf->d4;
        $e1= $uf->e1;
        $e2= $uf->e2;
        $e3= $uf->e3;
        $f1= $uf->f1;
        $f2= $uf->f2;
         $g1= $uf->g1;
        $g2= $uf->g2;
        $totalPenguji21= $uf->totalPenguji21;
        
    }
}



?>
    <!-- Content Header (Page header) -->
    
    
    <img src="<?php echo base_url(); ?>assets/dist/img/kop-2.jpg" />
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                <p><p>
                    <div class="box-header">
                        <center><h2 class="box-title"> <b>KRITERIA PENILAIAN UJIAN SIDANG SKRIPSI<br>JURUSAN PENDIDIKAN MATEMATIKA<br>FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN  </b></h2></center>
                    </div><!-- /.box-header -->
                    <form role="form" action="<?php echo base_url() ?>penilaian/penilaianPenguji1Cetak" method="post" id="editUser" role="form">
                    <!-- form start -->
                   <div class="box-body table-responsive">
                  <table width="700px" border="0">
		<thead>
				<td width="10px">Nama Peneliti</td>
				<td width="10px">: <?php echo $nam; ?></td>
		</thead>
		<thead>

		<td>Ketua Penguji</td>
		<td>: <?php echo $dosen; ?></td>
		
					
			
		</thead>
		<thead>

		<td>Judul Skripsi</td>
		<td width="10px">: <?php echo $judul; ?></td>
		
		</thead>
		<section>
	</table>
	</div>
	<div class="box-body table-responsive">
                  <table class="table table-bordered table-hover">
	    <thead>
	        <td><center>No</center></td>
	        <td><center>Kriteria</center></td>
	        <td><center>Indikator</center></td>
	        <td><center>Bobot</center></td>
	        <td><center>Skor</center></td>
	        <td><center>Nilai</center></td>
	    </thead>
	    <thead rowspan="2">
	        <td rowspan="3"><center>1</center></td>
	         <td rowspan="3">Penyajian</td>
	             <td>Presentasi dan penampilan</td>
	             <td><center>3</center></td>
	             <td><center><?php echo $a1/3; ?></center></td>
	             <td><center><?php echo $uf->a1; ?></center></td>
	             
	             </tr>
	             <tr>
	            <td>Kerincian dalam memaparkan hasil penelitian</td>
	            <td><center>3</center></td>
	            <td><center><?php echo $a2/3; ?></center></td>
	            <td><center><?php echo $a2; ?></center></td>
	            
	            </tr>
	            <tr>
	             <td>Cara menjawab pertanyaan</td>
	             <td><center>4</center></td>
	             <td><center><?php echo $a3/4; ?></center></td>
	             <td><center><?php echo $a3; ?></center></td>
	             
	            </tr>
	            <td rowspan="3"><center>2</center></td>
	         <td rowspan="3">Ide, Inovasi, dan Manfaat</td>
	         <td>Ide</td>
	         <td><center>5</center></td>
	         <td><center><?php echo $b1/5; ?></center></td>
	         <td><center><?php echo $b1; ?></center></td>
	         
	         <tr>
	          <td>Inovasi</td>   
	          <td><center>5</center></td>
	          <td><center><?php echo $b2/5; ?></center></td>
	          <td><center><?php echo $b2; ?></center></td>
	          
	          </tr>
	          <tr>
	              <td>Manfaat</td>
	              <td><center>5</center></td>
	              <td><center><?php echo $b3/5; ?></center></td>
	              <td><center><?php echo $b3; ?></center></td>
	              
	         </tr>
	         <td rowspan="3"><center>3</center></td>
	         <td rowspan="3">Latar belakang dan upaya penyelesaian</td>
	         <td>Keberadaan masalah jelas</td>
	         <td><center>5</center></td>
	         <td><center><?php echo $c1/5; ?></center></td>
	         <td><center><?php echo $c1; ?></center></td>
	         
	         <tr>
	           <td>Kesesuaian tindakan / penyelesaian masalah</td>
	           <td><center>5</center></td>
	           <td><center><?php echo $c2/5; ?></center></td>
	           <td><center><?php echo $c2; ?></center></td>
	           
	           </tr>
	           <tr>
	               <td>Argumentasi logis</td>
	               <td><center>5</center></td>
	               <td><center><?php echo $c3/5; ?></center></td>
	               <td><center><?php echo $c3; ?></center></td>
	               
	         </tr>
	         <td rowspan="4"><center>4</center></td>
	         <td rowspan="4">Metode penelitian</td>
	         <td>Kesesuaian dengan masalah</td>
	         <td><center>3</center></td>
	         <td><center><?php echo $d1/3; ?></center></td>
	         <td><center><?php echo $d1; ?></center></td>
	         
	         <tr>
	           <td>Ketepatan rancangan</td>
	           <td><center>4</center></td>
	           <td><center><?php echo $d2/4; ?></center></td>
	           <td><center><?php echo $d2; ?></center></td>
	           
	           </tr>
	           <tr>
	               <td>Ketepatan instrumen</td>
	               <td><center>4</center></td>
	               <td><center><?php echo $d3/4; ?></center></td>
	               <td><center><?php echo $d3; ?></center></td>
	               
	               </tr>
	               <tr>
	               <td>Ketepatan dan ketajaman analisis</td>
	               <td><center>4</center></td>
	               <td><center><?php echo $d4/4; ?></center></td>
	               <td><center><?php echo $d4; ?></center></td>
	               
	         </tr>
	         <td rowspan="3"><center>5</center></td>
	         <td rowspan="3">Hasil</td>
	         <td>Kesesuaian dengan tujuan</td>
	         <td><center>5</center></td>
	         <td><center><?php echo $e1/5; ?></center></td>
	         <td><center><?php echo $e1; ?></center></td>
	         
	         <tr>
	           <td>Kedalaman bahasan</td>
	           <td><center>5</center></td>
	           <td><center><?php echo $e2/5; ?></center></td>
	           <td><center><?php echo $e2; ?></center></td>
	           
	           </tr>
	           <tr>
	               <td>Mutu hasil</td>
	               <td><center>5</center></td>
	               <td><center><?php echo $e3/5; ?></center></td>
	               <td><center><?php echo $e3; ?></center></td>
	               
	         </tr>
	         <td rowspan="2"><center>6</center></td>
	         <td rowspan="2">Penulisan</td>
	         <td>Tata Bahasa</td>
	         <td><center>5</center></td>
	         <td><center><?php echo $f1/5; ?></center></td>
	         <td><center><?php echo $f1; ?></center></td>
	         
	         <tr>
	           <td>Referensi</td>
	           <td><center>5</center></td>
	           <td><center><?php echo $f2/5; ?></center></td>
	           <td><center><?php echo $f2; ?></center></td>
	           
	           </tr>
	           
	           <td rowspan="2"><center>7</center></td>
	         <td rowspan="2">Kompetensi</td>
	         <td>Pendidikan</td>
	         <td><center>10</center></td>
	         <td><center><?php echo $g1/10; ?></center></td>
	         <td><center><?php echo $g1; ?></center></td>
	         
	         <tr>
	           <td>Materi Matematika</td>
	           <td><center>10</center></td>
	           <td><center><?php echo $g2/10; ?></center></td>
	           <td><center><?php echo $g2; ?></center></td>
	           
	           </tr>
	           <td><center></center></td>
	           <td><center></center></td>
	           <th><center>Total</center></th>
	           <td><center>100</center></td>
	           <td><center></center></td>
	           <td><center><?php echo $totalPenguji21 ?></center></td>
	    </thead>
	</table>
	</div>
	</section>
	<!--<div>-->
	<!--    <b>I. Catatan:</b>-->
	<!--    <br>-->
	<!--    &nbsp; &nbsp; 1. Kolom skor diisi dengan nilai 1,2,3,4 untuk masing-masing kriteria. Kolom nilai diisi Bobot x Skor-->
	<!--    <br>-->
	<!--    &nbsp; &nbsp; 2. Keterangan nilai: 1. Kurang sekali; 2. Kurang; 3. Baik; 4. Baik Sekali-->
	<!--    <br>-->
	<!--    &nbsp; &nbsp; 3. Nilai Akhir:  ∑ ( bobot x skor ) : ………………………………..-->
	<!--    <br>-->
	<!--    &nbsp; &nbsp; 4. Batas kelulusan (Passing Grade) :  250 dari total skor 400-->
	<!--    <br>-->
	<!--    <b>II. Ketentuan Nilai Akhir</b>-->
	<!--    <br>-->
	<!--    &nbsp; &nbsp; 60 %  NAS (Nilai Akhir Sidang) +  40 % NAP (Nilai Akhir Proses Bimbingan) -->
	<!--    <br>-->
	<!--    <b>III. Mutu Penilaian:</b>-->
	<!--    <br>-->
	<!--    &nbsp; &nbsp; 360  ≤  A  <  400-->
	<!--    <br>&nbsp; &nbsp; 320  ≤  A-  <  360-->
	<!--    <br>&nbsp; &nbsp; 300  ≤  B+  <  320-->
	<!--    <br>&nbsp; &nbsp; 280  ≤  B  <  300-->
	<!--    <br>&nbsp; &nbsp; 260  ≤  B-  <  280-->
	<!--    <br>&nbsp; &nbsp; 240  ≤  C+  <  260-->
	<!--    </div>-->
	<div class="col-md-12">
	    <div class="box-body table-responsive">
                  <table class="table.no-border ">
	    <thead>
	        <td><center>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</center></td>
	        <td><center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</center></td>
	        <td><center>Penguji 2,</center></td>
	        
	    </thead>
	    <thead>
	        <td><center></center></td>
	        <td><center></center></td>
	        <td><center><br><br><br><?php echo $dosen; ?></center></td>
	        
	    </thead>
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