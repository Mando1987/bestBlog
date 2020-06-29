<?php

namespace App\Http\Controllers\Posts;

use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;

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

        $posts = Post::where('user_id', $id)->get();
        if(!empty($posts)):
            return view('posts.show' , compact('posts'));
        else:
            // return redirect()->back()->with(['status' => 'No Posts found for this user']);
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
        $post = Post::where('user_id' , auth()->user()->id)->where('id' , $id)->delete();
        if ($post){
            //remove comments for this post
            $comments = Comment::where('post_id', $id)->delete();
            //remove likes for this post
            $likes    = Like::where('post_id', $id)->delete();
        } 
        return redirect()->route('home')->with('status' , 'Deleteted Success');
    }
    
}
