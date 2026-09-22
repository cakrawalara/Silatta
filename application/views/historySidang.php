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
                        <form action="<?php echo base_url() ?>listing/historyFound2" method="POST" id="searchList">
                            <div class="input-group">
                              <center>  <input type="date" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm " style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div></center>
			                   
                              <div class="input-group">
                              </div>
                            </div>
                        </form>
                        <br>
                        <div class="form-group">
                  
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