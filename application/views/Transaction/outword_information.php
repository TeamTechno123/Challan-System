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
            <h1>OUTWORD INFORMATION</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12 ">
            <!-- general form elements -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Outword Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php if(isset($update)){ ?>
                <form role="form" action="<?php echo base_url(); ?>Transaction/update_outword" method="POST" autocomplete="off">
                  <input type="hidden" name="outword_id" value="<?php echo $outword_id; ?>">
              <?php } else{ ?>
                <form role="form" action="<?php echo base_url(); ?>Transaction/save_outword" method="POST" autocomplete="off">
              <?php } ?>

                <div class="card-body row">
                  <div class="form-group col-md-4 offset-md-2">
                    <input type="text" class="form-control form-control-sm" name="outword_dc_num" id="outword_dc_num" value="<?php  if(isset($outword_dc_num)){ echo $outword_dc_num; }?>" placeholder="DC No" readonly>
                  </div>
                  <div class="form-group col-md-4 ">
                    <input type="text" class="form-control form-control-sm" name="outword_date" id="date1" value="<?php  if(isset($outword_date)){ echo $outword_date; }?>" data-target="#date1" data-toggle="datetimepicker" placeholder="Date">
                  </div>
                  <div class="form-group col-md-4 offset-md-2">
                    <input type="text" class="form-control form-control-sm" name="outword_E_no" id="outword_E_no" value="<?php  if(isset($outword_E_no)){ echo $outword_E_no; }?>" placeholder="Eway Bill No.">
                  </div>
                  <div class="form-group col-md-4 ">
                    <input type="text" class="form-control form-control-sm" name="outword_E_date" id="date2" value="<?php  if(isset($outword_E_date)){ echo $outword_E_date; }?>" data-target="#date2" data-toggle="datetimepicker" placeholder="Eway Bill Date">
                  </div>
                  <div class="form-group drop-sm col-md-8 offset-md-2">
                    <select class="form-control select2 form-control-sm" name="party_id" id="party_id" required>
                      <option selected="selected" value="" >Select Party Name </option>
                      <?php foreach ($party_list as $party_list1) { ?>
                        <option value="<?php echo $party_list1->party_id; ?>" <?php if(isset($party_id)){ if($party_list1->party_id == $party_id){ echo "selected"; } }  ?>><?php echo $party_list1->party_name; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group col-md-4 offset-md-2">
                    <select class="form-control select2 form-control-sm" name="vehicle_id" id="vehicle_id" required>
                      <option selected="selected" value="">Select Vehicle No</option>
                      <?php foreach ($vehicle_list as $vehicle_list1) { ?>
                        <option value="<?php echo $vehicle_list1->vehicle_id; ?>" <?php if(isset($vehicle_id)){ if($vehicle_list1->vehicle_id == $vehicle_id){ echo "selected"; } }  ?>><?php echo $vehicle_list1->vehicle_number; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4 ">
                    <input type="number" min="1" class="form-control form-control-sm" name="outword_trip" id="outword_trip" value="<?php  if(isset($outword_trip)){ echo $outword_trip; }?>" placeholder="Number of Trip">
                  </div>
                  <div class="form-group col-md-4 offset-md-2">
                    <input type="text" class="form-control form-control-sm" name="outword_trans" id="outword_trans" value="<?php  if(isset($outword_trans)){ echo $outword_trans; }?>" placeholder="Transport Name">
                  </div>
                  <div class="form-group col-md-4 ">
                    <input type="text" class="form-control form-control-sm" name="outword_user" id="outword_user" value="<?php echo $user_name.' '.$user_mobile; ?>" placeholder="User Name" readonly>
                    <input type="hidden" class="form-control form-control-sm" name="user_id" id="user_id" value="<?php echo $user_id; ?>" readonly>
                  </div>
                  <div class="form-group col-md-4 offset-md-2">
                    <input type="text" class="form-control form-control-sm" name="outword_title" id="outword_title" value="<?php  if(isset($outword_title)){ echo $outword_title; } else{ echo "LABOUR CHARGES ONLY"; }?>" placeholder="Outword Title">
                  </div>

                  <div class="form-group col-md-12">
                    <hr>
                  </div>
                  <div class="form-group col-md-9">
                    <label for="">  <h3 class="card-title">Item Details</h3> </label>
                  </div>

                  <!-- Add Row -->
                  <div class="col-md-12" id="myRow">
                    <div class="" style="overflow-x:auto;">
                      <table id="myTable" class="table table-bordered table-striped tbl_add" style="">
                        <thead>
                        <tr>
                          <th>Item</th>
                          <th>Remark</th>
                          <th class="td_w">Gst</th>
                          <th class="td_w">Qty</th>
                          <th class="td_w">Rate</th>
                          <th class="td_w">Amount</th>
                          <th class="td_btn"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(isset($outword_details_list)){
                        $i = 0;
                        $j = 0;
                        foreach ($outword_details_list as $details) {
                        $j++;  ?>
                        <input type="hidden" name="input[<?php echo $i; ?>][outword_details_id]" value="<?php echo $details->outword_details_id ?>">
                        <tr>
                          <td>
                            <select class="form-control form-control-sm item_list" name="input[<?php echo $i; ?>][item_info_id]" required>
                              <option selected="selected" value="">Select Item Name</option>
                              <?php foreach ($item_list as $item_list1) { ?>
                                <option value="<?php echo $item_list1->item_info_id; ?>" <?php if(isset($details->item_info_id)){ if($item_list1->item_info_id == $details->item_info_id){ echo "selected"; } }  ?>><?php echo $item_list1->item_info_name; ?></option>
                              <?php } ?>
                            </select>
                            <p class="text-danger mb-0 stock"></p>
                          </td>
                          <td>
                            <select class="form-control form-control-sm" name="input[<?php echo $i; ?>][remark_id]" required>
                              <option selected="selected" value="">Select Remark</option>
                              <?php foreach ($remark_list as $remark_list1) { ?>
                                <option value="<?php echo $remark_list1->remark_id; ?>" <?php if(isset($details->remark_id)){ if($remark_list1->remark_id == $details->remark_id){ echo "selected"; } }  ?>><?php echo $remark_list1->remark_name; ?></option>
                              <?php } ?>
                            </select>
                          </td>
                          <td class="td_w">
                            <input type="number" min="0" class="form-control form-control-sm gst" name="input[<?php echo $i; ?>][gst]" value="<?php echo $details->gst; ?>" placeholder="Gst" readonly>
                          </td>
                          <td class="td_w">
                            <input type="number" min="1" class="form-control form-control-sm qty" name="input[<?php echo $i; ?>][qty]" value="<?php echo $details->qty; ?>" placeholder="Qty" required>
                            <input type="hidden" class="form-control form-control-sm gst_amount" name="input[<?php echo $i; ?>][gst_amount]" value="<?php echo $details->gst_amount; ?>" >
                            <p style="display:none;" class="text-danger m-0 p-0 out_stock">Out Of Stock</p>
                          <td class="td_w">
                            <input type="number" step="0.1" min="1.0" class="form-control form-control-sm rate" name="input[<?php echo $i; ?>][rate]" value="<?php echo $details->rate; ?>" placeholder="Rate" required>
                          </td>
                          <td class="td_w">
                            <input type="text" readonly class="form-control form-control-sm amount" name="input[<?php echo $i; ?>][amount]" value="<?php echo $details->amount; ?>" placeholder="Amount" required>
                          </td>
                          <td><?php if($j > 1 ){ ?> <a><i class="fa fa-trash text-danger"></i></a> <?php } ?></td>
                        </tr>
                        <?php $i++;  } } else{ ?>
                        <tr>
                          <td>
                            <select class="form-control form-control-sm item_list" name="input[0][item_info_id]" required>
                              <option selected="selected" value="">Select Item Name</option>
                              <?php foreach ($item_list as $item_list1) { ?>
                                <option value="<?php echo $item_list1->item_info_id; ?>" <?php //if(isset($item_info_id)){ if($item_list1->item_info_id == $item_info_id){ echo "selected"; } }  ?>><?php echo $item_list1->item_info_name; ?></option>
                              <?php } ?>
                            </select>
                            <p class="text-danger mb-0 stock"></p>
                          </td>
                          <td>
                            <select class="form-control form-control-sm" name="input[0][remark_id]" required>
                              <option selected="selected" value="">Select Remark</option>
                              <?php foreach ($remark_list as $remark_list1) { ?>
                                <option value="<?php echo $remark_list1->remark_id; ?>" <?php //if(isset($remark_id)){ if($remark_list1->remark_id == $remark_id){ echo "selected"; } }  ?>><?php echo $remark_list1->remark_name; ?></option>
                              <?php } ?>
                            </select>
                          </td>
                          <td class="td_w">
                            <input type="number" min="0" class="form-control form-control-sm gst" name="input[0][gst]" placeholder="Gst" readonly>
                          </td>
                          <td class="td_w">
                            <input type="number" min="1" class="form-control form-control-sm qty" name="input[0][qty]" placeholder="Qty" required>
                            <input type="hidden" class="form-control form-control-sm gst_amount" name="input[0][gst_amount]" >
                            <p style="display:none;" class="text-danger m-0 p-0 out_stock">Out Of Stock</p>
                          <td class="td_w">
                            <input type="number" step="0.1" min="1.0" class="form-control form-control-sm rate" name="input[0][rate]" placeholder="Rate" required>
                          </td>
                          <td class="td_w">
                            <input type="text" readonly class="form-control form-control-sm amount" name="input[0][amount]" placeholder="Amount" required>
                          </td>
                          <td></td>
                        </tr>
                      <?php } ?>


                      </tbody>
                    </table>
                  </div>
                </div>
                  <!-- // Add Row -->
                  <div class="form-group col-md-3 offset-md-9">
                    <input type="text" class="form-control form-control-sm" name="outword_basic_amt" id="outword_basic_amt" value="<?php  if(isset($outword_basic_amt)){ echo $outword_basic_amt; }?>" placeholder="Basic Amount" readonly>
                  </div>
                  <div class="form-group col-md-3 offset-md-9">
                    <input type="text" class="form-control form-control-sm" name="outword_gst" id="outword_gst" value="<?php  if(isset($outword_gst)){ echo $outword_gst; }?>" placeholder="GST Amount" readonly>
                  </div>
                  <div class="form-group col-md-3 offset-md-9">
                    <input type="text" class="form-control form-control-sm" name="outword_net_amount" id="outword_net_amount" value="<?php  if(isset($outword_net_amount)){ echo $outword_net_amount; }?>" placeholder="Net Amount" readonly>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer ">
                  <div class="col-md-8 offset-md-4">
                    <?php if(isset($update)){ ?>
                      <button type="submit" class="btn btn-primary mr-3">Update Outword</button>
                    <?php } else{ ?>
                      <button type="submit" class="btn btn-success">Add Outword </button>
                    <?php } ?>
                    <a href="<?php echo base_url(); ?>Transaction/outword_information_list" class="btn btn-default ml-4">Cancel</a>
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

  <script type="text/javascript">
  <?php if(isset($update)){ ?>
    var i = <?php echo $i-1; ?>;
  <?php } else { ?>
    var i = 1;
  <?php } ?>

    $('#add_row').click(function(){
      i++;
      var row = '<tr>'+
            '<td>'+
              '<select class="form-control form-control-sm item_list" name="input[0][item_info_id]" required>'+
                '<option selected="selected" value="">Select Item Name</option>'+
                <?php foreach ($item_list as $item_list1) { ?>
                  '<option value="<?php echo $item_list1->item_info_id; ?>" <?php //if(isset($item_info_id)){ if($item_list1->item_info_id == $item_info_id){ echo "selected"; } }  ?>><?php echo $item_list1->item_info_name; ?></option>'+
                <?php } ?>
              '</select>'+
              '<span class="text-danger stock"></span>'+
            '</td>'+
            '<td>'+
              '<select class="form-control form-control-sm" name="input[0][remark_id]" required>'+
                '<option selected="selected" value="">Select Remark</option>'+
                <?php foreach ($remark_list as $remark_list1) { ?>
                  '<option value="<?php echo $remark_list1->remark_id; ?>" <?php //if(isset($remark_id)){ if($remark_list1->remark_id == $remark_id){ echo "selected"; } }  ?>><?php echo $remark_list1->remark_name; ?></option>'+
                <?php } ?>
              '</select>'+
            '</td>'+
            '<td class="td_w">'+
              '<input type="number" min="0" class="form-control form-control-sm gst" name="input[0][gst]" placeholder="Gst" readonly>'+
            '</td>'+
            '<td class="td_w">'+
              '<input type="text" class="form-control form-control-sm qty" name="input[0][qty]" placeholder="Qty" required>'+
              '<input type="hidden" class="form-control form-control-sm gst_amount" name="input[0][gst_amount]" >'+
            '</td>'+
            '<td class="td_w">'+
              '<input type="text" class="form-control form-control-sm rate" name="input[0][rate]" placeholder="Rate" required>'+
            '</td>'+
            '<td class="td_w">'+
              '<input type="text" readonly class="form-control form-control-sm amount" name="input[0][amount]" placeholder="Amount" required>'+
            '</td>'+
            '<td><a><i class="fa fa-trash text-danger"></i></a></td>'+
          '</tr>';
      $('#myTable').append(row);
    });

    $('#myTable').on('click', 'a', function () {
      $(this).closest('tr').remove();
    });

<?php if(isset($update)){ ?>
  $(document).ready(function(){
    $('select.item_list').each(function(){
      var item_info_id = $(this).val();
      $.ajax({
        url: '<?php echo base_url(); ?>Transaction/GetItemInfo',
        type: "POST",
        data: {"item_info_id":item_info_id},
        context: this,
        success: function (result) {
          var data = JSON.parse(result);
          // $(this).closest('tr').find('.rate').val(data['outword_rate']);
          // $(this).closest('tr').find('.gst').val(data['gst_per']);
          // alert(data['stock']);
          $(this).closest('tr').find('.stock').html('Available Stock : <span class="stock-val">'+data['stock']+'</span>');
        }
      });
    })
  });
<?php } ?>

    $("#myTable").on("change", "select.item_list", function(){
      var item_info_id = $(this).val();
      $.ajax({
        url: '<?php echo base_url(); ?>Transaction/GetItemInfo',
        type: "POST",
        data: {"item_info_id":item_info_id},
        context: this,
        success: function (result) {
          var data = JSON.parse(result);
          $(this).closest('tr').find('.rate').val(data['outword_rate']);
          $(this).closest('tr').find('.gst').val(data['gst_per']);
          $(this).closest('tr').find('.qty').val('');
          // alert(data['stock']);
          $(this).closest('tr').find('.stock').html('Available Stock : <span class="stock-val">'+data['stock']+'</span>');
        }
    	});
    });

    $('#myTable').on('change', 'input.qty, input.rate', function () {
      //alert();
      var stock_val = $(this).closest('tr').find('.stock-val').text();
      var gst =   $(this).closest('tr').find('.gst').val();
      var qty =   $(this).closest('tr').find('.qty').val();
      var rate =   $(this).closest('tr').find('.rate').val();

      if(gst == ''){
        gst = 0;
      }
      if(qty == ''){
        qty = 0;
      }
      if(rate == ''){
        rate = 0;
      }
      var gst = parseInt(gst);
      var qty = parseInt(qty);
      var rate = parseFloat(rate);
      if(qty > stock_val){
        $(this).closest('tr').find('.qty').val('');
        $(this).closest('tr').find('.out_stock').show().delay(5000).fadeOut();
      }
      else{
        var amount_without_gst = qty * rate;
        var gst_amount = (gst/100) * amount_without_gst;
        var amount_with_gst = amount_without_gst + gst_amount;

        $(this).closest('tr').find('.amount').val(amount_without_gst.toFixed(2));
        $(this).closest('tr').find('.gst_amount').val(gst_amount.toFixed(2));

        var basic_amount = 0;
        $(".amount").each(function() {
            var amount = $(this).val();
            if(!isNaN(amount) && amount.length != 0) {
                basic_amount += parseFloat(amount);
            }
        });
        // alert(basic_amount);
        $('#outword_basic_amt').val(basic_amount.toFixed(2));
        //
        var gst_val = 0;
        $(".gst_amount").each(function() {
            var gst_amount = $(this).val();
            if(!isNaN(gst_amount) && gst_amount.length != 0) {
                gst_val += parseFloat(gst_amount);
            }
        });
        $('#outword_gst').val(gst_val.toFixed(2));

        var total_amount = basic_amount + gst_val;
        total_amount = Math.ceil(total_amount);
        $('#outword_net_amount').val(total_amount);
      }
    });

    $('#myTable').on('keyup', 'input.qty', function () {

    });

  </script>

</body>
</html>
