<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Farmer_details extends CI_finecontrol
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->model("admin/base_model");
        $this->load->library('user_agent');
    }
    public function view_details()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['farmer_name']=$this->load->get_var('farmer_name');

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;
            $this->db->select('*');
            $this->db->from('tbl_farmer_details');
            //$this->db->where('id',$usr);
            $data['farmer_data']= $this->db->get();


            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/farmer_details/view_details');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
}
