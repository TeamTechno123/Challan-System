<!DOCTYPE html>
<html>
<?php
$page = "party_list";
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 mt-1 text-center">
            <h4>OUTWORD BIF REPORT</h4>
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
                    <select class="form-control select2 form-control-sm" title="Select Party" name="party_id" id="party_id" required>
                      <option selected="selected" value="" >Select Party Name </option>
                      <?php foreach ($party_list as $party_list1) { ?>
                        <option value="<?php echo $party_list1->party_id; ?>" <?php if(isset($party_id)){ if($party_list1->party_id == $party_id){ echo "selected"; } }  ?>><?php echo $party_list1->party_name; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4 ">
                    <select class="form-control select2 form-control-sm" title="Select Item" name="item_info_id" id="item_info_id" required>
                      <option selected="selected">Select Item</option>
                    </select>
                  </div>
                  <div class="col-md-10 w-100 text-right mb-3">
                      <button type="submit" class="btn btn-success btn-sm">View</button>
                      <button type="submit" class="btn btn-default btn-sm ml-4">Cancel</button>
                  </div>
                </form>

                  <?php if(isset($item_wise_stock)){ ?>
                    <section style="width:100%;" class="invoice" id="print_invoice">
                      <!-- title row -->
                      <div style="width:100%;" class="row">
                        <p style="width:100%; text-align:center; margin-bottom: 10px; font-size:16px; text-transform:uppercase;"> <b>Outword BIF Report</b>  </p>
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
                        <!-- <td width="20%" style="border-right:0px!important;">  <img class="" src="<?php echo base_url(); ?>assets/images/universal.png" width="150" height="100" alt=""></td> -->
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
                        <td colspan="8">
                          <p style="text-align:center;">
                           <b>Stock Report</b>   : From <?php echo $from_date.' To '.$to_date; ?>
                         </p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="8"> <p> <b>Item Name </b>   : <?php echo $item_info_name.' {'.$hsn_code.'}'; ?></p> </td>
                      </tr>
                      <tr>
                        <td width="50%" colspan="4"> <p> <b>Opening Balance</b>   : <?php if($item_opening_bal == ''){ echo 0; }else{ echo $item_opening_bal; }  ?></p> </td>
                        <td width="50%" colspan="4"> <p> <b>Closing Balance</b>   : <span class="close_bal"></span></p> </td>
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
                            <!-- <th colspan="4" width="50%" style="border-top:0px;" >Inward Section</th> -->
                            <th colspan="8" width="50%" style="border-top:0px;" >Outward Section</th>
                          </tr>
                          </thead>
                        <tbody>
                          <tr >
                            <!-- <td colspan="4" style="padding:0px;" valign="top">
                              <table style="width:100%;  border-bottom:0px;">
                                <thead>
                                  <tr style="border:0px;">
                                    <th style="border-top:0px; border-left:0px;">In No.</th>
                                    <th style="border-top:0px;">Date</th>
                                    <th style="border-top:0px;">QTY</th>
                                    <th style="border-top:0px; border-right:0px;">Remark</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $i = 0;
                                  $tot_inword = 0;
                                  foreach ($inword_item_list as $inword_item_list) {
                                  $i++;
                                  $in_qty = $inword_item_list->qty;
                                  $tot_inword = $tot_inword + $in_qty;
                                  ?>
                                    <tr style="border:0px;">
                                      <td style="  text-align: center; border-left:0px; border-bottom:0px;"><?php echo $inword_item_list->inword_dc_num;  ?></td>
                                      <td style="  text-align: center; border-bottom:0px;"><?php echo $inword_item_list->inword_date;  ?></td>
                                      <td style="  text-align: center; border-bottom:0px;"><?php echo $inword_item_list->qty;  ?></td>
                                      <td style="  text-align: center; border-right:0px; border-bottom:0px;"><?php echo $inword_item_list->remark_name;  ?></td>
                                    </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </td> -->
                            <td colspan="8" style="padding:0px;"  valign="top">
                              <table style="width:100%; border-top:0px; border-bottom:0px;">
                                <thead>
                                  <tr style="border:0px;">
                                    <th style="border-top:0px; border-left:0px;">DC No.</th>
                                    <th style="border-top:0px;">Date</th>
                                    <th style="border-top:0px;">QTY</th>
                                    <th style="border-top:0px;">Inward Ref</th>
                                    <th style="border-top:0px; border-right:0px;">Remark</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $i = 0;
                                  $tot_outword = 0;
                                  foreach ($outword_item_list as $outword_item_list) {
                                  $i++;
                                  $out_qty = $outword_item_list->qty;
                                  $outword_id = $outword_item_list->outword_id;
                                  $tot_outword = $tot_outword + $out_qty;
                                  ?>
                                    <tr style="border:0px;">
                                      <td style=" text-align: center; border-left:0px; "><?php echo $outword_item_list->outword_dc_num;  ?></td>
                                      <td style=" text-align: center; "><?php echo $outword_item_list->outword_date;  ?></td>
                                      <td style=" text-align: center; "><?php echo $outword_item_list->qty;  ?></td>
                                      <td style=" text-align: center; ">
                                        <!-- <table> -->
                                        <p style="text-align:left;">
                                          <?php echo 'Inw no. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; ?>
                                          <?php echo 'Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; ?>
                                          <?php echo 'Qty &nbsp;&nbsp;&nbsp;'; ?>
                                        </p>
                                        <?php
                                        $ref_list = $this->Transaction_Model->outward_ref_list($outword_id);
                                        foreach ($ref_list as $ref_list) { ?>
                                          <p style="text-align:left;">
                                            <?php echo $ref_list->inword_id.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; ?>
                                            <?php echo $ref_list->inword_date.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; ?>
                                            <?php echo $ref_list->qty_used.' &nbsp;&nbsp;&nbsp;'; ?>
                                          </p>
                                            <!-- <tr> -->
                                              <!-- <td><?php echo $ref_list->inword_id; ?></td>
                                              <td><?php echo $ref_list->inword_id; ?></td>
                                              <td><?php echo $ref_list->qty_used; ?></td> -->
                                            <!-- </tr> -->

                                        <?php } ?>
                                        <!-- </table> -->
                                      </td>
                                      <td style=" text-align: center; border-right:0px; "><?php echo $outword_item_list->remark_name;  ?></td>
                                    </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        <tr style="border-top:0px;">
                          <!-- <td style="border-top:0px;" colspan="4" valign="top">
                            <p> <b>Total Inward</b> : <?php echo $tot_inword; ?> </p>
                            <?php foreach ($inword_by_remark as $inword_by_remark) { ?>
                              <p> <b><?php echo $inword_by_remark->remark_name; ?></b> : <?php echo $inword_by_remark->inword_by_remark; ?> </p>
                            <?php } ?>
                           </td> -->
                          <td style="border-top:0px;" colspan="8" valign="top">
                            <p> <b>Total Outward</b> : <?php echo $tot_outword; ?> </p>
                            <?php foreach ($outword_by_remark as $outword_by_remark) { ?>
                              <p> <b><?php echo $outword_by_remark->remark_name; ?></b> : <?php echo $outword_by_remark->outword_by_remark; ?> </p>
                            <?php } ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                      <!-- /.row -->
                    </section>
                    <br><br>
                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                      <div class="col-12">
                        <!-- <a href="<?php echo base_url() ?>Report/stock_report_print" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> -->
                        <a onclick='printDiv();' class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                      </div>
                    </div>
                  <?php } ?>

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
  <?php if(isset($item_wise_stock)){ ?>
    <input type="hidden" id="op_bal" value="<?php if($item_opening_bal == ''){ echo 0; }else{ echo $item_opening_bal; }  ?>">
    <input type="hidden" id="in_qty" value="<?php echo $tot_inword;  ?>">
    <input type="hidden" id="out_qty" value="<?php echo $tot_outword;  ?>">
    <script type="text/javascript">
      $(document).ready(function(){
        var op_bal = $('#op_bal').val();
        var in_qty = $('#in_qty').val();
        var out_qty = $('#out_qty').val();
        if(op_bal == ''){  op_bal = 0; }
        if(in_qty == ''){  in_qty = 0; }
        if(out_qty == ''){  out_qty = 0; }

        var op_bal = parseInt(op_bal);
        var in_qty = parseInt(in_qty);
        var out_qty = parseInt(out_qty);
        var close_bal = (op_bal + in_qty) - out_qty;
        $('.close_bal').text(close_bal);
        // alert(close_bal);
      })
    </script>
  <?php } ?>
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
