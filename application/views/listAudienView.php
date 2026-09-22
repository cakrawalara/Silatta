<?php

$periode = '';
$idAudienKuota = '';

if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
        $periode = $uf->periode;
        $idAudienKuota = $uf->idAudienKuota;
    }
}



?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-book"></i> Mahasiswa Mengikuti Audiens
        <small></small>
      </h1>
    </section>
    
    <section class="content">
    <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                   
                </div>
                </div>
                </div>
                
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>pendaftaranAudiens/AudienList" method="POST" id="searchList">
                           
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr >
                      <th>No</th>
                      <th>Nama Mahasiswa</th>
                      <th>NIM</th>
                      
                      <th >Periode Seminar</th>
                      <th>Ruangan</th>
                      
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
                      <td><?php echo $record->ruangan ?></td>
                      
                      
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
            jQuery("#searchList").attr("action", baseURL + "pendaftaranAudiens/AudienList" + value);
            jQuery("#searchList").submit();
        });
    });
</script>