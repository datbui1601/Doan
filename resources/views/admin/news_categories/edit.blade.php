@extends('admin.layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Chỉnh sửa loại tin tức</h3>
        </div>
        <form action="{{route('categories.update', $news_categories)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-row mt-2">
                    <label class="col-2">Tên:</label>
                    <input type="text" class="form-control col-9" name="name" value="{{$news_categories->name}}" placeholder="Điền tên">
                    <div class="col-2"></div>
                    @error('name')
                    <div class="col-9 text_error">
                        <p>{{$message}}</p>
                    </div>
                    @enderror
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </div>
            </div>
        </form>
    </div>
@endsection
