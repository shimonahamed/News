<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Restaurant One Page HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS
        ================================================ -->
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('fontend/css/owl.carousel.css')}}">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{asset('fontend/css/bootstrap.min.css')}}">
    <!-- Font-awesome.min css -->
    <link rel="stylesheet" href="{{asset('fontend/css/font-awesome.min.css')}}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{asset('fontend/css/animate.min.css')}}">

    <link rel="stylesheet" href="{{asset('fontend/css/main.css')}}">
    <!-- Responsive Stylesheet -->
    <link rel="stylesheet" href="{{asset('fontend/css/responsive.css')}}">
    <!-- Js -->
    <script src="{{asset('fontend/js/vendor/modernizr-2.6.2.min.js')}}"></script>
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js')}}"></script> -->
    <script>
        window.jQuery || document.write('<script src="{{asset('fontend/js/vendor/jquery-1.10.2.min.js')}}"><\/script>')
    </script>
    <script src="{{asset('fontend/js/jquery.nav.js')}}"></script>
    <script src="{{asset('fontend/js/jquery.sticky.js')}}"></script>
    <script src="{{asset('fontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('fontend/js/plugins.js')}}"></script>
    <script src="{{asset('fontend/js/wow.min.js')}}"></script>
    <script src="{{asset('fontend/js/main.js')}}"></script>
</head>

<body>
@include('fontend.layout.header')


@yield('page')

















@include('fontend.layout.footer')



</body>

</html>