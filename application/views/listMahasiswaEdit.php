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
$name = '';
$nim = '';
$judul = '';
$a1='';
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
$i1='';
$i2='';
$i3='';
$i4='';
$i5='';
$i6='';
$i7='';

if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
        $userId = $uf->userId;
        $name = $uf->name;
        $nim = $uf->nim;
        $judul = $uf->judul;
        $a1= $uf->a1;
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
        $i1= $uf->i1;
        $i2= $uf->i2;
        $i3= $uf->i3;
        $i4= $uf->i4;
        $i5= $uf->i5;
        $i6= $uf->i6;
        $i7= $uf->i7;
    }
}



?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> View Nilai
        <small></small>
      </h1>
    </section>
    
    <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <div class="box-tools">
                    </div>
                </div><!-- /.box-header -->
                
               <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
	    <thead>
	        <td><center>No</center></td>
	        <td><center>Kriteria</center></td>
	        <td><center>Indikator</center></td>
	        <td><center>Bobot</center></td>
	        <td><center>Skor</center></td>
	    </thead>
	    <thead rowspan="2">
	        <td rowspan="3"><center>1</center></td>
	         <td rowspan="3">Penyajian</td>
	             <td>Presentasi dan penampilan</td>
	             <td><center>3</center></td>
	             <td><center><?php echo $uf->a1; ?></center></td>
	             
	             </tr>
	             <tr>
	            <td>Kerincian dalam memaparkan hasil penelitian</td>
	            <td><center>3</center></td>
	            <td><center><?php echo $a2; ?></center></td>
	            
	            </tr>
	            <tr>
	             <td>Cara menjawab pertanyaan</td>
	             <td><center>4</center></td>
	             <td><center><?php echo $a3; ?></center></td>
	             
	            </tr>
	            <td rowspan="3"><center>2</center></td>
	         <td rowspan="3">Ide, Inovasi, dan Manfaat</td>
	         <td>Ide</td>
	         <td><center>5</center></td>
	         <td><center><?php echo $b1; ?></center></td>
	         
	         <tr>
	          <td>Inovasi</td>   
	          <td><center>5</center></td>
	          <td><center><?php echo $b2; ?></center></td>
	          
	          </tr>
	          <tr>
	              <td>Manfaat</td>
	              <td><center>5</center></td>
	              <td><center><?php echo $b3; ?></center></td>
	              
	         </tr>
	         <td rowspan="3"><center>3</center></td>
	         <td rowspan="3">Latar belakang dan upaya penyelesaian</td>
	         <td>Keberadaan masalah jelas</td>
	         <td><center>5</center></td>
	         <td><center><?php echo $c1; ?></center></td>
	         
	         <tr>
	           <td>Kesesuaian tindakan / penyelesaian masalah</td>
	           <td><center>5</center></td>
	           <td><center><?php echo $c2; ?></center></td>
	           
	           </tr>
	           <tr>
	               <td>Argumentasi logis</td>
	               <td><center>5</center></td>
	               <td><center><?php echo $c3; ?></center></td>
	               
	         </tr>
	         <td rowspan="4"><center>4</center></td>
	         <td rowspan="4">Metode penelitian</td>
	         <td>Kesesuaian dengan masalah</td>
	         <td><center>3</center></td>
	         <td><center><?php echo $d1; ?></center></td>
	         
	         <tr>
	           <td>Ketepatan rancangan</td>
	           <td><center>4</center></td>
	           <td><center><?php echo $d2; ?></center></td>
	           
	           </tr>
	           <tr>
	               <td>Ketepatan instrumen</td>
	               <td><center>4</center></td>
	               <td><center><?php echo $d3; ?></center></td>
	               
	               </tr>
	               <tr>
	               <td>Ketepatan dan ketajaman analisis</td>
	               <td><center>4</center></td>
	               <td><center><?php echo $d4; ?></center></td>
	               
	         </tr>
	         <td rowspan="3"><center>5</center></td>
	         <td rowspan="3">Hasil</td>
	         <td>Kesesuaian dengan tujuan</td>
	         <td><center>5</center></td>
	         <td><center><?php echo $e1; ?></center></td>
	         
	         <tr>
	           <td>Kedalaman bahasan</td>
	           <td><center>5</center></td>
	           <td><center><?php echo $e2; ?></center></td>
	           
	           </tr>
	           <tr>
	               <td>Mutu hasil</td>
	               <td><center>5</center></td>
	               <td><center><?php echo $e3; ?></center></td>
	               
	         </tr>
	         <td rowspan="2"><center>6</center></td>
	         <td rowspan="2">Penulisan</td>
	         <td>Tata Bahasa</td>
	         <td><center>5</center></td>
	         <td><center><?php echo $f1; ?></center></td>
	         
	         <tr>
	           <td>Referensi</td>
	           <td><center>5</center></td>
	           <td><center><?php echo $f2; ?></center></td>
	           
	           </tr>
	           
	           <td rowspan="2"><center>7</center></td>
	         <td rowspan="2">Kompetensi</td>
	         <td>Pendidikan</td>
	         <td><center>10</center></td>
	         <td><center><?php echo $g1; ?></center></td>
	         
	         <tr>
	           <td>Materi Matematika</td>
	           <td><center>10</center></td>
	           <td><center><?php echo $g2; ?></center></td>
	           
	           </tr>
	           
	           
	           <td rowspan="7"><center>8</center></td>
	         <td rowspan="7">Nilai Bimbingan</td>
	        <td>Respon</td>
	        <td><center>20</center></td>
	        <td><center><?php echo $uf->i1; ?></center></td>
	         <tr>
	        <td>Studi Pustaka</td>
	        <td><center>10</center></td>
	        <td><center><?php echo $uf->i2; ?></center></td>
	        </tr>
	        <tr>
	        <td>Tata Tulis</td>
	        <td><center>10</center></td>
	        <td><center><?php echo $uf->i3; ?></center></td>
	    </tr>
	    <tr>
	        <td>Motivasi</td>
	        <td><center>10</center></td>
	        <td><center><?php echo $uf->i4; ?></center></td>
	    </tr>
	        
	    <tr>
	        <td>Originalitas Data</td>
	        <td><center>20</center></td>
	        <td><center><?php echo $uf->i5; ?></center></td>

	    </tr>
	    <tr>
	        <td>Akurasi Data</td>
	        <td><center>20</center></td>
	        <td><center><?php echo $uf->i6 ?></center></td>
	    </tr>
	    <tr>
	        <td>Kesesuaian waktu penelitian</td>
	        <td><center>10</center></td>
	        <td><center><?php echo $uf->i7; ?></center></td>
	        
	    </tr>
	        
	   
	        
	           
	    </thead>
	</table>
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