@extends('admin.master')

@section('content')


<div class="row">
    <h3 class="mt-2 px-5">Sửa hãng</h3>

    <div class="container mt-2 px-5  mb-2">
        <div class="card shadow">
            <div class="card-header">
                Sửa hãng {{$brand->name}}..
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.brands.update',$brand->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Mã hãng</label>
                        <div class="col-sm-10">
                            <input type="text" name="id" value="{{$brand->id}}" class="shadow form-control" readonly />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Tên hãng</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{$brand->name}}"
                                class="shadow @error('name') is-invalid @enderror form-control" />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>

                                    <p class="text-danger">Tên hãng không được để trống!</p>
                                </strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                   

                    <div class="text-center">
                        <input type="hidden" name="hidden_id" value="{{ $brand->id }}" />
                        <input type="submit" class="btn btn-primary" value="Cập nhật" />
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>






@endsection('content')