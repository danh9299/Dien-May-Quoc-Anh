@extends('admin.master')

@section('content')
<div class="row">
    <h3 class="mt-2 px-5">Quản lý Thông tin cá nhân</h3>
</div>
<div class="mt-2 mb-5 px-5 container">
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
            <!--image-->
            <form method="post" action="{{route('admin.settings.account.update')}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row col-5 mb-4 ">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-label-form">Username</label>
                        <div class="col-sm-9">
                            <input type="text" name="username" value="{{$account->username}}"
                                class="shadow form-control " required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-label-form">Tên</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" value="{{$account->name}}"
                                class="shadow form-control  @error('name') is-invalid @enderror" required />
                        </div>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>
                                <p class="text-danger">Vui lòng cung cấp tên!</p>
                            </strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-label-form">Email</label>
                        <div class="col-sm-9">
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


                <div class="text-center">

                    <input type="submit" class="btn btn-primary" value="Cập nhật" />
                    <a href="{{route('admin.settings.index')}}" class="btn btn-secondary">Trở lại</a>
                    <a href="{{route('admin.settings.account.changePassword')}}" class="btn btn-warning">Thay mật
                        khẩu</a>
                </div>

            </form>
        </div>
    </div>

</div>


@endsection('content')