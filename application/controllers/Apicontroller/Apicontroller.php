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
        $headers = apache_request_headers();
        $email=$headers['Email'];
        $authentication=$headers['Authentication'];
        if (!empty($email)) {
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
        } else {
            $res = array('message'=>'Email not found',
      'status'=>201,
      );

            echo json_encode($res);
        }
    }
    //=============Home Page Slider 2======================================
    public function get_slider2()
    {
        $headers = apache_request_headers();
        $email=$headers['Email'];
        $authentication=$headers['Authentication'];
        if (!empty($email)) {
            $this->db->select('*');
            $this->db->from('tbl_slider_panel2');
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
        } else {
            $res = array('message'=>'Email not found',
        'status'=>201,
        );

            echo json_encode($res);
        }
    }
    //==============Category================================================
    public function get_category()
    {
        $headers = apache_request_headers();
        $email=$headers['Email'];
        $authentication=$headers['Authentication'];
        if (!empty($email)) {
            $this->db->select('*');
            $this->db->from('tbl_category');
            $this->db->where('is_active', 1);
            $category_data= $this->db->get();
            // print_r($category_data);
            // die();
            $category=[];
            foreach ($category_data->result() as $data) {
                $category[]=array('id'=>$data->id,
              'name'=>$data->name,
              'image'=>base_url().$data->image);
            }
            $res = array('message'=>'success',
        'status'=>200,
        'data'=>$category,
        );

            echo json_encode($res);
        } else {
            $res = array('message'=>'Email not found',
'status'=>201,
);

            echo json_encode($res);
        }
    }
    //====================Category Product Type Details=====================
    public function get_cat_product($id)
    {
        $headers = apache_request_headers();
        $email=$headers['Email'];
        $authentication=$headers['Authentication'];
        if (!empty($email)) {
            $this->db->select('*');
            $this->db->from('tbl_products');
            $this->db->where('category_id', $id);
            $this->db->where('is_active', 1);
            $product_data= $this->db->get();
            $product=[];
            foreach ($product_data->result() as $data) {
                $this->db->select('*');
                $this->db->from('tbl_type');
                $this->db->where('product_id', $data->id);
                $type_data= $this->db->get()->row();
                if (!empty($type_data)) {
                    $type_id=$type_data->id;
                    $type_name=$type_data->name;
                    $type_price=$type_data->sp;
                } else {
                    $type_id="";
                    $type_name=";
            $type_price=";
                }
                $product[]=array('id'=>$data->id,
          'name'=>$data->product_name,
          'tech_name'=>$data->tech_name,
          'image1'=>base_url().$data->image1,
          'product_desc'=>$data->product_desc,
          'type_id'=>$type_id,
          'type_name'=>$type_name,
          'type_price'=>$type_price
        );
            }
            $res = array('message'=>'success',
        'status'=>200,
        'data'=>$product,
        );

            echo json_encode($res);
        } else {
            $res = array('message'=>'Email not found',
'status'=>201,
);

            echo json_encode($res);
        }
    }
    //=======================Product Details================================
    public function get_product_details($id)
    {
        $headers = apache_request_headers();
        $email=$headers['Email'];
        $authentication=$headers['Authentication'];
        if (!empty($email)) {
            $this->db->select('*');
            $this->db->from('tbl_products');
            $this->db->where('id', $id);
            $this->db->where('is_active', 1);
            $product_data= $this->db->get()->row();
            $product=[];
            $image=[];
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
            if (!empty($product_data->image1)) {
                $img1=$product_data->image1;
            } else {
                $img1="";
            }
            if (!empty($product_data->image2)) {
                $img2=$product_data->image2;
            } else {
                $img2="";
            }
            if (!empty($product_data->image3)) {
                $img3=$product_data->image3;
            } else {
                $img3="";
            }
            if (!empty($product_data->image4)) {
                $img4=$product_data->image4;
            } else {
                $img4="";
            }
            $image= array(base_url().$img1,
        base_url().$img2,
        base_url().$img3,
        base_url().$img4
      );
            $product[]=array('id'=>$product_data->id,
          'name'=>$product_data->product_name,
          'tech_name'=>$product_data->tech_name,
          'image'=>$image,
          'product_desc'=>$product_data->product_desc,
          'mode_of_action'=>$product_data->mode_of_action,
          'major_crops'=>$product_data->major_crops,
          'target_disease'=>$product_data->target_disease,
          'dose'=>$product_data->dose,
          'type'=>$type
        );
            $res = array('message'=>'success',
        'status'=>200,
        'data'=>$product,
        );

            echo json_encode($res);
        } else {
            $res = array('message'=>'Email not found',
'status'=>201,
);

            echo json_encode($res);
        }
    }
    //===================Banner Images=============================
    public function get_banner_image()
    {
        $headers = apache_request_headers();
        $email=$headers['Email'];
        $authentication=$headers['Authentication'];
        if (!empty($email)) {
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
        } else {
            $res = array('message'=>'Email not found',
'status'=>201,
);

            echo json_encode($res);
        }
    }
    //==================Employee Data=============================
    public function get_employee_data($id)
    {
        $headers = apache_request_headers();
        $email=$headers['Email'];
        $authentication=$headers['Authentication'];
        if (!empty($email)) {
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
        } else {
            $res = array('message'=>'Email not found',
'status'=>201,
);

            echo json_encode($res);
        }
    }


    //================Login============================
    public function employee_login()
    {
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
                $auth = bin2hex(random_bytes(12));

                $this->db->select('*');
                $this->db->from('tbl_employee');
                $this->db->where('email', $email);

                $emp_data= $this->db->get()->row();
                if (!empty($emp_data)) {
                    if ($emp_data->password==md5($password)) {
                        $id=$emp_data->id;
                        // echo $id;
                        $data_insert = array('employee_id'=>$id,
                              'start'=>$start,
                              'attendance' =>1,
                              'date'=>$cur_date
                              );
                        $last_id=$this->base_model->insert_table("tbl_attendance", $data_insert, 1);
                        if (!empty($emp_data->image)) {
                            $image = $emp_data->image;
                        } else {
                            $image ='';
                        }
                        $data=array('email'=>$email,
                          'password'=>md5($password),
                          'name'=>$emp_data->name,
                          'image'=>$image
                      );
                        if (!empty($last_id)) {
                            $res = array('message'=>'success',
                                'status'=>200,
                                'data'=>$data
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
            $headers = apache_request_headers();
            $email=$headers['Email'];
            $authentication=$headers['Authentication'];
            if(!empty($email)){
                date_default_timezone_set("Asia/Calcutta");
                $cur_date=date("Y-m-d");
                $end=date("H:i:s");

                $this->db->select('*');
                $this->db->from('tbl_employee');
                $this->db->where('email', $email);

                $emp_data= $this->db->get()->row();
                if (!empty($emp_data)) {
                    if ($emp_data->password==$authentication) {
                        $id=$emp_data->id;
                        $this->db->select('*');
                        $this->db->from('tbl_attendance');
                        $this->db->order_by('date','desc');
                        $this->db->like('date', $cur_date);
                        $this->db->where('employee_id',$id);
                        $attendance_data= $this->db->get()->row();

                        $data_insert = array('employee_id'=>$id,
                                'end'=>$end,
                                );
                        $this->db->where('id', $attendance_data->id);
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
              }else{
                $res = array('message'=>"Email not found",
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
            $headers = apache_request_headers();
            $email=$headers['Email'];
            $authentication=$headers['Authentication'];

            $this->form_validation->set_rules('product_id', 'product_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('type_id', 'type_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('quantity', 'quantity', 'xss_clean|trim');


            if ($this->form_validation->run() == true) {
                $product_id=$this->input->post('product_id');
                $type_id=$this->input->post('type_id');
                $quantity=$this->input->post('quantity');
                $ip = $this->input->ip_address();
                date_default_timezone_set("Asia/Calcutta");
                $cur_date=date("Y-m-d H:i:s");

                if (!empty($email)) {
                    $this->db->select('*');
                    $this->db->from('tbl_employee');
                    $this->db->where('email', $email);
                    $emp_data= $this->db->get()->row();

                    if (!empty($emp_data)) {
                        if ($emp_data->password==$authentication) {
                            $employee_id=$emp_data->id;

                            $this->db->select('*');
                            $this->db->from('tbl_cart');
                            $this->db->where('product_id', $product_id);
                            // $this->db->where('type_id', $type_id);
                            $this->db->where('employee_id', $employee_id);
                            $cart_data= $this->db->get()->row();

                            if (empty($cart_data)) {
                                $data_insert = array('employee_id'=>$employee_id,
                        'product_id'=>$product_id,
                        'type_id'=>$type_id,
                        'quantity'=>$quantity,
                        'ip' =>$ip,
                        'date'=>$cur_date
    );

                                $last_id=$this->base_model->insert_table("tbl_cart", $data_insert, 1) ;
                                $res = array('message'=>"success",
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
                            } else {
                                $res = array('message'=>'Product is already in your cart',
                    'status'=>201
                    );

                                echo json_encode($res);
                            }
                        } else {
                            $res = array('message'=>'Incorrect password.',
              'status'=>201
              );

                            echo json_encode($res);
                        }
                    } else {
                        $res = array('message'=>'User not found',
            'status'=>201
            );

                        echo json_encode($res);
                    }
                } else {
                    $res = array('message'=>'Email not found',
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

    //==================Update Cart============================================
    public function update_cart()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $headers = apache_request_headers();
            $email=$headers['Email'];
            $authentication=$headers['Authentication'];

            $this->form_validation->set_rules('cart_id', 'cart_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('quantity', 'quantity', 'xss_clean|trim');


            if ($this->form_validation->run()== true) {
                $cart_id=$this->input->post('cart_id');
                $quantity=$this->input->post('quantity');
                $ip = $this->input->ip_address();
                date_default_timezone_set("Asia/Calcutta");
                $cur_date=date("Y-m-d H:i:s");

                if (!empty($email)) {
                    $this->db->select('*');
                    $this->db->from('tbl_employee');
                    $this->db->where('email', $email);
                    $emp_data= $this->db->get()->row();

                    if (!empty($emp_data)) {
                        if ($emp_data->password==$authentication) {
                            $data_update = array('quantity'=>$quantity);
                            $this->db->where('id', $cart_id);
                            $last_id=$this->db->update("tbl_cart", $data_update) ;

                            if (!empty($last_id)) {
                              $res = array('message'=>"success",
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
                            $res = array('message'=>"Incorrect password",
                    'status'=>201
                    );

                            echo json_encode($res);
                        }
                    } else {
                        $res = array('message'=>"User not found",
                    'status'=>201
                    );

                        echo json_encode($res);
                    }
                } else {
                    $res = array('message'=>"Email not found",
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

    //========================Delete Cart===================
    public function delete_cart()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        $headers = apache_request_headers();
        $email=$headers['Email'];
        $authentication=$headers['Authentication'];
        if ($this->input->post()) {
            $this->form_validation->set_rules('cart_id', 'cart_id', 'required|xss_clean|trim');


            if ($this->form_validation->run()== true) {
                $cart_id=$this->input->post('cart_id');
                $ip = $this->input->ip_address();
                date_default_timezone_set("Asia/Calcutta");
                $cur_date=date("Y-m-d H:i:s");

                if (!empty($email)) {
                    $this->db->select('*');
                    $this->db->from('tbl_employee');
                    $this->db->where('email', $email);
                    $emp_data= $this->db->get()->row();

                    if (!empty($emp_data)) {
                        if ($emp_data->password==$authentication) {
                            $delete=$this->db->delete('tbl_cart', array('id' => $cart_id));
                            if (!empty($delete)) {
                                $res = array('message'=>"Success",
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
                            $res = array('message'=>"Incorrect password",
                          'status'=>201
                          );

                            echo json_encode($res);
                        }
                    } else {
                        $res = array('message'=>"User not found",
                          'status'=>201
                          );

                        echo json_encode($res);
                    }
                } else {
                    $res = array('message'=>"Email not found",
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
    //================view cart==========================================
    public function view_cart()
    {
        $headers = apache_request_headers();
        $email=$headers['Email'];
        $authentication=$headers['Authentication'];

        if (!empty($email)) {
            $this->db->select('*');
            $this->db->from('tbl_employee');
            $this->db->where('email', $email);
            $emp_data= $this->db->get()->row();

            if (!empty($emp_data)) {
                if ($emp_data->password==$authentication) {
                    $employee_id=$emp_data->id;
                    $employee_name=$emp_data->name;
                    $cart=[];
                    $this->db->select('*');
                    $this->db->from('tbl_cart');
                    $this->db->where('employee_id', $employee_id);
                    $cart_data= $this->db->get();
                    $subtotal = 0;
                    foreach ($cart_data->result() as $data) {
                      $total=0;
                        $this->db->select('*');
                        $this->db->from('tbl_type');
                        $this->db->where('id', $data->type_id);
                        $type= $this->db->get()->row();
                        $this->db->select('*');
                        $this->db->from('tbl_products');
                        $this->db->where('id', $data->product_id);
                        $product= $this->db->get()->row();
                        $cart[] = array('id'=>$data->id,
                            'product_name'=>$product->product_name,
                            'image'=>base_url().$product->image1,
                            'type_name'=>$type->name,
                            'quantity'=>$data->quantity,
                            'price'=>$type->spgst
                          );
                          $total= $type->spgst * $data->quantity;
                          $subtotal = $subtotal + $total;
                    }


                    $res = array('message'=>"success",
                        'status'=>200,
                        'data'=>$cart,
                        'total'=>$subtotal
                        );

                    echo json_encode($res);
                } else {
                    $res = array('message'=>"Incorrect password",
        'status'=>201
        );

                    echo json_encode($res);
                }
            } else {
                $res = array('message'=>"User not found",
        'status'=>201
        );

                echo json_encode($res);
            }
        } else {
            $res = array('message'=>"Email not found",
    'status'=>201
    );

            echo json_encode($res);
        }
    }
    //================ Cart amount calculate==================================
    public function checkout()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $headers = apache_request_headers();
            $email=$headers['Email'];
            $authentication=$headers['Authentication'];

            $this->form_validation->set_rules('name', 'required', 'xss_clean|trim');
            $this->form_validation->set_rules('shop_name', 'required', 'xss_clean|trim');
            $this->form_validation->set_rules('phone', 'required', 'xss_clean|trim');
            $this->form_validation->set_rules('place', 'required', 'xss_clean|trim');

            if ($this->form_validation->run()== true) {
                $name=$this->input->post('name');
                $shop_name=$this->input->post('shop_name');
                $phone=$this->input->post('phone');
                $place=$this->input->post('place');
                $ip = $this->input->ip_address();
                date_default_timezone_set("Asia/Calcutta");
                $cur_date=date("Y-m-d H:i:s");

                if (!empty($email)) {
                    $this->db->select('*');
                    $this->db->from('tbl_employee');
                    $this->db->where('email', $email);
                    $employee_data= $this->db->get()->row();
                    if (!empty($employee_data)) {
                        if ($employee_data->password==$authentication) {
                            $id=$employee_data->id;
                            $order_placed=[];
                            $order1=[];
                            $order2=[];
                            $this->db->select('*');
                            $this->db->from('tbl_cart');
                            $this->db->where('employee_id', $id);
                            $cart_data = $this->db->get();
                            $final_amount = 0;
                            foreach ($cart_data->result() as $data) {
                                $quantity = $data->quantity;
                                $this->db->select('*');
                                $this->db->from('tbl_type');
                                $this->db->where('id', $data->type_id);
                                $type_data = $this->db->get()->row();
                                $spgst = $type_data->spgst;
                                $total_amt = $quantity*$spgst;
                                $final_amount = $final_amount + $total_amt;
                            }
                            $product_id = $data->product_id;
                            $type_id = $data->type_id;
                            $order1 = array('employee_id'=>$id,
                      'total_amount'=>$final_amount,
                      'name'=>$name,
                      'phone'=>$phone,
                      'shop_name'=>$shop_name,
                      'place'=>$place,
                      'payment_type'=>1,
                      'payment_status'=>1,
                      'order_status'=>1,
                      'ip'=>$ip,
                      'date'=>$cur_date
                    );
                            $last_id=$this->base_model->insert_table("tbl_order1", $order1, 1);
                            if (!empty($last_id)) {
                                foreach ($cart_data->result() as $data2) {
                                    $this->db->select('*');
                                    $this->db->from('tbl_type');
                                    $this->db->where('id', $data2->type_id);
                                    $type = $this->db->get()->row();
                                    // print_r($type);
                                    // exit;
                                    $order2 = array('main_id'=>$last_id,
                      'product_id'=>$data2->product_id,
                      'type_id'=>$data2->type_id,
                      'quantity'=> $data2->quantity,
                      'mrp'=> $type->mrp,
                      'selling_price'=> $type->sp,
                      'total_amount'=> $data2->quantity * $type->sp,
                      'type_amt_gst'=> $type->gstprice,
                      'gst_percentage'=> $type->gst,
                      'type_amt'=> $type->mrp,
                      'gst'=> $type->gstprice
                    );
                                    $least_id=$this->base_model->insert_table("tbl_order2", $order2, 1);
                                }
                            } else {
                                $res = array('message'=>"Some error occured. Please try again",
                'status'=>201
                );

                                echo json_encode($res);
                            }

                            $order_placed = array('order_id'=>$last_id,
                    'total_amount'=>$final_amount

                    );
                            $res = array('message'=>"success",
                      'status'=>200,
                      'data'=>$order_placed
                      );

                            echo json_encode($res);

                            if (!empty($last_id && $least_id && $order_placed)) {
                            } else {
                                $res = array('message'=>"Some error occured",
                    'status'=>201
                    );

                                echo json_encode($res);
                            }
                        } else {
                            $res = array('message'=>"Incorrect username or Password",
          'status'=>201
          );

                            echo json_encode($res);
                        }
                    } else {
                        $res = array('message'=>"Email not found",
      'status'=>201
    );

                        echo json_encode($res);
                    }
                } else {
                    $res = array('message'=>"Email not found",
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
            $res = array('message'=>"Some error occured",
        'status'=>201
        );

            echo json_encode($res);
        }
    }
    // //===================checkout==========================================
    // public function checkout()
    // {
    //     $this->load->helper(array('form', 'url'));
    //     $this->load->library('form_validation');
    //     $this->load->helper('security');
    //     if ($this->input->post()) {
    //         $headers = apache_request_headers();
    //         $email=$headers['Email'];
    //         $authentication=$headers['Authentication'];
    //
    //         $this->form_validation->set_rules('name', 'required', 'xss_clean|trim');
    //         $this->form_validation->set_rules('shop_name', 'required', 'xss_clean|trim');
    //         $this->form_validation->set_rules('phone', 'required', 'xss_clean|trim');
    //         $this->form_validation->set_rules('place', 'required', 'xss_clean|trim');
    //
    //
    //         if ($this->form_validation->run()== true) {
    //             if (!empty($email)) {
    //               $name=$this->input->post('name');
    //               $shop_name=$this->input->post('shop_name');
    //               $phone=$this->input->post('phone');
    //               $place=$this->input->post('place');
    //
    //                 $img1='image';
    //                 $file_check=($_FILES['image']['error']);
    //                 if ($file_check!=4) {
    //                     $image_upload_folder = FCPATH . "assets/uploads/checkout/";
    //                     if (!file_exists($image_upload_folder)) {
    //                         mkdir($image_upload_folder, DIR_WRITE_MODE, true);
    //                     }
    //                     $new_file_name="transaction".date("Ymdhms");
    //                     $this->upload_config = array(
    //                                             'upload_path'   => $image_upload_folder,
    //                                             'file_name' => $new_file_name,
    //                                             'allowed_types' =>'xlsx|csv|xls|pdf|doc|docx|txt|jpg|jpeg|png',
    //                                             'max_size'      => 25000
    //                                     );
    //                     $this->upload->initialize($this->upload_config);
    //                     if (!$this->upload->do_upload($img1)) {
    //                         $upload_error = $this->upload->display_errors();
    //                         // echo json_encode($upload_error);
    //                         echo $upload_error;
    //                     } else {
    //                         $file_info = $this->upload->data();
    //
    //                         $videoNAmePath = "assets/uploads/checkout/".$new_file_name.$file_info['file_ext'];
    //                         $file_info['new_name']=$videoNAmePath;
    //                         $nnnn=$file_info['file_name'];
    //                     }
    //                 }
    //
    //                 $this->db->select('*');
    //                 $this->db->from('tbl_order1');
    //                 $this->db->where('txn_id', $txn_id);
    //                 $order= $this->db->get()->row();
    //                 $check=[];
    //
    //                 if (!empty($nnnn)) {
    //                     $data_insert = array('image'=>$nnnn,
    //                           'payment_type'=>1,
    //                           'payment_status'=>1,
    //                           'order_status'=>1,
    //       );
    //
    //                     $this->db->where('txn_id', $txn_id);
    //                     $last_id=$this->db->update("tbl_order1", $data_insert) ;
    //                     $check=array('order_id'=>$order->id,
    //                   'total amount'=>$order->total_amount
    //                 );
    //                     $res = array('message'=>"success",
    //                             'status'=>200,
    //                             'data'=>$check
    //                             );
    //
    //                     echo json_encode($res);
    //                 } else {
    //                     $data_insert = array(
    //                           'payment_type'=>1,
    //                           'payment_status'=>1,
    //                           'order_status'=>1,
    //       );
    //
    //                     $this->db->where('txn_id', $txn_id);
    //                     $last_id=$this->db->update("tbl_order1", $data_insert) ;
    //                     $check=array('order_id'=>$order->id,
    //                   'total amount'=>$order->total_amount
    //                 );
    //                     $res = array('message'=>"success",
    //                             'status'=>200,
    //                             'data'=>$check
    //                             );
    //
    //                     echo json_encode($res);
    //                 }
    //                 if (!empty($last_id)) {
    //                 } else {
    //                     $res = array('message'=>"Some error occured, try again.",
    //                             'status'=>201
    //                             );
    //
    //                     echo json_encode($res);
    //                 }
    //             } else {
    //                 $res = array('message'=>"Email not found",
    //   'status'=>201
    // );
    //
    //                 echo json_encode($res);
    //             }
    //         } else {
    //             $res = array('message'=>validation_errors(),
    //       'status'=>201
    //       );
    //             echo json_encode($res);
    //         }
    //     } else {
    //         $res = array('message'=>"Some error occured",
    //       'status'=>201
    //       );
    //         echo json_encode($res);
    //     }
    // }
    //=================view_Order details======================================
    public function my_orders()
    {
        $headers = apache_request_headers();
        $email=$headers['Email'];
        $authentication=$headers['Authentication'];

        if (!empty($email)) {
            $this->db->select('*');
            $this->db->from('tbl_employee');
            $this->db->where('email', $email);
            $employee_data= $this->db->get()->row();
            if (!empty($employee_data)) {
                if ($employee_data->password==$authentication) {
                    $id=$employee_data->id;
                    $this->db->select('*');
                    $this->db->from('tbl_order1');
                    $this->db->where('employee_id', $id);
                    $order_data= $this->db->get();
                    $order1=[];
                    $products=[];
                    foreach ($order_data->result() as $data) {
                        $this->db->select('*');
                        $this->db->from('tbl_order2');
                        $this->db->where('main_id', $data->id);
                        $order2_data= $this->db->get();

                        foreach ($order2_data->result() as $data2) {
                            $this->db->select('*');
                            $this->db->from('tbl_products');
                            $this->db->where('id', $data2->product_id);
                            $product= $this->db->get()->row();
                            $this->db->select('*');
                            $this->db->from('tbl_type');
                            $this->db->where('id', $data2->type_id);
                            $type= $this->db->get()->row();
                            $products[]= array(
                                'product_name'=>$product->product_name,
                                'quantity'=>$data2->quantity,
                                'type'=>$type->name,
                                'mrp'=>$data2->mrp,
                              );
                        }
                    }
                    $order1[]= array('order_id'=>$data->id,
                          'total_amount'=>$data->total_amount,
                          'product_details'=>$products,
                        );
                    $res = array('message'=>"success",
                        'status'=>200,
                        'data'=>$order1
                );
                    echo json_encode($res);
                } else {
                    $res = array('message'=>"Incorrect password",
                'status'=>201
                );
                    echo json_encode($res);
                }
            } else {
                $res = array('message'=>"Please insert data",
      'status'=>201
      );
                echo json_encode($res);
            }
        } else {
            $res = array('message'=>"Email not found.",
        'status'=>201
        );
            echo json_encode($res);
        }
    }
    //=============farmer_details add===========================================
    public function farmer_details()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $headers = apache_request_headers();
            $email=$headers['Email'];
            $authentication=$headers['Authentication'];

            $this->form_validation->set_rules('name', 'name', 'required|xss_clean|trim');
            $this->form_validation->set_rules('phone', 'phone', 'required|xss_clean|trim');
            $this->form_validation->set_rules('place', 'place', 'required|xss_clean|trim');
            if ($this->form_validation->run()== true) {
                $name=$this->input->post('name');
                $phone=$this->input->post('phone');
                $place=$this->input->post('place');
                $ip = $this->input->ip_address();
                date_default_timezone_set("Asia/Calcutta");
                $cur_date=date("Y-m-d");

                if (!empty($email)) {
                    $this->db->select('*');
                    $this->db->from('tbl_employee');
                    $this->db->where('email', $email);
                    $employee= $this->db->get()->row();
                    $id=$employee->id;
                    if (!empty($employee)) {
                        if ($employee->password==$authentication) {
                            $data_insert = array('employee_id'=>$id,
                  'name'=>$name,
                  'phone'=>$phone,
                  'place'=>$place,
                  'is_active'=>1,
                  'date'=>$cur_date,
                  'ip'=>$ip
                );
                            $last_id=$this->base_model->insert_table("tbl_farmer_details", $data_insert, 1) ;
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
                            $res = array('message'=>"Incorrect password",
                  'status'=>201
                  );
                            echo json_encode($res);
                        }
                    } else {
                        $res = array('message'=>"Invalid email",
                'status'=>201
                );
                        echo json_encode($res);
                    }
                } else {
                    $res = array('message'=>"Email not found",
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
        }
    }
    //================Tour data==================================================
    public function tour()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $headers = apache_request_headers();
            $email=$headers['Email'];
            $authentication=$headers['Authentication'];
            $this->form_validation->set_rules('field', 'field', 'required|xss_clean|trim');
            $this->form_validation->set_rules('remarks', 'remarks', 'required|xss_clean|trim');

            if ($this->form_validation->run()== true) {
                $field=$this->input->post('field');
                $remarks=$this->input->post('remarks');
                $ip = $this->input->ip_address();
                date_default_timezone_set("Asia/Calcutta");
                $cur_date=date("Y-m-d H:i:s");

                if (!empty($email)) {
                    $this->db->select('*');
                    $this->db->from('tbl_employee');
                    $this->db->where('email', $email);
                    $employee_data= $this->db->get()->row();
                    if (!empty($employee_data)) {
                        if ($employee_data->password==$authentication) {
                            $id = $employee_data->id;
                            $data_insert = array('employee_id'=>$id,
                        'field'=>$field,
                        'remarks'=>$remarks,
                        'date'=>$cur_date,
                        'ip'=>$ip
                    );
                            $last_id=$this->base_model->insert_table("tbl_tour", $data_insert, 1) ;
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
                            $res = array('message'=>"Incorrect password",
        'status'=>201
        );
                            echo json_encode($res);
                        }
                    } else {
                        $res = array('message'=>"Account not found",
    'status'=>201
    );
                        echo json_encode($res);
                    }
                } else {
                    $res = array('message'=>"Email not found",
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
            $res = array('message'=>"Some error occured",
'status'=>201
);
            echo json_encode($res);
        }
    }
    //=========Tour km details====================================================
    public function tour_km()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $headers = apache_request_headers();
            $email=$headers['Email'];
            $authentication=$headers['Authentication'];
            $this->form_validation->set_rules('km', 'km', 'required|xss_clean|trim');
            $this->form_validation->set_rules('vehicle', 'vehicle', 'required|xss_clean|trim');

            if ($this->form_validation->run()== true) {
                $km=$this->input->post('km');
                $vehicle=$this->input->post('vehicle');
                $ip = $this->input->ip_address();
                date_default_timezone_set("Asia/Calcutta");
                $cur_date=date("Y-m-d H:i:s");

                if (!empty($email)) {
                    $this->db->select('*');
                    $this->db->from('tbl_employee');
                    $this->db->where('email', $email);
                    $employee_data= $this->db->get()->row();
                    $id = $employee_data->id;
                    if (!empty($employee_data)) {
                        if ($employee_data->password==$authentication) {
                            $data_insert = array('employee_id'=>$id,
                          'km'=>$km,
                          'vehicle'=>$vehicle,
                          'date'=>$cur_date,
                          'ip'=>$ip
                      );
                            $last_id=$this->base_model->insert_table("tbl_tour_km", $data_insert, 1) ;
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
                            $res = array('message'=>"Incorrect password",
        'status'=>201
        );
                            echo json_encode($res);
                        }
                    } else {
                        $res = array('message'=>"Account not found",
    'status'=>201
    );
                        echo json_encode($res);
                    }
                } else {
                    $res = array('message'=>"Email not found",
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
            $res = array('message'=>"Some error occured",
'status'=>201
);
            echo json_encode($res);
        }
    }
    //==============Tour photos================================================
    public function tour_photos()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $headers = apache_request_headers();
            $email=$headers['Email'];
            $authentication=$headers['Authentication'];
            $this->form_validation->set_rules('remarks', 'remarks', 'xss_clean|trim');

            if ($this->form_validation->run()== true) {
                $remarks=$this->input->post('remarks');
                $ip = $this->input->ip_address();
                date_default_timezone_set("Asia/Calcutta");
                $cur_date=date("Y-m-d H:i:s");

                if (!empty($email)) {
                    $this->db->select('*');
                    $this->db->from('tbl_employee');
                    $this->db->where('email', $email);
                    $employee_data= $this->db->get()->row();
                    $id = $employee_data->id;
                    if (!empty($employee_data)) {
                        if ($employee_data->password==$authentication) {
                            $img1='image1';

                            $file_check=($_FILES['image1']['error']);
                            if ($file_check!=4) {
                                $image_upload_folder = FCPATH . "assets/uploads/tour_photos/";
                                if (!file_exists($image_upload_folder)) {
                                    mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                                }
                                $new_file_name="image1".date("Ymdhms");
                                $this->upload_config = array(
                                                        'upload_path'   => $image_upload_folder,
                                                        'file_name' => $new_file_name,
                                                        'allowed_types' =>'xlsx|csv|xls|pdf|doc|docx|txt|jpg|jpeg|png',
                                                        'max_size'      => 25000
                                                );
                                $this->upload->initialize($this->upload_config);
                                if (!$this->upload->do_upload($img1)) {
                                    $upload_error = $this->upload->display_errors();
                                    // echo json_encode($upload_error);
                                    echo $upload_error;
                                } else {
                                    $file_info = $this->upload->data();

                                    $videoNAmePath = "assets/uploads/tour_photos/".$new_file_name.$file_info['file_ext'];
                                    $file_info['new_name']=$videoNAmePath;
                                    // $this->step6_model->updateappIconImage($imageNAmePath,$appInfoId);
                                    $nnnn1=$file_info['file_name'];
                                    // echo json_encode($file_info);
                                }
                            }
                            $img2='image2';

                            $file_check=($_FILES['image2']['error']);
                            if ($file_check!=4) {
                                $image_upload_folder = FCPATH . "assets/uploads/tour_photos/";
                                if (!file_exists($image_upload_folder)) {
                                    mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                                }
                                $new_file_name="image2".date("Ymdhms");
                                $this->upload_config = array(
                                                                    'upload_path'   => $image_upload_folder,
                                                                    'file_name' => $new_file_name,
                                                                    'allowed_types' =>'xlsx|csv|xls|pdf|doc|docx|txt|jpg|jpeg|png',
                                                                    'max_size'      => 25000
                                                            );
                                $this->upload->initialize($this->upload_config);
                                if (!$this->upload->do_upload($img2)) {
                                    $upload_error = $this->upload->display_errors();
                                    // echo json_encode($upload_error);
                                    echo $upload_error;
                                } else {
                                    $file_info = $this->upload->data();

                                    $videoNAmePath = "assets/uploads/tour_photos/".$new_file_name.$file_info['file_ext'];
                                    $file_info['new_name']=$videoNAmePath;
                                    // $this->step6_model->updateappIconImage($imageNAmePath,$appInfoId);
                                    $nnnn2=$file_info['file_name'];
                                    // echo json_encode($file_info);
                                }
                            }
                            $data_insert = array('employee_id'=>$id,
                        'image1'=>$nnnn1,
                        'image2'=>$nnnn2,
                        'remarks'=>$remarks,
                        'date'=>$cur_date,
                        'ip'=>$ip
                    );
                            $last_id=$this->base_model->insert_table("tbl_tour_photos", $data_insert, 1) ;
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
                            $res = array('message'=>"Incorrect password",
        'status'=>201
        );
                            echo json_encode($res);
                        }
                    } else {
                        $res = array('message'=>"Account not found",
    'status'=>201
    );
                        echo json_encode($res);
                    }
                } else {
                    $res = array('message'=>"Email not found",
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
            $res = array('message'=>"Some error occured",
'status'=>201
);
            echo json_encode($res);
        }
    }
    //====================apply leave request============================================
    public function apply_leave_req()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $headers = apache_request_headers();
            $email=$headers['Email'];
            $authentication=$headers['Authentication'];
            $this->form_validation->set_rules('start', 'start', 'xss_clean|trim');
            $this->form_validation->set_rules('end', 'end', 'xss_clean|trim');

            if ($this->form_validation->run()== true) {
                $start=$this->input->post('start');
                $end=$this->input->post('end');
                $start = date("d-m-Y", strtotime($start));
                $end = date("d-m-Y", strtotime($end));
                // echo $start;
                // echo $end;die();

                $start1 = date('d-m-Y', strtotime("-1 day", strtotime($start)));

                $req_time=(strtotime($end) - strtotime($start1));
                $req_time= round($req_time / (60*60*24));

                $ip = $this->input->ip_address();
                date_default_timezone_set("Asia/Calcutta");
                $cur_date=date("Y-m-d H:i:s");

                if (!empty($email)) {
                    $this->db->select('*');
                    $this->db->from('tbl_employee');
                    $this->db->where('email', $email);
                    $employee_data= $this->db->get()->row();
                    $id = $employee_data->id;
                    $this->db->select('*');
                    $this->db->from('tbl_leave_req');
                    $this->db->where('employee_id', $id);
                    $leave_req_data= $this->db->get();
                    if (!empty($employee_data)) {
                        if ($employee_data->password==$authentication) {
                            $a=0;
                            foreach ($leave_req_data->result() as $data) {
                                if ($data->start==$start || $data->end==$end) {
                                    $a=1;
                                } elseif ($data->start<=$start && $data->end>=$start) {
                                    $a=1;
                                } elseif ($data->start<=$end && $data->end>=$end) {
                                    $a=1;
                                } else {
                                    $a=0;
                                }
                            }
                            if ($a==0) {
                                if ($req_time<4) {
                                    $data_insert = array('employee_id'=>$id,
                              'start'=>$start,
                              'end'=>$end,
                              'is_active'=>1,
                              'date'=>$cur_date,
                              'ip'=>$ip
                            );
                                    $last_id=$this->base_model->insert_table("tbl_leave_req", $data_insert, 1) ;
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
                                    $res = array('message'=>"Cannot request for more than three days leave",
      'status'=>201
      );
                                    echo json_encode($res);
                                }
                            } else {
                                $res = array('message'=>"Leave request already sent for the following date",
    'status'=>201
    );
                                echo json_encode($res);
                            }
                        } else {
                            $res = array('message'=>"Incorrect password",
        'status'=>201
        );
                            echo json_encode($res);
                        }
                    } else {
                        $res = array('message'=>"Account not found",
    'status'=>201
    );
                        echo json_encode($res);
                    }
                } else {
                    $res = array('message'=>"Email not found",
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
            $res = array('message'=>"Some error occured",
'status'=>201
);
            echo json_encode($res);
        }
    }
    //====================show leave request=====================================================
    public function show_leave_req()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        $headers = apache_request_headers();
        $email=$headers['Email'];
        $authentication=$headers['Authentication'];
        // echo $email;die();
        if (!empty($email)) {
            $this->db->select('*');
            $this->db->from('tbl_employee');
            $this->db->where('email', $email);
            $employee_data= $this->db->get()->row();
            $id=$employee_data->id;
            if (!empty($employee_data)) {
                if ($employee_data->password==$authentication) {
                    $this->db->select('*');
                    $this->db->from('tbl_leave_req');
                    $this->db->where('employee_id', $id);
                    $this->db->order_by('date', 'desc');
                    $leave_req_data= $this->db->get();
                    $leave_req=[];
                    $status="";
                    foreach ($leave_req_data->result() as $data) {
                        $is_active=$data->is_active;
                        if ($is_active==1) {
                            $status="Pending";
                        }
                        if ($is_active==2) {
                            $status="Accepted";
                        }
                        if ($is_active==3) {
                            $status="Rejected";
                        }
                        $leave_req[]=array('from'=>$data->start,
                        'to'=>$data->end,
                        'applied on'=>$data->date,
                        'leave status'=>$status
                      );
                    }
                    $res = array('message'=>"success",
    'status'=>200,
    'data'=>$leave_req
    );
                    echo json_encode($res);
                } else {
                    $res = array('message'=>"Incorrect password",
      'status'=>201
      );
                    echo json_encode($res);
                }
            } else {
                $res = array('message'=>"Account not found",
  'status'=>201
  );
                echo json_encode($res);
            }
        } else {
            $res = array('message'=>"Email not found",
    'status'=>201
    );
            echo json_encode($res);
        }
    }
    public function cart_count()
    {
        $headers = apache_request_headers();
        $email=$headers['Email'];
        $authentication=$headers['Authentication'];
        if (!empty($email)) {
            $this->db->select('*');
            $this->db->from('tbl_employee');
            $this->db->where('email', $email);
            $employee_data= $this->db->get()->row();
            if ($employee_data->password==$authentication) {
                $id= $employee_data->id;
                $this->db->select('*');
                $this->db->from('tbl_cart');
                $this->db->where('employee_id', $id);
                $cart_count= $this->db->count_all_results();

                $res = array('message'=>"success",
'status'=>200,
'data'=>$cart_count
);
                echo json_encode($res);
            } else {
                $res = array('message'=>"Incorrect password",
  'status'=>201
  );
                echo json_encode($res);
            }
        } else {
            $res = array('message'=>"Email not found",
'status'=>201
);
            echo json_encode($res);
        }
    }

    //===============================auto logout=====================================
    public function employee_auto_logout(){
      $headers = apache_request_headers();
        $email=$headers['Email'];
        $authentication=$headers['Authentication'];
        if(!empty($email)){
          $cur_date=date("Y-m-d");
          $day_before = date("Y-m-d", time() - 86400);
          // echo $day_before;die();
          $end="00:00:00";
          $this->db->select('*');
          $this->db->from('tbl_employee');
          $this->db->where('email',$email);
          $emp_data= $this->db->get()->row();
          if(!empty($emp_data)){
            if($emp_data->password==$authentication){
              $id= $emp_data->id;
              $this->db->select('*');
              $this->db->from('tbl_attendance');
              $this->db->like('date',$day_before);
              $this->db->order_by('date','desc');
              $this->db->where('employee_id',$id);
              $attendance_data= $this->db->get()->row();
              if(!empty($attendance_data)){
                if(empty($attendance_data->end)){
                  $logout = array('end'=>$end,
                          'auto_logout'=>1
                            );
                  $this->db->where('id', $attendance_data->id);
                  $auto_logout=$this->db->update('tbl_attendance', $logout);
                  if(!empty($auto_logout)){
                  $res = array('message'=>"Success",
                        'status'=>200
                        );

                        echo json_encode($res);
                      }else{
                        $res = array('message'=>"Some error occured",
                              'status'=>201
                              );

                              echo json_encode($res);
                      }
                }else{
                  $res = array('message'=>"Success",
                        'status'=>200
                        );

                        echo json_encode($res);
                }
              }else{
                $res = array('message'=>"Success",
                      'status'=>200
                      );

                      echo json_encode($res);
              }
            }else{
              $res = array('message'=>"Incorrect password",
                    'status'=>201
                    );

                    echo json_encode($res);
            }
          }else{
            $res = array('message'=>"Employee not found",
                    'status'=>201
                    );

                    echo json_encode($res);
          }
        }else{
          $res = array('message'=>"Email not found",
          'status'=>201
          );

          echo json_encode($res);
        }
    }
}
