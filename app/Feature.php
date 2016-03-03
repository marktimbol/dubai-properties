<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = ['name'];

    public function property()
    {
    	return $this->belongsToMany(Property::class, 'property_features');
    }
}
