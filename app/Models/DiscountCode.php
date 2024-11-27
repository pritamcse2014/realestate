<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    use HasFactory;
    
    protected $table = 'discount_code';

    static public function getDetails() {
        $return = self::select('discount_code.*', 'users.name')
                ->join('users', 'users.id', '=', 'discount_code.user_id');
        $return = $return->orderBy('discount_code.id', 'desc')->paginate(10);
        return $return;
    }
}
