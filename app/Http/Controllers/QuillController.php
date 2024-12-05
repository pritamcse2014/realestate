<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class QuillController extends Controller
{
    public function quillEditor():View {
        // echo "Quill Editor";
        // die();
        return view('quill');
    }
}
