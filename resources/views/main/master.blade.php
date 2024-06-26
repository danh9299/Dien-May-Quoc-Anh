<?php 
    use App\Models\Image;

$logo = Image::where('group', 1)->first();
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Điện Máy Quốc Anh</title>
    <!--JQuery-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!--Style-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <!--Favicon thay logo trên tab-->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo/' . $logo->image_link) }}" />
</head>

<body>
    <!--Header-->
    @include('main.layouts.header')


    <!-- Main content -->
    @yield('content')
    <!--Footer-->
    @include('main.layouts.footer')

    <!--Script cho category follow khi scroll-->
    <script src="{{ asset('js/category-to-sticky.js') }}"></script>

    <!--Bundle-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    </script>

</body>

</html>