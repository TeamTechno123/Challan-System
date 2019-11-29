<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Report extends CI_Controller{
    public function __construct(){
    parent::__construct();
    $this->load->model('User_Model');
  }

  public function item_wise_stock_report(){
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Report/item_wise_stock_report');
    $this->load->view('Include/footer');
  }
  public function vehicle_report(){
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Report/vehicle_report');
    $this->load->view('Include/footer');
  }

  public function delivery_challan_receipt(){
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Report/delivery_challan');
    $this->load->view('Include/footer');
  }

  public function delivery_challan_print(){
    $this->load->view('Report/delivery_challan_print');
  }


}