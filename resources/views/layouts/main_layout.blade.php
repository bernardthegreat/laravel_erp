<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WebERP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('css/tempusdominus-bootstrap-4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/datatables-bs4/css/dataTables.bootstrap4.min.css') }} ">
  <link rel="stylesheet" href="{{ asset('css/datatables-responsive/css/responsive.bootstrap4.min.css') }} ">
  <script src="{{ asset('js/jquery.min.js') }} "></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    @include('partials.nav')
    <div id="right-panel" class="right-panel">
      @include('partials.header')
      <div class="content-wrapper">
        @include('flash-message')
        @yield('content')
      </div>
    </div>
    @include('partials.footer')
  </div>

  <script src="{{ asset('js/jquery-ui.min.js') }}  "></script>
  <script>
  $.widget.bridge('uibutton', $.ui.button)
  </script>
  <script src="{{ asset('js/bootstrap/bootstrap.bundle.js') }}  "></script>
  <script src="{{ asset('js/datatables/jquery.dataTables.min.js') }}  "></script>
  <script src="{{ asset('js/datatables-bs4/js/dataTables.bootstrap4.min.js') }}  "></script>
  <script src="{{ asset('js/datatables-responsive/js/dataTables.responsive.min.js') }}  "></script>
  <script src="{{ asset('js/datatables-responsive/js/responsive.bootstrap4.min.js') }}  "></script>
  <script src="{{ asset('js/moment.min.js') }}  "></script>
  <script src="{{ asset('js/bootstrap/tempusdominus-bootstrap-4.min.js') }}  "></script>
  <script src="{{ asset('js/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
  <script src="{{ asset('js/daterangepicker/daterangepicker.js') }}"></script>
  <script src="{{ asset('js/adminlte.js') }}"></script>
  <script src="{{ asset('js/vue.js') }}"></script>
  <script src="{{ asset('js/axios.min.js') }}"></script>

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

</html>