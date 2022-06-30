@extends('admin.layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thêm mới tin tức</h3>
        </div>
        <form action="{{route('news.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-row mt-2">
                    <label class="col-2">Tiêu đề:</label>
                    <input type="text" class="form-control col-9" value="{{old('title')}}" name="title"
                           placeholder="Điền tiêu đề">
                    <div class="col-2"></div>
                    @error('title')
                    <div class="col-9 text_error">
                        <p>{{$message}}</p>
                    </div>
                    @enderror
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Hình ảnh:</label>
                    <input type="file" class="col-9" id="file_upload"
                           name="image">
                    <div class="col-2"></div>
                    <img width="150" height="auto" style="display: none" id="blah" src="#" alt="your image"/>
                    @error('image')
                    <div class="col-9 text_error">
                        <p>{{$message}}</p>
                    </div>
                    @enderror
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Loại tin tức:</label>
                    <select class="form-control col-9 select2-blue" name="news_category_id">
                        @foreach($news_categories as $category)
                            <option value="{{$category->id}}" {{old('news_category_id') == $category->id ? 'selected' : ''}}>
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-row mt-2">
                    <label class="col-2">Nội dung:</label>
                    <textarea name="content" id="editor1" class="col-9">
                        {{old('content')}}
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
