<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="Xonier technologies">
<meta property="og:url" content="">
<meta property="og:type" content="website">
<meta property="og:title" content="">
<meta property="og:description" content="">
<meta property="og:image" content="{{ site('website_logo') ?? '' }}">
<meta property="twitter:domain" content="">
<meta property="twitter:url" content="">
<meta name="twitter:title" content="">
<meta name="twitter:description" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="twitter:image" content="{{ site('website_logo') ?? '' }}">
<link rel="shortcut icon" href="{{ site('website_favicon') ?? '' }}" type="image/x-icon">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/feather.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<!-- Loading default app.css and app.js -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link href="https://kendo.cdn.telerik.com/themes/7.2.1/default/default-main.css" rel="stylesheet" />
<script src="https://kendo.cdn.telerik.com/2024.1.319/js/kendo.all.min.js"></script>
<script src="{{ asset('admin/assets/js/jquery-ui.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery-ui.css') }}"></script>

<script src="{{ asset('admin/assets/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.21.1/sweetalert2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.21.1/sweetalert2.min.js"></script>

<script>
    window.site_admin_base_url = '{{ env('SITE_ADMIN_BASE_URL') }}';
    window.site_base_url = '{{ env('SITE_BASE_URL') }}';
</script>
<script src="{{ asset('admin/assets/custom-js/add_doctor.js') }}"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<title>Airpal Technology</title>