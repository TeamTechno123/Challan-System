<!DOCTYPE html>
<html>
<?php
  $page = "company_information";
  include('head.php');
?>
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
          <div class="col-sm-12 text-center mt-2">
            <h1>INWORD INFORMATION</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8 offset-md-2">
            <!-- general form elements -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Inword Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body row">

                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="" id="" placeholder="DC No">
                  </div>
                  <div class="form-group col-md-6 ">
                    <input type="text" class="form-control form-control-sm" name="" id="" placeholder="Date">
                  </div>

                  <div class="form-group col-md-12">
                    <select class="form-control select2 form-control-sm" style="width: 100%;">
                        <option selected="selected">Select Party Name</option>
                      </select>
                  </div>




                  <div class="form-group col-md-9">
                    <label for="">  <h3 class="card-title">Item Details</h3> </label>
                  </div>

                  <div class="form-group col-md-3 ">
                    <button id="add_row" type="button" class="btn btn-success"> Add More</button>
                  </div>




                  <div class="row col-md-12" id="myRow">
                    <div class="form-group col-md-3">
                      <select class="form-control select2 form-control-sm" >
                          <option selected="selected">Select Item Name</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                      <select class="form-control select2 form-control-sm" >
                          <option selected="selected">Select Remark</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                      <input type="text" class="form-control form-control-sm" name="" id="" placeholder="Qty">
                    </div>

                    <div class="form-group col-md-2">
                      <input type="text" class="form-control form-control-sm" name="" id="" placeholder="Rate">
                    </div>
                    <div class="form-group col-md-2">
                      <input type="text" readonly class="form-control form-control-sm" name="" id="" placeholder="Amount">
                    </div>
                  </div>

                  <div class="form-group col-md-3 offset-md-9">
                    <input type="text" class="form-control form-control-sm" name="" id="" placeholder="Basic Amount">
                  </div>

                  <div class="form-group col-md-3 offset-md-9">
                    <input type="text" class="form-control form-control-sm" name="" id="" placeholder="GST Amount">
                  </div>

                  <div class="form-group col-md-3 offset-md-9">
                    <input type="text" class="form-control form-control-sm" name="" id="" placeholder="Net Amount">
                  </div>

                  <div class="form-group col-md-6">
                    <select class="form-control select2 form-control-sm" >
                        <option selected="selected">Select Vehicle No</option>
                      </select>
                  </div>

                  <div class="form-group col-md-4 offset-md-2">
                    <input type="text" class="form-control form-control-sm" name="" id="" placeholder="Enter No Of Trip">
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer ">
                  <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-success">Add Inword </button>
                    <button type="submit" class="btn btn-default ml-4">Cancel</button>
                  </div>

                </div>
              </form>
            </div>

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <!--/.col (right) -->
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


$('#add_row').click(function(){
  var row = '<div class="form-group col-md-3"><select class="form-control select2 form-control-sm" ><option selected="selected">Select Item Name</option></select></div>'+
    '<div class="form-group col-md-3"><select class="form-control select2 form-control-sm" ><option selected="selected">Select Remark</option></select></div>'+
    '<div class="form-group col-md-2"><input type="text" class="form-control form-control-sm" name="" id="" placeholder="Qty"></div>'+
    '<div class="form-group col-md-2"><input type="text" class="form-control form-control-sm" name="" id="" placeholder="Rate"></div>'+
    '<div class="form-group col-md-2"><input type="text" readonly class="form-control form-control-sm" name="" id="" placeholder="Amount"></div>';
  $('#myRow').append(row);
});




</script>
</body>
</html>
