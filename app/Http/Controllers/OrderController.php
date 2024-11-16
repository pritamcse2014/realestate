<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Orders;
use App\Models\OrdersDetails;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function adminOrderList() {
        // echo "Order List";
        // die();
        $data['getRecord'] = Orders::getDetails();
        return view('admin.order.list', $data);
    }

    public function adminAddOrder() {
        // echo "Order Add";
        // die();
        $data['getProduct'] = Product::get();
        $data['getColor'] = Color::get();
        return view('admin.order.add', $data);
    }

    public function adminStoreOrder(Request $request) {
        // dd($request->all());
        $save = new Orders;
        $save->product_id = trim($request->product_id);
        $save->product_quantity = trim($request->product_quantity);
        $save->save();

        if (!empty($request->color_id)) {
            foreach($request->color_id as $color_id) {
                $order = new OrdersDetails();
                $order->orders_id = $save->id;
                $order->color_id = $color_id;
                $order->save();
            }
        }
        return redirect('admin/order')->with('success', 'Order Created Successfully.');
    }

    public function adminOrderEdit($id) {
        // dd($id);
        $data['getRecord'] = Orders::find($id);
        $data['getProduct'] = Product::get();
        $data['getColor'] = Color::get();
        $data['getOrdersDetails'] = OrdersDetails::where('orders_id', '=', $id)->get();
        // dd($data);
        return view('admin.order.edit', $data);
    }
}
