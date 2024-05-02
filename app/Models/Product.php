<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    //1 product thuộc về 1 danh mục
    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }
}
