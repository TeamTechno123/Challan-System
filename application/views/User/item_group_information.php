<!DOCTYPE html>
<html>
<?php
  $page = "item_group_information";
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
            <h1>ITEM GROUP INFORMATION</h1>
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
                <h3 class="card-title">Item  Group Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <?php if(isset($update)){ ?>
                <form action="<?php echo base_url(); ?>User/update_item_group" method="post" enctype="multipart/form-data" role="form">
                  <input type="hidden" name="item_group_id" value="<?php echo $item_group_id; ?>">
              <?php }else{ ?>
                <form action="<?php echo base_url(); ?>User/save_item_group" method="post" enctype="multipart/form-data" role="form">
              <?php } ?>


                <div class="card-body row">

                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="item_group_name" id="item_group_name" value="<?php if(isset($item_group_name)){ echo $item_group_name; } ?>" title="Enter Item Group Name" placeholder="Enter Item Group Name" required>
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
