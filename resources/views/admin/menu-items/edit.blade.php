@extends('admin.layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Chỉnh sửa món ăn</h3>
        </div>
        <form action="{{route('foods-drinks.update', $menu_item)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-row mt-2">
                    <label class="col-2">Danh mục:</label>
                    <select type="date" class="form-control col-9 select2-blue" name="category">
                        <option value="appetizer" {{$menu_item->category == 'appetizer' ? 'selected' : ''}}>Hải sản tuoi sống</option>
                        <option value="main-course" {{$menu_item->category == 'main-course' ? 'selected' : ''}}>Hải sản chế biến sẵn</option>
                        <option value="dessert" {{$menu_item->category == 'dessert' ? 'selected' : ''}}>Thức uống</option>
                    </select>
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Tên món ăn:</label>
                    <input type="text" class="form-control col-9" value="{{$menu_item->name}}" name="name" placeholder="Điền tên món ăn">
                    <label class="col-2"></label>
                    @error('name')
                    <div class="col-9 text_error">
                        <p>{{$message}}</p>
                    </div>
                    @enderror
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Giá:</label>
                    <input type="number" class="form-control col-9" value="{{number_format($menu_item->price, 0, '', '')}}" name="price" placeholder="Điền giá món ăn">
                    <label class="col-2"></label>
                    @error('price')
                    <div class="col-9 text_error">
                        <p>{{$message}}</p>
                    </div>
                    @enderror
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Giá sale:</label>
                    <input type="number" class="form-control col-9" name="sale_price" value="{{number_format($menu_item->sale_price, 0, '', '')}}" placeholder="Điền giá sale">
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Có hiệu lực từ ngày:</label>
                    <input type="date" class="form-control col-9" value="{{\Carbon\Carbon::parse($menu_item->valid_from)->format('Y-m-d')}}" name="valid_form" placeholder="Enter date from">
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Đến ngày:</label>
                    <input type="date" class="form-control col-9" name="valid_to" value="{{\Carbon\Carbon::parse($menu_item->valid_to)->format('Y-m-d')}}" placeholder="Enter date to">
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Hình ảnh:</label>
                    <input type="file" class="col-9" id="file_upload" value="{{$menu_item->avata}}"
                           name="avata">
                    <div class="col-2"></div>
                    <img width="150" height="auto" style="display: none" id="blah" src="#" alt="your image"/>
                    <div class="image_error col-12">
                    </div>
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Loại:</label>
                    <select type="date" class="form-control col-9 select2-blue" name="type">
                        <option value="0" {{$menu_item->type == 0 ? 'selected' : ''}}>Đồ ăn</option>
                        <option value="1" {{$menu_item->type == 1 ? 'selected' : ''}}>Thức uống</option>
                    </select>
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Chọn menu:</label>
                    <select type="date" class="form-control col-9 select2-blue" name="menu_id">
                        @foreach($menus as $menu)
                            <option value="{{$menu->id}}" {{$menu_item->menu_id == $menu->id ? 'selected' : ''}}>{{$menu->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Mô tả:</label>
                    <textarea name="description" id="editor1" class="col-9">
                        {{$menu_item->description}}
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
        @if($menu_item->avata)
        $(document).ready(function () {
            blah.style.display = 'block'
            blah.src = '/storage/{{$menu_item->avata}}'
        })
        @endif
    </script>
@endpush
