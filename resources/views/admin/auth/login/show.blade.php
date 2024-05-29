<?php 
    use App\Models\Image;

$logo = Image::where('group', 1)->first();
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Đăng nhập</title>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />


    <!--Favicon thay logo trên tab-->

    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo/' . $logo->image_link) }}" />
</head>

<body>
    <div class="mt-5 text-center px-5">
        <img class="img-thumbnail " src="{{ asset('img/logo/' . $logo->image_link) }}">
    </div>
    <div class="container w-75 mt-5 px-5 mb-5">
        <div class="card">
            <div class="card-header">
                Đăng nhập Admin
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.auth.login.authenticate') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="adminusername" class="form-label">Tên đăng nhập</label>
                        <input type="text" name="username" class="form-control" id="adminusername" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="adminpassword" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                </form>
                @if ($errors->has('username'))
                    <span class="text-danger mt-2">{{ $errors->first('username') }}</span>
                @endif

            </div>
        </div>
    </div>
    <div class="text-center mt-2">
        <p3 class="text-dark">Trang này chỉ dành cho bản quản trị website!</p3>
        <p4 class="text-dark">Quý khách hàng vui lòng truy cập <a href="#">link này</a>!</p4>
    </div>
    <!--Bundle-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>