<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Catalog;
use App\Models\Brand;
use App\Models\Feature;
use App\Models\Type;
class ProductsImport implements ToModel, WithHeadingRow{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
   
    public function model(array $row)
    {
        $catalogId = $this->findCatalogIdByName($row['danh_muc']) ?? 0;
            $typeId= $this->findTypeIdByName($row['phan_loai']) ?? 0;
            $featureId =  $this->findFeatureIdByName($row['thiet_ke']) ?? 0;
             $brandId= $this->findBrandIdByName($row['hang']) ?? 0;
             $name = $row['ten'] ?? '';
             $model = $row['model']?? '';
             $price = $row['gia']?? 0;
             $old_price = $row['gia_cu']?? 0;
             $quantity = $row['so_luong']?? 0;
             $content = $row['noi_dung_mo_ta_san_pham']?? '<p>Đang cập nhật</p>';
             $specifications = $row['thong_so_ky_thuat']?? '<p>Đang cập nhật</p>';
             $image_link = $row['link_anh_dai_dien']?? 'img/not-found/notfound.png';
            $imageList = $row['mang_chua_link_cac_anh_phu'] ?? '[]';


        try {
            // Tìm sản phẩm theo ID
            $product = Product::findOrFail($row['id']);
            // Cập nhật thông tin của sản phẩm nếu đã tồn tại
           

            $product->update([
                'catalog_id' => $catalogId,
                'type_id' => $typeId,
                'feature_id' => $featureId,
                'brand_id' =>  $brandId,
                'name' => $name,
                'model' => $model,
                'price' => $price,
                'old_price' => $old_price,
                'quantity' => $quantity,
                'content' => $content,
                'specifications' => $specifications,
                'image_link' => $image_link,
                'image_list' => $imageList,
            ]);
            return $product;
        } catch (ModelNotFoundException $e) {
            // Nếu không tìm thấy sản phẩm, tạo sản phẩm mới
           
            return new Product([
                'id' => $row['id'],
                'catalog_id' => $catalogId,
                'type_id' => $typeId,
                'feature_id' => $featureId,
                'brand_id' =>  $brandId,
                'name' => $name,
                'model' => $model,
                'price' => $price,
                'old_price' => $old_price,
                'quantity' => $quantity,
                'content' => $content,
                'specifications' => $specifications,
                'image_link' => $image_link,
                'image_list' => $imageList,
            ]);
        }
    }
    public function findCatalogIdByName($name) {
        return Catalog::where('catalog_name', $name)->value('id');
    }
    public function findBrandIdByName($name) {
        return Brand::where('name', $name)->value('id');
    }
    public function findTypeIdByName($name) {
        return Type::where('name', $name)->value('id');
    }
    public function findFeatureIdByName($name) {
        return Feature::where('name', $name)->value('id');
    }
  
}
