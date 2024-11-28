<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;
    
    protected $table = 'support';

    static public function getDetails() {
        $return = self::select('support.*')
                ->orderBy('id', 'desc')
                ->paginate(10);
        return $return;
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
