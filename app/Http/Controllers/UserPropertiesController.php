<?php

namespace App\Http\Controllers;

use App\Amenity;
use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\StoreUserPropertyRequest;
use App\Http\Requests\UpdateUserPropertyRequest;
use App\Photo;
use App\Room;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JavaScript;
use Laracasts\Flash\Flash;

class UserPropertiesController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function index()
    {
    	$user = $this->user;
    	$properties = $this->user->properties;
    
    	return view('public.user.properties.index', compact('user', 'properties'));
    }

    public function create()
    {
        $amenities = Amenity::all();
        $countries = Country::all();

    	return view('public.user.rooms.create', compact('amenities', 'countries'));
    }

    public function store(StoreUserRoomRequest $request)
    {        
        $newRoom = new Room([
            'name' => $request->name,
            'price' => $request->price,
            'aboutListing' => '',
            'propertyType' => $request->propertyType,
            'roomType' => $request->roomType,
            'accommodates' => $request->accommodates,
            'bathrooms' => $request->bathrooms,
            'bedType' => $request->bedType,
            'bedrooms' => $request->bedrooms,
            'beds' => $request->beds,
            'checkIn' => $request->checkIn,
            'checkOut'  => $request->checkOut,
            'extraPeopleFee' => $request->extraPeopleFee,
            'cleaningFee' => $request->cleaningFee,
            'description' => '',
            'minimumStay' => $request->minimumStay                
        ]);

        /**
         * Store new room data
         */
        $room = $this->user->rooms()->save($newRoom);

        $photo = new Photo([
            'path'  => 'http://lorempixel.com/1400/720'
        ]);
        
        $room->photos()->save($photo);

        return 'Hurray! Your room has been successfully added.';
    }

    public function show(Room $rooms)
    {        
        $room = $rooms;
        $user = $this->user;

        JavaScript::put([
            'signedIn' => Auth::check() ? true : false,
            'room' => $room
        ]);

        return view('public.user.rooms.show', compact('user', 'room'));
    }

    public function edit(Room $rooms)
    {
        $room = $rooms;
        $user = $this->user;
        $amenities = Amenity::all();

        JavaScript::put([
            'user'  => $user,
            'amenities' => $amenities,
            'room'  => $room
        ]);

        return view('public.user.rooms.edit', compact('user', 'room', 'amenities'));
    }

    public function update(UpdateUserRoomRequest $request, Room $room)
    {   
        if( $room->update($request->all()) )
        {
            return 'Yey! Your room has been successfully updated.';
        }

        return 'Ooops! Something is wrong. Please try again.';
    }
}









