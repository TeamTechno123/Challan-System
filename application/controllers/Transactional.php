<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactional extends CI_Controller{

  // Transaction...

  public function enquiry_form(){
    $this->load->view('Admin/enquiry_form');
  }
  public function add_enquiry(){
    $this->load->view('Admin/add_enquiry');
  }
  public function delivery_challan(){
    $this->load->view('Admin/delivery_challan');
  }

 // dhananjay....
 public function purchase_agreement(){
   $this->load->view('Admin/purchase_agrement');
 }

 public function sale_bill(){
   $this->load->view('Admin/sale_entry');
 }
 public function govt_stamp_bill(){
   $this->load->view('Admin/govt_stamping_bill');
 }
 public function repairy_bill(){
   $this->load->view('Admin/repairy_bill');
 }

 public function quotation(){
   $this->load->view('Admin/quotation');
 }
 public function receipt(){
   $this->load->view('Admin/receipt');
 }
 public function expense_voucher(){
   $this->load->view('Admin/expense_voucher');
 }

 public function complaint_information(){
   $this->load->view('Admin/complaint_information');
 }


}
