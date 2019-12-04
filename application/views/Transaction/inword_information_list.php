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
            <h4>INWORD INFORMATION LIST</h4>
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
              <h3 class="card-title"><i class="fa fa-list"></i>  Inword Information List</h3>
              <div class="card-tools">
                <a href="<?php echo base_url(); ?>Transaction/inword_information" class="btn btn-sm btn-block btn-primary">Add Inword</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Date </th>
                  <th>Inword No</th>
                  <th>Party Name</th>
                  <th>Net Amount</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $i = 0;
                  foreach($inword_list as $list){
                    $inword_id = $list->inword_id;
                    $i++;
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $list->inword_date; ?></td>
                  <td><?php echo $list->inword_dc_num; ?></td>
                  <td><?php echo $list->party_name; ?></td>
                  <td><?php echo $list->inword_net_amount; ?></td>
                  <td>
                    <a href="<?php echo base_url(); ?>Transaction/edit_inword/<?php echo $list->inword_id; ?>"> <i class="fa fa-edit"></i> </a>
                    <a href="<?php echo base_url(); ?>Transaction/delete_inword/<?php echo $list->inword_id; ?>" class="ml-2" onclick=" return confirm('Delete Inword');">
                      <i class="fa fa-trash"></i>
                    </a>
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
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
  <?php if($this->session->flashdata('delete_error')){
  ?>
  <script type="text/javascript">
    $(document).ready(function(){
      toastr.error('Inword in Use, Can Not Delete.');
    });
  </script>
  <?php } ?>
</body>
</html>
