<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\News;
use App\Models\Slide;
use App\Models\Typeofnews;
use App\Models\User;
use App\Models\Videonews;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $category = Category::where('id', '!=', 19)->get();

        $slide = Slide::orderBy('id', 'desc')->take(2)->get();

        $news = News::where('id_type_of_news', '!=', 29)->get();
        $typeofnews = Typeofnews::where('id', '!=', 29)->get();



        $categoryall = Category::all();
        $typeofnewsall = Typeofnews::all();

        $videonews = Videonews::all();

        $user = Auth::user();
       
        view()->share('category', $category);
        view()->share('slide', $slide);
        view()->share('user', $user);
        view()->share('news', $news);
        view()->share('typeofnews', $typeofnews);

        view()->share('categoryall', $categoryall);
        view()->share('typeofnewsall', $typeofnewsall);
        view()->share('videonews', $videonews);
        Paginator::useBootstrap();
        
    }
}
