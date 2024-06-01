<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/assets/imgs/theme/favicon.svg') }}">
    <!-- Template CSS -->
    <link href="{{ asset('admin/assets/css/main.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="screen-overlay"></div>
    @include('admin.layouts.inc.sidebar')
    <main class="main-wrap">
        @include('admin.layouts.inc.header')

        @yield('content')

        @include('admin.layouts.inc.footer')
    </main>
    <script src="{{ asset('admin/assets/js/vendors/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendors/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendors/select2.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendors/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendors/jquery.fullscreen.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendors/chart.js') }}"></script>
    <!-- Main Script -->
    <script src="{{ asset('admin/assets/js/main.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/js/custom-chart.js') }}" type="text/javascript"></script>
    @yield('js')
</body>

</html>
