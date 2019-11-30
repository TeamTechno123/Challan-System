<!DOCTYPE html>
<html>
<?php
$page = "ci_boaring_report";
?>
<style>

td{
  padding:2px 10px !important;
    border: 1px solid #000!important;
    text-align: center;
}
th, tr{
    text-align: center;
  border: 1px solid #000!important;
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
            <!-- <div class="card-header">
              <h3 class="card-title"><i class="fa fa-list"></i> List Party Information</h3>
              <div class="card-tools">
                <a href="party_information" class="btn btn-sm btn-block btn-primary">Add Party</a>
              </div>
            </div> -->
            <!-- /.card-header -->
            <div class="card-body" >
              <form role="form">
                <div class="card-body row">
                  <div class="form-group col-md-4 offset-md-2">
                    <input type="text" class="form-control form-control-sm" name="" id="" title="From Date" placeholder="From Date">
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control form-control-sm" name="" title="To Date"  placeholder="To Date">
                  </div>
                  <div class="form-group col-md-4 offset-md-2">
                    <select class="form-control select2 form-control-sm" title="Select Party" style="width: 100%;">
                      <option selected="selected">Select Party</option>
                    </select>
                  </div>
                  <div class="form-group col-md-4 ">
                    <select class="form-control select2 form-control-sm" title="Select Party" style="width: 100%;">
                      <option selected="selected">Select Party</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2 offset-md-2">
                    <button class="btn btn-sm btn-block btn-primary">View </button>
                  </div>
                  <div class="form-group col-md-2 offset-md-2">
                    <button href="accessories_information" class="btn btn-sm btn-block btn-primary">Cancel</button>
                  </div>
                </div>
              </form>


              <div class="w-100">
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
                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                              <div class="col-12">
                                <a href="<?php echo base_url() ?>Report/ci_report_print" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                              </div>
                            </div>

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


</body>
</html>
