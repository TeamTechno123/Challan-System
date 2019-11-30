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
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Delivery Challan</li>
            </ol>
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
                <h3  style="font-family: 'Arial Black', 'Arial Bold', Gadget, sans-serif; font-size:26px; margin-top: 0px; margin-bottom: 5px;font-weight:bold; text-transform:uppercase; text-aligh:center;">Challan System </h3>
                <p   style="font-size:16px; margin-bottom:8px;">
                        126, Bhupal Tower, Ford Corner, Laxmipuri, Kolhapur, Kolhapur, Maharashtra
                </p>
                <!-- <p  style="font-size:16px; margin-bottom:8px;" >Ph No. 0231-2646189</p> -->
                <p  style="margin-bottom:5px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px;"> Mobile No: 9865329865 &nbsp; | &nbsp; Email : abcd@gmail.com </p>
                <p  style="margin-bottom:5px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px;"> GST No:  &nbsp; | &nbsp; </p>
  </div>

            </div>
          </td>

        </tr>
        <tr>
          <td colspan="2"> <p> DC No. :  000004 </p> </td>
          <td colspan="2"> <p>PO No.  :  000004 </p> </td>
          <td colspan="2"> <p>Vehicle No. : </p> </td>
        </tr>
        <tr>
          <td colspan="2"> <p> DC Date :  19-11-2019  </p> </td>
          <td colspan="2"> <p>PO Date :  19-11-2019 </p> </td>
          <td colspan="2"> <p>Transport : abcds </p> </td>
        </tr>
        <tr>
          <td colspan="6" style="border-right:0px!important; padding-left: 20px; " >

             <p style="font-size:16px; margin-bottom:5px;"><strong>Party Name and Address :  </strong> 126, Bhupal Tower, Ford Corner, Laxmipuri, Kolhapur, Kolhapur, Maharashtra

 <b>Mobile No</b> : 9865329865 </p>

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
            <td>ABCD</td>
            <td>Remark</td>
            <td>1</td>
            <td>120.00</td>
            <td>5000</td>
            <td>5120.00</td>
          </tr>



          <tr>
            <td colspan="4" rowspan="6" vlign="top" ><p> <b> Challan Reference </b> :  </p><br><br><br><br><br><br><br><br> </td>
            <td  colspan="3" style="" ><p style="font-size:13px;"> <b>Basic Amount</b>  : &#8377; 12000  </p> </td>
          </tr>
          <tr>
            <td  colspan="3" style=" " ><p style="font-size:13px;"> <b>CGST</b>   : &#8377; 12000  </p> </td>
          </tr>
          <tr>
            <td  colspan="3" style=" " ><p style="font-size:13px;"> <b>SGST</b>   : &#8377; 12000  </p> </td>
          </tr>
          <tr>
            <td  colspan="3" style=" " ><p style="font-size:13px;"> <b>IGST</b>   : &#8377; 12000  </p> </td>
          </tr>
          <tr>
            <td  colspan="3" style=" " ><p style="font-size:13px;"> <b>GST Total</b>  : &#8377; 12000  </p> </td>
          </tr>

          <tr>


            <td  colspan="3" style=" " ><p style="font-size:13px;"> <b>Net Total</b>  : &#8377; 12000  </p> </td>
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
                  <a href="<?php echo base_url() ?>Report/delivery_challan_print" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
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
