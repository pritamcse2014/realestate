<?php

namespace App\Http\Controllers;

use App\Models\Support;
use App\Models\SupportReply;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SupportController extends Controller
{
    public function adminSupportList(Request $request) {
        // echo "Support List";
        // die();
        $getSupport = Support::getDetails($request);
        $data['getRecord'] = $getSupport;
        $data['getUser'] = User::get();
        return view('admin.support.list', $data);
    }

    public function adminSupportReply($id) {
        $getSupport = Support::where('id', '=', $id);
        $getSupport = $getSupport->first();
        $data['getUser'] = $getSupport;
        return view('admin.support.reply', $data);
    }

    public function adminChangeSupportStatus(Request $request) {
        $getSupport = Support::find($request->id);
        $getSupport->status = $request->status;
        $getSupport->save();

        $json['success'] = true;
        echo json_encode($json);
    }

    public function adminSupportReplyStatusUpdate(Request $request, $id) {
        // dd($request->all());
        $getSupportReply = new SupportReply;
        $getSupportReply->user_id = Auth::user()->id;
        $getSupportReply->support_id = $request->id;
        $getSupportReply->description = $request->description;
        $getSupportReply->save();

        return redirect('admin/support/reply/' .$id)->with('success', 'Support Reply Status Updated Successfully.');
    }

    public function adminSupportStatusUpdate($id) {
        $adminSupportStatus = DB::table('support')->select('status')->where('id', '=', $id)->first();

        if ($adminSupportStatus->status == "1") {
            $status = "0";
        } else {
            $status = "1";
        }
        $value = array('status' => $status);
        DB::table('support')->where('id', $id)->update($value);

        return redirect()->back()->with('success', 'Support Status Updated Successfully.');
    }
}
