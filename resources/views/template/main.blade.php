<!DOCTYPE html>
<html lang="en" >

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> @yield('titulo') </title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/miCss.css') }}" rel="stylesheet">




    <!-- Custom styles for this template -->

  </head>

  <body style="background-color: black;" >
    @include('template/nav')
    @yield('cuerpo')

<footer >
<p style="color: white;text-align: center;padding-top: 10px;"> Todos los derechos Reservados -- 2018 </p>
</footer>
        <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('plugins/js/fontawesome-all.js') }}"></script>
    <script src="{{ asset('plugins/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery/jquery-3.2.1.slim.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('plugins/js/fileinput.min.js') }}" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    @yield('scripts')

  </body>

</html>