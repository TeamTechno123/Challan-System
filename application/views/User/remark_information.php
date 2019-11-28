<!DOCTYPE html>
<html>
<?php
  $page = "company_information";
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
            <h1>REMARK INFORMATION</h1>
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
                <h3 class="card-title">Remark Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php if(isset($update)){ ?>
                <form action="<?php echo base_url(); ?>User/update_remark" method="post" enctype="multipart/form-data" role="form">
                  <input type="hidden" name="remark_id" value="<?php echo $remark_id; ?>">
              <?php }else{ ?>
                <form action="<?php echo base_url(); ?>User/save_remark" method="post" enctype="multipart/form-data" role="form">
              <?php } ?>
                <div class="card-body row">

                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="remark_name" id="remark_name" title="Enter Remark Name" placeholder="Enter Remark Name" value="<?php if(isset($remark_name)){ echo $remark_name; } ?>" required >
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
