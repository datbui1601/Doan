@extends('admin.layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Đặt bàn số #{{$booking->id}}</h3>
        </div>
        <form
            action="{{auth()->user()->role_id == 3 ? route('staff.bookings.update', $booking) : route('bookings.update', $booking)}}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-row mt-2">
                    <label class="col-2">Người đặt:</label>
                    <input type="text" readonly class="form-control col-9" value="{{$booking->name}}"
                           placeholder="Enter name menu item">
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Số điện thoại:</label>
                    <input type="text" readonly class="form-control col-9" value="{{$booking->phone}}"
                           placeholder="Enter pirce menu item">
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Email:</label>
                    <input type="text" readonly class="form-control col-9" value="{{$booking->email}}"
                           placeholder="Enter sale price menu item">
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Thời gian đặt bàn:</label>
                    <input type="text" readonly class="form-control col-9"
                           value="{{$booking->time . ' ' . Carbon\Carbon::parse($booking->date)->format('d-m-Y')}}"
                           placeholder="Enter date to">
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Số lượng người:</label>
                    <input type="text" readonly class="form-control col-9" value="{{$booking->total_people}}">
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Chi nhánh cửa hàng:</label>
                    <input readonly class="form-control col-9"
                           @if ($booking->branch) value="{{$booking->branch->name}}" @endif>
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Tiền đặt cọc:</label>
                    <input readonly class="form-control col-9"
                           value="{{number_format($booking->deposit_money, 0, ',', '.')}} VNĐ">
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Khu vực bàn:</label>
                    <select type="area" class="form-control col-9 select2-blue" name="status">
                        <option value="0" {{$booking->area == 0 ? 'selected' : ''}}>Khu chung</option>
                        <option value="1" {{$booking->area == 1 ? 'selected' : ''}}>Khu phòng VIP</option>
                    </select>
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Trạng thái đặt:</label>
                    <select type="date" class="form-control col-9 select2-blue" name="status">
                        <option value="0" {{$booking->status == 0 ? 'selected' : ''}}>Đang chờ xác nhận</option>
                        <option value="1" {{$booking->status == 1 ? 'selected' : ''}}>Đã chốt bàn</option>
                        <option value="2" {{$booking->status == 2 ? 'selected' : ''}}>Hủy đặt bàn</option>
                        <option value="4" {{$booking->status == 4 ? 'selected' : ''}}>Đã thanh toán</option>
                        <option value="6" {{$booking->status == 6 ? 'selected' : ''}}>Đang được sử dụng</option>
                    </select>
                </div>
                @if(count($booking->table_booking_foods))
                    <div class="form-row mt-2">
                        <label class="col-2">Chi tiết:</label>
                        <table class="col-12 table table-bordered">
                            <tr>
                                <th>#</th>
                                <th>Món ăn</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Tổng giá</th>
                            </tr>
                            @foreach($booking->details as $detail)
                                <tr>
                                    <th>{{$loop->iteration}}</th>
                                    <td>{{$detail->menuItem->name}}</td>
                                    <td>{{$detail->qty}}</td>
                                    <td>{{number_format($detail->price, 0, '.', ',')}} VNĐ</td>
                                    <td>{{number_format($detail->total_price, 0, '.', ',')}} VNĐ</td>
                                </tr>
                            @endforeach


                            <tr>
                                <th colspan="4" style="text-align: right"> Tổng cộng:</th>
                                <th> {{number_format($booking->total_money, 0, '.', ',')}} VNĐ</th>
                            </tr>

                        </table>
                    </div>
                @endif
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </div>
        </form>
    </div>
@endsection
