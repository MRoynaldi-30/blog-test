<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Account;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        // dd(Auth::user()); 
        return view('admin.index');
    }

    public function kelolaAkun()
    {
        $accounts = Account::all();
        return view('admin.user', compact('accounts'));
    }

    public function createAccount(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:account',
            // 'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
            'role' => 'required|in:admin,author',
        ]);

        Account::create([
            'name' => $request->name,
            'username' => $request->username,
            // 'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        return redirect()->route('admin.dashboard')->with('success', 'Akun berhasil dibuat!');
    }

    public function editAccount(Request $request)
    {
        $accounts = Account::find($request->id);
        // dd($accounts);
        return view('admin.edit', compact('accounts'));
    }

    public function updateAccount(Request $request)
    {
        $account = Account::where('username', $request->username)->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('account', 'username')->ignore($account->username, 'username'),
            ],
            'password' => 'nullable|string',
            'role' => 'required|in:admin,author',
        ]);

        $account->update([
            'name' => $request->name,
            'username' => $request->username,
            'password' => $request->password ? Hash::make($request->password) : $account->password,
            'role' => $request->role,
        ]);

        return redirect()->intended('/admin')->with('success', 'Akun berhasil diperbarui!');
    }

    public function deleteAccount(Request $request)
    {
        $account = Account::find($request->id);

        $account->delete();

        return redirect()->intended('/admin');
    }

    // post admin
    public function post()
    {
        $posts = Post::all();
        $accounts = Account::all();
        return view('admin.post', compact('posts', 'accounts'));
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

        return redirect()->intended('/admin/post');
    }

    public function editPost(Request $request)
    {
        $post = Post::find($request->idpost);
        $accounts = Account::all();
        return view('admin.post-edit', compact('post', 'accounts'));
    }

    public function updatePost(Request $request, $idpost)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'date' => 'required|date',
            'username' => 'required|string|exists:account,username', // Pastikan username ada di tabel account
        ]);

        // Cari post berdasarkan primary key (idpost)
        $post = Post::where('idpost', $idpost)->first();

        // Jika data tidak ditemukan, kembalikan error
        if (!$post) {
            return redirect()->back()->withErrors(['error' => 'Post tidak ditemukan']);
        }

        // Update data post
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'date' => $request->date,
            'username' => $request->username,
        ]);

        return redirect()->route('admin.post')->with('success', 'Post berhasil diperbarui');
    }


    public function deletePost(Request $request)
    {
        $post = Post::find($request->id);

        $post->delete();

        return redirect()->intended('/admin');
    }
}
