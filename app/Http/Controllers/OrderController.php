<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function adminOrderList() {
        // echo "Order List";
        // die();
        return view('admin.order.list');
    }

    public function adminAddOrder() {
        // echo "Order Add";
        // die();
        $data['getProduct'] = Product::get();
        $data['getColor'] = Color::get();
        return view('admin.order.add', $data);
    }
}
