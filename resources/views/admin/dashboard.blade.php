@extends('admin.master')
@section('content')


    <div class="text-danger mt-5 px-5">
        Chào mừng {{ auth()->guard('admin')->user()->name }} đến với trang Dashboard!
    </div>



@endsection