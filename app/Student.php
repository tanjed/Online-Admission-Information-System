<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use Notifiable;
    protected $hidden = ['password'];
    protected $guarded = ['id'];
    public function posts(){
       return $this->hasMany(Post::class);
    }
}
