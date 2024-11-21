<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class City extends Model
{
    use HasFactory;
    
    protected $table = 'city';

    static public function getDetails() {
        $return = self::select('city.*', 'countries.country_name', 'state.state_name')
                ->join('countries', 'countries.id', '=', 'city.countries_id')
                ->join('state', 'state.id', '=', 'city.state_id')
                ->orderBy('city.id', 'desc');
                if (!empty(Request::get('id'))) {
                    $return = $return->where('city.id', '=', Request::get('id'));
                } if (!empty(Request::get('country_name'))) {
                    $return = $return->where('countries.country_name', 'like', '%' . Request::get('country_name') . '%');
                } if (!empty(Request::get('state_name'))) {
                    $return = $return->where('state.state_name', 'like', '%' . Request::get('state_name') . '%');
                } if (!empty(Request::get('city_name'))) {
                    $return = $return->where('city.city_name', 'like', '%' . Request::get('city_name') . '%');
                }
        $return = $return->paginate(10);
        return $return;
            
    }
}
