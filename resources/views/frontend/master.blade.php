<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->

    <link rel="stylesheet" href="{{ url('site') }}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('site') }}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('site') }}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ url('site') }}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{ url('site') }}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('site') }}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('site') }}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('site') }}/css/dropzone.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('site') }}/css/style.css">

</head>
<body>
    @include('frontend.template.header')
        @yield('main')
    @include('frontend.template.footer')

    <!-- Js Plugins -->
    <script src="{{ url('site') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ url('site') }}/js/bootstrap.min.js"></script>
    <script src="{{ url('site') }}/js/jquery.nice-select.min.js"></script>
    <script src="{{ url('site') }}/js/jquery-ui.min.js"></script>
    <script src="{{ url('site') }}/js/jquery.slicknav.js"></script>
    <script src="{{ url('site') }}/js/mixitup.min.js"></script>
    <script src="{{ url('site') }}/js/owl.carousel.min.js"></script>
    <script src="{{ url('site') }}/js/main.js"></script>
    <script src="{{ url('site') }}/js/customer.js"></script>
    <script src="{{ url('site') }}/js/checkout.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</body>
</html>
