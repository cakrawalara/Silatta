<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-book"></i> Penilaian Sidang Skripsi
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
                    <h3 class="box-title">Users List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>dosen/userListing" method="POST" id="searchList">
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
                      <th>Id</th>
                      <th>Name</th>
                      <th>Judul</th>
                      <th>Penguji</th>
                      <th>Status</th>
                      
                      <th class="text-center">Actions</th>
                    </tr>
                    <?php
                    if(!empty($userRecords))
                    {
                        foreach($userRecords as $record)
                        {
                    ?>
                    <tr>
                      <td><?php echo $record->userId ?></td>
                      <td><?php echo $record->name ?></td>
                      <td><?php echo $record->judul ?></td>
                      <td><?php echo $record->dosen ?></td>
                      <td><?php echo $record->statusSidang ?></td>
                      
                      
                      <td class="text-center">
                          <a class="btn btn-sm btn-info" href="<?php echo base_url().'dosen/edit/'.$record->userId; ?>"><i class="fa fa-pencil"></i></a>
                      </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>

                    <?php
                    if(!empty($userRecords2))
                    {
                        foreach($userRecords2 as $record)
                        {
                    ?>
                    <tr>
                      <td><?php echo $record->userId ?></td>
                      <td><?php echo $record->name ?></td>
                      <td><?php echo $record->judul ?></td>
                      <td><?php echo $record->dosen2 ?></td>
                      <td><?php echo $record->statusSidang2 ?></td>
                      
                      
                      
                      <td class="text-center">
                          <a class="btn btn-sm btn-info" href="<?php echo base_url().'dosen/edit2/'.$record->userId; ?>"><i class="fa fa-pencil"></i></a>
                      </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>

                    <?php
                    if(!empty($userRecords3))
                    {
                        foreach($userRecords3 as $record)
                        {
                    ?>
                    <tr>
                      <td><?php echo $record->userId ?></td>
                      <td><?php echo $record->name ?></td>
                      <td><?php echo $record->judul ?></td>
                      <td><?php echo $record->penguji2 ?></td>
                      <td><?php echo $record->status5 ?></td>
                      
                      
                      <td class="text-center">
                          <a class="btn btn-sm btn-info" href="<?php echo base_url().'dosen/edit3/'.$record->userId; ?>"><i class="fa fa-pencil"></i></a>
                      </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
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
            jQuery("#searchList").attr("action", baseURL + "userListing2/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>