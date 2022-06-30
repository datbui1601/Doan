@extends('layout.app')
@section('content')
    <div id="main-content">
        <div class="fl-left" style="margin-top: 200px; margin-bottom: 200px;">
            <div class="container">
                <h1>Giỏ hàng của bạn</h1>
                <hr/>
                @if(!isset($carts))
                    @if (session()->get('cart') != null)
                        <div class="row">
                            <table class="table table-hover">
                                <thead>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                </thead>
                                <tbody>
                                @php
                                    $subtotal = 0;
                                @endphp
                                @if(session()->get('cart'))
                                    @foreach(session()->get('cart') as $key => $item)
                                        @php $subtotal += $item->qty * $item->price @endphp
                                        <tr data-id="{{ $key }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ number_format($item->price, 0, '', '.') }}</td>
                                            <td><input type="number" class="form-control w-25 js-qty"
                                                       style="width: 100px"
                                                       value="{{ $item->qty }}"/></td>
                                            <td class="txt-price">{{ number_format($item->qty * $item->price, 0, '', '.') }}</td>
                                            <td><span class="js-delete-item" style="cursor: pointer"><i
                                                        class="fa fa-trash"
                                                        style="color: red;"></i></span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                <tr>
                                    <td colspan="4" class="text-right font-weight-bold " style="font-weight: bold">Tổng
                                        tiền
                                    </td>
                                    <td style="font-weight: bold"
                                        class="txt-total">{{ number_format($subtotal, 0, '', '.') }} VNĐ
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-8"></div>
                            <div class="col-4">
                                <a href="{{route('pay')}}" role="button" class="btn btn-primary" style="float:right">Thanh toán</a>
                            </div>
                        </div>
                    @else
                        <div class="row">Giỏ hàng của bạn đang trống</div>
                    @endif
                @endif
                @if(isset($carts))
                    @if(count($carts) > 0)
                        <div class="row">
                            <table class="table table-hover">
                                <thead>
                                <th>STT</th>
                                <th>Tên người đặt</th>
                                <th>Thời gian</th>
                                <th>Trạng thái</th>
                                <th>Tổng tiền</th>
                                <th>Số tiền đặt cọc</th>
                                </thead>
                                <tbody>
                                @php
                                    $subtotal = 0;
                                @endphp
                                @foreach($carts as $key => $item)
                                    @php $subtotal += $item->total_money @endphp
                                    <tr data-id="{{ $key }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->time . ' ' . \Carbon\Carbon::parse($item->date)->format('d-m-Y') }}</td>
                                        <td>{!! \App\Models\Booking::$status[$item->status]  !!}</td>
                                        <td class="txt-price">{{ number_format($item->deposit_money, 0, '.', ',') }}VNĐ
                                        </td>
                                        <td>{{ number_format($item->total_money, 0, '.', ',') }} VNĐ</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5" class="text-right font-weight-bold " style="font-weight: bold">Tổng
                                        tiền
                                    </td>
                                    <td style="font-weight: bold"
                                        class="txt-total">{{ number_format($subtotal, 0, '', '.') }} VNĐ
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="row">Bạn chưa đặt bàn lần nào</div>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $('.js-qty').on('keyup', function (e) {
            if ($(this).val() <= 0 || $(this).val().trim() == "") $(this).val(1)
        })
        $('.js-qty').on('change', function (e) {
            let parent = $(this).closest('tr');
            let qty = $(this).val();
            let id = parent.data('id');
            $.ajax({
                url: '{{ route('cart.update') }}',
                method: 'POST',
                data: {
                    _token: '{{ @csrf_token() }}',
                    action: 'update',
                    id: id,
                    qty: qty
                },
                success: function (data) {
                    parent.find('.txt-price').text(data.price);
                    $('.txt-total').text(data.total + " VNĐ");
                }
            })
        });

        $('.js-delete-item').on('click', function () {
            let parent = $(this).closest('tr');
            let id = parent.data('id');
            $.ajax({
                url: '{{ route('cart.update') }}',
                method: 'POST',
                data: {
                    _token: '{{ @csrf_token() }}',
                    action: 'delete',
                    id: id,
                },
                success: function (data) {
                    $('.txt-total').text(data.total + " VNĐ");
                    parent.remove();
                    toastr.success('Xóa món ăn khỏi giỏ hàng thành công');
                }
            })
        })
    </script>
@endpush
