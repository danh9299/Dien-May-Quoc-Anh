<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    // 1 order thuộc về 1 transaction
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
    // 1 order thuộc về 1 user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
