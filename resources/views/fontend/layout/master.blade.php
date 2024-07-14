<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<!--
THEME: Constra - Construction Html5 Template
VERSION: 1.0.0
AUTHOR: Themefisher

HOMEPAGE: https://themefisher.com/products/constra-construction-template/
DEMO: https://demo.themefisher.com/constra/
GITHUB: https://github.com/themefisher/Constra-Bootstrap-Construction-Template

WEBSITE: https://themefisher.com
TWITTER: https://twitter.com/themefisher
FACEBOOK: https://www.facebook.com/themefisher
-->

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Constra - Construction Html5 Template</title>

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name=author content="Themefisher">
    <meta name=generator content="Themefisher Constra HTML Template v1.0">

    <!-- Favicon
  ================================================== -->
    <link rel="icon" type="image/png" href="{{asset('fontend/images/favicon.png')}}">

    <!-- CSS
  ================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('fontend/plugins/bootstrap/bootstrap.min.css')}}">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{asset('fontend/plugins/fontawesome/css/all.min.css')}}">
    <!-- Animation -->
    <link rel="stylesheet" href="{{asset('fontend/plugins/animate-css/animate.css')}}">
    <!-- slick Carousel -->
    <link rel="stylesheet" href="{{asset('fontend/plugins/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/plugins/slick/slick-theme.css')}}">
    <!-- Colorbox -->
    <link rel="stylesheet" href="{{asset('fontend/plugins/colorbox/colorbox.css')}}">
    <!-- Template styles-->
    <link rel="stylesheet" href="{{asset('fontend/css/style.css')}}">

</head>
<body>
<div class="body-inner">

@include('fontend.layout.header')
    <!--/ Topbar end -->
    <!-- Header start -->

    <!--/ Header end -->
@yield('homepage')

    <!-- Action end -->

    <!-- Feature are end -->

    <!-- Facts end -->


    <!-- Project area end -->

    <!-- Content end -->

    <!--/ subscribe end -->

    <!--/ News end -->
@include('fontend.layout.footer')
    <!-- Footer end -->


    <script src="{{asset('fontend/plugins/jQuery/jquery.min.js')}}"></script>
    <script src="{{asset('fontend/plugins/bootstrap/bootstrap.min.js')}}" defer></script>
    <script src="{{asset('fontend/plugins/slick/slick.min.js')}}"></script>
    <script src="{{asset('fontend/plugins/slick/slick-animation.min.js')}}"></script>
    <script src="{{asset('fontend/plugins/colorbox/jquery.colorbox.js')}}"></script>
    <script src="{{asset('fontend/plugins/shuffle/shuffle.min.js')}}" defer></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
    <script src="{{asset('fontend/plugins/google-map/map.js')}}" defer></script>
    <script src="{{asset('fontend/plugins/js/script.js')}}"></script>

</div><!-- Body inner end -->
</body>

</html>