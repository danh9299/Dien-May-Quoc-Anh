@extends('admin.master')

@section('content')


<div class="row">

    <h3 class="mt-2 px-5">Nhập dữ liệu nhiều sản phẩm</h3>


</div>
<div class="container">
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
</div>
<div class="mt-2 mb-2 px-5 container">
    <div class="card">
        <div class="card-header">
            Tải lên file và ấn Nhập để nhập dữ liệu sản phẩm..
        </div>
        <div class="card-body">
            <form action="{{ route('admin.products.import') }}" class="mt-2 mb-2" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-5">
                        <input type="file" class="form-control" name="file">
                    </div>
                    <div class="col-3">
                        <button class="btn btn-success" type="submit">Nhập</button>
                    </div>
                </div>
            </form>
            <p5 class="text-danger"><b>Lưu ý:</b> Các sản phẩm không có giá trị trong cột <u>id</u> sẽ được tạo mới.
                <br> Các sản phẩm có giá trị trong cột <u>id</u> sẽ được cập nhật nội dung!
                <br> Vui lòng nhập đúng định dạng cho giá trị các cột. Tránh các dấu kí tự hay khoảng trống không cần
                thiết!
            </p5>
        </div>
    </div>
</div>


@endsection