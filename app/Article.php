<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function page(){
        return $this->hasOne(Page::class,'type_id','id')->where('type','ARTICLE');
    }

    public function children()
    {
        return $this->hasMany(Article::class, 'parent_id', 'id')->with('page');
    }
}
