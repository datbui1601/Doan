@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Menu Item List</h3>
{{--                    <a class="btn btn-success btn-sm float-right" href="{{route('foods-drinks.create')}}"><i--}}
{{--                            class="fas fa-plus"></i> Add</a>--}}
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Người đặt</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Thời gian</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($bookings) <= 0)
                            <tr>
                                <td colspan="9" style="text-align: center">No result</td>
                            </tr>
                        @else
                            @foreach($bookings as $booking)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$booking->name}}</td>
                                    <td>{{$booking->phone}}</td>
                                    <td>{{$booking->address}}</td>
                                    <td>{{\Carbon\Carbon::parse($booking->date)->format('d-m-Y') .' '. $booking->time}}</td>
                                    <td>{{number_format($booking->total_money, 0, ',', '.')}} VNĐ</td>
                                    <td>{!! \App\Models\Booking::$status[$booking->status] !!}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm"
                                           href="{{auth()->user()->role_id == 3 ? route('staff.orders.edit', $booking) : route('orders.edit', $booking)}}">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        &nbsp;
                                        <span class="btn btn-danger btn-sm" data-id="{{$booking->id}}">
                                            <i class="fa fa-trash"></i>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                {{$bookings->links('admin.layouts.pageList')}}
            </div>

        </div>

    </div>
@endsection
@push('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(document).on('click', '.btn-danger', function(){
            deleteMenu($(this).data('id'));
        })
        function deleteMenu(id) {
            swal({
                title: "Bạn có chắn chắc muốn xóa?",
                text: "Sau khi xóa, bạn sẽ không thể phục hồi lại nó!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: '{{auth()->user()->role_id == 3 ? '/staff/orders/' : '/admin/orders'}}/'+id,
                        method: 'DELETE',
                        data: {
                            _token: '{{@csrf_token()}}'
                        },
                        success: function (result) {
                            if (!result.error) {
                                swal("Thông báo!", result.msg, "success")
                                    .then((value) => {
                                        location.reload();
                                    });
                                return;
                            }
                            swal("Thông báo!", result.msg, "error");
                        }
                    })
                } else {
                    swal("Hủy!");
                }
            })
        }
    </script>
@endpush
