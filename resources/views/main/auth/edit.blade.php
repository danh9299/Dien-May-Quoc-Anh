@extends('main.master')

@section('content')
<div class="row">

    <h3 class="mt-2 px-5 text-center">Quản lý Thông tin cá nhân</h3>


</div>
<div class="mt-2 mb-2 px-5 container">
    @if($message = Session::get('success'))

    <div class="mt-5 alert alert-success">
        {{ $message }}
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            Cập nhật Thông tin cá nhân..
        </div>
        <div class="card-body">
            <form method="post" action="{{route('main.auth.update')}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-4 ">
                    <div class="col">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">Tên</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" value="{{$account->name}}" class="shadow form-control  "
                                    required />
                            </div>

                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" value="{{$account->email}}"
                                    class="shadow form-control @error('email') is-invalid @enderror" required />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        <p class="text-danger">Email đã tồn tại, vui lòng chọn email khác!</p>
                                    </strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="col">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">Số điện thoại</label>
                            <div class="col-sm-10">
                                <input type="text" name="phone_number" value="{{$account->phone_number}}" maxlength="13"
                                    required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13);"
                                    class="shadow form-control  " required />
                            </div>

                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">Địa chỉ</label>
                            <div class="col-sm-10">
                                <textarea type="text" name="address" value="{{$account->address}}"
                                    class="shadow form-control">{{$account->address}}</textarea>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="text-center">

                    <input type="submit" class="btn btn-primary" value="Cập nhật" />
                    <a href="{{route('main.home')}}" class="btn btn-secondary">Trở lại</a>
                    <a href="{{route('main.auth.changePassword')}}" class="btn btn-warning">Thay mật khẩu</a>
                </div>

            </form>
           
        </div>
    </div>
</div>

@endsection('content')