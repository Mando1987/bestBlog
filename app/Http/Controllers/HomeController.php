<?php

namespace App\Http\Controllers;

use App\Models\Post;

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

        $posts   = Post::where('privacy', 'public')->orWhere('user_id', $user_id)->orderBy('created_at' , "DESC")->get();
       
        return view('home' , compact('posts'));
    }
}
