  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Add New Type
      </h1>

    </section>
    <section class="content">
      <div class="row">
        <div class="col-lg-12">

          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Add New Type</h3>
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
                <form action="<?php echo base_url() ?>dcadmin/Type/add_type_data/<?php echo base64_encode(1); ?>" method="POST" id="slide_frm" enctype="multipart/form-data">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <input type="hidden" name="product_id" value="<?=$id;?>">

                      <tr>
                        <td> <strong>Type Name</strong> <span style="color:red;">*</span></strong> </td>
                        <td>
                          <input type="text" name="name" class="form-control" placeholder="" required value="" />
                        </td>
                      </tr>
                      <tr>
                        <td> <strong>MRP</strong> <span style="color:red;">*</span></strong> </td>
                        <td>
                          <input type="text" name="mrp" id="mrp" class="form-control" placeholder="" required value="" />
                        </td>
                      </tr>
                      <tr>
                        <td> <strong>Selling Price</strong> <span style="color:red;">*</span></strong> </td>
                        <td>
                          <input type="text" name="sp" id="sp" class="form-control" placeholder="" required value="" />
                        </td>
                      </tr>
                      <tr>
                        <td> <strong>GST(%)</strong> <span style="color:red;">*</span></strong> </td>
                        <td>
                          <input type="text" name="gst" id="gst" class="form-control" placeholder="" required value="" />
                        </td>
                      </tr>

                      <tr>
                        <td> <strong>GST Price</strong> <span style="color:red;">*</span></strong> </td>
                        <td>
                          <input type="text" name="gstprice" id="gstprice" class="form-control" placeholder="" READONLY required />
                        </td>
                      </tr>
                      <tr>
                        <td> <strong>Selling Price with GST</strong> <span style="color:red;">*</span></strong> </td>
                        <td>
                          <input type="text" name="spgst" id="spgst" class="form-control" placeholder="" required value="" READONLY />
                        </td>
                      </tr>




                      <tr>
                        <td colspan="2">
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
  <script>
    $(document).ready(function() {
      $('#gst').keyup(function(ev) {
        var sp = $('#sp').val() * 1;
        var gst = $('#gst').val() * 1;
        var gst_price = (gst / 100) * sp;
        var spgst = sp + gst_price;
        var divobj = document.getElementById('gstprice');
        var gst_p = document.getElementById('spgst');
        divobj.value = gst_price;
        gst_p.value = spgst;
      });
    });
  </script>
  <link href="<?php echo base_url() ?>assets/cowadmin/css/jqvmap.css" rel='stylesheet' type='text/css' />
