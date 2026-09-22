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
        <i class="fa fa-clock-o"></i> Pilih Periode
        <small></small>
      </h1>
    </section>
    
    <section class="content">
    
       
                
                
        <br>
        <br>
        <center>
                        <form action="<?php echo base_url() ?>DaftarUjianKompre/kompreAdmin" method="POST" id="searchList">
                            <div class="input-group">
                                <select  id="searchText" name="searchText" class="form-control" style="width: 300px;">
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
                              <div class="input-group">
                                <button class="btn  btn-default searchList">View</button>
                              </div>
                            </div>
                        </form>
                        <br>
                        <div class="form-group">
                  <a class="btn btn-primary" href="<?php echo base_url(); ?>DaftarUjianKompre/tambahPeriode"><i class="fa fa-plus"></i> Tambah Periode</a>
                    <a class="btn btn-warning" href="<?php echo base_url(); ?>DaftarUjianKompre/lihatPeriode"><i class="fa fa-eye"></i> Lihat Periode</a>
                </div>
                    </div>
                </div><!-- /.box-header -->
                </center>
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