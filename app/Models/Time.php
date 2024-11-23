<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Time extends Model
{
    use HasFactory;
    
    protected $table = 'time';

    static public function getDetails() {
        $return = self::select('time.*');
                if (!empty(Request::get('id'))) {
                    $return = $return->where('time.id', '=', Request::get('id'));
                } if (!empty(Request::get('name'))) {
                    $return = $return->where('time.name', 'like', '%' . Request::get('name') . '%');
                }
        $return = $return->get();
        return $return;
    }
}
