<?php 
    use App\Models\Image;
    $logo = Image::where('group',1)->first();
    ?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN - Điện Máy Quốc Anh</title>
    <!-- Thêm jQuery từ CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!--Admin Style CSS-->
    <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}" />

    <!--Favicon thay logo trên tab-->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo/'.$logo->image_link) }}" />
    <!--Tiny MCE-->
    <script src="https://cdn.tiny.cloud/1/6dn912idv9vs62u74uqn6ngifxnt4cs9u8meho1uga5aj5yt/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
    tinymce.init({
        selector: '#contenteditor', 
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | align lineheight | checklist numlist bullist  | emoticons charmap | removeformat',
        
    });
    </script>
</head>

<body>
    <div class="d-flex">
        <div class="bg-danger admin-sidebar">
            <div class="d-lg-none d-block">
                <button class="openbtn" id="openSidebar" onclick="openSidebar()">&#9776;</button>
            </div>
            <!--Sidebar-->
            @include('admin.layouts.sidebar')
        </div>
        <div class="admin-content">
            <!-- Main content -->
            @yield('content')
        </div>
    </div>



    <!--Mobile Sidebar-->
    <script src="{{asset('js/mobile-sidebar.js')}}"></script>
    <!--Bundle-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>