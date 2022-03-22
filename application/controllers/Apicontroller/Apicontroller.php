<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Apicontroller extends CI_finecontrol
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->model("admin/base_model");
        $this->load->library('user_agent');
        $this->load->library('upload');
    }
    //=============Home Page Slider======================================
    public function get_slider()
    {
        $this->db->select('*');
        $this->db->from('tbl_slider_panel');
        $this->db->where('is_active', 1);
        $slider_data= $this->db->get();
        $slider=[];
        foreach ($slider_data->result() as $data) {
            $slider[]=array('image'=>base_url().$data->image);
        }
        $res = array('message'=>'success',
        'status'=>200,
        'data'=>$slider,
        );

        echo json_encode($res);
    }
    //==============Category================================================
    public function get_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('is_active', 1);
        $category_data= $this->db->get();
        // print_r($category_data);
        // die();
        $category=[];
        foreach ($category_data->result() as $data) {
            $category[]=array('id'=>$data->id,
              'name'=>$data->name);
        }
        $res = array('message'=>'success',
        'status'=>200,
        'data'=>$category,
        );

        echo json_encode($res);
    }
    //====================Category Product Type Details=====================
    public function get_cat_product($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->where('category_id', $id);
        $this->db->where('is_active', 1);
        $product_data= $this->db->get();
        $product=[];
        foreach ($product_data->result() as $data) {
            $this->db->select('*');
            $this->db->from('tbl_type');
            $this->db->where('product_id', $id);
            $type_data= $this->db->get();
            $type=[];
            foreach ($type_data->result() as $data1) {
                $type[]=array('id'=>$data1->id,
            'name'=>$data1->name,
            'mrp'=>$data1->mrp,
            'gst'=>$data1->gst,
            'sp'=>$data1->sp,
            'gstprice'=>$data1->gstprice,
            'spgst'=> $data1->spgst
          );
            }
            $product[]=array('id'=>$data->id,
          'name'=>$data->product_name,
          'image1'=>base_url().$data->image1,
          'image2'=>base_url().$data->image2,
          'image3'=>base_url().$data->image3,
          'image4'=>base_url().$data->image4,
          'price'=>$data->price,
          'product_desc'=>$data->product_desc,
          'mode_of_action'=>$data->mode_of_action,
          'major_crops'=>$data->major_crops,
          'target_disease'=>$data->target_disease,
          'dose'=>$data->dose,
          'type'=>$type
        );
        }
        $res = array('message'=>'success',
        'status'=>200,
        'data'=>$product,
        );

        echo json_encode($res);
    }
    //=======================Product Details================================
    public function get_product_details($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->where('id', $id);
        $this->db->where('is_active', 1);
        $product_data= $this->db->get()->row();
        $product=[];
        $this->db->select('*');
        $this->db->from('tbl_type');
        $this->db->where('product_id', $product_data->id);
        $type_data= $this->db->get();
        $type=[];
        foreach ($type_data->result() as $data1) {
            $type[]=array('id'=>$data1->id,
            'name'=>$data1->name,
            'mrp'=>$data1->mrp,
            'gst'=>$data1->gst,
            'sp'=>$data1->sp,
            'gstprice'=>$data1->gstprice,
            'spgst'=> $data1->spgst
          );
        }
        $product[]=array('id'=>$product_data->id,
          'name'=>$product_data->product_name,
          'image1'=>base_url().$product_data->image1,
          'image2'=>base_url().$product_data->image2,
          'image3'=>base_url().$product_data->image3,
          'image4'=>base_url().$product_data->image4,
          'price'=>$product_data->price,
          'product_desc'=>$product_data->product_desc,
          'mode_of_action'=>$product_data->mode_of_action,
          'major_crops'=>$product_data->major_crops,
          'target_disease'=>$product_data->target_disease,
          'dose'=>$product_data->dose,
          'type'=>$type
        );
    }
    //===================Banner Images=============================
    public function get_banner_image()
    {
        $this->db->select('*');
        $this->db->from('tbl_banner_image');
        $this->db->where('is_active', 1);
        $banner_image_data= $this->db->get();
        $banner_image=[];
        foreach ($banner_image_data->result() as $data) {
            $banner_image[]= array('image1'=>base_url().$data->image1,
        'image2'=>base_url().$data->image2
        );
        }
        $res = array('message'=>'success',
        'status'=>200,
        'data'=>$banner_image,
        );

        echo json_encode($res);
    }
    //==================Employee Data=============================
    public function get_employee_data($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->where('id', $id);
        $employee_data= $this->db->get()->row();

        $employee=[];
        $this->db->select('*');
        $this->db->from('tbl_state');
        $this->db->where('id', $employee_data->state_id);
        $state= $this->db->get()->row();
        $this->db->select('*');
        $this->db->from('tbl_territory');
        $this->db->where('id', $employee_data->territory_id);
        $territory= $this->db->get()->row();
        $this->db->select('*');
        $this->db->from('tbl_position');
        $this->db->where('id', $employee_data->position_id);
        $designation= $this->db->get()->row();
        $employee[]= array(
          // 'id'=>$employee_data ->id,
        'name'=>$employee_data->name,
        // 'phone'=>$employee_data->phone,
        // 'email'=>$employee_data->email,
        // 'state'=>$state->name,
        // 'territory'=>$territory->name,
        // 'designation'=>$designation->name,
        'image'=>base_url().$employee_data->image
        );

        $res = array('message'=>'success',
        'status'=>200,
        'data'=>$employee,
        );

        echo json_encode($res);
    }


    //================Login============================
    public function employee_login()
    {
        // echo "hii";
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('email', 'email', 'required|xss_clean|trim');
            $this->form_validation->set_rules('password', 'password', 'required|xss_clean|trim');
            if ($this->form_validation->run()== true) {
                $email=$this->input->post('email');
                $password=$this->input->post('password');
                date_default_timezone_set("Asia/Calcutta");
                $cur_date=date("Y-m-d H:i:s");
                $start=date("H:i:s");

                $this->db->select('*');
                $this->db->from('tbl_employee');
                $this->db->where('email', $email);

                $emp_data= $this->db->get()->row();
                if (!empty($emp_data)) {
                    if ($emp_data->password==md5($password)) {
                        $id=$emp_data->id;
                        echo $id;
                        $data_insert = array('employee_id'=>$id,
                              'start'=>$start,
                              'attendance' =>1,
                              'date'=>$cur_date
                              );
                        $last_id=$this->base_model->insert_table("tbl_attendance", $data_insert, 1) ;
                        if (!empty($last_id)) {
                            $res = array('message'=>'success',
                                'status'=>200
                              );
                            echo json_encode($res);
                        } else {
                            $res = array('message'=>"Some error occured",
                              'status'=>201
                              );
                            echo json_encode($res);
                        }
                    } else {
                        $res = array('message'=>"Wrong Password",
                    'status'=>201
                    );

                        echo json_encode($res);
                    }
                } else {
                    $res = array('message'=>"Employee not found",
                  'status'=>201
                  );

                    echo json_encode($res);
                }
            } else {
                $res = array('message'=>validation_errors(),
            'status'=>201
            );

                echo json_encode($res);
            }
        } else {
            $res = array('message'=>"Please insert some data",
            'status'=>201
            );

            echo json_encode($res);
        }
    }
    //==============Log out====================================================
    public function employee_logout()
    {
        // echo "hii";
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('email', 'email', 'required|xss_clean|trim');
            $this->form_validation->set_rules('password', 'password', 'required|xss_clean|trim');
            if ($this->form_validation->run()== true) {
                $email=$this->input->post('email');
                $password=$this->input->post('password');
                date_default_timezone_set("Asia/Calcutta");
                $cur_date=date("Y-m-d");
                $end=date("H:i:s");

                $this->db->select('*');
                $this->db->from('tbl_employee');
                $this->db->where('email', $email);

                $emp_data= $this->db->get()->row();
                if (!empty($emp_data)) {
                    if ($emp_data->password==md5($password)) {
                        $id=$emp_data->id;
                        $data_insert = array('employee_id'=>$id,
                                'end'=>$end,
                                );
                        $this->db->where('employee_id', $id);
                        $this->db->like('date', $cur_date);
                        $last_id=$this->db->update('tbl_attendance', $data_insert);
                        if (!empty($last_id)) {
                            $res = array('message'=>'success',
                                  'status'=>200
                                );
                            echo json_encode($res);
                        } else {
                            $res = array('message'=>"Some error occured",
                                'status'=>201
                                );
                            echo json_encode($res);
                        }
                    } else {
                        $res = array('message'=>"Wrong Password",
                      'status'=>201
                      );

                        echo json_encode($res);
                    }
                } else {
                    $res = array('message'=>"Employee not found",
                    'status'=>201
                    );

                    echo json_encode($res);
                }
            } else {
                $res = array('message'=>validation_errors(),
              'status'=>201
              );

                echo json_encode($res);
            }
        } else {
            $res = array('message'=>"Please insert some data",
              'status'=>201
              );

            echo json_encode($res);
        }
    }
    //================add to_cart===================================

    public function add_to_cart()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('token_id', 'token_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('email', 'email', 'xss_clean|trim');
            $this->form_validation->set_rules('authentication', 'authentication', 'xss_clean|trim');
            $this->form_validation->set_rules('product_id', 'product_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('type_id', 'type_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('quantity', 'quantity', 'xss_clean|trim');


            if ($this->form_validation->run()== true) {


             // $address_id=$this->input->post('addr_id');
                $token_id=$this->input->post('token_id');
                $email=$this->input->post('email');
                $authentication=$this->input->post('authentication');
                $product_id=$this->input->post('product_id');
                $type_id=$this->input->post('type_id');
                $quantity=$this->input->post('quantity');
                $ip = $this->input->ip_address();
                date_default_timezone_set("Asia/Calcutta");
                $cur_date=date("Y-m-d H:i:s");

                $this->db->select('*');
                $this->db->from('tbl_employee');
                $this->db->where('email', $email);
                $emp_data= $this->db->get()->row();

                if (!empty($email)) {
                    if ($emp_data->password==md5($authentication)) {
                        $this->db->select('*');
                        $this->db->from('tbl_employee');
                        $this->db->where('email', $email);
                        $employee= $this->db->get()->row();
                        $employee_id=$employee->id;
                        $data_insert = array('employee_id'=>$employee_id,
                        'product_id'=>$product_id,
                        'type_id'=>$type_id,
                        'quantity'=>$quantity,
                        'ip' =>$ip,
                        'date'=>$cur_date
    );

                        $last_id=$this->base_model->insert_table("tbl_cart", $data_insert, 1) ;
                        $res = array('message'=>"Data inserted",
                          'status'=>200
                          );

                        echo json_encode($res);
                        if (!empty($last_id)) {
                        } else {
                            $res = array('message'=>"Some error occured",
                            'status'=>201
                            );

                            echo json_encode($res);
                        }
                    }
                }
                //----------add_to_cart using token id--------------
                else {
                    $data_insert = array('token_id'=>$token_id,
                          'product_id'=>$product_id,
                          'type_id'=>$type_id,
                          'quantity'=>$quantity,
                          'ip' =>$ip,
                          'date'=>$cur_date
    );

                    $last_id=$this->base_model->insert_table("tbl_cart", $data_insert, 1) ;
                    $res = array('message'=>"Data inserted",
                      'status'=>200
                      );

                    echo json_encode($res);
                    if (!empty($last_id)) {
                    } else {
                        $res = array('message'=>"Some error occured",
                      'status'=>201
                      );

                        echo json_encode($res);
                    }
                }
            } else {
                $res = array('message'=>"Please insert some data",
            'status'=>201
            );

                echo json_encode($res);
            }
        }
    }
    //==================Update Cart============================================
    public function update_cart()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('token_id', 'token_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('email', 'email', 'xss_clean|trim');
            $this->form_validation->set_rules('authentication', 'authentication', 'xss_clean|trim');
            $this->form_validation->set_rules('product_id', 'product_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('type_id', 'type_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('quantity', 'quantity', 'xss_clean|trim');


            if ($this->form_validation->run()== true) {


           // $address_id=$this->input->post('addr_id');
                $token_id=$this->input->post('token_id');
                $email=$this->input->post('email');
                $authentication=$this->input->post('authentication');
                $product_id=$this->input->post('product_id');
                $type_id=$this->input->post('type_id');
                $quantity=$this->input->post('quantity');
                $ip = $this->input->ip_address();
                date_default_timezone_set("Asia/Calcutta");
                $cur_date=date("Y-m-d H:i:s");

                $this->db->select('*');
                $this->db->from('tbl_employee');
                $this->db->where('email', $email);
                $emp_data= $this->db->get()->row();

                if (!empty($email)) {
                    if ($emp_data->password==md5($authentication)) {
                        $this->db->select('*');
                        $this->db->from('tbl_employee');
                        $this->db->where('email', $email);
                        $employee= $this->db->get()->row();
                        $employee_id=$employee->id;
                        $data_insert = array('employee_id'=>$employee_id,
                      'product_id'=>$product_id,
                      'type_id'=>$type_id,
                      'quantity'=>$quantity,
                      'ip' =>$ip,
                      'date'=>$cur_date
  );
                        $this->db->where('employee_id', $employee_id);
                        $this->db->where('product_id', $product_id);
                        $this->db->where('type_id', $type_id);
                        $last_id=$this->db->update("tbl_cart", $data_insert) ;
                        $res = array('message'=>"Data Updated",
                        'status'=>200
                        );

                        echo json_encode($res);
                        if (!empty($last_id)) {
                        } else {
                            $res = array('message'=>"Some error occured",
                          'status'=>201
                          );

                            echo json_encode($res);
                        }
                    }
                }
                //----------update_cart using token id--------------
                else {
                    $data_insert = array('token_id'=>$token_id,
                        'product_id'=>$product_id,
                        'type_id'=>$type_id,
                        'quantity'=>$quantity,
                        'ip' =>$ip,
                        'date'=>$cur_date
  );
                    $this->db->where('token_id', $token_id);
                    $this->db->where('product_id', $product_id);
                    $this->db->where('type_id', $type_id);
                    $last_id=$this->db->update("tbl_cart", $data_insert) ;
                    $res = array('message'=>"Data Updated",
                            'status'=>200
                            );

                    echo json_encode($res);
                    if (!empty($last_id)) {
                    } else {
                        $res = array('message'=>"Some error occured",
                    'status'=>201
                    );

                        echo json_encode($res);
                    }
                }
            } else {
                $res = array('message'=>"Please insert some data",
          'status'=>201
          );

                echo json_encode($res);
            }
        }
    }
    //========================Delete Cart===================
    public function delete_cart()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('token_id', 'token_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('email', 'email', 'xss_clean|trim');
            $this->form_validation->set_rules('authentication', 'authentication', 'xss_clean|trim');
            $this->form_validation->set_rules('product_id', 'product_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('type_id', 'type_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('quantity', 'quantity', 'xss_clean|trim');


            if ($this->form_validation->run()== true) {


         // $address_id=$this->input->post('addr_id');
                $token_id=$this->input->post('token_id');
                $email=$this->input->post('email');
                $authentication=$this->input->post('authentication');
                $product_id=$this->input->post('product_id');
                $type_id=$this->input->post('type_id');
                $quantity=$this->input->post('quantity');
                $ip = $this->input->ip_address();
                date_default_timezone_set("Asia/Calcutta");
                $cur_date=date("Y-m-d H:i:s");

                $this->db->select('*');
                $this->db->from('tbl_employee');
                $this->db->where('email', $email);
                $emp_data= $this->db->get()->row();

                if (!empty($email)) {
                    if ($emp_data->password==md5($authentication)) {
                        $this->db->select('*');
                        $this->db->from('tbl_employee');
                        $this->db->where('email', $email);
                        $employee= $this->db->get()->row();
                        $employee_id=$employee->id;
                        $zapak=$this->db->delete('tbl_cart', array('employee_id'=>$employee_id,
                          'product_id'=>$product_id,
                          'type_id'=>$type_id,
                          'quantity'=>$quantity));
                        if ($zapak!=0) {
                            $res = array('message'=>"Data Deleted",
                            'status'=>200
                            );

                            echo json_encode($res);
                        } else {
                            $res = array('message'=>"Some error occured",
                            'status'=>201
                            );

                            echo json_encode($res);
                        }

                        if (!empty($last_id)) {
                        } else {
                            $res = array('message'=>"Some error occured",
                        'status'=>201
                        );

                            echo json_encode($res);
                        }
                    }
                }
                //----------update_cart using token id--------------
                else {
                    $zapak=$this->db->delete('tbl_cart', array('token_id'=>$token_id,
                    'product_id'=>$product_id,
                    'type_id'=>$type_id,
                    'quantity'=>$quantity));
                    if ($zapak!=0) {
                        $res = array('message'=>"Data Deleted",
                      'status'=>200
                      );

                        echo json_encode($res);
                    } else {
                        $res = array('message'=>"Some error occured",
                      'status'=>201
                      );

                        echo json_encode($res);
                    }

                    if (!empty($last_id)) {
                    } else {
                        $res = array('message'=>"Some error occured",
                  'status'=>201
                  );

                        echo json_encode($res);
                    }
                }
            } else {
                $res = array('message'=>"Please insert some data",
        'status'=>201
        );

                echo json_encode($res);
            }
        }
    }
    public function view_cart($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_cart');
        $this->db->where('id', $id);
        $cart_data= $this->db->get()->row();
        $cart=[];
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->where('id', $cart_data->employee_id);
        $employee= $this->db->get()->row();
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->where('id', $cart_data->product_id);
        $product= $this->db->get()->row();
        $this->db->select('*');
        $this->db->from('tbl_type');
        $this->db->where('id', $cart_data->type_id);
        $type= $this->db->get()->row();
        $cart[]= array('token_id'=>$cart_data->token_id,
          'employee name'=>$employee->name,
              'product name'=>$product->product_name,
                  'type'=>$type->name,
                      'quantity'=>$cart_data->quantity
      );
        $res = array('message'=>"success",
'status'=>200,
'data'=>$cart,
);

        echo json_encode($res);
    }
}
