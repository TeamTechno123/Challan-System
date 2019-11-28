<!DOCTYPE html>
<html>
<?php
  $page = "vehicle_information";
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center mt-2">
            <h1>VEHICLE INFORMATION</h1>
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
              <?php if(isset($update)){ ?>
                <form action="<?php echo base_url(); ?>User/update_vehicle" method="post" enctype="multipart/form-data" role="form">
                  <input type="hidden" name="vehicle_id" value="<?php echo $vehicle_id; ?>">
              <?php }else{ ?>
                <form action="<?php echo base_url(); ?>User/save_vehicle" method="post" enctype="multipart/form-data" role="form">
              <?php } ?>
                <div class="card-body row">

                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="vehicle_number" id="vehicle_number" title="Enter Vehicle No" value="<?php if(isset($vehicle_number)){ echo $vehicle_number; } ?>"  placeholder="Enter Vehicle No" required>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="vehicle_owner" id="vehicle_owner" title="Enter Vehicle Owner Name" value="<?php if(isset($vehicle_owner)){ echo $vehicle_owner; } ?>"  placeholder="Enter Vehicle Owner Name" required>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="number" class="form-control form-control-sm" name="charges" id="charges" title="Per Trip Charges" value="<?php if(isset($charges)){ echo $charges; } ?>"  placeholder="Per Trip Charges" required>
                  </div>
                </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <?php if(isset($update)){ ?>
                    <button type="submit" class="btn btn-primary">Update</button>
                  <?php }else{ ?>
                    <button type="submit" class="btn btn-success">Add</button>
                  <?php } ?>
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
  
</body>
</html>
