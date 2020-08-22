<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title><meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{asset('backend/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/css/bootstrap-material.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{asset('backend/css/app-material.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
    <link href="{{asset('backend/css/bootstrap-material-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
    <link href="{{asset('backend/css/app-material-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />
    <link href="{{asset('backend/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/css/main.css')}}" rel="stylesheet" type="text/css" />
</head>
<body>

    @yield('content')


    <script src="{{asset('backend/js/vendor.min.js')}}"></script>
    <script src="{{asset('backend/libs/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('backend/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('backend/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('backend/js/pages/dashboard-2.init.js')}}"></script>
    <script src="{{asset('backend/js/app.min.js')}}"></script>
    <script src="{{asset('backend/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('backend/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('backend/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('backend/libs/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('backend/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('backend/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('backend/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>
    <script src="{{asset('backend/libs/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('backend/libs/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('backend/js/pages/datatables.init.js')}}"></script>

    @yield('after_script')
    <script>
        $(document).ready( function () {
            $('#adminList_table').DataTable();
        });
       

    </script>
  
</body>

