<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('show-posts')->compact('posts');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       // if(!auth()->check())
        //    return redirect('/');
        //
        return view('posts/create-post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate(
            [
                "title" => 'required',
                "body" => 'required'
            ]
        );
        $validatedData['title'] = strip_tags($validatedData['title']);
        $validatedData['body'] = strip_tags($validatedData['body']);
        $validatedData['user_id'] = auth()->id();
        $post = Post::create($validatedData);
//        return redirect()->route('homepage')->with('message', 'Post successfully created.')->with('alert-class', 'alert-success');
        return redirect("/post/{$post->id}")->with('message', 'Post successfully created.')->with('alert-class', 'alert-success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
   //     $user = User::get($post->user_id);

        $post['body'] =  Str::markdown($post->body);
        return view('posts/show-post', ['post' => $post ]);
        //     return view('posts/show-post', compact('post','user'));
        //     return view('posts/show-post',)->with('title',$post->title)->with('body',$post->body);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
