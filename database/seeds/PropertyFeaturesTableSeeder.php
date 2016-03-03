<?php

use App\Feature;
use Illuminate\Database\Seeder;

class PropertyFeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $features = [
        	'Kitchen',
        	'Internet',
        	'TV',
        	'Essentials',
        	'Shampoo',
        	'Heating',
        	'Air Conditioning',
        	'Washer',
        	'Dryer',
        	'Free Parking on Premises',
        	'Wireless Internet',
        	'Cable TV',
        	'Breakfast',
        	'Pets Allowed',
        	'Family/Kid Friendly',
        	'Suitable for Events',
        	'Smoking Allowed',
        	'Wheelchair Accessible',
        	'Elevator in Building',
        	'Indoor Fireplace',
        	'Buzzer/Wireless Intercom',
        	'Doorman',
        	'Pool',
        	'Hot Tub',
        	'Gym',
        	'24-Hour check-in',
        	'Hangers',
        	'Iron',
        	'Hair Dryer',
        	'Laptop Friendly Workspace'
        ];

        foreach( $features as $feature )
        {
        	$result = new Feature;
        	$result->name = $feature;
        	$result->save();
        }
    }
}
