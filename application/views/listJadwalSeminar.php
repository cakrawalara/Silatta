<?php
$reviewerId ='';
$tempat ='';
$moderatorId = '';
$waktu = '';
$tanggal = '';
$linkSeminar = '';
$judul = '';
if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
        $waktu = $uf->waktu;
        $reviewerId = $uf->reviewerId;
         $tempat = $uf->tempat;
         $tanggal = $uf->tanggal;
        $moderatorId = $uf->moderatorId;
        $linkSeminar = $uf->linkSeminar;
        
    }
}


?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> List Jadwal Seminar Proposal 
        <small></small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                <!--<a class="btn btn-success" href="<?=site_url('listing/exportSeminar')?>"><i class="fa fa-download"></i> Export Data</a>-->
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title"> List Mahasiswa</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>listing/listJadwalSeminar" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>Nama Mahasiswa</th>
                      <th>NIM</th>
                      <th>Judul Skripsi</th>
                      <th>Pembimbing 1</th>
                      <th>Pembimbing 2</th>
                      <th>Reviewer</th>
                      <th>Moderator</th>
                      <th>Tempat</th>
                      <th>Tanggal</th>
                      <th class="text-center">Actions</th>
                    </tr>
                    <?php
                    if(!empty($userRecords))
                    {
                        foreach($userRecords as $record)
                        {
                    ?>
                    <tr>
                      <td><?php echo $record->name ?></td>
                      <td><?php echo $record->nim ?></td>
                      <td><?php echo $record->judul ?></td>
                      <td><?php echo $record->dosen ?></td>
                      <td><?php echo $record->dosen2 ?></td>
                      <td><?php echo $record->reviewer ?></td>
                      <td><?php echo $record->moderator ?></td>
                      <td><?php echo $record->tempat ?></td>
                      <td><?php echo date('d F Y',strtotime($record->tanggal)) ?></td>
                      <td class="text-center">
                     <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal_edit<?php echo $record->userId;?>"><i class="fa fa-pencil"></i></a>
                     <a class="btn btn-sm btn-danger" href="<?php echo base_url().'listing/editJadwalSeminar/'.$record->userId; ?>"><i class="fa fa-power-off"></i></a>
                     </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
                <!--<div class="box-footer clearfix">-->
                <!--    <?php echo $this->pagination->create_links(); ?>-->
                <!--</div>-->
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<?php
        if(!empty($userRecords))
                    {
                        foreach($userRecords as $record)
                        {
                    ?>
        <!-- ============ MODAL HAPUS BARANG =============== -->
        
        
        
        <!-- ============ MODAL EDIT RUANGAN =============== -->
   
        <div class="modal fade" id="modal_edit<?php echo $record->userId;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Edit Jadwal Seminar </h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'listing/editJadwal'?>">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Mahasiswa </label>
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
                           <textarea name="name" value="<?php echo $record->judul?>" class="form-control" type="text" placeholder="Judul" disabled><?php echo $record->judul?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Reviewer</label>
                        <div class="col-xs-8">
                                        <select class="form-control" id="reviewer" name="reviewer">
                                            <option value="0">Select Reviewer</option>
                                            <?php
                                            if(!empty($reviewers))
                                            {
                                                foreach ($reviewers as $rv)
                                                {
                                                    ?>
                                                    <option value="<?php echo $rv->reviewerId; ?>" <?php if($rv->reviewerId == $reviewerId) {echo "selected=selected";} ?>><?php echo $rv->reviewer ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div> 
                                <div class="form-group">
                        <label class="control-label col-xs-3" >Moderator</label>
                                        <div class="col-xs-8">
                                        <select class="form-control" id="moderator" name="moderator" value="<?php echo $record->moderator; ?>" required>
                                            <option value="0">Select Moderator</option>
                                            <?php
                                            if(!empty($moderators))
                                            {
                                                foreach ($moderators as $mr)
                                                {
                                                    ?>
                                                    <option value="<?php echo $mr->moderatorId; ?>" <?php if($mr->moderatorId == $moderatorId) {echo "selected=selected";} ?>><?php echo $mr->moderator ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>   
                            
                            <div class="form-group">
                                        <label for="tempatSidang" class="control-label col-xs-3">Ruang Seminar</label>
                                        <div class="col-xs-8">
                                        <select class="form-control" id="tempat" name="tempat">
                                            <option value="0">Pilih Ruangan</option>
                                            <?php
                                            if(!empty($ruangan))
                                            {
                                                foreach ($ruangan as $mr)
                                                {
                                                    ?>
                                                    <option value="<?php echo $mr->ruangan; ?>" <?php if($mr->ruangan == $tempat) {echo "selected=selected";} ?>><?php echo $mr->ruangan ?></option>
                                                    <?php
                                                }
                                            }
                                            else{ ?>
                                                <option disabled> Belum ada Ruangan (Tambah Ruangan Terlebih Dahulu) </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>   
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tanggal Seminar</label>
                        <div class="col-xs-8">
                                        <input type="date" class="form-control" id="tanggal" placeholder="Tanggal Seminar" name="tanggal" value="<?php echo $record->tanggal; ?>" >
                                           
                                    </div>
                                </div>
                                <div class="form-group">
                        <label class="control-label col-xs-3" >Waktu Seminar</label>
                        <div class="col-xs-8">
                                        <input type="time" class="form-control" id="waktu" placeholder="Tanggal Seminar" name="waktu" value="<?php echo $record->waktu; ?>" >
                                           
                                    </div>
                                </div>
                               
                                 <div class="form-group">
                        <label class="control-label col-xs-3" >Link Seminar</label>
                         <div class="col-xs-8">
                                        <textarea type="text" class="form-control" id="linkSeminar" placeholder="Link Seminar" name="linkSeminar" value="<?php echo $record->linkSeminar; ?>" readonly><?php echo $record->linkSeminar; ?></textarea>
                                           
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
            jQuery("#searchList").attr("action", baseURL + "listing/listJadwalSeminar" + value);
            jQuery("#searchList").submit();
        });
    });
</script>