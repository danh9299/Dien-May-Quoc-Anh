<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Admin extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    protected $guard = 'admin'; // Đây là tên guard sẽ được sử dụng trong file config/auth.php

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
