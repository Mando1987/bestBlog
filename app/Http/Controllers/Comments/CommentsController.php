<?php

namespace App\Http\Controllers\Comments;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;

class CommentsController extends Controller
{
   public function __construct()
   {
       $this->middleware('auth');
   }
    
    public function create()
    {
       
    }
    public function show()
    {
       
    }
    public function store(CommentRequest $request)
    {
       
       $comment = new Comment();
       $comment->comment_content = $request->comment_content;
       $comment->user_id = auth()->user()->id;
       $comment->post_id = $request->post_id;
       $comment->save();

       return redirect()->route('home')->with('status' , 'Created Success');
    }

    
    public function destroy($id)
    {
        Comment::where('id' , $id)->delete();

        return redirect()->route('home')->with('status' , 'Deleteted Success');
    }
}
