<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;

class categoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('categoryTable')->with('category', $category);
    }

    public function show()
    {
        return view('categoryFrom');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);
        $input = new Category;
        $input->name = $validatedData['name'];
        $input->save();

        return redirect()->route('category.indexx');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('categoryUpdate')->with('category', $category);
    }

    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'name' => 'required'
        ]);
        $category = Category::find($id);
        $category->update($input);

        return redirect()->route('category.indexx');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('category.indexx');
    }
}
