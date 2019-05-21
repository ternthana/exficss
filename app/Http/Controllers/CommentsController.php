<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;

class CommentsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


    public function store(Request $request)
    {
        $post = Post::findOrFail($request->post_id);

        // $imageName = time().'.'.request()->image->getClientOriginalExtension();
        // request()->image->move(public_path('images'), $imageName);
    
        Comment::create([
            'body' => $request->body,
            'img_url' => $post->img_url,
            'user_id' => Auth::id(),
            'post_id' => $post->id
        ]);

        // $post->update(["user_id" =>  $user->id, "img_url" =>  '/images/'.$imageName]);

        return redirect()->route('posts.show', $post->id);
    }
}
