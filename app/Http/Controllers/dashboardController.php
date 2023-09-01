<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('postForm', compact('categories', 'tags'));;
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        dd($request->input('tag_ids'));

        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'tag_ids' => 'array'
        ]);

        $post = Post::create($validatedData);

        

        foreach ($request->tag_ids as $tag_id) {
            $post->tags()->attach($tag_id);
        }
        return redirect('post');
    }
}
