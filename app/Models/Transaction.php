<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    //Định nghĩa 1 Transaction có 1 order
    public function order()
    {
        return $this->hasOne(Order::class);
    }

    //Định nghĩa 1 Transaction thuộc về 1 user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}