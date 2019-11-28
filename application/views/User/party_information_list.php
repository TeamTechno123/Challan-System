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
            <h4>PARTY INFORMATION LIST</h4>
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
              <h3 class="card-title"><i class="fa fa-list"></i>  Party Information List</h3>
              <div class="card-tools">
                <a href="<?php echo base_url(); ?>User/party_information" class="btn btn-sm btn-block btn-primary">Add Party</a>
              </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>

                <tr>
                  <th>Sr. No.</th>
                  <th>Party Group</th>
                  <th>Party Name</th>
                  <th>Mobile No 1</th>
                  <th>Mobile No 2</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                $i=0;
                foreach ($party_list as $party_list1) {
                $i++;
              ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $party_list1->party_name; ?></td>
                  <td><?php echo $party_list1->party_name; ?></td>
                  <td><?php echo $party_list1->phone_no; ?></td>
                  <td><?php echo $party_list1->mobile_no; ?></td>
                  <td>
                    <a href="<?php echo base_url(); ?>User/edit_party/<?php echo $party_list1->party_id; ?>"> <i class="fa fa-edit"></i> </a>
                    <a class="ml-4" href="<?php echo base_url(); ?>User/delete_party/<?php echo $party_list1->party_id; ?>" onclick="return confirm('Delete Confirm');"> <i class="fa fa-trash"></i> </a>
                  </td>
                </tr>
                  <?php  }  ?>
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
