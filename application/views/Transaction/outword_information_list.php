<!DOCTYPE html>
<html>
<?php
$page = "make_information_list";
?>
<style>
  td{
    padding:2px 10px !important;
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
          <div class="col-sm-12 mt-1">
            <h4>OUTWORD INFORMATION LIST</h4>
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
            <div class="card-header">
              <h3 class="card-title"><i class="fa fa-list"></i> Outword Information List</h3>
              <div class="card-tools">
                <a href="<?php echo base_url(); ?>Transaction/outword_information" class="btn btn-sm btn-block btn-primary">Add Outword</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Date </th>
                  <th>Outword No</th>
                  <th>Party Name</th>
                  <th>Net Amount</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $i = 0;
                  foreach($outword_list as $list){
                    $i++;
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $list->outword_date; ?></td>
                  <td><?php echo $list->outword_dc_num; ?></td>
                  <td><?php echo $list->party_name; ?></td>
                  <td><?php echo $list->outword_net_amount; ?></td>
                  <td>
                    <a href="<?php echo base_url(); ?>Transaction/edit_outword/<?php echo $list->outword_id; ?>"> <i class="fa fa-edit"></i> </a>
                    <a href="<?php echo base_url(); ?>Transaction/delete_outword/<?php echo $list->outword_id; ?>" class="ml-2" onclick=" return confirm('Do you want to delete.')"> <i class="fa fa-trash"></i> </a>
                    <a href="<?php echo base_url(); ?>Report/delivery_challan_receipt/<?php echo $list->outword_id; ?>" class="ml-2"> <i class="fa fa-print"></i> </a>
                  </td>
                </tr>
              <?php } ?>
              </tbody>
              </table>
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
