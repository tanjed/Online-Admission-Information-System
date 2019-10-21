<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;
    protected  $guarded = ['id'];
    protected $hidden = ['password'];
    public function adminUniversity(){
        return $this->hasMany(AdminUniversity::class);
    }
}
