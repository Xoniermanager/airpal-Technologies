<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Xonier technologies">
    <meta property="og:asset" content="">
    <meta property="og:type" content="website">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="/assets/img/logo.png">
    <meta property="twitter:domain" content="">
    <meta property="twitter:asset" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="{{ site('website_logo') ?? '' }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Airpal Technology</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ site('website_favicon') ?? '' }}">

    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/css/feathericon.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/datatables/datatables.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/css/custom.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('/assets/css/custom.css') }}" type="text/css">

    <script src="{{ asset('/assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{asset('/assets/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
    <link href="https://kendo.cdn.telerik.com/themes/7.2.1/default/default-main.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="{{ asset('admin/assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery-ui.css') }}"></script>
    <script src="{{ asset('admin/assets/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        window.site_admin_base_url = '{{ env('SITE_ADMIN_BASE_URL') }}';
        window.site_base_url = '{{ env('SITE_BASE_URL') }}';
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Loading default app.css and app.js -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .k-list-item.k-selected,
        .k-selected.k-list-optionlabel {
            color: #ffffff;
            background-color: #1b5a90;
        }

        .error {
            color: red;
            font-weight: 600;
        }
    </style>
    <script>
        // for active menu script 
        $(document).ready(function() {
            var currentUrl = window.location.pathname;
            var fullUrl = window.location.origin + currentUrl;
            $('.menu-item').each(function() {
                var url = $(this).data('url');
                if (fullUrl == url) {
                    $(this).addClass('active');
                }
            });
        });
    </script>

</head>

<body>
    @include('layouts.admin.sidebar-menu')
    @yield('content')
    @include('layouts.admin.footer')
</body>

</html>
@yield('javascript')
