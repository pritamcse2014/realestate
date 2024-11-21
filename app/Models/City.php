<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    
    protected $table = 'city';

    static public function getDetails() {
        return self::select('city.*', 'countries.country_name', 'state.state_name')
                ->join('countries', 'countries.id', '=', 'city.countries_id')
                ->join('state', 'state.id', '=', 'city.state_id')
                ->orderBy('city.id', 'desc')
                ->paginate(10);
    }
}
