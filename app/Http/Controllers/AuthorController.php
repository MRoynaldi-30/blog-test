<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AuthorController extends Controller
{

    public function index()
    {
        return view('author.index');
    }

    public function getPosts()
    {
        $posts = Post::all();
        $accounts = Account::all();

        return view('author.post', compact('posts', 'accounts'));
    }

    public function createPost(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'date' => 'required|date',
            'username' => 'required|string',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'date' => $request->date,
            'username' => $request->username,
        ]);

        return redirect()->intended('/author/posts');
    }

    public function editPost(Request $request)
    {
        $post = Post::find($request->idpost);
        $accounts = Account::all();
        return view('author.post-edit', compact('post', 'accounts'));
    }

    public function updatePost(Request $request, $idpost)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'date' => 'required|date',
            'username' => 'required|string|exists:account,username', 
        ]);

        $post = Post::where('idpost', $idpost)->first();

        if (!$post) {
            return redirect()->back()->withErrors(['error' => 'Post tidak ditemukan']);
        }

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'date' => $request->date,
            'username' => $request->username,
        ]);

        return redirect()->route('author.posts')->with('success', 'Post berhasil diperbarui');
    }

    public function deletePost(Request $request)
    {
        $post = Post::find($request->idpost);

        $post->delete();

        return redirect()->intended('/author/posts');
    }
}
