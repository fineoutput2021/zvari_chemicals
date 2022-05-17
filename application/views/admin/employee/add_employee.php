<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Add New Employee
    </h1>

  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-12">

        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Add New Employee</h3>
          </div>

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
            <div class="col-lg-10">
              <form action="<?php echo base_url() ?>dcadmin/employee/add_employee_data/<?php echo base64_encode(1); ?>" method="POST" id="slide_frm" enctype="multipart/form-data">
                <div class="table-responsive">
                  <table class="table table-hover">

                    <tr>
                      <td> <strong>Name</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <input type="text" name="name" class="form-control" placeholder="" required value="" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Mobile Number</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <input type="text" name="phone" class="form-control" placeholder="" required value="" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Email</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <input type="text" name="email" class="form-control" placeholder="" required value="" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Password</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <input type="password" name="password" class="form-control" placeholder="" required value="" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>State</strong> <span style="color:red;">*</span></strong> </td>
                      <td> <select class="form-control" name="state_id" required id="state">
                          <option value="">------Select State---------</option>
                          <?php $i=1; foreach ($state_data->result() as $data) { ?>
                          <option value="<?=$data->id?>"><?=$data->name?></option>
                          <?php $i++; } ?>
                        </select> </td>
                    </tr>
                    <tr>
                      <td> <strong>Territory</strong> <span style="color:red;">*</span></strong> </td>
                      <td> <select class="form-control" name="territory_id" required id="territory">
                          <option value="">------Select Territory---------</option>
                          <?php $i=1; foreach ($territory_data->result() as $data) { ?>
                          <option value="<?=$data->id?>"><?=$data->name?></option>
                          <?php $i++; } ?>
                        </select> </td>
                    </tr>
                    <tr>
                      <td> <strong>Designation</strong> <span style="color:red;">*</span></strong> </td>
                      <td> <select class="form-control" name="position_id" required id="state">
                          <option value="">------Select Designation---------</option>
                          <?php $i=1; foreach ($position_data->result() as $data) { ?>
                          <option value="<?=$data->id?>"><?=$data->name?></option>
                          <?php $i++; } ?>
                        </select> </td>
                    </tr>


                    <tr>
                      <td> <strong>Upload Image</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <input type="file" name="image" class="form-control" placeholder="" required value="" />
                      </td>
                    </tr>

                    <tr>
                      <td colspan="2">
                        <input type="submit" class="btn custom_btn" value="save">
                      </td>
                    </tr>
                  </table>
                </div>

              </form>

            </div>



          </div>

        </div>

      </div>
    </div>
  </section>
</div>


<script type="text/javascript" src="<?php echo base_url() ?>assets/slider/ajaxupload.3.5.js"></script>
<script>
  $(document).ready(function() {
    $("#state").change(function() {
      var vf = $(this).val();
      var yr = $("#territory option:selected").val();
      if (vf == "") {
        return false;

      } else {
        $('#territory option').remove();
        var opton = "<option value=''>Please Select </option>";
        $.ajax({
          url: base_url + "dcadmin/Employee/territory_change?isl=" + vf,
          data: '',
          type: "get",
          success: function(html) {
            if (html != "NA") {
              var s = jQuery.parseJSON(html);
              $.each(s, function(i) {
                opton += '<option value="' + s[i]['id'] + '">' + s[i]['name'] + '</option>';
              });
              $('#territory').append(opton);
              //$('#city').append("<option value=''>Please Select State</option>");

              //var json = $.parseJSON(html);
              //var ayy = json[0].name;
              //var ayys = json[0].pincode;
            } else {
              alert('No territory Found');
              return false;
            }

          }

        })
      }


    })
  });
</script>
<link href="<?php echo base_url() ?>assets/cowadmin/css/jqvmap.css" rel='stylesheet' type='text/css' />
