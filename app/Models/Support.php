<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Support extends Model
{
    use HasFactory;
    
    protected $table = 'support';

    static public function getDetails() {
        $return = self::select('support.*')
                ->orderBy('id', 'desc')
                ->join('users', 'users.id', '=', 'support.user_id');
                if (!empty(Request::get('id'))) {
                    $return = $return->where('support.id', '=', Request::get('id'));
                } if (!empty(Request::get('user_id'))) {
                    $return = $return->where('support.user_id', 'like', '%' . Request::get('user_id') . '%');
                } if (!empty(Request::get('title'))) {
                    $return = $return->where('support.title', 'like', '%' . Request::get('title') . '%');
                } if (!empty(Request::get('status'))) {
                    $status = Request::get('status');
                    if (Request::get('status') == '1000') {
                        $status = 0;
                    }
                    $return = $return->where('support.status', '=', $status);
                }
        $return = $return->paginate(10);
        return $return;
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
