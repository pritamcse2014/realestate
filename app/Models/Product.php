<?php

namespace App\Models;

use App\Enums\ProductStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $table = 'product';

    protected $fillable = [
        'title',
        'price',
        'product_code',
        'description',
        'status',
    ];

    protected function casts(): array {
        return [
            'status' => ProductStatus::class,
        ];
    }
}
