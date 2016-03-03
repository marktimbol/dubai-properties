<?php

namespace App\Http\Controllers\Auth;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Laravel\Socialite\Facades\Socialite;
use Torann\GeoIP\GeoIP;

class SocialiteController extends Controller
{
    protected $geo;
    
    public function __construct(GeoIP $geo)
    {
        $this->geo = $geo;
    }

    public function redirectToProvider($provider = null)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider = null)
    {
        $currentLocation = $this->geo->getLocation()['country'];
        $country = Country::where('name', $currentLocation)->first();

        $result = Socialite::driver($provider)->user();
        $user = User::where('email', $result->getEmail())->first();

        if( $user )
        {
            if( $user->country_id !== '' )
            {            
                $user->country_id = $country->id;
                $user->save();
            }

            Auth::login($user);
            Flash::success(sprintf('%s, %s', 'Hey ' . $user->name, ' welcome :)'));
            
            return redirect()->route('home');
        }

        $createUser = User::create([
            'country_id'    => $country->id,
            'name'          => $result->getName(),
            'email'         => $result->getEmail(),
            'password'      => bcrypt($result->getEmail())
        ]);

        Auth::login($createUser);
        Flash::success(sprintf('%s, %s', 'Hey ' . $createUser->name, ' welcome :)'));
        return redirect()->route('home');
    }
}
