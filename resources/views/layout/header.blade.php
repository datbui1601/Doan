
{{--<div class="home-popup">--}}
{{--    <div class="ctn-home-popup">--}}
{{--        <span class="close-popup">x</span>--}}
{{--        <div>--}}
{{--            Quảng cáo !!!--}}
{{--        </div>--}}
{{--    </div>--}}

{{--</div>--}}
<div id="myModal-register" class="modal" role="dialog" style="z-index: 99999">
    <div class="modal-dialog" >
        <!-- Modal content-->
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="cont">
                <div class="login-fb-gg">
                    <ul class="clearfix">
                        {{--                        <li class="login-gg">--}}
                        {{--                            <a onclick="openWin2();--}}
                        {{--                                                                return false;"--}}
                        {{--                               href="javascript:void(0)"--}}
                        {{--                               id="w3nlogin" title="Đăng nhập với Google">Đăng nhập với Google</a>--}}
                        {{--                        </li>--}}

                    </ul>
                </div>
                <div class="register-new">
                    <p class="guide">Đăng ký tài khoản
                        <span style=" color:#0c519a; font-size:15px; font-weight:bold; text-transform:uppercase;">Thành viên</span>
                    </p>

                    <form id="form-register" method="POST"
                          action="{{ route('register') }}">
                        @csrf
                        <div class="item-register" style="margin-bottom: 15px;">
                            <input style="margin-bottom: 0px;" type="text"
                                   name="user_name" class="form-control name-register"
                                   placeholder="Nhập tên của bạn" autocomplete="off"/>
                            <div class="errorMessage" id="Users_name_em_"></div>
                        </div>
                        <div class="item-register" style="margin-bottom: 15px;">
                            <input style="margin-bottom: 0px;" type="email"
                                   name="email" class="form-control email-register"
                                   placeholder="Nhập email của bạn" autocomplete="off"/>
                            <div class="errorMessage" id="Users_email_em_"></div>
                        </div>
                        <div class="item-register" style="margin-bottom: 15px;">
                            <input style="margin-bottom: 0px;" type="text"
                                   name="phone" class="form-control email-register"
                                   placeholder="Nhập số điện thoại của bạn" autocomplete="off"/>
                            <div class="errorMessage" id="Users_email_em_"></div>
                        </div>
                        <div class="item-register" style="margin-bottom: 15px;">
                            <input style="margin-bottom: 0px;" type="password"
                                   name="password" class="form-control pass-register" id="inputPassword"
                                   placeholder="Nhập mật khẩu"/>
                            <div class="errorMessage" id="Users_password_em_"></div>
                        </div>
                        <div class="item-register" style="margin-bottom: 15px;">
                            <input style="margin-bottom: 0px;" type="password" name="password-confirmation"
                                   class="form-control pass-register" id="inputPassword"
                                   placeholder="Xác nhận mật khẩu"/>
                            <div class="errorMessage" id="Users_passwordConfirm_em_"></div>
                        </div>
                        <button id="btn-register" style="width: 100%"
                                type="submit" class="btn btn-primary w-100">
                            Đăng ký
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="wrapper">

    <!--header-->
    <div class="header-page" id="top">
        <div class="top-header-page">
            <div class="container">
                <div class="social-header">
                    <ul>
                        <li><a class="facebook" href="https://www.facebook.com/ngon.restaurants/" target="_blank"><i
                                    class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.instagram.com/hethongqan/" target="_blank" rel="nofollow"><i
                                    class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <!--        <li><a class="linkedin" href=""><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>-->
                    </ul>
                </div>

                <div class="menu-top-header">
                    <div class="languages">
                        <a href="set-language079c.html?lang=vi&amp;actionKey=eyJ1cmwiOiJcLyIsInBhcmFtcyI6W119">
                            <img src="{{ asset('themes/introduce/w3ni404/images/flag-vi.png') }}">
                        </a>
                        <a href="set-language41e9.html?lang=en&amp;actionKey=eyJ1cmwiOiJcLyIsInBhcmFtcyI6W119">
                            <img src="{{ asset('themes/introduce/w3ni404/images/flag-en.png') }}">
                        </a>
                    </div>
                    <div class="title-register-form left account ">
                        <p>
                            @if (!auth()->check())
                            <span>
                                <a data-toggle="modal" data-target="#myModal-login"
                                   > Đăng nhập</a>
                                /
                                <a data-toggle="modal" data-target="#myModal-register"
                                  >
                                    Đăng ký </a>
                            </span>
                            @else
                             <span>
                                 Xin chào,
                                <a
                                   href="{{route('booking.detail')}}"> {{ auth()->user()->name }}</a> |
                                 <a href="{{ route('logout') }}">Đăng xuất</a>
                                 <a href="{{ route('profile') }}" style="display: inline-flex; position: relative; border-radius: 9999999px; border: 1px solid white;width: 25px; height: 25px;align-items: center; justify-content: center">
                                     <i class="fa fa-shopping-cart"></i>
                                     <span class="js-text-cart-qty @if (session()->get('cart') == null) d-none @endif" style="position: absolute;
                                        top: -3px;
                                        right: -8px;
                                        display: flex;
                                        background-color: red;
                                        border-radius: 9999px;
                                        width: 14px;
                                        height: 14px;
                                        align-items: center;
                                        justify-content: center;
                                        font-size: 0.8em;">@if (session()->get('cart') != null) {{ count(session()->get('cart')) }} @endif</span>
                                 </a>
                             </span>
                            @endif
                        </p>
                    </div>


                </div>
            </div>
        </div>
        <div class="bottom-header-page">
            <div class="vertical-middle">
                <div class="container">
                    <div class="logo" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine"
                         data-aos-duration="1000">
                        <a href="/"
                           title="Quán ăn ngon" style="font-size: 2em; color: #337ab7; font-weight: bold">
                            <img title="#" src="{{ asset('mediacenter/media/images/1428/logo/logo-qan-vien-trang-1501136712.png') }}"
                                 alt="Quán ăn ngon"> Cua biển Restaurant
                        </a>
                    </div>
                    <button class="js-toggle-right-slidebar  visible-sm visible-xs visible-md">
                        <span class="border-menu"></span>
                        <span class="border-menu"></span>
                        <span class="border-menu"></span>
                    </button>
                    <!-- <div class="box-search">
                        <div class="search-top-index">
                            <form method="get" action="http://quananngon.com.vn/tim-kiem.html?t=1"
                                  class="form-horizontal clearfix" role="search">
                                <input name="q" type="text" placeholder="Tìm kiếm tin bài..." autocomplete="off" -->
                                       <!-- value=""/>
                                <input type="submit" value=""/> -->
                            <!-- </form> -->
                        </div>
                    </div>
                    <div class="frame-box height-logo" data-aos="fade-left" data-aos-offset="300"
                         data-aos-easing="ease-in-sine" data-aos-duration="1000">
                        <nav class="menu-index">
                            <div class="vertical-middle">
                                <ul class="">

                                    <li class="{{ request()->routeIs('index') ? 'active' : '' }} ">
                                        <a href="/"
                                           title="Trang chủ">Trang chủ</a>
                                    </li>
                                    <li class="{{ request()->routeIs('introduction') ? 'active' : '' }}  ">
                                        <a href="{{ route('introduction') }}"
                                           title="Giới thiệu">Giới thiệu</a>
                                    </li>
                                    <li class=" {{ request()->routeIs('menu') ? 'active' : '' }} has-sub ">
                                        <a href="{{ route('menu') }}"
                                           title="Thực đơn">Thực đơn</a>
                                        <ul>
                                            <li class=" ">
                                                <a href="/menus?type=appetizer" title="Món ngon">
                                                    Hải sản tươi sống </a>
                                            </li>
                                            <li class=" ">
                                                <a href="/menus?type=main-course" title="Món tráng miệng">
                                                    Hải sản chế biến sẵn </a>
                                            </li>
                                            <li class=" ">
                                                <a href="/menus?type=dessert" title="Món chính">
                                                    Thức uống </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="{{ request()->routeIs('month') ? 'active' : '' }}">
                                        <a href="{{ route('month') }}"
                                           title="Món ngon tháng">Món ngon tháng</a>
                                    </li>
                                    <li class="{{ request()->routeIs('news') ? 'active' : '' }}">
                                        <a href="{{ route('news') }}"
                                           title="Tin tức">Tin tức</a>
                                    </li>
                                    <li class="   ">
                                        <a href="{{ route('booking') }}"
                                           title="Đặt bàn">Đặt bàn</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
