@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách tin tức</h3>
                    <a class="btn btn-success btn-sm float-right" href="{{route('news.create')}}"><i
                            class="fas fa-plus"></i> Thêm mới</a>
                </div>
                <div class="card-body row">
                    @if(count($news) <= 0)
                        <p class="col-12 text-center">No result</p>
                    @else
                        @foreach($news as $new)
                            <div class="col-4">
                                <div
                                    style="margin-left: 5px; margin-bottom: 10px; background-color: #f3f3f3; border-radius: 10px; ">
                                    <div class="col-12">
                                        <div class="p-1 col-12">
                                            <label>Ngày
                                                tạo: {{\Carbon\Carbon::parse($new->created_at)->format('d-m-Y')}}</label>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-7 p-1">
                                                <h5 style="-webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; display: -webkit-box;">
                                                    {{$new->title}}
                                                </h5>
                                            </div>
                                            <div class="col-4 p-1">
                                                <img class="w-100 h-100"
                                                     src="{{'/storage/' . $new->image}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex mt-4"
                                         style="background-color: #e6e4e4;border-radius: 0 0 10px 10px">
                                        <div class="col-7 pt-3">
                                            <span class="badge badge-primary"> {{$new->category->name}} </span>
                                        </div>
                                        <div class="col-5 pt-3 pb-4">
                                            <span style="padding: 6px 2px;"
                                                    class="badge {{ $new->status ? 'badge-primary' : 'badge-secondary'}}">{{$new->status ? "Show" : "Hide"}}</span>
                                            <a class="btn btn-success btn-xs"
                                               href="{{route('news.edit', $new->id)}}"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-danger btn-xs" href="#"
                                               onclick="deleteItem({{$new->id}})">
                                                <i class=" fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>
                @endif
                {{$news->links('admin.layouts.pageList')}}
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
                        url: '/admin/news/' + id,
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
