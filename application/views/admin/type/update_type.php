<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Update Type
    </h1>

  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-12">

        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Update Type </h3>
          </div>

          <?php if (!empty($this->session->flashdata('smessage'))) {  ?>
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            <?php echo $this->session->flashdata('smessage');  ?>
          </div>
          <?php }
                               if (!empty($this->session->flashdata('emessage'))) {  ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            <?php echo $this->session->flashdata('emessage');  ?>
          </div>
          <?php }  ?>


          <div class="panel-body">
            <div class="col-lg-10">
              <form action=" <?php echo base_url(); ?>dcadmin/Type/add_type_data/<?php echo base64_encode(2); ?>/<?=$id;?>" method="POST" id="slide_frm" enctype="multipart/form-data">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <tr>
                      <td> <strong>Product Name</strong> <span style="color:red;">*</span></strong> </td>
                      <td> <select class="form-control" name="product_id" required id="category">
                          <option value="">------select product---------</option>
                          <?php $i=1; foreach ($product_data->result() as $data) { ?>
                          <option value="<?=$data->id?>" <?if ($data->id==$type_data->product_id) {
                                   echo "selected";
                               }?>><?=$data->product_name?></option>
                          <?php $i++; } ?>
                        </select> </td>
                    </tr>

                    <tr>
                      <td> <strong>Type Name</strong> <span style="color:red;">*</span></strong> </td>
                      <td> <input type="text" name="name" class="form-control" placeholder="" required value="<?=$type_data->name;?>" /> </td>
                    </tr>
                    <tr>
                      <td> <strong>MRP</strong> <span style="color:red;">*</span></strong> </td>
                      <td> <input type="text" name="mrp" class="form-control" placeholder="" required value="<?=$type_data->mrp;?>" /> </td>
                    </tr>
                    <tr>
                      <td> <strong>GST</strong> <span style="color:red;">*</span></strong> </td>
                      <td> <input type="text" name="gst" class="form-control" placeholder="" required value="<?=$type_data->gst;?>" /> </td>
                    </tr>
                    <tr>
                      <td> <strong>SP</strong> <span style="color:red;">*</span></strong> </td>
                      <td> <input type="text" name="sp" class="form-control" placeholder="" required value="<?=$type_data->sp;?>" /> </td>
                    </tr>
                    <tr>
                      <td> <strong>GST Price</strong> <span style="color:red;">*</span></strong> </td>
                      <td> <input type="text" name="gstprice" class="form-control" placeholder="" required value="<?=$type_data->gstprice;?>" /> </td>
                    </tr>
                    <tr>
                      <td> <strong>SP GST</strong> <span style="color:red;">*</span></strong> </td>
                      <td> <input type="text" name="spgst" class="form-control" placeholder="" required value="<?=$type_data->spgst;?>" /> </td>
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

<script type="text/javascript">
  $(document).ready(function() {
    $("#category").change(function() {
      // alert("hello");
      var vf = $(this).val();
      if (vf == "") {
        return false;
      } else {
        $('#subcategory option').remove();
        var opton = "<option value='0'>No Sub Category</option>";
        $.ajax({
          url: base_url + "dcadmin/Products/getSubcategory?isl=" + vf,
          data: '',
          type: "get",
          success: function(html) {
            if (html != "NA") {
              var s = jQuery.parseJSON(html);
              $.each(s, function(i) {

                opton += '<option value="' + s[i]['id'] + '">' + s[i]['name'] + '</option>';
              });
              $('#subcategory').append(opton);
            } else {
              alert('No Sub Category Found');
              return false;
            }

          }

        })
      }


    })
  });
</script>
<script type="text/javascript" src=" <?php echo base_url()  ?>assets/slider/ajaxupload.3.5.js"></script>
<link href=" <?php echo base_url()  ?>assets/cowadmin/css/jqvmap.css" rel='stylesheet' type='text/css' />
