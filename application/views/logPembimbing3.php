<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-book"></i> Log Pembimbing 1
        <small>Bimbingan Sidang</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                  <a class="btn btn-primary" href="<?php echo base_url(); ?>log/addLog3/<?php echo $this->session->userdata ( 'userId' ); ?>"><i class="fa fa-plus"></i> Add New Log</a>
                    
                </div>
            </div>
        </div>
                
                
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><b>Log List</b></h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>log/pembimbing3" method="POST" id="searchList">
                            
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>No</th>
                      <th>Tanggal Bimbingan</th>
                      <th>Log Bimbingan</th>
                      <th>Status</th>
                      <th class="text-center">Actions</th>
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
                      <td><?php echo date('d F Y',strtotime($record->tanggalBimbingan3));?></td>
                      <td><?php echo $record->logBimbinganSidang ?></td>
                      <?php if (($record->statusSidang)==0):?>
                      <td class="">
                          <a class="btn btn-sm btn-warning"><b>Pending</b></a>
                            
                      </td>
                      <?php else: ?>
                      <td class="">
                        <a class="btn btn-sm btn-success" ><i class="fa fa-check"><b> Approved</b></i></a>
                     
                    </td>
                      <?php endif ?>
                      <td class="text-center">
                          <a class="btn btn-sm btn-info" href="<?php echo base_url().'log/editLog3/'.$record->logSidangId; ?>"><i class="fa fa-pencil"></i></a>
                          <a class="btn btn-sm btn-danger" href="<?php echo base_url().'log/deleteLog3/'.$record->logSidangId.'/'.$record->userId; ?>" onclick="return confirm('Apa kamu yakin hapus Log ini?')"><i class="fa fa-trash"  ></i></a>
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
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div>
            </div>
          </section>
        </div>