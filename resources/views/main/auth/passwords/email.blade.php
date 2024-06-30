@extends('main.master')

@section('content')
<div class="container">
    <h3 class="text-center mt-5">Quên mật khẩu</h3>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{ route('main.auth.password.email') }}">
        @csrf
        <div class="form-group mb-3 mt-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <button type="submit" class="mb-4 btn btn-primary">Gửi liên kết đặt lại mật khẩu</button>
    </form>
</div>
@endsection
