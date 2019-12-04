<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Delivery challan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->

    <div class="row">
  <p style="text-align:center; margin-bottom: 10px; font-size:16px; text-transform:uppercase;"> <b>Delivery Challan</b>  </p>
</div>
    <table class="table table-bordered mb-0 invoice-table"  width="100%">
<style media="print">
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
  <!-- <td width="20%" style="border-right:0px!important;">  <img class="" src="<?php echo base_url(); ?>assets/images/universal.png" width="150" height="100" alt=""></td> -->
  <td colspan="8">
    <div class="row">

      <div class="col-md-12 text-center pt-2 pb-2 text-center">
        <h3  style="text-align: center; font-family: 'Arial Black', 'Arial Bold', Gadget, sans-serif;  font-size:26px; margin-top: 0px; margin-bottom: 5px;font-weight:bold; text-transform:uppercase;">
          <?php echo $company_name; ?>
        </h3>
        <p style="text-align: center; font-size:16px;">
          <?php echo $company_address; ?>
        </p>
        <!-- <p  style="font-size:16px; " >Ph No. 0231-2646189</p> -->
        <p  style="text-align: center; margin-bottom:5px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px;">
          Mobile No: <?php echo $company_mob1; ?> &nbsp; | &nbsp; Email : <?php echo $company_email; ?>
        </p>
        <p  style="text-align: center; margin-bottom:5px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px;">
          GST No:  <?php echo $company_gst_no; ?>&nbsp;
        </p>
      </div>

    </div>
  </td>
</tr>
<tr>
  <td colspan="2"> <p> <b>DC No.</b>   :  <?php echo $outword_dc_num; ?> </p> </td>
  <td colspan="2"> <p> <b>Eway Bill No.</b>   :  <?php echo $outword_E_no; ?> </p> </td>
  <td colspan="2"> <p> <b>PO No.</b>   :  <?php echo $po_number; ?> </p> </td>
  <td colspan="2"> <p> <b>Vehicle No.</b>  : <?php echo $vehicle_number; ?></p> </td>
</tr>
<tr>
  <td colspan="2"> <p> <b> DC Date</b>  :  <?php echo $outword_date; ?>  </p> </td>
  <td colspan="2"> <p> <b>Date</b>  :  <?php echo $outword_E_date; ?> </p> </td>
  <td colspan="2"> <p> <b>PO Date</b>  :  <?php echo $po_date; ?> </p> </td>
  <td colspan="2"> <p> <b>Transport</b>  : <?php echo $outword_trans; ?> </p> </td>
