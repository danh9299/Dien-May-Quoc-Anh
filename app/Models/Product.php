<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
       
        'catalog_id',
        'type_id',
        'feature_id',
        'brand_id',
        'name',
        'model',
        'price',
        'old_price',
        'quantity',
        'content',
        'specifications',
        'image_link',
        'image_list',
    ];
    //1 product thuộc về 1 danh mục
    public function catalog()
    {
        return $this->belongsTo(Catalog::class, 'catalog_id');
    }
    //1 product thuộc về 1 thương hiệu
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    //1 product thuộc về 1 tính năng
    public function feature()
    {
        return $this->belongsTo(Feature::class, 'feature_id');
    }
    //1 product thuộc về 1 phân loại
    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
}
