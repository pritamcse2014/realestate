<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    
    protected $table = 'address';

    static public function getDetails() {
        $return = self::select('address.*', 'countries.country_name', 'state.state_name', 'city.city_name')
                ->join('countries', 'countries.id', '=', 'address.countries_id')
                ->join('state', 'state.id', '=', 'address.state_id')
                ->join('city', 'city.id', '=', 'address.city_id');
        $return = $return->orderBy('address.id', 'desc')->paginate(10);
        return $return;
    }
}
