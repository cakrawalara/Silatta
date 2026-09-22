<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/jquery.dataTables.min.css'?>" rel="stylesheet">
      <h1>
        <i class="fa fa-map-marker"></i> List Ruangan
        <small></small>
      </h1>
    </section>
    
    <section class="content">
    <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                  <a class="btn btn-primary" href="<?php echo base_url(); ?>listing/tambahRuangan"><i class="fa fa-plus"></i> Tambah Ruangan</a>
                    
                </div>
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
                      
                      <td>

                         <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_edit<?php echo $record->ruanganId;?>"> <i class="fa fa-pencil"></i></a>
                         <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_hapus<?php echo $record->ruanganId;?>"> <i class="fa fa-trash"></i></a>
                          
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
        </div>
        <?php
        if(!empty($userRecords))
                    {
                        foreach($userRecords as $record)
                        {
                    ?>
        <!-- ============ MODAL HAPUS  =============== -->
        <div class="modal fade" id="modal_hapus<?php echo $record->ruanganId;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Hapus Ruangan</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'listing/hapusRuangan'?>">
                <div class="modal-body">
                    <p>Anda yakin menghapus Ruang <b><?php echo $record->ruangan;?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="ruanganId" value="<?php echo $record->ruanganId;?>">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        
        <!-- ============ MODAL EDIT =============== -->
        
        <div class="modal fade" id="modal_edit<?php echo $record->ruanganId;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Edit Ruangan <?php echo $record->ruangan;?></h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'listing/editRuangan'?>">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Ruangan</label>
                        <div class="col-xs-8">
                            <input name="ruangan" value="<?php echo $record->ruangan?>" class="form-control" type="text" placeholder="Ruangan">
                            <input type="hidden" name="ruanganId" value="<?php echo $record->ruanganId;?>">
                        </div>
                    </div>
 
                    
                <div class="modal-footer">
                    
                    <button class="btn btn-info">Update</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    <?php
                        }
                    }
                    ?>
    <!--END MODAL HAPUS BARANG-->
    </div>