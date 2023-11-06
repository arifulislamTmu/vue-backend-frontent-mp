<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::latest()->get();
    }

    public function store(Request $request)
    {
       $category = new Category;
       $category->category_name = $request->name;
       $category->save();
    }

    public function show(string $id)
    {
        $category = Category::find($id);
        return $category;
    }

    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            "name"=> "required",
        ]);
        $category = Category::find($id);
        $category->category_name = $request->name;
        $category->save();
    }

    public function destroy(string $id)
    {
        $category = Category::find($id)->delete();
    }
}
