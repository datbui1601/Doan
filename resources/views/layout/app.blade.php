<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cua biển</title>
    <link rel="stylesheet" href="{{ asset('themes/introduce/w3ni404/css/stylee166.css?v=1.0.4') }}"/>
    <link rel="stylesheet" href="{{ asset('themes/introduce/w3ni404/css/responsivee166.css?v=1.0.4') }}"/>
    <script type="text/javascript" src="{{ asset('assets/4278abaa/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/4278abaa/jquery.yiiactiveform.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <style type="text/css">
        .item-banner-index img {
            width: 100%;
        }

        .item-banner-index {
            position: relative;
            max-height: 700px;
        }

        .slider-pro h3.sp-layer {
            color: #c4161c;
            font-size: 60px;
            font-family: 'iCiel Bambola';
            position: absolute;
            top: -110px;
            bottom: 0px;
            width: 100%;
            margin: auto;
            text-align: center;
            height: 60px;
        }

        .slider-pro p.sp-layer {
            font-family: 'Times New Roman';
            font-size: 40px;
            color: #c4161c;
            padding-top: 45px;
            text-transform: uppercase;
            position: absolute;
            top: 0px;
            bottom: 0px;
            width: 100%;
            margin: auto;
            text-align: center;
            height: 60px;
        }

        #owl-banner-index .owl-prev, #owl-banner-index .owl-next {
            position: absolute;
            display: block;
            width: 45px;
            height: 60px;
            cursor: pointer;
            top: 0px;
            bottom: 0px;
            margin: auto;
            text-indent: -8000px;
        }

        #owl-banner-index .owl-prev {
            left: 35px;
            right: auto;
        }

        #owl-banner-index .owl-next {
            right: 35px;
            left: auto;
            transform: rotate(180deg);
        }

        #owl-banner-index .owl-prev:after, #owl-banner-index .owl-next:before, #owl-banner-index .owl-next:after, #owl-banner-index .owl-prev:before {
            content: '';
            position: absolute;
            width: 5%;
            height: 50%;
            background-color: #fff;
        }

        #owl-banner-index .owl-prev:before, #owl-banner-index .owl-next:after {
            left: 30%;
            top: 0px;
            -webkit-transform: skew(135deg, 0deg);
            -ms-transform: skew(135deg, 0deg);
            transform: skew(135deg, 0deg);
        }

        #owl-banner-index .owl-prev:after, #owl-banner-index .owl-next:before {
            left: 30%;
            top: 50%;
            -webkit-transform: skew(-135deg, 0deg);
            -ms-transform: skew(-135deg, 0deg);
            transform: skew(-135deg, 0deg);
        }
    </style>
    <style type="text/css">
        .menu-index .vertical-middle > ul > li > a {
            font-size: 14px;
        }
    </style>
    <style type="text/css">
        .box-news-index {
            border-bottom: 0px;
            margin-bottom: 0px;
        }

        .yk {
            float: left;
            width: 100%;
            padding-bottom: 40px;
        }

        .slider_ykien .item {
            padding: 10px;
        }

        .slider_ykien .item .img {
            text-align: center;
            height: 260px;
            overflow: hidden;
            position: relative;
            align-items: center;
            float: left;
            width: 170px;
            height: 170px;
            border-radius: 50%;
            overflow: hidden;
        }

        .slider_ykien .item .img img {
            width: 100%;

            height: 100%;
        }

        .slider_ykien .item .content {
            margin-top: 10px;
            float: left;
            width: calc(100% - 170px);
            padding-left: 25px;
        }

        .slider_ykien .item .content p {

            line-height: 21px;
            margin-bottom: 7px;
            font-size: 17px;
            color: #333;
        }

        .slider_ykien .item .content i {
            color: #d67400;
            margin: 7px 0px;
            font-size: 14px;
            font-style: italic;
            font-weight: 600;
        }

        .owl-carousel .owl-prev .icon-prev, .owl-carousel:hover .owl-prev .icon-prev {
            left: -40px;
            opacity: 1;
            cursor: pointer;
        }

        .owl-carousel .owl-next .icon-next, .owl-carousel:hover .owl-next .icon-next {
            opacity: 1;
            right: -40px;
            cursor: pointer;
        }

        .cover-fixed-support {
            height: auto;
        }

        .box-qc-video {
            height: auto;
        }

        .yk h2 {
            font-family: 'SVN-Steady';
            display: block;
            color: #337ab7;
            font-size: 48px;
            text-align: center;
            margin: 20px 0px;
        }

        @media (max-width: 767px) {
            .yk .owl-controls {
                display: none !important;
            }
        }

        .d-none {
            display: none !important;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
          integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    @stack('styles')
</head>
<body>
@include('layout.header')
@yield('content')
@include('layout.footer')
<script type="text/javascript">
    $(document).ready(function () {
        var owl = $("#owl-banner-index");
        owl.owlCarousel({
            navigation: true,
            singleItem: true,
            autoPlay: 4000,
            rewindNav: true,
            rewindSpeed: 12000,
            paginationSpeed: 12000,
            responsive: true,
            addClassActive: true,
            transitionStyle: "fade"
        });

    });
</script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        //
        $('.btn-footer-top').click(function () {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });
    });
</script>
<a class="scrollup" href="#" id="scrollup" style="display: inline;"></a>
<script type="text/javascript">
    function getCountCart() {
        $.ajax({
            url: '{{ route('cart.total') }}',
            method: 'GET',
            success: function (data) {
                if (data >= 0) {
                    $('.js-text-cart-qty').removeClass('d-none');
                    $('.js-text-cart-qty').text(data);
                }

            }
        });
    };
</script>
@stack('scripts')
</body>
</html>
