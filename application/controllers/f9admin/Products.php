<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Products extends CI_finecontrol
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->model("admin/base_model");
        $this->load->library('user_agent');
        $this->load->library('upload');
    }

    public function view_products()
    {
        if (!empty($this->session->userdata('admin_data'))) {
          $data['user_name']=$this->load->get_var('user_name');

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;
            $this->db->select('*');
            $this->db->from('tbl_products');
            //$this->db->where('id', $id);
            $data['products_data']= $this->db->get();


            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/products/view_products');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }

    public function add_products()
    {
        if (!empty($this->session->userdata('admin_data'))) {
          $data['user_name']=$this->load->get_var('user_name');

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;
            $this->db->select('*');
            $this->db->from('tbl_category');
            //$this->db->where('id',$usr);
            $data['category_data']= $this->db->get();


            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/products/add_products');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }

    public function add_products_data($t, $iw="")
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if ($this->input->post()) {
                // print_r($this->input->post());
                // exit;
                $this->form_validation->set_rules('name', 'name', 'xss_clean');
                $this->form_validation->set_rules('price', 'price', 'xss_clean');
                $this->form_validation->set_rules('product_desc', 'product_desc', 'xss_clean');
                $this->form_validation->set_rules('mode_of_action', 'mode_of_action', 'xss_clean');
                $this->form_validation->set_rules('major_crops', 'major_crops', 'xss_clean');
                $this->form_validation->set_rules('target_disease', 'target_disease', 'xss_clean');
                $this->form_validation->set_rules('dose', 'dose', 'xss_clean');


                if ($this->form_validation->run()== true) {
                    $email=$this->input->post('email');
                    $passw=$this->input->post('password');

                    $ip = $this->input->ip_address();
                    date_default_timezone_set("Asia/Calcutta");
                    $cur_date=date("Y-m-d H:i:s");

                    $addedby=$this->session->userdata('admin_id');

                    $name=$this->input->post('name');
                    $price=$this->input->post('price');
                    $product_desc=$this->input->post('product_desc');
                    $mode_of_action=$this->input->post('mode_of_action');
                    $major_crops=$this->input->post('major_crops');
                    $target_disease=$this->input->post('target_disease');
                    $dose=$this->input->post('dose');
                    $category_id=$this->input->post('category_id');

                    $img3='image1';

                    $image_upload_folder = FCPATH . "assets/uploads/products/";
                    if (!file_exists($image_upload_folder)) {
                        mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                    }
                    $new_file_name="product1".date("Ymdhms");
                    $this->upload_config = array(
                           'upload_path'   => $image_upload_folder,
                           'file_name' => $new_file_name,
                           'allowed_types' =>'xlsx|csv|xls|pdf|doc|docx|txt|jpg|jpeg|png',
                           'max_size'      => 25000
                   );
                    $this->upload->initialize($this->upload_config);
                    if (!$this->upload->do_upload($img3)) {
                        $upload_error = $this->upload->display_errors();
                    // echo json_encode($upload_error);

         //$this->session->set_flashdata('emessage',$upload_error);
           //redirect($_SERVER['HTTP_REFERER']);
                    } else {
                        $file_info = $this->upload->data();

                        $videoNAmePath = "assets/uploads/products/".$new_file_name.$file_info['file_ext'];
                        $file_info['new_name']=$videoNAmePath;
                        // $this->step6_model->updateappIconImage($imageNAmePath,$appInfoId);
                        $nnnn=$file_info['file_name'];
                        $nnnn3=$videoNAmePath;

                        // echo json_encode($file_info);
                    }




                    $img4='image2';




                    $image_upload_folder = FCPATH . "assets/uploads/products/";
                    if (!file_exists($image_upload_folder)) {
                        mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                    }
                    $new_file_name="product2".date("Ymdhms");
                    $this->upload_config = array(
                           'upload_path'   => $image_upload_folder,
                           'file_name' => $new_file_name,
                           'allowed_types' =>'xlsx|csv|xls|pdf|doc|docx|txt|jpg|jpeg|png',
                           'max_size'      => 25000
                   );
                    $this->upload->initialize($this->upload_config);
                    if (!$this->upload->do_upload($img4)) {
                        $upload_error = $this->upload->display_errors();
                    // echo json_encode($upload_error);

         //$this->session->set_flashdata('emessage',$upload_error);
           //redirect($_SERVER['HTTP_REFERER']);
                    } else {
                        $file_info = $this->upload->data();

                        $videoNAmePath = "assets/uploads/products/".$new_file_name.$file_info['file_ext'];
                        $file_info['new_name']=$videoNAmePath;
                        // $this->step6_model->updateappIconImage($imageNAmePath,$appInfoId);
                        $nnnn=$file_info['file_name'];
                        $nnnn4=$videoNAmePath;

                        // echo json_encode($file_info);
                    }




                    $img5='image3';


                    $file_check=($_FILES['image3']['error']);
                    if ($file_check!=4) {
                        $image_upload_folder = FCPATH . "assets/uploads/products/";
                        if (!file_exists($image_upload_folder)) {
                            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                        }
                        $new_file_name="product3".date("Ymdhms");
                        $this->upload_config = array(
                           'upload_path'   => $image_upload_folder,
                           'file_name' => $new_file_name,
                           'allowed_types' =>'xlsx|csv|xls|pdf|doc|docx|txt|jpg|jpeg|png',
                           'max_size'      => 25000
                   );
                        $this->upload->initialize($this->upload_config);
                        if (!$this->upload->do_upload($img5)) {
                            $upload_error = $this->upload->display_errors();
                        // echo json_encode($upload_error);

         //$this->session->set_flashdata('emessage',$upload_error);
           //redirect($_SERVER['HTTP_REFERER']);
                        } else {
                            $file_info = $this->upload->data();

                            $videoNAmePath = "assets/uploads/products/".$new_file_name.$file_info['file_ext'];
                            $file_info['new_name']=$videoNAmePath;
                            // $this->step6_model->updateappIconImage($imageNAmePath,$appInfoId);
                            $nnnn=$file_info['file_name'];
                            $nnnn5=$videoNAmePath;

                            // echo json_encode($file_info);
                        }
                    }



                    $img6='image4';


                    $file_check=($_FILES['image4']['error']);
                    if ($file_check!=4) {
                        $image_upload_folder = FCPATH . "assets/uploads/products/";
                        if (!file_exists($image_upload_folder)) {
                            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                        }
                        $new_file_name="product4".date("Ymdhms");
                        $this->upload_config = array(
                           'upload_path'   => $image_upload_folder,
                           'file_name' => $new_file_name,
                           'allowed_types' =>'xlsx|csv|xls|pdf|doc|docx|txt|jpg|jpeg|png',
                           'max_size'      => 25000
                   );
                        $this->upload->initialize($this->upload_config);
                        if (!$this->upload->do_upload($img6)) {
                            $upload_error = $this->upload->display_errors();
                        // echo json_encode($upload_error);

         //$this->session->set_flashdata('emessage',$upload_error);
           //redirect($_SERVER['HTTP_REFERER']);
                        } else {
                            $file_info = $this->upload->data();

                            $videoNAmePath = "assets/uploads/products/".$new_file_name.$file_info['file_ext'];
                            $file_info['new_name']=$videoNAmePath;
                            // $this->step6_model->updateappIconImage($imageNAmePath,$appInfoId);
                            $nnnn=$file_info['file_name'];
                            $nnnn6=$videoNAmePath;

                            // echo json_encode($file_info);
                        }
                    }



                    $typ=base64_decode($t);
                    if ($typ==1) {
                        $data_insert = array('category_id'=>$category_id,
                    'product_name'=>$name,
                    'price'=>$price,
                    'image1'=>$nnnn3,
                    'image2'=>$nnnn4,
                    'image3'=>$nnnn5,
                    'image4'=>$nnnn6,
                    'product_desc'=>$product_desc,
                    'mode_of_action'=>$mode_of_action,
                    'major_crops'=>$major_crops,
                    'target_disease'=>$target_disease,
                    'dose'=>$dose,
                    'ip' =>$ip,
                    'added_by' =>$addedby,
                    'is_active' =>1,
                    'date'=>$cur_date
                    );





                        $last_id=$this->base_model->insert_table("tbl_products", $data_insert, 1) ;
                    }
                    if ($typ==2) {
                        $idw=base64_decode($iw);
                        $this->db->select('*');
                        $this->db->from('tbl_products');
                        $this->db->where('id', $idw);
                        $da= $this->db->get()->row();
                        // $this->db->select('*');
                        //     $this->db->from('tbl_minor_category');
                        //    $this->db->where('name',$name);
                        //     $damm= $this->db->get();
                        //    foreach($damm->result() as $da) {
                        //      $uid=$da->id;
                        // if($uid==$idw)
                        // {
                        //
                        //  }
                        // else{
                        //    echo "Multiple Entry of Same Name";
                        //       exit;
                        //  }
                        //     }

                        if (!empty($da)) {
                            $img = $da ->image1;
                            if (!empty($img)) {
                                if (empty($nnnn3)) {
                                    $nnnn3 = $img;
                                }
                            } else {
                                if (empty($nnnn3)) {
                                    $nnnn3= "";
                                }
                            }
                        }
                        if (!empty($da)) {
                            $img = $da ->image2;
                            if (!empty($img)) {
                                if (empty($nnnn4)) {
                                    $nnnn4 = $img;
                                }
                            } else {
                                if (empty($nnnn4)) {
                                    $nnnn4= "";
                                }
                            }
                        }
                        if (!empty($da)) {
                            $img = $da ->image3;
                            if (!empty($img)) {
                                if (empty($nnnn5)) {
                                    $nnnn5 = $img;
                                }
                            } else {
                                if (empty($nnnn5)) {
                                    $nnnn5= "";
                                }
                            }
                        }
                        if (!empty($da)) {
                            $img = $da ->image4;
                            if (!empty($img)) {
                                if (empty($nnnn6)) {
                                    $nnnn6 = $img;
                                }
                            } else {
                                if (empty($nnnn6)) {
                                    $nnnn6= "";
                                }
                            }
                        }

                        $data_insert = array('category_id'=>$category_id,
                    'product_name'=>$name,
                    'price'=>$price,
                    'image1'=>$nnnn3,
                    'image2'=>$nnnn4,
                    'image3'=>$nnnn5,
                    'image4'=>$nnnn6,
                    'product_desc'=>$product_desc,
                    'mode_of_action'=>$mode_of_action,
                    'major_crops'=>$major_crops,
                    'target_disease'=>$target_disease,
                    'dose'=>$dose
                    );





                        $this->db->where('id', $idw);
                        $last_id=$this->db->update('tbl_products', $data_insert);
                    }


                    if ($last_id!=0) {
                        $this->session->set_flashdata('smessage', 'Data inserted successfully');

                        redirect("dcadmin/Products/view_products", "refresh");
                    } else {
                        $this->session->set_flashdata('emessage', 'Sorry error occured');
                        redirect($_SERVER['HTTP_REFERER']);
                    }
                } else {
                    $this->session->set_flashdata('emessage', validation_errors());
                    redirect($_SERVER['HTTP_REFERER']);
                }
            } else {
                $this->session->set_flashdata('emessage', 'Please insert some data, No data available');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            redirect("login/admin_login", "refresh");
        }
    }

    public function update_products($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
          $data['user_name']=$this->load->get_var('user_name');

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;

            $id=base64_decode($idd);
            $data['id']=$idd;



            $this->db->select('*');
            $this->db->from('tbl_products');
            $this->db->where('id', $id);
            $data['product_data']= $this->db->get()->row();

            $this->db->select('*');
            $this->db->from('tbl_category');
            // $this->db->where('id', $id);
            $this->db->where('is_active', 1);
            $data['category_data']= $this->db->get();


            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/products/update_products');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }

    public function delete_products($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
          $data['user_name']=$this->load->get_var('user_name');

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;
            $id=base64_decode($idd);

            if ($this->load->get_var('position')=="Super Admin") {
                $this->db->from('tbl_products');
                $this->db->where('id', $id);
                $dsa= $this->db->get();
                $da=$dsa->row();

                $zapak=$this->db->delete('tbl_products', array('id' => $id));
                if ($zapak!=0) {
                  $this->session->set_flashdata('smessage', 'Data deleted successfully');
                    redirect("dcadmin/Products/view_products", "refresh");
                } else {
                    echo "Error";
                    exit;
                }
            } else {
                $data['e']="Sorry You Don't Have Permission To Delete Anything.";
                // exit;
                $this->load->view('errors/error500admin', $data);
            }
        } else {
            $this->load->view('admin/login/index');
        }
    }

    public function updateproductsStatus($idd,$t){

             if(!empty($this->session->userdata('admin_data'))){


               $data['user_name']=$this->load->get_var('user_name');

               // echo SITE_NAME;
               // echo $this->session->userdata('image');
               // echo $this->session->userdata('position');
               // exit;
               $id=base64_decode($idd);

               if($t=="active"){

                 $data_update = array(
             'is_active'=>1

             );

             $this->db->where('id', $id);
            $zapak=$this->db->update('tbl_products', $data_update);

                 if($zapak!=0) {
                   $this->session->set_flashdata('smessage', 'Status updated successfully');
                     redirect("dcadmin/Products/view_products", "refresh");                         }
                         else
                         {
                           echo "Error";
                           exit;
                         }
               }
               if($t=="inactive"){
                 $data_update = array(
              'is_active'=>0

              );

              $this->db->where('id', $id);
              $zapak=$this->db->update('tbl_products', $data_update);

                  if($zapak!=0){
                    $this->session->set_flashdata('smessage', 'Status updated successfully');
                      redirect("dcadmin/Products/view_products", "refresh");                          }
                          else
                          {

              $data['e']="Error Occured";
                              	// exit;
            	$this->load->view('errors/error500admin',$data);
                          }
               }



           }
           else{

               $this->load->view('admin/login/index');
           }

           }

}
