<!DOCTYPE html>
<html>
<?php
$page = "party_list";
include('head.php');
?>
<style>

  td{
    padding:2px 10px !important;
  }
  table{
    /* overflow: hidden; */
  }
  th, td { min-width:200px; }
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
  <!-- Navbar -->
  <?php include('navbar.php'); ?>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <?php include('sidebar.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 mt-1 text-center">
            <h4>ITEM WISE STOCK REPORTS</h4>
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

                  <div class="form-group col-md-8 offset-md-2">
                    <select class="form-control select2 form-control-sm" style="width: 100%;">
                      <option selected="selected">Select Party Name</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    </div>

                    <div class="form-group col-md-8 offset-md-2">
                      <select class="form-control select2 form-control-sm" style="width: 100%;">
                        <option selected="selected">Select Item Name</option>
                      </select>
                    </div>
                    <div class="form-group col-md-2">
                      </div>

                  <div class="form-group col-md-4 offset-md-2">
                    <input type="text" class="form-control form-control-sm" name="" id="" placeholder="From Date">
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control form-control-sm" name="" id="" placeholder="To Date">
                  </div>

                  <div class="form-group col-md-4 offset-md-2 ">
                    <select class="form-control select2 form-control-sm" style="width: 100%;">
                      <option selected="selected">Select Remark</option>
                    </select>
                  </div>
                    <div class="form-group col-md-4">
                      <button type="button" class="btn btn-sm btn-primary mb-3 mr-1" width="150px">View Report</button>
                    </div>
                  </div>
                </div>
              </form>
              <div class=" w-100 text-right">
                <button id="add_row" class="btn btn-sm btn-primary mb-3 mr-1" width="150px">Add Row</button>
              </div>

              <div class="" style="overflow-x:auto;">

                <table id="myTable" class="table table-bordered table-striped " style="">
                  <thead>
                  <tr>
                    <th class="sr_no">Sr. No.</th>
                    <th>Make</th>
                    <th>Model No.</th>
                    <th>Machine Serial no.</th>
                    <th>Capacity</th>
                    <th>Accuracy</th>
                    <th>Class</th>
                    <th>Platter Size</th>
                    <th class="td_w">GST</th>
                    <th class="td_w">Qty</th>
                    <th class="td_w">Rate</th>
                    <th class="td_w">Amount</th>
                    <th class="td_btn"></th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td class="sr_no">1</td>
                    <td>
                      <select class="form-control select2 form-control-sm" style="width: 100%;">
                        <option selected="selected">Alabama</option>
                      </select>
                    </td>
                    <td>
                      <select class="form-control select2 form-control-sm" style="width: 100%;">
                        <option selected="selected">Alabama</option>
                      </select>
                    </td>
                    <td class="td_w">
                      <input type="text" class="form-control form-control-sm" name="" id="" placeholder="">
                    </td>
                    <!-- <td>
                      <select class="form-control select2 form-control-sm" style="width: 100%;">
                        <option selected="selected">Alabama</option>
                      </select>
                    </td> -->
                    <td>
                      <select class="form-control select2 form-control-sm" style="width: 100%;">
                        <option selected="selected">Alabama</option>
                      </select>
                    </td>
                    <td>
                      <select class="form-control select2 form-control-sm" style="width: 100%;">
                        <option selected="selected">Alabama</option>
                      </select>
                    </td>
                    <td>
                      <select class="form-control select2 form-control-sm" style="width: 100%;">
                        <option selected="selected">Alabama</option>
                      </select>
                    </td>
                    <td>
                      <select class="form-control select2 form-control-sm" style="width: 100%;">
                        <option selected="selected">Alabama</option>
                      </select>
                    </td>
                    <td class="td_w">
                      <input type="text" class="form-control form-control-sm" name="" id="" placeholder="">
                    </td>
                    <td class="td_w">
                      <input type="text" class="form-control form-control-sm" name="" id="" placeholder="">
                    </td>
                    <td class="td_w">
                      <input type="text" class="form-control form-control-sm" name="" id="" placeholder="">
                    </td>
                    <td class="td_w">
                      <input type="text" class="form-control form-control-sm" name="" id="" placeholder="">
                    </td>
                    <td class="td_btn"></td>
                  </tr>
                </table>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <h5 class="mt-4">Terms And Conditions</h5>
                  <div class="w-100 text-right">
                      <button id="add_terms" class="btn btn-sm btn-primary mb-2 " width="100px">Add</button>
                  </div>
                  <div class="form-group " >
                    <div class="select2-purple">
                        <select class="select2" multiple="multiple" data-placeholder="Select a Terms And Conditions" data-dropdown-css-class="select2-purple" style="width: 100%;">
                          <option>Alabama</option>
                          <option>Alaska</option>
                          <option>California</option>
                          <option>Delaware</option>
                          <option>Tennessee</option>
                          <option>Texas</option>
                          <option>Washington</option>
                        </select>
                      </div>

                  </div>
                  <div class="form-group" >
                    <textarea id="txt_terms" class="form-control form-control-sm" name="name" rows="8" cols="80"></textarea>
                  </div>
                  <div class="float-right">
                    <button type="submit" class="btn btn-primary  mr-3">Save</button>
                    <button type="submit" class="btn btn-default ">Cancel</button>
                  </div>

                </div>
                <div class="col-md-6 ">
                  <div class="form-group row pt-4 float-right">
                    <label for="inputEmail3" class=" col-form-label mr-3">Total Amount</label>
                    <div class="">
                      <input type="text" class="form-control" id="inputEmail3">
                    </div>
                  </div>
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
  <!-- /.content-wrapper -->
  <?php include('footer.php'); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include('script.php') ?>
<script type="text/javascript">
  $('#add_terms').click(function(){
    var terms = $('.select2-selection__choice').val();
    // var res = terms.replace("×", ",");
    // $('#txt_terms').val(res);
    alert(terms);
  });

  $('#add_row').click(function(){
    var row = '<tr><td class="sr_no">1</td>'+
              '<td><select class="form-control select2 form-control-sm" style="width: 100%;"><option selected="selected">Alabama</option></select></td>'+
              '<td><select class="form-control select2 form-control-sm" style="width: 100%;"><option selected="selected">Alabama</option></select></td>'+
              '<td>  <input type="text" class="form-control form-control-sm" name="" id="" placeholder=""></td>'+
              '<td><select class="form-control select2 form-control-sm" style="width: 100%;"><option selected="selected">Alabama</option></select></td>'+
              '<td><select class="form-control select2 form-control-sm" style="width: 100%;"><option selected="selected">Alabama</option></select></td>'+
              '<td><select class="form-control select2 form-control-sm" style="width: 100%;"><option selected="selected">Alabama</option></select></td>'+
              '<td><select class="form-control select2 form-control-sm" style="width: 100%;"><option selected="selected">Alabama</option></select></td>'+
              '<td class="td_w"><input type="text" class="form-control form-control-sm" name="" id="" placeholder=""></td>'+
              '<td class="td_w"><input type="text" class="form-control form-control-sm" name="" id="" placeholder=""></td>'+
              '<td class="td_w"><input type="text" class="form-control form-control-sm" name="" id="" placeholder=""></td>'+
              '<td class="td_w"><input type="text" class="form-control form-control-sm" name="" id="" placeholder=""></td>'+
              '<td class="td_btn"><a> <i class="fa fa-trash text-danger"></i> </a></td>'+
              '</tr>';
    $('#myTable').append(row);
  });

  $('#myTable').on('click', 'a', function () {
    $(this).closest('tr').remove();
  });
</script>
</body>
</html>
