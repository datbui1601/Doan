@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách chi nhánh</h3>
                    <a class="btn btn-success btn-sm float-right" href="{{route('branches.create')}}"><i
                            class="fas fa-plus"></i> Thêm mới</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Tên chi nhánh</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Người quản lý</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($branches) <= 0)
                            <tr>
                                <td colspan="6" style="text-align: center">No result</td>
                            </tr>
                        @else
                            @foreach($branches as $branch)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$branch->name}}</td>
                                    <td>{{$branch->address}}</td>
                                    <td>{{$branch->phone}}</td>
                                    <td>{{$branch->user->name}}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm"
                                           href="{{route('branches.edit', $branch)}}">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        &nbsp;
                                        <span class="btn btn-danger  btn-sm"
                                              onclick="deleteItem('{{$branch->id}}')">
                                            <i class="fa fa-trash"></i>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                {{$branches->links('admin.layouts.pageList')}}
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
                        url: '/admin/restaurants/branches/' + id,
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
