<?php

namespace App\Http\Controllers\Api;

use App\Feature;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Property;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    /**
     * Take 3 records from Properties per City
     */
    public function by($emirate)
    {
        return Property::whereEmirate($emirate)->take(3)->get();
    }    
    
    public function forBuyOrRent($buyOrRent, $emirate = null)
    {
        $properties = Property::whereTo($buyOrRent)->paginate(10);

        if( $emirate )
        {
            $properties = Property::whereEmirate($emirate)
                ->whereTo($buyOrRent)
                ->paginate(15);
        }

        return $properties;
    }
}
