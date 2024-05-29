@extends('admin.master')

@section('content')
<div class="row">

    <h3 class="mt-2 px-5">Quản lý Mạng xã hội</h3>


</div>
<div class="mt-2 mb-2 px-5 container">
    @if($message = Session::get('success'))

    <div class="mt-5 alert alert-success">
        {{ $message }}
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            Cập nhật Mạng xã hội..
        </div>
        <div class="card-body">
            <!--image-->
            <form method="post" action="{{route('admin.settings.network.update')}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row col-5 mb-4 ">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-label-form">Facebook</label>
                        <div class="col-sm-9">
                            <input type="text" name="link_facebook" value="{{$footer->link_facebook}}" class="shadow form-control"  />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-label-form">Instagram</label>
                        <div class="col-sm-9">
                            <input type="text" name="link_instagram" value="{{$footer->link_instagram}}" class="shadow form-control"  />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-label-form">Tiktok</label>
                        <div class="col-sm-9">
                            <input type="text" name="link_tiktok" value="{{$footer->link_tiktok}}" class="shadow form-control"  />
                        </div>
                    </div>
                    
                </div>


                <div class="text-center">

                    <input type="submit" class="btn btn-primary" value="Cập nhật" />
                    <a href="{{route('admin.settings.index')}}" class="btn btn-secondary">Trở lại</a>
                </div>

            </form>
        </div>
    </div>
    
    @endsection('content')