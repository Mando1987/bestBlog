<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     *  relationship  : oneToMany between post and comments
     */
    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
     /**
     *  relationship  : oneToMany between user and comments
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
