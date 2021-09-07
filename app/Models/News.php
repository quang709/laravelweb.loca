<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table ="news";
    public function news_typeofnews()
    {
    	return $this->belongsTo('App\Models\Typeofnews','id_type_of_news','id');
    }
    public function news_comment()
    {
    	return $this->hasMany('App\Models\Comment','id_news','id');
    }

}
