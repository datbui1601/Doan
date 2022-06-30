@extends('admin.layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thêm đặt bàn</h3>
        </div>
        <form action="{{route('staff.bookings.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <label class="col-3">Chọn chi nhánh : </label>
                    <span id="BookTable_branch" class="col-8">
                                @foreach($restaurant_branches as $key => $branch)
                            <div class="rb">
                                    <input id="BookTable_branch_$key"
                                           value="{{$branch->id}}" type="radio"
                                           {{$restaurant_branches->first()->id == $branch->id ? 'checked' : ''}}
                                           name="branch_id"/>
                                    <label
                                        for="BookTable_branch_$key">{{$branch->name.', '.$branch->address}}</label>
                                </div>
                        @endforeach
                            <div class="errorMessage" id="BookTable_branch_em_"
                                 style="display:none"></div>
                            </span>
                </div>
                @if (auth()->check())
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                @endif
                <div class="form-row mt-2">
                    <label for="BookTable_name" class="col-3">Họ và tên <span
                            class="text-red">*</span></label>
                    <!--                            <label>Họ và tên: </label>-->
                    <div class="col-8">
                        <input class="form-control" placeholder="Nhập họ và tên"
                               name="name" id="BookTable_name" type="text"
                               maxlength="255"
                               @if (auth()->check()) value="{{ auth()->user()->name }}" @endif />
                    </div>
                    @error('name')
                    <div class="errorMessage">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-row mt-2">
                    <label for="BookTable_phone" class="col-3">Số điện thoại
                        <span
                            class="text-red">*</span></label>
                    <!--                            <label>Số điện thoại: </label>-->
                    <div class="col-8">
                        <input class="form-control"
                               placeholder="Nhập số điện thoại"
                               name="phone" id="BookTable_phone" type="text"
                               maxlength="20"
                               @if (auth()->check()) value="{{ auth()->user()->phone }}" @endif/>
                    </div>
                    @error('phone')
                    <div class="errorMessage">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-row mt-2">
                    <label for="BookTable_email" class="col-3">Email</label>
                    <!--                            <label>Email: </label>-->
                    <div class="col-8">
                        <input class="form-control"
                               placeholder="Nhập địa chỉ email"
                               name="email" id="BookTable_email" type="text"
                               maxlength="255"
                               @if (auth()->check()) value="{{ auth()->user()->email }}" @endif/>
                        @error('email')
                        <div class="errorMessage">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row mt-2">
                    <label for="BookTable_quantity" class="col-3">Số người <span
                            class="text-red">*</span></label>
                    <!--                            <label>Số khách tham gia: </label>-->
                    <div class="col-8">
                        <input class="form-control" placeholder="Nhập số người"
                               name="quantity" id="BookTable_quantity"
                               type="text"/>
                        @error('quantity')
                        <div class="errorMessage">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row mt-2">
                    <label for="BookTable_book_date" class="col-3">Đặt ngày <span
                            class="text-red">*</span></label>
                    <!--                            <label>Ngày:</label>-->

                    <div class="col-8">
                        <input class="form-control"
                               placeholder="Nhập ngày" data-language="en"
                               name="date" id="BookTable_book_date"
                               type="date"/>
                        @error('date')
                        <div class="errorMessage">{{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <label
                            for="BookTable_book_time" class="col-3">Thời gian<span
                                class="text-red">*</span></label>
                        <!--                            <label>Giờ:</label>-->
                        <div class="col-8">
                            <input class="form-control"
                                   placeholder="Nhập thời gian"
                                   name="time" id="BookTable_book_time"
                                   type="time" maxlength="255"/>
                            @error('time')
                            <div class="errorMessage">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <label for="area_message" class="col-3">Chọn khu vực<span
                                class="text-red">*</span></label>
                        <!--                            <label>Ghi chú:</label>-->
                        <div class="col-8">
                            <select style="height: 45px"
                                    class="form-control" name="area"
                                    id="area_message">
                                <option value="">-----Chọn khu vực bàn-----</option>
                                <option value="0">Khu chung</option>
                                <option value="1">Khu phòng VIP</option>
                            </select>
                            @error('area')
                            <div class="errorMessage">{{$message}}</div>
                            @enderror

                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <label for="BookTable_message" class="col-3">Ghi chú</label>
                        <!--                            <label>Ghi chú:</label>-->
                        <div class="col-8">
                    <textarea class="form-control"
                              placeholder="Nhập ghi chú" name="note"
                              id="BookTable_message"></textarea>
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <label for="BookTable_deposit" class="col-3">Đặt cọc</label>
                        <div class="col-8">
                            <input class="form-control"
                                   placeholder="Nhập số tiền"
                                   name="deposit" id="BookTable_deposit"
                                   type="number" value="0"/>
                        </div>
                    </div>
                    <div class="form-row display-flex  mt-2">
                        <label class="col-12 text-left">Chọn
                            món</label>
                        <!--                            <label>Ghi chú:</label>-->
                        <div class="row ml-5">
                            @foreach($foods as $food)
                                <div class="row col-3 d-flex mt-2">
                                    <input type="checkbox"
                                           name="foods[{{$food->id}}][food]">
                                    <div class="col-4">
                                        <img style="border: 2px solid #cccccc" width="70"
                                             src="{{$food->avata ? '/storage/'.$food->avata : '/images/no-image.png'}}">
                                    </div>
                                    <div class="col-8 row">
                                        <p class="col-12 text-break">
                                            {{$food->name}}
                                        </p>
                                        <h6 class="col-12">
                                            {{number_format($food->price, 0, ',', ',')}} VNĐ
                                            <input type="hidden"
                                                   name="foods[{{$food->id}}][price]"
                                                   value="{{$food->price}}">
                                        </h6>
                                        <input
                                            class="ml-2 col-4 form-control form-control-sm"
                                            type="number"
                                            name="foods[{{$food->id}}][number]" min="1"
                                            oninvalid="this.setCustomValidity('Giá trị nhập vào phải lớn hơn hoặc bằng 1!')"
                                            oninput="this.setCustomValidity('')">
                                    </div>
                                </div>
                            @endforeach
                        </div>
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
