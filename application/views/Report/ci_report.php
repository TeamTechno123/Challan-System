<!DOCTYPE html>
<html>
<?php
$page = "ci_boaring_report";
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
            <h4>CI BOARING REPORTS</h4>
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


                <?php if(isset($ci_report)){ ?>
                  <section style="width:100%;" class="invoice" id="print_invoice">
                    <div class="row w-100">
                      <p style="width:100%; text-align:center; margin-bottom: 10px; font-size:16px; text-transform:uppercase;"> <b>CI BOARING REPORT</b>  </p>
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
                      /* Width:33% !important; */
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
                  <td colspan="6"> <p style="text-align:center;"> <b>CI BOARING REPORTS</b>   : From <?php echo $from_date.' To '.$to_date; ?></p> </td>
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
                  <tr style="border-top:0px;" >
                    <th  style="border-top:0px;">Sr. No.</th>
                    <th style="border-top:0px;">Outword No.</th>
                    <th style="border-top:0px;">Date</th>
                    <th style="border-top:0px;">Item Name</th>
                    <th style="border-top:0px;">QTY</th>
                    <th style="border-top:0px;">CI Bo. Weight</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $i = 0;
                  $tot_weight = 0;
                  foreach ($ci_out_item_list as $list) {
                  $i++;
                  $ci_boring_weight = $list->ci_boring_weight;
                  $tot_weight = $tot_weight + $ci_boring_weight;
                  ?>
                    <tr>
                      <td style="  text-align: center;"><?php echo $i; ?></td>
                      <td style="  text-align: center;"><?php echo $list->outword_dc_num; ?></td>
                      <td style="  text-align: center;"><?php echo $list->outword_date; ?></td>
                      <td style="  text-align: center;"><?php echo $list->item_info_name; ?></td>
                      <td style="  text-align: center;"><?php echo $list->qty; ?></td>
                      <td style="  text-align: center;"><?php echo $list->ci_boring_weight.' Kg.'; ?></td>
                    </tr>
                  <?php } ?>
                  <tr>
                    <td colspan="3"  style="border-right:0px;"> <br> </td>
                    <td colspan="1" style="border-right:0px; border-left: 0px;"> </td>
                    <td colspan="3" style=" border-left: 0px; "> <br> Total Weight : <?php echo $tot_weight.' Kg.'; ?></td>
                  </tr>
                </tbody>
                </table>
                    <!-- /.row -->
                  </section>
                  <br><br>
                  <!-- this row will not appear when printing -->
                  <div class="row no-print mt-3">
                    <div class="col-12">
                      <!-- <a href="<?php echo base_url() ?>Report/stock_report_print" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> -->
                      <a onclick='printDiv();' class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                    </div>
                  </div>
                <?php } ?>



              <!-- <div class="w-100">
                <table id="myTable" class="table table-bordered table-striped " style="">
                  <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <th>Outword No.</th>
                    <th>Date</th>
                    <th>Item Name</th>
                    <th>Qty</th>
                    <th>CI Boaring Weight</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1234</td>
                      <td>1234</td>
                      <td>1234</td>
                      <td>1234</td>
                      <td>1234</td>
                      <td>1234</td>
                    </tr>
                </table>
                <div class="row " >
                  <p class="text-right w-100" style="padding-right:50px;">Closing Balance : </p>
                </div>
              </div>
              <br><br>
              <div class="row no-print">
                <div class="col-12">
                  <a href="<?php echo base_url() ?>Report/ci_report_print" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                </div>
              </div> -->

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
