@extends('layout.app')
@section('content')
    <div class="slider-index">
        <div id="owl-banner-index" class="owl-carousel owl-theme slider-pro">
            <div class="item-banner-index">
                <a href="#">
                    <img class="sp-image" src="mediacenter/media/files/1428/banners/nhahang1.jpg">
                </a>
                <h3 class="sp-layer sp-padding">
                </h3>
                <p class="sp-layer sp-padding hide-small-screen">
                </p>
            </div>
        </div>
        <div class="btn-down-slide"></div>
    </div>
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


    <div id="main-content">
        <style type="text/css">.tool-footer {
                display: none
            }</style>

        <div class="fl-left ctn-introduce-home">
            <div class="container">
                <div class="row mar-10">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pad-10">
                        <div class="intro-content">
                            <h2 class=" wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                                <span>Nh?? h??ng Cua Bi???n</span>H???i s???n ???? N???ng</h2>
                            <div class="icon-fllower"></div>
                            <p>
                                ????n h??ng v???n kh??ch v??o c??c d???p l???, t???t c?? l??? ???? n??i l??n v??? tr?? c???a Nh?? H??ng Cua Bi??n
                                ???? N???ng trong l??ng c??c du kh??ch v?? d??n ?????a ph????ng sinh s???ng ??? ???? N???ng. Nh?? h??ng g???m
                                2 chi nh??nh t???i L?? 14 ??? 17 V?? V??n Ki???t, Qu???n S??n Tr??, ???? N???ng v?? 112 V?? Nguy??n Gi??p,
                                Ph?????c M???, S??n Tr??, ???? N???ng. ?????t ch??n ?????n qu??n, ?????i v???i th???c kh??ch l???n ?????u ?????n ????y s???
                                kh??ng kh???i ng??? ng??ng tr?????c m???t kh??ng gian qu??n v???i vi???c b??y tr?? c??c h??? k??nh c?? ch??a
                                c??c lo???i h???i s???n t????i s???ng, r???t b???t m???t. C??n g?? l?? t?????ng h??n kho th?????ng th???c h??ng
                                tr??m m??n h???i s???n trong m???t kh??ng gian ?????y ????? h????ng v??? v?? m??u s???c nh?? th???.</p>
                        </div>
                    </div>
                    <style type="text/css">
                        .en .view-more a {
                            display: none;
                        }

                        .en .view-more a.en-title {
                            display: inline-block;
                        }

                        .vi .view-more a.en-title {
                            display: none;
                        }
                    </style>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pad-10">
                        <div class="box-intro-img">
                            <div class="item-intro-img ">
                                <a rel="ligthbox" class="bg-img fancybox"
                                   href="mediacenter/media/files/1428/banners/khonggianquan.jpg"
                                   style="background:url(mediacenter/media/files/1428/banners/khonggianquan.jpg) center center no-repeat;"></a>
                            </div>
                            <div class="item-intro-img width-25-img">
                                <a rel="ligthbox" class="bg-img fancybox"
                                   href="mediacenter/media/files/1428/banners/khonggianquan1.jpg"
                                   style="background:url(mediacenter/media/files/1428/banners/khonggianquan1.jpg) center center no-repeat;"></a>
                            </div>
                            <div class="item-intro-img width-25-img">
                                <a rel="ligthbox" class="bg-img fancybox"
                                   href="mediacenter/media/files/1428/banners/khonggianquan2.jpg"
                                   style="background:url(mediacenter/media/files/1428/banners/khonggianquan2.jpg) center center no-repeat;"></a>
                            </div>
                            <div class="item-intro-img ">
                                <a rel="ligthbox" class="bg-img fancybox"
                                   href="mediacenter/media/files/1428/banners/khonggianquan3.jpg"
                                   style="background:url(mediacenter/media/files/1428/banners/khonggianquan3.jpg) center center no-repeat;"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-3-index">
            <div class="award-box">
                <div class="mar-5">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pad-5 flex-height">
                        <div class="item-award-box center">
                            <div onclick="window.location.href='mon-khai-vi-pc193689ed2.html'" class="title-award-box"
                                 style="background-image:url(mediacenter/media/images/1428/category/ava/Haisantuoisong.jpg);">
                                <h2>
                                    <a href="/menus?type=appetizer" title="Khai V??? ">H???i s???n t????i s???ng</a>
                                </h2>
                            </div>
                            <div class="title-item-award-box">
                                <h2>
                                    <a href="/menus?type=appetizer" title="Khai V??? ">H???i s???n t????i s???ng</a>
                                </h2>
                                <div class="view-more-award">
                                    <a href="/menus?type=appetizer">xem menu</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pad-5 flex-height">
                        <div class="item-award-box center">
                            <div onclick="window.location.href='mon-chinh-pc193699ed2.html'" class="title-award-box"
                                 style="background-image:url(mediacenter/media/images/1428/category/ava/Haisanchebiensan.jpg);">
                                <h2>
                                    <a href="/menus?type=main-course" title="M??n Ch??nh ">H???i s???n ch??? bi???n s???n </a>
                                </h2>
                            </div>
                            <div class="title-item-award-box">
                                <h2>
                                    <a href="/menus?type=main-course" title="M??n Ch??nh ">H???i s???n ch??? bi???n s???n </a>
                                </h2>
                                <div class="view-more-award">
                                    <a href="/menus?type=main-course">xem menu</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pad-5 flex-height">
                        <div class="item-award-box center">
                            <div onclick="window.location.href='trang-mieng-pc193709ed2.html'" class="title-award-box"
                                 style="background-image:url(mediacenter/media/images/1428/category/ava/Thucuong.jpg);">
                                <h2>
                                    <a href="/menus?type=dessert" title="Tr??ng Mi???ng ">Th???c u???ng </a>
                                </h2>
                            </div>
                            <div class="title-item-award-box">
                                <h2>
                                    <a href="/menus?type=dessert" title="Tr??ng Mi???ng ">Th???c u???ng </a>
                                </h2>
                                <div class="view-more-award">
                                    <a href="/menus?type=dessert">xem menu</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style type="text/css">
            .en .view-more-award a {
                display: none;
            }

            .en .view-more-award a.en-title {
                display: inline-block;
            }

            .vi .view-more-award a.en-title {
                display: none;
            }
        </style>
        <div class="fl-left border-section">
            <div class="container">
                <div class="row mar-10">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pad-10">
                        <div class="box-intro-img">
                            <div class="item-intro-img width-50-img">
                                <img src="mediacenter/media/files/1428/banners/miencua.jpg"/>
                            </div>
                            <div class="item-intro-img width-50-img">
                                <img src="mediacenter/media/files/1428/banners/miencua1.jpg"/>
                            </div>
                            <div class="item-intro-img width-50-img">
                                <img src="mediacenter/media/files/1428/banners/miencua2.jpg"/>
                            </div>
                            <div class="item-intro-img width-50-img">
                                <img src="mediacenter/media/files/1428/banners/miencua3.jpg"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pad-10">
                        <div class="intro-content">
                            <h2>
                                <span>Gh?? nh?? h??ng Cua Bi???n th?????ng th???c m??n ngon
                                Mi???n Cua
                                </span></h2>
                            <div class="icon-fllower"></div>
                            <p class="center">
                                Mi???n Cua ??? v???i nh???ng con cua t????i s???ng, ch???c th???t ???????c th??? trong c??c b??? k??nh. ???????c ch???
                                bi???n 1 c??ch t??? m???, sau ??t ph??t ch??? ?????i, m??n mi???n cua v???i v???i c??ch b??y tr?? v???a no m???t v???a
                                no b???ng ???? c?? tr??n b??n c???a th???c kh??ch.</p>
                        </div>
                    </div>
                    <style type="text/css">
                        .en .view-more a {
                            display: none;
                        }

                        .en .view-more a.en-title {
                            display: inline-block;
                        }

                        .vi .view-more a.en-title {
                            display: none;
                        }
                    </style>
                </div>
            </div>
        </div>
        <style type="text/css">
            .en .view-more-news a {
                display: none;
            }

            .en .view-more-news a.en-title {
                display: inline-block;
            }

            .vi .view-more-news a.en-title {
                display: none;
            }
        </style>
        <div class="tool-footer fl-left">
            <div class="container">
                <div class="row mar-10">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-3 pad-10">
                        <div class="footer-social">
                            <a href="#">
                                <img src="themes/introduce/w3ni404/images/facebook.png">
                            </a>
                        </div>
                    </div>
                    <div class="whtml">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 pad-10">
                            <div class="copy-r">
                                <p>Hotline: 090 222 6224&nbsp;| Email: sales@phuchungthinh.vn&nbsp;</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pad-10">
                        <a href="javascript:void(0)" class="tothetop" title="To the top">
                            To The Top
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
