<div class="footer-page">
    <div class="container">
        <div class="menu-footer">
            <div class="box-100">
                <div class="bot-footer-page row">

                    <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12 first-col">
                        <div class="address-store">
                            <h2>
                                Hệ thống nhà hàng Cua Biển tại Đà Nẵng </h2>
                            <p><img src="{{ asset('themes/introduce/w3ni404/images/Layer-21.png') }}">Nhà hàng cua biển,
                                Lô 14 – 17 Võ Văn Kiệt, Quận Sơn Trà, Đà Nẵng</p>
                            <p><img src="{{ asset('themes/introduce/w3ni404/images/Layer-23.png') }}">Điện thoại: 090
                                355 55 57</p>
                            </br>
                            <p><img src="{{ asset('themes/introduce/w3ni404/images/Layer-21.png') }}">Nhà hàng cua biển
                                2, 112 Võ Nguyên Giáp, Phước Mỹ, Sơn Trà, Đà Nẵng</p>
                            <p><img src="{{ asset('themes/introduce/w3ni404/images/Layer-23.png') }}">Điện thoại: 0090
                                355 55 57</p>
                        </div>

                    </div>
                    <style>
                        .first-col .address-store {
                            margin-bottom: 0px;
                        }
                    </style>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="whtml">
                            <div class="address-store">
                                <h2>Fanpage</h2>

                                <div id="fb-root">&nbsp;</div>

                                <div class="fb-page" data-adapt-container-width="true" data-hide-cover="false"
                                     data-href="https://www.facebook.com/ngon.restaurants/"
                                     data-show-facepile="true" data-show-posts="false" data-small-header="false"
                                     data-width="278">
                                    <div class="fb-xfbml-parse-ignore">
                                        <blockquote cite="https://www.facebook.com/anhaisanngonmare"><a
                                                href="https://www.facebook.com/anhaisanngonmare">NHÀ HÀNG CUA BIỂN</a>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <style type="text/css">
                            .errorMessage {
                                color: red;
                            }
                        </style>
                        <div class="address-store">
                            <h2>Đăng ký nhận bản tin</h2>
                            <div class="form-newsletter">
                                <form class="form-horizontal newsletter-form" id="newsletter-form"
                                      action="http://quananngon.com.vn/site/site/receivenewsletter" method="post">
                                    <input id="Newsletters_email" placeholder="Email" title="Email"
                                           name="Newsletters[email]" type="text" maxlength="100" value=""/>
                                    <div class="errorMessage" id="Newsletters_email_em_" style="display:none"></div>
                                    <input id="newslettersubmit" type="submit" name="yt0" value="Đăng ký"/></form>
                            </div>
                        </div>
                        <div class="address-store">
                            <h2>Bản đồ</h2>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d526.3789114057898!2d108.24557448180477!3d16.078380857317953!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e0!4m0!4m5!1s0x3142178e9c8628ab%3A0x9c8f9604313ecc7d!2zMTEyIFbDtSBOZ3V5w6puIEdpw6FwLCBQaMaw4bubYyBN4bu5LCBTxqFuIFRyw6AsIMSQw6AgTuG6tW5nIDU1MDAwMA!3m2!1d16.0784903!2d108.24564009999999!5e0!3m2!1svi!2s!4v1654044461784!5m2!1svi!2s"
                                width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="copy-right">
    <div class="container">
        <p>Đặt Tiệc, Khách Đoàn, Khách Du Lịch: 0981.974.393 |&nbsp;Email:
            example.gmail.com
        </p>

        <p>Copyright © 2022 Cua Bien Restaurant&nbsp;All Rights Reserved</p>
    </div>
    <a href="javascript:void(0)" class="btn-footer-top" title="To the top"></a>
