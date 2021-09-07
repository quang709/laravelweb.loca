<?php

namespace App\Http\Controllers;

use App\Models\Videonews;
use Illuminate\Http\Request;

class VideonewsController extends Controller
{
    //
    public function getList()
    {
        $videonews = Videonews::all();
        return view('admin/videonews/list', ['videonews' => $videonews]);

    }

    public function getAdd()
    {
        return view('admin/videonews/add');

    }

    public function postAdd(Request $request)
    {
        $this->validate($request,

            [
                'title' => 'required|min:3|max:100|unique:video_news,title',
                'path'=>'required',
            ],
            [
                'title.required' => 'You have not entered a title',
                'title.min' => 'title must be 3 to 100 characters long',
                'title.unique' => 'title already exists',
                'title.max' => 'title must be 3 to 100 characters long',
            ]);

        $category = new Videonews();
        $category->title = $request->title;
        $category->path = $request->path;
        $category->save();

        return redirect('admin/videonews/add')->with('messenger', 'success');

    }

    public function getEdit($id)
    {
        $videonews = Videonews::find($id);
        return view('admin/videonews/edit', ['videonews' => $videonews]);

    }
    public function postEdit(Request $request, $id)
    {
      
        $videonews = Videonews::find($id);

        $this->validate($request,
            [
                'title' => 'required|min:3|max:100|unique:video_news,title,'.$id,
                'path'=>'required',
            ],
            [
                'title.required' => 'You have not entered a title',
                'title.min' => 'title must be 3 to 100 characters long',
                'title.unique' => 'title already exists',
                'title.max' => 'title must be 3 to 100 characters long',
            ]);
        $videonews->title = $request->title;

        $videonews->path = $request->path;
        $videonews->save();

        return redirect('admin/videonews/edit/' . $videonews->id)->with('messenger', 'edit success');

    }
    public function getDelete($id)
    {
        //cần return thì dùng get()
        $videonews = Videonews::find($id);

        $videonews->delete();

        return redirect('admin/videonews/list')->with('messenger', 'delete success');

    }
    

}
