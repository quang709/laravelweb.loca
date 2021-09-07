<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Typeofnews;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function homepage()
    {
        // $theloai = TheLoai::all();
        return view('pages.homepage');

    }
    public function homepage1()
    {
        // $theloai = TheLoai::all();
        return redirect()->action([PagesController::class, 'homepage']);
    }

    public function introduce()
    {

        return view('pages.introduce');

    }

    public function contact()
    {

        return view('pages.contact');

    }

    public function category($name_url)
    {

        $cat = Category::where('name_url', $name_url)->first();
        $query = Category::query()
            ->join('type_of_news', 'category.id', 'type_of_news.id_category')

            ->join('news', 'type_of_news.id', 'news.id_type_of_news')

            ->where('id_category', $cat->id)

            ->paginate(5)
        ;

        if (!isset($cat)) {
            return redirect()->action([PagesController::class, 'homepage']);
        }

        $typeofnewstag = Typeofnews::where('id', '!=', 29)->get();
        $newstrending = News::where('id_type_of_news', '!=', 29)->get();
        return view('pages.category', ['cat' => $cat, 'news' => $query, 'typeofnewstag' => $typeofnewstag, 'newstrending' => $newstrending]);

    }

    public function typeofnews($name_url)
    { 
      
       
        //trang loai tin
        $typeofnews = Typeofnews::where('name_url', $name_url)->first();
        if (!isset($typeofnews)) {

            return redirect()->back();

        }
        $news = News::where('id_type_of_news', $typeofnews->id)->paginate(5); // 5 tin 1 trang ?
     
        $typeofnewstag = Typeofnews::where('id', '!=', 29)->get();
        $newstrending = News::where('id_type_of_news', '!=', 29)->get();
        return view('pages.typeofnews', ['typeofnews' => $typeofnews, 'news' => $news, 'typeofnewstag' => $typeofnewstag, 'newstrending' => $newstrending]);

    }
    public function news($title_url)
    {
        $news = News::where('title_url', $title_url)->first();

        if (!isset($news)) {

            return redirect()->back();

        }

        $highlight = News::where('highlight', 1)->take(4)->get();

        $related_news = news::where('id_type_of_news', $news->id_type_of_news)->skip(1)->take(4)->get();
        //tin tuc lien quan
        $typeofnewstag = Typeofnews::where('id', '!=', 29)->get();
        $newstrending = News::where('id_type_of_news', '!=', 29)->get();
        News::where('id', $news->id)->update(['view' => $news->view + 1]);
        return view('pages.news', ['news' => $news, 'highlight' => $highlight, 'related_news' => $related_news, 'typeofnewstag' => $typeofnewstag, 'newstrending' => $newstrending]);
    }

    public function search(Request $request)
    {

        $keyword = $request->keyword;
        //$keyword = $request->get('keyword');
        $news = News::where('title', 'like', "%$keyword%")
        ->where('id_type_of_news', '!=', 29)
        ->orWhere('summary', 'like', "%$keyword%")
        ->orWhere('content', 'like', "%$keyword%")
        ->paginate(5);

       
      
        if ($keyword == null) {
            return redirect()->back();

        }
        return view('pages.search', ['news' => $news, 'keyword' => $keyword]);

    }
}
//'%$keyword%' "%$keyword%"
