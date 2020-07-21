<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WebERP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo e(asset('css/daterangepicker/daterangepicker.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/tempusdominus-bootstrap-4.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/fontawesome-free/css/all.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/adminlte.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?> ">
  <link rel="stylesheet" href="<?php echo e(asset('css/datatables-responsive/css/responsive.bootstrap4.min.css')); ?> ">
  <script src="<?php echo e(asset('js/jquery.min.js')); ?> "></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    <?php echo $__env->make('partials.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div id="right-panel" class="right-panel">
      <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <div class="content-wrapper">
        <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
      </div>
    </div>
    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>

  <script src="<?php echo e(asset('js/jquery-ui.min.js')); ?>  "></script>
  <script>
  $.widget.bridge('uibutton', $.ui.button)
  </script>
  <script src="<?php echo e(asset('js/bootstrap/bootstrap.bundle.js')); ?>  "></script>
  <script src="<?php echo e(asset('js/datatables/jquery.dataTables.min.js')); ?>  "></script>
  <script src="<?php echo e(asset('js/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>  "></script>
  <script src="<?php echo e(asset('js/datatables-responsive/js/dataTables.responsive.min.js')); ?>  "></script>
  <script src="<?php echo e(asset('js/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>  "></script>
  <script src="<?php echo e(asset('js/moment.min.js')); ?>  "></script>
  <script src="<?php echo e(asset('js/bootstrap/tempusdominus-bootstrap-4.min.js')); ?>  "></script>
  <script src="<?php echo e(asset('js/inputmask/min/jquery.inputmask.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('js/daterangepicker/daterangepicker.js')); ?>"></script>
  <script src="<?php echo e(asset('js/adminlte.js')); ?>"></script>
  <script src="<?php echo e(asset('js/vue.js')); ?>"></script>
  <script src="<?php echo e(asset('js/axios.min.js')); ?>"></script>

  <script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "order": [0, "desc"],
    });
    $("#example2").DataTable({
      "responsive": true,
      "autoWidth": false,
      "order": [0, "desc"],
    });

    $("#example3").DataTable({
      "responsive": true,
      "autoWidth": false,
      "order": [0, "desc"],
    });

    $("#example4").DataTable({
      "responsive": true,
      "autoWidth": false,
      "order": [0, "desc"],
    });

    $("#asc_first_column1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "order": [0, "asc"],
    });

    $("#asc_first_column2").DataTable({
      "responsive": true,
      "autoWidth": false,
      "order": [0, "asc"],
    });

    $("#desc_last_column1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "order": [4, "desc"],
    });

    $("#desc_second_column2").DataTable({
      "responsive": true,
      "autoWidth": false,
      "order": [1, "desc"],
    });

    $("#table_without_search1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "order": [0, "asc"],
      "searching": false,
    });

    $("#table_without_search2").DataTable({
      "paging": false,
      "responsive": true,
      "autoWidth": false,
      "order": [0, "asc"],
      "searching": false,
    });

    $('#analytics1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "order": [1, "desc"],
    });

    $('#pos_2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "order": [1, "desc"],
    });

    $('#payment_date').datetimepicker();
    $('#receive_date').datetimepicker();

    $('#completed_datetime').datetimepicker();
    $('#rejected_datetime').datetimepicker();
    $('#expired_datetime').datetimepicker();

  });

  $(document).ready(function() {
    $('[rel="tooltip"]').tooltip({
      trigger: "hover"
    });

    $(".delete").on("click", function() {
      return confirm("Do you want to delete this?");
    });
  });
  </script>

</body>

</html><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/layouts/main_layout.blade.php ENDPATH**/ ?>