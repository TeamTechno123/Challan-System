<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('User_Model');
    $this->load->model('Transaction_Model');
  }

  public function inword_information(){
    $company_id = $this->session->userdata('ch_company_id');
    $user_id = $this->session->userdata('ch_user_id');
    if($company_id == null){ header('location:'.base_url().'User'); }
    $data['party_list'] = $this->User_Model->get_list($company_id,'party_id','ASC','party');
    $data['vehicle_list'] = $this->User_Model->get_list($company_id,'vehicle_id','ASC','vehicle');
    $data['remark_list'] = $this->User_Model->get_list($company_id,'remark_id','ASC','remark');
    $data['item_list'] = $this->User_Model->get_list($company_id,'item_info_id','ASC','item_info');
    $user_info = $this->User_Model->user_info($user_id);
    $data['user_name'] = $user_info[0]['user_name'];
    $data['user_mobile'] = $user_info[0]['user_mobile'];
    $data['user_id'] = $user_info[0]['user_id'];
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Transaction/inword_information',$data);
    $this->load->view('Include/footer',$data);
  }

  public function GetItemByParty(){
    $company_id = $this->session->userdata('ch_company_id');
    if($company_id == null){ header('location:'.base_url().'User'); }
    $party_id = $this->input->post('party_id');

    $item_list = $this->Transaction_Model->GetItemByParty($company_id,$party_id);
    echo "<option value='0'>Select Item </option>";
  	foreach ($item_list as $data) {
  		echo "<option value=".$data->item_info_id."> ".$data->item_info_name." </option>";
  	}
  }

  public function GetItemInfo(){
    $company_id = $this->session->userdata('ch_company_id');
    if($company_id == null){ header('location:'.base_url().'User'); }
    $item_info_id = $this->input->post('item_info_id');

    $item_info = $this->User_Model->get_item_details($company_id,$item_info_id);
    foreach($item_info as $info){
      $data['inword_rate'] = $info->inword_rate;
      $data['outword_rate'] = $info->outword_rate;
      $data['gst_per'] = $info->gst_per;
    }

    $item_inword_stock = $this->Transaction_Model->item_inword_stock($item_info_id);
    if($item_inword_stock == null){ $item_inword_stock = 0; }
    // echo $item_inword_stock;
    $data['stock'] = $item_inword_stock;
    echo json_encode($data);
  }

  public function check_inw_dup(){
    $company_id = $this->session->userdata('ch_company_id');
    $inword_dc_num = $this->input->post('inword_dc_num');
    $party_id = $this->input->post('party_id');
    $check = 'get_num_rows';
    $check_dup = $this->Transaction_Model->check_inw_dup($inword_dc_num, $party_id, $check);
    $data['get_num'] = $check_dup;
    echo $data['get_num'];
  }

  public function save_inword(){
    $company_id = $this->session->userdata('ch_company_id');
    if($company_id == null){ header('location:'.base_url().'User'); }

    $save_data = array(
      'company_id' => $company_id,
      'inword_dc_num' => $this->input->post('inword_dc_num'),
      'inword_date' => $this->input->post('inword_date'),
      'party_id' => $this->input->post('party_id'),
      'inword_basic_amt' => $this->input->post('inword_basic_amt'),
      'inword_gst' => $this->input->post('inword_gst'),
      'inword_net_amount' => $this->input->post('inword_net_amount'),
      'vehicle_id' => $this->input->post('vehicle_id'),
      'inword_trip' => $this->input->post('inword_trip'),
      'inword_trans' => $this->input->post('inword_trans'),
      'inword_addedby' => $this->input->post('user_id'),
    );
    $inword_id = $this->User_Model->save_data('inword', $save_data);
    if($inword_id){
      foreach($_POST['input'] as $data){
        $qty = $data['qty'];
        $data['bal_qty'] = $qty;
        $data['inword_id'] = $inword_id;
        $this->db->insert('inword_details', $data);
      }
    }
    header('location:'.base_url().'Transaction/inword_information_list');
  }

  public function inword_information_list(){
    $company_id = $this->session->userdata('ch_company_id');
    if($company_id == null){ header('location:'.base_url().'User'); }

    $data['inword_list'] = $this->Transaction_Model->inword_list($company_id);

    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Transaction/inword_information_list',$data);
    $this->load->view('Include/footer',$data);
  }

  public function edit_inword($inword_id){
    $company_id = $this->session->userdata('ch_company_id');
    $user_id = $this->session->userdata('ch_user_id');
    if($company_id == null){ header('location:'.base_url().'User'); }
    $data['party_list'] = $this->User_Model->get_list($company_id,'party_id','ASC','party');
    $data['vehicle_list'] = $this->User_Model->get_list($company_id,'vehicle_id','ASC','vehicle');
    $data['remark_list'] = $this->User_Model->get_list($company_id,'remark_id','ASC','remark');
    $data['item_list'] = $this->User_Model->get_list($company_id,'item_info_id','ASC','item_info');
    $user_info = $this->User_Model->user_info($user_id);
    $data['user_name'] = $user_info[0]['user_name'];
    $data['user_mobile'] = $user_info[0]['user_mobile'];
    $data['user_id'] = $user_info[0]['user_id'];

    $inword_data = $this->User_Model->get_info('inword_id', $inword_id, 'inword');
    if($inword_data){
      foreach($inword_data as $details){
        $data['update'] = 'yes';
        $data['inword_id'] = $inword_id;
        $data['inword_dc_num'] = $details->inword_dc_num;
        $data['inword_date'] = $details->inword_date;
        $data['party_id'] = $details->party_id;
        $data['inword_basic_amt'] = $details->inword_basic_amt;
        $data['inword_gst'] = $details->inword_gst;
        $data['inword_net_amount'] = $details->inword_net_amount;
        $data['vehicle_id'] = $details->vehicle_id;
        $data['inword_trip'] = $details->inword_trip;
        $data['inword_trans'] = $details->inword_trans;
        $data['inword_addedby'] = $details->inword_addedby;
      }
      $data['inword_details_list'] = $this->Transaction_Model->details_list('inword_id',$inword_id,'inword_details');
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('Transaction/inword_information',$data);
      $this->load->view('Include/footer',$data);
    }
    else{
      header('location:'.base_url().'Transaction/inword_information_list');
    }
  }

  public function update_inword(){
    $company_id = $this->session->userdata('ch_company_id');
    $user_id = $this->session->userdata('ch_user_id');
    $inword_id = $this->input->post('inword_id');
    $inword_data = array(
      'inword_dc_num' => $this->input->post('inword_dc_num'),
      'inword_date' => $this->input->post('inword_date'),
      'party_id' => $this->input->post('party_id'),
      'inword_basic_amt' => $this->input->post('inword_basic_amt'),
      'inword_gst' => $this->input->post('inword_gst'),
      'inword_net_amount' => $this->input->post('inword_net_amount'),
      'vehicle_id' => $this->input->post('vehicle_id'),
      'inword_trip' => $this->input->post('inword_trip'),
      'inword_trans' => $this->input->post('inword_trans'),
      'inword_addedby' => $this->input->post('user_id'),
    );
    $this->User_Model->update_info('inword_id', $inword_id, 'inword', $inword_data);
    foreach($_POST['input'] as $user){
      if(isset($user['inword_details_id'])){
        $inword_details_id = $user['inword_details_id'];
        if(!isset($user['item_info_id'])){
          $this->User_Model->delete_set('inword_details_id', $inword_details_id, 'inword_details');
        }else{
            $this->User_Model->update_info('inword_details_id', $inword_details_id, 'inword_details', $user);
        }
      }
      else{
        $qty = $user['qty'];
        $user['bal_qty'] = $qty;
        $user['inword_id'] = $inword_id;
        $this->db->insert('inword_details', $user);
      }
    }
    header('location:'.base_url().'Transaction/inword_information_list');
  }

  public function delete_inword($inword_id){
    $company_id = $this->session->userdata('ch_company_id');
    $user_id = $this->session->userdata('ch_user_id');
    if($company_id == null){ header('location:'.base_url().'User'); }
    $inword_details_list = $this->Transaction_Model->details_list('inword_id',$inword_id,'inword_details');
    $i = 0;
    foreach ($inword_details_list as $details) {
      $qty = $details->qty;
      $bal_qty = $details->bal_qty;
      if($qty > $bal_qty){
        $i++;
      }
    }
    if($i > 0){
      $this->session->set_flashdata('delete_error','yes');
      header('location:'.base_url().'Transaction/inword_information_list');
    } else{
      $this->Transaction_Model->delete_set('inword_id', $inword_id, 'inword');
      $this->Transaction_Model->delete_set('inword_id', $inword_id, 'inword_details');
    }
    header('location:'.base_url().'Transaction/inword_information_list');
  }

  /****************************** Outword Information ******************************/
  // Add Outword...
  public function outword_information(){
    $company_id = $this->session->userdata('ch_company_id');
    $user_id = $this->session->userdata('ch_user_id');
    if($company_id == null){ header('location:'.base_url().'User'); }
    $data['outword_dc_num'] = $this->Transaction_Model->get_count_no($company_id, 'outword_dc_num','outword');
    $data['party_list'] = $this->User_Model->get_list($company_id,'party_id','ASC','party');
    $data['vehicle_list'] = $this->User_Model->get_list($company_id,'vehicle_id','ASC','vehicle');
    $data['remark_list'] = $this->User_Model->get_list($company_id,'remark_id','ASC','remark');
    $data['item_list'] = $this->User_Model->get_list($company_id,'item_info_id','ASC','item_info');
    $user_info = $this->User_Model->user_info($user_id);
    $data['user_name'] = $user_info[0]['user_name'];
    $data['user_mobile'] = $user_info[0]['user_mobile'];
    $data['user_id'] = $user_info[0]['user_id'];
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Transaction/outword_information',$data);
    $this->load->view('Include/footer',$data);
  }
  // Save Outword...
  public function save_outword(){
    $company_id = $this->session->userdata('ch_company_id');
    if($company_id == null){ header('location:'.base_url().'User'); }

    $save_data = array(
      'company_id' => $company_id,
      'outword_dc_num' => $this->input->post('outword_dc_num'),
      'outword_date' => $this->input->post('outword_date'),
      'party_id' => $this->input->post('party_id'),
      'outword_E_no' => $this->input->post('outword_E_no'),
      'outword_E_date' => $this->input->post('outword_E_date'),
      'vehicle_id' => $this->input->post('vehicle_id'),
      'outword_trans' => $this->input->post('outword_trans'),
      'outword_trip' => $this->input->post('outword_trip'),
      'outword_addedby' => $this->input->post('user_id'),
      'outword_basic_amt' => $this->input->post('outword_basic_amt'),
      'outword_gst' => $this->input->post('outword_gst'),
      'outword_net_amount' => $this->input->post('outword_net_amount'),
      'outword_title' => $this->input->post('outword_title'),
    );
    $outword_id = $this->User_Model->save_data('outword', $save_data);
    if($outword_id){
      foreach($_POST['input'] as $data){
        $item_info_id = $data['item_info_id'];
        $qty = $data['qty'];
        $data['outword_id'] = $outword_id;
        $outword_details_id = $this->User_Model->save_data('outword_details', $data);

         while($qty > 0){
            $inword_item_for_out = $this->Transaction_Model->inword_item_for_out($item_info_id);
            $inword_id = $inword_item_for_out[0]['inword_id'];
            $inword_details_id = $inword_item_for_out[0]['inword_details_id'];
            $bal_qty = $inword_item_for_out[0]['bal_qty'];
            $item_info_id= $inword_item_for_out[0]['item_info_id'];
            if($bal_qty > $qty){
              $bal = $bal_qty - $qty;
              $used = $qty;
              $qty = 0;
            }
            else if($qty > $bal_qty){
              $qty = $qty - $bal_qty;
              $used = $bal_qty;
              $bal = 0;
            }
            else{
              $qty = 0;
              $bal = 0;
              $used = $bal_qty;
            }
            $in_update_data['bal_qty'] = $bal;
            $this->User_Model->update_info('inword_details_id', $inword_details_id, 'inword_details', $in_update_data);

            $out_ref_data['outword_id'] = $outword_id;
            $out_ref_data['outword_details_id'] = $outword_details_id;
            $out_ref_data['inword_id'] = $inword_id;
            $out_ref_data['inword_details_id'] = $inword_details_id;
            $out_ref_data['qty_used'] = $used;
            $out_ref_data['item_info_id'] = $item_info_id;
            $this->User_Model->save_data('outword_ref', $out_ref_data);
         }
      }
    }
    header('location:'.base_url().'Transaction/outword_information_list');
  }

  public function edit_outword($outword_id){
    $company_id = $this->session->userdata('ch_company_id');
    $user_id = $this->session->userdata('ch_user_id');
    if($company_id == null){ header('location:'.base_url().'User'); }
    $data['party_list'] = $this->User_Model->get_list($company_id,'party_id','ASC','party');
    $data['vehicle_list'] = $this->User_Model->get_list($company_id,'vehicle_id','ASC','vehicle');
    $data['remark_list'] = $this->User_Model->get_list($company_id,'remark_id','ASC','remark');
    $data['item_list'] = $this->User_Model->get_list($company_id,'item_info_id','ASC','item_info');
    $user_info = $this->User_Model->user_info($user_id);
    $data['user_name'] = $user_info[0]['user_name'];
    $data['user_mobile'] = $user_info[0]['user_mobile'];
    $data['user_id'] = $user_info[0]['user_id'];

    $outword_data = $this->User_Model->get_info('outword_id', $outword_id, 'outword');
    if($outword_data){
      foreach($outword_data as $details){
        $data['update'] = 'yes';
        $data['outword_id'] = $outword_id;
        $data['outword_dc_num'] = $details->outword_dc_num;
        $data['outword_date'] = $details->outword_date;
        $data['outword_E_no'] = $details->outword_E_no;
        $data['outword_E_date'] = $details->outword_E_date;
        $data['party_id'] = $details->party_id;
        $data['vehicle_id'] = $details->vehicle_id;
        $data['outword_trans'] = $details->outword_trans;
        $data['outword_trip'] = $details->outword_trip;
        $data['outword_basic_amt'] = $details->outword_basic_amt;
        $data['outword_gst'] = $details->outword_gst;
        $data['outword_net_amount'] = $details->outword_net_amount;
        $data['outword_addedby'] = $details->outword_addedby;
        $data['outword_title'] = $details->outword_title;
      }
      $data['outword_details_list'] = $this->Transaction_Model->details_list('outword_id',$outword_id,'outword_details');
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('Transaction/outword_information',$data);
      $this->load->view('Include/footer',$data);
    }
    else{
      header('location:'.base_url().'Transaction/outword_information_list');
    }
  }

  public function update_outword(){
    $company_id = $this->session->userdata('ch_company_id');
    $user_id = $this->session->userdata('ch_user_id');
    if($company_id == null){ header('location:'.base_url().'User'); }
    $outword_id = $this->input->post('outword_id');
    $outword_data = array(
      'outword_dc_num' => $this->input->post('outword_dc_num'),
      'outword_date' => $this->input->post('outword_date'),
      'party_id' => $this->input->post('party_id'),
      'outword_E_no' => $this->input->post('outword_E_no'),
      'outword_E_date' => $this->input->post('outword_E_date'),
      'vehicle_id' => $this->input->post('vehicle_id'),
      'outword_trans' => $this->input->post('outword_trans'),
      'outword_trip' => $this->input->post('outword_trip'),
      'outword_addedby' => $this->input->post('user_id'),
      'outword_basic_amt' => $this->input->post('outword_basic_amt'),
      'outword_gst' => $this->input->post('outword_gst'),
      'outword_net_amount' => $this->input->post('outword_net_amount'),
      'outword_title' => $this->input->post('outword_title'),
    );
    $this->User_Model->update_info('outword_id', $outword_id, 'outword', $outword_data);

    foreach($_POST['input'] as $data){
      $outword_details_id = $data['outword_details_id'];
      $item_info_id = $data['item_info_id'];
      $qty = $data['qty'];

      $inword_ref_list = $this->Transaction_Model->inword_ref_list($outword_details_id);
      foreach ($inword_ref_list as $inword_ref) {
        $ref_id = $inword_ref->ref_id;
        $inword_details_id = $inword_ref->inword_details_id;
        $qty_used = $inword_ref->qty_used;

        $inword_info = $this->User_Model->get_info_array('inword_details_id', $inword_details_id, 'inword_details');

        $inword_bal_qty = $inword_info[0]['bal_qty'];
        $bal_qty = $qty_used + $inword_bal_qty;
        echo $inword_details_id.' '.$qty_used.'<br>';
        echo $bal_qty.'<br>';
        $inword_up_data['bal_qty'] = $bal_qty;
        $this->User_Model->update_info('inword_details_id', $inword_details_id, 'inword_details', $inword_up_data);
        $this->User_Model->delete_info('ref_id', $ref_id, 'outword_ref');
      }

      $this->User_Model->update_info('outword_details_id', $outword_details_id, 'outword_details', $data);

      while($qty > 0){
        $inword_item_for_out = $this->Transaction_Model->inword_item_for_out($item_info_id);
        $inword_id = $inword_item_for_out[0]['inword_id'];
        $inword_details_id = $inword_item_for_out[0]['inword_details_id'];
        $bal_qty = $inword_item_for_out[0]['bal_qty'];
        $item_info_id= $inword_item_for_out[0]['item_info_id'];
        if($bal_qty > $qty){
          $bal = $bal_qty - $qty;
          $used = $qty;
          $qty = 0;
        }
        else if($qty > $bal_qty){
          $qty = $qty - $bal_qty;
          $used = $bal_qty;
          $bal = 0;
        }
        else{
          $qty = 0;
          $bal = 0;
          $used = $bal_qty;
        }
        $in_update_data['bal_qty'] = $bal;
        $this->User_Model->update_info('inword_details_id', $inword_details_id, 'inword_details', $in_update_data);

        $out_ref_data['outword_id'] = $outword_id;
        $out_ref_data['outword_details_id'] = $outword_details_id;
        $out_ref_data['inword_id'] = $inword_id;
        $out_ref_data['inword_details_id'] = $inword_details_id;
        $out_ref_data['qty_used'] = $used;
        $out_ref_data['item_info_id'] = $item_info_id;
        $this->User_Model->save_data('outword_ref', $out_ref_data);
     }
    }
    header('location:'.base_url().'Transaction/outword_information_list');
  }

  public function delete_outword($outword_id){
    $company_id = $this->session->userdata('ch_company_id');
    $user_id = $this->session->userdata('ch_user_id');
    if($company_id == null){ header('location:'.base_url().'User'); }

    $outword_details_list = $this->Transaction_Model->details_list('outword_id',$outword_id,'outword_details');
    foreach ($outword_details_list as $outword_details) {
      $outword_details_id =$outword_details->outword_details_id;
      $item_info_id = $outword_details->item_info_id;
      $qty = $outword_details->qty;

      $inword_ref_list = $this->Transaction_Model->inword_ref_list($outword_details_id);
      foreach ($inword_ref_list as $inword_ref) {
        $ref_id = $inword_ref->ref_id;
        $inword_details_id = $inword_ref->inword_details_id;
        $qty_used = $inword_ref->qty_used;

        $inword_info = $this->User_Model->get_info_array('inword_details_id', $inword_details_id, 'inword_details');

        $inword_bal_qty = $inword_info[0]['bal_qty'];
        $bal_qty = $qty_used + $inword_bal_qty;
        echo $inword_details_id.' '.$qty_used.'<br>';
        echo $bal_qty.'<br>';
        $inword_up_data['bal_qty'] = $bal_qty;
        $this->User_Model->update_info('inword_details_id', $inword_details_id, 'inword_details', $inword_up_data);
        $this->User_Model->delete_info('ref_id', $ref_id, 'outword_ref');
      }
    }

    $this->Transaction_Model->delete_set('outword_id', $outword_id, 'outword');
    $this->Transaction_Model->delete_set('outword_id', $outword_id, 'outword_details');

    header('location:'.base_url().'Transaction/outword_information_list');
  }


  // Outword List...
  public function outword_information_list(){
    $company_id = $this->session->userdata('ch_company_id');
    if($company_id == null){ header('location:'.base_url().'User'); }
    $data['outword_list'] = $this->Transaction_Model->outword_list($company_id);
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Transaction/outword_information_list',$data);
    $this->load->view('Include/footer',$data);
  }




}
