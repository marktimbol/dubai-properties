<?php

namespace App;

use App\Room;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_id', 'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
    
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
    
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function book(Room $room)
    {
        return Booking::create([
            'user_id' => $this->id,
            'room_id'   => $room->id
        ]);
    }
}
