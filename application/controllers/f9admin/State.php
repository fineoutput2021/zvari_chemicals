<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class State extends CI_finecontrol
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->model("admin/base_model");
        $this->load->library('user_agent');
    }
    public function view_state()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['state_name']=$this->load->get_var('state_name');

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;
            $this->db->select('*');
            $this->db->from('tbl_state');
            //$this->db->where('id',$usr);
            $data['state_data']= $this->db->get();


            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/state/view_state');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    public function add_state()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['state_name']=$this->load->get_var('state_name');

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;


            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/state/add_state');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    public function add_state_data($t, $iw="")
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if ($this->input->post()) {
                // print_r($this->input->post());
                // exit;
                $this->form_validation->set_rules('name', 'name', 'customAlpha|xss_clean');

                if ($this->form_validation->run()== true) {
                    $email=$this->input->post('email');
                    $passw=$this->input->post('password');

                    $ip = $this->input->ip_address();
                    date_default_timezone_set("Asia/Calcutta");
                    $cur_date=date("Y-m-d H:i:s");

                    $addedby=$this->session->userdata('admin_id');
                    $name=$this->input->post('name');


                    $typ=base64_decode($t);
                    if ($typ==1) {
                        $data_insert = array('name'=>$name,
                                       'ip' =>$ip,
                                       'added_by' =>$addedby,
                                       'is_active' =>1,
                                       'date'=>$cur_date

                                       );





                        $last_id=$this->base_model->insert_table("tbl_state", $data_insert, 1) ;
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

                        $data_insert = array('name'=>$name,
                                       );




                        $this->db->where('id', $idw);
                        $last_id=$this->db->update('tbl_state', $data_insert);
                    }


                    if ($last_id!=0) {
                        $this->session->set_flashdata('emessage', 'Data inserted successfully');

                        redirect("dcadmin/State/view_state", "refresh");
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
    public function update_state($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['state_name']=$this->load->get_var('state_name');

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;
            $id=base64_decode($idd);
            $data['id']=$idd;

            $this->db->select('*');
            $this->db->from('tbl_state');
            $this->db->where('id', $id);
            $data['state_data']= $this->db->get()->row();


            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/state/update_state');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    public function delete_state($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['state_name']=$this->load->get_var('state_name');

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;
            $id=base64_decode($idd);

            if ($this->load->get_var('position')=="Super Admin") {
                $this->db->from('tbl_state');
                $this->db->where('id', $id);
                $dsa= $this->db->get();
                $da=$dsa->row();

                $zapak=$this->db->delete('tbl_state', array('id' => $id));
                if ($zapak!=0) {
                    redirect("dcadmin/State/view_state", "refresh");
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
    public function updatestateStatus($idd, $t)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['state_name']=$this->load->get_var('state_name');

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
                $zapak=$this->db->update('tbl_state', $data_update);

                if ($zapak!=0) {
                    redirect("dcadmin/State/view_state", "refresh");
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
                $zapak=$this->db->update('tbl_state', $data_update);

                if ($zapak!=0) {
                    redirect("dcadmin/State/view_state", "refresh");
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
