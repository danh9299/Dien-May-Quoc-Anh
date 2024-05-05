@extends('admin.master')

@section('content')


<div class="row">
    <h3 class="mt-2 px-5">Xóa Thiết kế</h3>

    <div class="container mt-2 px-5  mb-2">
        <div class="card shadow">
            <div class="card-header">
                Xóa Thiết kế {{$feature->name}}..
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.features.destroy',$feature->id)}}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('delete')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Mã Thiết kế</label>
                        <div class="col-sm-10">
                            <input type="text" name="id" value="{{$feature->id}}" class="shadow form-control" readonly />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Tên Thiết kế</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{$feature->name}}"
                                class="shadow form-control" readonly />
                        </div>
                    </div>

                   
                    <p>Bạn muốn xóa Thiết kế này chứ?</p>
                    <button type="submit" class="btn btn-danger">Có</button>
                    <a href="{{ route('admin.features.index') }}" class="btn btn-secondary">Không</a>
                </form>
            </div>
        </div>

    </div>
</div>






@endsection('content')