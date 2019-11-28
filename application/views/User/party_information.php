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
              <?php if(isset($update)){ ?>
                <form action="<?php echo base_url(); ?>User/update_party" method="post" enctype="multipart/form-data" role="form">
                  <input type="hidden" name="party_id" value="<?php echo $party_id; ?>">
              <?php }else{ ?>
                <form action="<?php echo base_url(); ?>User/save_party" method="post" enctype="multipart/form-data" role="form">
              <?php } ?>
                <div class="card-body row">

                  <div class="form-group col-md-12">
                    <select class="form-control select2 form-control-sm" name="party_type_id" title="select party type" id="party_type_id" style="width: 100%;" required>
                        <option selected="selected" value="" >Select Party Type </option>
                        <?php foreach ($party_list as $party_info_list1) { ?>
                          <option value="<?php echo $party_info_list1->party_type_id; ?>" <?php if(isset($party_type_id)){ if($party_info_list1->party_type_id == $party_type_id){ echo "selected"; } }  ?>><?php echo $party_info_list1->party_type_name; ?></option>
                        <?php } ?>
                      </select>
                  </div>

                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="party_name" id="party_name"  title="Party Name" placeholder="Party Name"  value="<?php if(isset($party_name)){ echo $party_name; } ?>" required>
                  </div>

                  <div class="form-group  col-md-12">
                    <textarea name="address" id="address" class="form-control" rows="3" cols="90" title="Address" placeholder="Address"  required><?php if(isset($address)){ echo $address; } ?> </textarea>
                  </div>
                  <div class="form-group col-md-3">
                    <input type="text"  class="form-control form-control-sm" name="city" id="city" title="City" placeholder="City"  value="<?php if(isset($city)){ echo $city; } ?>" required>
                  </div>

                  <div class="form-group col-md-3">
                    <input type="text" class="form-control form-control-sm" name="pincode" id="pincode" title="Pincode"  value="<?php if(isset($pincode)){ echo $pincode; } ?>" placeholder="Pincode" required>
                  </div>

                  <div class="form-group col-md-3">
                    <select class="form-control select2 form-control-sm" name="state_name" title="Select State" id="state_name" style="width: 100%;" required>
                        <option selected="selected" value="" >Select State </option>
                        <?php foreach ($state_list as $state_list1) { ?>
                          <option value="<?php echo $state_list1->state_name; ?>" <?php if(isset($state_name)){ if($state_list1->state_name == $state_name){ echo "selected"; } }  ?>><?php echo $state_list1->state_name; ?></option>
                        <?php } ?>
                      </select>
                  </div>

                  <div class="form-group col-md-3">
                    <input type="text"  class="form-control form-control-sm" name="state_code" id="state_code" title="state Code"  value="<?php if(isset($state_code)){ echo $state_code; } ?>" placeholder="Sate Code">
                  </div>


                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="phone_no" id="phone_no" title="Phone No"  value="<?php if(isset($phone_no)){ echo $phone_no; } ?>" placeholder="Phone No" required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="mobile_no" id="mobile_no" title="Mobile No"  value="<?php if(isset($mobile_no)){ echo $mobile_no; } ?>" placeholder="Mobile No" required>
                  </div>

                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="gst_no" id="gst_no" title="GST No"  value="<?php if(isset($gst_no)){ echo $gst_no; } ?>" placeholder="GST No" required>
                  </div>

                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="pan_no" id="pan_no" title="PAN No"  value="<?php if(isset($pan_no)){ echo $pan_no; } ?>" placeholder="PAN No" required>
                  </div>

                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="vender_code" id="vender_code" title="Vendor Code"  value="<?php if(isset($vender_code)){ echo $vender_code; } ?>" placeholder="Vendor Code" required>
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
