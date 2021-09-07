<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table ="comment";
    public function comment_news()
    {
    	return $this->belongsTo('App\Models\News','id_news','id');
    }
    public function comment_user()
    {
    	return $this->belongsTo('App\Models\User','id_user','id');
    }
}
