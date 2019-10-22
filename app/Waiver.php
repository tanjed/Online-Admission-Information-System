<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waiver extends Model
{
    protected $guarded = [];
   public function program(){
       return $this->belongsTo(Program::class);
   }
}
