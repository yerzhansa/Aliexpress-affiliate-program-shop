<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alikeyword extends Model
{
    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->belongsToMany('App\Product')->withTimestamps();
    }

    public function contents()
    {
        return $this->belongsToMany('App\Content')->withTimestamps();
    }
}
