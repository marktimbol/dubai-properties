<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserRoomsTest extends TestCase
{
    use DatabaseMigrations;

    public function test_a_user_can_view_all_his_or_her_posted_rooms()
    {
    	$user = factory(App\User::class)->create();
    	$room = factory(App\Room::class)->create();
    	$user->rooms()->save($room);

    	$this->actingAs($user);

    	$this->visit('user/rooms')
    		->see($room->name);
    }

    public function test_a_user_can_create_a_room_record()
    {
    	$user = factory(App\User::class)->create();
    	$this->actingAs($user);
    	
    	$this->visit('user/rooms/create');
    }

    public function test_a_user_can_store_a_room_record()
    {
        $user = factory(App\User::class)->create();
        $this->actingAs($user);

        $userInput = [
            'name'  => 'Room Name',
            'price' => 1,
            'aboutListing'  => '',
            'propertyType'  => 'Apartment',
            'roomType'  => 'Private Room',
            'accommodates'  => 1,
            'bathrooms' => 1,
            'bedType'   => 'Real Bed',
            'bedrooms'  => 1,
            'beds'  => 1,
            'checkIn'   => '12:00 PM',
            'checkOut'  => '11:00 AM',
            'extraPeopleFee'    => 1,
            'cleaningFee'   => 1,
            'minimumStay'   => 1,
            'description'   => '',
        ];

        $this->call('POST', 'user/rooms', $userInput);

        $this->seeInDatabase('rooms', [
            'user_id'   => $user->id,
            'name' => 'Room Name',
            'slug'  => 'room-name',
            'price' => 1,
            'aboutListing' => '',
            'propertyType'  => 'Apartment',
            'roomType'  => 'Private Room',
            'accommodates'  =>  1,
            'bathrooms' => 1,
            'bedType'   => 'Real Bed',
            'bedrooms'  => 1,
            'beds'  => 1,
            'checkIn'   => '12:00 PM',
            'checkOut'  => '11:00 AM',
            'extraPeopleFee'    => 1,
            'cleaningFee'   => 1,
            'description'   => '',
            'minimumStay'   => 1
        ]);

        $this->seeInDatabase('photos', [
            'imageable_id'  => 1,
            'imageable_type'    => 'App\Room'
        ]);
    }

    public function test_a_user_can_update_a_room_record()
    {
        $user = factory(App\User::class)->create();
        $this->actingAs($user);

        $roomData = factory(App\Room::class)->make();
        $room = $user->rooms()->save($roomData);

        $userInput = [
            'name'  => 'Updated Room Name',
            'price' => 1,
            'aboutListing'  => 'About this listing',
            'propertyType'  => 'Apartment',
            'roomType'  => 'Private Room',
            'accommodates'  => 1,
            'bathrooms' => 1,
            'bedType'   => 'Updated Real Bed',
            'bedrooms'  => 1,
            'beds'  => 1,
            'checkIn'   => '12:00 PM',
            'checkOut'  => '11:30 AM',
            'extraPeopleFee'    => 1,
            'cleaningFee'   => 1,
            'minimumStay'   => 1,
            'description'   => 'Room description',
        ];

        $this->call('PUT', '/user/rooms/'.$room->id, $userInput);

        $this->seeInDatabase('rooms', [
            'user_id'   => $user->id,
            'name' => 'Updated Room Name',
            'slug'  => 'updated-room-name',
            'price' => 1,
            'aboutListing' => 'About this listing',
            'propertyType'  => 'Apartment',
            'roomType'  => 'Private Room',
            'accommodates'  =>  1,
            'bathrooms' => 1,
            'bedType'   => 'Updated Real Bed',
            'bedrooms'  => 1,
            'beds'  => 1,
            'checkIn'   => '12:00 PM',
            'checkOut'  => '11:30 AM',
            'extraPeopleFee'    => 1,
            'cleaningFee'   => 1,
            'minimumStay'   => 1,
            'description'   => 'Room description'
        ]);
    }
}
