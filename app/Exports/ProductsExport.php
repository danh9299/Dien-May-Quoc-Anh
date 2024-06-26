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
                'danh_muc' => $product->catalog->catalog_name ?? '',
                'phan_loai' => $product->type->name ?? '',
                'thiet_ke' => $product->feature->name ?? '',
                'hang' => $product->brand->name ?? '',
                'ten' => $product->name,
                'model' => $product->model,
                'gia' => $product->price,
                'gia_cu' => $product->old_price,
                'gia_nhap_kho' => $product->import_price,
                'so_luong' => $product->quantity,
                'noi_dung_mo_ta_san_pham' => $product->content,
                'thong_so_ky_thuat' => $product->specifications,
                'link_anh_dai_dien' => $product->image_link,
                'mang_chua_link_cac_anh_phu' => $product->image_list,
                'ngay_tao' => $product->created_at,
                'ngay_cap_nhat_cuoi' => $product->updated_at,
            ];
        });
    }
    public function headings(): array
    {
        // Trả về một mảng chứa tên các cột
        return [
            'id',
            'danh_muc',
            'phan_loai',
            'thiet_ke',
            'hang',
            'ten',
            'model',
            'gia',
            'gia_cu',
            'gia_nhap_kho',
            'so_luong',
            'noi_dung_mo_ta_san_pham',
            'thong_so_ky_thuat',
            'link_anh_dai_dien',
            'mang_chua_link_cac_anh_phu',
            'ngay_tao',
            'ngay_cap_nhat_cuoi',
           
        ];
    }
}
