<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id',
        'title',
        'description',
        'keywords',
        'h1',
        'content',
        'parent_category_id',
        'created_at',
        'updated_at',
    ];
    protected $dates = ['deleted_at'];

    public function contents()
    {
        return $this->belongsToMany('App\Content');
    }

    public function addCategory($request, $id = null)
    {
        $category = Category::findOrNew($id);
        $category->title = $request->title;
        $category->description = $request->description;
        $category->keywords = $request->keywords;
        $category->h1 = $request->h1;
        $category->content = $request->article;
        $category->parent_category_id = $request->parent_category_id;
        $category->save();

        $titleNewCategory = $category->title;
        $idNewCategory = $category->id;

        if ($id) {
            return back()
                ->withInput()
                ->with('categoryUpdated', 'Category Updated');
        } else {
            return back()
                ->with('newCategoryTitle', $titleNewCategory)
                ->with('newCategoryId', $idNewCategory)
                ->withInput();
        }
    }
}
