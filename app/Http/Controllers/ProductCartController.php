<?php

namespace App\Http\Controllers;

use App\Enums\ProductStatus;
use App\Models\Product;
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

    public function productCartIndex() {
        // echo "Product Cart List";
        // die();
        $products = ProductCart::all();
        return view('productcart.index', compact('products'));
    }

    public function productCartAll() {
        return view('productcart.cart');
    }

    public function addToCart($id) {
        $product = ProductCart::findOrFail($id);
        $productCartAll = session()->get('productCartAll', []);
        if (isset($productCartAll[$id])) {
            $productCartAll[$id]['quantity'] ++;
        } else {
            $productCartAll[$id]=[
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image,
            ];
        }
        session()->put('productCartAll', $productCartAll);
        return redirect()->back()->with('success', 'Product Add To Cart Successfully.');
    }

    public function updateCart(Request $request) {
        if ($request->id & $request->quantity) {
            $productCartAll = session()->get('productCartAll');
            $productCartAll[$request->id]['quantity'] = $request->quantity;
            session()->put('productCartAll', $productCartAll);
            session()->flash('success', 'Add To Cart Updated Successfully.');
        }
    }

    public function removeFromCart(Request $request) {
        if ($request->id) {
            $productCartAll = session()->get('productCartAll');

            if (isset($productCartAll[$request->id])) {
                unset($productCartAll[$request->id]);
                session()->put('productCartAll', $productCartAll);
            }
            session()->flash('success', 'Add To Cart Deleted Successfully.');
        }
    }

    public function dumpableList() {
        $product = ProductCart::latest()->get();
        $product->dd();
    }

    public function productTest() {
        $input = [
            'title' => 'Gold Silver',
            'price' => 10,
            'product_code' => 123456,
            'description' => 'Product Description',
            'status' => ProductStatus::Active,
        ];
        $product = Product::create($input);
        dd($product->status, $product->status->value);
    }
}
