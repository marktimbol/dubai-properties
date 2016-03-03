<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoomAmenitiesTest extends TestCase
{
	use DatabaseMigrations;

    public function test_get_the_difference_between_the_current_amenities_and_selected_amenities()
    {
    	$room = factory(App\Room::class)->create();
    	$amenities = factory(App\Amenity::class, 5)->make();

    	$room->amenities()->saveMany($amenities);

    	$currentRoomAmenities = $room->amenities->pluck('id');

    	$selectedAmenities = collect([1, 2, 3])->map(function($item) {
    		return $item;
    	});

    	$difference = $currentRoomAmenities->diff($selectedAmenities);

    	// dd($currentRoomAmenities, $selectedAmenities, $difference);

    	$this->assertCount(2, $difference->all());
    }
}
