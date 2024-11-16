<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    
    protected $table = 'orders';

    static public function getDetails() {
        $return = self::select('orders.*', 'product.title');
        $return = $return->join('product', 'product.id', '=', 'orders.product_id');
        $return = $return->orderBy('orders.id', 'desc')->get();
        return $return;
    }

    public function getColor() {
        return $this->hasMany(OrdersDetails::class, 'orders_id')
                    ->select('orders_details.*', 'color.name')
                    ->join('color', 'color.id', '=', 'orders_details.color_id');
    }
}
