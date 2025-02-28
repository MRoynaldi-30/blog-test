<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Account;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        dd(Auth::user()); 
        return view('admin.index');
    }

    public function createAccount(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Account::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->intended('/admin');
    }

    public function updateAccount(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()->intended('/admin');
    }

    public function deleteAccount(Request $request)
    {
        $user = Auth::user();

        $user->delete();

        return redirect()->intended('/admin');
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

        return redirect()->intended('/admin');
    }

    public function updatePost(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'date' => 'required|date',
            'username' => 'required|string',
        ]);

        $post = Post::find($request->id);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->date = $request->date;
        $post->username = $request->username;

        $post->save();

        return redirect()->intended('/admin');
    }

    public function deletePost(Request $request)
    {
        $post = Post::find($request->id);

        $post->delete();

        return redirect()->intended('/admin');
    }
}
