<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Employee extends CI_finecontrol
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->model("admin/base_model");
        $this->load->library('user_agent');
        $this->load->library('upload');
    }

    public function view_employee()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['employee_name']=$this->load->get_var('employee_name');
            $designation=$this->session->userdata('designation_id');
            $state=$this->session->userdata('state_id');
            $territory=$this->session->userdata('territory_id');
            // echo $designation;
            // echo  $state;
            // echo $territory;
            // die();

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;
            $this->db->select('*');
            $this->db->from('tbl_employee');
            //$this->db->where('id',$usr);
            if (!empty($state)) {
                $this->db->where('state_id', $state);
            }
            if (!empty($territory)) {
                $this->db->where('territory_id', $territory);
            }
            $this->db->where('position_id >', $designation);
            $this->db->order_by('date', 'desc');
            $data['employee_data']= $this->db->get();





            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/employee/view_employee');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }

    public function add_employee()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['employee_name']=$this->load->get_var('employee_name');

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;
            $this->db->select('*');
            $this->db->from('tbl_state');
            //$this->db->where('id',$usr);
            $data['state_data']= $this->db->get();

            $this->db->select('*');
            $this->db->from('tbl_territory');
            //$this->db->where('id',$usr);
            $data['territory_data']= $this->db->get();

            $this->db->select('*');
            $this->db->from('tbl_position');
            //$this->db->where('id',$usr);
            $data['position_data']= $this->db->get();


            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/employee/add_employee');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }

    public function add_employee_data($t, $iw="")
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if ($this->input->post()) {
                // print_r($this->input->post());
                // exit;
                $this->form_validation->set_rules('name', 'name', 'xss_clean');
                $this->form_validation->set_rules('phone', 'phone', 'xss_clean');
                $this->form_validation->set_rules('email', 'email', 'xss_clean');
                $this->form_validation->set_rules('password', 'password', 'xss_clean');
                $this->form_validation->set_rules('state', 'state', 'xss_clean');
                $this->form_validation->set_rules('position_id', 'position_id', 'xss_clean');
                $this->form_validation->set_rules('territory', 'territory', 'xss_clean');
                $this->form_validation->set_rules('km_details', 'km_details', 'xss_clean');
                $this->form_validation->set_rules('tour_details', 'tour_details', 'xss_clean');
                $this->form_validation->set_rules('sales_details', 'sales_details', 'xss_clean');


                if ($this->form_validation->run()== true) {
                    $email=$this->input->post('email');
                    $password=$this->input->post('password');

                    $ip = $this->input->ip_address();
                    date_default_timezone_set("Asia/Calcutta");
                    $cur_date=date("Y-m-d H:i:s");
                    $password=md5($password);
                    $addedby=$this->session->userdata('admin_id');

                    $name=$this->input->post('name');
                    $phone=$this->input->post('phone');
                    $state=$this->input->post('state_id');
                    $position_id=$this->input->post('position_id');
                    $territory=$this->input->post('territory_id');
                    $tour=$this->input->post('tour_details');
                    $km=$this->input->post('km_details');
                    $sales=$this->input->post('sales_details');


                    $img1='image';

                    $file_check=($_FILES['image']['error']);
                    if ($file_check!=4) {
                        $image_upload_folder = FCPATH . "assets/uploads/employee/";
                        if (!file_exists($image_upload_folder)) {
                            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                        }
                        $new_file_name="employee".date("Ymdhms");
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

                            $videoNAmePath = "assets/uploads/employee/".$new_file_name.$file_info['file_ext'];
                            $file_info['new_name']=$videoNAmePath;
                            // $this->step6_model->updateappIconImage($imageNAmePath,$appInfoId);
                            $nnnn=$file_info['file_name'];
                            // echo json_encode($file_info);
                        }
                    }

                    $typ=base64_decode($t);
                    if ($typ==1) {
                        $data_insert = array('name'=>$name,
                    'phone'=>$phone,
                    'email'=>$email,
                    'position_id'=>$position_id,
                    'password'=>$password,
                    'state_id'=>$state,
                    'territory_id'=>$territory,
                    'ip' =>$ip,
                    'image'=>$nnnn,
                    'added_by' =>$addedby,
                    'is_active' =>1,
                    'date'=>$cur_date
                    );






                        $last_id=$this->base_model->insert_table("tbl_employee", $data_insert, 1) ;
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
                            $data_insert = array('name'=>$name,
                    'phone'=>$phone,
                    'email'=>$email,
                    'position_id'=>$position_id,
                    'password'=>$password,
                    'state_id'=>$state,
                    'territory_id'=>$territory,
                    'image'=>$nnnn
                    );
                        } else {
                            $data_insert = array('name'=>$name,
                'phone'=>$phone,
                'email'=>$email,
                'position_id'=>$position_id,
                'password'=>$password,
                'state_id'=>$state,
                'territory_id'=>$territory

                );
                        }


                        $this->db->where('id', $idw);
                        $last_id=$this->db->update('tbl_employee', $data_insert);
                    }


                    if ($last_id!=0) {
                        $this->session->set_flashdata('emessage', 'Data updated successfully');

                        redirect("dcadmin/Employee/view_employee", "refresh");
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

    public function update_employee($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['employee_name']=$this->load->get_var('employee_name');

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;
            $id=base64_decode($idd);
            $data['id']=$idd;

            $this->db->select('*');
            $this->db->from('tbl_state');
            $this->db->where('is_active', 1);
            $data['state_data']= $this->db->get();

            $this->db->select('*');
            $this->db->from('tbl_territory');
            $this->db->where('is_active', 1);
            $data['territory_data']= $this->db->get();

            $this->db->select('*');
            $this->db->from('tbl_employee');
            $this->db->where('id', $id);
            $data['employee_data']= $this->db->get()->row();

            $this->db->select('*');
            $this->db->from('tbl_position');
            //$this->db->where('id',$usr);
            $data['position_data']= $this->db->get();


            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/employee/update_employee');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }

    public function delete_employee($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['employee_name']=$this->load->get_var('employee_name');

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;
            $id=base64_decode($idd);

            if ($this->load->get_var('position')=="Super Admin") {
                $this->db->select('image');
                $this->db->from('tbl_employee');
                $this->db->where('id', $id);
                $dsa= $this->db->get();
                $da=$dsa->row();

                $zapak=$this->db->delete('tbl_employee', array('id' => $id));
                if ($zapak!=0) {
                    redirect("dcadmin/Employee/view_employee", "refresh");
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


    public function updateemployeeStatus($idd, $t)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['employee_name']=$this->load->get_var('employee_name');

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
                $zapak=$this->db->update('tbl_employee', $data_update);

                if ($zapak!=0) {
                    redirect("dcadmin/Employee/view_employee", "refresh");
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
                $zapak=$this->db->update('tbl_employee', $data_update);

                if ($zapak!=0) {
                    redirect("dcadmin/Employee/view_employee", "refresh");
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
    public function territory_change()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['employee_name']=$this->load->get_var('employee_name');
            $sid=$_GET['isl'];

            $this->db->select('*');
            $this->db->from('tbl_territory');
            $this->db->where('state_id', $sid);
            $teri_data= $this->db->get();
            $res=[];
            foreach ($teri_data->result() as $data) {
                $res[]=array("id"=>$data->id,'name'=>$data->name);
            }
            echo json_encode($res);
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
}
