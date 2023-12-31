<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('tag.index')->with('tags', $tags);
    }

    public function create()
    {
        return view('tag.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);
        $input = new Tag;
        $input->name = $validatedData['name'];
        $input->save();
        return redirect()->route('tag.index');
    }

    public function edit($id)
    {
        $tag = Tag::find($id);

        if(!$tag){
            return 404;
        }

        return view('tag.edit')->with('tag', $tag);
    }

    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'name' => 'required',
        ]);

        $tag = Tag::find($id);

        if($tag){
            return 404;
        }

        $tag->update($input);

        return redirect()->route('tag.index');
    }


    public function destroy($id)
    {
        $tag = Tag::find($id);

        if($tag){
            return 404;
        }
        
        $tag->delete();

        return redirect()->route('tag.index');
    }
}
