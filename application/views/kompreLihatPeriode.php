<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/jquery.dataTables.min.css'?>" rel="stylesheet">
      <h1>
        <i class="fa fa-clock-o"></i> Lihat Periode
        <small></small>
      </h1>
    </section>
    
    <section class="content">
    
       
                
                
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
                      <th>Id Periode</th>
                      <th>Periode Kompre</th>
                      <th>Status Periode</th>
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
                        <td><?php echo $record->idPeriodeKompre ?></td>
                      <td><?php echo $record->periode ?></td>
                      <?php if (($record->aktif)==1):?>
                      <td class="">
                         
                          <a class="btn btn-sm btn-success" ><i class="fa fa-check"><b> Periode Aktif</b></i></a>
                          
                      </td>
                      <?php else: ?>
                      <td class="">
                        <a class="btn btn-sm btn-danger"><i class="fa fa-close"><b> Tidak Aktif  </b></i></a>
                     
                    </td>
                      <?php endif ?>
                      <td>

                          <a class="btn btn-sm btn-info" href="<?php echo base_url().'daftarUjianKompre/editPeriode/'.$record->idPeriodeKompre; ?>"><i class="fa fa-pencil"></i></a>
                         <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_hapus<?php echo $record->idPeriodeKompre;?>"> <i class="fa fa-trash"></i></a>
                          
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
        <div class="modal fade" id="modal_hapus<?php echo $record->idPeriodeKompre;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Hapus Periode</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'DaftarUjianKompre/hapusPeriode'?>">
                <div class="modal-body">
                    <p>Anda yakin mau menghapus <b><?php echo $record->periode;?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="idPeriodeKompre" value="<?php echo $record->idPeriodeKompre;?>">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-danger">Hapus</button>
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