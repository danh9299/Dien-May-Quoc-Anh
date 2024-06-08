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
        return Product::with(['catalog', 'brand', 'type', 'feature'])->get()->map(function($product) {
            return [
                'id' => $product->id,
                'danh mục' => $product->catalog->catalog_name ?? '',
                'phân loại' => $product->type->name ?? '',
                'thiết kế' => $product->feature->name ?? '',
                'hãng' => $product->brand->name ?? '',
                'tên' => $product->name,
                'model' => $product->model,
                'giá' => $product->price,
                'giá cũ' => $product->old_price,
                'số lượng' => $product->quantity,
                'nội dung mô tả sản phẩm' => $product->content,
                'thông số kỹ thuật' => $product->specifications,
                'link ảnh đại diện' => $product->image_link,
                'mảng chứa link các ảnh phụ' => $product->image_list,
                'ngày tạo' => $product->created_at,
                'ngày cập nhật cuối' => $product->updated_at,
            ];
        });
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
