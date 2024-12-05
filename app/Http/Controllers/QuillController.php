<?php

namespace App\Http\Controllers;

use App\Models\Quill;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuillController extends Controller
{
    public function quillEditor():View {
        // echo "Quill Editor";
        // die();
        return view('quill');
    }

    public function quillEditorStore(Request $request) {
        // dd($request->all());
        $save = new Quill;
        $save->title = trim($request->title);
        $save->quill_rich = trim($request->quill_rich);
        $save->save();

        return redirect('quillEditor')->with('success', 'Quill Created Successfully.');
    }
}
