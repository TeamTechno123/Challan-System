<?php
class User_Model extends CI_Model{

  function check_login($email, $password){
    $query = $this->db->select('*')
        ->where('user_email', $email)
        ->where('user_password', $password)
        ->from('user')
        ->get();
      $result = $query->result_array();
      return $result;
  }

  public function get_count($id_type,$company_id,$key,$tbl_name){
    $this->db->select($id_type);
    if($key != ''){
      $this->db->where('application_status', $key);
    }
    $this->db->where('company_id', $company_id);
    $this->db->from($tbl_name);
      $query =  $this->db->get();
    $result = $query->num_rows();
    return $result;
  }

  public function save_data($tbl_name, $data){
    $this->db->insert($tbl_name, $data);
    $insert_id = $this->db->insert_id();
    return  $insert_id;
  }

  public function get_list($company_id,$id,$order,$tbl_name){
    $query = $this->db->select('*')
            ->where('company_id', $company_id)
            ->order_by($id, $order)
            ->from($tbl_name)
            ->get();
    $result = $query->result();
    return $result;
  }

  public function get_list1($id,$order,$tbl_name){
    $query = $this->db->select('*')
            ->order_by($id, $order)
            ->from($tbl_name)
            ->get();
    $result = $query->result();
    return $result;
  }

  public function get_info($id_type, $id, $tbl_name){
    $query = $this->db->select('*')
            ->where($id_type, $id)
            ->from($tbl_name)
            ->get();
    $result = $query->result();
    return $result;
  }

  public function update_info($id_type, $id, $tbl_name, $data){
    $this->db->where($id_type, $id)
    ->update($tbl_name, $data);
  }

  public function delete_info($id_type, $id, $tbl_name){
    $this->db->where($id_type, $id)
    ->delete($tbl_name);
  }

  public function check_duplication($company_id,$value,$field_name,$table_name){
    $query = $this->db->select($field_name)
      ->where('company_id', $company_id)
      ->where($field_name,$value)
      ->from($table_name)
      ->get();
    $result = $query->result();
    return $result;
  }



  public function get_user_list($company_id){
  $query = $this->db->select('user.*, roll.*')
  ->from('user as user')
  ->where('user.company_id', $company_id)
   ->join('user_roll as roll', 'user.roll_id = roll.roll_id', 'LEFT')
   ->get();
   $result = $query->result();
   return $result;
}

public function get_party_info($company_id,$id){
$query = $this->db->select('party.*, party_type.*')
->from('party as party')
->where('party.company_id', $company_id)
->where('party.party_id', $id)
 ->join('party_type as party_type', 'party.party_type_id = party_type.party_type_id', 'LEFT')
 ->get();
 $result = $query->result();
 return $result;
}

public function get_party_list($company_id){
$query = $this->db->select('party.*, party_type.*')
->from('party_type as party')
->where('party_type.company_id', $company_id)
 ->join('party_type as party_type', 'party.party_type_id = party_type.party_type_id', 'LEFT')
 ->get();
 $result = $query->result();
 return $result;
}

public function get_item_list($company_id){
$query = $this->db->select('item_info.*, party.*')
->from('item_info as item_info')
->where('item_info.company_id', $company_id)
 ->join('party as party', 'item_info.party_id = party.party_id', 'LEFT')
 ->get();
 $result = $query->result();
 return $result;
}

  public function get_item_details($company_id, $id){
    $query = $this->db->select('item_info.*, party.*,gst.*')
    ->from('item_info as item_info')
    ->where('item_info.company_id', $company_id)
    ->where('item_info.item_info_id', $id)
    ->join('party as party', 'item_info.party_id = party.party_id', 'LEFT')
    ->join('gst', 'item_info.gst_slab = gst.gst_id', 'LEFT')
    ->get();
    $result = $query->result();
    return $result;
  }

  public function user_info($user_id){
    $this->db->select('user_name,user_mobile,user_id');
    $this->db->where('user_id',$user_id);
    $this->db->from('user');
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }
}
?>
