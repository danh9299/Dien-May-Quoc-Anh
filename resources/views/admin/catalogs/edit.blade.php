@extends('admin.master')

@section('content')


<div class="row">
    <h3 class="mt-2 px-5">Sửa danh mục</h3>
    <div class="container mt-2 px-5  mb-2">
        <div class="card shadow">
            <div class="card-header">
                Sửa danh mục {{$catalog->catalog_name}}..
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.catalogs.update',$catalog->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                                class="shadow @error('catalog_name') is-invalid @enderror form-control" />
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
                            <select name="parent_id" class="shadow form-select">
                                @if(!empty($catalogs) && count($catalogs)>0)
                                @foreach($catalogs as $item)
                                <option value="{{$item->id}}" {{ $catalog->parent_id == $item->id ? 'selected' : '' }}    >{{$item->catalog_name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="text-center">
                        <input type="hidden" name="hidden_id" value="{{ $catalog->id }}" />
                        <input type="submit" class="btn btn-primary" value="Cập nhật" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection('content')