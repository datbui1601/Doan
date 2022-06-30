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
                                    <a class="" href="/" title="homepage">
                                        homepage <span>/</span>
                                    </a>
                                    <a class="active" href="{{ route('menu') }}" title="product">
                                        menu </a>
                                    @if (request()->get('type'))
                                        <a class="active" href="{{ route('menu') }}" title="product">
                                            <span>/</span>{{request()->get('type')}} </a>
                                    @endif
                                </div>
                            </div>
                            <style type="text/css">.tool-footer {
                                    display: none
                                }</style>
                            <img src="statistic9ed2.html?lang=en" width="0" height="0"
                                 style="width: 0; height: 0; display: none;" rel="nofollow" alt="Thong ke"/>
                            <div class="list-product-categories-content">
                                <div class="tab">
                                    <ul class="nav nav-tabs-n">
                                        <li class="{{request()->get('type') == 'appetizer' ? 'active' : ''}}">
                                            <a class="" href="/menus?type=appetizer">
                                                Hải sản tươi sống </a>
                                        </li>
                                        <li class="{{request()->get('type') == 'main-course' ? 'active' : ''}}">
                                            <a class="" href="/menus?type=main-course">
                                                Hải sản chế biến sẵn </a>
                                        </li>
                                        <li class="{{request()->get('type') == 'dessert' ? 'active' : ''}}">
                                            <a class="" href="/menus?type=dessert">
                                                Thức uống </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div>
                                            <div class="mon-content mon1-content">
                                                <div class="row">
                                                    @foreach($menu_items as $menu_item)
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 pad-10">
                                                            <div class="box-img">
                                                                <a href="{{route('detail', $menu_item->id)}}"
                                                                   title="Grilled giant freshwater prawn">
                                                                    <img class="img-zoom"
                                                                         src="/storage/{{$menu_item->avata}}"/>
                                                                </a>
                                                            </div>
                                                            <div class="box-info">
                                                                <h3>
                                                                    <a href="{{route('detail', $menu_item->id)}}"
                                                                       title="Grilled giant freshwater prawn">
                                                                        {{$menu_item->name}} </a>
                                                                </h3>
                                                                <div class="order-product">
                                                                    <a href="{{route('detail', $menu_item->id)}}"
                                                                       title="Grilled giant freshwater prawn">
                                                                        <img
                                                                            src="/themes/introduce/w3ni404/images/icon_db.png"
                                                                            alt="#" title="#">
                                                                        Chọn món
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='paginate'>
                                       @include('layout.pagination', ['paginator' => $menu_items])
                                    </div>
                                </div>
                            </div>
                        </div>
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

                    <div class="footer-top-scroll" id="footer-top-scroll" style="display: none">
                        <a href="javascript:void(0)" title="Scroll Back to Top">
                            <i class="icon icon-scroll"> </i>
                        </a>
                    </div>

                    <script type="text/javascript">
                        jQuery(document).ready(function () {
                            //
                            $('.tothetop').click(function () {
                                $("html, body").animate({
                                    scrollTop: 0
                                }, 600);
                                return false;
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
