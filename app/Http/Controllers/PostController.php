<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index', ['posts' => $posts]);
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'tag_ids' => 'array'
        ]);

        $post = Post::create($validatedData);

        foreach ($request->input('tag_ids') as $tag_id) {
            $postTag = new PostTag();
            $postTag->post_id = $post->id;
            $postTag->tag_id = $tag_id;
            $postTag->save();
        }
        return redirect()->route('post.index');
    }   
}
