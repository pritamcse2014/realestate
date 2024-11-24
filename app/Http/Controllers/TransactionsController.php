<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function adminTransactionsList() {
        // echo "Transactions List";
        // die();
        $data['getRecord'] = Transactions::select('transactions.*', 'users.name')->join('users', 'users.id', '=', 'transactions.user_id')->get();
        return view('admin.transactions.list', $data);
    }
}
