<?php

namespace App\Http\Controllers;

class DiscountCodeController extends Controller
{
    public function adminDiscountCodeList() {
        // echo "Discount Code List";
        // die();
        return view('admin.discountcode.list');
    }

    public function adminAddDiscountCode() {
        // echo "Discount Code Add";
        // die();
        return view('admin.discountcode.add');
    }
}
