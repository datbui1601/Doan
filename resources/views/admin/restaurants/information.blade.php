@extends('admin.layouts.admin')
@section('content')
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin nhà hàng</h3>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{route('info.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                @foreach($info as $data)
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">{{$data->field}}:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="value[]" class="form-control" placeholder="Enter {{$data->field}}" value="{{$data->value}}">
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Lưu</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
@endsection
