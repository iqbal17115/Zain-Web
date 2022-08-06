<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('apps_resource/img/') }}/favicon.ico">
    <title>JSR</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    {{-- <!--Black theme Adminux Mobile CSS -->
	<link rel="stylesheet" href="{{ asset('apps_resource/css/light_adminux.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('apps_resource/css/adminux_landiing4.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('apps_resource/vendor/font-awesome-4.7.0/css/font-awesome.min.css') }}" type="text/css"> --}}
    <style>
        table {
            width: 300px;
            font: 17px Calibri;
        }

        table,
        th,
        td {
            border: solid 1px #DDD;
            border-collapse: collapse;
            padding: 2px 3px;
            text-align: center;
        }

        .sweet-alert h2 {
            color: black;
        }

        .text-muted p {
            color: black;
        }

        .select2-results ul li {
            color: #000;
        }
    </style>
    @yield('css')
    <style>
        .text-muted {
            color: black;
        }
    </style>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

       @include('layouts.head-scripts')
</head>

<body class="menuclose menuclose-right">
    <!--Start wrapper-content-->
@include('layouts.sidebar')

    <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                   @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
        </div>
    
        @include('layouts.footer-scripts')


</body>

</html>