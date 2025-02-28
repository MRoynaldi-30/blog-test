<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AuthorController extends Controller
{

    public function index()
    {
        return view('author.index');
    }

    public function createPost(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->intended('/author');
    }

    public function updatePost(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::find($request->idpost);

        $post->title = $request->title;
        $post->content = $request->content;

        $post->save();

        return redirect()->intended('/author');
    }

    public function deletePost(Request $request)
    {
        $post = Post::find($request->idpost);

        $post->delete();

        return redirect()->intended('/author');
    }
}
