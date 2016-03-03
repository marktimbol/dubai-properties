<?php

use App\Country;
use Illuminate\Database\Seeder;

class PropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $emirates = collect([
            'abu-dhabi', 'ajman', 'al-ain', 'dubai', 'fujairah', 
            'ras-al-khaimah', 'sharjah', 'umm-al-quwain'
        ]);
        
        $buyOrRent = collect(['buy', 'rent']);
        $types = collect(['Apartment', 'Commercial', 'Hotel Apartments', 'Villas']);
        $furnishing = collect(['Furnished', 'Unfurnished', 'Partially Furnished']);

       $emirates->each(function($emirate, $key) use($buyOrRent, $types, $furnishing)
       {
            $properties = factory(App\Property::class, 5)->create([
                'to'    => $buyOrRent->random(),
                'type'  => $types->random(),
                'furnish'   => $furnishing->random(),
                'emirate'   => $emirate
            ]);

            foreach( $properties as $property )
            {       
                $photos = factory(App\Photo::class, 7)->make([
                    'imageable_id'  => $property->id,
                    'imageable_type'    => 'App\Property'
                ]);
                
                $property->photos()->saveMany($photos);
            }
        });
    }
}
