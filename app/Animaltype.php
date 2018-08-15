<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animaltype extends Model
{
    protected $fillable = [
    	'name'
    ];

    public function Animal()
    {
    	return $this->hasMany(Animal::class);
    }
}

