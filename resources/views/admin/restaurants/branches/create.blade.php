@extends('admin.layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thêm mới chi nhánh</h3>
        </div>
        <form action="{{route('branches.store')}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-row mt-2">
                    <label class="col-2">Tên chi nhánh:</label>
                    <input type="text" class="form-control col-9" name="name" value="{{old('name')}}" placeholder="Điền tên chi nhánh">
                    <div class="col-2"></div>
                    @error('name')
                    <div class="col-9 text_error">
                        <p>{{$message}}</p>
                    </div>
                    @enderror
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Địa chỉ:</label>
                    <input type="text" class="form-control col-9" name="address" value="{{old('address')}}" placeholder="Điền địa chỉ">
                    <div class="col-2"></div>
                    @error('address')
                    <div class="col-9 text_error">
                        <p>{{$message}}</p>
                    </div>
                    @enderror
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Số điện thoại:</label>
                    <input type="text" class="form-control col-9" name="phone" value="{{old('phone')}}" placeholder="Điền số điện thoại">
                    <div class="col-2"></div>
                    @error('phone')
                    <div class="col-9 text_error">
                        <p>{{$message}}</p>
                    </div>
                    @enderror
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Người quản lý:</label>
                    <select class="form-control col-9 select2 select2-hidden-accessible" name="user_id" style="width: 100%;"
                            data-select2-id="1" tabindex="-1" aria-hidden="true">
                        @foreach($users as $user)
                            <option value="{{$user->id}}" {{old('user_id') == $user->id ? 'selected' : ''}}>{{$user->name}}</option>
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
