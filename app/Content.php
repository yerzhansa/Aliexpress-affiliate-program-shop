<?php

namespace App;

use App\Http\Controllers\AliApiController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'title',
        'description',
        'keywords',
        'h1',
        'user_id',
        'content',
        'alikeywords',
        'alicategories',
        'category_id',
        'aliproducts'
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Category')->withTimestamps();
    }

    public function alikeywords()
    {
        return $this->belongsToMany('App\Alikeyword')->withTimestamps();
    }

    public function saveArticle($request, $id = null)
    {

        $aliApi = new AliApiController();
        $aliProducts = $aliApi->aliKeysToProducts($request->alikeywords);
        $keywordsIds = [];

        if (is_array($aliProducts)) {
            foreach ($aliProducts as $aliProduct) {
                $allProductsIds = [];
                foreach ($aliProduct as $value) {
                    if (!is_array($value)) {
                        $keywordData = Alikeyword::firstOrCreate([
                            'name' => $value,
                        ]);
                        $keywordsIds[] = $keywordData->id;

                    } else {
                        $productData = Product::updateOrCreate([
                            'ali_id' => $value['productId'],
                        ], [
                            'ali_url' => $value['productUrl'],
                            'img_url' => $value['imageUrl'],
                            'original_img_url' => $value['imageUrl'],
                            'local_price' => $value['localPrice'],
                        ]);
                        $allProductsIds[] = $productData->id;
                    }
                }
                $keywordData->products()->sync($allProductsIds);
            }
        } else {
            return back()
                ->withErrors($aliProducts->getMessage())
                ->withInput();
        }

        $newArticle = Content::findOrNew($id);
        $newArticle->title = $request->title;
        $newArticle->description = $request->description;
        $newArticle->keywords = $request->keywords;
        $newArticle->h1 = $request->h1;
        $newArticle->content = $request->article;
        $newArticle->alicategories = $request->alicategories;
        $newArticle->save();

        $newArticle->categories()->sync([$request->category]);
        $newArticle->alikeywords()->sync($keywordsIds);

        $titleNewArticle = $newArticle->title;
        $idNewArticle = $newArticle->id;

        if ($id) {
            return back()
                ->with('updated', 'Article Updated')
                ->withInput();
        } else {
            return back()
                ->with('newArticleTitle', $titleNewArticle)
                ->with('newArticleId', $idNewArticle)
                ->withInput();
        }
    }
}
