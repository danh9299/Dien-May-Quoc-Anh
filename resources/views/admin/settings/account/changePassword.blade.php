@extends('admin.master')

@section('content')
<div class="row">
    <h3 class="mt-2 px-5 text-center">Thay đổi mật khẩu</h3>
</div>
<div class="mt-2 mb-2 px-5 container">
    @if($message = Session::get('error'))
    <div class="mt-5 alert alert-danger">
        {{ $message }}
    </div>
    @elseif($message = Session::get('success'))
    <div class="mt-5 alert alert-success">
        {{ $message }}
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            Thay đổi mật khẩu
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('admin.settings.account.changePasswordComplete') }}">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">Mật khẩu hiện tại</label>
                    <div class="col-sm-10">
                        <input type="password" name="current_password" class="shadow form-control" required />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">Mật khẩu mới</label>
                    <div class="col-sm-10">
                        <input type="password" name="new_password" class="shadow form-control" required />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">Xác nhận mật khẩu mới</label>
                    <div class="col-sm-10">
                        <input type="password" name="new_password_confirmation" class="shadow form-control" required />
                    </div>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Thay đổi mật khẩu" />
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
