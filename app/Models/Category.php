<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "category";
    public function category_typeofnews()
    {
        return $this->hasMany('App\Models\Typeofnews', 'id_category', 'id');
    }
    public function category_news()
    {
        return $this->hasManyThrough('App\Models\News', 'App\Models\Typeofnews', 'id_category', 'id_type_of_news', 'id');
    }

    public function news()
    {
        return $this->hasMany(News::class, 'id_type_of_news');
    }

}
