<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model{
	public function users(){
        //estableciendo la relacion many-to-many entre los modelos User y Role
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
