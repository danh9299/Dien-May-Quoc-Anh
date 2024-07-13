@extends('main.master')
@section('content')

<div class="row">
    <div class="col-12 mt-3 text-center text-uppercase">
        <h2>Đăng Ký</h2>
    </div>
</div>



<main class="container">
    <div class="col-lg-4 col-md-6 col-sm-8 mx-auto bg-white py-3 mb-4">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{ route('main.auth.addnew') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên</label>
                        <input type="text" name="name" class=" form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Số điện thoại</label>
                        <input type="text" name="phone_number" id="phone_number" class="form-control" maxlength="13"
                            required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13);">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ nhận hàng</label>
                        <textarea type="text" name="address" id="address" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="@error('email') is-invalid @enderror form-control"
                            required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>
                                <p class="text-danger">Vui lòng chọn email hợp lệ!</p>
                            </strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" name="password"
                            class="@error('password') is-invalid @enderror form-control" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>
                                <p class="text-danger">Mật khẩu không khớp với mật khẩu xác nhận lại.</p>
                            </strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" id="agree" class="form-check-input" required>
                            <label for="agree" class="form-check-label ml-2">Tôi đồng ý với điều khoản bảo mật của công
                                ty</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-dark">Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>

@endsection