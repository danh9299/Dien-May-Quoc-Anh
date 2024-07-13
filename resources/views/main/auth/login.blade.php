@extends('main.master')
@section('content')


<div class="row">
    <div class="col-12 mt-3 text-center text-uppercase">
        <h2>Đăng Nhập</h2>
    </div>
</div>

<!--Thông báo-->
@if (session('error'))
<div class="container">
    <div class="alert alert-danger mt-5 px-5">
        {{ session('error') }}
    </div>
</div>
@endif
@if (session('success'))
<div class="container">
    <div class="alert alert-success mt-5 px-5">
        {{ session('success') }}
    </div>
</div>
@endif
<main class="container">
    <div class="col-lg-4 col-md-6 col-sm-8 mx-auto bg-white py-3 mb-4">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{ route('main.auth.authenticate') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-outline-dark">Đăng nhập</button>
                        <a href="{{route('main.auth.password.request')}}" class="btn btn-outline-warning"> Quên mật
                            khẩu?</a>
                    </div>
                </form>
                @if ($errors->has('username'))
                <span class="text-danger mt-2">{{ $errors->first('username') }}</span>
                @endif
            </div>
        </div>
    </div>


</main>

@endsection