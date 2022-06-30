@extends('admin.layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Chỉnh sửa menu</h3>
        </div>
        <form action="{{route('menu.update', $menu)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-row mt-2">
                    <label class="col-2">Tên menu:</label>
                    <input type="text" class="form-control col-9" name="name" value="{{$menu->name}}" placeholder="Điền tên menu">
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Loại menu:</label>
                    <input type="text" class="form-control col-9" name="type" value="{{$menu->type}}" placeholder="Điền loại menu">
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Chọn nhà hàng:</label>
                    <select type="date" class="form-control col-9 select2-blue" name="restaurant_branch_id">
                        @foreach($branches as $branch)
                            <option value="{{$branch->id}}" {{$menu->restaurant_branch_id == $branch->id ? 'selected' : ''}}>{{$branch->name}}</option>
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
