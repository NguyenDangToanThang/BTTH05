<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'theloai';
    protected $primaryKey = 'ma_tloai';
    protected $fillable = [
        'ten_tloai',
        // 'SLBaiViet'
    ];
}
