<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use Searchable;
    
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

