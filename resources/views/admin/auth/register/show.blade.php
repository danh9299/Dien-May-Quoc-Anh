@extends('admin.master')
@section('content')

@if (session('success'))
<div class="alert alert-success mt-5 px-5">
    {{ session('success') }}
</div>
@endif

<div class="container mt-5 w-75 mb-5">
    <div class="card">
        <div class="card-header">
            Tạo tài khoản Admin mới
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('admin.auth.register.register') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Tên đăng nhập</label>
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                        required>
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            <p class="text-danger">Tên đăng nhập đã tồn tại, vui lòng chọn tên khác!</p>
                        </strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        required>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            <p class="text-danger">Mật khẩu không khớp với mật khẩu xác nhận lại.</p>
                        </strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Xác nhận Password</label>
                    <input type="password" class="form-control" name="password_confirmation" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Tên Admin</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            <p class="text-danger">Vui lòng cung cấp tên Admin!</p>
                        </strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            <p class="text-danger">Email đã tồn tại, vui lòng chọn email khác!</p>
                        </strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Cấp quyền</label>
                    <select name="role" class="form-select @error('role') is-invalid @enderror">
                        <option value="2">Quyền quản trị giới hạn</option>
                        <option value="1">Toàn quyền quản trị</option>
                    </select>
                    @error('role')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            <p class="text-danger">Vui lòng chọn quyền!</p>
                        </strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Tạo Admin</button>
            </form>
        </div>
    </div>


</div>

@endsection