<div class="content-wrapper">
        <section class="content-header">
           <h1>
          Add New Product
          </h1>

        </section>
		<section class="content">
		<div class="row">
       <div class="col-lg-12">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Add New Product</h3>
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
                                   <form action="<?php echo base_url() ?>dcadmin/products/add_products_data/<?php echo base64_encode(1); ?>" method="POST" id="slide_frm" enctype="multipart/form-data">
                                <div class="table-responsive">
                                    <table class="table table-hover">

                            <tr>
                                                <td> <strong>Category Name</strong> <span style="color:red;">*</span></strong> </td>
                                                <td> <select class="form-control" name="category_id" required id="category">
                                                    <option value="">------Select Category---------</option>
                                                    <?php $i=1; foreach ($category_data->result() as $data) { ?>
                                                    <option value="<?=$data->id?>"><?=$data->name?></option>
                                                    <?php $i++; } ?>
                                                  </select> </td>
                                              </tr>
                        <tr>
                                                  <td> <strong>Name</strong>  <span style="color:red;">*</span></strong> </td>
                                                  <td>
  													<input type="text" name="name"  class="form-control" placeholder="" required value="" />
  	                                            </td>
      										</tr>
                          <tr>
                                                    <td> <strong>Image1</strong>  <span style="color:red;">*</span></strong> </td>
                                                    <td>
    													<input type="file" name="image1"  class="form-control" placeholder="" required value="" />
    	                                            </td>
        										</tr>
                            <tr>
                                                      <td> <strong>Image2</strong>  <span style="color:red;">*</span></strong> </td>
                                                      <td>
      													<input type="file" name="image2"  class="form-control" placeholder="" required value="" />
      	                                            </td>
          										</tr>
                              <tr>
                                                        <td> <strong>Image3</strong>  <span style="color:red;">*</span></strong> </td>
                                                        <td>
        													<input type="file" name="image3"  class="form-control" placeholder="" required value="" />
        	                                            </td>
            										</tr>
                                <tr>
                                                          <td> <strong>Image4</strong>  <span style="color:red;">*</span></strong> </td>
                                                          <td>
          													<input type="file" name="image4"  class="form-control" placeholder="" required value="" />
          	                                            </td>
              										</tr>
                                  <tr>
                                                            <td> <strong>Price</strong>  <span style="color:red;">*</span></strong> </td>
                                                            <td>
            													<input type="text" name="price"  class="form-control" placeholder="" required value="" />
            	                                            </td>
                										</tr>
                                    <tr>
                                                              <td> <strong>Product Description</strong>  <span style="color:red;">*</span></strong> </td>
                                                              <td>
              													<textarea name="product_desc"  class="form-control" placeholder="" required value=""></textarea>
              	                                            </td>
                  										</tr>
                                      <tr>
                                                                <td> <strong>Mode of Action</strong>  <span style="color:red;">*</span></strong> </td>
                                                                <td>
                													<input type="text" name="mode_of_action"  class="form-control" placeholder="" required value="" />
                	                                            </td>
                    										</tr>
                                        <tr>
                                                                  <td> <strong>Major Crops</strong>  <span style="color:red;">*</span></strong> </td>
                                                                  <td>
                  													<input type="text" name="major_crops"  class="form-control" placeholder="" required value="" />
                  	                                            </td>
                      										</tr>
                                          <tr>
                                                                    <td> <strong>Target Disease</strong>  <span style="color:red;">*</span></strong> </td>
                                                                    <td>
                    													<input type="text" name="target_disease"  class="form-control" placeholder="" required value="" />
                    	                                            </td>
                        										</tr>
                                            <tr>
                                                                      <td> <strong>Dose</strong>  <span style="color:red;">*</span></strong> </td>
                                                                      <td>
                      													<input type="text" name="dose"  class="form-control" placeholder="" required value="" />
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
