<?php

namespace App\Http\Controllers;

use App\Content;

class ContentController extends Controller
{
    public function index($url)
    {
        $contents = Content::find($url);
        $keywords = $contents->alikeywords;
        $products = [];

        foreach ($keywords as $keyword){
            $products[] =  $keyword->products;
            array_push($products, $keyword->name);
        }

        $details = $this->uniqueMultidimArray($products,'ali_id');

        return view('content.content', [
            'contents' => $contents,
            'ali' => $details
        ]);
    }

    public function uniqueMultidimArray($array, $key) {
        $arr = [];
        $i = 0;
        $key_array = [];

        foreach($array as $val) {
            $temp_array = [];
            if(is_string($val)){
                $arr[] = $val;
            } else {
                foreach ($val as $v) {
                    if (!in_array($v->$key, $key_array)) {
                        $key_array[$i] = $v->$key;
                        $temp_array[$i] = $v;
                    }
                    $i++;
                }
                $arr[] = $temp_array;
            }
        }
        return $arr;
    }
}
