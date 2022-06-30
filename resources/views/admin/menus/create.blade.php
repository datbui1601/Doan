@extends('admin.layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thêm menu</h3>
        </div>
        <form action="{{route('menu.store')}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-row mt-2">
                    <label class="col-2">Tên menu:</label>
                    <input type="text" class="form-control col-9" name="name" value="{{old('name')}}" placeholder="Điền tên menu">
                    <div class="col-2"></div>
                    @error('name')
                    <div class="col-9 text_error">
                        <p>{{$message}}</p>
                    </div>
                    @enderror
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Loại menu:</label>
                    <input type="text" class="form-control col-9" name="type" value="{{old('type')}}" placeholder="Điền loại menu">
                    <div class="col-2"></div>
                    @error('type')
                    <div class="col-9 text_error">
                        <p>{{$message}}</p>
                    </div>
                    @enderror
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Chọn nhà hàng:</label>
                    <select type="date" class="form-control col-9 select2-blue" name="restaurant_branch_id">
                        @foreach($branches as $branch)
                            <option value="{{$branch->id}}" {{old('restaurant_branch_id') == $branch->id ? 'selected' : ''}}>{{$branch->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </div>
            </div>
        </form>
    </div>
@endsection
