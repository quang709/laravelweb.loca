<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typeofnews extends Model
{
    use HasFactory;
    protected $table ="type_of_news";
    public function typeofnews_category()
    {
    	return $this->belongsTo('App\Models\Category','id_category','id');
    }
    public function typeofnews_news()
    {
    	return $this->hasMany('App\Models\News','id_type_of_news','id');
    }

}

