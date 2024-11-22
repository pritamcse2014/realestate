<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Address extends Model
{
    use HasFactory;
    
    protected $table = 'address';

    static public function getDetails() {
        $return = self::select('address.*', 'countries.country_name', 'state.state_name', 'city.city_name')
                ->join('countries', 'countries.id', '=', 'address.countries_id')
                ->join('state', 'state.id', '=', 'address.state_id')
                ->join('city', 'city.id', '=', 'address.city_id');
                if (!empty(Request::get('id'))) {
                    $return = $return->where('address.id', '=', Request::get('id'));
                } if (!empty(Request::get('country_name'))) {
                    $return = $return->where('countries.country_name', 'like', '%' . Request::get('country_name') . '%');
                } if (!empty(Request::get('state_name'))) {
                    $return = $return->where('state.state_name', 'like', '%' . Request::get('state_name') . '%');
                } if (!empty(Request::get('city_name'))) {
                    $return = $return->where('city.city_name', 'like', '%' . Request::get('city_name') . '%');
                }
        $return = $return->orderBy('address.id', 'desc')->paginate(10);
        return $return;
    }
}
