<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WebERP</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo e(asset('css/daterangepicker/daterangepicker.css')); ?>">

    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?php echo e(asset('css/tempusdominus-bootstrap-4.min.css')); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('css/fontawesome-free/css/all.min.css')); ?>">
    <!-- Ionicons -->


    <link rel="stylesheet" href="<?php echo e(asset('css/adminlte.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?> ">
    <link rel="stylesheet" href="<?php echo e(asset('css/datatables-responsive/css/responsive.bootstrap4.min.css')); ?> ">

    <!-- jQuery -->
    <script src="<?php echo e(asset('js/jquery.min.js')); ?> "></script>

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo e(asset('js/jquery-ui.min.js')); ?>  "></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo e(asset('js/bootstrap/bootstrap.bundle.js')); ?>  "></script>

    <script src="<?php echo e(asset('js/datatables/jquery.dataTables.min.js')); ?>  "></script>

    <script src="<?php echo e(asset('js/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>  "></script>
    <script src="<?php echo e(asset('js/datatables-responsive/js/dataTables.responsive.min.js')); ?>  "></script>
    <script src="<?php echo e(asset('js/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>  "></script>
    <script src="<?php echo e(asset('js/moment.min.js')); ?>  "></script>
    <script src="<?php echo e(asset('js/bootstrap/tempusdominus-bootstrap-4.min.js')); ?>  "></script>

    <script src="<?php echo e(asset('js/inputmask/min/jquery.inputmask.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/daterangepicker/daterangepicker.js')); ?>"></script>

    <!-- AdminLTE App -->
    <script src="<?php echo e(asset('js/adminlte.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vue.js')); ?>"></script>
    <script src="<?php echo e(asset('js/axios.min.js')); ?>"></script>

    <script>
        $(function () {
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

            $('#swab_datetime').datetimepicker();
            $('#result_availability_datetime').datetimepicker();
            $('#request_datetime').datetimepicker();

            $('#completed_datetime').datetimepicker();
            $('#rejected_datetime').datetimepicker();
            $('#expired_datetime').datetimepicker();

        });

    </script>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/layouts/login_layout.blade.php ENDPATH**/ ?>