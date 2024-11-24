<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function adminTransactionsList(Request $request) {
        // echo "Transactions List";
        // die();
        $user = Transactions::select('transactions.*', 'users.name')->join('users', 'users.id', '=', 'transactions.user_id');
        if (!empty($request->id)) {
            $user = $user->where('transactions.id', '=', $request->id);
        } if (!empty($request->user_id)) {
            $user = $user->where('users.name', 'like', '%' . $request->user_id . '%');
        } if (!empty($request->order_number)) {
            $user = $user->where('transactions.order_number', 'like', '%' . $request->order_number . '%');
        } if (!empty($request->transaction_id)) {
            $user = $user->where('transactions.transaction_id', 'like', '%' . $request->transaction_id . '%');
        } if (!empty($request->amount)) {
            $user = $user->where('transactions.amount', 'like', '%' . $request->amount . '%');
        } if (!empty($request->is_payment)) {
            $user = $user->where('transactions.is_payment', '=', $request->is_payment);
        } if (!empty($request->created_at)) {
            $user = $user->where('transactions.created_at', 'like', '%' . $request->created_at . '%');
        } if (!empty($request->updated_at)) {
            $user = $user->where('transactions.updated_at', 'like', '%' . $request->updated_at . '%');
        }
        $user = $user->get();
        $data['getRecord'] = $user;
        return view('admin.transactions.list', $data);
    }
}
