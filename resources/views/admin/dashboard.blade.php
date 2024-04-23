@extends('admin.master')
@section('content')
<div class="d-flex">
    <div class="bg-danger admin-sidebar">
        <div class="d-lg-none d-block">
            <button class="openbtn" id="openSidebar" onclick="openSidebar()">&#9776;</button>
        </div>
        <!--Sidebar-->
        @include('admin.layouts.sidebar')
    </div>
    <div>
        Hello
    </div>
</div>
@endsection