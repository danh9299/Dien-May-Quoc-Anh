<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ProductsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::all();
    }
    public function headings(): array
    {
        // Trả về một mảng chứa tên các cột
        return [
            'id',
            'danh mục',
            'phân loại',
            'thiết kế',
            'hãng',
            'tên',
            'model',
            'giá',
            'giá cũ',
            'số lượng',
            'nội dung mô tả sản phẩm',
            'thông số kỹ thuật',
            'link ảnh đại diện',
            'mảng chứa link các ảnh phụ',
            'ngày tạo',
            'ngày cập nhật cuối',
           
        ];
    }
}
