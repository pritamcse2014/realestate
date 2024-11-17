<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Orders extends Model
{
    use HasFactory;
    
    protected $table = 'orders';

    static public function getDetails() {
        $return = self::select('orders.*', 'product.title');
        $return = $return->join('product', 'product.id', '=', 'orders.product_id');

        if (!empty(Request::get('id'))) {
            $return = $return->where('orders.id', '=', Request::get('id'));
        } if (!empty(Request::get('title'))) {
            $return = $return->where('product.title', 'like', '%'.Request::get('title').'%');
        } if (!empty(Request::get('created_at'))) {
            $return = $return->where('orders.created_at', 'like', '%'.Request::get('created_at').'%');
        } if (!empty(Request::get('updated_at'))) {
            $return = $return->where('orders.updated_at', 'like', '%'.Request::get('updated_at').'%');
        }

        $return = $return->orderBy('orders.id', 'desc')->get();
        return $return;
    }

    public function getColor() {
        return $this->hasMany(OrdersDetails::class, 'orders_id')
                    ->select('orders_details.*', 'color.name')
                    ->join('color', 'color.id', '=', 'orders_details.color_id');
    }
}
