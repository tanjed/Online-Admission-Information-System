<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminUniversity extends Model
{
    protected $fillable = ['name','email','admin_id'];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

}
