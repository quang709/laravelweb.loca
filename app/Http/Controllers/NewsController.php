<?php

namespace App\Http\Controllers;

use App\models\Category;
use App\Models\Comment;
use App\models\News;
use App\models\Typeofnews;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{

    public function getList()
    {
        $news = News::orderBy('id', 'desc')->get();
        return view('admin/news/list', ['news' => $news]);
    }
    public function getAdd()
    {
        $category = Category::all();
        $typeofnews = Typeofnews::all();
        return view('admin/news/add', ['category' => $category, 'typeofnews' => $typeofnews]);
    }

    public function postAdd(Request $request)
    {
      
        $this->validate($request,
            [   
                'Title' => 'required|min:3|max:100|unique:news,title',
             'Typeofnews'=>'required',
                'Image' => 'required',
                'Summary' => 'required',
                'Content' => 'required',
            ],

            // tên giống ở ô input name=""
            ['Title.required' => 'You have not entered title',
            'Typeofnews.required' => 'You have not entered Typeofnews',
                'Title.min' => 'title must be 3 to 100 characters long',
                'Title.max' => 'title must be 3 to 100 characters long',
                'Title.unique' => 'title already exists',
                'Summary.required' => 'You have not entered summary',
                'Content.required' => 'You have not entered content',
                'Image.required' => 'You have not entered Image',
                // 'Image.mimes' => 'entered image have jpeg,jpg,png',

            ]);

        $news = new News;
        $news->title = $request->Title;
        $news->title_url = Str::slug($request->Title, '-');
        $news->summary = $request->Summary;
        $news->content = $request->Content;
        $news->highlight = $request->Highlight;
        $news->id_type_of_news = $request->Typeofnews;
        $news->view = 0;
        $news->image = $request->Image;

        //há
//         if ($request->hasFile('Image')) {
//             $file = $request->file('Image');
//
//             $name = $file->getClientOriginalName();
//             $Image = Str::random(4) . "_" . $name;
//
//             while (file_exists("upload/tintuc/" . $Image)) {
//                 $Image = Str::random(4) . "_" . $name;
//
//             }
//
//             $file->move("upload/tintuc/", $Image);
//             $news->image = $Image;
//
//         } else {
//             $news->image = "";
//         }

        $news->save();
        return redirect('admin/news/add')->with('messenger', 'success');

    }
    public function getEdit($id)
    {
        $category = Category::all();
        $typeofnews = Typeofnews::all();
        $news = News::find($id);
        // vì  news có liên kết hasMany rồi ,  k cần truyền $ ,qua trực tiep view edit

        return view('admin/news/edit', ['category' => $category, 'typeofnews' => $typeofnews, 'news' => $news]);
    }

    public function postEdit(Request $request, $id)
    {
        $news = News::find($id);
        $this->validate($request,
            ['Title' => 'required|min:3|max:100|unique:news,title,' . $id,
                // 'Image' => 'mimes:jpeg,jpg,png ',
                'Summary' => 'required',
                'Content' => 'required',
                'Typeofnews'=>'required',
                'Image' => 'required',
            ],

            // tên giống ở ô input name=""
            ['Title.required' => 'You have not entered title',
                'Title.min' => 'title must be 3 to 100 characters long',
                'Title.max' => 'title must be 3 to 100 characters long',
                'Title.unique' => 'title already exists',
                'Summary.required' => 'You have not entered summary',
                'Content.required' => 'You have not entered content',
                'Typeofnews.required' => 'You have not entered Typeofnews',
                // 'Image.mimes' => 'entered image have jpeg,jpg,png',
            ]);

        $news->title = $request->Title;
        $news->title_url = Str::slug($request->Title, '-');
        $news->summary = $request->Summary;
        $news->content = $request->Content;
        $news->id_type_of_news = $request->Typeofnews;
        $news->image = $request->Image;
        $news->highlight = $request->Highlight;
        //ckfinder
        //request->link = upload/tintuc/000_DV914287.jpg

//        if ($request->hasFile('Image')) {
//            $file = $request->file('Image');
//            $name = $file->getClientOriginalName();
//            $Image = Str::random(4) . "_" . $name;
//            while (file_exists("upload/tintuc/" . $Image)) {
//                $Image = Str::random(4) . "_" . $name;
//
//            }
//
//            $file->move("upload/tintuc/", $Image);
//            unlink("upload/tintuc/" . $news->image); //ten db
//            $news->image = $Image;
//
//        }
        $news->save();
        return redirect('admin/news/edit/' . $id)->with('messenger', ' edit success');

    }

    public function getDelete($id)
    {
        $news = News::find($id);
        $comment = Comment::where('id_news', $id);
        $comment->delete();
        $news->delete();

        return redirect('admin/news/list/')->with('messenger', ' delete success');

    }

}
