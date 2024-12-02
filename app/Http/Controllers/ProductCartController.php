<?php

namespace App\Http\Controllers;

use App\Models\ProductCart;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCartController extends Controller
{
    public function adminProductCartList(Request $request) {
        // echo "Product Cart List";
        // die();
        $getRecord = ProductCart::orderBy('id', 'desc');
        if (!empty($request->id)) {
            $getRecord = $getRecord->where('product_cart.id', '=', $request->id);
        } if (!empty($request->name)) {
            $getRecord = $getRecord->where('product_cart.name', 'like', '%' . $request->name . '%');
        } if (!empty($request->description)) {
            $getRecord = $getRecord->where('product_cart.description', 'like', '%' . $request->description . '%');
        } if (!empty($request->price)) {
            $getRecord = $getRecord->where('product_cart.price', 'like', '%' . $request->price . '%');
        } if (!empty($request->created_at)) {
            $getRecord = $getRecord->where('product_cart.created_at', 'like', '%' . $request->created_at . '%');
        } if (!empty($request->updated_at)) {
            $getRecord = $getRecord->where('product_cart.updated_at', 'like', '%' . $request->updated_at . '%');
        }
        $getRecord = $getRecord->paginate(10);
        $data['getRecord'] = $getRecord;
        return view('admin.productcart.list', $data);
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

    public function adminProductCartEdit($id) {
        $data['getRecord'] = ProductCart::find($id);
        return view('admin.productcart.edit', $data);
    }

    public function adminProductCartUpdate(Request $request, $id) {
        $save = ProductCart::find($id);
        $save->name = trim($request->name);
        $save->description = trim($request->description);
        $save->price = trim($request->price);
        if (!empty ($request->file('image'))) {
            $file = $request->file('image');
            $randomStr = Str::random(30);
            $filename = $randomStr .'.'.$file->getClientOriginalExtension();
            $file->move('product/', $filename);
            $save->image = $filename;
        }
        $save->save();

        return redirect('admin/productCart')->with('success', 'Product Cart Updated Successfully.');
    }

    public function adminProductCartDelete($id) {
        $save = ProductCart::find($id);
        $save->delete();

        return redirect('admin/productCart')->with('success', 'Product Cart Deleted Successfully.');
    }
}
