<?php
class Report_Model extends CI_Model{
  public function inword_item_list($company_id,$from_date,$to_date,$party_id,$item_info_id){
    $this->db->select('inword_details.*,inword.*,item_info.*,remark.*');
    $this->db->from('inword_details');
    $this->db->where('inword.company_id', $company_id);
    $this->db->where('inword.party_id', $party_id);
    $this->db->where('inword_details.item_info_id', $item_info_id);
    $this->db->where('inword_details.is_delete', 0);
    $this->db->where("str_to_date(inword.inword_date,'%d-%m-%Y') BETWEEN str_to_date('$from_date','%d-%m-%Y') AND str_to_date('$to_date','%d-%m-%Y')");
    $this->db->join('inword', 'inword_details.inword_id = inword.inword_id', 'LEFT');
    $this->db->join('item_info', 'inword_details.item_info_id = item_info.item_info_id', 'LEFT');
    $this->db->join('remark', 'inword_details.remark_id = remark.remark_id', 'LEFT');
    $query = $this->db->get();
    // $q = $this->db->last_query();
    $result = $query->result();
    return $result;
  }

  public function outword_item_list($company_id,$from_date,$to_date,$party_id,$item_info_id){
    $this->db->select('outword_details.*,outword.*,item_info.*,remark.*');
    $this->db->from('outword_details');
    $this->db->where('outword.company_id', $company_id);
    $this->db->where('outword.party_id', $party_id);
    $this->db->where('outword_details.item_info_id', $item_info_id);
    $this->db->where('outword_details.is_delete', 0);
    $this->db->where("str_to_date(outword.outword_date,'%d-%m-%Y') BETWEEN str_to_date('$from_date','%d-%m-%Y') AND str_to_date('$to_date','%d-%m-%Y')");
    $this->db->join('outword', 'outword_details.outword_id = outword.outword_id', 'LEFT');
    $this->db->join('item_info', 'outword_details.item_info_id = item_info.item_info_id', 'LEFT');
    $this->db->join('remark', 'outword_details.remark_id = remark.remark_id', 'LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  // public function item_opening_bal($company_id,$from_date,$party_id,$item_info_id){
  //   $this->db->select('SUM(inword_details.bal_qty) as item_opening_bal');
  //   $this->db->from('inword_details');
  //   $this->db->where('inword.company_id', $company_id);
  //   $this->db->where('inword.party_id', $party_id);
  //   $this->db->where('inword_details.item_info_id', $item_info_id);
  //   $this->db->where('inword_details.is_delete', 0);
  //   $this->db->where("str_to_date(`inword`.inword_date,'%d-%m-%Y') < str_to_date('$from_date','%d-%m-%Y')");
  //   $this->db->join('inword', 'inword_details.inword_id = inword.inword_id', 'LEFT');
  //   $query = $this->db->get();
  //   $result = $query->result_array();
  //   return $result[0]['item_opening_bal'];
  // }

  public function inword_opening_bal($company_id,$from_date,$party_id,$item_info_id){
    $this->db->select('SUM(inword_details.qty) as inword_opening_bal');
    $this->db->from('inword_details');
    $this->db->where('inword.company_id', $company_id);
    $this->db->where('inword.party_id', $party_id);
    $this->db->where('inword_details.item_info_id', $item_info_id);
    $this->db->where('inword_details.is_delete', 0);
    $this->db->where("str_to_date(`inword`.inword_date,'%d-%m-%Y') < str_to_date('$from_date','%d-%m-%Y')");
    $this->db->join('inword', 'inword_details.inword_id = inword.inword_id', 'LEFT');
    $query = $this->db->get();
    $result = $query->result_array();
    // $q = $this->db->last_query();
    return $result[0]['inword_opening_bal'];
    // return $q;
  }
  public function outword_opening_bal($company_id,$from_date,$party_id,$item_info_id){
    $this->db->select('SUM(outword_details.qty) as outword_opening_bal');
    $this->db->from('outword_details');
    $this->db->where('outword.company_id', $company_id);
    $this->db->where('outword.party_id', $party_id);
    $this->db->where('outword_details.item_info_id', $item_info_id);
    $this->db->where('outword_details.is_delete', 0);
    $this->db->where("str_to_date(outword.outword_date,'%d-%m-%Y') < str_to_date('$from_date','%d-%m-%Y') ");
    $this->db->join('outword', 'outword_details.outword_id = outword.outword_id', 'LEFT');
    $this->db->join('item_info', 'outword_details.item_info_id = item_info.item_info_id', 'LEFT');
    // $this->db->join('remark', 'outword_details.remark_id = remark.remark_id', 'LEFT');
    $query = $this->db->get();
    $result = $query->result_array();
    // $q = $this->db->last_query();
    return $result[0]['outword_opening_bal'];
    // return $q;
  }



  public function inword_by_remark($company_id,$from_date,$to_date,$party_id,$item_info_id){
    $this->db->select('SUM(inword_details.qty) as inword_by_remark,remark.remark_name');
    $this->db->from('inword_details');
    $this->db->where('inword.company_id', $company_id);
    $this->db->where('inword.party_id', $party_id);
    $this->db->where('inword_details.item_info_id', $item_info_id);
    $this->db->where('inword_details.is_delete', 0);
    $this->db->group_by('inword_details.remark_id');
    $this->db->where("str_to_date(inword.inword_date,'%d-%m-%Y') BETWEEN str_to_date('$from_date','%d-%m-%Y') AND str_to_date('$to_date','%d-%m-%Y')");
    $this->db->join('inword', 'inword_details.inword_id = inword.inword_id', 'LEFT');
    $this->db->join('remark', 'inword_details.remark_id = remark.remark_id', 'LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function outword_by_remark($company_id,$from_date,$to_date,$party_id,$item_info_id){
    $this->db->select('SUM(outword_details.qty) as outword_by_remark,remark.remark_name');
    $this->db->from('outword_details');
    $this->db->where('outword.company_id', $company_id);
    $this->db->where('outword.party_id', $party_id);
    $this->db->where('outword_details.item_info_id', $item_info_id);
    $this->db->where('outword_details.is_delete', 0);
    $this->db->group_by('outword_details.remark_id');
    $this->db->where("str_to_date(outword.outword_date,'%d-%m-%Y') BETWEEN str_to_date('$from_date','%d-%m-%Y') AND str_to_date('$to_date','%d-%m-%Y')");
    $this->db->join('outword', 'outword_details.outword_id = outword.outword_id', 'LEFT');
    $this->db->join('remark', 'outword_details.remark_id = remark.remark_id', 'LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  /************************ Vehicle *********************/
  public function veh_inword_item_list($company_id,$from_date,$to_date,$vehicle_id){
    $this->db->select('inword_details.*,inword.*,vehicle.*,item_info.*');
    $this->db->from('inword_details');
    $this->db->where('inword.company_id', $company_id);
    $this->db->where('inword.vehicle_id', $vehicle_id);
    $this->db->where('inword_details.is_delete', 0);
    $this->db->where("str_to_date(inword.inword_date,'%d-%m-%Y') BETWEEN str_to_date('$from_date','%d-%m-%Y') AND str_to_date('$to_date','%d-%m-%Y')");

    $this->db->join('item_info', 'inword_details.item_info_id = item_info.item_info_id', 'LEFT');
    $this->db->join('inword', 'inword_details.inword_id = inword.inword_id', 'LEFT');
    $this->db->join('vehicle', 'inword.vehicle_id = vehicle.vehicle_id', 'LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function veh_outword_item_list($company_id,$from_date,$to_date,$vehicle_id){
    $this->db->select('outword_details.*,outword.*,vehicle.*,item_info.*');
    $this->db->from('outword_details');
    $this->db->where('outword.company_id', $company_id);
    $this->db->where('outword.vehicle_id', $vehicle_id);
    $this->db->where('outword_details.is_delete', 0);
    $this->db->where("str_to_date(outword.outword_date,'%d-%m-%Y') BETWEEN str_to_date('$from_date','%d-%m-%Y') AND str_to_date('$to_date','%d-%m-%Y')");

    $this->db->join('item_info', 'outword_details.item_info_id = item_info.item_info_id', 'LEFT');
    $this->db->join('outword', 'outword_details.outword_id = outword.outword_id', 'LEFT');
    $this->db->join('vehicle', 'outword.vehicle_id = vehicle.vehicle_id', 'LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  /******************** CI **************************/
  public function ci_out_item_list($company_id,$from_date,$to_date,$party_id,$item_info_id){
    $this->db->select('outword_details.*,outword.*,item_info.*');
    $this->db->from('outword_details');
    $this->db->where('outword.company_id', $company_id);
    $this->db->where('outword.party_id', $party_id);
    $this->db->where('outword_details.is_delete', 0);
    $this->db->where('outword_details.item_info_id', $item_info_id);
    $this->db->where("str_to_date(outword.outword_date,'%d-%m-%Y') BETWEEN str_to_date('$from_date','%d-%m-%Y') AND str_to_date('$to_date','%d-%m-%Y')");

    $this->db->join('item_info', 'outword_details.item_info_id = item_info.item_info_id', 'LEFT');
    $this->db->join('outword', 'outword_details.outword_id = outword.outword_id', 'LEFT');
    $query = $this->db->get();
    // $q = $this->db->last_query();
    $result = $query->result();
    return $result;
  }
}
?>
