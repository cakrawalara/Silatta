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
        <i class="fa fa-book"></i> Nilai Kompre
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
                        <form action="<?php echo base_url() ?>DaftarUjianKompre/kompreAdmin" method="POST" id="searchList">
                            <div class="input-group">
                                <select  id="searchText" name="searchText" class="form-control input-sm pull-right" style="width: 150px;">
                                            <option value="periode">Select Periode</option>
                                            <?php
                                            if(!empty($periodeKompre))
                                            {
                                                foreach ($periodeKompre as $rl)
                                                {
                                                    ?>
                                                    <option value="<?php echo $rl->periode; ?>" <?php if($rl->periode == $periode) {echo "selected=selected";} ?>><?php echo $rl->periode ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                              <!--<input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>-->
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList">View</button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr >
                      <th>No</th>
                      <th>Nama Mahasiswa</th>
                      <th>NIM</th>
                      
                      <th >Periode Kompre</th>
                      <th>Nilai</th>
                      <th class="text-center">Status</th>
                      
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
                      <td><?php echo $record->periode ?></td>
                      <td><?php echo $record->nilai ?></td>
                      <?php if (($record->statusKelulusan)==0):?>
                      <td class="text-center">
                          <a class="btn btn-sm btn-danger"><i class="fa fa-close"><b> Belum Lulus</b></i></a>
                            
                      </td>
                      <?php elseif (($record->statusKelulusan)==1):?>
                      <td class="text-center">
                          <a class="btn btn-sm btn-success" ><i class="fa fa-check"><b> Sudah Lulus</b></i></a>
                          
                      </td>
                      <?php else: ?>
                      <td class="text-center">
                        <a class="btn btn-sm btn-warning"><i class="fa fa-clock-o"><b> Belum Dinilai</b></i></a>
                     
                    </td>
                      <?php endif ?>
                      <td class="text-center">
                          <a class="btn btn-sm btn-info" href="<?php echo base_url().'daftarUjianKompre/edit/'.$record->idKompre; ?>"><i class="fa fa-pencil"></i></a>
                          <!--<a class="btn btn-sm btn-danger deleteUser" href="#" data-userid="<?php echo $record->userId; ?>"><i class="fa fa-trash"></i></a>-->
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