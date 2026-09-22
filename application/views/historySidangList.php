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
        <i class="fa fa-clock"></i> List History Sidang
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
                        <form action="<?php echo base_url() ?>listing/historyFound2" method="POST" id="searchList">
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
                      <td><?php echo date('d F Y',strtotime($record->tanggalSidang)) ;?></td>
                      <td><?php echo $record->dosen ?></td>
                      <td><?php echo $record->dosen2 ?></td>
                      <td><?php echo $record->penguji2 ?></td>
                      
                      <td class="text-center">
                           <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_edit<?php echo $record->nim;?>"><i class="fa fa-pencil"></i></a>
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
        <div class="modal fade" id="modal_hapus<?php echo $record->nim;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Hapus Periode</h3>
            </div>
            
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        
        
        <!-- ============ MODAL EDIT RUANGAN =============== -->
   
        <div class="modal fade" id="modal_edit<?php echo $record->nim;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Histori Sidang <?php echo $record->name;?></h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'listing/editHistory'?>">
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
                        <label class="control-label col-xs-3" >Ketua Penguji</label>
                        <div class="col-xs-8">
                            <input name="pembimbing1" value="<?php echo $record->dosen?>" class="form-control" type="text" placeholder="Pembimbing 1" disabled>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Penguji 1</label>
                        <div class="col-xs-8">
                            <input name="pembimbing2" value="<?php echo $record->dosen2?>" class="form-control" type="text" placeholder="Pembimbing 2" disabled>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Penguji 2</label>
                        <div class="col-xs-8">
                            <input name="penguji2" value="<?php echo $record->penguji2?>" class="form-control" type="text" placeholder="Reviewer" disabled>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Link Sidang</label>
                        <div class="col-xs-8">
                            <textarea name="linkSeminar" value="<?php echo $record->linkSidang?>" class="form-control" type="text" placeholder="Link Seminar" ><?php echo $record->linkSidang?></textarea>
                        </div>
                    </div>                    <div class="form-group">
                        <label class="control-label col-xs-3" >Status Penilaian</label>
                        <div class="col-xs-8">
                            <select type="text" class="form-control" id="jadwal" name="jadwal" value="<?php echo $record->jadwal?>">
                                     <option value="<?php echo $record->jadwal?>">
                                         <?php if (($record->jadwal)==1):?>
                      <td class="text-center">
                          <a class="btn btn-sm btn-success"><b>Status Saat Ini : Dapat Dinilai</b></a>
                            
                      </td>
                      <?php else: ?>
                      <td class="text-center">
                        <a class="btn btn-sm btn-danger"><b> Status Saat Ini : Penilaian Ditutup</b></a>
                     
                    </td>
                      <?php endif ?>
                                         
                                         
                                     </option>
                                    <option value="1">Buka Penilaian</option>
                                    <option value="0">Tutup Penilaian</option>
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