<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class User extends CI_Controller{
    public function __construct(){
    parent::__construct();
    $this->load->model('User_Model');
  }

  public function logout(){
    $this->session->sess_destroy();
    header('location:'.base_url().'User');
  }

  public function index(){
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    if ($this->form_validation->run() == FALSE) {
    	$this->load->view('User/login');
    }
    else{
      $email = $this->input->post('email');
      $password = $this->input->post('password');

      $login = $this->User_Model->check_login($email, $password);
      if($login == null){
        $this->session->set_flashdata('msg','login_error');
        header('location:'.base_url().'User');
      }
      else{
        foreach ($login as $login){
          $this->session->set_userdata('ch_user_id', $login['user_id']);
          $this->session->set_userdata('ch_company_id', $login['company_id']);
          $this->session->set_userdata('roll_id', $login['roll_id']);
        }
        header('location:'.base_url().'User/dashboard');
      }
    }
  }

  public function dashboard(){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $this->load->view('User/dashboard');
    } else{
      header('location:'.base_url().'User');
    }
  }

  /***************************** Company Information ************************/
  // Company list...
  public function company_information_list(){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $data['company_list'] = $this->User_Model->get_list($company_id,'company_id','ASC','company');
      $this->load->view('User/company_information_list',$data);
    } else{
      header('location:'.base_url().'User');
    }
  }
  // Edit Company...
  public function edit_company($company_id){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $company_info = $this->User_Model->get_info('company_id', $company_id, 'company');
      if($company_info){
        foreach($company_info as $info){
          $data['update'] = 'update';
          $data['company_id'] = $info->company_id;
          $data['company_name'] = $info->company_name;
          $data['company_address'] = $info->company_address;
          $data['company_city'] = $info->company_city;
          $data['company_state'] = $info->company_state;
          $data['company_district'] = $info->company_district;
          $data['company_pincode'] = $info->company_pincode;
          $data['company_mob1'] = $info->company_mob1;
          $data['company_mob2'] = $info->company_mob2;
          $data['company_email'] = $info->company_email;
          $data['company_website'] = $info->company_website;
          $data['company_pan_no'] = $info->company_pan_no;
          $data['company_gst_no'] = $info->company_gst_no;
          $data['company_lic1'] = $info->company_lic1;
          $data['company_lic2'] = $info->company_lic2;
          $data['company_start_date'] = $info->company_start_date;
          $data['company_end_date'] = $info->company_end_date;
        }
        $this->load->view('User/company_information',$data);
      }
    } else{
      header('location:'.base_url().'User');
    }
  }
  // Update Company...
  public function update_company(){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $company_id = $this->input->post('company_id');
      $data = array(
        'company_name' => $this->input->post('company_name'),
        'company_address' => $this->input->post('company_address'),
        'company_city' => $this->input->post('company_city'),
        'company_state' => $this->input->post('company_state'),
        'company_district' => $this->input->post('company_district'),
        'company_pincode' => $this->input->post('company_pincode'),
        'company_mob1' => $this->input->post('company_mob1'),
        'company_mob2' => $this->input->post('company_mob2'),
        'company_email' => $this->input->post('company_email'),
        'company_website' => $this->input->post('company_website'),
        'company_pan_no' => $this->input->post('company_pan_no'),
        'company_gst_no' => $this->input->post('company_gst_no'),
        'company_lic1' => $this->input->post('company_lic1'),
        'company_lic2' => $this->input->post('company_lic2'),
        'company_start_date' => $this->input->post('company_start_date'),
        'company_end_date' => $this->input->post('company_end_date'),
      );
      $this->User_Model->update_info('company_id', $company_id, 'company', $data);
      header('location:'.base_url().'User/company_information_list');
    } else{
      header('location:'.base_url().'User');
    }
  }

  /************************** Unit Information *******************/
  // Add Unit...
  public function unit_information(){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $this->load->view('User/unit_information');
    } else{
      header('location:'.base_url().'User');
    }
  }
  // Save Unit...
  public function save_unit(){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $unit_name = $this->input->post('unit_name');
      $data = array(
        'company_id' => $company_id,
        'unit_name' => $this->input->post('unit_name'),
      );
      $check = $this->User_Model->check_duplication($company_id,$unit_name,'unit_name','unit');
      if($check){
        header('location:'.base_url().'User/unit_information');
      }
      else{
        $this->User_Model->save_data('unit', $data);
        header('location:'.base_url().'User/unit_information_list');
      }
    } else{
      header('location:'.base_url().'User');
    }
  }

