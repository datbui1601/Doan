@extends('admin.layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thêm món ăn mới</h3>
        </div>
        <form action="{{route('foods-drinks.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-row mt-2">
                    <label class="col-2">Danh mục:</label>
                    <select type="date" class="form-control col-9 select2-blue" name="category">
                        <option value="appetizer" {{old('category') == 'appetizer' ? 'selected' : ''}}>Hải sản tươi sống</option>
                        <option value="main-course" {{old('category') == 'main-course' ? 'selected' : ''}}>Hải sản chế biến sẵn</option>
                        <option value="dessert" {{old('category') == 'dessert' ? 'selected' : ''}}>Thức uống</option>
                    </select>
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Tên món ăn:</label>
                    <input type="text" class="form-control col-9" value="{{old('name')}}" name="name"
                           placeholder="Điền tên món ăn">
                    <div class="col-2"></div>
                    @error('name')
                    <div class="col-9 text_error">
                        <p>{{$message}}</p>
                    </div>
                    @enderror
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Giá:</label>
                    <input type="text" class="form-control col-9 price" name="price" value="{{old('price')}}"
                           placeholder="Điền giá món ăn">
                    <div class="col-2"></div>
                    @error('price')
                    <div class="col-9 text_error">
                        <p>{{$message}}</p>
                    </div>
                    @enderror
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Giá sale:</label>
                    <input type="text" class="form-control col-9 price" name="sale_price" value="{{old('sale_price')}}"
                           placeholder="Điền giá sale">
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Có hiệu lực từ ngày:</label>
                    <input type="date" class="form-control col-9" name="valid_form" placeholder="Enter date from"
                           value="{{old('valid_from')}}">
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Đến ngày:</label>
                    <input type="date" class="form-control col-9" name="valid_to" placeholder="Enter date to"
                           value="{{old('valid_to')}}">
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Hình ảnh:</label>
                    <input type="file" class="col-9" id="file_upload"
                           name="avata">
                    <div class="col-2"></div>
                    <img width="150" height="auto" style="display: none" id="blah" src="#" alt="your image"/>
                    <div class="image_error col-12">
                    </div>
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Loại:</label>
                    <select type="date" class="form-control col-9 select2-blue" name="type">
                        <option value="0">Đồ ăn</option>
                        <option value="1">Thức uống</option>
                    </select>
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Chọn menu:</label>
                    <select type="date" class="form-control col-9 select2-blue" name="menu_id">
                        @foreach($menus as $menu)
                            <option
                                value="{{$menu->id}}" {{old('menu_id') == $menu->id ? 'selected' : ''}}>{{$menu->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Mô tả:</label>
                    <textarea name="description" id="editor1" class="col-9">
                        {{old('description')}}
                    </textarea>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.19.0/ckeditor.js"></script>
    <script>
        file_upload.onchange = evt => {
            const [file] = file_upload.files
            if (file) {
                blah.style.display = 'block'
                blah.src = URL.createObjectURL(file)
            }
        }
        CKEDITOR.replace('editor1');

    </script>
@endpush
