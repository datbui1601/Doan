@extends('layout.app')
@push('styles')
    <link href="{{ asset('css/payment.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/payment-css.css') }}" rel="stylesheet"/>
    <style type="text/css">
        .error-js {
            color: red;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('js/payment.js') }}"></script>
@endpush
@section('content')
    @php
        $months = array(1 => 'Tháng một', 2 => 'Tháng hai', 3 => 'Tháng ba', 4 => 'Tháng tư', 5 => 'Tháng năm', 6 => 'Tháng sáu', 7 => 'Tháng bảy', 8 => 'Tháng tám', 9 => 'Tháng chín', 10 => 'Tháng mười', 11 => 'Tháng mười một', 12 => 'Tháng mười hai');
    @endphp
    <!-- Company Overview section START -->
    <div id="main-content" >
        <div class="fl-left" style="margin-top: 200px; margin-bottom: 200px">
            <section class="container-fluid inner-Page" >
                <div class="card-panel">
                    <div class="media wow fadeInUp" data-wow-duration="1s">
                        <div class="companyIcon">
                        </div>
                        <div class="media-body">

                            <div class="container">
                                @if(session('success_msg'))
                                    <div class="alert alert-success fade in alert-dismissible show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true" style="font-size:20px">×</span>
                                        </button>
                                        {{ session('success_msg') }}
                                    </div>
                                @endif
                                @if(session('error_msg'))
                                    <div class="alert alert-danger fade in alert-dismissible show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true" style="font-size:20px">×</span>
                                        </button>
                                        {{ session('error_msg') }}
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1>Thanh toán cho đơn hàng #{{ \Illuminate\Support\Str::padLeft($booking->id, 5, 0) }}</h1>
                                    </div>
                                </div>
                                    <form id="payment-card-info" method="post"
                                          action="{{ route('dopay.online') }}">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6"
                                         style="background: lightgreen; border-radius: 5px; padding: 10px;">
                                        <div class="panel panel-primary">
                                            <div class="creditCardForm">
                                                <div class="payment" style="padding: 20px;">

                                                        @csrf
                                                        <div class="row" >
                                                            <div class="form-group owner col-md-8">
                                                                <label for="owner">Tên chủ thẻ</label>
                                                                <input type="text" class="form-control" id="owner"
                                                                       name="owner" value="{{ old('owner') }}" required>
                                                                <span id="owner-error" class="error text-red">Vui lòng điền tên chủ thẻ</span>
                                                            </div>
                                                            <div class="form-group CVV col-md-4">
                                                                <label for="cvv">CVV</label>
                                                                <input type="number" class="form-control" id="cvv"
                                                                       name="cvv" value="{{ old('cvv') }}" required>
                                                                <span id="cvv-error" class="error text-red">Vui lòng nhập cvv</span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-8" id="card-number-field">
                                                                <label for="cardNumber">Số thẻ</label>
                                                                <input type="text" class="form-control" id="cardNumber"
                                                                       name="cardNumber" value="{{ old('cardNumber') }}"
                                                                       required>
                                                                <span id="card-error" class="error text-red">Vui lòng điền số thẻ</span>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="amount">Số tiền thanh toán</label>
                                                                <input type="text" class="form-control" value="{{ $booking->total_money }}"
                                                                       disabled>
{{--                                                                <span>{{ $booking->total_money }}</span>--}}
{{--                                                                <span id="amount-error" class="error text-red">Please enter amount</span>--}}
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-7" id="expiration-date">
                                                                <label>Ngày hết hạn</label><br/>
                                                                <select class="form-control" id="expiration-month"
                                                                        name="expiration-month"
                                                                        style="float: left; width: 150px; margin-right: 10px;">
                                                                    @foreach($months as $k=>$v)
                                                                        <option
                                                                            value="{{ $k }}" {{ old('expiration-month') == $k ? 'selected' : '' }}>{{ $v }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <select class="form-control" id="expiration-year"
                                                                        name="expiration-year"
                                                                        style="float: left; width: 100px;">

                                                                    @for($i = date('Y'); $i <= (date('Y') + 15); $i++)
                                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-5" id="credit_cards"
                                                                 style="margin-top: 22px;">
                                                                <img src="{{ asset('images/visa.jpg') }}" id="visa">
                                                                <img src="{{ asset('images/mastercard.jpg') }}"
                                                                     id="mastercard">
                                                                <img src="{{ asset('images/amex.jpg') }}" id="amex">
                                                            </div>
                                                        </div>
                                                        <input type="hidden" class="form-control" id="amount"
                                                               name="amount" min="1" value="{{ $booking->total_money }}"
                                                               required>
                                                        <input type="hidden" class="form-control" id="order_id"
                                                        name="order_id" value="{{ $booking->id }}"
                                                        required>
                                                        <br/>
                                                        <div class="form-group" id="pay-now">
                                                            <button type="submit" class="btn btn-success themeButton"
                                                                    id="confirm-purchase">Xác nhận thanh toán
                                                            </button>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5"
                                         style="background: lightblue; border-radius: 5px; padding: 10px;">
                                        <h3>Thông tin đơn hàng</h3>
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <th>
                                                    Người đặt
                                                </th>
                                                <td>
                                                    <input type="text" name="booking_user" class="form-control" value="{{ $booking->name }}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Số điện thoại
                                                </th>
                                                <td>
                                                    <input type="text" name="booking_phone" class="form-control js-phone" value="{{ $booking->phone }}">
                                                    <span class="error-js js-phone-txt">Vui lòng nhập số điện thoại</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Email
                                                </th>
                                                <td>
                                                    <input type="text" name="booking_email" class="form-control" value="{{ $booking->email }}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Địa chỉ
                                                </th>
                                                <td>
                                                    <input type="text" name="booking_address" class="form-control js-address" value="{{ $booking->address }}">
                                                    <span class="error-js js-address-txt">Vui lòng nhập địa chỉ</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Thông tin đơn hàng
                                                </th>
                                                <td>
                                                    <table>
                                                        <thead>
                                                            <th>STT</th>
                                                            <th>Tên</th>
                                                            <th>Số lượng</th>
                                                            <th>Tổng tiền</th>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($booking->details as $detail)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $detail->menuItem->name }}</td>
                                                                    <td>{{ $detail->qty }}</td>
                                                                    <td style="text-align: right">{{ number_format($detail->total_price, 0, '', '.') }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </section>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        check();
        function check() {
            $('.js-phone-txt').hide();
            $('.js-address-txt').hide();
            $('#confirm-purchase').removeAttr('disabled');
            if ($('.js-phone').val().trim() == '') {
                $('.js-phone-txt').show();
                $('#confirm-purchase').attr('disabled', true);
            }
            if ($('.js-address').val().trim() == '') {
                $('.js-address-txt').show();
                $('#confirm-purchase').attr('disabled', true);
            }
        }

        $('.js-phone').on('keyup', function () {
            if ($(this).val().trim() == '') {
                $('.js-phone-txt').show();
                $('#confirm-purchase').attr('disabled', true);
                return
            }
            $('.js-phone-txt').hide();
            if ($('.js-address').val().trim() != '') {
                $('#confirm-purchase').removeAttr('disabled');
            }

        })

        $('.js-address').on('keyup', function () {
            if ($(this).val().trim() == '') {
                $('.js-address-txt').show();
                $('#confirm-purchase').attr('disabled', true);
                return
            }
            $('.js-address-txt').hide();
            if ($('.js-phone').val().trim() != '') {
                $('#confirm-purchase').removeAttr('disabled');
            }
        })
    </script>
    @endpush
