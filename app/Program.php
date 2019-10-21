<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $guarded = ['id'];
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function waivers(){
        return $this->hasMany(Waiver::class);
    }
}
