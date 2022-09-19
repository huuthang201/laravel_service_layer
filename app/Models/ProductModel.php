<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = "product";
    protected $fillable = [
        'name',
        'price'
    ];
    protected $hidden = [
        'create_at',
        'update_at'
    ];
}
