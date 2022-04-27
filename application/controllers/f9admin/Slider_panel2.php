<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Slider_panel2 extends CI_finecontrol
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->model("admin/base_model");
        $this->load->library('user_agent');
        $this->load->library('upload');
    }

    public function view_images()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['image_name']=$this->load->get_var('image_name');

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;
            $this->db->select('*');
            $this->db->from('tbl_slider_panel2');
            //$this->db->where('id',$usr);
            $data['image_data']= $this->db->get();


            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/slider_panel2/view_images');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }

    public function add_images()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['image_name']=$this->load->get_var('image_name');

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;
            $this->db->select('*');
            $this->db->from('tbl_slider_panel2');
            //$this->db->where('id',$usr);
            $data['image_data']= $this->db->get();


            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/slider_panel2/add_images');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }

    public function add_image_data($t, $iw="")
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            // if($this->input->post())
            // {
            //
            //   if($this->form_validation->run()== TRUE)
            //   {
            $email=$this->input->post('email');
            $passw=$this->input->post('password');

            $cur_date=date("Y-m-d H:i:s");
            $ip = $this->input->ip_address();


            $addedby=$this->session->userdata('admin_id');

            $img1='image';

            $file_check=($_FILES['image']['error']);
            if ($file_check!=4) {
                $image_upload_folder = FCPATH . "assets/uploads/slider_panel2/";
                if (!file_exists($image_upload_folder)) {
                    mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                }
                $new_file_name="slider_panel2_image".date("Ymdhms");
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

                    $videoNAmePath = "assets/uploads/slider_panel2/".$new_file_name.$file_info['file_ext'];
                    $nnnn=$videoNAmePath;
                    // echo json_encode($file_info);
                }
            }

            $typ=base64_decode($t);
            if ($typ==1) {
                $data_insert = array('image'=>$nnnn,
                                  'added_by' =>$addedby,
                                  'ip'=>$ip,
                                  'is_active'=>1,
                                  'date'=>$cur_date
                                  );

                $last_id=$this->base_model->insert_table("tbl_slider_panel2", $data_insert, 1) ;
            }
            if ($typ==2) {
                $idw=base64_decode($iw);


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
                if (!empty($nnnn)) {
                    $data_insert = array('image'=>$nnnn

                                  );
                } else {
                    $data_insert = array(
                            );
                }

                $this->db->where('id', $idw);
                $last_id=$this->db->update('tbl_slider_panel2', $data_insert);
            }


            if ($last_id!=0) {
                $this->session->set_flashdata('smessage', 'Data inserted successfully');

                redirect("dcadmin/Slider_panel2/view_images", "refresh");
            } else {
                $this->session->set_flashdata('emessage', 'Sorry error occured');
                redirect($_SERVER['HTTP_REFERER']);
            }


            //               }
              //             else{
              //
              // $this->session->set_flashdata('emessage',validation_errors());
              //      redirect($_SERVER['HTTP_REFERER']);
              //
              //             }
              //
              //             }
              //           else{
              //
              // $this->session->set_flashdata('emessage','Please insert some data, No data available');
              //      redirect($_SERVER['HTTP_REFERER']);
              //
              //           }
        } else {
            redirect("login/admin_login", "refresh");
        }
    }

    public function update_images($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['image_name']=$this->load->get_var('image_name');

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;
            $id=base64_decode($idd);
            $data['id']=$idd;

            $this->db->select('*');
            $this->db->from('tbl_slider_panel2');
            $this->db->where('id', $id);
            $data['image_data']= $this->db->get()->row();


            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/slider_panel2/update_images');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }

    public function delete_images($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['image_name']=$this->load->get_var('image_name');

            $id=base64_decode($idd);

            if ($this->load->get_var('position')=="Super Admin") {
                $this->db->from('tbl_slider_panel2');
                $this->db->where('id', $id);
                $dsa= $this->db->get();
                $da=$dsa->row();

                $zapak=$this->db->delete('tbl_slider_panel2', array('id' => $id));
                if ($zapak!=0) {
                  $this->session->set_flashdata('smessage', 'Data deleted successfully');

                    redirect("dcadmin/Slider_panel2/view_images", "refresh");
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

    public function updateimageStatus($idd, $t)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['image_name']=$this->load->get_var('image_name');

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;
            $id=base64_decode($idd);

            if ($t=="active") {
                $data_update = array(
        'is_active'=>1

        );

                $this->db->where('id', $id);
                $zapak=$this->db->update('tbl_slider_panel2', $data_update);

                if ($zapak!=0) {
                  $this->session->set_flashdata('smessage', 'Status updated successfully');

                    redirect("dcadmin/Slider_panel2/view_images", "refresh");
                } else {
                    echo "Error";
                    exit;
                }
            }
            if ($t=="inactive") {
                $data_update = array(
         'is_active'=>0

         );

                $this->db->where('id', $id);
                $zapak=$this->db->update('tbl_slider_panel2', $data_update);

                if ($zapak!=0) {
                  $this->session->set_flashdata('smessage', 'Status updated successfully');
                  
                    redirect("dcadmin/Slider_panel2/view_images", "refresh");
                } else {
                    $data['e']="Error Occured";
                    // exit;
                    $this->load->view('errors/error500admin', $data);
                }
            }
        } else {
            $this->load->view('admin/login/index');
        }
    }
}
