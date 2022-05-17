<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Farmer Details
    </h1>
    <ol class="breadcrumb">
   <li><a href="<?php echo base_url() ?>dcadmin/Home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
   <li class="active">View Farmer Details</li>
  </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>View Farmer Details</h3>
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
                      <th>Name</th>
                      <th>Mobile Number</th>
                      <th>Village/City</th>
                      <th>Status</th>
                      <!-- <th>Action</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; foreach ($farmer_data->result() as $data) {
                                                          if ($this->session->userdata('position')!="Super Admin") {
                                                              $this->db->select('*');
                                                              $this->db->from('tbl_employee');
                                                              $this->db->where('id', $data->employee_id);
                                                              $emp_data= $this->db->get()->row();

                                                              $state_id=$this->session->userdata('state_id');
                                                              $territory_id=$this->session->userdata('territory_id');

                                                              if ($emp_data->state_id==$state_id && $emp_data->territory_id==$territory_id) {?>
                    <tr>
                      <td><?php echo $i ?> </td>
                      <td><?php echo $data->name ?></td>
                      <td><?php echo $data->phone ?></td>
                      <td><?php echo $data->place ?></td>
                      <td><?php if ($data->is_active==1) { ?>
                        <p class="label bg-green">Active</p>

                        <?php } else { ?>
                        <p class="label bg-yellow">Inactive</p>


                      <?php		} ?>
                      </td>

                      <!-- <td>
<div class="btn-group" id="btns<?php echo $i ?>">
<div class="btn-group">
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span></button>
<ul class="dropdown-menu" role="menu">


<li><a href="<?php echo base_url() ?>admin/home/update_team/<?php echo base64_encode($data->id) ?>">Edit</a></li>
<li><a href="javascript:;" class="dCnf" mydata="<?php echo $i ?>">Delete</a></li>
</ul>
</div>
</div>

<div style="display:none" id="cnfbox<?php echo $i ?>">
<p> Are you sure delete this </p>
<a href="<?php echo base_url() ?>admin/home/delete_team/<?php echo base64_encode($data->id); ?>" class="btn btn-danger" >Yes</a>
<a href="javasript:;" class="cans btn btn-default" mydatas="<?php echo $i ?>" >No</a>
</div>
</td> -->
                    </tr>
                    <?php $i++;
                                                          }
                                                          } else {?>
                                                          <tr>
                                                            <td><?php echo $i ?> </td>
                                                            <td><?php echo $data->name ?></td>
                                                            <td><?php echo $data->phone ?></td>
                                                            <td><?php echo $data->place ?></td>
                                                            <td><?php if ($data->is_active==1) { ?>
                                                              <p class="label bg-green">Active</p>

                                                              <?php } else { ?>
                                                              <p class="label bg-yellow">Inactive</p>


                                                            <?php		} ?>
                                                            </td>

                                                            <!-- <td>
                                      <div class="btn-group" id="btns<?php echo $i ?>">
                                      <div class="btn-group">
                                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span></button>
                                      <ul class="dropdown-menu" role="menu">


                                      <li><a href="<?php echo base_url() ?>admin/home/update_team/<?php echo base64_encode($data->id) ?>">Edit</a></li>
                                      <li><a href="javascript:;" class="dCnf" mydata="<?php echo $i ?>">Delete</a></li>
                                      </ul>
                                      </div>
                                      </div>

                                      <div style="display:none" id="cnfbox<?php echo $i ?>">
                                      <p> Are you sure delete this </p>
                                      <a href="<?php echo base_url() ?>admin/home/delete_team/<?php echo base64_encode($data->id); ?>" class="btn btn-danger" >Yes</a>
                                      <a href="javasript:;" class="cans btn btn-default" mydatas="<?php echo $i ?>" >No</a>
                                      </div>
                                      </td> -->
                                                          </tr>
                                                          <?php $i++;
                                                       }
                                                      } ?>
                  </tbody>
                </table>






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
