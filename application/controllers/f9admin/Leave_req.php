<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Leave_req extends CI_finecontrol
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->model("admin/base_model");
        $this->load->library('user_agent');
    }
    public function view_leave_req()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;

            $this->db->select('*');
            $this->db->from('tbl_leave_req');
            $this->db->order_by('is_active','asc');
            $this->db->order_by('date','desc');
            $data['leave_req_data']= $this->db->get();


            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/leave_req/view_leave_req');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    public function updateleave_reqStatus($idd, $t)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;
            $id=base64_decode($idd);

            if ($t=="accept") {
                $data_update = array(
             'is_active'=>2

             );

                $this->db->where('id', $id);
                $zapak=$this->db->update('tbl_leave_req', $data_update);

                if ($zapak!=0) {
                  $this->session->set_flashdata('smessage', 'Leave request accepted!');

                    redirect("dcadmin/Leave_req/view_leave_req", "refresh");
                } else {
                    echo "Error";
                    exit;
                }
            }
            if ($t=="reject") {
                $data_update = array(
              'is_active'=>3

              );

                $this->db->where('id', $id);
                $zapak=$this->db->update('tbl_leave_req', $data_update);

                if ($zapak!=0) {
                  $this->session->set_flashdata('smessage', 'Leave request Rejected!');

                    redirect("dcadmin/Leave_req/view_leave_req", "refresh");
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
