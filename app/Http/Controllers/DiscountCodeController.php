<?php

namespace App\Http\Controllers;

use App\Models\DiscountCode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscountCodeController extends Controller
{
    public function adminDiscountCodeList() {
        // echo "Discount Code List";
        // die();
        $data['getRecord'] = DiscountCode::getDetails();
        return view('admin.discountcode.list', $data);
    }

    public function adminAddDiscountCode() {
        // echo "Discount Code Add";
        // die();
        return view('admin.discountcode.add');
    }

    public function adminStoreDiscountCode(Request $request) {
        // dd($request->all());
        $save = new DiscountCode();
        $save->user_id = Auth::user()->id;
        $save->discount_code = trim($request->discount_code);
        $save->discount_price = trim($request->discount_price);
        $save->expiry_date = trim($request->expiry_date);
        $save->type = trim($request->type);
        $save->usages = trim($request->usages);
        $save->save();
        return redirect('admin/discountCode')->with('success', 'Discount Code Create Successfully.');
    }

    public function adminDiscountCodeEdit($id) {
        $data['getUser'] = User::get();
        $data['getRecord'] = DiscountCode::find($id);
        return view('admin.discountcode.edit', $data);
    }

    public function adminDiscountCodeUpdate(Request $request, $id) {
        $save = DiscountCode::find($id);
        $save->user_id = trim($request->user_id);
        $save->discount_code = trim($request->discount_code);
        $save->discount_price = trim($request->discount_price);
        $save->expiry_date = trim($request->expiry_date);
        $save->type = trim($request->type);
        $save->usages = trim($request->usages);
        $save->save();
        return redirect('admin/discountCode')->with('success', 'Discount Code Updated Successfully.');
    }
}
