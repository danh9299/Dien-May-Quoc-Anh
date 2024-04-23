@extends('admin.master')
@section('content')
<div class="container admin-product-add-import-export px-5 mt-3 mb-2">
    <a href="#" class="btn btn-primary">Thêm mới</a>
    <a href="#" class="btn btn-success">Nhập file</a>
    <a href="#" class="btn btn-secondary">Xuất file</a>
</div>
<div class="row">
    <h3 class="mt-2 px-5">Danh sách sản phẩm</h3>
    <div class="container mt-2 px-5  mb-2">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Lọc
                        </a>
                        <ul class="dropdown-menu">
                            <li><select class="form-select border-0" id="admin-filter-by-catalog"
                                    aria-label="Floating label select example">
                                    <option selected>Tất cả danh mục</option>
                                    <option value="1">Tivi</option>
                                    <option value="2">Tủ lạnh</option>
                                    <option value="3">Máy giặt</option>
                                </select></li>
                                <li><select class="form-select border-0" id="admin-filter-by-brand"
                                    aria-label="Floating label select example">
                                    <option selected>Tất cả hãng</option>
                                    <option value="1">LG</option>
                                    <option value="2">Sony</option>
                                    <option value="3">Samsung</option>
                                    <option value="4">Toshiba</option>
                                </select></li>
                                <li><select class="form-select border-0" id="admin-filter-by-status"
                                    aria-label="Floating label select example">
                                    <option selected>Tất cả trạng thái</option>
                                    <option value="1">Còn hàng</option>
                                    <option value="2">Hết hàng</option>
                                    
                                </select></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item bg-primary-subtle" href="#">Bắt đầu lọc</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text btn btn-secondary" id="addon-wrapping">Tìm kiếm</span>
                            <input type="text" class="form-control" placeholder="Nhập sản phẩm bạn tìm kiếm.."
                                aria-label="Username" aria-describedby="addon-wrapping">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <th scope="row"><img
                                    src="https://product.hstatic.net/200000632093/product/smart-tivi-qled-4k-55-inch-samsung-qa55q80c-1-180x120_-_copy_29bea3df638846b6a5cbb41802242082_large.jpg"
                                    class="admin-product-image" alt="..." /></th>
                            <td>Smart Tivi QLED 4K 98 inch Samsung QA98Q80C</td>
                            <td>97.500.000đ</td>
                            <td>Tivi</td>
                            <td><a href="#" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                    </svg></a>
                                <a href="#" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                        <path
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                    </svg></a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <th scope="row"><img
                                    src="https://product.hstatic.net/200000632093/product/10025649-tl-sharp-sj-fx630v-st-01_62073da735fc4ec6a0481d6ad1f95271_large.jpg"
                                    class="admin-product-image" alt="..." /></th>
                            <td>Tủ lạnh Sharp 4 cánh 626 Lít SJ-FX630V-ST</td>
                            <td>14.500.000đ</td>
                            <td>Tủ lạnh</td>
                            <td><a href="#" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                    </svg></a>
                                <a href="#" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                        <path
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                    </svg></a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <th scope="row"><img
                                    src="https://product.hstatic.net/200000632093/product/may-giat-midea-mfg70-1000-7-kg_ac7b2b4c9af548af90444dc6e1b38672_large.jpg"
                                    class="admin-product-image" alt="..." /></th>
                            <td>Máy giặt 7 Kg Midea MFG70-1000</td>
                            <td>4.800.000đ</td>
                            <td>Máy giặt</td>
                            <td><a href="#" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                    </svg></a>
                                <a href="#" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                        <path
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                    </svg></a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <th scope="row"><img
                                    src="https://product.hstatic.net/200000632093/product/may-lanh-electrolux-inverter-1-5hp-esv12cro-c1-sl_eccd0dc1f07d40bb959557a6576f87c9_large.jpg"
                                    class="admin-product-image" alt="..." /></th>
                            <td>Điều hòa Electrolux Inverter 1.5HP ESV12CRO-C1</td>
                            <td>7.800.000đ</td>
                            <td>Điều hòa</td>
                            <td><a href="#" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                    </svg></a>
                                <a href="#" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                        <path
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                    </svg></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection