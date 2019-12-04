<!DOCTYPE html>
<html>
<?php
$page = "Vehicle_report";
?>
<!-- <style>

  td{
    padding:2px 10px !important;
  }
  table{
    /* overflow: hidden; */
  }
  /* th, td { min-width:200px; } */
  td{
    padding:2px 10px !important;
      border: 1px solid #000!important;
      text-align: center;
  }
  th, tr{
      text-align: center;
    border: 1px solid #000!important;
  }
  p{
    margin-bottom: 5px;
  }
  .sr_no, .td_btn{
    min-width:50px !important;
  }
  .td_w{
    min-width:100px !important;
  }
  html, body, .row{
    overflow-x: hidden;
  }
</style> -->
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 mt-1 text-center">
            <h4>VEHICLE REPORTS</h4>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
            <!-- <div class="card-header">
              <h3 class="card-title"><i class="fa fa-list"></i> List Party Information</h3>
              <div class="card-tools">
                <a href="party_information" class="btn btn-sm btn-block btn-primary">Add Party</a>
              </div>
            </div> -->
            <!-- /.card-header -->
            <div class="card-body" >
              <form role="form" method="post" autocomplete="off">
                <div class="card-body row">
                  <div class="form-group col-md-4 offset-md-2">
                    <input type="text" class="form-control form-control-sm" name="from_date" id="date1" data-target="#date1" data-toggle="datetimepicker" title="From Date" placeholder="From Date" required>
                    <label class="text-red"> <?php echo form_error('from_date'); ?> </label>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control form-control-sm" name="to_date" id="date2" data-target="#date2" data-toggle="datetimepicker" title="To Date"  placeholder="To Date" required>
                    <label class="text-red"> <?php echo form_error('from_date'); ?> </label>
                  </div>
                  <div class="form-group col-md-4 offset-md-2">
                    <select class="form-control select2 form-control-sm" title="Select Vehicle" name="vehicle_id" id="vehicle_id" required>
                      <option selected="selected" value="" >Select Vehicle </option>
                      <?php foreach ($vehicle_list as $vehicle_list1) { ?>
                        <option value="<?php echo $vehicle_list1->vehicle_id; ?>" ><?php echo $vehicle_list1->vehicle_number; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-md-10 w-100 text-right mb-3">
                      <button type="submit" class="btn btn-success btn-sm">View</button>
                      <button type="submit" class="btn btn-default btn-sm ml-4">Cancel</button>
                  </div>
                </form>

                <?php if(isset($vehicle_report)){ ?>
                  <div class="w-100">
                  <section class="invoice w-100" id="print_invoice">
                    <div class="row">
                      <p style=" width:100%; text-align:center; margin-bottom: 10px; font-size:16px; text-transform:uppercase;"> <b>Vehicle Report</b>  </p>
                    </div>
                    <table class="table table-bordered mb-0 invoice-table"  width="100%">
                      <style media="print">
                        table{
                          border-collapse: collapse;
                        }
                        .invoice-table td{
                          Width:33% !important;
                          border: 1px solid #555!important;
                        }
                        .invoice-table{
                          margin-bottom:0px;
                          border: 1px solid #555!important;
                        }
                        .invoice-table p{
                          line-height: 15px;
                        }
                        .mx-auto{
                          margin-left: auto;
                          margin-right: auto;
                        }
                        p{
                          margin-bottom: 5px!important;
                            margin-top: 5px!important;
                        }
                        td{
                          padding-left: 8px;
                        }
                      </style>

                      <style media="screen">
                        table{
                          border-collapse: collapse;
                        }
                        .invoice-table td{
                          border: 1px solid #555!important;
                        }
                        .invoice-table{
                          margin-bottom:0px;
                          border: 1px solid #555!important;
                        }
                        .invoice-table p{
                          line-height: 15px;
                        }
                        .mx-auto{
                          margin-left: auto;
                          margin-right: auto;
                        }
                        p{
                          margin-bottom: 5px!important;
                          margin-top: 5px!important;
                        }
                        td{
                          padding-left: 8px;
                        }
                      </style>

                      <tr>
                        <td colspan="8">
                          <div class="row">
                            <div class="col-md-12 text-center pt-2 pb-2 text-center">
                              <h3  style="text-align: center; font-family: 'Arial Black', 'Arial Bold', Gadget, sans-serif;  font-size:26px; margin-top: 0px; margin-bottom: 5px;font-weight:bold; text-transform:uppercase;">
                                <?php echo $company_name; ?>
                              </h3>
                              <p   style="text-align: center; font-size:16px; ">
                                  <?php echo $company_address; ?>
                              </p>
                              <!-- <p  style="font-size:16px; " >Ph No. 0231-2646189</p> -->
                              <p  style="text-align: center; margin-bottom:5px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px;">
                                 Mobile No: <?php echo $company_mob1; ?> &nbsp; | &nbsp; Email : <?php echo $company_email; ?>
                               </p>
                              <p  style="text-align: center; margin-bottom:5px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px;">
                                 GST No:  <?php echo $company_gst_no; ?>
                               </p>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="6"> <p style="text-align:center;"> <b>Vehicle Report</b>   : From <?php echo $from_date.' To '.$to_date; ?></p> </td>
                      </tr>
                      <tr>
                        <td colspan="6"> <p> <b>Vehicle Number </b>   : <?php echo $vehicle_number; ?></p> </td>
                      </tr>
                      </table>


                      <div class="row">
                      <div class="col-12 table-responsive">
                      <table class="table table-botttom"  width="100%">
                      <style media="print">
                        .table-bottom {
                        border-collapse: collapse!important;
                          Width:100%!important;
                        }
                        .table-bottom, tr, td, th{
                        border: 1px solid #000;
                        margin-left: auto;
                        margin-right: auto;
                        padding: 5px;
                        }
                      </style>
                      <style media="screen">
                        .table-bottom {
                        border-collapse: collapse!important;
                          Width:100%!important;
                        }

                        .table-bottom, tr, td, th{
                        border: 1px solid #000;
                        margin-left: auto;
                        margin-right: auto;
                        padding: 5px;
                        }
                      </style>
                      <thead>
                        <tr style="border-top:0px;">
                          <th colspan="5" width="50%" style="border-top:0px;" >Inward Section</th>
                          <th colspan="5" width="50%" style="border-top:0px;" >Outward Section</th>
                        </tr>
                      </thead>


                      <tbody>
                        <tr >
                          <td colspan="5" style="padding:0px;" valign="top">
                            <table style="width:100%;  border-bottom:0px;">
                              <thead>
                                <tr style="border:0px;">
                                  <th style="border-top:0px; border-left:0px;" >In No.</th>
                                  <th style="border-top:0px;">Date</th>
                                  <th style="border-top:0px;">Item Name</th>
                                  <th style="border-top:0px;">QTY</th>
                                  <th style="border-top:0px; border-right:0px;">No Of Trip</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                $i = 0;
                                $tot_inword = 0;
                                foreach ($veh_inword_item_list as $veh_inword_item_list) {
                                $i++;
                                $in_trip = $veh_inword_item_list->inword_trip;
                                $tot_inword = $tot_inword + $in_trip;
                                ?>
                                  <tr style="border:0px;">
                                    <td style="  text-align: center; border-left:0px; "><?php echo $veh_inword_item_list->inword_dc_num;  ?></td>
                                    <td style="  text-align: center; "><?php echo $veh_inword_item_list->inword_date;  ?></td>
                                    <td style="  text-align: center; "><?php echo $veh_inword_item_list->item_info_name;  ?></td>
                                    <td style="  text-align: center; border-right:0px; "><?php echo $veh_inword_item_list->qty;  ?></td>
                                    <td style="  text-align: center; border-right:0px; "><?php echo $veh_inword_item_list->inword_trip;  ?></td>
                                  </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </td>
                          <td colspan="5" style="padding:0px;"  valign="top">
                            <table style="width:100%; border-top:0px; border-bottom:0px;">
                              <thead>
                                <tr style="border:0px;">
                                  <th style="border-top:0px; border-left:0px;" >Out No.</th>
                                  <th style="border-top:0px;">Date</th>
                                  <th style="border-top:0px;">Item Name</th>
                                  <th style="border-top:0px;">QTY</th>
                                  <th style="border-top:0px; border-right:0px;">No Of Trip</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                $i = 0;
                                $tot_outword = 0;
                                foreach ($veh_outword_item_list as $veh_outword_item_list) {
                                $i++;
                                $out_trip = $veh_outword_item_list->outword_trip;;
                                $tot_outword = $tot_outword + $out_trip;
                                ?>
                                <tr style="border:0px;">
                                  <td style="  text-align: center; border-left:0px;"><?php echo $veh_outword_item_list->outword_dc_num;  ?></td>
                                  <td style="  text-align: center;"><?php echo $veh_outword_item_list->outword_date;  ?></td>
                                  <td style="  text-align: center;"><?php echo $veh_outword_item_list->item_info_name;  ?></td>
                                  <td style="  text-align: center; border-right:0px;"><?php echo $veh_outword_item_list->qty;  ?></td>
                                  <td style="  text-align: center; border-right:0px;"><?php echo $veh_outword_item_list->outword_trip;  ?></td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      <tr style="border-top:0px;">
                        <td style="border-top:0px;" colspan="5" valign="top">
                          <p> <b>Total Inward Trip</b> : <?php echo $tot_inword; ?> </p>

                         </td>
                        <td style="border-top:0px;" colspan="5" valign="top">
                          <p> <b>Total Outward Trip</b> : <?php echo $tot_outword; ?> </p>

                        </td>
                      </tr>
                    </tbody>
                  </table>
                          <!-- /.row -->
                    </section>
                    <div class="row no-print mt-3 w-100">
                      <div class="col-12">
                        <!-- <a href="<?php echo base_url() ?>Report/stock_report_print" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> -->
                        <a onclick='printDiv();' class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                      </div>
                    </div>
                    </div>
                <?php } ?>




                    <!-- this row will not appear when printing -->


                  </div>
                  <!-- /.card-body -->
                </div>
          <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>

  <script type="text/javascript">
    // Get Item Info on Select...
    $("#party_id").on("change", function(){
      var party_id = $(this).val();
      $.ajax({
        url: '<?php echo base_url(); ?>Transaction/GetItemByParty',
        type: "POST",
        data: {"party_id":party_id},
        context: this,
        success: function (result) {
          $('#item_info_id').html(result);
        }
      });
    });

    function printDiv()
    {
      var divToPrint=document.getElementById('print_invoice');
      var newWin=window.open('','Print-Window');
      newWin.document.open();
      newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
      newWin.document.close();
      setTimeout(function(){newWin.close();},10);
    }
  </script>
</body>
</html>
