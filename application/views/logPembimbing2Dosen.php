<?php

$dosenId = '';
$userId = '';
$nim  = '';
$name  = '';
$accDosen2  = '';

if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
        $dosenId = $uf->dosenId;
        $userId = $uf->userId;
        $nim = $uf->nim ;
        $name = $uf->name ;
        $accDosen2 = $uf->accDosen2 ;
    }
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-book"></i> Log Activity <?php echo $name; ?>
        <small> Sebagai <b>Pembimbing 2</b></small></h1>
      <h2><small> Status: 
        <?php if (($accDosen2)==0):?>
                      
                          <a class="btn btn-sm btn-danger" ><b>Belum ACC Seminar</b></a>
                          
                          <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                  <a class="btn btn-warning" href="<?php echo base_url(); ?>logDosen/accSempro2/<?php echo $userId; ?>" onclick="return confirm('Apakah anda yakin untuk ACC Seminar <?php echo $name; ?>')"><i class="fa fa-check"></i> Acc Sempro</a>
                    
                </div>
            </div>
        </div>
                           
                      <?php else: ?>
                      
                        <a class="btn btn-sm btn-success" ><i class="fa fa-check"><b> Sudah ACC Seminar</b></i></a>
                      
                      <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                  <a class="btn btn-danger" href="<?php echo base_url(); ?>logDosen/cancelAccSempro2/<?php echo $userId; ?>" onclick="return confirm('Apakah anda yakin untuk Membatalkan ACC Sidang <?php echo $name; ?>')"><i class="fa fa-close"></i> Batalkan ACC</a>
                    
                </div>
            </div>
        </div>
                      <?php endif ?>
      </small></h2>
    </section>
    
    <section class="content">
    
        
                
                
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><b></b></h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>logDosen/pembimbing2" method="POST" id="searchList">
                            
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>No</th>
                      <th>Tanggal Bimbingan</th>
                      <th width="20px">Log Bimbingan</th>
                      <th class="text-center">Actions</th>
                    </tr>
                    <?php
                    if(!empty($userRecords))
                    {
                        $i=1;
                        foreach($userRecords as $record)
                        {

                    ?>
                    <tr >
                        <td><?php echo $i ?></td>
                      <td><?php echo date('d F Y',strtotime($record->tanggalBimbingan2));?></td>
                      <td><?php echo $record->logBimbingan2Seminar ?></td>
                       <?php if (($record->statusSeminar2)==0):?>
                      <td class="text-center">
                          <a class="btn btn-sm btn-warning" href="<?php echo base_url().'logDosen/terima2/'.$record->logSeminar2Id.'/'.$record->nim2; ?>"><b>Verifikasi</b></a>
                            <a class="btn btn-sm btn-info" href="<?php echo base_url().'logDosen/editLog2/'.$record->logSeminar2Id; ?>"><i class="fa fa-eye"></i></a>
                      </td>
                      <?php else: ?>
                      <td class="text-center">
                        <a class="btn btn-sm btn-success" href="<?php echo base_url().'logDosen/unverified2/'.$record->logSeminar2Id.'/'.$record->nim2; ?>"><i class="fa fa-check"><b> Verified</b></i></a>
                      <a class="btn btn-sm btn-info" href="<?php echo base_url().'logDosen/editLog2/'.$record->logSeminar2Id; ?>"><i class="fa fa-eye"></i></a>
                    </td>
                      <?php endif ?>
                      
                    </tr>
                    <?php
                    $i++;
                        }
                    }
                    ?>
                  </table>
                  </div>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div>
            </div>
          </section>
        </div>