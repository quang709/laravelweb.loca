<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{


    public function getList()
    {
        $category = Category::all();

        return view('admin/category/list', ['category' => $category]);
    }

    public function getIndex()
    {
      

        return view('admin/layout/index');
    }
    public function getAdd()
    {
        return view('admin/category/add');

    }

    public function postAdd(Request $request)
    {

        $this->validate($request,

            [
                'name' => 'required|min:3|max:100|unique:category,name',
            ],
            [
                'name.required' => 'You have not entered a name',
                'name.min' => 'Category names must be 3 to 100 characters long',
                'name.unique' => 'Category name already exists',
                'name.max' => 'Category names must be 3 to 100 characters long',
            ]);

        $category = new Category;
        $category->name = $request->name;
        $category->name_url = Str::slug($request->name, '-');
        $category->save();

        return redirect('admin/category/add')->with('messenger', 'success');

    }

    public function getEdit($id)
    {
        $category = Category::find($id);
        return view('admin/category/edit', ['category' => $category]);

    }
    public function postEdit(Request $request, $id)
    {

        $category = Category::find($id);

        $this->validate($request,
            [
                'name' => 'required|unique:category,name|min:3|max:100',
            ],
            [
                'name.required' => 'You have not entered a name',
                'name.unique' => 'Category name already exists',
                'name.min' => 'Category names must be 3 to 100 characters long',
                'name.max' => 'Category names must be 3 to 100 characters long',
            ]);
        $category->name = $request->name;

        $category->name_url = Str::slug($request->name, '-');
        $category->save();

        return redirect('admin/category/edit/' . $category->id)->with('messenger', 'edit success');

    }
    public function getDelete($id)
    {
        //cần return thì dùng get()
        $category = Category::find($id);

        if ($category->id == 19) {
            return redirect('admin/category/list')->with('messenger', 'uncategory do not delete!');
        }
        DB::table('type_of_news')
            ->where('id_category', $category->id)
            ->update(['id_category' => 19]);

        $category->delete();

        return redirect('admin/category/list')->with('messenger', 'delete success');

    }

    public function getCategoryNews($name_url)
    {
        $cat = Category::where('name_url', $name_url)->first();
        $news = Category::query()
            ->join('type_of_news', 'category.id', 'type_of_news.id_category')
            ->join('news', 'type_of_news.id', 'news.id_type_of_news')
            ->where('id_category', $cat->id)
            ->get();
          

      
        return view('admin.category.categorynews', ['cat' => $cat, 'news' => $news]);

    } 

}
