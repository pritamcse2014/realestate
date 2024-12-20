<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = $user->where('transactions.is_delete', '=', '0')->get();
        $data['getRecord'] = $user;
        return view('admin.transactions.list', $data);
    }

    public function adminTransactionsEdit($id) {
        $data['getRecord'] = Transactions::find($id);
        return view('admin.transactions.edit', $data);
    }

    public function adminTransactionsUpdate(Request $request, $id) {
        $save = Transactions::find($id);
        $save->order_number = trim($request->order_number);
        $save->transaction_id = trim($request->transaction_id);
        $save->amount = trim($request->amount);
        $save->	is_payment = trim($request->is_payment);
        $save->save();

        return redirect('admin/transactions')->with('success', 'Transaction Updated Successfully.');
    }

    public function adminTransactionsDelete($id) {
        $save = Transactions::find($id);
        $save->is_delete = 1;
        $save->save();

        return redirect()->back()->with('success', 'Transaction Soft Delete Successfully.');
    }

    public function agentAddTransactions() {
        return view('agent.transactions.add');
    }

    public function agentStoreTransactions(Request $request) {
        // dd($request->all());
        $save = new Transactions();
        $save->user_id = Auth::user()->id;
        $save->order_number = trim($request->order_number);
        $save->transaction_id = trim($request->transaction_id);
        $save->amount = trim($request->amount);
        $save->is_payment = trim($request->is_payment);
        $save->save();

        return redirect()->back()->with('success', 'Transaction Create Successfully.');
    }

    public function agentTransactionsList() {
        // echo "Transactions List";
        // die();
        $data['getRecord'] = Transactions::getDetails(Auth::user()->id);
        return view('agent.transactions.list', $data);
    }

    public function agentTransactionsDelete($id) {
        Transactions::find($id)->delete();
        return redirect()->back()->with('success', 'Transaction Deleted Successfully.');
    }
}
