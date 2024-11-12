<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class QRCodeController extends Controller
{
    public function adminQRCodeList() {
        // echo "QR";
        // die();
        $data['getRecord'] = Product::get();
        return view('admin.qrcode.list', $data);
    }

    public function adminAddQRCode() {
        // echo "QR";
        // die();
        return view('admin.qrcode.add');
    }

    public function adminStoreQRCode(Request $request) {
        // dd($request->all());
        $number = mt_rand(11111111111, 99999999999);
        // dd($number);
        $save = new Product;
        $save->title = trim($request->title);
        $save->price = trim($request->price);
        $save->product_code = $number;
        $save->description = trim($request->description);
        $save->save();

        return redirect('admin/qrcode')->with('success', 'QRCode Created Successfully.');
    }

    public function adminQRCodeEdit($id) {
        $data['getRecord'] = Product::find($id);
        return view('admin.qrcode.edit', $data);
    }

    public function adminQRCodeUpdate(Request $request, $id) {
        $number = mt_rand(11111111111, 99999999999);
        $save = Product::find($id);
        $save->title = trim($request->title);
        $save->price = trim($request->price);
        $save->product_code = $number;
        $save->description = trim($request->description);
        $save->save();

        return redirect('admin/qrcode')->with('success', 'QRCode Updated Successfully.');
    }

    public function adminQRCodeDelete($id) {
        $save = Product::find($id);
        $save->delete();

        return redirect('admin/qrcode')->with('success', 'QRCode Deleted Successfully.');
    }
}
