<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Schedule extends Model
{
    use HasFactory;
    
    protected $table = 'schedule';

    static public function getDetails($weekId) {
        return self::where('week_id', '=', $weekId)->where('user_id', '=', Auth::user()->id)->first();
    }
}
