<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductCartController extends Controller
{
    public function adminProductCartList() {
        // echo "Product Cart List";
        // die();
        return view('admin.productcart.list');
    }
}
