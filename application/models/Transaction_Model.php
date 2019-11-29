<?php
class Transaction_Model extends CI_Model{
  public function get_count_no($company_id, $field_name, $tbl_name){
    $query = $this->db->select('MAX('.$field_name.') as num')
    ->where('company_id', $company_id)
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

  // Inword List...
  public function inword_list($company_id){
    $this->db->select('inword.*, party.*');
    $this->db->from('inword');
    $this->db->where('inword.company_id', $company_id);
    $this->db->join('party', 'inword.party_id = party.party_id', 'LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }
  public function item_inword_stock($item_info_id){
    $this->db->select('SUM(bal_qty) as stock');
    $this->db->from('inword_details');
    $this->db->where('item_info_id',$item_info_id);
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
    $this->db->order_by("str_to_date(inword.inword_date, '%d-%m-%Y')");
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
    $this->db->join('party', 'outword.party_id = party.party_id', 'LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function details_list($field,$id,$table){
    $query = $this->db->select('*')
            ->where($field,$id)
            ->from($table)
            ->get();
    $result = $query->result();
    return $result;
  }
}
?>
