<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use Searchable;

    public function toSearchableArray()
    {
        return [
             'id' => $this->id,
             'name' => $this->name,
             'sex' => $this->sex,
             'age' => $this->age,
             'location' => $this->location,
             'description' => $this->description,
             'added' => $this->added,
        ];
    }
    
    protected $fillable = [
    	'name', 'type_id', 'age', 'homeless','avatar'
    ];

   public function Animaltype()
   {
   		return $this->belongsTo(Animaltype::class);
   }

   public function User()
   {
   		return $this->belongsTo(User::class);
   }
}

