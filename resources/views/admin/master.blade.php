<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN - Điện Máy Quốc Anh</title>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!--Admin Style CSS-->
    <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}" />

    <!--Favicon thay logo trên tab-->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo/QA.png') }}" />
</head>

<body>
    

        <div class="admin-content">
            <!-- Main content -->
            @yield('content')
        </div>

    <!--Mobile Sidebar-->
    <script src="{{asset('js/mobile-sidebar.js')}}"></script>
    <!--Bundle-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>