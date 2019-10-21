<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class University extends Authenticatable
{
    use Notifiable;
   protected $guarded = ['remember_token'];
    protected $hidden = ['password'];
     public function departments(){
         return $this->hasMany(Department::class);
     }
}
