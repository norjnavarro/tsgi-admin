<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Transcendo | Sales Order Module</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <?php
include 'css.php';
?>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php
include 'header.php';
include 'aside.php';
include 'models/so_model.php';

$so = new SO();
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Purchase Order from Customer
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class='box'>
    <div class='box-body'>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style='width:8%'>SO No.</th>
                  <th style='width:8%'>PO No.</th>
                  <th style='width:20%'>Customer</th>
                  <th style='width:8%'>PO Date</th>
                  <th style='width:8%'>Delivery Date</th>
                  <th style='width:8%'>Total Amount</th>
                  <th style='width:10'>Balance</th>
                  <th style='width:10'>SI Return Date</th>
                  <th style='width:10'>Due Date</th>
                  <th style='width:10%'>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        $so->show_so_records();
                    ?>
                </tbody>
              </table>

            </div>
            </div>
    </section>
    <!-- /.content -->
  </div>

  <?php
include 'footer.php';
include 'modal_viewso.php';
include 'modal_deductions.php';
include 'modal_records.php';
?>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php
include 'js.php';
?>

</body>
</html>

<script>
<?php
if (isset($_GET['success'])) {
  ?>
    swal("Success", "Successfully recorded SI return date.", "success");
    history.pushState(null, null, 'po_from_customer');
<?php
}
?>


$("#example1").DataTable();

$(document).ready(function(){
  $('#example1 tbody').on('click', '.openView', function () {
       var id = $(this).attr('id');
       window.location.href='models/sales_order_model.php?verify='+id;
   });

   $('#example1 tbody').on('click', '.viewRec', function () {
      var dataURL = $(this).attr('data-href');
        $('#view_body_records').load(dataURL,function(){
            $('#view_modal_records').modal({show:true});
        });
   });

   $('#example1 tbody').on('click', '.view', function () {
      var dataURL = $(this).attr('data-href');
        $('#view_body_so').load(dataURL,function(){
            $('#view_modal_so').modal({show:true});
        });
   });

});

</script>
