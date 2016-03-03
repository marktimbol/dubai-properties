<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PropertyTest extends TestCase
{
	use DatabaseMigrations;

    public function test_it_shows_all_the_properties_for_rent()
    {
        $propertyForRent = factory(App\Property::class)->create([
            'to'    => 'rent'
        ]);

        $propertyForSale = factory(App\Property::class)->create([
            'to'    => 'buy'
        ]);
            
    	$this->visit('properties/rent')
    		->see($propertyForRent->name)
            ->dontSee($propertyForSale->name);
    }

    public function test_it_shows_all_the_properties_for_sale()
    {
        $propertyForRent = factory(App\Property::class)->create([
            'to'    => 'rent'
        ]);

        $propertyForSale = factory(App\Property::class)->create([
            'to'    => 'buy'
        ]);
            
        $this->visit('properties/buy')
            ->see($propertyForSale->name)
            ->dontSee($propertyForRent->name);
    }

    public function test_it_shows_all_the_properties_for_rent_per_emirate()
    {
        $forRentInDubai = factory(App\Property::class)->create([
            'to'    => 'rent',
            'emirate'   => 'dubai'
        ]);

        $forRentInSharjah = factory(App\Property::class)->create([
            'to'    => 'rent',
            'emirate'   => 'sharjah'
        ]);

        $this->visit('properties/rent/dubai')
            ->see($forRentInDubai->name)
            ->dontSee($forRentInSharjah->name);
    }

    public function test_it_shows_all_the_properties_for_sale_per_emirate()
    {
        $forSaleInDubai = factory(App\Property::class)->create([
            'to'    => 'buy',
            'emirate'   => 'dubai'
        ]);

        $forSaleInSharjah = factory(App\Property::class)->create([
            'to'    => 'buy',
            'emirate'   => 'sharjah'
        ]);

        $this->visit('properties/buy/dubai')
            ->see($forSaleInDubai->name)
            ->dontSee($forSaleInSharjah->name);
    }

    public function test_show_individual_property()
    {
        $property = factory(App\Property::class)->create();

        $this->visit('properties/'.$property->to.'/'.$property->emirate.'/'.$property->slug)
            ->see($property->name);
    }
}
