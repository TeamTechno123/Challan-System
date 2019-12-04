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
            <h1>INWORD INFORMATION</h1>
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
                <h3 class="card-title">Inword Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php if(isset($update)){ ?>
                <form role="form" action="<?php echo base_url(); ?>Transaction/update_inword" method="POST" autocomplete="off">
                  <input type="hidden" name="inword_id" value="<?php echo $inword_id; ?>">
              <?php } else{ ?>
                <form role="form" action="<?php echo base_url(); ?>Transaction/save_inword" method="POST" autocomplete="off">
              <?php } ?>

                <div class="card-body row">
                  <div class="form-group col-md-4 offset-md-2">
                    <input type="text" class="form-control form-control-sm" name="inword_dc_num" id="inword_dc_num" value="<?php if(isset($inword_dc_num)){ echo $inword_dc_num; } ?>" placeholder="DC No" required>
                  </div>
                  <div class="form-group col-md-4 ">
                    <input type="text" class="form-control form-control-sm" name="inword_date" id="date1" value="<?php if(isset($inword_date)){ echo $inword_date; } ?>" data-target="#date1" data-toggle="datetimepicker" placeholder="Date" required>
                  </div>
                  <div class="form-group col-md-8 offset-md-2 drop-sm">
                    <select class="form-control select2 form-control-sm" name="party_id" id="party_id" required>
                      <option selected="selected" value="" >Select Party Name </option>
                      <?php foreach ($party_list as $party_list1) { ?>
                        <option value="<?php echo $party_list1->party_id; ?>" <?php if(isset($party_id)){ if($party_list1->party_id == $party_id){ echo "selected"; } }  ?>><?php echo $party_list1->party_name; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4 offset-md-2 drop-sm">
                    <select class="form-control select2 form-control-sm" name="vehicle_id" id="vehicle_id" required>
                      <option selected="selected">Select Vehicle No</option>
                      <?php foreach ($vehicle_list as $vehicle_list1) { ?>
                        <option value="<?php echo $vehicle_list1->vehicle_id; ?>" <?php if(isset($vehicle_id)){ if($vehicle_list1->vehicle_id == $vehicle_id){ echo "selected"; } }  ?>><?php echo $vehicle_list1->vehicle_number; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="number" min="1" class="form-control form-control-sm" name="inword_trip" id="inword_trip" value="<?php if(isset($inword_trip)){ echo $inword_trip; } ?>" placeholder="Enter No Of Trip">
                  </div>
                  <div class="form-group col-md-4 offset-md-2">
                    <input type="text" class="form-control form-control-sm" name="inword_trans" id="inword_trans" value="<?php if(isset($inword_trans)){ echo $inword_trans; } ?>" placeholder="Transport" required>
                  </div>
                  <div class="form-group col-md-4 ">
                    <input type="text" class="form-control form-control-sm" name="inword_user" id="inword_user" value="<?php echo $user_name.' '.$user_mobile; ?>" placeholder="User Name" readonly>
                    <input type="hidden" class="form-control form-control-sm" name="user_id" id="user_id" value="<?php echo $user_id; ?>" readonly>
                  </div>
                  <div class="col-md-12">
                  <hr>
                  </div>
                  <div class="form-group col-md-9">
                    <label for=""> <h3 class="card-title">Item Details</h3> </label>
                  </div>
                  <div class="form-group col-md-3 ">
                    <button id="add_row" type="button" class="btn btn-success btn-sm"> Add More</button>
                  </div>
                  <!-- Add row -->
                  <div class="col-md-12" id="myRow">
                    <div class="" style="overflow-x:auto;">
                      <table id="myTable" class="table table-bordered table-striped tbl_add" style="">
                        <thead>
                        <tr>
                          <th>Item</th>
                          <th>Remark</th>
                          <th class="td_w">Qty</th>
                          <th class="td_w">Rate</th>
                          <th class="td_w">Amount</th>
                          <th class="td_btn"></th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php if(isset($inword_details_list)){
                          $i = 0;
                          $j = 0;
                          foreach ($inword_details_list as $details) {
                            $delete = 0;
                            if($details->qty != $details->bal_qty){
                              $delete = 1;
                            }
                          $j++;  ?>
                          <input type="hidden" name="input[<?php echo $i; ?>][inword_details_id]" value="<?php echo $details->inword_details_id ?>">
                          <tr>
                            <td>
                              <select class="form-control form-control-sm item_list" name="input[<?php echo $i; ?>][item_info_id]" required>
                                <option selected="selected">Select Item Name</option>
                                <?php foreach ($item_list as $item_list1) { ?>
                                  <option value="<?php echo $item_list1->item_info_id; ?>" <?php if(isset($details->item_info_id)){ if($item_list1->item_info_id == $details->item_info_id){ echo "selected"; } }  ?>><?php echo $item_list1->item_info_name; ?></option>
                                <?php } ?>
                              </select>
                            </td>
                            <td>
                              <select class="form-control form-control-sm" name="input[<?php echo $i; ?>][remark_id]" required>
                                <option selected="selected">Select Remark</option>
                                <?php foreach ($remark_list as $remark_list1) { ?>
                                  <option value="<?php echo $remark_list1->remark_id; ?>" <?php if(isset($details->remark_id)){ if($remark_list1->remark_id == $details->remark_id){ echo "selected"; } }  ?>><?php echo $remark_list1->remark_name; ?></option>
                                <?php } ?>
                              </select>
                            </td>
                            <td class="td_w">
                              <input type="number" min="1" class="form-control form-control-sm qty" name="input[<?php echo $i; ?>][qty]" value="<?php echo $details->qty; ?>" placeholder="Qty" required>
                              <input type="hidden" class="form-control form-control-sm bal_qty" name="input[<?php echo $i; ?>][bal_qty]" value="<?php echo $details->bal_qty; ?>" >
                              <input type="hidden" class="form-control form-control-sm old_qty" value="<?php echo $details->qty; ?>" >
                            <td class="td_w">
                              <input type="number" step="0.1" min="1.0" class="form-control form-control-sm rate" name="input[<?php echo $i; ?>][rate]" value="<?php echo $details->rate; ?>" placeholder="Rate" required>
                              <input type="hidden" class="form-control form-control-sm gst" name="input[<?php echo $i; ?>][gst]" value="<?php echo $details->gst; ?>" >
                              <input type="hidden" class="form-control form-control-sm gst_amount" name="input[<?php echo $i; ?>][gst_amount]" value="<?php echo $details->gst_amount; ?>" >
                            </td>
                            <td class="td_w">
                              <input type="text" readonly class="form-control form-control-sm amount" name="input[<?php echo $i; ?>][amount]" value="<?php echo $details->amount; ?>" placeholder="Amount" required>
                            </td>
                            <td><?php if($j > 1 && $delete==0){ ?> <a><i class="fa fa-trash text-danger"></i></a> <?php } ?></td>
                          </tr>
                          <?php $i++;  } } else{ ?>
                          <tr>
                            <td>
                              <select class="form-control form-control-sm item_list" name="input[0][item_info_id]" required>
                                <option selected="selected">Select Item Name</option>
                                <?php foreach ($item_list as $item_list1) { ?>
                                  <option value="<?php echo $item_list1->item_info_id; ?>" <?php //if(isset($item_info_id)){ if($item_list1->item_info_id == $item_info_id){ echo "selected"; } }  ?>><?php echo $item_list1->item_info_name; ?></option>
                                <?php } ?>
                              </select>
                            </td>
                            <td>
                              <select class="form-control form-control-sm" name="input[0][remark_id]" required>
                                <option selected="selected">Select Remark</option>
                                <?php foreach ($remark_list as $remark_list1) { ?>
                                  <option value="<?php echo $remark_list1->remark_id; ?>" <?php //if(isset($remark_id)){ if($remark_list1->remark_id == $remark_id){ echo "selected"; } }  ?>><?php echo $remark_list1->remark_name; ?></option>
                                <?php } ?>
                              </select>
                            </td>
                            <td class="td_w">
                              <input type="number" min="1" class="form-control form-control-sm qty" name="input[0][qty]" placeholder="Qty" required>
                              <input type="hidden" class="form-control form-control-sm gst_amount" name="input[0][gst_amount]" >
                            <td class="td_w">
                              <input type="number" min="1" class="form-control form-control-sm rate" name="input[0][rate]" placeholder="Rate" required>
                              <input type="hidden" class="form-control form-control-sm gst" name="input[0][gst]" >
                            </td>
                            <td class="td_w">
                              <input type="text" readonly class="form-control form-control-sm amount" name="input[0][amount]" placeholder="Amount" required>
                            </td>
                            <td></td>
                          </tr>
                        <?php } ?>
                      </table>
                    </div>
                  </div>
                  <!-- // Add row -->
                  <div class="form-group col-md-3 offset-md-9">
                    <input type="text" class="form-control form-control-sm" name="inword_basic_amt" id="inword_basic_amt" value="<?php if(isset($inword_basic_amt)){ echo $inword_basic_amt; } ?>" placeholder="Basic Amount" readonly>
                  </div>
                  <div class="form-group col-md-3 offset-md-9">
                    <input type="text" class="form-control form-control-sm" name="inword_gst" id="inword_gst" value="<?php if(isset($inword_gst)){ echo $inword_gst; } ?>" placeholder="GST Amount" readonly>
                  </div>
                  <div class="form-group col-md-3 offset-md-9">
                    <input type="text" class="form-control form-control-sm" name="inword_net_amount" id="inword_net_amount" value="<?php if(isset($inword_net_amount)){ echo $inword_net_amount; } ?>" placeholder="Net Amount" readonly>
                  </div>
                </div>

                <div class="card-footer ">
                  <div class="col-md-8 offset-md-4">
                    <?php if(isset($update)){ ?>
                      <button type="submit" class="btn btn-primary mr-3">Update Inword</button>
                    <?php } else{ ?>
                      <button type="submit" class="btn btn-success">Add Inword </button>
                    <?php }?>

                    <a href="<?php echo base_url(); ?>Transaction/inword_information_list" class="btn btn-default ml-4">Cancel</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
<script type="text/javascript">
<?php if(isset($update)){ ?>
  var i = <?php echo $i-1; ?>
<?php } else { ?>
  var i = 1;
<?php } ?>

  $('#add_row').click(function(){
    i++;
    var row = '<tr>'+
          '<td>'+
            '<select class="form-control form-control-sm item_list" name="input['+i+'][item_info_id]" required>'+
              '<option selected="selected">Select Item Name</option>'+
              <?php foreach ($item_list as $item_list1) { ?>
                '<option value="<?php echo $item_list1->item_info_id; ?>" <?php //if(isset($item_info_id)){ if($item_list1->item_info_id == $item_info_id){ echo "selected"; } }  ?>><?php echo $item_list1->item_info_name; ?></option>'+
              <?php } ?>
            '</select>'+
          '</td>'+
          '<td>'+
            '<select class="form-control form-control-sm" name="input['+i+'][remark_id]" required>'+
              '<option selected="selected">Select Remark</option>'+
              <?php foreach ($remark_list as $remark_list1) { ?>
                '<option value="<?php echo $remark_list1->remark_id; ?>" <?php //if(isset($remark_id)){ if($remark_list1->remark_id == $remark_id){ echo "selected"; } }  ?>><?php echo $remark_list1->remark_name; ?></option>'+
              <?php } ?>
            '</select>'+
          '</td>'+
          '<td class="td_w">'+
            '<input type="text" class="form-control form-control-sm qty" name="input['+i+'][qty]" placeholder="Qty" required>'+
            '<input type="hidden" class="form-control form-control-sm gst_amount" name="input['+i+'][gst_amount]" >'+
          '</td>'+
          '<td class="td_w">'+
            '<input type="text" class="form-control form-control-sm rate" name="input['+i+'][rate]" placeholder="Rate" required>'+
            '<input type="hidden" class="form-control form-control-sm gst" name="input['+i+'][gst]" >'+
          '</td>'+
          '<td class="td_w">'+
            '<input type="text" readonly class="form-control form-control-sm amount" name="input['+i+'][amount]" placeholder="Amount" required>'+
          '</td>'+
          '<td><a><i class="fa fa-trash text-danger"></i></a></td>'+
        '</tr>';
    $('#myTable').append(row);
  });

  $('#myTable').on('click', 'a', function () {
    $(this).closest('tr').remove();
  });

  $("#inword_dc_num, #party_id").on("change",function(){
    var inword_dc_num = $('#inword_dc_num').val();
    var party_id = $('#party_id').val();

    if(party_id != '' && inword_dc_num != ''){
      // alert(party_id+' '+inword_dc_num);

      $.ajax({
        url: '<?php echo base_url(); ?>Transaction/check_inw_dup',
        type: "POST",
        data: {"inword_dc_num":inword_dc_num, "party_id":party_id},
        context: this,
        success: function (result) {
          if(result > 0){
            toastr.error('DC Number already used.');
            $('#inword_dc_num').val('');
          }
          // alert(result)
          // var data = JSON.parse(result);
          // $(this).closest('tr').find('.rate').val(data['inword_rate']);
          // $(this).closest('tr').find('.gst').val(data['gst_per']);
          // $(this).closest('tr').find('.qty').val('');
        }
    	});
    }

  });

  // Get Item Info on Select...
  $("#myTable").on("change", "select.item_list", function(){
    var item_info_id = $(this).val();
    $.ajax({
      url: '<?php echo base_url(); ?>Transaction/GetItemInfo',
      type: "POST",
      data: {"item_info_id":item_info_id},
      context: this,
      success: function (result) {
        var data = JSON.parse(result);
        $(this).closest('tr').find('.rate').val(data['inword_rate']);
        $(this).closest('tr').find('.gst').val(data['gst_per']);
        $(this).closest('tr').find('.qty').val('');
      }
  	});
  });

  // Calculate Amount... Check Valid Quantity..
  $('#myTable').on('change', 'input.qty, input.rate', function () {
    var bal_qty = $(this).closest('tr').find('.bal_qty').val();
    if(bal_qty != ''){
      var bal_qty = $(this).closest('tr').find('.bal_qty').val();
      var qty =   $(this).closest('tr').find('.qty').val();
      var old_qty =   $(this).closest('tr').find('.old_qty').val();

      if(bal_qty == ''){  bal_qty = 0; }
      if(qty == ''){  qty = 0; }
      if(old_qty == ''){  old_qty = 0; }
      var bal_qty = parseInt(bal_qty);
      var qty = parseInt(qty);
      var old_qty = parseInt(old_qty);

      if(bal_qty != old_qty && qty < old_qty){
        $(this).closest('tr').find('.qty').val(old_qty);
        alert('Invalide Qty Entered');
      }
      else{
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
        $('#inword_basic_amt').val(basic_amount.toFixed(2));
        //
        var gst_val = 0;
        $(".gst_amount").each(function() {
            var gst_amt = $(this).val();
            if(!isNaN(gst_amt) && gst_amt.length != 0) {
                gst_val += parseFloat(gst_amt);
            }
        });
        // alert(gst_val);
        $('#inword_gst').val(gst_val.toFixed(2));

        var total_amount = basic_amount + gst_val;
        total_amount = Math.ceil(total_amount);
        $('#inword_net_amount').val(total_amount);
      }
    }
  });



</script>
</body>
</html>
