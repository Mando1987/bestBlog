<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function store(Request $request)
    {
        /**
         * check if user liked post or no 
         * if yes : delete record from likes table and get all count likes for post
         * if no  : insert record to likes table and get all count likes for post
         * finally : send array to user contain isLiked and count 
         * 
         */
        $post_id = $request->post_id;
        $user_id = auth()->user()->id ;
        $c = Like::where('user_id', $user_id)->where('post_id' , $post_id)->get()->count();
        // check if user not  liked post 
        if ($request->isLiked == "no" AND $c == 0){
            // store like record in likes table
            $likes = new Like;
            $likes->post_id  = $post_id;
            $likes->user_id  = $user_id;
            $likes->save(); 
            // get likes count for post after insert
            $counts = Like::where('post_id' , $post_id)->get()->count();

            $allCounts = (!empty($counts))?$counts : null;
            return ['isLiked' => 'yes' , 'count' => $allCounts];
        // check if user not  liked post 
        }else{
            // delete like record in likes table
            Like::where('user_id', auth()->user()->id )->where('post_id' , $post_id)->delete();
            // get likes count for post after delete
            $counts = Like::where('post_id' , $post_id)->get()->count();
            $allCounts = (!empty($counts))?$counts : null;
            return ['isLiked' => 'no' , 'count' => $allCounts ];
        }
    }
    
    
}
