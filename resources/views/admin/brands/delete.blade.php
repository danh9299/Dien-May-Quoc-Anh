@extends('admin.master')

@section('content')


<div class="row">
    <h3 class="mt-2 px-5">Xóa hãng</h3>

    <div class="container mt-2 px-5  mb-2">
        <div class="card shadow">
            <div class="card-header">
                Xóa Hãng {{$brand->name}}..
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.brands.destroy',$brand->id)}}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('delete')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Mã Hãng</label>
                        <div class="col-sm-10">
                            <input type="text" name="id" value="{{$brand->id}}" class="shadow form-control" readonly />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Tên Hãng</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{$brand->name}}" class="shadow form-control"
                                readonly />
                        </div>
                    </div>


                    <p>Bạn muốn xóa Hãng này chứ?</p>
                    <button type="submit" class="btn btn-danger">Có</button>
                    <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">Không</a>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection('content')