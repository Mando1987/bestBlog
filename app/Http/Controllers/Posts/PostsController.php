<?php

namespace App\Http\Controllers\Posts;

use App\Models\Like;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PostsController extends Controller
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
 * show all posts if is public or user_id = auth()->user
 */
    public function show($id)
    {

        $posts = Post::select(
            'id' , 'user_id' ,
             DB::raw('CONCAT(ROUND(HOUR(TIMEDIFF( NOW(),created_at))/24 , 0), "d : " , ROUND(MINUTE(TIMEDIFF( NOW(),created_at)) , 0) , "m")  as date'  ),

              'post_content' , 'privacy' 
            
            )->where('user_id', $id)->orderBy('created_at' , "DESC")->get();

        if(!empty($posts)):

            return view('posts.show' , compact('posts'));
        else:
            
            return redirect()->route('home')->with('status' , 'Created Success');
        endif;
        
    }



    public function create(){

      return view('posts.create');
    }



    public function store(PostRequest $request){

        $posts = new Post();
        $posts->post_content = $request->post_content;
        $posts->privacy      = $request->privacy;
        $posts->user_id      = auth()->user()->id;
        $posts->save();

        return redirect()->route('home')->with('status' , 'Created Success');
      
    }
    public function edit($id)
    {
        $posts  = Post::where('user_id' , auth()->user()->id)->where('id' , $id)->get();
        if(!empty($posts))
           return view('posts.edit' , compact('posts'));
    }

    public function update(PostRequest $request , $id){

        $post = Post::find($id);
        if(!empty($post))
            $post->post_content = $request->post_content;
            $post->privacy = $request->privacy;
            $post->user_id = auth()->user()->id;
            $post->save();

            return redirect()->route('home')->with('status' , 'Updated Success');
      
    }

    public function destroy($id)
    {
       //remove exists post for authentecated user;
        $post = Post::where('user_id' , auth()->user()->id)->where('id' , $id)->first();

        
        $post->delete();
        Comment::where('post_id', $post->id)->delete();
        return redirect()->route('home')->with('status' , 'Deleteted Success');
    }
    
}
