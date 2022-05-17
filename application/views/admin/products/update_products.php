<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Update Product
    </h1>
    <ol class="breadcrumb">
   <li><a href="<?php echo base_url() ?>dcadmin/Home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
   <li><a href="<?php echo base_url() ?>dcadmin/Products/view_products"><i class="fa fa-dashboard"></i> View Products</a></li>
  </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-12">

        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Update Product</h3>
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
              <form action=" <?php echo base_url(); ?>dcadmin/Products/add_products_data/<?php echo base64_encode(2); ?>/<?=$id;?>" method="POST" id="slide_frm" enctype="multipart/form-data">
                <div class="table-responsive">
                  <table class="table table-hover">

                    <tr>
                      <td> <strong>Category Name</strong> <span style="color:red;">*</span></strong> </td>
                      <td> <select class="form-control" name="category_id" required id="category">
                          <?php $i=1; foreach ($category_data->result() as $data) { ?>
                          <option value="<?=$data->id?>" <?if ($data->id==$product_data->category_id) {
                                                 echo "selected";
                                             }?>><?=$data->name?></option>
                          <?php $i++; } ?>
                        </select> </td>
                    </tr>
                    <tr>
                      <td> <strong>Name</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <input type="text" name="name" class="form-control" placeholder="" required value="<?=$product_data->product_name?>" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Technical Name</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <input type="text" name="tech_name" class="form-control" placeholder="" required value="<?=$product_data->tech_name?>" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Image1</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <?php if ($product_data->image1!="") {  ?>
                        <img id="slide_img_path" height=50 width=100 src="<?php echo base_url().$product_data->image1 ?>">
                        <?php } else {  ?>
                        Sorry No image Found
                        <?php } ?>
                        <input type="file" name="image1" class="form-control" placeholder="" value="" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Image2</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <?php if ($product_data->image2!="") {  ?>
                        <img id="slide_img_path" height=50 width=100 src="<?php echo base_url().$product_data->image2 ?>">
                        <?php } else {  ?>
                        Sorry No image Found
                        <?php } ?>
                        <input type="file" name="image2" class="form-control" placeholder="" value=">" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Image3</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <?php if ($product_data->image3!="") {  ?>
                        <img id="slide_img_path" height=50 width=100 src="<?php echo base_url().$product_data->image3 ?>">
                        <?php } else {  ?>
                        Sorry No image Found
                        <?php } ?>
                        <input type="file" name="image3" class="form-control" placeholder="" value="" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Image4</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <?php if ($product_data->image4!="") {  ?>
                        <img id="slide_img_path" height=50 width=100 src="<?php echo base_url().$product_data->image4 ?>">
                        <?php } else {  ?>
                        Sorry No image Found
                        <?php } ?>
                        <input type="file" name="image4" class="form-control" placeholder="" value="" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Product Description</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <textarea name="product_desc" class="form-control" placeholder="" required value=""><?=$product_data->product_desc?></textarea>
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Mode of Action</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <input type="text" name="mode_of_action" class="form-control" placeholder="" required value="<?=$product_data->mode_of_action?>" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Major Crops</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <input type="text" name="major_crops" class="form-control" placeholder="" required value="<?=$product_data->major_crops?>" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Target Disease</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <input type="text" name="target_disease" class="form-control" placeholder="" required value="<?=$product_data->target_disease?>" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Dose</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <input type="text" name="dose" class="form-control" placeholder="" required value="<?=$product_data->dose?>" />
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
<link href="<?php echo base_url() ?>assets/cowadmin/css/jqvmap.css" rel='stylesheet' type='text/css' />
