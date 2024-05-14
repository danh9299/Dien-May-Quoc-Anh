@extends('admin.master')

@section('content')


<div class="row">
    <h3 class="mt-2 px-5">Xóa thành viên</h3>

    <div class="container mt-2 px-5  mb-2">
        <div class="card shadow">
            <div class="card-header">
                Xóa thành viên {{$member->name}}..
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.members.destroy',$member->id)}}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('delete')
                    
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Tên thành viên</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{$member->name}}"
                                class="shadow form-control" readonly />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Email thành viên</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" value="{{$member->email}}"
                                class="shadow form-control" readonly />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Username thành viên</label>
                        <div class="col-sm-10">
                            <input type="text" name="username" value="{{$member->username}}"
                                class="shadow form-control" readonly />
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form">Quyền thành viên</label>
                        <div class="col-sm-10">

                            @if($member->role ==2)
                            <p>Quyền quản trị giới hạn</p>
                            @else
                            <p>Toàn quyền quản trị</p>
                            @endif
                        </div>
                    </div>
                    <p>Bạn muốn xóa thành viên này chứ?</p>
                    <button type="submit" class="btn btn-danger">Có</button>
                    <a href="{{ route('admin.members.index') }}" class="btn btn-secondary">Không</a>
                </form>
            </div>
        </div>

    </div>
</div>






@endsection('content')