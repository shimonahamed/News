<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>HOME</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{asset('fontend/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('fontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('fontend/css/style.css')}}" rel="stylesheet">
</head>

<body>
<!-- Navbar Start -->
@include('fontend.layout.header')
<!-- Navbar End -->




@yield('content')


@include('fontend.layout.footer')

<!-- Footer Start -->
<div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
    <p class="m-0 text-center">&copy; <a href="#">Your Site Name</a>. All Rights Reserved.

        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
        Design by <a href="https://htmlcodex.com">HTML Codex</a></p>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('share-facebook').addEventListener('click', function() {
            sharePost('facebook');
        });

        document.getElementById('share-linkedin').addEventListener('click', function() {
            sharePost('linkedin');
        });

        document.getElementById('share-instagram').addEventListener('click', function() {
            sharePost('instagram');
        });

        document.getElementById('share-youtube').addEventListener('click', function() {
            sharePost('youtube');
        });
    });

    function sharePost(platform) {
        const postUrl = encodeURIComponent(window.location.href);
        const postTitle = encodeURIComponent(document.title);

        let shareUrl = '';

        switch(platform) {
            case 'facebook':
                shareUrl = `https://www.facebook.com/sharer.php?u=${postUrl}&t=${postTitle}`;
                break;
            case 'linkedin':
                shareUrl = `https://www.linkedin.com/shareArticle?mini=true&url=${postUrl}&title=${postTitle}`;
                break;
            case 'instagram':
                alert("Instagram does not support direct sharing via URL.");
                return;
            case 'youtube':
                shareUrl = `https://www.youtube.com/share?url=${postUrl}&title=${postTitle}`;
                return;
            default:
                return;
        }

        window.open(shareUrl, 'Share Post', 'width=600,height=400');
    }
</script>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('fontend/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('fontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('fontend/js/main.js')}}"></script>
@yield('script')

</body>

</html>