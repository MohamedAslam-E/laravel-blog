<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('Tag.index')->with('tags', $tags);
    }

    public function create()
    {
        return view('Tag.create');
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
        return view('Tag.edit')->with('tag', $tag);
    }

    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'name' => 'required',
        ]);

        $tag = Tag::find($id);
        $tag->update($input);

        return redirect()->route('tag.index');
    }


    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();

        return redirect()->route('tag.index');
    }
}
