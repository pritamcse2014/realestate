<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class DiscountCode extends Model
{
    use HasFactory;
    
    protected $table = 'discount_code';

    static public function getDetails() {
        $return = self::select('discount_code.*', 'users.name')
                ->join('users', 'users.id', '=', 'discount_code.user_id');
                if (!empty(Request::get('id'))) {
                    $return = $return->where('discount_code.id', '=', Request::get('id'));
                } if (!empty(Request::get('name'))) {
                    $return = $return->where('users.name', 'like', '%' . Request::get('name') . '%');
                } if (!empty(Request::get('discount_code'))) {
                    $return = $return->where('discount_code.discount_code', 'like', '%' . Request::get('discount_code') . '%');
                } if (!empty(Request::get('discount_price'))) {
                    $return = $return->where('discount_code.discount_price', 'like', '%' . Request::get('discount_price') . '%');
                }
        $return = $return->where('discount_code.is_delete', '=', 0)->orderBy('discount_code.id', 'desc')->paginate(10);
        return $return;
    }
}
