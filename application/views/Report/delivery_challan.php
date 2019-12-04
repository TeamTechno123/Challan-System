<!DOCTYPE html>
<html>
<?php
$page = "delivery_challan";
?>
<style  media="screen" >

  td{
    padding:2px 10px !important;
  }
  table{
    /* overflow: hidden; */
  }
  /* th, td { min-width:200px; } */
  .sr_no, .td_btn{
    min-width:50px !important;
  }
  .td_w{
    min-width:100px !important;
  }
  html, body, .row{
    overflow-x: hidden;
  }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Delivery Challan</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <table class="table table-bordered mb-0 invoice-table" >
            <style media="screen">
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
              p{
                margin-bottom: 5px;
              }
            </style>

        <tr>
          <td colspan="6">
            <div class="row">
              <div class="col-md-12 text-center pt-2 pb-2 text-center">
                <h3 style="font-family: 'Arial Black', 'Arial Bold', Gadget, sans-serif; font-size:26px; margin-top: 0px; margin-bottom: 5px;font-weight:bold; text-transform:uppercase; text-aligh:center;">
                  <?php echo $company_name; ?>
                </h3>
                <p style="font-size:16px; margin-bottom:8px;">
                  <?php echo $company_address; ?>
                </p>
                <p style="margin-bottom:5px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px;">
                  Mobile No: <?php echo $company_mob1; ?> &nbsp; | &nbsp; Email : <?php echo $company_email; ?>
                </p>
                <p style="margin-bottom:5px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px;">
                  GST No: <?php echo $company_gst_no; ?> &nbsp;
                </p>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td colspan="2"> <p>DC No. :  <?php echo $outword_dc_num; ?> </p> </td>
          <td colspan="2"> <p>PO No.  :  <?php echo $po_number; ?> </p> </td>
          <td colspan="2"> <p>Vehicle No. : <?php echo $vehicle_number; ?></p> </td>
        </tr>
        <tr>
          <td colspan="2"> <p> DC Date :  <?php echo $outword_date; ?>  </p> </td>
          <td colspan="2"> <p>PO Date :  <?php echo $po_date; ?> </p> </td>
          <td colspan="2"> <p>Transport : <?php echo $outword_trans; ?> </p> </td>
        </tr>
        <tr>
          <td colspan="6" style="border-right:0px!important; padding-left: 20px; " >
             <p style="font-size:16px; margin-bottom:5px;">
               <strong>Party Name and Address :  </strong>
               <?php echo $party_name; ?>,
               <?php echo $address; ?><br>
               <b>Mobile No</b> : <?php echo $mobile_no; ?><br>
               <b>GST No</b> : <?php echo $gst_no; ?>
             </p>
          </td>
        </tr>
      </table>

      <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-botttom">
          <style media="screen">
          .table-bottom {
            border-collapse: collapse;
          }
          .table-bottom, th, tr, td{
            border: 1px solid #000;
            margin-left: auto;
            margin-right: auto;
          }
          .ref_table, .ref_table tr, .ref_table td{
            border: 0px;
          }
          </style>
          <thead>
          <tr>
            <th >Sr. No.</th>
            <th>Item Name</th>
            <th>Remark</th>
            <th>QTY</th>
            <th>GST</th>
            <th>Rate</th>
            <th>Amount</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>1</td>
            <td><?php echo $item_info_name; ?></td>
            <td><?php echo $remark_name; ?></td>
            <td><?php echo $qty; ?></td>
            <td><?php echo $gst; ?></td>
            <td><?php echo $rate; ?></td>
            <td><?php echo $amount; ?></td>
          </tr>

          <tr>
            <td colspan="4" rowspan="6" valign="top" >
              <p> <b> Challan Reference </b> :
                <table class="ref_table">
                  <tr>
                    <td>Challan No.</td>
                    <td>Date</td>
                    <td>Qty</td>
                    <td>Balance</td>
                  </tr>
                  <?php foreach ($report_inword_ref_list as $ref_list) { ?>
                    <tr>
                      <td><?php echo $ref_list->inword_dc_num ?></td>
                      <td><?php echo $ref_list->inword_date ?></td>
                      <td><?php echo $ref_list->qty_used ?></td>
                      <td><?php echo $ref_list->bal_qty ?></td>
                    </tr>
                  <?php } ?>
                </table>
              </p>
            </td>
            <td  colspan="3" style="" ><p style="font-size:13px;"> <b>Basic Amount</b>  : &#8377; <?php echo $outword_basic_amt; ?>  </p> </td>
          </tr>
          <?php
            if($company_statecode == $state_code){
              $cgst = $outword_gst/2;
              $igst = 0;
            }
            else{
              $cgst = 0;
              $igst = $outword_gst;
            }
            ?>
            <tr>
              <td  colspan="3" rowspan="" style=" " ><p style="font-size:13px;"> <b>CGST</b>   : &#8377; <?php echo $cgst; ?>  </p> </td>
            </tr>
            <tr>
              <td  colspan="3" style=" " ><p style="font-size:13px;"> <b>SGST</b>   : &#8377; <?php echo $cgst; ?>  </p> </td>
            </tr>
            <tr>
              <td  colspan="3" style=" " ><p style="font-size:13px;"> <b>IGST</b>   : &#8377; <?php echo $igst; ?>  </p> </td>
            </tr>
          <tr>
            <td  colspan="3" style=" " ><p style="font-size:13px;"> <b>GST Total</b>  : &#8377; <?php echo $outword_gst; ?>  </p> </td>
          </tr>
          <tr>
            <td  colspan="3" style=" " ><p style="font-size:13px;"> <b>Net Total</b>  : &#8377; <?php echo $outword_net_amount; ?>  </p> </td>
          </tr>

          <tr>
            <td colspan="3"  style="border-right:0px; "> <br> Receiver's Signature </td>
            <td colspan="1" style="border-right:0px; border-left: 0px;"> </td>
            <td colspan="3" style="border-left: 0px; "> <br> Authorised Signature</td>
          </tr>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
<br><br>
              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="<?php echo base_url() ?>Report/delivery_challan_print/<?php echo $outword_id; ?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


</body>
</html>
