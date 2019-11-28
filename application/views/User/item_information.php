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
            <h1>ITEM INFORMATION</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-10 offset-md-1">
            <!-- general form elements -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Item Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php if(isset($update)){ ?>
                <form action="<?php echo base_url(); ?>User/update_item" method="post" enctype="multipart/form-data" role="form">
                  <input type="hidden" name="item_info_id" value="<?php echo $item_info_id; ?>">
              <?php }else{ ?>
                <form action="<?php echo base_url(); ?>User/save_item" method="post" enctype="multipart/form-data" role="form">
              <?php } ?>
                <div class="card-body row">

                  <div class="form-group col-md-4">
                    <input type="text" class="form-control form-control-sm" name="item_info_name" id="item_info_name" placeholder="Enter Item Name"  value="<?php if(isset($item_info_name)){ echo $item_info_name; } ?>"  required>
                  </div>

                  <div class="form-group col-md-4">
                    <input type="text" class="form-control form-control-sm" name="part_code" id="part_code" placeholder="Enter Part Code"  value="<?php if(isset($part_code)){ echo $part_code; } ?>"  required>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control form-control-sm" name="hsn_code" id="hsn_code" placeholder="HSN / SAC Code"  value="<?php if(isset($hsn_code)){ echo $hsn_code; } ?>"  required>
                  </div>

                  <div class="form-group col-md-6">
                    <select class="form-control select2 form-control-sm" name="gst_slab" id="gst_slab" style="width: 100%;" required>
                        <option selected="selected" value="" >Select GST Slab </option>
                        <?php foreach ($gst_list as $gst_list1) { ?>
                          <option value="<?php echo $gst_list1->gst_id; ?>" <?php if(isset($gst_slab)){ if($gst_list1->gst_id == $gst_slab){ echo "selected"; } }  ?>><?php echo $gst_list1->gst_per; ?></option>
                        <?php } ?>
                      </select>
                  </div>
                  <div class="form-group col-md-6">
                    <select class="form-control select2 form-control-sm" name="party_id" id="party_id" style="width: 100%;" required>
                        <option selected="selected" value="" >Select Party Name </option>
                        <?php foreach ($party_list as $party_list1) { ?>
                          <option value="<?php echo $party_list1->party_id; ?>" <?php if(isset($party_id)){ if($party_list1->party_id == $party_id){ echo "selected"; } }  ?>><?php echo $party_list1->party_name; ?></option>
                        <?php } ?>
                      </select>
                  </div>

                  <div class="form-group col-md-6">
                    <select class="form-control select2 form-control-sm" name="item_group_id" id="item_group_id" style="width: 100%;" required>
                        <option selected="selected" value="" >Select Item Group </option>
                        <?php foreach ($item_group_list as $item_group_list1) { ?>
                          <option value="<?php echo $item_group_list1->item_group_id; ?>" <?php if(isset($item_group_id)){ if($item_group_list1->item_group_id == $item_group_id){ echo "selected"; } }  ?>><?php echo $item_group_list1->item_group_name; ?></option>
                        <?php } ?>
                      </select>
                  </div>
                  <div class="form-group col-md-6">
                    <select class="form-control select2 form-control-sm" name="unit_id" id="unit_id" style="width: 100%;" required>
                        <option selected="selected" value="" >Select Unit </option>
                        <?php foreach ($unit_list as $unit_list1) { ?>
                          <option value="<?php echo $unit_list1->unit_id; ?>" <?php if(isset($unit_id)){ if($unit_list1->unit_id == $unit_id){ echo "selected"; } }  ?>><?php echo $unit_list1->unit_name; ?></option>
                        <?php } ?>
                      </select>
                  </div>

                  <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="inword_rate" id="inword_rate" placeholder="Inword Rate"  value="<?php if(isset($inword_rate)){ echo $inword_rate; } ?>"  required>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="outword_rate" id="outword_rate" placeholder="Outword Rate"  value="<?php if(isset($outword_rate)){ echo $outword_rate; } ?>"  required>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="ci_boring_weight" id="ci_boring_weight" placeholder="CI Boaring Weight Per Item"  value="<?php if(isset($ci_boring_weight)){ echo $ci_boring_weight; } ?>"  required>
                  </div>

                  <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="po_number" id="po_number" placeholder="PO No"  value="<?php if(isset($po_number)){ echo $po_number; } ?>"  required>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control date" name="po_date" id="date1" data-target="#date1" data-toggle="datetimepicker" placeholder="PO Date"  value="<?php if(isset($po_date)){ echo $po_date; } ?>"  required >
                  </div>
                  <div class="form-group col-md-4">
                    <!-- <input type="text" class="form-control" name="company_end_date" id="date2" value="31-3-2020" data-target="#date2" data-toggle="datetimepicker" placeholder="Fin End Date"> -->
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
