<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Employee details
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <a class="btn btn-info cticket" href="<?php echo base_url() ?>dcadmin/Employee/view_employee" role="button" style="margin-bottom:12px;"> Back</a>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>View employee details</h3>
          </div>
          <div class="panel panel-default">

            <? if(!empty($this->session->flashdata('smessage'))){ ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-check"></i> Alert!</h4>
              <? echo $this->session->flashdata('smessage'); ?>
            </div>
            <? }
                                     			     if(!empty($this->session->flashdata('emessage'))){ ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-ban"></i> Alert!</h4>
              <? echo $this->session->flashdata('emessage'); ?>
            </div>
            <? } ?>


            <div class="panel-body">
              <div class="box-body table-responsive no-padding">
                <table class="table table-bordered table-hover table-striped" id="userTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Day Start</th>
                      <th>Day End</th>

                      <th>Date</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; foreach ($attendance_data->result() as $data) { ?>
                    <tr>
                      <td><?php echo $i ?> </td>
                      <td><?php
                      $this->db->select('*');
                      $this->db->from('tbl_employee');
                      $this->db->where('id', $data->employee_id);
                      $employee_data= $this->db->get()->row();
                      echo $employee_data->name;
                      ?>
                     </td>
                     <td><?php echo $data->start ?></td>
                     <td><?php echo $data->end ?></td>

                      <td><?php echo $data->date ?></td>
                      <td><?php if ($data->attendance==1) { ?>
                        <p class="label bg-green">Present</p>

                        <?php } else { ?>
                        <p class="label bg-red">Absent</p>


                        <?php		}   ?>
                      </td>
                      <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu">
                              <?if ($this->session->userdata('position')=="Super Admin") {
                          ?>

                              <?php if ($data->attendance==1) { ?>
                              <li><a href="<?php echo base_url() ?>dcadmin/Employee_details/updateemployeeStatus/<?php echo base64_encode($data->id) ?>/inactive">Absent</a></li>
                              <?php } else { ?>
                              <li><a href="<?php echo base_url() ?>dcadmin/Employee_details/updateemployeeStatus/<?php echo base64_encode($data->id) ?>/active">Present</a></li>
                            <?php		} ?>
                              <li><a href="<?php echo base_url() ?>dcadmin/Tour/view_tour/<?php echo base64_encode($data->employee_id) ?>">Tour Details</a></li>
                              <li><a href="<?php echo base_url() ?>dcadmin/Tour_photos/view_tour_photos/<?php echo base64_encode($data->employee_id) ?>">Photos Uploaded</a></li>
                              <li><a href="<?php echo base_url() ?>dcadmin/Tour_km/view_tour_km/<?php echo base64_encode($data->employee_id) ?>">Kilometers Travelled</a></li>
                              <!-- <li><a href="javascript:;" class="dCnf" mydata="<?php echo $i ?>">Delete</a></li> -->
                              <?php
                        }else{?><li><a href="<?php echo base_url() ?>dcadmin/Tour/view_tour/<?php echo base64_encode($data->employee_id) ?>">Tour Details</a></li>
                        <li><a href="<?php echo base_url() ?>dcadmin/Tour_photos/view_tour_photos/<?php echo base64_encode($data->employee_id) ?>">Photos Uploaded</a></li>
                        <li><a href="<?php echo base_url() ?>dcadmin/Tour_km/view_tour_km/<?php echo base64_encode($data->employee_id) ?>">Kilometers Travelled</a></li> <?}?>
                            </ul>
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
