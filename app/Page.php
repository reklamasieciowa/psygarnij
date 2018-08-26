<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	use Searchable;
	
    public function getRouteKeyName()
	{
	    return 'slug';
	}
	
	protected $fillable = [
		'title', 'slug', 'metatitle', 'metadescription', 'body', 'news',
	];
}
