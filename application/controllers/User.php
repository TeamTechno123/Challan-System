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




  public function company_information(){
    $this->load->view('User/company_information');
  }

  public function item_information_list(){
    $this->load->view('User/item_information_list');
  }

  public function item_information(){
    $this->load->view('User/item_information');
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





  public function party_information(){
    $this->load->view('User/party_information');
  }

  public function party_information_list(){
    $this->load->view('User/party_information_list');
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
        header('location:'.base_url().'User/item_group_information');
      }
      else{
        $this->User_Model->save_data('vehicle', $data);
        header('location:'.base_url().'User/item_group_information_list');
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



  public function remark_information(){
    $this->load->view('User/remark_information');
  }

  public function remark_information_list(){
    $this->load->view('User/remark_information_list');
  }

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
    $this->load->view('User/user_information');
  }

  public function user_information_list(){
    $this->load->view('User/user_information_list');
  }



  public function item_wise_stock_report(){
    $this->load->view('User/item_wise_stock_report');
  }
  public function vehicle_report(){
    $this->load->view('User/vehicle_report');
  }


}
?>
