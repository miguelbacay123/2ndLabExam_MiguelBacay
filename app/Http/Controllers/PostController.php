<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $filename = uniqid('img_') . '.' . $request->image->extension();
            $request->image->storeAs('public/uploads', $filename);
            $validated['image'] = $filename;
        }

        Post::create($validated);

        return redirect()->route('posts.index')->with('success', 'Post created!');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($post->image && Storage::exists('public/uploads/' . $post->image)) {
                Storage::delete('public/uploads/' . $post->image);
            }

            $filename = uniqid('img_') . '.' . $request->image->extension();
            $request->image->storeAs('public/uploads', $filename);
            $validated['image'] = $filename;
        }

        $post->update($validated);

        return redirect()->route('posts.index')->with('success', 'Post updated!');
    }

    public function destroy(Post $post)
    {
        // Delete image if exists
        if ($post->image && Storage::exists('public/uploads/' . $post->image)) {
            Storage::delete('public/uploads/' . $post->image);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted!');
    }
}