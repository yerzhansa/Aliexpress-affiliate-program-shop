<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'ali_id',
        'ali_url',
        'img_url',
        'original_img_url',
        'local_price',
    ];

    public function alikeywords()
    {
        return $this->belongsToMany('App\Alikeyword')->withTimestamps();
    }
}
