@extends('admin.master')

@section('content')


<div class="row">
    <h3 class="mt-2 px-5">Xóa danh mục</h3>

    <div class="container mt-2 px-5  mb-2">
        <div class="card shadow">
            <div class="card-header">
                Xóa danh mục {{$catalog->catalog_name}}..
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.catalogs.destroy',$catalog->id)}}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('delete')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Mã danh mục</label>
                        <div class="col-sm-10">
                            <input type="text" name="id" value="{{$catalog->id}}" class="shadow form-control" readonly />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Tên danh mục</label>
                        <div class="col-sm-10">
                            <input type="text" name="catalog_name" value="{{$catalog->catalog_name}}"
                                class="shadow form-control" readonly />
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form">Danh mục cha</label>
                        <div class="col-sm-10">

                            @if($catalog->parent_id !=0)
                            <input class="form-control shadow"  type="text" value="{{$catalog->parent->catalog_name}}" readonly>
                            @else
                            <input class="form-control shadow" value="Không có danh mục cha" readonly />
                            @endif
                        </div>
                    </div>
                    <p>Bạn muốn xóa danh mục này chứ?</p>
                    <button type="submit" class="btn btn-danger">Có</button>
                    <a href="{{ route('admin.catalogs.index') }}" class="btn btn-secondary">Không</a>
                </form>
            </div>
        </div>

    </div>
</div>






@endsection('content')