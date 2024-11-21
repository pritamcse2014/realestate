<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Countries;
use App\Models\State;
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

    public function adminStateList() {
        // echo "State List";
        // die();
        $data['getState'] = State::select('state.*', 'countries.country_name')->join('countries', 'countries.id', '=', 'state.countries_id')->get();
        return view('admin.state.list', $data);
    }

    public function adminAddState() {
        // echo "State Add";
        // die();
        $data['getCountries'] = Countries::get();
        return view('admin.state.add', $data);
    }

    public function adminStoreState(Request $request) {
        // dd($request->all());
        $save = new State();
        $save->countries_id = $request->countries_id;
        $save->state_name = $request->state_name;
        $save->save();

        return redirect('admin/state')->with('success', 'State Create Successfully.');
    }

    public function adminStateEdit($id) {
        $data['getCountries'] = Countries::get();
        $data['getState'] = State::find($id);
        return view('admin.state.edit', $data);
    }

    public function adminStateUpdate(Request $request, $id) {
        $save = State::find($id);
        $save->countries_id = $request->countries_id;
        $save->state_name = $request->state_name;
        $save->save();

        return redirect('admin/state')->with('success', 'State Updated Successfully.');
    }

    public function adminStateDelete($id) {
        $save = State::find($id);
        $save->delete();

        return redirect('admin/state')->with('success', 'State Deleted Successfully.');
    }

    public function adminCityList() {
        // echo "City List";
        // die();
        $data['getRecord'] = City::getDetails();
        return view('admin.city.list', $data);
    }

    public function adminAddCity() {
        // echo "City Add";
        // die();
        $data['getCountries'] = Countries::get();
        return view('admin.city.add', $data);
    }

    public function getStateRecord($countryId) {
        $state = State::where('countries_id', $countryId)->get();
        return response()->json($state);
    }

    public function adminStoreCity(Request $request) {
        // dd($request->all());
        $save = new City();
        $save->countries_id = $request->countries_id;
        $save->state_id = $request->state_id;
        $save->city_name = trim($request->city_name);
        $save->save();

        return redirect('admin/city')->with('success', 'City Create Successfully.');
    }
}