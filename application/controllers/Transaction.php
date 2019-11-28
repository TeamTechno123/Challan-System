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

    $item_info = $this->Transaction_Model->GetItemInfo($company_id,$item_info_id);
    foreach($item_info as $info){
      $data['inword_rate'] = $info ->inword_rate;
      $data['outword_rate'] = $info ->outword_rate;
      $data['gst_slab'] = $info->gst_slab;
    }
    echo json_encode($data);
    // echo "<option value='0'>Select Item </option>";
  	// foreach ($item_list as $data) {
  	// 	echo "<option value=".$data->item_info_id."> ".$data->item_info_name." </option>";
  	// }
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
       $data['inword_id'] = $inword_id;
       $this->db->insert('inword_details', $data);
      }
    }
    header('location:'.base_url().'User/inword_information_list');
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

  public function outword_information(){
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Transaction/outword_information');
    $this->load->view('Include/footer');
  }

  public function outword_information_list(){
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Transaction/outword_information_list');
    $this->load->view('Include/footer');
  }


}
