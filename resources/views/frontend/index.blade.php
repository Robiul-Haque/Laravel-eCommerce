<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('asset/frontend/css/bootstrap.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('asset/image/laravel.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="3d32d549-ce78-43fa-8357-71ea7d91c8ee";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script> --}}
    <title>{{ config('app.name') }} - @yield('tittle')</title>
    <style>
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }
  
        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }
      </style>
</head>
<body>
  @include('frontend.layout.header')
  @yield('main')
  @include('frontend.layout.footer')
  
  <script src="{{ asset('asset/frontend/js/bootstrap.bundle.min.js') }}"></script>
  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
  <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
  <script>
    $('.text-message').delay(3000).slideUp(350);
    $('.alert').delay(16000).slideUp(550);
  </script>
  {!! Toastr::message() !!}
</body>
</html>