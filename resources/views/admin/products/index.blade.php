@extends('admin.master')

@section('content')
<div class="container admin-product-add-import-export px-5 mt-3 mb-2">

    <a href="#" class="btn btn-success">Nhập file</a>
    <a href="#" class="btn btn-secondary">Xuất file</a>
</div>
<div class="row">
    <h3 class="mt-2 px-5">Danh sách sản phẩm</h3>
    <!--Alert message-->
    @if($message = Session::get('success'))
    <div class="container px-3">
        <div class="mt-5 alert alert-success">
            {{ $message }}
        </div>
    </div>
    @endif
    <div class="container mt-2 px-5  mb-2">
        <div class="card">
            <div class="card-header">
                <div class="row">
                <div class="col">
                        <a href="{{route('admin.products.create')}}" class="btn btn-primary">Thêm mới</a>
                    </div>
                    <div class="col">
                        <form method="GET" action="{{ route('admin.products.search') }}">
                            <div class="input-group flex-nowrap">
                                <button type="submit" class="btn btn-dark">Tìm kiếm</button>
                                <input type="text" class="form-control" name="search"
                                    placeholder="Nhập tên sản phẩm bạn muốn tìm.." aria-label="Tìm kiếm"
                                    aria-describedby="addon-wrapping">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body ">
            <table class="table">
                @if(!empty($products) && count($products)>0)
                <thead>
                    <tr>

                        <th scope="col">Ảnh</th>
                        <th class="text-wrap" style="width: 15rem;" scope="col">Tên</th>
                        <th scope="col">Model</th>
                        <th scope="col">Hãng</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Hành động</th>
                        <th scope="col">Sửa nhanh</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>

                        <th scope="row"><img src="{{ asset('/img/product_images/' . $product->image_link) }}"
                                class="admin-product-image" alt="{{$product->model}}" /></th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->model}}</td>
                        <td>{{$product->brand->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->catalog->catalog_name}}</td>
                        <td><a href="{{ route('admin.products.edit',$product->id) }}" class="btn btn-warning"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                    class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg></a>
                            <a href="{{ route('admin.products.delete',$product->id) }}" class="btn btn-danger"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                    class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                    <path
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                </svg></a>
                        </td>
                        <td>
                            <!-- Button trigger modal -->
                            <button class="btn btn-success btn-quick-edit" data-id="{{ $product->id }}"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                    class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path
                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                </svg></button>
                        </td>


                    </tr>
                    @endforeach
                </tbody>
                @else
                <tr>
                    <td colspan="5" class="text-center">Hiện chưa có sản phẩm nào được tạo!</td>
                </tr>
                @endif
            </table>
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    {{-- Nút Trang trước --}}
                    @if ($products->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">&laquo; Trước</span>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Trang trước">&laquo;
                            Trước</a>
                    </li>
                    @endif

                    {{-- Hiển thị trang hiện tại và các trang gần đó --}}
                    @for ($i = max(1, $products->currentPage() - 3); $i <= min($products->lastPage(),
                        $products->currentPage() + 3); $i++)
                        <li class="page-item {{ $i == $products->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                        </li>
                        @endfor

                        {{-- Nút Trang kế tiếp --}}
                        @if ($products->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Trang tiếp">Sau
                                &raquo;</a>
                        </li>
                        @else
                        <li class="page-item disabled">
                            <span class="page-link">Sau &raquo;</span>
                        </li>
                        @endif
                </ul>
            </nav>

        </div>
    </div>

</div>
</div>


<!-- Modal Quick Edit -->
<div class="modal fade" id="quickEditModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Chỉnh sửa nhanh model sản phẩm</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="quickEditForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="quickEditProductId">
                    <div class="form-group mb-2">
                        <label for="quickEditProductName">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="quickEditProductName" name="name" required>
                       
                    </div>
                    <div class="form-group mb-2">
                        <label for="quickEditProductPrice">Giá</label>
                        <input type="number" class="form-control" id="quickEditProductPrice" name="price" required>
                       
                    </div>
                    <div class="form-group mb-2">
                        <label for="quickEditProductModel">Model</label>
                        <input type="text" class="form-control" id="quickEditProductModel" name="model" required>
                      
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                </form>
            </div>

        </div>
    </div>
</div>



<script src="{{asset('js/quick-edit-product.js')}}">

</script>



@endsection