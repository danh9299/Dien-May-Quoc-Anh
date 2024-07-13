@extends('admin.master')

@section('content')


<div class="row">
    <h3 class="mt-2 px-5">Xóa phân loại</h3>

    <div class="container mt-2 px-5  mb-2">
        <div class="card shadow">
            <div class="card-header">
                Xóa phân loại {{$type->name}}..
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.types.destroy',$type->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('delete')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Mã phân loại</label>
                        <div class="col-sm-10">
                            <input type="text" name="id" value="{{$type->id}}" class="shadow form-control" readonly />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Tên phân loại</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{$type->name}}" class="shadow form-control"
                                readonly />
                        </div>
                    </div>


                    <p>Bạn muốn xóa phân loại này chứ?</p>
                    <button type="submit" class="btn btn-danger">Có</button>
                    <a href="{{ route('admin.types.index') }}" class="btn btn-secondary">Không</a>
                </form>
            </div>
        </div>

    </div>
</div>






@endsection('content')