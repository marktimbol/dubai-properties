<?php

namespace App\Http\Controllers;

use App\Feature;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Property;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    public function show($buyOrRent, $emirate, $property)
    {
        $features = Feature::all();
        return view('public.properties.show', compact('property', 'features'));
    }

    public function by($emirate)
    {
        $properties = Property::whereEmirate($emirate)->get();

        \JavaScript::put([
            'properties'    => $properties
        ]);

        return view('public.properties.per-emirate', compact('properties'));
    }

    public function forBuyOrRent($buyOrRent, $emirate = null)
    {
        $properties = Property::whereTo($buyOrRent)->paginate(10);

        if( $emirate )
        {
            $properties = Property::whereEmirate($emirate)
                ->whereTo($buyOrRent)
                ->get();
        }

        \JavaScript::put([
            'properties'    => $properties,
            'buyOrRent' => $buyOrRent
        ]);

        return view('public.properties.for-buy-or-rent', compact('properties'));
    }
}
