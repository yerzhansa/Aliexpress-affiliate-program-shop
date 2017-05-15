<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request, $id = null)
    {
        $categories = Category::all();
        return view('category.categories', ['categories' => $categories]);
    }

    public function singleCategory($id)
    {
        $category = Category::find($id);
        $contents = $category->contents->toArray();
        return view('category.category', [
            'category' => $category,
            'contents' => $contents
        ]);
    }
}
