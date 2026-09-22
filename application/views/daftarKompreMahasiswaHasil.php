<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-book"></i> Histori Nilai Kompre
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
                      <th>Nama Mahasiswa</th>
                      <th>Periode Kompre</th>
                      <!--<th>Nilai</th>-->
                      <th>Status</th>
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
                        <td><?php echo $record->name ?></td>
                      <td><?php echo $record->periode ?></td>
                      <!--<td><?php echo $record->nilai ?></td>-->
                      <?php if (($record->statusKelulusan)==0):?>
                      <td class="">
                          <a class="btn btn-sm btn-danger"><i class="fa fa-close"><b> Maaf Kamu Belum Lulus</b></i></a>
                            
                      </td>
                      <?php elseif (($record->statusKelulusan)==1):?>
                      <td class="">
                          <a class="btn btn-sm btn-success" ><i class="fa fa-check"><b> Selamat Kamu Lulus</b></i></a>
                          
                      </td>
                      <?php else: ?>
                      <td class="">
                        <a class="btn btn-sm btn-warning"><b>Menunggu Hasil</b></a>
                     
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
               
          </section>
        </div>