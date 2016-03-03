<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoomAmenitiesController extends Controller
{
    public function update(Request $request, $room, $amenity)
    {
    	$collection = $room->amenities;

    	if( $collection->contains($amenity) )
    	{
    		return $room->amenities()->detach($amenity);
    	}

    	return $room->amenities()->attach($amenity);
    }
}
