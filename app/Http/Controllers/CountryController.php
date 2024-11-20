<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function adminCountriesList() {
        // echo "Country List";
        // die();
        $data['getRecord'] = Countries::get();
        return view('admin.countries.list', $data);
    }

    public function adminAddCountries() {
        // echo "Country Add";
        // die();
        return view('admin.countries.add');
    }

    public function adminStoreCountries(Request $request) {
        // dd($request->all());
        $save = new Countries();
        $save->country_name = trim($request->country_name);
        $save->save();

        return redirect('admin/countries')->with('success', 'Country Create Successfully.');
    }

    public function adminCountriesEdit($id) {
        $data['getRecord'] = Countries::find($id);
        return view('admin.countries.edit', $data);
    }

    public function adminCountriesUpdate(Request $request, $id) {
        $save = Countries::find($id);
        $save->country_name = trim($request->country_name);
        $save->save();

        return redirect('admin/countries')->with('success', 'Country Updated Successfully.');
    }

    public function adminCountriesDelete($id) {
        $save = Countries::find($id);
        $save->delete();

        return redirect('admin/countries')->with('success', 'Country Deleted Successfully.');
    }
}
