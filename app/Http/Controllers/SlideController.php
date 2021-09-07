<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SlideController extends Controller
{

    public function getList()
    {
        $slide = Slide::all();
        return view('admin/slide/list', ['slide' => $slide]);

    }

    public function getAdd()
    {
        return view('admin/slide/add');
    }
    public function postAdd(Request $request)
    {
        $this->validate($request,
            ['Image' => 'required',
                'Name' => 'required',
                'Content' => 'required',
                'Link' => 'required',
            ],
            ['Image.required' => 'you need enter image',
              
                'Name.required' => 'enter Name',
                'Content.required' => 'enter content',
                'Link.required' => 'enter link']);
        $slide = new Slide;
        $slide->name = $request->Name;
        $slide->content = $request->Content;
        $slide->link = $request->Link;
        $slide->image = $request->Image;
      

        $slide->save();
        return redirect('admin/slide/add')->with('messenger', 'success');

    }
    public function getEdit($id)
    {
        $slide = Slide::find($id);
        return view('admin/slide/edit', ['slide' => $slide]);
    }
    public function postEdit(Request $request, $id)
    {
        $this->validate($request,
            ['Image' => 'required',
                'Name' => 'required',
                'Content' => 'required',
                'Link' => 'required',],
            [
                'Image.required' => 'entered image ',
                'Name.required' => 'enter Name',
                'Content.required' => 'enter content',
                'Link.required' => 'enter link']);
        $slide = Slide::find($id);
        $slide->name = $request->Name;
        $slide->content = $request->Content;
        $slide->link = $request->Link;

        $slide->image = $request->Image;

        $slide->save();
        return redirect('admin/slide/edit/' . $id)->with('messenger', 'edit success');

    }

    public function getDelete($id)
    {
        $slide = Slide::find($id);
        $slide->delete();

        return redirect('admin/slide/list')->with('messenger', 'delete success');
    }

}
