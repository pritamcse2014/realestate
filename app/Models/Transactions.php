<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;
    
    protected $table = 'transactions';

    static public function getDetails($user_id) {
        return self::select('transactions.*', 'users.name')
                ->join('users', 'users.id', '=', 'transactions.user_id')
                ->where('transactions.user_id', '=', $user_id)
                ->orderBy('transactions.id', 'desc')
                ->paginate(10);
    }
}
