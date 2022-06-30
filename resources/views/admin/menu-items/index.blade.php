@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách đồ ăn&Thức uống</h3>
                    <a class="btn btn-success btn-sm float-right" href="{{route('foods-drinks.create')}}"><i
                            class="fas fa-plus"></i> Thêm mới</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Giá khuyến mãi</th>
                            <th>Có hiệu lực từ ngày</th>
                            <th>Đến ngày</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($menu_items) <= 0)
                            <tr>
                                <td colspan="7" style="text-align: center">No result</td>
                            </tr>
                        @else
                            @foreach($menu_items as $menu_item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$menu_item->name}}</td>
                                    <td>{{number_format($menu_item->price, 0, ',', '.')}} VNĐ</td>
                                    <td>{{number_format($menu_item->sale_price, 0, ',', '.')}} VNĐ</td>
                                    <td>{{\Carbon\Carbon::parse($menu_item->valid_from)->format('d-m-Y')}}</td>
                                    <td>{{\Carbon\Carbon::parse($menu_item->valid_to)->format('d-m-Y')}}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm"
                                           href="{{route('foods-drinks.edit', $menu_item)}}">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        &nbsp;
                                        <span class="btn btn-danger  btn-sm"
                                              onclick="deleteItem('{{$menu_item->id}}')">
                                            <i class="fa fa-trash"></i>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                {{$menu_items->links('admin.layouts.pageList')}}
            </div>

        </div>

    </div>
@endsection
@push('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        function deleteItem(id) {
            swal({
                title: "Bạn có chắn chắc muốn xóa",
                text: "Sau khi xóa, bạn sẽ không thể phục hồi lại nó!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: '/admin/foods-drinks/' + id,
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
