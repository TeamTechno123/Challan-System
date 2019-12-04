<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Report extends CI_Controller{
    public function __construct(){
    parent::__construct();
    $this->load->model('User_Model');
    $this->load->model('Transaction_Model');
    $this->load->model('Report_Model');
  }

  public function item_wise_stock_report(){
    $company_id = $this->session->userdata('ch_company_id');
    $user_id = $this->session->userdata('ch_user_id');
    if($company_id == null){ header('location:'.base_url().'User'); }

    $data['party_list'] = $this->User_Model->get_list($company_id,'party_id','ASC','party');
    $this->form_validation->set_rules('from_date', 'From Date', 'trim|required');
    $this->form_validation->set_rules('to_date', 'To Date', 'trim|required');

    if($this->form_validation->run() != FALSE){
      $company_info = $this->User_Model->get_info('company_id', $company_id, 'company');
        foreach($company_info as $info){
          $data['company_name'] = $info->company_name;
          $data['company_address'] = $info->company_address;
          $data['company_statecode'] = $info->company_statecode;
          $data['company_mob1'] = $info->company_mob1;
          $data['company_mob2'] = $info->company_mob2;
          $data['company_email'] = $info->company_email;
          $data['company_website'] = $info->company_website;
          $data['company_pan_no'] = $info->company_pan_no;
          $data['company_gst_no'] = $info->company_gst_no;
        }

      $from_date = $this->input->post('from_date');
      $to_date = $this->input->post('to_date');
      $party_id = $this->input->post('party_id');
      $item_info_id = $this->input->post('item_info_id');
      $data['from_date'] = $from_date;
      $data['to_date'] = $to_date;
      $data['item_wise_stock'] = 'load';

      $get_item_details= $this->User_Model->get_item_details($company_id, $item_info_id);
      foreach($get_item_details as $details){
        $data['item_info_id'] = $details->item_info_id;
        $data['item_info_name'] = $details->item_info_name;
        $data['part_code'] = $details->part_code;
        $data['hsn_code'] = $details->hsn_code;
      }
      $data['inword_item_list'] = $this->Report_Model->inword_item_list($company_id,$from_date,$to_date,$party_id,$item_info_id);
      $data['outword_item_list'] = $this->Report_Model->outword_item_list($company_id,$from_date,$to_date,$party_id,$item_info_id);
      $data['item_opening_bal'] = $this->Report_Model->item_opening_bal($company_id,$from_date,$party_id,$item_info_id);
      $data['inword_by_remark'] = $this->Report_Model->inword_by_remark($company_id,$from_date,$to_date,$party_id,$item_info_id);
      $data['outword_by_remark'] = $this->Report_Model->outword_by_remark($company_id,$from_date,$to_date,$party_id,$item_info_id);
    }

    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Report/item_wise_stock_report',$data);
    $this->load->view('Include/footer',$data);
  }

  public function outword_bif_report(){
    $company_id = $this->session->userdata('ch_company_id');
    $user_id = $this->session->userdata('ch_user_id');
    if($company_id == null){ header('location:'.base_url().'User'); }

    $data['party_list'] = $this->User_Model->get_list($company_id,'party_id','ASC','party');
    $this->form_validation->set_rules('from_date', 'From Date', 'trim|required');
    $this->form_validation->set_rules('to_date', 'To Date', 'trim|required');

    if($this->form_validation->run() != FALSE){
      $company_info = $this->User_Model->get_info('company_id', $company_id, 'company');
        foreach($company_info as $info){
          $data['company_name'] = $info->company_name;
          $data['company_address'] = $info->company_address;
          $data['company_statecode'] = $info->company_statecode;
          $data['company_mob1'] = $info->company_mob1;
          $data['company_mob2'] = $info->company_mob2;
          $data['company_email'] = $info->company_email;
          $data['company_website'] = $info->company_website;
          $data['company_pan_no'] = $info->company_pan_no;
          $data['company_gst_no'] = $info->company_gst_no;
        }

      $from_date = $this->input->post('from_date');
      $to_date = $this->input->post('to_date');
      $party_id = $this->input->post('party_id');
      $item_info_id = $this->input->post('item_info_id');
      $data['from_date'] = $from_date;
      $data['to_date'] = $to_date;
      $data['item_wise_stock'] = 'load';

      $get_item_details= $this->User_Model->get_item_details($company_id, $item_info_id);
      foreach($get_item_details as $details){
        $data['item_info_id'] = $details->item_info_id;
        $data['item_info_name'] = $details->item_info_name;
        $data['part_code'] = $details->part_code;
        $data['hsn_code'] = $details->hsn_code;
      }
      $data['inword_item_list'] = $this->Report_Model->inword_item_list($company_id,$from_date,$to_date,$party_id,$item_info_id);
      $data['outword_item_list'] = $this->Report_Model->outword_item_list($company_id,$from_date,$to_date,$party_id,$item_info_id);
      $data['item_opening_bal'] = $this->Report_Model->item_opening_bal($company_id,$from_date,$party_id,$item_info_id);
      $data['inword_by_remark'] = $this->Report_Model->inword_by_remark($company_id,$from_date,$to_date,$party_id,$item_info_id);
      $data['outword_by_remark'] = $this->Report_Model->outword_by_remark($company_id,$from_date,$to_date,$party_id,$item_info_id);
    }

    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Report/outword_bif_report',$data);
    $this->load->view('Include/footer',$data);
  }

  public function vehicle_report(){
    $company_id = $this->session->userdata('ch_company_id');
    $user_id = $this->session->userdata('ch_user_id');
    if($company_id == null){ header('location:'.base_url().'User'); }
    $data['vehicle_list'] = $this->User_Model->get_list($company_id,'vehicle_id','ASC','vehicle');
    $this->form_validation->set_rules('from_date', 'From Date', 'trim|required');
    $this->form_validation->set_rules('to_date', 'To Date', 'trim|required');

    if($this->form_validation->run() != FALSE){
      $company_info = $this->User_Model->get_info('company_id', $company_id, 'company');
      foreach($company_info as $info){
        $data['company_name'] = $info->company_name;
        $data['company_address'] = $info->company_address;
        $data['company_statecode'] = $info->company_statecode;
        $data['company_mob1'] = $info->company_mob1;
        $data['company_mob2'] = $info->company_mob2;
        $data['company_email'] = $info->company_email;
        $data['company_website'] = $info->company_website;
        $data['company_pan_no'] = $info->company_pan_no;
        $data['company_gst_no'] = $info->company_gst_no;
      }

      $from_date = $this->input->post('from_date');
      $to_date = $this->input->post('to_date');
      $vehicle_id = $this->input->post('vehicle_id');
      $data['from_date'] = $from_date;
      $data['to_date'] = $to_date;
      $data['vehicle_report'] = 'load';
      $vehicle_details = $this->User_Model->get_info('vehicle_id', $vehicle_id, 'vehicle');
      foreach($vehicle_details as $details){
        $data['vehicle_id'] = $details->vehicle_id;
        $data['vehicle_number'] = $details->vehicle_number;
      }

      $data['veh_inword_item_list'] = $this->Report_Model->veh_inword_item_list($company_id,$from_date,$to_date,$vehicle_id);
      $data['veh_outword_item_list'] = $this->Report_Model->veh_outword_item_list($company_id,$from_date,$to_date,$vehicle_id);
    }

    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Report/vehicle_report',$data);
    $this->load->view('Include/footer',$data);
  }
/**************** CI Boaring *****************************/
  public function ci_report(){
    $company_id = $this->session->userdata('ch_company_id');
    $user_id = $this->session->userdata('ch_user_id');
    if($company_id == null){ header('location:'.base_url().'User'); }

    $data['party_list'] = $this->User_Model->get_list($company_id,'party_id','ASC','party');
    $this->form_validation->set_rules('from_date', 'From Date', 'trim|required');
    $this->form_validation->set_rules('to_date', 'To Date', 'trim|required');

    if($this->form_validation->run() != FALSE){
      $company_info = $this->User_Model->get_info('company_id', $company_id, 'company');
        foreach($company_info as $info){
          $data['company_name'] = $info->company_name;
          $data['company_address'] = $info->company_address;
          $data['company_statecode'] = $info->company_statecode;
          $data['company_mob1'] = $info->company_mob1;
          $data['company_mob2'] = $info->company_mob2;
          $data['company_email'] = $info->company_email;
          $data['company_website'] = $info->company_website;
          $data['company_pan_no'] = $info->company_pan_no;
          $data['company_gst_no'] = $info->company_gst_no;
        }

      $from_date = $this->input->post('from_date');
      $to_date = $this->input->post('to_date');
      $party_id = $this->input->post('party_id');
      $item_info_id = $this->input->post('item_info_id');
      $data['from_date'] = $from_date;
      $data['to_date'] = $to_date;
      $data['ci_report'] = 'load';

      $data['ci_out_item_list'] = $this->Report_Model->ci_out_item_list($company_id,$from_date,$to_date,$party_id,$item_info_id);
      // $data['outword_item_list'] = $this->Report_Model->outword_item_list($company_id,$from_date,$to_date,$party_id,$item_info_id);
      // $data['item_opening_bal'] = $this->Report_Model->item_opening_bal($company_id,$from_date,$party_id,$item_info_id);
      // $data['inword_by_remark'] = $this->Report_Model->inword_by_remark($company_id,$from_date,$to_date,$party_id,$item_info_id);
      // $data['outword_by_remark'] = $this->Report_Model->outword_by_remark($company_id,$from_date,$to_date,$party_id,$item_info_id);
      // echo print_r($data['ci_out_item_list']);
    }
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Report/ci_report',$data);
    $this->load->view('Include/footer',$data);
  }

  public function delivery_challan_receipt($outword_id){
    $company_id = $this->session->userdata('ch_company_id');
    if($company_id == null){ header('location:'.base_url().'User'); }
    $company_info = $this->User_Model->get_info('company_id', $company_id, 'company');
    foreach($company_info as $info){
      $data['company_name'] = $info->company_name;
      $data['company_address'] = $info->company_address;
      $data['company_statecode'] = $info->company_statecode;
      $data['company_mob1'] = $info->company_mob1;
      $data['company_mob2'] = $info->company_mob2;
      $data['company_email'] = $info->company_email;
      $data['company_website'] = $info->company_website;
      $data['company_pan_no'] = $info->company_pan_no;
      $data['company_gst_no'] = $info->company_gst_no;
    }
    $outword_data = $this->Transaction_Model->get_outword_info($outword_id);
    if($outword_data == null){ header('location:'.base_url().'Transaction/outword_information_list'); }
    foreach($outword_data as $details){
      $data['outword_id'] = $outword_id;
      $data['outword_dc_num'] = $details->outword_dc_num;
      $data['outword_date'] = $details->outword_date;
      $data['outword_trans'] = $details->outword_trans;
      $data['outword_basic_amt'] = $details->outword_basic_amt;
      $data['outword_gst'] = $details->outword_gst;
      $data['outword_net_amount'] = $details->outword_net_amount;
      $data['po_number'] = $details->po_number;
      $data['po_date'] = $details->po_date;
      $data['party_name'] = $details->party_name;
      $data['address'] = $details->address;
      $data['mobile_no'] = $details->mobile_no;
      $data['gst_no'] = $details->gst_no;
      $data['vehicle_number'] = $details->vehicle_number;
      $data['outword_E_no'] = $details->outword_E_no;
      $data['outword_E_date'] = $details->outword_E_date;
      $data['state_code'] = $details->state_code;
      // details
      $data['item_info_name'] = $details->item_info_name;
      $data['remark_name'] = $details->remark_name;
      $data['qty'] = $details->qty;
      $data['gst'] = $details->gst;
      $data['rate'] = $details->rate;
      $data['amount'] = $details->amount;
      $data['outword_details_id'] = $details->outword_details_id;

      $data['outword_details_id'] = $details->outword_details_id;
    }

    $data['report_inword_ref_list'] = $this->Transaction_Model->report_inword_ref_list($data['outword_details_id']);

    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Report/delivery_challan', $data);
    $this->load->view('Include/footer', $data);
  }

  public function delivery_challan_print($outword_id){
    $company_id = $this->session->userdata('ch_company_id');
    if($company_id == null){ header('location:'.base_url().'User'); }
    $company_info = $this->User_Model->get_info('company_id', $company_id, 'company');
    foreach($company_info as $info){
      $data['company_name'] = $info->company_name;
      $data['company_address'] = $info->company_address;
      $data['company_mob1'] = $info->company_mob1;
      $data['company_mob2'] = $info->company_mob2;
      $data['company_email'] = $info->company_email;
      $data['company_website'] = $info->company_website;
      $data['company_pan_no'] = $info->company_pan_no;
      $data['company_gst_no'] = $info->company_gst_no;
      $data['company_statecode'] = $info->company_statecode;
    }
    $outword_data = $this->Transaction_Model->get_outword_info($outword_id);
    if($outword_data == null){ header('location:'.base_url().'Transaction/outword_information_list'); }
    foreach($outword_data as $details){
      $data['outword_id'] = $outword_id;
      $data['outword_dc_num'] = $details->outword_dc_num;
      $data['outword_date'] = $details->outword_date;
      $data['outword_trans'] = $details->outword_trans;
      $data['outword_basic_amt'] = $details->outword_basic_amt;
      $data['outword_gst'] = $details->outword_gst;
      $data['outword_net_amount'] = $details->outword_net_amount;
      $data['po_number'] = $details->po_number;
      $data['po_date'] = $details->po_date;
      $data['party_name'] = $details->party_name;
      $data['address'] = $details->address;
      $data['mobile_no'] = $details->mobile_no;
      $data['gst_no'] = $details->gst_no;
      $data['vehicle_number'] = $details->vehicle_number;
      $data['outword_E_no'] = $details->outword_E_no;
      $data['outword_E_date'] = $details->outword_E_date;
      $data['state_code'] = $details->state_code;
      $data['outword_title'] = $details->outword_title;
      // details
      $data['item_info_name'] = $details->item_info_name;
      $data['remark_name'] = $details->remark_name;
      $data['qty'] = $details->qty;
      $data['gst'] = $details->gst;
      $data['rate'] = $details->rate;
      $data['amount'] = $details->amount;
      $data['outword_details_id'] = $details->outword_details_id;
    }
    $data['report_inword_ref_list'] = $this->Transaction_Model->report_inword_ref_list($data['outword_details_id']);

    $this->load->view('Report/delivery_challan_print',$data);
  }

  public function ci_report_print(){
    $this->load->view('Report/ci_report_print');
  }

  public function stock_report_print(){
    $this->load->view('Report/stock_report_print');
  }


}
