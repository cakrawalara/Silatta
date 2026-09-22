<?php

$periode = '';

if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
        $periode = $uf->periode;
    }
}



?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-book"></i> List History Seminar
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
                        <form action="<?php echo base_url() ?>listing/historyFound" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="date" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                        </div>
                              
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr >
                      <th class="text-center">No</th>
                      <th class="text-center">Nama Mahasiswa</th>
                      <th class="text-center">NIM</th>
                      <th class="text-center">Tanggal</th>
                      <th class="text-center">Pembimbing 1</th>
                      <th class="text-center">Pembimbing 2</th>
                      <th class="text-center">Reviewer</th>
                      
                      <th class="text-center">Action</th>
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
                        <td><?php echo $record->nim ?></td>
                      <td><?php echo date('d F Y',strtotime($record->tanggal)) ;?></td>
                      <td><?php echo $record->dosen ?></td>
                      <td><?php echo $record->dosen2 ?></td>
                      <td><?php echo $record->reviewer ?></td>
                      
                      <td class="text-center">
                         <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_view<?php echo $record->nim;?>"><i class="fa fa-eye"></i></a>
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
          </section>
        </div>
        </div>
        <?php
        if(!empty($userRecords))
                    {
                        foreach($userRecords as $record)
                        {
                    ?>
        <!-- ============ MODAL HAPUS BARANG =============== -->
        <div class="modal fade" id="modal_hapus<?php echo $record->nim;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Hapus Periode</h3>
            </div>
            <form class="form-horizontal" method="post" >
                
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!-- ============ MODAL  =============== -->
   
        <div class="modal fade" id="modal_view<?php echo $record->nim;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Lihat Histori Seminar <?php echo $record->name;?></h3>
            </div>
            <form class="form-horizontal" method="post" >
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Mahasiswa</label>
                        <div class="col-xs-8">
                            <input name="name" value="<?php echo $record->name?>" class="form-control" type="text" placeholder="Nama Mahasiswa" disabled>
                            <input type="hidden" name="userId" value="<?php echo $record->userId;?>">
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >NIM</label>
                        <div class="col-xs-8">
                            <input name="nim" value="<?php echo $record->nim?>" class="form-control" type="text" placeholder="NIM" disabled>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Judul</label>
                        <div class="col-xs-8">
                            <textarea name="judul" value="<?php echo $record->judul?>" class="form-control" type="text" placeholder="Judul" disabled><?php echo $record->judul?></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Pembimbing 1</label>
                        <div class="col-xs-8">
                            <input name="pembimbing1" value="<?php echo $record->dosen?>" class="form-control" type="text" placeholder="Pembimbing 1" disabled>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Pembimbing 2</label>
                        <div class="col-xs-8">
                            <input name="pembimbing2" value="<?php echo $record->dosen2?>" class="form-control" type="text" placeholder="Pembimbing 2" disabled>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Reviewer</label>
                        <div class="col-xs-8">
                            <input name="reviewer" value="<?php echo $record->reviewer?>" class="form-control" type="text" placeholder="Reviewer" disabled>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Moderator</label>
                        <div class="col-xs-8">
                            <input name="moderator" value="<?php echo $record->moderator?>" class="form-control" type="text" placeholder="Moderator" disabled>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Link Seminar</label>
                        <div class="col-xs-8">
                            <textarea name="linkSeminar" value="<?php echo $record->linkSeminar?>" class="form-control" type="text" placeholder="Link Seminar" ><?php echo $record->linkSeminar?></textarea>
                        </div>
                    </div>
                    
                   
 
                <div class="modal-footer">
                    
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                </div>
            </form>
            </div>
            </div>
        </div>
 
    <!--END MODAL-->
 
    <?php
                        }
                    }
                    ?>
    <!--END MODAL HAPUS -->
        
        
        
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "daftarUjianKompre/kompreAdmin" + value);
            jQuery("#searchList").submit();
        });
    });
</script>