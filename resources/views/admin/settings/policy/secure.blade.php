@extends('admin.master')

@section('content')
<div class="row">

    <h3 class="mt-2 px-5">Quản lý chính sách bảo mật</h3>


</div>
<div class="mt-2 mb-2 px-5 container">
    @if($message = Session::get('success'))

    <div class="mt-5 alert alert-success">
        {{ $message }}
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            Cập nhật Chính sách bảo mật..
        </div>
        <div class="card-body">
            <!--image-->
            <form method="post" action="{{route('admin.settings.policy.updateSecure')}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                 <!--content-->
                 <div class="row mb-4 ">
                        <h6 class="text-dark  mb-2">Nội dung chính sách bảo mật</h6>
                        <textarea name="content" 
                            id="contenteditor"> {{$policy->content}} </textarea>
                    </div>


                <div class="text-center">

                    <input type="submit" class="btn btn-primary" value="Cập nhật" />
                    <a href="{{route('admin.settings.index')}}" class="btn btn-secondary">Trở lại</a>
                </div>

            </form>
        </div>
    </div>
    
    @endsection('content')