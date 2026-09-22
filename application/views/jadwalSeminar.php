<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <style>
    	.error{
    		color:red;
    		font-weight: normal;
    	}
    </style>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Jadwal Seminar
        <small></small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title"> List Mahasiswa</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>jadwal/jadwalSeminar" method="POST" id="searchList">
                           
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>Nama</th>
                      <th>NIM</th>
                      <th>Judul</th>
                      <th>Pemb. 1</th>
                      <th>Pemb. 2</th>
                      <th>Reviewer</th>
                      <th>Moderator</th>
                      <th>Tanggal</th>
                      <th>Waktu</th>
                      <th>Tempat</th>
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
                      <td><?php echo date('d F Y',strtotime($record->tanggal)) ?></td>
                      <td><?php echo $record->waktu ?></td>
                      <td><?php echo $record->tempat ?></td>
                      
                    </tr>
                    <?php
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

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "listing/listSidang/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>