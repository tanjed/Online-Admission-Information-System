<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['university_id','name'];
    public function university(){
        return $this->belongsTo(University::class);
    }
    public function programs(){
        return $this->hasMany(Program::class);
    }
}
