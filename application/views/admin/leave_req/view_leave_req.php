<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Leave Requests
    </h1>

  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>View team</h3>
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
                      <th>Employee Name</th>
                      <th>From</th>
                      <th>To</th>
                      <th>Date of Application</th>

                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; foreach ($leave_req_data->result() as $data) { ?>
                    <tr>
                      <td><?php echo $i ?> </td>
                      <td><?php
                      $this->db->select('*');
                      $this->db->from('tbl_employee');
                      $this->db->where('id', $data->employee_id);
                      $employee_data= $this->db->get()->row();
                      echo $employee_data->name;
                      ?></td>
                      <td><?php echo $data->start ?>
                        <td><?php echo $data->end ?>
                          <td><?php echo $data->date ?>

                      <td><?php if ($data->is_active==1) { ?>
                        <p class="label bg-yellow">Pending</p>

                        <?php } else { ?>
                          <?php if ($data->is_active==2) { ?>
                            <p class="label bg-green">Accepted</p>

                            <?php } else { ?>
                        <p class="label bg-red">Rejected</p>


                      <?php		} }  ?>
                      </td>
                      <td>
                        <div class="btn-group" id="btns<?php echo $i ?>">
                          <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu">
                              <?if ($this->session->userdata('position')=="Super Admin") {
                          ?>

                              <?php if ($data->is_active==1) { ?>
                                <li><a href="<?php echo base_url() ?>dcadmin/Leave_req/updateleave_reqStatus/<?php echo base64_encode($data->id) ?>/accept">Accept</a></li>
                              <li><a href="<?php echo base_url() ?>dcadmin/Leave_req/updateleave_reqStatus/<?php echo base64_encode($data->id) ?>/reject">Reject</a></li>
                              <?php } else { ?>
                              <li>NA</li>
                              <?php		} ?>
                              <?php
                      } else {
                          echo "No actions available";
                      }  ?>
                            </ul>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <?php $i++; } ?>
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
<!-- <script type="text/javascript" src="<?php echo base_url() ?>assets/slider/ajaxupload.3.5.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>assets/slider/rs.js"></script>	  -->
