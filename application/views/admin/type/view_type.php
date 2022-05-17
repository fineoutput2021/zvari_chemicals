<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Type
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <?if ($this->session->userdata('position')=="Super Admin") {
    ?>

        <a class="btn custom_btn" href="<?php echo base_url() ?>dcadmin/Type/add_type/<?=$id;?>" role="button" style="margin-bottom:12px;"> Add Type</a><?php
}?>
        <a class="btn custom_btn" href="<?php echo base_url() ?>dcadmin/Products/view_products" role="button" style="margin-bottom:12px;"> Back</a>

        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>View Type</h3>
          </div>
          <div class="panel panel-default">

            <?php if (!empty($this->session->flashdata('smessage'))) { ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-check"></i> Alert!</h4>
              <?php echo $this->session->flashdata('smessage'); ?>
            </div>
            <?php }
                                                      if (!empty($this->session->flashdata('emessage'))) { ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-ban"></i> Alert!</h4>
              <?php echo $this->session->flashdata('emessage'); ?>
            </div>
            <?php } ?>


            <div class="panel-body">
              <div class="box-body table-responsive no-padding">
                <table class="table table-bordered table-hover table-striped" id="userTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Type Name</th>
                      <th>MRP</th>
                      <th>GST</th>
                      <th>SP</th>
                      <th>GST Price</th>
                      <th>SP GST</th>
                      <th>Stock</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; foreach ($type->result() as $data) { ?>
                    <tr>
                      <td><?php echo $i ?> </td>
                      <td><?php echo $data->name ?></td>
                      <td><?php echo $data->mrp ?></td>
                      <td><?php echo $data->gst ?></td>
                      <td><?php echo $data->sp ?></td>
                      <td><?php echo $data->gstprice ?></td>
                      <td><?php echo $data->spgst ?></td>
                      <td><?php if ($data->stock==1) { ?>
                        <p class="label bg-green">In Stock</p>

                        <?php } else { ?>
                        <p class="label bg-yellow">Out Of Stock</p>


                        <?php		}   ?>
                      </td>

                      <td><?php if ($data->is_active==1) { ?>
                        <p class="label bg-green">Active</p>

                        <?php } else { ?>
                        <p class="label bg-yellow">Inactive</p>


                        <?php		}   ?>
                      </td>
                      <td>
                        <div class="btn-group" id="btns<?php echo $i ?>">
                          <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu">
                              <?if ($this->session->userdata('position')=="Super Admin") {
                               ?>
                              <?php if ($data->stock==1) { ?>
                              <li><a href="<?php echo base_url() ?>dcadmin/Type/updatestockStatus/<?php echo base64_encode($data->id) ?>/outofstock">Out Of Stock</a></li>
                              <?php } else { ?>
                              <li><a href="<?php echo base_url() ?>dcadmin/Type/updatestockStatus/<?php echo base64_encode($data->id) ?>/instock">Instock</a></li>
                              <?php		} ?>
                              <?php if ($data->is_active==1) { ?>
                              <li><a href="<?php echo base_url() ?>dcadmin/Type/updatetypeStatus/<?php echo base64_encode($data->id) ?>/inactive">Inactive</a></li>
                              <?php } else { ?>
                              <li><a href="<?php echo base_url() ?>dcadmin/Type/updatetypeStatus/<?php echo base64_encode($data->id) ?>/active">Active</a></li>
                              <?php		} ?>
                              <li><a href="<?php echo base_url() ?>dcadmin/Type/update_type/<?php echo base64_encode($data->id) ?>">Edit</a></li>
                              <li><a href="javascript:;" class="dCnf" mydata="<?php echo $i ?>">Delete</a></li>
                              <?php
                           } else {
                               echo "No Actions available";
                           }?>
                            </ul>
                          </div>
                        </div>

                        <div style="display:none" id="cnfbox<?php echo $i ?>">
                          <p> Are you sure delete this </p>
                          <a href="<?php echo base_url() ?>dcadmin/Type/delete_type/<?php echo base64_encode($data->id); ?>" class="btn btn-danger">Yes</a>
                          <a href="javasript:;" class="cans btn btn-default" mydatas="<?php echo $i ?>">No</a>
                        </div>
                      </td>
                    </tr>
                    <?php $i++; } ?>
                  </tbody>






              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </section>
</div>


<style>
  label {
    margin: 5px;
  }
</style>
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#userTable').DataTable({
      responsive: true,
      // bSort: true
    });

    $(document.body).on('click', '.dCnf', function() {
      var i = $(this).attr("mydata");
      console.log(i);

      $("#btns" + i).hide();
      $("#cnfbox" + i).show();

    });

    $(document.body).on('click', '.cans', function() {
      var i = $(this).attr("mydatas");
      console.log(i);

      $("#btns" + i).show();
      $("#cnfbox" + i).hide();
    })

  });
</script>
<!-- <script type="text/javascript" src="<?php echo base_url() ?>assets/slider/ajaxupload.3.5.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>assets/slider/rs.js"></script>	  -->