</div>
</div>
<div id="myModal-login" class="modal" role="dialog" style="z-index: 99999;">
    <div class="modal-dialog" >

        <!-- Modal content-->
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="cont">
                {{--                <div class="login-fb-gg">--}}
                {{--                    <ul class="clearfix">--}}
                {{--                        <li class="login-gg">--}}
                {{--                            <a onclick="openWin2();--}}
                {{--                                                                    return false;"--}}
                {{--                               href="javascript:void(0)"--}}
                {{--                               id="w3nlogin" title="Đăng nhập với Google">Đăng ký với Google</a>--}}
                {{--                        </li>--}}
                {{--                    </ul>--}}
                {{--                </div>--}}
                <div class="register-new">
                    <p class="guide">Đăng nhập với tài khoản
                        <span style=" color:#0c519a; font-size:15px; font-weight:bold; text-transform:uppercase;">Thành viên</span>
                    </p>

                    <form id="form-login" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="item-register" style="margin-bottom: 15px;">
                            <input style="margin-bottom: 0px;" type="text" name="email"
                                   class="form-control email-register" placeholder="Nhập email của bạn">
                            <div class="errorMessage" id="LoginForm_username_em_"></div>
                        </div>
                        <div class="item-register" style="margin-bottom: 15px;">
                            <input style="margin-bottom: 0px;" type="password" name="password"
                                   class="form-control pass-register" id="inputPassword"
                                   placeholder="Nhập mật khẩu">
                            <div class="errorMessage" id="LoginForm_password_em_"></div>
                        </div>

                        <div class="bottom-register clearfix">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox">Ghi nhớ tài khoản
                                </label>
                                <!--                            </div>-->
                                <!--                            <a href="#" title="#" class="forget-pass">Quên mật khẩu?</a>-->
                            </div>
                            <button style="width:100%;"
                                    type="submit"
                                    class="btn btn-primary">Đăng nhập
                            </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<div id="color-menu" off-canvas="slidebar-2 right shift">
    <div class="main-menu pad-25-12">
        <div class="title-menu">
            <div class="img-menu js-toggle-right-slidebar">
                <span class="border-menu"></span>
                <span class="border-menu"></span>
                <span class="border-menu"></span>
            </div>
            <h2>Danh mục sản phẩm</h2>
        </div>
        <ul class="">
            <li class=" active">
                <a class="icon icon icon-star" href="index.html">
                    Trang chủ </a>
            </li>
            <li class=" ">
                <a class="icon icon icon-star" href="gioi-thieu.html">
                    Giới thiệu </a>
            </li>
            <li class=" ">
                <a class="icon icon icon-star" href="san-pham.html">
                    Thực đơn </a>
                <span class="click-down-menu fa fa-angle-down"></span>
                <ul class="sub-menu">
                    <li class="sub-menu-li ">
                        <a class="icon icon icon-star" href="mon-ngon-thang-nc88389ed2.html">
                            Món ngon </a>
                    </li>
                    <li class="sub-menu-li ">
                        <a class="icon icon icon-star" href="trang-mieng-pc193709ed2.html">
                            Món tráng miệng </a>
                    </li>
                    <li class="sub-menu-li ">
                        <a class="icon icon icon-star" href="mon-khai-vi-pc193689ed2.html">
                            Món chính </a>
                    </li>
                </ul>
            </li>
            <li class=" ">
                <a class="icon icon icon-star" href="mon-ngon-thang-nc88389ed2.html">
                    Món ngon tháng </a>
            </li>
            <li class=" ">
                <a class="icon icon icon-star" href="tin-tuc-nc71179ed2.html">
                    Tin tức </a>
                <span class="click-down-menu fa fa-angle-down"></span>
                <ul class="sub-menu">
                    <li class="sub-menu-li ">
                        <a class="icon icon icon-star" href="tin-trong-nganh-nc89909ed2.html">
                            Tin trong ngành </a>
                    </li>
                    <li class="sub-menu-li ">
                        <a class="icon icon icon-star" href="tin-tuc-quan-an-ngon-nc89919ed2.html">
                            Tin tức Quán ăn Ngon </a>
                    </li>
                </ul>
            </li>
            <li class=" ">
                <a class="icon icon icon-star" href="the-uu-dai-pde6050.html">
                    Thẻ thành viên </a>
            </li>
            <li class=" ">
                <a class="icon icon icon-star" href="dat-ban.html">
                    Đặt bàn </a>
            </li>
            <li class=" ">
                <a class="icon icon icon-star" href="cau-hoi.html">
                    Hỏi đáp </a>
            </li>
            <li class=" ">
                <a class="icon icon icon-star" href="tuyen-dung.html">
                    Tuyển dụng </a>
            </li>
        </ul>
    </div>
</div>
<script>
    function setCookie(key, value) {
        var expires = new Date();
        expires.setTime(expires.getTime() + (30 * 60 * 1000));
        document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
    }

    function getCookie(key) {
        var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
        return keyValue ? keyValue[2] : null;
    }

    $('document').ready(function () {
        var has_cookie_popup = getCookie('popup');
        if (has_cookie_popup) {
            setTimeout(function () {
                $(".home-popup").addClass("show-home-popup");
            }, 1000);
        } else {
            setCookie('popup', 1);

        }
    });
</script>
<script src="{{ asset('themes/introduce/w3ni404/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('themes/introduce/w3ni404/js/owl.carousel.js') }}"></script>
<script src="{{ asset('themes/introduce/w3ni404/js/aos.js') }}"></script>
<script src="{{ asset('themes/introduce/w3ni404/js/wow.min.js') }}"></script>
<script src="{{ asset('themes/introduce/w3ni404/js/jquery.slimmenu.min.js') }}"></script>
<script src="{{ asset('themes/introduce/w3ni404/js/modernizr.js') }}"></script>
<script src="{{ asset('themes/introduce/w3ni404/js/slidebars.js') }}"></script>
<script src="{{ asset('themes/introduce/w3ni404/js/scripts.js') }}"></script>
<script src="{{ asset('themes/introduce/w3ni404/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('themes/introduce/w3ni404/js/jquery.sliderPro.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('themes/introduce/w3ni404/js/jquery.cookie.js') }}"></script>
<script type="text/javascript">
    new WOW().init();
</script>

<script type="text/javascript">
    AOS.init({
        duration: 1200
    });
    $(document).ready(function () {
        $(".close-popup").click(function () {
            $(".home-popup").removeClass("show-home-popup");
        });
        $(".close-cover-fixed").click(function () {
            $(".cover-fixed-support").toggleClass("active");
        });
    });
</script>
<script src="{{ asset('themes/introduce/w3ni404/js/main.js') }}"></script>
<script type="text/javascript">
    (function ($) {
        $.fn.clickToggle = function (func1, func2) {
            var funcs = [func1, func2];
            this.data('toggleclicked', 0);
            this.click(function () {
                var data = $(this).data();
                var tc = data.toggleclicked;
                $.proxy(funcs[tc], this)();
                data.toggleclicked = (tc + 1) % 2;
            });
            return this;
        };
    }(jQuery));
    $(document).ready(function () {
        $('.dropdown-toggle').clickToggle(function () {
            $(this).next().css('display', 'block');
        }, function () {
            $(this).next().css('display', 'none');
        });
    });
</script>

<script type="text/javascript" src="{{ asset('js/web3nhat.min96d2.js?v=1.1.2.8') }}"></script>
<script type="text/javascript" src="{{ asset('assets/37fc11a/style1/js/script.js') }}"></script>
<script type="text/javascript">
    /*<![CDATA[*/
    jQuery(document).on('submit', '.searchform', function () {
        var sv = jQuery(this).find('.inputSearch').val();
        if (sv == '' || sv.length < 2) {
            alert('Từ khóa tìm kiếm không đúng. Từ khóa phải có ít nhất 2 ký tự.');
            return false;
        }
    });
    if (jQuery('.searchbox .searchSelect option:selected').val()) {
        var categorybox = jQuery('.searchbox .searchSelect').closest('.search-category-select');
        if (categorybox) {
            categorybox.find('.search-category-text').text(categorybox.find('.searchSelect option:selected').text());
        }

    }
    jQuery('.searchbox .searchSelect').on('change', function () {
        jQuery(this).closest('.search-category-select').find('.search-category-text').text(jQuery(this).find('option:selected').text());
    });


    var id = (jQuery('#bg46502').length) ? '#bg46502 ' : '';
    var jcarousel = $('.jcarousel').jcarousel({wrap: 'circular'});
    $(id + '.jcarousel').jcarouselAutoscroll({autostart: true, interval: 4000, target: '+=1'});
    $(id + '.jcarousel-control-prev').on('jcarouselcontrol:active', function () {
        $(this).removeClass('inactive');
    })
        .on('jcarouselcontrol:inactive', function () {
            $(this).addClass('inactive');
        })
        .jcarouselControl({
            target: '-=1'
        });

    $(id + '.jcarousel-control-next')
        .on('jcarouselcontrol:active', function () {
            $(this).removeClass('inactive');
        })
        .on('jcarouselcontrol:inactive', function () {
            $(this).addClass('inactive');
        })
        .jcarouselControl({
            target: '+=1'
        });
    $(id + '.jcarousel-pagination')
        .on('jcarouselpagination:active', 'a', function () {
            $(this).addClass('active');
        })
        .on('jcarouselpagination:inactive', 'a', function () {
            $(this).removeClass('active');
        })
        .on('click', function (e) {
            e.preventDefault();
        })
        .jcarouselPagination({
            perPage: 1,
            item: function (page) {
                return '<a href="#' + page + '">' + page + '</a>';
            }
        });

    var newsl_formSubmit = true;
    jQuery('.newsletter-form').on('submit', function () {
        var thi = jQuery(this);
        thi.find('.newsletters-message').hide();
        if (!newsl_formSubmit)
            return false;
        newsl_formSubmit = false;
        jQuery.ajax({
            'type': 'POST',
            'dataType': 'JSON',
            'url': thi.attr('action'),
            'data': thi.serialize(),
            'beforeSend': function () {
                w3ShowLoading(thi.find('#newslettersubmit'), 'left', -40, 0);
            },
            'success': function (res) {
                if (res.code != '200') {
                    if (res.errors) {
                        parseJsonErrors(res.errors, thi);
                    }
                } else {
                    thi[0].reset();
                    if (res.message)
                        thi.find('.newsletters-message').html(res.message).show();
                }
                w3HideLoading();
                newsl_formSubmit = true;
            },
            'error': function () {
                w3HideLoading();
                newsl_formSubmit = true;
            }
        });
        return false;
    });
    jQuery(function ($) {
        jQuery('#newsletter-form').yiiactiveform({
            'attributes': [{
                'id': 'Newsletters_email',
                'inputID': 'Newsletters_email',
                'errorID': 'Newsletters_email_em_',
                'model': 'Newsletters',
                'name': 'email',
                'enableAjaxValidation': false,
                'clientValidation': function (value, messages, attribute) {

                    if (jQuery.trim(value) == '') {
                        messages.push("Email kh\u00f4ng \u0111\u01b0\u1ee3c ph\u00e9p r\u1ed7ng.");
                    }


                    if (jQuery.trim(value) != '') {

                        if (value.length > 100) {
                            messages.push("Email qu\u00e1 d\u00e0i (t\u1ed1i \u0111a l\u00e0 100 k\u00ed t\u1ef1).");
                        }

                    }


                    if (jQuery.trim(value) != '' && !value.match(/^[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/)) {
                        messages.push("Email kh\u00f4ng l\u00e0 m\u1ed9t email h\u1ee3p l\u1ec7");
                    }

                }
            }], 'errorCss': 'error'
        });
    });
    /*]]>*/
</script>

<!-- Histats.com  (div with counter) -->
<div id="histats_counter"></div>
<!-- Histats.com  START  (aync)-->
<script type="text/javascript">var _Hasync = _Hasync || [];
    _Hasync.push(['Histats.start', '1,3936668,4,107,170,20,00011001']);
    _Hasync.push(['Histats.fasi', '1']);
    _Hasync.push(['Histats.track_hits', '']);
    (function () {
        var hs = document.createElement('script');
        hs.type = 'text/javascript';
        hs.async = true;
        hs.src = ('../s10.histats.com/js15_as.js');
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
    })();</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@if (session()->has('error'))
    <script type="text/javascript">
        toastr.error({{ session()->get('error') }}, 'Error!')
    </script>
@endif
@if (session()->has('success'))
    <script type="text/javascript">
        toastr.success('{{ session()->get('success') }}', 'Success!')
    </script>
@endif

<script type="text/javascript">
    $('input').attr('autocomplete', 'off')
</script>

