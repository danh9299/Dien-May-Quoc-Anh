@extends('admin.master')

@section('content')


<div class="row">
    <h3 class="mt-2 px-5">Xóa đánh giá</h3>

    <div class="container mt-2 px-5  mb-2">
        <div class="card shadow">
            <div class="card-header">
                Xóa đánh giá..
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.settings.reviews.destroy',$review->id)}}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('delete')
                   
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Tên người đánh giá</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{$review->user->name}}"
                                class="shadow form-control" readonly />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form">Sản phẩm</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{$review->product->name}}"
                                class="shadow form-control" readonly />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form">Đánh giá</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{$review->comment}}"
                                class="shadow form-control" readonly />
                        </div>
                    </div>
                    <p>Bạn muốn xóa đánh giá này chứ?</p>
                    <button type="submit" class="btn btn-danger">Có</button>
                    <a href="{{ route('admin.settings.reviews.list-reviews') }}" class="btn btn-secondary">Không</a>
                </form>
            </div>
        </div>

    </div>
</div>






@endsection('content')