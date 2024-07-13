@extends('admin.master')

@section('content')
<div class="row">

    <h3 class="mt-2 px-5">Quản lý thông tin công ty</h3>


</div>
<div class="mt-2 mb-2 px-5 container">
    @if($message = Session::get('success'))

    <div class="mt-5 alert alert-success">
        {{ $message }}
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            Cập nhật Thông tin công ty..
        </div>
        <div class="card-body">
            <!--image-->
            <form method="post" action="{{route('admin.settings.general.update')}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row col-5 mb-4 ">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-label-form">Địa chỉ</label>
                        <div class="col-sm-9">
                            <input type="text" name="address" value="{{$footer->address}}"
                                class="shadow form-control" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-label-form">Email</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" value="{{$footer->email}}" class="shadow form-control" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-label-form">Hotline 1</label>
                        <div class="col-sm-9">
                            <input type="text" name="hotline1" value="{{$footer->hotline1}}"
                                class="shadow form-control" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-label-form">Hotline 2</label>
                        <div class="col-sm-9">
                            <input type="text" name="hotline2" value="{{$footer->hotline2}}"
                                class="shadow form-control" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-label-form">Hotline 3</label>
                        <div class="col-sm-9">
                            <input type="text" name="hotline3" value="{{$footer->hotline3}}"
                                class="shadow form-control" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-label-form">Hotline 4</label>
                        <div class="col-sm-9">
                            <input type="text" name="hotline4" value="{{$footer->hotline4}}"
                                class="shadow form-control" />
                        </div>
                    </div>
                </div>


                <div class="text-center">

                    <input type="submit" class="btn btn-primary" value="Cập nhật" />
                    <a href="{{route('admin.settings.index')}}" class="btn btn-secondary">Trở lại</a>
                </div>

            </form>
        </div>
    </div>

    @endsection('content')