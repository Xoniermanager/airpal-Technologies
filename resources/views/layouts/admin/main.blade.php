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
    <meta property="og:image" content="/assets/img/preview-banner.jpg">
    <meta property="twitter:domain" content="">
    <meta property="twitter:asset" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="{{asset('/assets/img/preview-banner.jpg')}}">
    <title>Airpal Technology</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/img/favicon.png')}}">

    <link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/plugins/fontawesome/css/all.min.css')}}">

    <link rel="stylesheet" href="{{ asset('admin/assets/css/feathericon.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin/assets/plugins/datatables/datatables.min.css')}}">

    <link rel="stylesheet" href="{{ asset('admin/assets/css/custom.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/css/custom.css') }}" type="text/css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://kendo.cdn.telerik.com/themes/7.2.1/default/default-main.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="{{asset('/assets/js/jquery-3.7.1.min.js')}}"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<style>
    .k-list-item.k-selected, .k-selected.k-list-optionlabel {
    color: #ffffff;
    background-color: #1b5a90;
}
.error {
    color: red;
    font-weight: 600;
}
    </style>

</head>
<body>
@include('layouts.admin.sidebar-menu')
@yield('content')
@include('layouts.admin.footer')
</body>
</html>
@yield('javascript')