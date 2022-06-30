@extends('admin.layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thêm mới người dùng</h3>
        </div>
        <form action="{{route('users.store')}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-row mt-2">
                    <label class="col-2">Họ và tên:</label>
                    <input type="text" class="form-control col-9" name="name" value="{{old('name')}}" placeholder="Điền họ và tên">
                    <div class="col-2"></div>
                    @error('name')
                    <div class="col-9 text_error">
                        <p>{{$message}}</p>
                    </div>
                    @enderror
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Email:</label>
                    <input type="email" class="form-control col-9" name="email" value="{{old('email')}}" placeholder="Điền email">
                    <div class="col-2"></div>
                    @error('email')
                    <div class="col-9 text_error">
                        <p>{{$message}}</p>
                    </div>
                    @enderror
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Mật khẩu:</label>
                    <input type="password" class="form-control col-9" name="password" placeholder="Điền mật khẩu">
                    <div class="col-2"></div>
                    @error('password')
                    <div class="col-9 text_error">
                        <p>{{$message}}</p>
                    </div>
                    @enderror
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Xác nhận mật khẩu:</label>
                    <input type="password" class="form-control col-9" name="password_confirmation" placeholder="Điền lại mật khẩu">
                    <div class="col-2"></div>
                    @error('password_confirmation')
                    <div class="col-9 text_error">
                        <p>{{$message}}</p>
                    </div>
                    @enderror
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Quyền hạn:</label>
                    <select class="form-control col-9" name="role_id">
                        <option value="1" {{old('role_id') == 1 ? 'checked' : ''}}>Admin</option>
                        <option value="3" {{old('role_id') == 3 ? 'checked' : ''}}>Nhân viên</option>
                    </select>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </div>
            </div>
        </form>
    </div>
@endsection
