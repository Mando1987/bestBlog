<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id ; 
        $posts = Post::select(
                   'id' , 'user_id' ,
                    DB::raw('CONCAT(ROUND(HOUR(TIMEDIFF( NOW(),created_at))/24 , 0), "d : " , ROUND(MINUTE(TIMEDIFF( NOW(),created_at)) , 0) , "m")  as date'  ),

                     'post_content' , 'privacy' 
                   
                   )->where('privacy', 'public')
                    ->orWhere('user_id', $user_id)->orderBy('created_at' , "DESC")->get();
       
        // return $posts;
         return view('home' , compact('posts'));
    }
}
