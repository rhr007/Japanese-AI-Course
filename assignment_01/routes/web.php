<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/posts', function () {
    $posts = Post::latest()->get();
    return view('posts.show', ['posts' => $posts]);
})->name('posts.index');


Route::get('/posts/create', function () {
    return view('posts.create');
})->name('posts.create');


Route::post('/posts', function (Request $request) {
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    Post::create($validated);

    return redirect()->route('posts.index')->with('success', 'Post created successfully!');;
})->name('posts.store');


Route::get('/posts/{post}/edit', function (Post $post) {
    return view('posts.edit', compact('post'));
})->name('posts.edit');


Route::put('/posts/{post}', function (Request $request, Post $post) {
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    $post->update($validated);

    return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
})->name('posts.update');


Route::delete('/posts/{post}', function (Request $request, Post $post) {
    $post->delete();
    return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
})->name('posts.destroy');
