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
                                   <form action="<?php echo base_url() ?>dcadmin/employee/add_employee_data/<?php echo base64_encode(2); ?>/<?=$id; ?>" method="POST" id="slide_frm" enctype="multipart/form-data">
                                <div class="table-responsive">
                                    <table class="table table-hover">

											<tr>
                                                <td> <strong>Name</strong>  <span style="color:red;">*</span></strong> </td>
                                                <td>
													<input type="text" name="name"  class="form-control" placeholder="" required value="<?echo $employee_data->name?>" />
	                                            </td>
    										</tr>
                        <tr>
                                                  <td> <strong>Mobile Number</strong>  <span style="color:red;">*</span></strong> </td>
                                                  <td>
  													<input type="text" name="phone"  class="form-control" placeholder="" required value="<?echo $employee_data->phone?>" />
  	                                            </td>
      										</tr>
                          <tr>
                                                    <td> <strong>Email</strong>  <span style="color:red;">*</span></strong> </td>
                                                    <td>
    													<input type="text" name="email"  class="form-control" placeholder="" required value="<?echo $employee_data->email?>" />
    	                                            </td>
        										</tr>
                            <tr>
                                                      <td> <strong>New Password</strong>  <span style="color:red;">*</span></strong> </td>
                                                      <td>
      													<input type="password" name="password"  class="form-control" placeholder="" required value="" />
      	                                            </td>
          										</tr>
                              <tr>
                                                        <td> <strong>State</strong>  <span style="color:red;">*</span></strong> </td>
                                                        <td>
        													<input type="text" name="state"  class="form-control" placeholder="" required value="<?echo $employee_data->state?>" />
        	                                            </td>
            										</tr>
                                <tr>
                                                          <td> <strong>Territory</strong>  <span style="color:red;">*</span></strong> </td>
                                                          <td>
          													<input type="text" name="territory"  class="form-control" placeholder="" required value="<?echo $employee_data->territory?>" />
          	                                            </td>
              										</tr>
                                  <tr>
                                                            <td> <strong>Category of Employee</strong>  <span style="color:red;">*</span></strong> </td>
                                                            <td>
            													<input type="text" name="category"  class="form-control" placeholder="" required value="<?echo $employee_data->category?>" />
            	                                            </td>
                										</tr>
                                    <tr>
                                                              <td> <strong>Tour Details</strong>  <span style="color:red;">*</span></strong> </td>
                                                              <td>
              													<input type="text" name="tour_details"  class="form-control" placeholder="" required value="<?echo $employee_data->tour_details?>" />
              	                                            </td>
                  										</tr>
                                      <tr>
                                                                <td> <strong>Kilometer Details</strong>  <span style="color:red;">*</span></strong> </td>
                                                                <td>
                													<input type="text" name="km_details"  class="form-control" placeholder="" required value="<?echo $employee_data->km_details?>" />
                	                                            </td>
                    										</tr>
                                        <tr>
                                                                  <td> <strong>Sales Details </strong>  <span style="color:red;">*</span></strong> </td>
                                                                  <td>
                  													<input type="text" name="sales_details"  class="form-control" placeholder="" required value="<?echo $employee_data->sales_details?>" />
                  	                                            </td>
                      										</tr>
                                    <tr>
                                                              <td> <strong>Upload Image</strong>  <span style="color:red;">*</span></strong> </td>
                                                              <td>

              													<input type="file" name="image"  class="form-control" placeholder=""  value="" />
                                        <img id="slide_img_path" height=50 width=100  src="<?php echo base_url()."assets/uploads/employee/".$employee_data->image ?>" >

              	                                            </td>
                  										</tr>

                        	<tr>
    												<td colspan="2" >
    													<input type="submit" class="btn btn-success" value="save">
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
<link href="<?php echo base_url() ?>assets/cowadmin/css/jqvmap.css" rel='stylesheet' type='text/css' />
