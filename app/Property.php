<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
    	'name', 'price', 'slug', 'type', 'to', 'type', 'bedrooms', 'bathrooms', 
    	'area', 'description', 'furnish', 'emirate', 'city', 'sublocation'
    ];

    protected $with = ['user', 'photos'];

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = str_slug($name) . '-' . $this->id;
    }

    public function photos()
    {
    	return $this->morphMany(Photo::class, 'imageable');
    }
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    
    public function features()
    {
        return $this->belongsToMany(Feature::class, 'property_features');
    }

}
