<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    
   public function comments()
   {
       return $this->hasMany("App\Models\Comment")->orderBy('created_at', 'DESC' );
   }
   public function likes()
   {
       return $this->hasMany("App\Models\Like");
   }
   public function user()
   {
       return $this->belongsTo('App\User');
   } 
}
