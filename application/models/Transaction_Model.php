<?php
class Transaction_Model extends CI_Model{
  public function get_count_no($company_id, $field_name, $tbl_name){
    $query = $this->db->select('MAX('.$field_name.') as num')
    ->where('company_id', $company_id)
    ->where('is_delete', 0)
    ->from($tbl_name)
    ->get();
    $result =  $query->result_array();
    if($result){
      $old_num = $result[0]['num'];
    } else{
      $old_num = 0;
    }               //separating numeric part
    $value2 = $old_num + 1;                            //Incrementing numeric part
    // $value2 = "" . sprintf('%06s', $value2);               //concatenating incremented value
    return $value = $value2;
  }

  public function delete_set($id_type, $id, $tbl_name){
    $this->db->where($id_type, $id);
    $this->db->set('is_delete',1);
    $this->db->update($tbl_name);
  }

  public function GetItemByParty($company_id,$party_id){
    $this->db->select('*');
    $this->db->where('company_id',$company_id);
    if($party_id != null){
      $this->db->where('party_id',$party_id);
    }
    $this->db->from('item_info');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function GetItemInfo($company_id,$item_info_id){
    $this->db->select('item.*');
    $this->db->where('company_id',$company_id);
    $this->db->where('item_info_id',$item_info_id);
    $this->db->from('item_info');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }
/******************************* Inword ********************************/
  // Inword List...
  public function inword_list($company_id){
    $this->db->select('inword.*, party.*');
    $this->db->from('inword');
    $this->db->where('inword.company_id', $company_id);
    $this->db->where('inword.is_delete', 0);
    $this->db->join('party', 'inword.party_id = party.party_id', 'LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }
  public function check_inw_dup($inword_dc_num, $party_id, $check){
    $this->db->select('*');
    $this->db->from('inword');
    $this->db->where('inword_dc_num',$inword_dc_num);
    $this->db->where('is_delete',0);
    $this->db->where('party_id',$party_id);
    $query = $this->db->get();
    if($check == 'get_num_rows'){
      $num = $query->num_rows();
      return $num;
    }
    else{
      $result = $query->result();
      return $result;
    }
  }
  public function item_inword_stock($item_info_id){
    $this->db->select('SUM(bal_qty) as stock');
    $this->db->from('inword_details');
    $this->db->where('item_info_id',$item_info_id);
    $this->db->where('is_delete', 0);
    $query = $this->db->get();
    $result = $query->result_array();
    return $result[0]['stock'];
  }
  // Inword Item List...
  public function inword_item_for_out($item_info_id){
    $this->db->select('details.*, inword.*');
    $this->db->from('inword_details as details');
    $this->db->where('details.item_info_id',$item_info_id);
    $this->db->where('details.bal_qty >',0);
    $this->db->where('details.is_delete', 0);
    $this->db->order_by("str_to_date(inword.inword_date,'%d-%m-%Y')");
    $this->db->order_by("inword.inword_id",'ASC');
    $this->db->limit(1);
    $this->db->join('inword','inword.inword_id = details.inword_id');
    // $this->db->order_by(STR_TO_DATE(, '%d/%m/%Y'))
    $query = $this->db->get();
    $q = $this->db->last_query();
    $result = $query->result_array();
    return $result;
  }

  // Outword List...
  // Inword List...
  public function outword_list($company_id){
    $this->db->select('outword.*, party.*');
    $this->db->from('outword');
    $this->db->where('outword.company_id', $company_id);
    $this->db->where('outword.is_delete', 0);
    $this->db->join('party', 'outword.party_id = party.party_id', 'LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }
  public function get_outword_info($outword_id){
    $this->db->select('outword.*, party.*,vehicle.*,details.*,item.*,remark.remark_name');
    $this->db->from('outword');
    $this->db->where('outword.outword_id', $outword_id);
    $this->db->join('party', 'outword.party_id = party.party_id', 'LEFT');
    $this->db->join('vehicle', 'outword.vehicle_id = vehicle.vehicle_id', 'LEFT');
    $this->db->join('outword_details as details', 'outword.outword_id = details.outword_id', 'LEFT');
    $this->db->join('item_info as item', 'details.item_info_id = item.item_info_id', 'LEFT');
    $this->db->join('remark', 'details.remark_id = remark.remark_id', 'LEFT');

    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function inword_ref_list($outword_details_id){
    $this->db->select('*');
    $this->db->where('outword_details_id',$outword_details_id);
    // $this->db->where('is_delete', 0);
    $this->db->from('outword_ref');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function details_list($field,$id,$table){
    $this->db->select('*');
    $this->db->where($field,$id);
    $this->db->where('is_delete', 0);
    $this->db->from($table);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }


  // Report....
  public function report_inword_ref_list($outword_details_id){
    $this->db->select('outword_ref.*,item_info.*,inword.*,inword_details.*');
    $this->db->from('outword_ref');
    $this->db->where('outword_ref.outword_details_id',$outword_details_id);
    $this->db->join('item_info','outword_ref.item_info_id = item_info.item_info_id', 'LEFT');
    $this->db->join('inword','outword_ref.inword_id = inword.inword_id', 'LEFT');
    $this->db->join('inword_details','outword_ref.inword_details_id = inword_details.inword_details_id', 'LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function outward_ref_list($outword_id){
    $this->db->select('outword_ref.*,inword.*');
    $this->db->where('outword_ref.outword_id',$outword_id);
    $this->db->from('outword_ref');
    $this->db->join('inword','outword_ref.inword_id = inword.inword_id', 'LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }
}
?>
