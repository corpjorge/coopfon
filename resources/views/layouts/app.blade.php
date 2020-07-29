{{--

=========================================================
* CoopFon - v1.0.0
=========================================================

*
Página del producto: https://www.coopfon.com/
* Copyright 2020 CoopFon

* Codificado por www.corpjorge.com

=========================================================

--}}
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('coopfon') }}/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{ asset('coopfon') }}/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    CoopFon
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{ asset('coopfon') }}/css/coopfon.css?v=2.1.2" rel="stylesheet" />

</head>
<body class="{{ $class ?? '' }}">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @if (auth()->check() && !in_array(request()->route()->getName(), ['welcome', 'page.pricing', 'page.lock', 'page.error']))
            @include('layouts.page_templates.auth')
        @else
            @include('layouts.page_templates.guest')
        @endif

{{--        <div id="sidebar" ></div>--}}

        <!--   Core JS Files   -->
        <script src="{{ asset('coopfon') }}/js/core/jquery.min.js"></script>
        <script src="{{ asset('coopfon') }}/js/core/popper.min.js"></script>
        <script src="{{ asset('coopfon') }}/js/core/bootstrap-material-design.min.js"></script>
        <script src="{{ asset('coopfon') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!-- Plugin for the momentJs  -->
        <script src="{{ asset('coopfon') }}/js/plugins/moment.min.js"></script>
        <!--  Plugin for Sweet Alert -->
        <script src="{{ asset('coopfon') }}/js/plugins/sweetalert2.js"></script>
        <!-- Forms Validations Plugin -->
        <script src="{{ asset('coopfon') }}/js/plugins/jquery.validate.min.js"></script>
        <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
        <script src="{{ asset('coopfon') }}/js/plugins/jquery.bootstrap-wizard.js"></script>
        <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
        <script src="{{ asset('coopfon') }}/js/plugins/bootstrap-selectpicker.js"></script>
        <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
        <script src="{{ asset('coopfon') }}/js/plugins/bootstrap-datetimepicker.min.js"></script>
        <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
        <script src="{{ asset('coopfon') }}/js/plugins/jquery.dataTables.min.js"></script>
        <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
        <script src="{{ asset('coopfon') }}/js/plugins/bootstrap-tagsinput.js"></script>
        <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
        <script src="{{ asset('coopfon') }}/js/plugins/jasny-bootstrap.min.js"></script>
        <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
        <script src="{{ asset('coopfon') }}/js/plugins/fullcalendar.min.js"></script>
        <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
        <script src="{{ asset('coopfon') }}/js/plugins/jquery-jvectormap.js"></script>
        <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
        <script src="{{ asset('coopfon') }}/js/plugins/nouislider.min.js"></script>
        <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
        <!-- Library for adding dinamically elements -->
        <script src="{{ asset('coopfon') }}/js/plugins/arrive.min.js"></script>
        <!-- Chartist JS -->
        <script src="{{ asset('coopfon') }}/js/plugins/chartist.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="{{ asset('coopfon') }}/js/plugins/bootstrap-notify.js"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-173974091-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-173974091-1');
        </script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{ asset('coopfon') }}/js/material-dashboard.js?v=2.1.0" type="text/javascript"></script>
        <script src="{{ asset('coopfon') }}/js/application.js"></script>

        <script>
          $(document).ready(function () {
            @if (session('status'))
              $.notify({
                icon: "done",
                message: "{{ session('status') }}"
              }, {
                type: 'success',
                timer: 3000,
                placement: {
                  from: 'top',
                  align: 'right'
                }
              });
            @endif

            @if (session('error'))
            $.notify({
                icon: "done",
                message: "{{ session('error') }}"
            }, {
                type: 'danger',
                timer: 3000,
                placement: {
                    from: 'top',
                    align: 'right'
                }
            });
            @endif

            @if (session('warning'))
            $.notify({
                icon: "done",
                message: "{{ session('warning') }}"
            }, {
                type: 'warning',
                timer: 3000,
                placement: {
                    from: 'top',
                    align: 'right'
                }
            });
            @endif

          });

          $(function () {
              $('[data-toggle="tooltip"]').tooltip()
          })

        </script>
        @stack('js')
</body>

</html>
