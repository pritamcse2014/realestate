<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportReply extends Model
{
    use HasFactory;
    
    protected $table = 'support_reply';

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
