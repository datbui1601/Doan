@extends('layout.app')
@section('content')
     <div id="main-content" style="margin-top: 200px;">
        <div class="fl-left">
            <div class="container">
                <div class="row mar-10">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pad-10">
                        <div class="news-page bg-white">
                            <div class="filter-product filter-grid">
                                <div class="left">
                                    <a class="" href="http://quananngon.com.vn/" title="homepage">
                                        homepage                                            <span>/</span>
                                    </a>
                                    <a class="active" href="http://quananngon.com.vn/mon-khai-vi-pc19368.html?lang=en" title="Appetizer">
                                        Appetizer                                    </a>
                                </div>
                            </div>
                            <style type="text/css">.tool-footer{display:none}</style>
                            <link rel="stylesheet" type="text/css" href="http://quananngon.com.vn/themes/introduce/w3ni404/css/magiczoomplus.css">
                            <script type="text/javascript" src="http://quananngon.com.vn/themes/introduce/w3ni404/js/magiczoomplus.js"></script>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $('a:contains("Magic Zoom Plus™ trial version")').text("");
                                    MagicZoom.options = {
                                        'fps': 40,
                                        'hint': false,
                                        'zoom-fade-in-speed': 600,
                                        'zoom-fade-out-speed': 600,
                                        'right-click': true,
                                        'selectors-mouseover-delay': 200,
                                        'zoom-distance': 2,
                                        'zoom-position': 'right',
                                        'zoom-height': 300,
                                        'selectorTrigger': 'hover',
                                        'transitionEffect': false,
                                        'zoom-width': 300
                                    };
                                });
                            </script>
                            <style type="text/css">
                                .show-img-product {
                                    float: left;
                                    width: 100%;
                                }

                                .big-img {
                                    text-align: center;
                                    height: 322px;
                                    overflow: hidden;
                                    text-align: center;
                                    width: 100%;
                                    border: 1px solid #ccc;
                                    margin-top: 10px;
                                }

                                .mz-zoom-window.mz-inner {
                                    border: none;
                                    box-shadow: none;
                                    height: 450px !important;
                                    overflow: hidden !important;
                                }

                                .thumb-img {
                                    text-align: center;
                                }

                                .thumb-img a {
                                    border: 1px solid #e9e9e9;
                                    padding: 3px;
                                    height: 50px;
                                    overflow: hidden;
                                }

                                a[data-zoom-id] img, .mz-thumb img {
                                    border: 0;
                                    box-shadow: 0 0 1px 0px rgba(0, 0, 0, 0.3);
                                    box-sizing: border-box;
                                    width: 50px;
                                    height: 100%;
                                }

                                #Zoom-1 .mz-expand div a,
                                html body .mz-expand div:last-child a,
                                html body .mz-expand div:first-child a,
                                .mz-expand a,
                                .mz-zoom-window div:last-child,
                                .mz-zoom-window div:first-child,
                                .mz-zoom-window a, .mz-figure span,
                                .mz-figure div:first-child,
                                .mz-figure div:last-child,
                                .mz-figure span:first-child,
                                .mz-zoom-window span, .mz-active span {
                                    text-indent: 9000px !important;
                                    color: #000 !important;
                                    opacity: 0;
                                }
                            </style>
                            <div class="container">
                                <div class="row mar-10">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pad-10">
                                        <div class="detail-product-page">
                                            <section class="main-container col1-layout">
                                                <div class="main">
                                                    <div class="col-main">
                                                        <div class="row">
                                                            <div class="product-view">
                                                                <div class="product-essential">
                                                                    <div
                                                                        class="product-img-box col-lg-5 col-sm-5 col-xs-12  wow fadeInLeft animated">
                                                                        <div class="app-figure" id="zoom-fig">

                                                                            <div class="big-img" style="margin-bottom:10px;position: relative">
                                                                                <div class="img-respon">
                                                                                    <a href="/storage/{{$menu_item->avata}}"
                                                                                       class="MagicZoom" id="magiczoommain"
                                                                                       data-options="selectorTrigger: hover; transitionEffect: false;zoomDistance: 40;zoomWidth:520px; zoomHeight:500px;variableZoom: true"><img
                                                                                            src="/storage/{{$menu_item->avata}}"
                                                                                            alt="Crab with fresh asparagus soup "/></a>


                                                                                </div>
                                                                            </div>
                                                                            <script type="text/javascript">
                                                                                $(document).ready(function () {
                                                                                    $("#owl-detail").owlCarousel({
                                                                                        items: 4,
                                                                                        navigation: true,
                                                                                    });

                                                                                });
                                                                            </script>
                                                                            <style type="text/css">
                                                                                #owl-detail {
                                                                                    opacity: 1;
                                                                                    display: block;
                                                                                    width: 280px;
                                                                                    margin: 0 auto;
                                                                                }
                                                                            </style>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-shop col-lg-7 col-sm-7 col-xs-12 wow fadeInRight animated">
                                                                        <div class="product-name">
                                                                            <h1>{{$menu_item->name}}</h1>
                                                                            <span>
                                                                                                    </span>
                                                                        </div>
                                                                        <div class="price-block">
                                                                            <div class="price-box">
                                                                                <p class="special-price">
                                                                                    <span class="price-label">Giá : </span>
                                                                                    <span
                                                                                        class="price">{{number_format($menu_item->price, 0, ',', '.')}}đ</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="short-description">
                                                                        </div>
                                                                        <div class="add-to-box">
                                                                            <div class="add-to-cart">
                                                                                <div class="pull-left">
                                                                                    <div class=" pull-left">
                                                                                        <input onkeypress="isAlphaNum(event);" type="text"
                                                                                               title="Số lượng" value="1" maxlength="12" id="qty"
                                                                                               name="quantity" class="input-text qty"
                                                                                               oninput="validity.valid||(value='');">
                                                                                        <div class="btn_count">
                                                                                            <button onclick="var result = document.getElementById('qty');
                                                                        var qty = result.value;
                                                                        if (!isNaN(qty))
                                                                            result.value++;
                                                                        return false;" class="increase items-count"
                                                                                                    type="button"><i class="fa fa-angle-up"></i>
                                                                                            </button>
                                                                                            <button onclick="var result = document.getElementById('qty');
                                                                        var qty = result.value;
                                                                        if (!isNaN(qty) &amp;&amp; qty > 0) {
                                                                            result.value--;
                                                                            jQuery(result).trigger('change');
                                                                        }
                                                                        return false;" class="reduced items-count"
                                                                                                    type="button">
                                                                                                <i class="fa fa-angle-down"></i>
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="social">
                                                                            <button id="add-set" class="button btn-cart add_to_cart js-add-to-cart"
                                                                                    name="63193" title="Chọn giao ngay"
                                                                                    type="button">
                                                    <span>
                                                        Đặt giao
                                                        <img
                                                            src="http://quananngon.com.vn/themes/introduce/w3ni404/images/icon-add-tocart.png">
                                                    </span>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-overview-tab">
                                                                        <div class="col-lg-12 col-md-12">
                                                                            <div class="tab-menu-area">
                                                                                <ul class="tab-menu">
                                                                                    <li class="active">
                                                                                        <a data-toggle="tab" href="#description">Miêu tả</a>
                                                                                    </li>

                                                                                    <li>
                                                                                        <a data-toggle="tab" href="#reviews">Nhận xét của khách
                                                                                            hàng</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="tab-content">
                                                                                <div id="description" class="tab-pane in active">
                                                                                    {!! $menu_item->description !!}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script type="text/javascript">

                                jQuery(document).ready(function () {
                                    jQuery(document).on('click', '#add-set', function () {
                                        $('.loading-shoppingcart').show();
                                        var url = '/economy/shoppingcart/add/lang/en';
                                        var pid = 63193;
                                        var qty = $('#qty').val();
                                        $.ajax({
                                                url: url,
                                                dataType: "json",
                                                data: {pid: pid, qty: qty},
                                                success: function (data) {
                                                    $('#myModal-addcart').modal();
                                                    console.log(data.cart);
                                                    $("#myModal-addcart .modal-content").html(data.cart);
                                                    $('.loading-shoppingcart').hide();
                                                    $('.cart-title .number-qty').html(msg.total);
                                                    $(".cart-total").mCustomScrollbar({
                                                        scrollButtons: {
                                                            enable: true
                                                        }
                                                    });
                                                    if ($(".cart-total").hasClass("open") == false) {
                                                        $(".cart-total").addClass("open");
                                                    }
                                                }
                                            }
                                        );
                                    });
                                });

                                function updateProductPrice() {
                                    var data = jQuery('#product-detail-info').find('input,select,textarea').serialize();
                                    jQuery.ajax({
                                        type: 'post',
                                        url: '/economy/product/getproductprice/id/63193/lang/en',
                                        data: data,
                                        dataType: "JSON",
                                        success: function (res) {
                                            if (res.code == '200') {
                                                if (res.priceText) {
                                                    jQuery('#product-detail-info').find('.product-detail-price').html(res.priceText);
                                                }
                                            }
                                        },
                                        error: function () {
                                            return false;
                                        }
                                    });
                                }
                                function checkProAtrSelectAll() {
                                    var check = true;
                                    jQuery('#product-detail-info').find('.product-attr').each(function () {
                                        if (!$(this).find('.attrConfig-input').val()) {
                                            check = false;
                                        }
                                    });
                                    return check;
                                }

                                function addNewSet() {
                                    var url = '/economy/shoppingcart/add/lang/en';
                                    var pid = 63193;
                                    var qty = $('#qty').val();
                                    $.ajax({
                                            url: url,
                                            dataType: "json",
                                            data: {pid: pid, make_set: 1,qty:qty},
                                            success: function (data) {
                                                if (data.code == 200) {
                                                    $("#myModal-addcart .modal-content").html(data.cart);
                                                } else if (data.code == 400) {
                                                    alert(data.msg);
                                                }
                                            }
                                        }
                                    );
                                }

                                function addToSetCart(item) {
                                    var url = '/economy/shoppingcart/add/lang/en';
                                    var pid = 63193;
                                    var set = parseInt($(item).attr('data-set'));
                                    var qty = $('#qty').val();
                                    $.ajax({
                                            url: url,
                                            dataType: "json",
                                            data: {pid: pid, set: set},
                                            success: function (data) {
                                                console.log(data.cart);
                                                $("#myModal-addcart .modal-content").html(data.cart);
                                            }
                                        }
                                    );
                                }

                                function deleteSet(item) {
                                    var url = '/economy/shoppingcart/deleteSet/lang/en';
                                    var set = parseInt($(item).attr('data-set'));
                                    $.ajax({
                                            url: url,
                                            dataType: "json",
                                            data: {set: set},
                                            success: function (data) {
                                                console.log(data)
                                                if (data.code == 200) {
                                                    $("#set_" + data.set).html('');

                                                }
                                            }
                                        }
                                    );
                                }
                            </script><img src="http://quananngon.com.vn/statistic.jpg?lang=en" width="0" height="0" style="width: 0; height: 0; display: none;" rel="nofollow" alt="Thong ke"/>                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tool-footer fl-left">
            <div class="container">
                <div class="row mar-10">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-3 pad-10">
                        <div class="footer-social">
                            <a href="#">
                                <img src="http://quananngon.com.vn/themes/introduce/w3ni404/images/facebook.png">
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

                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        var id = '{{ $menu_item->id }}';
        var price = '{{ $menu_item->id }}';
        $('.js-add-to-cart').click(function (e) {
            let qty = $('#qty').val();
            $.ajax({
                url: '{{ route("cart.add") }}',
                method: 'POST',
                data: {
                    _token: '{{ @csrf_token() }}',
                    id: id,
                    price: price,
                    qty: qty
                },
                success: function(result) {
                    if (result.error) {
                        toastr.error('Lỗi, không thể thêm vào giỏ hàng');
                        return;
                    }
                    toastr.success('Thêm sản phẩm vào giỏ hàng thành công');
                    getCountCart();
                }
            })
        })
    </script>
    @endpush
