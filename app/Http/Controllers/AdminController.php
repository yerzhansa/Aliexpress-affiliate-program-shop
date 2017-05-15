<?php

namespace App\Http\Controllers;

use App\Category;
use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function createCategory()
    {
        $categories = Category::all();
        return view('admin.newCategory', ['categories' => $categories]);
    }

    public function updateCategory($id)
    {
        $categories = Category::all();
        $category = $categories->find($id);
        return view('admin.updateCategory', ['categories' => $categories, 'category' => $category]);
    }

    public function storeCategory(Request $request, $id = null)
    {
        Validator::make($request->all(), [
            'title' => [
                'required',
                'max:255',
                Rule::unique('categories')->ignore($id),
            ],
            'description' => 'required|max:150',
            'keywords' => 'required|max:255',
            'h1' => 'required|max:255',
            'article' => 'required',
            'parent_category_id' => 'integer',
            'published_at' => 'date',
        ])->validate();

        $addCategory = new Category();
        return $addCategory->addCategory($request, $id);
    }

    public function allCategories()
    {
        $categories = Category::paginate(30);
        return view('admin.allCategories', ['categories' => $categories]);
    }

    public function softDeleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        return back();
    }

    public function allTrashedCategories()
    {
        $categories = Category::onlyTrashed()->paginate(25);
        return view('admin.allTrashedCategories', ['categories' => $categories]);
    }

    public function restoreTrashedCategory($id)
    {
        $category = Category::withTrashed()->whereId($id)->first();
        $category->restore();
        return back();
    }

    public function forceDeleteCategory($id)
    {
        $category = Category::withTrashed()->whereId($id)->first();
        $category->forceDelete();
        return back();
    }

    public function addArticle()
    {
        $categories = Category::all();
        return view('admin.newArticle', ['categories' => $categories]);
    }

    public function allArticles()
    {
        $articles = Content::paginate(30);
        return view('admin.allArticles', ['articles' => $articles]);
    }

    public function softDeleteArticle($id)
    {
        $article = Content::find($id);
        $article->delete();
        return back();
    }

    public function allTrashedArticles()
    {
        $articles = Content::onlyTrashed()->paginate(25);
        return view('admin.allTrashedArticles', ['articles' => $articles]);
    }

    public function restoreTrashedArticle($id)
    {
        $articles = Content::withTrashed()->whereId($id)->first();
        $articles->restore();
        return back();
    }

    public function forceDeleteArticle($id)
    {
        $articles = Content::withTrashed()->whereId($id)->first();
        $articles->forceDelete();
        return back();
    }

    public function updateArticle($id)
    {
        $article = Content::find($id);
        $category = $article->categories()->first();
        if (isset($category)) {
            $categoryId = $category->id;
        }
        $categories = Category::all();

        return view('admin.updateArticle', [
            'article' => $article,
            'categoryId' => $categoryId,
            'categories' => $categories,
        ]);

    }

    public function storeArticle(Request $request, $id = null)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required|max:150',
            'keywords' => 'required|max:255',
            'h1' => 'required|max:255',
            'article' => 'required',
            'alikeywords' => 'string',
            'alicategories' => 'string',
            'category' => 'required|numeric',
        ]);

        $newContent = new Content();
        return $newContent->saveArticle($request, $id);
    }
}