@extends('admin.master')

@section('content')


<div class="row">
    <h3 class="mt-2 px-5">Sửa thành viên</h3>

    <div class="container mt-2 px-5  mb-2">
        <div class="card shadow">
            <div class="card-header">
                Sửa thành viên {{$member->name}}..
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.members.update',$member->id)}}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Tên thành viên</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{$member->name}}"
                                class="shadow @error('name') is-invalid @enderror form-control" />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>

                                    <p class="text-danger">Tên thành viên không được để trống!</p>
                                </strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Username thành viên</label>
                        <div class="col-sm-10">
                            <input type="text" name="username" value="{{$member->username}}"
                                class="shadow @error('username') is-invalid @enderror form-control" />
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>

                                    <p class="text-danger">Username không được để trống!</p>
                                </strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Email thành viên</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" value="{{$member->email}}"
                                class="shadow @error('email') is-invalid @enderror form-control" required/>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>
                                    <p class="text-danger">Email bạn vừa nhập đã tồn tại! Vui lòng chọn email khác hoặc giữ nguyên email hiện có</p>
                                </strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Quyền thành viên</label>
                        <div class="col-sm-10">
                            <select name="role" class="form-select @error('role') is-invalid @enderror">
                                <option value="2" @if($member->role == 2) selected @endif >Quyền quản trị giới hạn</option>
                                <option value="1" @if($member->role == 1) selected @endif >Toàn quyền quản trị</option>
                            </select>
                        </div>
                    </div>


                    <div class="text-center">
                        <input type="hidden" name="hidden_id" value="{{ $member->id }}" />
                        <input type="submit" class="btn btn-primary" value="Cập nhật" />
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>






@endsection('content')