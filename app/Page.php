<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	use Searchable;

	public function toSearchableArray()
    {
        return [
             'id' => $this->id,
             'title' => $this->title,
             'slug' => $this->slug,
             'body' => $this->body,
        ];
    }
	
    public function getRouteKeyName()
	{
	    return 'slug';
	}
	
	protected $fillable = [
		'title', 'slug', 'metatitle', 'metadescription', 'body', 'news',
	];
}
