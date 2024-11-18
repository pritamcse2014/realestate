<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    
    protected $table = 'blog';

    static public function getDetails() {
        $return = self::select('blog.*')
                ->orderBy('id', 'desc')
                ->paginate(10);
        return $return;
    }
}
