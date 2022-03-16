<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    @yield('title')
    <link href="{{ asset('/eshopper/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/eshopper/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/eshopper/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('/eshopper/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('/eshopper/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('/eshopper/css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    @yield('css')
</head>

<body>
    @include('partials.slider')
    @yield('content')
    @include('partials.footer')

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script src="{{ asset('/eshopper/js/jquery.js') }}"></script>
    <script src="{{ asset('/eshopper/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/eshopper/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('/eshopper/js/price-range.js') }}"></script>
    <script src="{{ asset('/eshopper/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('/eshopper/js/main.js') }}"></script>
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    @yield('js')
</body>

</html>