<!DOCTYPE html>
<html>
<?php
  $page = "unit_information";
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
            <h1>USER INFORMATION</h1>
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
                <h3 class="card-title">User Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php if(isset($update)){ ?>
                <form action="<?php echo base_url(); ?>User/update_user" method="post" enctype="multipart/form-data" role="form">
                  <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
              <?php }else{ ?>
                <form action="<?php echo base_url(); ?>User/save_user" method="post" enctype="multipart/form-data" role="form">
              <?php } ?>

                <div class="card-body row">
                  <div class="form-group col-md-12">
                    <select class="form-control select2 form-control-sm" name="roll_id" id="roll_id" style="width: 100%;" required>
                        <option selected="selected" value="" >Select Role </option>
                        <?php foreach ($roll_list as $roll_list1) { ?>
                          <option value="<?php echo $roll_list1->roll_id; ?>" <?php if(isset($roll_id)){ if($roll_list1->roll_id == $roll_id){ echo "selected"; } }  ?>><?php echo $roll_list1->roll_name; ?></option>
                        <?php } ?>
                      </select>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="user_name" id="user_name" title="Enter Name Of User" placeholder="Enter Name Of User" value="<?php if(isset($user_name)){ echo $user_name; } ?>"   required>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="user_mobile" id="user_mobile" title="Enter Mobile no" placeholder="Enter Mobile no" value="<?php if(isset($user_mobile)){ echo $user_mobile; } ?>"  required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="user_password" id="user_password" title="Password" placeholder="Password" value="<?php if(isset($user_password)){ echo $user_password; } ?>"  required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="" id="" title="Confirm Password" placeholder="Confirm Password" required>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <div class="col-md-8 offset-md-4">
                    <?php if(isset($update)){ ?>
                      <button type="submit" class="btn btn-primary">Update</button>
                    <?php }else{ ?>
                      <button type="submit" class="btn btn-success">Add</button>
                    <?php } ?>
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
  
</body>
</html>
