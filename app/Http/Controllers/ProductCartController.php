<?php

namespace App\Http\Controllers;

use App\Models\ProductCart;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCartController extends Controller
{
    public function adminProductCartList() {
        // echo "Product Cart List";
        // die();
        return view('admin.productcart.list');
    }

    public function adminAddProductCart() {
        // echo "Product Cart Add";
        // die();
        return view('admin.productcart.add');
    }

    public function adminStoreProductCart(Request $request) {
        // dd($request->all());
        $save = new ProductCart();
        $save->name = trim($request->name);
        $save->description = trim($request->description);
        $save->price = trim($request->price);

        if (!empty($request->file('image'))) {
            $file = $request->file('image');
            $randomStr = Str::random(30);
            $fileName = $randomStr .'.'. $file->getClientOriginalExtension();
            $file->move('product/', $fileName);
            $save->image = $fileName;
        }

        $save->save();

        return redirect('admin/productCart')->with('success', 'Product Cart Create Successfully.');
    }
}
