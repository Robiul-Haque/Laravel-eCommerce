<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('asset/image/laravel.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.jqueryui.min.css">
    <link rel="stylesheet" href="{{ asset('asset/backend/css/bootstrap.min.css') }}">
    <link href="{{ asset('asset/backend/css/dashboard.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/backend/css/custom.css') }}">
    <title>@yield('tittle')</title>
</head>
<body>
  @include('backend.layout.header');
  @include('backend.layout.sidebar')
  @yield('main')
    
  <script src="{{ asset('asset/backend/js/bootstrap.bundle.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.jqueryui.min.js"></script>
  <script src="{{ asset('asset/backend/js/dashboard.js') }}"></script>
  <script>
    $(document).ready(function () {
    $('#example').DataTable();
    $('.alert').delay(1500).slideUp(500);
    });
  </script>
</body>
</html>