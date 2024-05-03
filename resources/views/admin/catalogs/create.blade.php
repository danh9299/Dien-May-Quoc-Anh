@extends('admin.master')

@section('content')


<div class="row">
    <h3 class="mt-2 px-5">Thêm danh mục</h3>

    <div class="container mt-2 px-5  mb-2">
        <div class="card">
            <div class="card-header">
                Nhập thông tin danh mục mới..
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.catalogs.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Tên danh mục</label>
                        <div class="col-sm-10">
                            <input type="text" name="catalog_name"
                                class="@error('catalog_name') is-invalid @enderror form-control" />
                            @error('catalog_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>

                                    <p class="text-danger">Tên danh mục không được để trống!</p>
                                </strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form">Chọn danh mục cha</label>
                        <div class="col-sm-10">
                            <select name="parent_id" class="form-select">
                                @if(!empty($catalogs) && count($catalogs)>0)
                                @foreach($catalogs as $catalog)
                                <option value="{{$catalog->id}}">{{$catalog->catalog_name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="text-center">
                        <input type="submit" class="btn btn-primary" value="Thêm" />
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>






@endsection('content')