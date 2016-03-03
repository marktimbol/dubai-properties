<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PagesTest extends TestCase
{
    public function test_view_homepage()
    {
    	$this->visit('/')
    		->see('Dubai Properties');
    }
}