</tr>
<tr>
  <td colspan="6" style="border-right:0px!important; padding-left: 20px; " >
    <p style="font-size:16px; margin-bottom:5px;">
      <strong>Party Name and Address :  </strong>
      <?php echo $party_name; ?>,
      <?php echo $address; ?><br>
      <b>Mobile No</b> : <?php echo $mobile_no; ?> | <b>GST No</b> : <?php echo $gst_no; ?>
    </p>
  </td>
  <td colspan="2">
    <p><b><?php echo $outword_title; ?></b></p>
  </td>
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
}
.ref_table{
  /* width:100%; */
}
.ref_table, .ref_table tr, .ref_table td{
  border: 0px;
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
      <td style="text-align:center;">1</td>
      <td style="text-align:center;"><?php echo $item_info_name; ?></td>
      <td style="text-align:center;"><?php echo $remark_name; ?></td>
      <td style="text-align:center;"><?php echo $qty; ?></td>
      <td style="text-align:center;"><?php echo $gst; ?></td>
      <td style="text-align:center;"><?php echo $rate; ?></td>
      <td style="text-align:center;"><?php echo $amount; ?></td>
    </tr>
    <tr>
      <td colspan="4" rowspan="6" valign="top" >
        <p> <b> Challan Reference </b> :
          <table class="ref_table">
            <tr>
              <td style="text-align:center;">Challan No.</td>
              <td style="text-align:center;">Date</td>
              <td style="text-align:center;">Qty</td>
              <td style="text-align:center;">Balance</td>
            </tr>
            <?php foreach ($report_inword_ref_list as $ref_list) { ?>
              <tr>
                <td style="text-align:center;"><?php echo $ref_list->inword_dc_num ?></td>
                <td style="text-align:center;"><?php echo $ref_list->inword_date ?></td>
                <td style="text-align:center;"><?php echo $ref_list->qty_used ?></td>
                <td style="text-align:center;"><?php echo $ref_list->bal_qty ?></td>
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
      <td colspan="3"  style="border-right:0px;"> <br> Receiver's Signature </td>
      <td colspan="1" style="border-right:0px; border-left: 0px;"> </td>
      <td colspan="3" style=" border-left: 0px; "> For <?php echo $company_name; ?><br><br>Authorised Signature</td>
    </tr>
  </tbody>
</table>




 <br>
  <hr style="margin-top:10px; border-top: 1px dotted #000;">




<div class="row">
<p style="text-align:center; margin-bottom: 10px; font-size:16px; text-transform:uppercase;"> <b>Delivery Challan</b>  </p>
</div>
<table class="table table-bordered mb-0 invoice-table"  width="100%">
  <style media="print">
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
      margin-bottom: 2px!important;
      margin-top: 2px!important;
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
  <!-- <td width="20%" style="border-right:0px!important;">  <img class="" src="<?php echo base_url(); ?>assets/images/universal.png" width="150" height="100" alt=""></td> -->
  <td colspan="8">
    <div class="row">

      <div class="col-md-12 text-center pt-2 pb-2 text-center">
        <h3  style="text-align: center; font-family: 'Arial Black', 'Arial Bold', Gadget, sans-serif;  font-size:26px; margin-top: 0px; margin-bottom: 5px;font-weight:bold; text-transform:uppercase;">
          <?php echo $company_name; ?>
        </h3>
        <p style="text-align: center; font-size:16px;">
          <?php echo $company_address; ?>
        </p>
        <!-- <p  style="font-size:16px; " >Ph No. 0231-2646189</p> -->
        <p  style="text-align: center; margin-bottom:5px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px;">
          Mobile No: <?php echo $company_mob1; ?> &nbsp; | &nbsp; Email : <?php echo $company_email; ?>
        </p>
        <p  style="text-align: center; margin-bottom:5px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px;">
          GST No:  <?php echo $company_gst_no; ?>&nbsp;
        </p>
      </div>

    </div>
  </td>
</tr>
<tr>
  <td colspan="2"> <p> <b>DC No.</b>   :  <?php echo $outword_dc_num; ?> </p> </td>
  <td colspan="2"> <p> <b>Eway Bill No.</b>   :  <?php echo $outword_E_no; ?> </p> </td>
  <td colspan="2"> <p> <b>PO No.</b>   :  <?php echo $po_number; ?> </p> </td>
  <td colspan="2"> <p> <b>Vehicle No.</b>  : <?php echo $vehicle_number; ?></p> </td>
</tr>
<tr>
  <td colspan="2"> <p> <b> DC Date</b>  :  <?php echo $outword_date; ?>  </p> </td>
  <td colspan="2"> <p> <b>Date</b>  :  <?php echo $outword_E_date; ?> </p> </td>
  <td colspan="2"> <p> <b>PO Date</b>  :  <?php echo $po_date; ?> </p> </td>
  <td colspan="2"> <p> <b>Transport</b>  : <?php echo $outword_trans; ?> </p> </td>
</tr>
<tr>
  <td colspan="6" style="border-right:0px!important; padding-left: 20px; " >
    <p style="font-size:16px; margin-bottom:5px;">
      <strong>Party Name and Address :  </strong>
      <?php echo $party_name; ?>,
      <?php echo $address; ?><br>
      <b>Mobile No</b> : <?php echo $mobile_no; ?> | <b>GST No</b> : <?php echo $gst_no; ?>
    </p>
  </td>
  <td colspan="2">
    <p><b><?php echo $outword_title; ?></b></p>
  </td>
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
          <td style="text-align:center;">1</td>
          <td style="text-align:center;"><?php echo $item_info_name; ?></td>
          <td style="text-align:center;"><?php echo $remark_name; ?></td>
          <td style="text-align:center;"><?php echo $qty; ?></td>
          <td style="text-align:center;"><?php echo $gst; ?></td>
          <td style="text-align:center;"><?php echo $rate; ?></td>
          <td style="text-align:center;"><?php echo $amount; ?></td>
        </tr>

        <tr>
          <td colspan="4" rowspan="6" valign="top" >
            <p> <b> Challan Reference </b> :
              <table class="ref_table">
                <tr>
                  <td style="text-align:center;">Challan No.</td>
                  <td style="text-align:center;">Date</td>
                  <td style="text-align:center;">Qty</td>
                  <td style="text-align:center;">Balance</td>
                </tr>
                <?php foreach ($report_inword_ref_list as $ref_list) { ?>
                  <tr>
                    <td style="text-align:center;"><?php echo $ref_list->inword_dc_num ?></td>
                    <td style="text-align:center;"><?php echo $ref_list->inword_date ?></td>
                    <td style="text-align:center;"><?php echo $ref_list->qty_used ?></td>
                    <td style="text-align:center;"><?php echo $ref_list->bal_qty ?></td>
                  </tr>
                <?php } ?>
              </table>
            </p>
          </td>
          <td  colspan="3" style="" >
            <p style="font-size:13px;"> <b>Basic Amount</b>  : &#8377; <?php echo $outword_basic_amt; ?>  </p>
          </td>
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
        <td colspan="3"  style="border-right:0px;"> <br> Receiver's Signature </td>
        <td colspan="1" style="border-right:0px; border-left: 0px;"> </td>
        <td colspan="3" style=" border-left: 0px; "> For <?php echo $company_name; ?><br><br> Authorised Signature</td>
        </tr>
      </tbody>
</table>
 <div class="row">
   <p> <small>Design By Technothinksup Solutions Pvt. Ltd <b style="font-size:16px;">(9527001144)</b></small>  </p>
 </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript">
  window.addEventListener("load", window.print());

</script>


</body>
</html>
