<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function adminColorList() {
        // echo "Color";
        // die();
        $data['getRecord'] = Color::get();
        return view('admin.color.list', $data);
    }

    public function adminAddColor() {
        // echo "Color Add";
        // die();
        return view('admin.color.add');
    }

    public function adminStoreColor(Request $request) {
        // dd($request->all());
        $save = new Color;
        $save->name = trim($request->name);
        $save->save();

        return redirect('admin/color')->with('success', 'Color Create Successfully.');
    }

    public function adminColorEdit($id) {
        $data['getRecord'] = Color::find($id);
        return view('admin.color.edit', $data);
    }
    
    public function adminColorUpdate(Request $request, $id) {
        $save = Color::find($id);
        $save->name = trim($request->name);
        $save->save();

        return redirect('admin/color')->with('success', 'Color Updated Successfully.');
    }

    public function adminColorDelete($id) {
        $save = Color::find($id);
        $save->delete();

        return redirect('admin/color')->with('success', 'Color Deleted Successfully.');
    }

    public function adminPdf() {
        $data = [
            'title' => 'Welcome to PDF',
            'date' => date('m-d-Y'),
        ];
        $pdf = PDF::loadView('pdf.pdf', $data);
        return $pdf->download('errorsolutioncode.pdf');
    }

    public function adminPdfColor() {
        $getRecord = Color::get();
        $data = [
            'title' => 'All Color Show',
            'date'  =>  date('d-m-Y'),
            'getRecord' => $getRecord
        ];
        $pdf = PDF::loadView('pdf.pdfColor', $data);
        return $pdf->download('color.pdf');
    }

    public function adminColorPdf($id) {
        $getRecord = Color::find($id);
        $data = [
            'title' => 'Color PDF Download',
            'date'  =>  date('d-m-Y'),
            'getRecord' => $getRecord
        ];
        $pdf = PDF::loadView('pdf.colorPdf', $data);
        return $pdf->download('color.pdf');
    }
}
