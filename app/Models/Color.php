<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Color extends Model
{
    use HasFactory;
    
    protected $table = 'color';

    static public function getDetails() {
        $return = self::select('color.*')
                ->orderBy('id', 'desc');
                if (!empty(Request::get('id'))) {
                    $return = $return->where('color.id', '=', Request::get('id'));
                } if (!empty(Request::get('name'))) {
                    $return = $return->where('color.name', 'like', '%' . Request::get('name') . '%');
                } if (!empty(Request::get('created_at'))) {
                    $return = $return->where('color.created_at', 'like', '%' . Request::get('created_at') . '%');
                }
        $return = $return->get();
        return $return;
    }
}
