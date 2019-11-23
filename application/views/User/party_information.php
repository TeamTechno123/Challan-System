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
            <h1>PARTY INFORMATION</h1>
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
                <h3 class="card-title">Party Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body row">

                  <div class="form-group col-md-12">
                    <select class="form-control select2 form-control-sm" style="width: 100%;">
                        <option selected="selected">Select Party Type</option>
                      </select>
                  </div>

                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="" id="" placeholder="Party Name">
                  </div>

                  <div class="form-group col-md-12">
                    <textarea name="name" rows="3" cols="90" placeholder="Address" ></textarea>
                  </div>
                  <div class="form-group col-md-3">
                    <input type="text" class="form-control form-control-sm" name="" id="" placeholder="City">
                  </div>

                  <div class="form-group col-md-3">
                    <input type="text" class="form-control form-control-sm" name="" id="" placeholder="Pincode">
                  </div>

                  <div class="form-group col-md-3">
                    <select class="form-control select2 form-control-sm" style="width: 100%;">
                        <option selected="selected">Select Sate</option>
                      </select>
                  </div>

                  <div class="form-group col-md-3">
                    <input type="text" readonly class="form-control form-control-sm" name="" id="" placeholder="Sate Code">
                  </div>


                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="" id="" placeholder="Phone No">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="" id="" placeholder="Mobile No">
                  </div>

                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="" id="" placeholder="GST No">
                  </div>

                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="" id="" placeholder="PAN No">
                  </div>

                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="" id="" placeholder="Vendor Code">
                  </div>

                </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Create Party </button>
                  <button type="submit" class="btn btn-default ml-4">Cancel</button>
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
</body>
</html>
