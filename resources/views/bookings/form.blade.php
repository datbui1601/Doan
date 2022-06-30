@extends('layout.app')
{{--@push('styles')--}}
{{--    <link rel="stylesheet" href="themes/introduce/w3ni404/css/style0ff5.css?v=1.0.2"/>--}}
{{--    <link rel="stylesheet" href="themes/introduce/w3ni404/css/responsive0ff5.css?v=1.0.2"/>--}}
{{--@endpush--}}
@section('content')
    <div id="main-content" style="margin-top: 200px; padding: 20px;">
        <div class="fl-left">
            <div class="container">
                <div class="row mar-10">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pad-10">
                        <div class="news-page bg-white" style="padding: 10px;">
                            <div class="filter-product filter-grid">
                                <div class="left">
                                    <a class="" href="/" title="homepage">
                                        homepage <span>/</span>
                                    </a>
                                    <a class="active" href="book_table9ed2.html?lang=en" title="Đặt bàn">
                                        Đặt bàn </a>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pad-0">
                                <style type="text/css">.tool-footer {
                                        display: none
                                    }</style>
                                <link rel="stylesheet" href="themes/introduce/w3ni404/css/jquery-ui.min.html"/>
                                <script src="themes/introduce/w3ni404/js/jquery-ui.min.html"></script>
                                <div class="section bg-white bg-inpage">
                                    <div class="bg-order-reve">
                                        <div class="s">
                                            <form id="book-table"
                                                  action="{{route('booking.post')}}"
                                                  method="POST"><h2>Đặt bàn</h2>
                                                @csrf
                                                <div
                                                    class="right-item-intro ctn-intro-style width-50 left pad-right-30">
                                                    <div class="form-order-reve">
                                                        <span id="BookTable_branch">
                                                            @foreach($restaurant_branches as $key => $branch)
                                                                <div class="rb">
                                                                <input id="BookTable_branch_$key"
                                                                       value="{{$branch->id}}" type="radio"
                                                                       {{$restaurant_branches->first()->id == $branch->id ? 'checked' : ''}}
                                                                       name="branch_id"/>
                                                                <label
                                                                    for="BookTable_branch_$key">{{$branch->name.', '.$branch->address}}</label>
                                                            </div>
                                                            @endforeach
                                                        <div class="errorMessage" id="BookTable_branch_em_"
                                                             style="display:none"></div>
                                                    </div>
                                                    @if (auth()->check())
                                                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                                    @endif
                                                    <div class="form-order">
                                                        <label for="BookTable_name" class="required">Họ và tên <span
                                                                class="required">*</span></label>
                                                        <!--                            <label>Họ và tên: </label>-->
                                                        <div class="input-form-order">
                                                            <input class=" w3-form-input" placeholder="Nhập họ và tên"
                                                                   name="name" id="BookTable_name" type="text"
                                                                   maxlength="255"
                                                                   @if (auth()->check()) value="{{ auth()->user()->name }}" @endif />
                                                        </div>
                                                        @error('name')
                                                        <div class="errorMessage">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-order">
                                                        <label for="BookTable_phone" class="required">Số điện thoại
                                                            <span
                                                                class="required">*</span></label>
                                                        <!--                            <label>Số điện thoại: </label>-->
                                                        <div class="input-form-order">
                                                            <input class=" w3-form-input"
                                                                   placeholder="Nhập số điện thoại"
                                                                   name="phone" id="BookTable_phone" type="text"
                                                                   maxlength="20"
                                                                   @if (auth()->check()) value="{{ auth()->user()->phone }}" @endif/>
                                                        </div>
                                                        @error('phone')
                                                        <div class="errorMessage">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-order">
                                                        <label for="BookTable_email">Email</label>
                                                        <!--                            <label>Email: </label>-->
                                                        <div class="input-form-order">
                                                            <input class=" w3-form-input"
                                                                   placeholder="Nhập địa chỉ email"
                                                                   name="email" id="BookTable_email" type="text"
                                                                   maxlength="255"
                                                                   @if (auth()->check()) value="{{ auth()->user()->email }}" @endif/>
                                                        </div>
                                                        @error('email')
                                                        <div class="errorMessage">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-order">
                                                        <label for="BookTable_quantity" class="required">Số người <span
                                                                class="required">*</span></label>
                                                        <!--                            <label>Số khách tham gia: </label>-->
                                                        <div class="input-form-order">
                                                            <input class=" w3-form-input" placeholder="Nhập số người"
                                                                   name="quantity" id="BookTable_quantity"
                                                                   type="text"/></div>
                                                        @error('quantity')
                                                        <div class="errorMessage">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-order">
                                                        <label for="BookTable_book_date" class="required">Đặt ngày <span
                                                                class="required">*</span></label>
                                                        <!--                            <label>Ngày:</label>-->

                                                        <div class="input-form-order">
                                                            <input class="w3-form-input datepicker-here"
                                                                   placeholder="Nhập ngày" data-language="en"
                                                                   name="date" id="BookTable_book_date"
                                                                   type="date"/>
                                                            @error('date')
                                                            <div class="errorMessage">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-order">
                                                        <!--                                --> <label
                                                            for="BookTable_book_time" class="required">Thời gian<span
                                                                class="required">*</span></label>
                                                        <!--                            <label>Giờ:</label>-->
                                                        <div class="input-form-order">
                                                            <input class="w3-form-input input-text"
                                                                   placeholder="Nhập thời gian"
                                                                   name="time" id="BookTable_book_time"
                                                                   type="time" maxlength="255"/></div>
                                                        <div class="errorMessage" id="error_time"></div>
                                                        @error('time')
                                                        <div class="errorMessage">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-order">
                                                        <label for="area_message">Chọn khu vực<span
                                                                class="required">*</span></label>
                                                        <!--                            <label>Ghi chú:</label>-->
                                                        <div class="input-form-order">
                                                            <select style="height: 45px"
                                                                    class="w3-form-input input-textarea" name="area"
                                                                    id="area_message">
                                                                <option value="">-----Chọn khu vực bàn-----</option>
                                                                <option value="0">Khu chung</option>
                                                                <option value="1">Khu phòng VIP</option>
                                                            </select>
                                                        </div>
                                                        @error('area')
                                                        <div class="errorMessage">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-order">
                                                        <label for="BookTable_message">Ghi chú</label>
                                                        <!--                            <label>Ghi chú:</label>-->
                                                        <div class="input-form-order">
                                                        <textarea class="w3-form-input input-textarea"
                                                                  placeholder="Nhập ghi chú" name="note"
                                                                  id="BookTable_message"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-order">
                                                        <label for="BookTable_deposit">Đặt cọc</label>
                                                        <div class="input-form-order">
                                                            <input class="w3-form-input input-text"
                                                                   placeholder="Nhập số tiền" readonly
                                                                   id="BookTable_deposit"
                                                                   type="text" value="500.000 VNĐ"/>
                                                            <input class="w3-form-input input-text"
                                                                   placeholder="Nhập số tiền" readonly=""
                                                                   name="deposit"
                                                                   type="hidden" value="500000"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="left-item-intro width-50 right">
                                                    <div class="img-box-intro">

                                                        <img class="img-zoom"
                                                             src="mediacenter/media/files/1428/banners/aaa.jpg"
                                                             alt="Banner 1">

                                                        <img class="img-zoom"
                                                             src="mediacenter/media/files/1428/banners/asd.jpg"
                                                             alt="Banner 2">

                                                        <img class="img-zoom"
                                                             src="mediacenter/media/files/1428/banners/abc.jpg"
                                                             alt="Banner 3">

                                                        <img class="img-zoom"
                                                             src="mediacenter/media/files/1428/banners/xyz.jpg"
                                                             alt="Banner 4">
                                                    </div>
                                                </div>
                                                <div class="form-order row display-flex ">
                                                    <label class="col-12 text-left" style="margin-left: 55px;">Chọn
                                                        món</label>
                                                    <!--                            <label>Ghi chú:</label>-->
                                                    <div class="row ml-5">
                                                        @foreach($foods as $food)
                                                            <div class="form-row col-4 d-flex mt-2">
                                                                <input type="checkbox"
                                                                       name="foods[{{$food->id}}][food]">
                                                                <div class="col-4">
                                                                    <img style="border: 2px solid #cccccc"
                                                                         src="{{$food->avata ? '/storage/'.$food->avata : '/images/no-image.png'}}">
                                                                </div>
                                                                <div class="col-8 row">
                                                                    <p class="col-12 text-break">
                                                                        {{$food->name}}
                                                                    </p>
                                                                    <h6 class="col-12">
                                                                        {{number_format($food->price, 0, ',', ',')}} VNĐ
                                                                        <input type="hidden"
                                                                               name="foods[{{$food->id}}][price]"
                                                                               value="{{$food->price}}">
                                                                    </h6>
                                                                    <input
                                                                        class="ml-2 col-4 form-control form-control-sm"
                                                                        type="number"
                                                                        name="foods[{{$food->id}}][number]" min="1"
                                                                        oninvalid="this.setCustomValidity('Giá trị nhập vào phải lớn hơn hoặc bằng 1!')"
                                                                        oninput="this.setCustomValidity('')">
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="btn-book-order w-100">
                                                    <div class="w-25 m-auto">
                                                        <input type="submit" id="btn_submit"
                                                               class="btn btn-primary w3-btn w3-btn-sb continue m-0"
                                                               value="Đặt">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    $(function () {
                                        $(".datepicker-here").datepicker();
                                    });
                                </script>
                                <style type="text/css">
                                    #BookTable_branch label {
                                        width: 180px;
                                        color: #6e9a43;
                                        font-size: 15px;
                                        margin-right: 15px;
                                        text-align: left;
                                        white-space: nowrap;
                                        margin-top: 6px;
                                    }

                                    #ui-datepicker-div {
                                        background: #fff;
                                        width: 250px;
                                    }

                                    .ui-datepicker-calendar {
                                        width: 100%;
                                        border: 10px solid #fff;
                                        text-align: center;
                                    }

                                    .ui-datepicker-calendar tr th {
                                        text-align: center;
                                    }

                                    .ui-datepicker-title {
                                        text-align: center;
                                        font-weight: 600;
                                        color: #6e9a43;
                                        padding-top: 12px;
                                    }

                                    .ui-datepicker-prev {
                                        padding: 10px;
                                        position: absolute;
                                        cursor: pointer;
                                    }

                                    .ui-datepicker-next {
                                        float: right;
                                        padding: 10px;
                                        position: absolute;
                                        right: 0px;
                                        cursor: pointer;
                                    }

                                    .ui-datepicker-header {
                                        height: 40px;
                                    }

                                    .ui-state-default:hover {
                                        background: #6e9a43;
                                        color: #fff;
                                    }

                                    .popup-alert {
                                        position: fixed;
                                        left: 0px;
                                        right: 0px;
                                        bottom: 0px;
                                        top: 0px;
                                        width: 400px;
                                        height: 200px;
                                        background: #fff;
                                        margin: auto;
                                        z-index: 999999999999;
                                        box-shadow: 0px 3px 12px #c4161c;
                                        border-top: 6px solid #c4161c;
                                        padding: 30px;
                                        text-align: center;
                                    }

                                    .ctn-popup-alert p {
                                        font-size: 15px;
                                    }

                                    .ctn-popup-alert p span {
                                        font-size: 16px;
                                        font-family: 'UTM Avo';
                                        font-weight: 600;
                                        text-transform: uppercase;
                                        color: #c4161c;
                                        float: left;
                                        width: 100%;
                                        margin-top: 35px;
                                        margin-bottom: 12px;
                                    }

                                    .btn-close-popup {
                                        position: absolute;
                                        right: -11px;
                                        top: -17px;
                                        color: #fff;
                                        background: #c4161c;
                                        border-radius: 50%;
                                        width: 25px;
                                        font-size: 15px;
                                        height: 25px;
                                        padding-top: 2px;
                                        box-shadow: -1px 1px 3px #423737;
                                    }

                                    .filter-product {
                                        display: none;
                                    }
                                </style>


                                <!-- <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 pad-0">
                                        <div class="tab-news-page">
                    <div class="tab-menu-area">
                        <ul class="tab-menu">
                            <li class="active">
                                                        <a data-toggle="tab" href="#description">Tin nổi bật</a>
                                                </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div id="description" class="tab-pane fade in active">
                                                <div class="item-tab-content">
                                    <div class="img-item-tab">
                                        <a href="/khach-quoc-te-tram-tro-truoc-ve-dep-van-mieu-o-trien-lam-anh-thu-vong-nguyet-nd32931.html?lang=en" title="International visitors admire the beauty of the Temple of Literature at the photo exhibition Thu Vọng Nguyet">
                                            <img src="http://quananngon.com.vn/mediacenter/media/images/1428/news/ava/s150_150/6-1510106917.jpg" />
                                        </a>
                                        <p>
                                            08 Tháng 11<span>2017</span>
                                        </p>
                                    </div>
                                    <div class="ctn-item-tab">
                                        <h2>
                                            <a href="/khach-quoc-te-tram-tro-truoc-ve-dep-van-mieu-o-trien-lam-anh-thu-vong-nguyet-nd32931.html?lang=en" title="International visitors admire the beauty of the Temple of Literature at the photo exhibition Thu Vọng Nguyet">International visitors admire the beauty of the Temple of Literature at the photo exhibition Thu Vọng Nguyet</a>
                                        </h2>
                                        <p>
                                            More than 200 unique photographs were displayed at the exhibition "Thu Vọng Nguyet" at ...                            </p>
                                        <div class="view-more-item-tab">
                                            <a href="/khach-quoc-te-tram-tro-truoc-ve-dep-van-mieu-o-trien-lam-anh-thu-vong-nguyet-nd32931.html?lang=en">
                                                Xem thêm ...
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                                <div class="item-tab-content">
                                    <div class="img-item-tab">
                                        <a href="/banh-trung-thu-co-truyen-thu-vong-nguyet-cua-quan-an-ngon-nd29605.html?lang=en" title="Traditional Thu Vong Nguyet moon cakes of Quan An Ngon restaurants">
                                            <img src="http://quananngon.com.vn/mediacenter/media/images/1428/news/ava/s150_150/thu-1-1504860181.jpg" />
                                        </a>
                                        <p>
                                            08 Tháng 09<span>2017</span>
                                        </p>
                                    </div>
                                    <div class="ctn-item-tab">
                                        <h2>
                                            <a href="/banh-trung-thu-co-truyen-thu-vong-nguyet-cua-quan-an-ngon-nd29605.html?lang=en" title="Traditional Thu Vong Nguyet moon cakes of Quan An Ngon restaurants">Traditional Thu Vong Nguyet moon cakes of Quan An Ngon restaurants</a>
                                        </h2>
                                        <p>
                                            Quan An Ngon restaurants sells traditional moon cake Thu Vong Nguyet made by the number-one...                            </p>
                                        <div class="view-more-item-tab">
                                            <a href="/banh-trung-thu-co-truyen-thu-vong-nguyet-cua-quan-an-ngon-nd29605.html?lang=en">
                                                Xem thêm ...
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                                <div class="item-tab-content">
                                    <div class="img-item-tab">
                                        <a href="/huong-vi-oc-sai-gon-dich-thuc-tai-quan-an-ngon-18-phan-boi-chau-nd28411.html?lang=en" title="Authentic taste of Saigon snails at Quan An Ngon restaurants">
                                            <img src="http://quananngon.com.vn/mediacenter/media/images/1428/news/ava/s150_150/oc-bong-xao-me-nho-1502855349.jpg" />
                                        </a>
                                        <p>
                                            16 Tháng 08<span>2017</span>
                                        </p>
                                    </div>
                                    <div class="ctn-item-tab">
                                        <h2>
                                            <a href="/huong-vi-oc-sai-gon-dich-thuc-tai-quan-an-ngon-18-phan-boi-chau-nd28411.html?lang=en" title="Authentic taste of Saigon snails at Quan An Ngon restaurants">Authentic taste of Saigon snails at Quan An Ngon restaurants</a>
                                        </h2>
                                        <p>
                                            Speaking of street snacks in Saigon, surely many people will think of snails by variety ...                            </p>
                                        <div class="view-more-item-tab">
                                            <a href="/huong-vi-oc-sai-gon-dich-thuc-tai-quan-an-ngon-18-phan-boi-chau-nd28411.html?lang=en">
                                                Xem thêm ...
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                        </div>
                    </div>
                </div>
                    <div class="banner-list-page">
                                        <a href="">
                            <img src="/mediacenter/media/files/1428/banners/314_1517217352_4225a6ee648224ad.jpg" />
                        </a>
                        </div>
                <div class="tab-news-page">
                    <div class="tab-menu-area">
                        <ul class="tab-menu">
                            <li class="active">
                                                        <a data-toggle="tab" href="#description">Tin mới</a>
                                                </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div id="description" class="tab-pane fade in active">
                                                <div class="item-tab-content">
                                    <div class="img-item-tab">
                                        <a href="/mon-ngon-thang-lau-cua-dong-huong-vi-dong-que-giua-long-ha-noi-nd33371.html?lang=en" title="Delicious dish of the month – Fresh water crab hot pot – the taste of the country in the center of Hanoi ">
                                            <img src="http://quananngon.com.vn/mediacenter/media/images/1428/news/ava/s150_150/post-fb-qan-1200x798-1510643605.jpg" />
                                        </a>
                                        <p>
                                            14 Tháng 11<span>2017</span>
                                        </p>
                                    </div>
                                    <div class="ctn-item-tab">
                                        <h2>
                                            <a href="/mon-ngon-thang-lau-cua-dong-huong-vi-dong-que-giua-long-ha-noi-nd33371.html?lang=en" title="Delicious dish of the month – Fresh water crab hot pot – the taste of the country in the center of Hanoi ">Delicious dish of the month – Fresh water crab hot pot – the taste of the country in the center of Hanoi </a>
                                        </h2>
                                        <p>
                                            Whoever has tasted the ricefield crab hot pot of Quan An Ngon restaurants will love the ...                            </p>
                                        <div class="view-more-item-tab">
                                            <a href="/mon-ngon-thang-lau-cua-dong-huong-vi-dong-que-giua-long-ha-noi-nd33371.html?lang=en">
                                                Xem thêm ...
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                                <div class="item-tab-content">
                                    <div class="img-item-tab">
                                        <a href="/mon-ngon-thang-lau-cua-dong-huong-vi-dong-que-giua-long-ha-noi-nd33370.html?lang=en" title="Delicious dish of the month – Fresh water crab hot pot – the taste of the country in the center of Hanoi ">
                                            <img src="http://quananngon.com.vn/mediacenter/media/images/1428/news/ava/s150_150/post-fb-qan-1200x798-1510643605.jpg" />
                                        </a>
                                        <p>
                                            14 Tháng 11<span>2017</span>
                                        </p>
                                    </div>
                                    <div class="ctn-item-tab">
                                        <h2>
                                            <a href="/mon-ngon-thang-lau-cua-dong-huong-vi-dong-que-giua-long-ha-noi-nd33370.html?lang=en" title="Delicious dish of the month – Fresh water crab hot pot – the taste of the country in the center of Hanoi ">Delicious dish of the month – Fresh water crab hot pot – the taste of the country in the center of Hanoi </a>
                                        </h2>
                                        <p>
                                            The wind is blowing, come here to eat horn-eyed ghost crab Eat fish when you get to the ...                            </p>
                                        <div class="view-more-item-tab">
                                            <a href="/mon-ngon-thang-lau-cua-dong-huong-vi-dong-que-giua-long-ha-noi-nd33370.html?lang=en">
                                                Xem thêm ...
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                                <div class="item-tab-content">
                                    <div class="img-item-tab">
                                        <a href="/khach-quoc-te-tram-tro-truoc-ve-dep-van-mieu-o-trien-lam-anh-thu-vong-nguyet-nd32931.html?lang=en" title="International visitors admire the beauty of the Temple of Literature at the photo exhibition Thu Vọng Nguyet">
                                            <img src="http://quananngon.com.vn/mediacenter/media/images/1428/news/ava/s150_150/6-1510106917.jpg" />
                                        </a>
                                        <p>
                                            08 Tháng 11<span>2017</span>
                                        </p>
                                    </div>
                                    <div class="ctn-item-tab">
                                        <h2>
                                            <a href="/khach-quoc-te-tram-tro-truoc-ve-dep-van-mieu-o-trien-lam-anh-thu-vong-nguyet-nd32931.html?lang=en" title="International visitors admire the beauty of the Temple of Literature at the photo exhibition Thu Vọng Nguyet">International visitors admire the beauty of the Temple of Literature at the photo exhibition Thu Vọng Nguyet</a>
                                        </h2>
                                        <p>
                                            More than 200 unique photographs were displayed at the exhibition "Thu Vọng Nguyet" at ...                            </p>
                                        <div class="view-more-item-tab">
                                            <a href="/khach-quoc-te-tram-tro-truoc-ve-dep-van-mieu-o-trien-lam-anh-thu-vong-nguyet-nd32931.html?lang=en">
                                                Xem thêm ...
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                        </div>
                    </div>
                </div>
                                    </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="tool-footer fl-left">
                <div class="container">
                    <div class="row mar-10">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-3 pad-10">
                            <div class="footer-social">
                                <a href="">
                                    <img src="/themes/introduce/w3ni404/images/facebook.png">
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
            </script>        </div>
                </div>
            </div>
             -->
        </div>
        @endsection
        @push('scripts')
            <script type="text/javascript">
                $(document).on('change', '#BookTable_book_time', function () {
                    let time = $(this).val();
                    $('#btn_submit').prop('disabled', false);
                    $('#error_time').html('')
                    if(Date.parse("1-1-2000 22:00") < Date.parse("1-1-2000 " + time)) {
                        $('#error_time').html('<sup>*</sup>Chỉ được đặt bàn trong khung giờ từ 7h00 đến 22:00')
                        $('#btn_submit').prop('disabled', true);
                    }
                })
            </script>
    @endpush
