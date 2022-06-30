@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách loại tin tức</h3>
                    <a class="btn btn-success btn-sm float-right" href="{{route('categories.create')}}"><i
                            class="fas fa-plus"></i> Thêm mới</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Tên</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($news_categories) <= 0)
                            <tr>
                                <td colspan="3" style="text-align: center">No result</td>
                            </tr>
                        @else
                            @foreach($news_categories as $category)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm"
                                           href="{{route('categories.edit', $category)}}">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        &nbsp;
                                        <span class="btn btn-danger  btn-sm"
                                              onclick="deleteItem('{{$category->id}}')">
                                            <i class="fa fa-trash"></i>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                {{$news_categories->links('admin.layouts.pageList')}}
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
                        url: '/admin/news_categories/' + id,
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