// List Unit
  public function unit_information_list(){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $data['unit_list'] = $this->User_Model->get_list($company_id,'unit_id','ASC','unit');
      $this->load->view('User/unit_information_list',$data);
    } else{
      header('location:'.base_url().'User');
    }
  }

  //edit unit ...
  public function edit_unit($id){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $unit_info = $this->User_Model->get_info('unit_id', $id, 'unit');
      if($unit_info){
        foreach($unit_info as $info){
          $data['update'] = 'update';
          $data['unit_id'] = $info->unit_id;
          $data['unit_name'] = $info->unit_name;
          $data['unit_status'] = $info->unit_status;
        }
        $this->load->view('User/unit_information',$data);
      }
    } else{
      header('location:'.base_url().'Login');
    }
  }

  // Update Item Group ... DB...
public function update_unit(){
  $user_id = $this->session->userdata('ch_user_id');
  $company_id = $this->session->userdata('ch_company_id');
  $roll_id = $this->session->userdata('roll_id');
  if($company_id){
    $unit_id = $this->input->post('unit_id');
    $data = array(
      'unit_name' => $this->input->post('unit_name'),
    );
    $this->User_Model->update_info('unit_id', $unit_id, 'unit', $data);
    header('location:'.base_url().'User/unit_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
// Delete Item Group
public function delete_unit($id){
  $user_id = $this->session->userdata('ch_user_id');
  $company_id = $this->session->userdata('ch_company_id');
  $roll_id = $this->session->userdata('roll_id');
  if($company_id){
    $this->User_Model->delete_info('unit_id', $id, 'unit');
    header('location:'.base_url().'User/unit_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}




  public function company_information(){
    $this->load->view('User/company_information');
  }



// *****************************************Item Information ******************************

  public function item_information(){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $data['gst_list'] = $this->User_Model->get_list1('gst_id','ASC','gst');
      $data['party_list'] = $this->User_Model->get_list($company_id,'party_id','ASC','party');
      $data['unit_list'] = $this->User_Model->get_list($company_id,'unit_id','ASC','unit');
      $data['item_group_list'] = $this->User_Model->get_list($company_id,'item_group_id','ASC','item_group');
      $this->load->view('User/item_information',$data);

    } else{
      header('location:'.base_url().'User');
    }
  }

  //  List  Item ...
  public function item_information_list(){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      // this query for multiple join table
      $data['item_list'] = $this->User_Model->get_item_list($company_id);
    $this->load->view('User/item_information_list', $data);
  } else{
    header('location:'.base_url().'User');
  }
  }

  // Save Item Group...
  public function save_item(){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $item_info_name = $this->input->post('item_info_name');
      $data = array(
        'company_id' => $company_id,
        'item_info_name' => $this->input->post('item_info_name'),
        'part_code' => $this->input->post('part_code'),
        'hsn_code' => $this->input->post('hsn_code'),
        'gst_slab' => $this->input->post('gst_slab'),
        'party_id' => $this->input->post('party_id'),
        'item_group_id' => $this->input->post('item_group_id'),
        'unit_id' => $this->input->post('unit_id'),
        'inword_rate' => $this->input->post('inword_rate'),
        'outword_rate' => $this->input->post('outword_rate'),
        'ci_boring_weight' => $this->input->post('ci_boring_weight'),
        'po_number' => $this->input->post('po_number'),
        'po_date' => $this->input->post('po_date'),
      );
      $check = $this->User_Model->check_duplication($company_id,$item_info_name,'item_info_name','item_info');
      if($check){
        header('location:'.base_url().'User/item_information');
      }
      else{
        $this->User_Model->save_data('item_info', $data);
        header('location:'.base_url().'User/item_information_list');
      }
    } else{
      header('location:'.base_url().'User');
    }
  }





  //edit Item Group ...
  public function edit_item($id){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $get_item_details= $this->User_Model->get_item_details($company_id, $id);
      $data['gst_list'] = $this->User_Model->get_list1('gst_id','ASC','gst');
      $data['party_list'] = $this->User_Model->get_list($company_id,'party_id','ASC','party');
      $data['unit_list'] = $this->User_Model->get_list($company_id,'unit_id','ASC','unit');
      $data['item_group_list'] = $this->User_Model->get_list($company_id,'item_group_id','ASC','item_group');
      if($get_item_details){
        foreach($get_item_details as $info){
          $data['update'] = 'update';
          $data['item_info_id'] = $info->item_info_id;
          $data['item_info_name'] = $info->item_info_name;
          $data['part_code'] = $info->part_code;
          $data['hsn_code'] = $info->hsn_code;
          $data['gst_slab'] = $info->gst_slab;
          // $data['gst_id'] = $info->gst_id;
          $data['party_id'] = $info->party_id;
          $data['item_group_id'] = $info->item_group_id;
          $data['unit_id'] = $info->unit_id;
          $data['inword_rate'] = $info->inword_rate;
          $data['outword_rate'] = $info->outword_rate;
          $data['ci_boring_weight'] = $info->ci_boring_weight;
          $data['po_number'] = $info->po_number;
          $data['po_date'] = $info->po_date;
          $data['ci_boring_weight'] = $info->ci_boring_weight;
          $data['po_number'] = $info->po_number;
        }
        $this->load->view('User/item_information',$data);
      }
    } else{
      header('location:'.base_url().'Login');
    }
  }

  // Update Item Group ... DB...
public function update_item(){
  $user_id = $this->session->userdata('ch_user_id');
  $company_id = $this->session->userdata('ch_company_id');
  $roll_id = $this->session->userdata('roll_id');
  if($company_id){
    $item_info_id = $this->input->post('item_info_id');
    $data = array(
      'item_info_name' => $this->input->post('item_info_name'),
      'part_code' => $this->input->post('part_code'),
      'hsn_code' => $this->input->post('hsn_code'),
      'gst_slab' => $this->input->post('gst_slab'),
      'party_id' => $this->input->post('party_id'),
      'item_group_id' => $this->input->post('item_group_id'),
      'unit_id' => $this->input->post('unit_id'),
      'inword_rate' => $this->input->post('inword_rate'),
      'outword_rate' => $this->input->post('outword_rate'),
      'ci_boring_weight' => $this->input->post('ci_boring_weight'),
      'po_number' => $this->input->post('po_number'),
      'po_date' => $this->input->post('po_date'),
    );
    $this->User_Model->update_info('item_info_id', $item_info_id, 'item_info', $data);
    header('location:item_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
// Delete Item Group
public function delete_item($id){
  $user_id = $this->session->userdata('ch_user_id');
  $company_id = $this->session->userdata('ch_company_id');
  $roll_id = $this->session->userdata('roll_id');
  if($company_id){
    $this->User_Model->delete_info('item_info_id', $id, 'item_info');
    header('location:../item_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}

  /************************** Item Group Information *******************/
  // Add Item Group...
  public function item_group_information(){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $this->load->view('User/item_group_information');
    } else{
      header('location:'.base_url().'User');
    }
  }

  // Save Item Group...
  public function save_item_group(){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $item_group_name = $this->input->post('item_group_name');
      $data = array(
        'company_id' => $company_id,
        'item_group_name' => $this->input->post('item_group_name'),
      );
      $check = $this->User_Model->check_duplication($company_id,$item_group_name,'item_group_name','item_group');
      if($check){
        header('location:'.base_url().'User/item_group_information');
      }
      else{
        $this->User_Model->save_data('item_group', $data);
        header('location:'.base_url().'User/item_group_information_list');
      }
    } else{
      header('location:'.base_url().'User');
    }
  }



 //  List  Item Group...
  public function item_group_information_list(){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $data['item_group_list'] = $this->User_Model->get_list($company_id,'item_group_id','ASC','item_group');
    $this->load->view('User/item_group_information_list',$data);
  } else{
    header('location:'.base_url().'User');
  }
  }

  //edit Item Group ...
  public function edit_item_group($id){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $item_group_info = $this->User_Model->get_info('item_group_id', $id, 'item_group');
      if($item_group_info){
        foreach($item_group_info as $info){
          $data['update'] = 'update';
          $data['item_group_id'] = $info->item_group_id;
          $data['item_group_name'] = $info->item_group_name;
          $data['item_group_status'] = $info->item_group_status;
        }
        $this->load->view('User/item_group_information',$data);
      }
    } else{
      header('location:'.base_url().'Login');
    }
  }

  // Update Item Group ... DB...
public function update_item_group(){
  $user_id = $this->session->userdata('ch_user_id');
  $company_id = $this->session->userdata('ch_company_id');
  $roll_id = $this->session->userdata('roll_id');
  if($company_id){
    $item_group_id = $this->input->post('item_group_id');
    $data = array(
      'item_group_name' => $this->input->post('item_group_name'),
    );
    $this->User_Model->update_info('item_group_id', $item_group_id, 'item_group', $data);
    header('location:item_group_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
// Delete Item Group
public function delete_item_group($id){
  $user_id = $this->session->userdata('ch_user_id');
  $company_id = $this->session->userdata('ch_company_id');
  $roll_id = $this->session->userdata('roll_id');
  if($company_id){
    $this->User_Model->delete_info('item_group_id', $id, 'item_group');
    header('location:../item_group_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}



// *********************************party Information *****************************



  public function party_information(){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
      if($company_id == null){  header('location:'.base_url().'User');}
  $data['party_type'] = $this->User_Model->get_list($company_id,'party_type_id','ASC','party_type');
  $data['party_list'] = $this->User_Model->get_party_list($company_id,'party_type_id','ASC','party_type');
  $data['state_list'] = $this->User_Model->get_list1('state_id','ASC','state');
  $this->load->view('User/party_information',$data);
  }

  // List Remark
    public function party_information_list(){
      $user_id = $this->session->userdata('ch_user_id');
      $company_id = $this->session->userdata('ch_company_id');
      $roll_id = $this->session->userdata('roll_id');
      if($company_id){
        $data['party_list'] = $this->User_Model->get_list($company_id,'party_id','ASC','party');
      $this->load->view('User/party_information_list',$data);
    } else{
      header('location:'.base_url().'User');
    }
    }

    // Save Remark...
    public function save_party(){
      $user_id = $this->session->userdata('ch_user_id');
      $company_id = $this->session->userdata('ch_company_id');
      $roll_id = $this->session->userdata('roll_id');
      if($company_id){
        $party_name = $this->input->post('party_name');
        $data = array(
          'company_id' => $company_id,
          'party_name' => $this->input->post('party_name'),
          'party_type_id' => $this->input->post('party_type_id'),
          'address' => $this->input->post('address'),
          'city' => $this->input->post('city'),
          'pincode' => $this->input->post('pincode'),
          'state_name' => $this->input->post('state_name'),
          'state_code' => $this->input->post('state_code'),
          'phone_no' => $this->input->post('phone_no'),
          'mobile_no' => $this->input->post('mobile_no'),
          'gst_no' => $this->input->post('gst_no'),
          'pan_no' => $this->input->post('pan_no'),
          'vender_code' => $this->input->post('vender_code'),
        );
        $check = $this->User_Model->check_duplication($company_id,$party_name,'party_name','party');
        if($check){
          header('location:'.base_url().'User/party_information');
        }
        else{
          $this->User_Model->save_data('party', $data);
          header('location:'.base_url().'User/party_information_list');
        }
      } else{
        header('location:'.base_url().'User');
      }
    }



    //edit party ...
    public function edit_party($id){
      $user_id = $this->session->userdata('ch_user_id');
      $company_id = $this->session->userdata('ch_company_id');
      $roll_id = $this->session->userdata('roll_id');
      if($company_id){
        $party_info = $this->User_Model->get_party_info($company_id,$id);
        $data['party_list'] = $this->User_Model->get_party_list($company_id);
        $data['state_list'] = $this->User_Model->get_list1('state_id','ASC','state');
        if($party_info){
          foreach($party_info as $info){
            $data['update'] = 'update';
            $data['party_id'] = $info->party_id;
            $data['party_name'] = $info->party_name;
            $data['party_type_id'] = $info->party_type_id;
            $data['party_type_name'] = $info->party_type_name;
            $data['address'] = $info->address;
            $data['city'] = $info->city;
            $data['pincode'] = $info->pincode;
            $data['state_name'] = $info->state_name;
            $data['state_code'] = $info->state_code;
            $data['phone_no'] = $info->phone_no;
            $data['mobile_no'] = $info->mobile_no;
            $data['gst_no'] = $info->gst_no;
            $data['pan_no'] = $info->pan_no;
            $data['vender_code'] = $info->vender_code;
            $data['party_status'] = $info->party_status;

          }
          $this->load->view('User/party_information',$data);
        }
      } else{
        header('location:'.base_url().'Login');
      }
    }

    // Update Item Group ... DB...
  public function update_party(){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $party_id = $this->input->post('party_id');
      $data = array(
        'party_name' => $this->input->post('party_name'),
        'party_type_id' => $this->input->post('party_type_id'),
        'address' => $this->input->post('address'),
        'city' => $this->input->post('city'),
        'pincode' => $this->input->post('pincode'),
        'state_name' => $this->input->post('state_name'),
        'state_code' => $this->input->post('state_code'),
        'phone_no' => $this->input->post('phone_no'),
        'mobile_no' => $this->input->post('mobile_no'),
        'gst_no' => $this->input->post('gst_no'),
        'pan_no' => $this->input->post('pan_no'),
        'vender_code' => $this->input->post('vender_code'),
      );
      $this->User_Model->update_info('party_id', $party_id, 'party', $data);
      header('location:'.base_url().'User/party_information_list');
    } else{
      header('location:'.base_url().'Login');
    }
  }
  // Delete Item Group
  public function delete_party($id){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $this->User_Model->delete_info('party_id', $id, 'party');
      header('location:'.base_url().'User/party_information_list');
    } else{
      header('location:'.base_url().'Login');
    }
  }






  /************************** Vehicle Information *******************/
  // Add vehicle...
  public function vehicle_information(){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $this->load->view('User/vehicle_information');
    } else{
      header('location:'.base_url().'User');
    }
  }




  // Save vehicle...
  public function save_vehicle(){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $vehicle_number = $this->input->post('vehicle_number');
      $vehicle_owner = $this->input->post('vehicle_owner');
      $charges = $this->input->post('charges');
      $data = array(
        'company_id' => $company_id,
        'vehicle_number' => $this->input->post('vehicle_number'),
        'vehicle_owner' => $this->input->post('vehicle_owner'),
        'charges' => $this->input->post('charges'),
      );
      $check = $this->User_Model->check_duplication($company_id,$vehicle_number,'vehicle_number','vehicle');
      if($check){
        header('location:'.base_url().'User/vehicle_information');
      }
      else{
        $this->User_Model->save_data('vehicle', $data);
        header('location:'.base_url().'User/vehicle_information_list');
      }
    } else{
      header('location:'.base_url().'User');
    }
  }

// Vehicle List

  public function vehicle_information_list(){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $data['vehicle_list'] = $this->User_Model->get_list($company_id,'vehicle_id','ASC','vehicle');
      $this->load->view('User/vehicle_information_list',$data);
  } else{
    header('location:'.base_url().'User');
  }
  }

  //edit Item Group ...
  public function edit_vehicle($id){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $vehicle = $this->User_Model->get_info('vehicle_id', $id, 'vehicle');
      if($vehicle){
        foreach($vehicle as $info){
          $data['update'] = 'update';
          $data['vehicle_id'] = $info->vehicle_id;
          $data['vehicle_number'] = $info->vehicle_number;
          $data['vehicle_owner'] = $info->vehicle_owner;
          $data['charges'] = $info->charges;
          $data['vehicle_status'] = $info->vehicle_status;
        }
        $this->load->view('User/vehicle_information',$data);
      }
    } else{
      header('location:'.base_url().'Login');
    }
  }

  public function update_vehicle(){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $vehicle_id = $this->input->post('vehicle_id');
      $data = array(
        'vehicle_number' => $this->input->post('vehicle_number'),
        'vehicle_owner' => $this->input->post('vehicle_owner'),
        'charges' => $this->input->post('charges'),
      );
      $this->User_Model->update_info('vehicle_id', $vehicle_id, 'vehicle', $data);
      header('location:'.base_url().'User/vehicle_information_list');
    } else{
      header('location:'.base_url().'Login');
    }
  }

  public function delete_vehicle($id){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $this->User_Model->delete_info('vehicle_id', $id, 'vehicle');
      header('location:'.base_url().'User/vehicle_information_list');
    } else{
      header('location:'.base_url().'Login');
    }
  }




  public function remark_information(){
      $company_id = $this->session->userdata('ch_company_id');
        if($company_id == null){  header('location:'.base_url().'User');}
    $this->load->view('User/remark_information');
  }

  // List Remark
    public function remark_information_list(){
      $user_id = $this->session->userdata('ch_user_id');
      $company_id = $this->session->userdata('ch_company_id');
      $roll_id = $this->session->userdata('roll_id');
      if($company_id){
        $data['remark_list'] = $this->User_Model->get_list($company_id,'remark_id','ASC','remark');
        $this->load->view('User/remark_information_list',$data);
      } else{
        header('location:'.base_url().'User');
      }
    }

    // Save Remark...
    public function save_remark(){
      $user_id = $this->session->userdata('ch_user_id');
      $company_id = $this->session->userdata('ch_company_id');
      $roll_id = $this->session->userdata('roll_id');
      if($company_id){
        $remark_name = $this->input->post('remark_name');
        $data = array(
          'company_id' => $company_id,
          'remark_name' => $this->input->post('remark_name'),
        );
        $check = $this->User_Model->check_duplication($company_id,$remark_name,'remark_name','remark');
        if($check){
          header('location:'.base_url().'User/remark_information');
        }
        else{
          $this->User_Model->save_data('remark', $data);
          header('location:'.base_url().'User/remark_information_list');
        }
      } else{
        header('location:'.base_url().'User');
      }
    }

  // List Unit

    //edit remark ...
    public function edit_remark($id){
      $user_id = $this->session->userdata('ch_user_id');
      $company_id = $this->session->userdata('ch_company_id');
      $roll_id = $this->session->userdata('roll_id');
      if($company_id){
        $remark_info = $this->User_Model->get_info('remark_id', $id, 'remark');
        if($remark_info){
          foreach($remark_info as $info){
            $data['update'] = 'update';
            $data['remark_id'] = $info->remark_id;
            $data['remark_name'] = $info->remark_name;
            $data['remark_status'] = $info->remark_status;
          }
          $this->load->view('User/remark_information',$data);
        }
      } else{
        header('location:'.base_url().'Login');
      }
    }

    // Update Item Group ... DB...
  public function update_remark(){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $remark_id = $this->input->post('remark_id');
      $data = array(
        'remark_name' => $this->input->post('remark_name'),
      );
      $this->User_Model->update_info('remark_id', $remark_id, 'remark', $data);
      header('location:'.base_url().'User/remark_information_list');
    } else{
      header('location:'.base_url().'Login');
    }
  }
  // Delete Item Group
  public function delete_remark($id){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $this->User_Model->delete_info('remark_id', $id, 'remark');
      header('location:'.base_url().'User/remark_information_list');
    } else{
      header('location:'.base_url().'Login');
    }
  }








  // public function remark_information_list(){
  //   $this->load->view('User/remark_information_list');
  // }

  public function process_information(){
    $this->load->view('User/process_information');
  }

  public function process_information_list(){
    $this->load->view('User/process_information_list');
  }

  public function inword_information(){
    $this->load->view('User/inword_information');
  }

  public function inword_information_list(){
    $this->load->view('User/inword_information_list');
  }

  public function outword_information(){
    $this->load->view('User/outword_information');
  }

  public function outword_information_list(){
    $this->load->view('User/outword_information_list');
  }

  public function user_information(){
    $company_id = $this->session->userdata('ch_company_id');
      if($company_id == null){  header('location:'.base_url().'User');}
 $data['roll_list'] = $this->User_Model->get_list($company_id,'roll_id','ASC','user_roll');
  $this->load->view('User/user_information',$data);
  }

  // List Remark
    public function user_information_list(){
      $user_id = $this->session->userdata('ch_user_id');
      $company_id = $this->session->userdata('ch_company_id');
      $roll_id = $this->session->userdata('roll_id');
      if($company_id){
        $data['user_list'] = $this->User_Model->get_user_list($company_id);
        $this->load->view('User/user_information_list',$data);
      } else{
        header('location:'.base_url().'User');
      }
    }

    // Save Remark...
    public function save_user(){
      $user_id = $this->session->userdata('ch_user_id');
      $company_id = $this->session->userdata('ch_company_id');
      $roll_id = $this->session->userdata('roll_id');
      if($company_id){
        $user_name = $this->input->post('user_name');
        $data = array(
          'company_id' => $company_id,
          'user_name' => $this->input->post('user_name'),
          'user_mobile' => $this->input->post('user_mobile'),
          'user_password' => $this->input->post('user_password'),
          'roll_id' => $this->input->post('roll_id'),
        );
        $check = $this->User_Model->check_duplication($company_id,$user_name,'user_name','user');
        if($check){
          header('location:'.base_url().'User/user_information');
        }
        else{
          $this->User_Model->save_data('user', $data);
          header('location:'.base_url().'User/user_information_list');
        }
      } else{
        header('location:'.base_url().'User');
      }
    }



    //edit user ...
    public function edit_user($id){
      $user_id = $this->session->userdata('ch_user_id');
      $company_id = $this->session->userdata('ch_company_id');
      $roll_id = $this->session->userdata('roll_id');
      if($company_id){
        $user_info = $this->User_Model->get_info('user_id', $id, 'user');
        $data['roll_list'] = $this->User_Model->get_list($company_id,'roll_id','ASC','user_roll');
        if($user_info){
          foreach($user_info as $info){
            $data['update'] = 'update';
            $data['user_id'] = $info->user_id;
            $data['user_name'] = $info->user_name;
            $data['user_mobile'] = $info->user_mobile;
            $data['user_password'] = $info->user_password;
            $data['roll_id'] = $info->roll_id;
            $data['user_status'] = $info->user_status;
          }
          $this->load->view('User/user_information',$data);
        }
      } else{
        header('location:'.base_url().'Login');
      }
    }

    // Update Item Group ... DB...
  public function update_user(){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $user_id = $this->input->post('user_id');
      $data = array(
        'user_name' => $this->input->post('user_name'),
        'user_mobile' => $this->input->post('user_mobile'),
        'user_password' => $this->input->post('user_password'),
        'roll_id' => $this->input->post('roll_id'),
      );
      $this->User_Model->update_info('user_id', $user_id, 'user', $data);
      header('location:'.base_url().'User/user_information_list');
    } else{
      header('location:'.base_url().'Login');
    }
  }
  // Delete Item Group
  public function delete_user($id){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $this->User_Model->delete_info('user_id', $id, 'user');
      header('location:'.base_url().'User/user_information_list');
    } else{
      header('location:'.base_url().'Login');
    }
  }






  public function item_wise_stock_report(){
    $this->load->view('User/item_wise_stock_report');
  }
  public function vehicle_report(){
    $this->load->view('User/vehicle_report');
  }

  public function delivery_challan_receipt(){
    $this->load->view('User/delivery_challan');
  }

  public function delivery_challan_print(){
    $this->load->view('User/delivery_challan_print');
  }




}
?>
