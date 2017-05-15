<?php

namespace App\Http\Controllers;

use App\Alikeyword;
use App\Category;
use App\Content;
use App\Product;
use Faker;
use Illuminate\Database\Query\Builder;
use Intervention\Image\Facades\Image;

class TestController extends Controller
{
    public function encodeURI($url) {
        // http://php.net/manual/en/function.rawurlencode.php
        // https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/encodeURI
        $unescaped = array(
            '%2D'=>'-','%5F'=>'_','%2E'=>'.','%21'=>'!', '%7E'=>'~',
            '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')'
        );
        $reserved = array(
            '%3B'=>';','%2C'=>',','%2F'=>'/','%3F'=>'?','%3A'=>':',
            '%40'=>'@','%26'=>'&','%3D'=>'=','%2B'=>'+','%24'=>'$'
        );
        $score = array(
            '%23'=>'#'
        );
        return strtr(rawurlencode($url), array_merge($reserved,$unescaped,$score));

    }

    public function test()
    {

// ----------------------------------------
//        copy('https://ae01.alicdn.com/kf/HTB1v6W_PpXXXXagXFXXq6xXFXXXM/SIMWOOD-2017-%D0%9D%D0%BE%D0%B2%D0%B0%D1%8F-%D0%9A%D0%BE%D0%BB%D0%BB%D0%B5%D0%BA%D1%86%D0%B8%D1%8F-%D0%92%D0%B5%D1%81%D0%BD%D0%B0-%D0%9B%D0%B5%D1%82%D0%BE-%D1%84%D1%83%D1%82%D0%B1%D0%BE%D0%BB%D0%BA%D0%B8-%D0%9C%D1%83%D0%B6%D1%87%D0%B8%D0%BD%D1%8B-%D0%9C%D0%BE%D0%B4%D0%B0-%D0%BA%D0%B5%D1%80%D0%BB%D0%B8%D0%BD%D0%B3-%D0%BA%D0%BE%D1%80%D0%BE%D1%82%D0%BA%D0%B8%D0%BC-%D1%80%D1%83%D0%BA%D0%B0%D0%B2%D0%BE%D0%BC-%D0%A2%D0%BE%D0%BD%D0%BA%D0%B8%D0%B9-stretch-Vintage-%D0%A2%D0%B8%D1%81.jpg_640x640.jpg',
        $url = 'https://ae01.alicdn.com/kf/HTB1XyfUPVXXXXbeXVXXq6xXFXXXI/Original-Xiaomi-Redmi-Note-4X-4-X-Mobile-Phone-Snapdragon-625-Octa-Core-5-5-FHD.jpg_640x640.jpg';
        $url = iconv('windows-1251', 'utf-8//IGNORE', $url);
//        echo $test; die;
//        $url =  $this->encodeURI($url);

        copy($url,
            'file.jpg');
//        $img = Image::make('image555.jpg');

        $img = Image::make('file.jpg');
        $img->resize(350, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save();
// ----------------------------------------
//        $c = Content::find(16);
//
////        $k = Alikeyword::find(1);
////        dd($c->alikeywords);
//        echo "<pre>";
//        foreach ($c->alikeywords as $item){
//            foreach ($item->products as $prod){
//                echo $prod . PHP_EOL;
//            }
//        }

//        $p = Product::find(3);
//
//        $k->products()->attach($p);


//        return view('welcome');

//        $faker = Faker\Factory::create();

//        for($i = 0; $i < 4; $i++){
//            $keywords = new Alikeyword();
//            $keywords->name = $faker->sentence(2, true);
//            $keywords->save();
//        }

//        for($i = 0; $i < 10; $i++){
//            $prod = new Product();
//            $prod->ali_id = $faker->numberBetween(1, 10000);
//            $prod->ali_url = $faker->url();
//            $prod->img_url = $faker->imageUrl();
//            $prod->original_img_url = $faker->imageUrl();
//            $prod->local_price = $faker->numberBetween(1, 10000);
//            $prod->save();
//        }

//        $contents->categories()->attach(2);
//        for ($i = 1; $i <= 4; $i++) {
//            Category::create([
//                'title' => $faker->sentence(2, true),
//                'description' => $faker->sentences(5, true),
//                'keywords' => $faker->words(3, true),
//                'h1' => $faker->sentence(6, true),
//                'content' => $faker->sentences(10, true),
//                'parent_category_id' => NULL,
//            ]);
//            Content::create([
//                'title' => $faker->sentence(2, true),
//                'description' => $faker->sentences(5, true),
//                'keywords' => $faker->words(3, true),
//                'h1' => $faker->sentence(6, true),
//                'user_id' => NULL,
//                'content' => $faker->sentences(10, true),
//                'alikeywords' => $faker->words(3, true),
//                'alicategories' => rand(1,5),
////                'category_id' => rand(1,4),
//            ]);
        }
//    }
}