
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Version 2.0</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <a href="<?=base_url()?>dcadmin/Employee/view_employee">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total employees</span>
                  <span class="info-box-number"><?
                    $this->db->select('*');
                    $this->db->from('tbl_employee');
                    $emp_count= $this->db->count_all_results();
                    echo $emp_count;
                  ?></span>
                </div><!-- /.info-box-content -->
              </div></a><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <a href="<?=base_url()?>dcadmin/Farmer_details/view_details">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Farmers</span>
                  <span class="info-box-number"><?
                    $this->db->select('*');
                    $this->db->from('tbl_farmer_details');
                    $fam_count= $this->db->count_all_results();
                    echo $fam_count;
                  ?></span>
                </div><!-- /.info-box-content -->
              </div></a><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <a href="<?=base_url()?>dcadmin/Orders/view_orders">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">New Orders</span>
                  <span class="info-box-number"><?
                    date_default_timezone_set("Asia/Calcutta");
                    $cur_date=date("Y-m-d");
                    $this->db->select('*');
                    $this->db->from('tbl_order1');
                    $this->db->like('date', $cur_date);
                    $order_count= $this->db->count_all_results();
                    echo $order_count;
                  ?></span>
                </div><!-- /.info-box-content -->
              </div></a><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <a href="<?=base_url()?>dcadmin/Products/view_products">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="ion ion-ios-pricetags-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total products</span>
                  <span class="info-box-number"><?
                  $this->db->select('*');
                  $this->db->from('tbl_products');
                  $pro_count= $this->db->count_all_results();
                  echo $pro_count;
                  ?></span>
                </div><!-- /.info-box-content -->
              </div></a><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->


        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


    </div><!-- ./wrapper -->
