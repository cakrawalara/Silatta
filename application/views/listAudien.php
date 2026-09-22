<?php



$idPeriodeSempro = '';
$idAudienKuota = '';
$periode= '';
$kuota= '';
$status= '';


if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
        
        $idPeriodeSempro = $uf->idPeriodeSempro;
        $periode = $uf->periode;
        $kuota = $uf->kuota;
        $idAudienKuota = $uf->idAudienKuota;
        $status = $uf->status;
    }
}


?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/jquery.dataTables.min.css'?>" rel="stylesheet">
      <h1>
        <i class="fa fa-users"></i> Manajemen Audien
        <small></small>
      </h1>
    </section>
    
    <section class="content">
    <div class="col-xs-12 text-right">
                <div class="form-group">
                    
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>pendaftaranAudiens/addNew"><i class="fa fa-plus"></i> Add New</a>
                    <a class="btn btn-success" href="<?=site_url('pendaftaranAudiens/export')?>"><i class="fa fa-download"></i> Export Data</a>
                </div>
            </div>
       
                
                
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><b></b></h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>" method="POST" id="searchList">
                            
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>No</th>
                      <th>Ruangan</th>
                      <th>Periode</th>
                      <th>Kuota</th>
                      <th class="text-center">Status</th>
                      <th>Action</th>
                    </tr>
                    <?php
                    if(!empty($userRecords))
                    {
                        $i=1;
                        foreach($userRecords as $record)
                        {
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                      <td><?php echo $record->ruangan ?></td>
                      <td><?php echo $record->periode ?></td>
                      <td><?php echo $record->kuota ?></td>
                     <?php if (($record->status)==1):?>
                      <td class="text-center">
                          <a class="btn btn-sm btn-success"><i class="fa fa-door"><b> Dibuka</b></i></a>
                            
                      </td>
                      <?php else: ?>
                      <td class="text-center">
                        <a class="btn btn-sm btn-danger"><i class="fa fa-close"><b> Ditutup</b></i></a>
                     
                    </td>
                      <?php endif ?>
                     
                      <td>
                            <a class="btn btn-sm btn-success" href="<?php echo base_url().'pendaftaranAudiens/AudienList/'.$record->idAudienKuota; ?>"><i class="fa fa-eye"></i></a>
                          <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_edit<?php echo $record->idAudienKuota;?>"><i class="fa fa-pencil"></i></a>
                         <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_hapus<?php echo $record->idAudienKuota;?>"> <i class="fa fa-trash"></i></a>
                          
                      </td>
                    </tr>
                    <?php
                    $i++;
                        }
                    }
                    ?>
                  </table>
                  </div>
                </div><!-- /.box-body -->
               
          </section>
        </div>
        <?php
        if(!empty($userRecords))
                    {
                        foreach($userRecords as $record)
                        {
                    ?>
        <!-- ============ MODAL HAPUS BARANG =============== -->
        <div class="modal fade" id="modal_hapus<?php echo $record->idAudienKuota;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Hapus Periode</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'pendaftaranAudiens/hapusRuang'?>">
                <div class="modal-body">
                    <p>Anda yakin mau menghapus Ruang <b><?php echo $record->ruangan;?></b> dengan Kuota  <b><?php echo $record->kuota;?></b> </p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="idAudienKuota" value="<?php echo $record->idAudienKuota;?>">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        
        
        <!-- ============ MODAL EDIT RUANGAN =============== -->
   
        <div class="modal fade" id="modal_edit<?php echo $record->idAudienKuota;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Edit Ruangan <?php echo $record->idAudienKuota;?></h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'pendaftaranAudiens/editRuang'?>">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Ruangan</label>
                        <div class="col-xs-8">
                            <input name="ruangan" value="<?php echo $record->ruangan?>" class="form-control" type="text" placeholder="Nama Ruangan" >
                            <input type="hidden" name="idAudienKuota" value="<?php echo $record->idAudienKuota;?>">
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Periode</label>
                        <div class="col-xs-8">
                            <select class="form-control" id="idPeriodeSempro" name="idPeriodeSempro" required>
                                            <option value="">Pilih Periode</option>
                                            <?php
                                            if(!empty($periodeSempro))
                                            {
                                                foreach ($periodeSempro as $rl)
                                                {
                                                    ?>
                                                    
                                                    <option value="<?php echo $rl->idPeriodeSempro; ?>" <?php if($rl->idPeriodeSempro == $idPeriodeSempro) {echo "selected=selected";} ?>><?php echo $rl->periode ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kuota</label>
                        <div class="col-xs-8">
                            <input name="kuota" value="<?php echo $record->kuota?>" class="form-control" type="text" placeholder="Kuota" >
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Status Pendaftaran</label>
                        <div class="col-xs-8">
                            <select type="text" class="form-control" id="status" name="status" value="<?php echo $status; ?>" required>
                                     <option value="<?php echo $status; ?>">Pilih Status</option>
                                    <option value="1">Dibuka</option>
                                    <option value="0">Ditutup</option>
                                </select>
                        </div>
                    </div>
 
                </div>
 
                <div class="modal-footer">
                    
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info">Update</button>
                </div>
            </form>
            </div>
            </div>
        </div>
 
    <!--END MODAL EDIT RUANGAN-->
 
    <?php
                        }
                    }
                    ?>
    <!--END MODAL HAPUS BARANG-->