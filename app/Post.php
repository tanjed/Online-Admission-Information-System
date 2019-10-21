<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
   public function student(){
       return $this->belongsTo(Student::class);
   }
   public function comments(){
       return $this->hasMany(Comment::class);
   }
}