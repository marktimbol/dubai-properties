<?php

use Torann\GeoIP\GeoIP;

Route::get('test', function(GeoIP $location)
{	
	$currentRoomAmenities = collect([1, 5]); //current room amenities
	$selectedAmenities = collect([1]);

	$difference = $currentRoomAmenities->diff($selectedAmenities);
	
	dd($currentRoomAmenities, $selectedAmenities, $difference);

	return $selectedAmenities->all();

});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
	Route::auth();
	Route::get('auth/{provider?}', 'Auth\SocialiteController@redirectToProvider');
	Route::get('auth/{provider?}/callback', 'Auth\SocialiteController@handleProviderCallback');

	Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);
	Route::get('/home', 'HomeController@index');

	Route::get('room/{rooms}', ['as' => 'room', 'uses' => 'RoomsController@show']);

	Route::get('properties/city/{emirate}', 'PropertiesController@by');
	Route::get('properties/{buyOrRent}/{emirate?}', 'PropertiesController@forBuyOrRent');
	Route::get('properties/{buyOrRent}/{emirate}/{property}', 'PropertiesController@show');

	/**
	 * properties/buy/
	 * properties/buy/dubai
	 * properties/buy/dubai/property-name
	 *
	 * properties/rent
	 * properties/rent/dubai
	 * properties/rent/dubai/property-name
	 */

	Route::get('countries', ['as' => 'countries', 'uses' => 'CountriesController@index']);
	Route::get('country/{country}/rooms', 'CountriesController@rooms');

});

Route::group(['middleware' => ['web', 'auth']], function () {
	Route::post('bookings/{room}', ['as' => 'bookings.store', 'uses' => 'BookingsController@store']);
	Route::resource('user/rooms', 'UserRoomsController');
});

Route::group(['middleware' => 'api', 'prefix' => 'api'], function() {
	Route::get('properties/city/{emirate}', 'Api\PropertiesController@by');
	Route::get('properties/{buyOrRent}/{emirate?}', 'Api\PropertiesController@forBuyOrRent');
	Route::get('total-stay-days/{checkOut}/{checkIn}', 'Api\BookingsController@getTotalStayDays');
	Route::put('room/{rooms}/amenities/{amenity}', 'Api\RoomAmenitiesController@update');
});