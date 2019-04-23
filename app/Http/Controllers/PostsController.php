<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;
        $user = Auth::user();

        if (!empty($keyword)) {
            $posts = Post::where('name', 'LIKE', "%$keyword%")
                ->orWhere('img_url', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $posts = Post::latest()->paginate($perPage);
        }
        foreach( $posts as $post) {
            $post->user;
            $post->check = $user->id == $post->user->id ? true : false;
        }

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $requestData = $request->all();

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);



        $post = Post::create($requestData);
        $user = Auth::user();

        $post->update(["user_id" =>  $user->id, "img_url" =>  '/images/'.$imageName]);

        return redirect('posts')->with('flash_message', 'Post added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $user = Auth::user();

        $post->check = $user->id == $post->user->id ? true : false;

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);

        $post = Post::findOrFail($id);
        $post->update($requestData);
        $post->update([ "img_url" =>  '/images/'.$imageName]);


        return redirect('posts')->with('flash_message', 'Post updated!');
    }



    public function updateStatus($id)
    {
        $post = Post::findOrFail($id);
        $post->update([ "status" =>  1]);
        return redirect('posts')->with('flash_message', 'Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return redirect('posts')->with('flash_message', 'Post deleted!');
    }
}
