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
    if($company_id == null){ header('location:'.base_url().'User'); }
    $data['party_list'] = $this->User_Model->get_list($company_id,'party_id','ASC','party');
    $data['vehicle_list'] = $this->User_Model->get_list($company_id,'vehicle_id','ASC','vehicle');
    $data['remark_list'] = $this->User_Model->get_list($company_id,'remark_id','ASC','remark');
    $data['item_list'] = $this->User_Model->get_list($company_id,'item_info_id','ASC','item_info');
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

  /****************************** Outword Information ******************************/
  // Add Outword...
  public function outword_information(){
    $company_id = $this->session->userdata('ch_company_id');
    if($company_id == null){ header('location:'.base_url().'User'); }
    $data['outword_dc_num'] = $this->Transaction_Model->get_count_no($company_id, 'outword_dc_num','outword');
    $data['party_list'] = $this->User_Model->get_list($company_id,'party_id','ASC','party');
    $data['vehicle_list'] = $this->User_Model->get_list($company_id,'vehicle_id','ASC','vehicle');
    $data['remark_list'] = $this->User_Model->get_list($company_id,'remark_id','ASC','remark');
    $data['item_list'] = $this->User_Model->get_list($company_id,'item_info_id','ASC','item_info');

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
      'outword_basic_amt' => $this->input->post('outword_basic_amt'),
      'outword_gst' => $this->input->post('outword_gst'),
      'outword_net_amount' => $this->input->post('outword_net_amount'),
    );
    $outword_id = $this->User_Model->save_data('outword', $save_data);
    if($outword_id){
      foreach($_POST['input'] as $data){
        $item_info_id = $data['item_info_id'];
        $qty = $data['qty'];
        $outword_details_id = $this->User_Model->save_data('outword_details', $data);

         while($qty > 0){
            $inword_item_for_out = $this->Transaction_Model->inword_item_for_out($item_info_id);
            $inword_id = $inword_item_for_out[0]['inword_id'];
            $inword_details_id = $inword_item_for_out[0]['inword_details_id'];
            $bal_qty = $inword_item_for_out[0]['bal_qty'];
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
            $this->User_Model->save_data('outword_ref', $out_ref_data);
         }
      }
    }
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
