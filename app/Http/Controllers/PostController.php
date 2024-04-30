<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);
        return view('index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('show', compact('post'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'body' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $imagePath = $this->fileOperations($request);

        $data['image'] = $imagePath;

        Post::create($data);
        return redirect()->route('posts.home');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = Post::findOrFail($id);

        $imagePath = $this->fileOperations($request);

        $data['image'] = $imagePath;

        $post->update($data);
        return redirect()->route('posts.home');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.home');
    }

    private function fileOperations($request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            return $image->store('images/posts');
        }
        return null;
    }
}

