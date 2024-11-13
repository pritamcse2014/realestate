<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMTP extends Model
{
    use HasFactory;
    
    protected $table = 'smtp';

    static public function getDetails() {
        return self::find(1);
    }
}
