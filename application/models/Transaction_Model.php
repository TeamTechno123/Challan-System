<?php
class Transaction_Model extends CI_Model{
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
    $this->db->select('*');
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
}
?>
