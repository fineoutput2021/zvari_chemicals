<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Sales Details
    </h1>
    <ol class="breadcrumb">
   <li><a href="<?php echo base_url() ?>dcadmin/Home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
   <li class="active">View sales details</li>
  </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <a class="btn btn-info cticket" href="<?php echo base_url() ?>dcadmin/Employee_details/view_employee_details/<?=$id;?>" role="button" style="margin-bottom:12px;"> Back</a>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>View sales details</h3>
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
                      <th>Order ID</th>
                      <th>Employee Name</th>
                      <th>Mobile Number</th>
                      <th>Shop Name</th>
                      <th>Village/City</th>
                      <th>Total Amount</th>
                      <th>Image</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; foreach ($orders_data->result() as $data) { ?>
                    <tr>
                      <td><?php echo $i ?> </td>
                      <td><?php if (!empty($data->id)) {
                                                          echo $data->id;
                                                      } else {
                                                          echo "No Data";
                                                      }?></td>
                      <td><?php
                      $this->db->select('*');
                      $this->db->from('tbl_employee');
                      $this->db->where('id', $data->employee_id);
                      $employee= $this->db->get()->row();
                      if (!empty($employee)) {
                          echo $employee->name;
                      } else {
                          echo "NA";
                      }
                      ?></td>

                      <td><?php if (!empty($data->phone)) {
                          echo $data->phone;
                      } else {
                          echo "No Data";
                      }?></td>
                      <td><?php if (!empty($data->shop_name)) {
                          echo $data->shop_name;
                      } else {
                          echo "No Data";
                      }?></td>
                      <td><?php if (!empty($data->place)) {
                          echo $data->place;
                      } else {
                          echo "No Data";
                      }?></td>


                      <td><?php if (!empty($data->total_amount)) {
                          echo "₹".$data->total_amount;
                      } else {
                          echo "NA";
                      }?></td>



                      <td><?php if (!empty($data->image)) {?>
                        <img src="<?=base_url()?>assets/uploads/checkout/<?=$data->image?>" width="100px" height="70px">
                        <?} else {
                          echo "No Data";
                      }?>
                      </td>
                      <td>
                        <?php
    $newdate = new DateTime($data->date);
    echo $newdate->format('F j, Y, g:i a');   #d-m-Y  // March 10, 2001, 5:16 pm
    ?>
                      </td>


                      <td>

                        <a class="btn btn-default cticket" href="<?php echo base_url() ?>dcadmin/Oders/view_product_details/<?php echo base64_encode($data->id) ?>" role="button" style="margin-bottom:12px;"> View details</a>

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
