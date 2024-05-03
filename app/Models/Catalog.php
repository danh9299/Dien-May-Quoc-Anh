<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;
    // 1 catalog có nhiều product
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function parent()
{
    return $this->belongsTo(Catalog::class, 'parent_id');
}
public function children()
    {
        return $this->hasMany(Catalog::class, 'parent_id');
    }
}
