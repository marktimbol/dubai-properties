<?php

namespace App\Providers;

use App\Country;
use App\Property;
use App\Room;
use App\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        $this->bind('user', function($user) {
            return User::findOrFail($user);
        });
        
        $this->bind('rooms', function($rooms) {
            return Room::with('user.country', 'photos', 'amenities')->findOrFail($rooms);
        });

        $this->bind('property', function($property) {
            return Property::whereSlug($property)->first();
        });

        $this->bind('country', function($country) {
            return Country::with('rooms.user', 'rooms.photos', 'rooms.amenities', 'photos')->whereSlug($country)->first();
        });

        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
