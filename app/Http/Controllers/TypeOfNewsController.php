<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Typeofnews;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class TypeOfNewsController extends Controller
{

    public function getList()
    {

        $typeofnews = Typeofnews::all();

        return view('admin.typeofnews.list', ['typeofnews' => $typeofnews]);

    }
    public function getAdd()
    {
        $category = Category::all();
        return view('admin.typeofnews.add', ['category' => $category]);

    }
    public function postAdd(Request $request)
    {
        $this->validate($request,
            ['name' => 'required|min:3|max:100|unique:type_of_news,name',
                'category' => 'required'],
            [
                'name.required' => 'You have not entered a type of news name',
                'name.min' => 'Type of news names must be 3 to 100 characters long',
                'name.unique' => 'type of news name already exists',
                'name.max' => 'Type of news names must be 3 to 100 characters long',
                'category.required' => 'You have not selected a category',
            ]);

        $type_of_news = new Typeofnews;
        $type_of_news->name = $request->name;
        $type_of_news->name_url = Str::slug($request->name, '-');
        $type_of_news->id_category = $request->category;
        $type_of_news->save();

        return redirect('admin/typeofnews/add')->with('messenger', 'success');
    }

    public function getEdit($id)
    {
        $category = Category::all();
        $typeofnews = Typeofnews::find($id);
        return view('admin/typeofnews/edit', ['category' => $category, 'typeofnews' => $typeofnews]);

    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request,
            ['name' => 'required', 'unique:type_of_news,name|min:3|max:100',
                'category' => 'required'],

            ['name.required' => 'You have not entered a type of news name',
                'name.min' => 'Type of news names must be 3 to 100 characters long',
                'name.unique' => 'type of news name already exists',
                'name.max' => 'Type of news names must be 3 to 100 characters long',
                'category.required' => 'You have not selected a category',
            ]);

        $type_of_news = Typeofnews::find($id);
        $type_of_news->name = $request->name;
        $type_of_news->name_url = Str::slug($request->name, '-');
        $type_of_news->id_category = $request->category;
        $type_of_news->save();

        return redirect('admin/typeofnews/edit/' . $type_of_news->id)->with('messenger', 'edit success');

    }

    public function getDelete($id)
    {
        $typeofnews = Typeofnews::find($id);

        
        if($typeofnews->id == 29){
            return redirect('admin/typeofnews/list')->with('messenger', 'untypeofnews do not delete!');
        }
        DB::table('news')
        ->where('id_type_of_news', $typeofnews->id)
        ->update(['id_type_of_news' => 29]);

        $typeofnews->delete();

        return redirect('admin/typeofnews/list')->with('messenger', 'delete success');
    }
}
