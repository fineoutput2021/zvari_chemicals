<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Sales_details extends CI_finecontrol
{
    public function view_sales_details($idd)
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
            $this->db->from('tbl_order1');
            $this->db->where('employee_id', $id);
            $this->db->order_by('date', 'desc');
            $data['orders_data']= $this->db->get();


            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/sales_details/view_sales_details');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
}
